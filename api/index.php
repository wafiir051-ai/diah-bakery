<?php

// Vercel entrypoint for Laravel (vercel-php runtime).
// The deployment filesystem is read-only except /tmp, so point all writable paths there.

$tmp = '/tmp/storage';
foreach (['app/public', 'framework/cache/data', 'framework/sessions', 'framework/views', 'logs'] as $dir) {
    if (! is_dir("$tmp/$dir")) {
        mkdir("$tmp/$dir", 0777, true);
    }
}

$_ENV['LARAVEL_STORAGE_PATH'] = $tmp;
putenv("LARAVEL_STORAGE_PATH=$tmp");

// Fallback to the pre-seeded SQLite file (ephemeral in /tmp) when no Postgres connection is configured.
if (! getenv('DB_HOST')) {
    $db = '/tmp/database.sqlite';
    if (! file_exists($db)) {
        copy(__DIR__.'/../database/seed.sqlite', $db);
    }
    $_ENV['DB_CONNECTION'] = 'sqlite';
    putenv('DB_CONNECTION=sqlite');
    $_ENV['DB_DATABASE'] = $db;
    putenv("DB_DATABASE=$db");
}

define('LARAVEL_START', microtime(true));

require __DIR__.'/../vendor/autoload.php';

/** @var Illuminate\Foundation\Application $app */
$app = require_once __DIR__.'/../bootstrap/app.php';

$app->handleRequest(Illuminate\Http\Request::capture());
