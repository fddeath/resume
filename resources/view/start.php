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
                    <button type="button" class="input_button">Add</button>
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

                <p class="description">Для создания резюме нажми <b>"Начать"</b></p>

                <div class="button_space">
                    <button type="button" class="button sign_button">Начать</button>
                </div>
            </div>

        </form>
    </body>
</html>