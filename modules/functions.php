<?php

function redirect(string $uri) {
    return header('Location: ' . $uri);
}

function dd(...$vars) {
    foreach ($vars as $var) {
        echo '<pre style="background: #18171b; color: #ffd000; padding: 20px; border-radius: 5px; margin: 10px; line-height: 1.5; font-family: monospace; z-index: 9999; position: relative;">';
        print_r($var);
        echo '</pre>';
    }
    die(1);
}