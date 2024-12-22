<?php

declare(strict_types=1);

/**
 * Recursively finds all subdirectories containing an "artisan" file (Laravel projects),
 * and copies the root "vendor" folder to each of those subdirectories.
 *
 * Usage:
 *   php scripts/recursive-copy-vendor.php
 */

// ---------------------------------------------------------------------
// 1. Where is our root folder & vendor folder?
// ---------------------------------------------------------------------
$rootPath   = realpath(__DIR__ . '/../'); // The folder where composer.json + the main vendor live
$rootVendor = $rootPath . DIRECTORY_SEPARATOR . 'vendor';

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

            // Avoid duplicates if the script finds multiple "artisan" files
            // (or if the same directory is processed more than once)
            $projects[] = $projectDir;
        }
    }

    // Return unique directories
    return array_unique($projects);
}

// Actually find the project directories
$subLaravelProjects = findAllLaravelProjects($rootPath);

// ---------------------------------------------------------------------
// 3. Utility: Recursively copy a directory
// ---------------------------------------------------------------------
function copyDirectoryRecursively(string $sourceDir, string $destDir): void
{
    if (! is_dir($destDir)) {
        mkdir($destDir, 0755, true);
    }

    $dir = new RecursiveDirectoryIterator($sourceDir, RecursiveDirectoryIterator::SKIP_DOTS);
    $iterator = new RecursiveIteratorIterator($dir, RecursiveIteratorIterator::SELF_FIRST);

    foreach ($iterator as $item) {
        $targetPath = $destDir . DIRECTORY_SEPARATOR . $iterator->getSubPathName();

        if ($item->isDir()) {
            if (! is_dir($targetPath)) {
                mkdir($targetPath, 0755, true);
            }
        } else {
            copy($item->getPathname(), $targetPath);
        }
    }
}

// ---------------------------------------------------------------------
// 4. Copy the root "vendor" folder into each sub-Laravel project
// ---------------------------------------------------------------------
foreach ($subLaravelProjects as $projectDir) {
    // Skip if the projectDir is the same as our root (i.e., the main Laravel or root composer).
    // If you DO want to copy into your main project as well, remove this condition.
    if (realpath($projectDir) === realpath($rootPath)) {
        continue;
    }

    $projectVendor = $projectDir . DIRECTORY_SEPARATOR . 'vendor';

    // If there's already a vendor folder, skip
    if (file_exists($projectVendor)) {
        echo "[SKIP] '{$projectDir}': 'vendor' folder already exists.\n";
        continue;
    }

    echo "[INFO] Copying root 'vendor' to '{$projectDir}/vendor'...\n";
    copyDirectoryRecursively($rootVendor, $projectVendor);
    echo "[DONE] Copied 'vendor' for project at '{$projectDir}'\n";
}

echo "[FINISHED] Vendor copy process completed.\n";
