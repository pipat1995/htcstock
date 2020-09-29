(function () {
    'use strict';

    document.addEventListener('DOMContentLoaded', function () {


    })

    window.addEventListener('load', function () {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function (form) {
            form.addEventListener('submit', function (event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);

})();

var changeSubType = (e) => {
    let uid = e.options[e.selectedIndex].dataset.id
    let array = document.querySelectorAll('.sub-type')
    array.forEach(element => {
        if (element.id === uid) {
            element.classList.remove('hide-contract')
            element.classList.add('show-contract')
        }else{
            element.classList.remove('show-contract')
            element.classList.add('hide-contract')
        }
    });
}
