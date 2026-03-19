let current_step = 0;

document.addEventListener('click', (e) => {
    const title = document.querySelector('.title');
    const description = document.querySelector('.description');
    const button_space = document.querySelector('.button_space');
    const button = document.querySelector('.sign_button');
    const button_back = document.querySelector('.sign_button_back');

    // Button - next

    if (button && e.target == button) {
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

    if (button_back && current_step <= 2) {
        button_back.remove();
    }

    if (button_space && current_step > 1) {
        if (!button_back) button_space.insertAdjacentHTML('afterbegin', `<button class="button sign_button_back">Назад</button>`);
    }

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

    // Title

    if (title && current_step > 0) {
        title.innerText = 'Шаг ' + current_step;
    }

    // Description

    if (description && current_step > 0) {
        description.innerText = current_step;
    }
});