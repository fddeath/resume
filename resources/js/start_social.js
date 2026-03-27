document.addEventListener('click', (e) => {
    const btn = document.querySelector('#add_social');
    let count = document.querySelectorAll('[name^="social_"]').length;

    if (e.target == btn) {
        btn.insertAdjacentHTML('beforebegin', `
            <div class="input_container">
                <input
                    type="text" 
                    name="social_${count + 1}"
                    placeholder="URL"
                >
            </div>
        `);
    }
})