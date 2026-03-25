<?php

$langs = [];

if (file_exists(__DIR__ . '/../../modules/langs.json')) {
    $file = file_get_contents(__DIR__ . '/../../modules/langs.json');
    $langs = json_decode($file, true);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume</title>

    <link rel="stylesheet" href="resources/css/vars.css">
    <link rel="stylesheet" href="resources/css/main.css">
    <link rel="stylesheet" href="resources/css/start.css">
    <link rel="shortcut icon" href=" " type="image/x-icon">

    <script type="module" src="resources/js/start.js" defer></script>
    <script type="module" src="resources/js/start_slills.js" defer></script>
    <script src="resources/js/dropdown.js" defer></script>
</head>
    <body>
        <form class="container" action="" method="post">

            <div class="form_info dNone">
                <div id="step_1" class="step dNone">
                    <h3 class="input_title">Title</h3>
                    <div class="input_container">
                        <input
                            type="text" 
                            name="name"
                            placeholder="Имя"
                        >
                    </div>
                    <div class="input_container">
                        <input
                            class="dNone"
                            type="file" 
                            name="img"
                            id="img"
                        >
                        <label for="img" class="input_file">Фото профиля</label>
                    </div>
                    <div class="input_container">
                        <textarea
                            name="about_me"
                            cols="30"
                            placeholder="О себе"
                        ></textarea>
                    </div>
                </div>
                <div id="step_2" class="step dNone">
                    <h3 class="input_title">Title</h3>
                    <div class="input_container">
                        <input
                            type="text" 
                            name="experience"
                            placeholder="Опыт работы"
                        >
                    </div>
                    <div class="skills">
                        <div class="skill">
                            <section class="dropdown_container sign_dd" id="skill_1">
                                <button class="dropdown_button" type="button"><span class="dropdown_button-text button-text">Выбери язык</span></button>
                                <input
                                    class="dropdown_input"
                                    type="hidden"
                                    name="skill_1"
                                >
                                <ul class="dropdown_list hidden dNone">
                                    <?php
                                    
                                    foreach ($langs as $key => $value) {
                                        echo '<li data-value="' . $key . '" class="dropdown_list-element">' . $langs[$key]['title'] . '</li>';
                                    }

                                    ?>
                                </ul>
                            </section>
                            <input
                                class="skills_percent"
                                type="number"
                                name="skill-percent_1"
                                id="skill-percent_1"
                                placeholder="%"
                                max="100"
                            >
                        </div>
                    </div>
                    <button type="button" class="input_button" id="button_add_skill">Add</button>
                </div>
                <div id="step_3" class="step dNone">
                    <h3 class="input_title">Title</h3>
                    <div class="input_container">
                        <input
                            type="text" 
                            name="social"
                            placeholder="URL"
                        >
                    </div>
                    <button type="button" class="input_button">Add</button>
                </div>
                <div id="step_4" class="step dNone">
                    <h3 class="input_title">Title</h3>
                    <div class="input_container">
                        <input
                            type="text" 
                            name="projects"
                            placeholder="URL"
                        >
                    </div>
                    <div class="input_container">
                        <textarea
                            name="about_me"
                            cols="30"
                            placeholder="Описание проделанных работ"
                        ></textarea>
                    </div>
                    <button type="button" class="input_button">Add</button>
                </div>
            </div>

            <div class="sign">
                <h2 class="title">CloudSpace | Resume</h2>

                <p class="description"><span class="main_description">Для создания резюме нажми <b>"Начать"</b></span></p>

                <div class="button_space">
                    <button type="button" class="button sign_button">Начать</button>
                </div>
            </div>

        </form>
    </body>
</html>