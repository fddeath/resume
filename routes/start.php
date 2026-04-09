<?php

use Controllers\startController;

Route::add('/', 'GET', 'start');
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/config/user.json')) {
    Route::add('/start', 'POST', function () {
        return (new startController)->create();
    });
}

Route::display();