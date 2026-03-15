document.querySelectorAll('.dropdown_container').forEach((dropdown) =>{
    const button = dropdown.querySelector('.dropdown_button');
    const button_text = dropdown.querySelector('.dropdown_button-text');
    const list = dropdown.querySelector('.dropdown_list');
    const list_element = dropdown.querySelectorAll('.dropdown_list-element');
    const input = dropdown.querySelector('.dropdown_input');

    if (button) {
        button.addEventListener('click', () => {
            const open_dropdown = document.querySelectorAll('.dropdown_list.visibility');

            open_dropdown.forEach(dropdown => {
                if (dropdown != list) {
                    dropdown.classList.add('hidden');
                    dropdown.classList.remove('visibility');
                }
            });

            list.classList.toggle('hidden');
            list.classList.toggle('visibility');
        });
    }

    if (list) {
        list_element.forEach(element => {
            element.addEventListener('click', () => {
                list.classList.toggle('hidden');
                list.classList.toggle('visibility');
                input.value = element.dataset.value;
                button_text.innerText = element.innerText;
            });
        });
    }
});