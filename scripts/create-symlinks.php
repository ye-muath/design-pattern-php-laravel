<?php
// File: scripts/create-symlinks.php
// (You might rename it to copy-vendor-to-subprojects.php to better reflect its purpose.)

declare(strict_types=1);

/**
 * This script loops through each sub-Laravel project and copies the root "vendor"
 * directory into that subproject's directory (where "artisan" would live).
 *
 * Usage:
 *   php scripts/create-symlinks.php
 */

// ---------------------------------------------------------------------
// 1. Setup paths
// ---------------------------------------------------------------------
$rootPath   = realpath(__DIR__ . '/../'); // The folder where composer.json lives
$rootVendor = $rootPath . DIRECTORY_SEPARATOR . 'vendor';

// ---------------------------------------------------------------------
// 2. Define the sub-Laravel projects
// ---------------------------------------------------------------------
// Option A: Hard-code sub-Laravel project directories:
$subLaravelProjects = [
    'behavioral-design-pattern/3.1.Chain-of-Responsibility-design-pattern-behavioral',
    'behavioral-design-pattern/3.10.Template-Method-design-pattern-behaviral',
    'behavioral-design-pattern/3.11.Visitor-design-pattern-behaviral',
    'behavioral-design-pattern/3.2.Command-design-pattern-behaviral',
    // ... etc ...
];

/**
// Option B: Dynamically find sub-Laravel projects by searching for "artisan" files, for example:
// This will look for any "artisan" file anywhere below $rootPath. 
// Then you can derive the project folder by using dirname() on that path.
//
// $artisanFiles = glob($rootPath . 'artisan', GLOB_BRACE);
// foreach ($artisanFiles as $artisan) {
//     $subLaravelProjects[] = str_replace($rootPath . DIRECTORY_SEPARATOR, '', dirname($artisan));
// }
// 
// Or a simpler approach: find sub-folders you consider Laravel if they have e.g. app/, routes/, etc.
 */

// ---------------------------------------------------------------------
// 3. Utility function: Recursively copy a directory
// ---------------------------------------------------------------------
function copyDirectoryRecursively(string $sourceDir, string $destDir): void
{
    // If the dest directory doesn’t exist, create it
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
// 4. Loop through each subproject & copy vendor
// ---------------------------------------------------------------------
foreach ($subLaravelProjects as $projectDir) {
    $absoluteProjectPath = $rootPath . DIRECTORY_SEPARATOR . $projectDir;

    // (Optional) Check if this really looks like a Laravel project by verifying "artisan" exists
    $artisanFile = $absoluteProjectPath . DIRECTORY_SEPARATOR . 'artisan';
    if (! file_exists($artisanFile)) {
        echo "Skipping '$projectDir': No artisan file found (not a Laravel project?).\n";
        continue;
    }

    // The vendor folder in the subproject
    $projectVendor = $absoluteProjectPath . DIRECTORY_SEPARATOR . 'vendor';

    // Skip if there's already a 'vendor' folder or symlink
    if (file_exists($projectVendor)) {
        echo "Skipping '$projectDir': 'vendor' already exists.\n";
        continue;
    }

    echo "Copying root 'vendor' to '{$projectDir}/vendor'...\n";
    copyDirectoryRecursively($rootVendor, $projectVendor);
    echo "Finished copying for '$projectDir'.\n";
}

echo "Vendor copy process completed.\n";
