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

        $result = [];

        if (!empty($_POST['name'])) $result['name'] = $_POST['name'];
        if (!empty($_POST['about_me'])) $result['about_me'] = $_POST['about_me'];
        if (!empty($_POST['experience'])) $result['experience'] = $_POST['experience'];

        foreach ($_POST as $key => $value) {
            if (str_starts_with($key, 'social')) {
                if (!empty($value)) $result['social_media'][] = $value;
            }
            if (str_starts_with($key, 'skill_')) {
                if (!empty($value)) $result['skills'][$value] = $_POST['skill-percent_' . $key[-1]];
            }
            if (str_starts_with($key, 'project_')) {
                if (!empty($value)) $result['projects'][] = [
                    'link' => $value,
                    'desc' => $_POST['project-description_' . $key[-1]]
                ];
            }
        }

        $result = json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

        $dir = $_SERVER['DOCUMENT_ROOT'] . '/config';

        if (!is_dir($dir)) mkdir($dir, 0777, true);

        file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/config/' . 'user.json', $result);
        redirect('/');
    }
}