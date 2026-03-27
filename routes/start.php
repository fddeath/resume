<?php

use Controllers\startController;

Route::add('/', 'GET', 'start');
Route::add('/start', 'POST', function () {
    return (new startController)->create();
});

Route::display();