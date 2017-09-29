window.onload = function() {
    let editor = ace.edit('custom-css');
    editor.setTheme("ace/theme/monokai");
    editor.getSession().setMode("ace/mode/css");

    let customCssTextarea = document.querySelector("#custom-css-textarea");
    let submitButton = document.querySelector("#submit");

    submitButton.addEventListener('click', (event) => {
        customCssTextarea.innerText = editor.getValue();
    });
}
