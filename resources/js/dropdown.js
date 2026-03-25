document.addEventListener('click', (e) => {
    const dropdown_container = document.querySelectorAll('.dropdown_container');

    if (dropdown_container) {
        dropdown_container.forEach((dropdown) =>{
            const button = dropdown.querySelector('.dropdown_button');
            const button_text = dropdown.querySelector('.dropdown_button-text');
            const list = dropdown.querySelector('.dropdown_list');
            const list_element = dropdown.querySelectorAll('.dropdown_list-element');
            const input = dropdown.querySelector('.dropdown_input');

            if (e.target == button) {
                const open_dropdown = document.querySelectorAll('.dropdown_list.visibility');

                open_dropdown.forEach(dropdown => {
                    if (dropdown != list) {
                        dropdown.classList.add('dNone');
                        dropdown.classList.add('hidden');
                        dropdown.classList.remove('visibility');
                    }
                });

                list.classList.toggle('dNone');
                list.classList.toggle('hidden');
                list.classList.toggle('visibility');
            }

            if (list) {
                list_element.forEach(element => {
                    if (e.target == element) {
                        list.classList.toggle('dNone');
                        list.classList.toggle('hidden');
                        list.classList.toggle('visibility');
                        input.value = element.dataset.value;
                        button_text.innerText = element.innerText;
                    }
                });
            }

            if (input.value) {
                list_element.forEach(element => {
                    if (element.dataset.value == input.value) button_text.innerText = element.innerText;
                });
            }
        });
    }
})