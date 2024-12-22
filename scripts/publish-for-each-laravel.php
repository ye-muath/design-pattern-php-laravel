<?php
// File: scripts/publish-for-each-laravel.php

declare(strict_types=1);

/**
 * This script loops through each subdirectory in the monorepo (recursively),
 * looks for a valid Laravel project (by checking for an 'artisan' file), 
 * and creates a symlink from its "vendor" folder to the shared "vendor" 
 * folder in the monorepo root. It also skips directories named ".git".
 *
 * Usage:
 *   php scripts/publish-for-each-laravel.php
 */

$rootPath    = realpath(__DIR__ . '/../'); // Where composer.json lives
$rootVendor  = $rootPath . DIRECTORY_SEPARATOR . 'vendor';
$directoryIt = new RecursiveDirectoryIterator($rootPath, RecursiveDirectoryIterator::SKIP_DOTS);
$iterator    = new RecursiveIteratorIterator($directoryIt);

foreach ($iterator as $fileInfo) {
    // We only care about folders
    if (!$fileInfo->isDir()) {
        continue;
    }

    $dirName = $fileInfo->getFilename();

    // Skip .git or any hidden folders if desired
    if ($dirName === '.git' || str_starts_with($dirName, '.')) {
        continue;
    }

    // Build the absolute path of this directory
    $absoluteProjectPath = $fileInfo->getRealPath();

    // Quick check: does this folder look like a Laravel project?
    // For example, if it contains an 'artisan' file.
    $artisanFile = $absoluteProjectPath . DIRECTORY_SEPARATOR . 'artisan';
    if (!file_exists($artisanFile)) {
        // Not a Laravel project, skip
        continue;
    }

    // The symlink path for vendor folder
    $projectVendor = $absoluteProjectPath . DIRECTORY_SEPARATOR . 'vendor';

    // Skip if there's already a vendor folder or symlink
    if (file_exists($projectVendor)) {
        echo "[SKIP] {$absoluteProjectPath}: 'vendor' already exists.\n";
        continue;
    }

    echo "[INFO] Creating symlink for Laravel project at {$absoluteProjectPath}\n";

    // Attempt symlink creation
    if (stripos(PHP_OS, 'WIN') === 0) {
        // Windows
        $cmd = sprintf('mklink /D "%s" "%s"', $projectVendor, $rootVendor);
        exec($cmd, $output, $returnVar);

        if ($returnVar === 0) {
            echo "[OK] Created Windows symlink: {$projectVendor} -> {$rootVendor}\n";
        } else {
            echo "[ERR] Failed to create Windows symlink for '{$absoluteProjectPath}'.\n";
        }
    } else {
        // Linux / Mac
        $success = @symlink($rootVendor, $projectVendor);
        if ($success) {
            echo "[OK] Created symlink: {$projectVendor} -> {$rootVendor}\n";
        } else {
            echo "[ERR] Failed to create symlink for '{$absoluteProjectPath}'. Check permissions.\n";
        }
    }
}

echo "[DONE] Symlink creation process completed.\n";
