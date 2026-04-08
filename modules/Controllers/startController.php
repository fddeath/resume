<?php

namespace Controllers;

class startController
{
    public static function create() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') redirect('/');

        $result = [];

        if (!empty($_POST['name']) && mb_strlen($_POST['name']) < 20 && mb_strlen($_POST['name']) > 3) $result['name'] = $_POST['name'];
        if (!empty($_POST['about_me']) && mb_strlen($_POST['about_me']) < 2000) $result['about_me'] = $_POST['about_me'];
        if (!empty($_POST['experience'] && mb_strlen($_POST['experience']) < 50)) $result['experience'] = $_POST['experience'];

        foreach ($_POST as $key => $value) {
            if (str_starts_with($key, 'social')) {
                if (!empty($value) && mb_strlen($value) < 255) $result['social_media'][] = $value;
            }

            if (str_starts_with($key, 'skill_')) {
                $percent = $_POST['skill-percent_' . $key[-1]];
                if (!empty($value) && $percent <= 100 && $percent >= 1) $result['skills'][$value] = $percent;
            }

            if (str_starts_with($key, 'project_')) {
                if (!empty($value) && mb_strlen($_POST['project-description_' . $key[-1]]) < 255) $result['projects'][] = [
                    'link' => $value,
                    'desc' => $_POST['project-description_' . $key[-1]]
                ];
            }
        }

        if (isset($result['name']) && isset($result['experience']) && isset($result['skills'])) {
            $result = json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            $dir = $_SERVER['DOCUMENT_ROOT'] . '/config';

            if (!is_dir($dir)) mkdir($dir . '/imgs', 0777, true);

            file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/config/' . 'user.json', $result);

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

            if (isset($_FILES['bg']) && $_FILES['bg']['error'] === UPLOAD_ERR_OK) {
                $file = $_FILES['bg'];
                $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
                $allowed = [
                    'png',
                    'jpeg',
                    'jpg'
                ];
                $name = 'bg' . '.' . 'jpeg';
                $path = $_SERVER['DOCUMENT_ROOT'] . '/config/imgs/';

                if (in_array($ext, $allowed)) move_uploaded_file($file['tmp_name'], $path . $name);
            }
        }

        redirect('/');
    }
}