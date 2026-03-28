<?php

Route::add('/', 'GET', function () {
    global $user;
    $layout = new Layout('resume');

    $social_media = '<ul>';
    foreach ($user['social_media'] as $value) {
        $name = renderLink($value);
        
        $social_media .= "<li><a href=\"{$value}\" target=\"_blank\" rel=\"noopener noreferrer\">$name</a></li>";
    }
    $social_media .= '</ul>';

    $skills = '<div class="skills_container">';
    foreach ($user['skills'] as $key => $value) {
        $skills .= renderSkill($key, $value);
    }
    $skills .= '</div>';

    $projects = '<div class="content_container projects">';
    foreach ($user['projects'] as $value) {
        $projects .= "<div class='project p10'><h3>{$value['link']}</h3><p>{$value['desc']}</p></div>";
    }
    $projects .= '</div>';

    $layout->insert([
        'title' => $user['name'],
        'name' => $user['name'],
        'experience' => $user['experience'],
        'social_media' => $social_media,
        'about_me' => '<p class="p10">' . $user['about_me'] . '</p>',
        'skills' => $skills,
        'projects' => $projects,
    ]);
});

Route::display();