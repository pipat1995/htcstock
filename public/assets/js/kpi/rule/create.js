(function () {
    'use strict';

    document.addEventListener('DOMContentLoaded', function () {
        // Supporting Documents
        $(".js-select-status-multiple").select2({
            placeholder: 'Select status',
            allowClear: true
        });
        $(".js-select-agreements-multiple").select2({
            placeholder: 'Select agreements',
            allowClear: true
        });
    })

    window.addEventListener('load', function () {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        let forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        validationForm(forms)
    }, false);

})();
