(function () {
    'use strict';

    document.addEventListener('DOMContentLoaded', function () {


    })

    window.addEventListener('load', function () {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        validationForm(forms)
    }, false);

})();
