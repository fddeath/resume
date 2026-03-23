import data from '../../modules/start_config.json' with { type: 'json' };
let current_step = 0;

document.addEventListener('click', (e) => {
    const container = document.querySelector('.container');

    const form_info = container.querySelector('.form_info');
    const inputs = container.querySelectorAll('.step');

    const sign = container.querySelector('.sign');
    const title = container.querySelector('.title');
    const description = container.querySelector('.description');
    const button_space = container.querySelector('.button_space');
    const button = container.querySelector('.sign_button');
    const button_back = container.querySelector('.sign_button_back');

    // Button - next

    if (button && e.target === button && current_step < data['steps_info'].length) {
        let isset_step = false;

        button.className.split(' ').forEach(cls => {
            if (cls.split('_')[0] == 'step') {
                isset_step = true;
                current_step = +cls.split('_')[1] + 1;
            }
        });

        if (!isset_step) {
            button.classList.add('step_1');
            current_step = 1;
        }
        
        if (current_step > 0) {
            let old_step = '';
            button.className.split(' ').forEach(cls => {
                if (cls.split('_')[0] == 'step') {
                    old_step = cls;
                }
            });
            let new_step = old_step.split('_')[0] + '_' + current_step;

            button.classList.remove(old_step);
            button.classList.add(new_step);
            button.innerText = 'Далее';
        }
    }

    // Button - back

    if (button_back && e.target == button_back) {
        current_step--;
        if (current_step > 0) {
            let old_step = '';
            button.className.split(' ').forEach(cls => {
                if (cls.split('_')[0] == 'step') {
                    old_step = cls;
                }
            });
            let new_step = old_step.split('_')[0] + '_' + current_step;

            button.classList.remove(old_step);
            button.classList.add(new_step);
        }
    }

    // innerText in buttons

    if (button && current_step == data['steps_info'].length) {
        button.innerText = 'Готово';
    } else if (button && current_step != data['steps_info'].length) {
        button.innerText = 'Далее';
    }

    if (button_back && current_step < 2) {
        button_back.remove();
    }

    if (button_space && current_step > 1) {
        if (!button_back) button_space.insertAdjacentHTML('afterbegin', `<button class="button sign_button_back" type="button">Назад</button>`);
    }

    // Sing

    if (title && description && current_step > 0) {
        let text = false;
        data['steps_info'].forEach(step => {
            if (current_step == step['id']) {
                text = step['text'];
            }
        })
        title.innerText = 'Шаг ' + current_step;
        if (text) description.innerHTML = text;
        else description.innerText = 'Null';
    }

    // Form

    if (form_info && current_step > 0) {
        form_info.classList.remove('dNone');

        inputs.forEach(element => {
            const title = element.querySelector('.input_title');

            if (element.id == 'step_' + current_step) {
                element.classList.remove('dNone');

                let issetTitle = false;
                data['steps_info'].forEach(step => {
                    if (current_step == step['id']) {
                        issetTitle = step['title'];
                    }
                });
                if (issetTitle) title.innerText = issetTitle;
                else title.innerText = "Null";
            } else {
                element.classList.add('dNone');
            }
        });
    }
});