<?php

function createDropdown(string $title, array $elements, string | null $class = null, string | null $id = null) : string {
    $result = '<section class="dropdown_container' . (isset($class) ? (' ' . $class) : '') . '" id="' . (isset($id) ? $id : '') . '">';
    $result .= '<button class="dropdown_button" type="button"><span class="dropdown_button-text button-text">' . $title . '</span></button>';
    $result .= '
        <input
            class="dropdown_input"
            type="hidden"
        >
    ';
    $result .= '<ul class="dropdown_list hidden dNone">';

    foreach ($elements as $key => $value) {
        $result .= '<li data-value="' . $key . '" class="dropdown_list-element">' . $value . '</li>';
    }

    $result .= '</ul>';
    $result .= '</section>';

    return $result;
}