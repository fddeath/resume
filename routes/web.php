<?php

Route::add('/', 'GET', function () {
    global $user;
    $layout = new Layout('resume');
    $content = '';

    if (isset($user['experience'])) {
        $experience = 'Опыт работы: ' . $user['experience'];
    }

    if (isset($user['social_media'])) {
        $social_media = '<ul class="social_media">';
        foreach ($user['social_media'] as $link) {
            $social_media .= '<li><a class="social" href="' . $link . '" target="_blank" rel="noopener noreferrer">' . linkSVG($link) . '</a></li>';
        }
        $social_media .= '</ul>';
    }

    if (isset($user['skills'])) {
        $skills = '<div class="content_container skills_container">';
        $skills .= '<h2>Навыки</h2>';
        $skills .= '<div class="skills">';
        foreach ($user['skills'] as $key => $value) {
            $skills .= renderSkill($key, $value);
        }
        $skills .= '</div>';
        $skills .= '</div>';

        $content .= $skills;
    }

    if (isset($user['about_me'])) {
        $about_me = '<div class="content_container about_me">';
        $about_me .= '<h2>О себе</h2>';
        $about_me .= '<p class="p10">' . $user['about_me'] . '</p>';
        $about_me .= '</div>';

        $content .= $about_me;
    }

    if (isset($user['projects'])) {
        $projects = '<div class="content_container">';
        $projects .= '<h2>Мои проекты</h2>';
        $projects .= '<div class="content_container projects">';
        foreach ($user['projects'] as $value) {
            $link = parse_url($value['link']);
            $projects .= "<div class='project p10'><h3><a href='{$value['link']}' target='_blank' rel='noopener noreferrer'>{$link['host']}</a></h3><p class='p10'>{$value['desc']}</p></div>";
        }
        $projects .= '</div>';
        $projects .= '</div>';

        $content .= $projects;
    }

    $layout->insert([
        'title' => $user['name'] ?? '',
        'name' => $user['name'] ?? '',
        'experience' => $experience ?? '',
        'social_media' => $social_media  ?? '',
        'content' => $content  ?? ''
    ]);
});

Route::display();