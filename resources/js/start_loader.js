document.querySelectorAll('.file').forEach(loader => {
    const input = loader.querySelector('input[type="file"]');
    const label = loader.querySelector('label');
    const label_text = label.textContent;
    

    input.addEventListener('change', (e) => {
        const files = e.target.files;
        if (files) {
            let fileName = files[0].name.split('.')[0];
            const ext = '.' + files[0].name.split('.')[1];
            if (fileName.length > 20) {
                fileName = fileName.slice(0, 20) + '... ';
            }
            label.innerText = label_text + " ⋙ " + fileName + ext;
        }
    });
});