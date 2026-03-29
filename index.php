<?php

spl_autoload_register(function ($className) {
    $file = __DIR__ . '/modules/' . str_replace('\\', '/', $className) . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});

require_once __DIR__ . '/modules/functions.php';

if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/config/user.json')) $user = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/config/user.json'), true);

require_once 'routes/web.php';