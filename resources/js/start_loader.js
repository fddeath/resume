const input = document.getElementById('img');
const label = document.querySelector('.input_file');

input.addEventListener('change', (e) => {
    const files = e.target.files;
    if (files) {
        let fileName = files[0].name.split('.')[0];
        const ext = '.' + files[0].name.split('.')[1];
        if (fileName.length > 20) {
            fileName = fileName.slice(0, 20) + '... ';
        }
        label.innerText = fileName + ext;
    }
});