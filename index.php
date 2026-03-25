<?php

spl_autoload_register(function ($className) {
    $file = __DIR__ . '/modules/' . str_replace('\\', '/', $className) . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});

require_once __DIR__ . '/modules/functions.php';

require_once 'routes/web.php';