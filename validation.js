function validateTextarea() {
    var textareaValue = document.getElementById('textareaId').value;
    if (textareaValue.trim() === '') {
        alert('Textarea cannot be empty.');
        return false;
    }
    return true;
}