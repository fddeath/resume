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

function linkSVG(string $uri) {
    if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/modules/social_media.json")) $social_media = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/modules/social_media.json"), true);
    else return;

    if (filter_var($uri, FILTER_VALIDATE_URL)) {
        $host = parse_url($uri)['host'];
        $site = false;
        
        foreach ($social_media as $key => $value) {
            if (str_contains($host, $key)) $site = $key;
        }

        if ($site) return $social_media[$site]['svg'];
        else return $social_media['__link']['svg'];
    }
}

function renderSkill(string $skill, int $percent) {
    $result = '<div class="skill">';
    $r = 40;
    $circumference = 3 * pi() * $r;
    $len = $circumference / 2; 
    $offset = 135;

    $progress = $percent / 100;

    $len_percent = ($circumference * $progress) / 2;
    $circumference_percent = 314;
    $result .= "
    <svg>
    <circle class='progress_bar' cx='60' cy='60' r='$r' 
            fill='none' 
            stroke='white' 
            stroke-width='9' 
            stroke-dasharray='$len $circumference' 
            transform='rotate($offset 60 60)' />
    <circle class='progress_bar-fill' cx='60' cy='60' r='$r' 
            fill='none' 
            stroke='lime' 
            stroke-width='11' 
            stroke-dasharray='$len_percent $circumference_percent' 
            transform='rotate($offset 60 60)' />
    ";
    $result .= '<p class="skill_name">' . strtoupper($skill) . '</p>';
    $result .= '<p class="skill_percent">' . $percent . '</p>';
    $result .= '</div>';

    return $result;
}