<?php

namespace Controllers;

class startController
{
    public static function create() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') redirect('/');

        $avatar = '';

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

        $result = [
            'name' => $_POST['name'],
            'about_me' => $_POST['about_me'],
            'experience' => $_POST['experience'],
        ];

        foreach ($_POST as $key => $value) {
            if (str_starts_with($key, 'social')) {
                $result['social_media'][] = $value;
            }
        }

        foreach ($_POST as $key => $value) {
            if (str_starts_with($key, 'skill_')) {
                $result['skills'][$value] = $_POST['skill-percent_' . $key[-1]];
            }
        }

        foreach ($_POST as $key => $value) {
            if (str_starts_with($key, 'project_')) {
                $result['projects'][] = [
                    'link' => $value,
                    'desc' => $_POST['project-description_' . $key[-1]]
                ];
            }
        }

        $result = json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

        file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/config/' . 'user.json', $result);
        redirect('/');
    }
}