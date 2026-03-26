<?php

namespace Controller;

class startController
{
    public static function create() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') redirect('/');

        if (isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
            $file = $_FILES['img'];
            $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
            $allowed = [
                'png',
                'jpeg',
                'jpg'
            ];
            $name = 'avatar' . '.' . 'jpeg';
            $path = $_SERVER['DOCUMENT_ROOT'] . '/config/imgs/';

            if (in_array($ext, $allowed)) move_uploaded_file($file['tmp_name'], $path . $name);
        }

        $result = json_encode($_POST, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

        file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/config/' . 'user.json', $result);
        redirect('/');
    }
}