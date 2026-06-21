<?php

// Vercel read-only filesystem workaround - redirect storage paths to /tmp
$storagePaths = [
    '/tmp/storage/app/public',
    '/tmp/storage/framework/cache/data',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/framework/testing',
    '/tmp/storage/framework/views',
    '/tmp/storage/logs',
];

foreach ($storagePaths as $path) {
    if (!is_dir($path)) {
        mkdir($path, 0755, true);
    }
}

// Bind Vercel specific paths to application
putenv('APP_STORAGE=/tmp/storage');

// Forward Vercel serverless requests to Laravel's public entrypoint
require __DIR__ . '/../public/index.php';
