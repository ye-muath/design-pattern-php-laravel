<?php

declare(strict_types=1);

/**
 * Recursively finds all subdirectories containing an "artisan" file (Laravel projects),
 * then creates a symlink from the root "vendor" folder into each of those subdirectories.
 *
 * Usage:
 *   php scripts/recursive-symlink-vendor.php
 */

// ---------------------------------------------------------------------
// 1. Where is our root folder & vendor folder?
// ---------------------------------------------------------------------
$rootPath   = realpath(__DIR__ . '/../'); // The folder where composer.json + the main vendor live
$rootVendor = $rootPath . DIRECTORY_SEPARATOR . 'vendor';

// Sanity check: Make sure the root vendor folder actually exists
if (! is_dir($rootVendor)) {
    exit("[ERROR] No root 'vendor' folder found at: {$rootVendor}\n");
}

// ---------------------------------------------------------------------
// 2. Recursively find all Laravel projects by locating an "artisan" file
// ---------------------------------------------------------------------
/**
 * Returns a list of absolute paths for each directory that contains an artisan file.
 */
function findAllLaravelProjects(string $baseDir): array
{
    $projects = [];

    // We use a RecursiveDirectoryIterator + RecursiveIteratorIterator to walk through all folders
    $iterator = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($baseDir, FilesystemIterator::SKIP_DOTS)
    );

    foreach ($iterator as $fileInfo) {
        // Only care if we have an "artisan" file
        if ($fileInfo->getFilename() === 'artisan') {
            // The directory that has the artisan file is presumably a Laravel project
            $projectDir = $fileInfo->getPath();
            $projects[] = $projectDir;
        }
    }

    // Return unique directories
    return array_unique($projects);
}

// Actually find the project directories
$subLaravelProjects = findAllLaravelProjects($rootPath);

// ---------------------------------------------------------------------
// 3. Symlink creation function
//    Windows -> uses mklink /D
//    Linux/macOS -> uses PHP's symlink()
// ---------------------------------------------------------------------
function createVendorSymlink(string $rootVendor, string $projectVendor): bool
{
    // If Windows OS
    if (stripos(PHP_OS, 'WIN') === 0) {
        // Use mklink /D
        $cmd = sprintf('mklink /D "%s" "%s"', $projectVendor, $rootVendor);
        exec($cmd, $output, $returnVar);
        return ($returnVar === 0);
    } else {
        // Linux / macOS
        return @symlink($rootVendor, $projectVendor);
    }
}

// ---------------------------------------------------------------------
// 4. Create symlinks for each sub-Laravel project
// ---------------------------------------------------------------------
foreach ($subLaravelProjects as $projectDir) {
    // Skip if the projectDir is the same as our root (i.e. the main Laravel project).
    // If you actually DO want to symlink vendor for the root itself, remove this condition.
    if (realpath($projectDir) === realpath($rootPath)) {
        continue;
    }

    $projectVendor = $projectDir . DIRECTORY_SEPARATOR . 'vendor';

    // If there's already a vendor folder (or symlink), skip
    if (file_exists($projectVendor)) {
        echo "[SKIP] '{$projectDir}': 'vendor' folder already exists.\n";
        continue;
    }

    echo "[INFO] Creating symlink for '{$projectDir}/vendor' -> '{$rootVendor}'\n";

    $success = createVendorSymlink($rootVendor, $projectVendor);

    if ($success) {
        echo "[OK] Symlink created for '{$projectDir}/vendor'.\n";
    } else {
        echo "[ERROR] Failed to create symlink for '{$projectDir}'. Check permissions.\n";
    }
}

echo "[FINISHED] Symlink creation process completed.\n";
