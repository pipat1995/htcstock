(function () {
    'use strict';

    document.addEventListener('DOMContentLoaded', function () {
        // Supporting Documents
        // $("#validationDepartment").select2({
        //     placeholder: 'Select department',
        //     allowClear: true
        // });
        // $("#validationRuleTemplate").select2({
        //     placeholder: 'Select RuleTemplate',
        //     allowClear: true
        // });

        getRuleTemplate(template).then(res => {
            createRow(res.data)
        })
    })

    window.addEventListener('load', function () {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        let forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        validationForm(forms)
    }, false);
})();


function formSubmit() {
    document.getElementById('form-template').submit()
}
