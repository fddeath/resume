<?php

Route::add('/', 'GET', function () {
    $user = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/config/user.json'), true);

    $layout = new Layout('resume');

    $layout->insert([
        'title' => $user['name']
    ]);

    unset($layout);
});

Route::display();