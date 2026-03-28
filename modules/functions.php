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

function renderLink(string $uri) {
    if (filter_var($uri, FILTER_VALIDATE_URL)) {
        if (str_contains($uri, 'github')) {
            return 'github';
        } else return parse_url($uri)['host'];
    }
}

function renderSkill(string $skill, int $percent) {
    $result = '<div class="skill">';
    $r = 40;
    $circumference = 3 * pi() * $r;
    $len = $circumference / 2; 
    $offset = 135;
    $result .= "
    <svg width='120' height='120'>
    <circle cx='60' cy='60' r='$r' 
            fill='none' 
            stroke='white' 
            stroke-width='10' 
            stroke-dasharray='$len $circumference' 
            transform='rotate($offset 60 60)' />
    ";
    $result .= '<p class="skill_name">' . strtoupper($skill) . '</p>';
    $result .= '<p class="skill_percent">' . $percent . '</p>';
    $result .= '</div>';

    return $result;
}