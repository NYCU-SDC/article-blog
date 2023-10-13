function validateTextarea() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
        .forEach(function (form) {
        form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
            }

            form.classList.add('was-validated')
        }, false)
        })
    // var textareaValue = document.getElementById('textareaId').value;
    // if (textareaValue.trim() === '') {
    //     alert('Textarea cannot be empty.');
    //     return false;
    // }
    // return true;
}