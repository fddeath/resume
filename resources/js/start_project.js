document.addEventListener('click', (e) => {
    const btn = document.querySelector('#add_project');
    let count = document.querySelectorAll('[name^="project_"]').length;

    if (e.target == btn) {
        btn.insertAdjacentHTML('beforebegin', `
            <div class="input_container">
                <input
                    type="text" 
                    name="project_${count + 1}"
                    placeholder="URL"
                >
            </div>
            <div class="input_container">
                <textarea
                    name="project-description_${count + 1}"
                    cols="30"
                    placeholder="Описание проделанных работ"
                ></textarea>
            </div>
        `);
    }
})