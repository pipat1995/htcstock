// Fetch all the forms we want to apply custom Bootstrap validation styles to
var forms = document.getElementsByClassName('take-validation');
// Loop over them and prevent submission
Array.prototype.filter.call(forms, (form) => {
    form.addEventListener('submit', (event) => {
        if (parseInt(document.getElementById('validationQty').value) == 0) {
            document.getElementById('validationQty').value = ""
        }
        if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
        }
        form.classList.add('was-validated');
    }, false);
});
