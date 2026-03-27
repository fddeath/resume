import langs from '../../modules/langs.json' with { type: 'json' };
const langs_keys = Object.keys(langs);

document.addEventListener('click', (e) => {
    const cont = document.querySelector('.skills');
    const skills = cont.querySelectorAll('[id^="skill_"]');
    const button_add = document.querySelector('#button_add_skill');
    const id = skills.length + 1;
    
    if (button_add && e.target == button_add) {
        let promt = `
        <div class="skill">
                <section class="dropdown_container sign_dd" id="skill_` + id + `">
                    <button class="dropdown_button" type="button"><span class="dropdown_button-text button-text">Выбери язык</span></button>
                    <input
                        class="dropdown_input"
                        type="hidden"
                        name="skill_` + id + `"
                    >
                    <ul class="dropdown_list hidden dNone">`;
        
        langs_keys.forEach(key => {
            promt += `<li data-value="` + key + `" class="dropdown_list-element">` + langs[key]['title'] + `</li>`;
        });

        promt += `  </ul>
                </section>
                <input
                    class="skills_percent"
                    type="number"
                    name="skill-percent_` + id + `"
                    id="skills-percent_` + id + `"
                    placeholder="%"
                >
            </div>`;
        
        cont.insertAdjacentHTML('beforeend', promt)
    }
    
})