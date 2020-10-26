(function () {
    'use strict';

    document.addEventListener('DOMContentLoaded', function () {

        let poFile = document.getElementById('validationPurchaseOrderFile')
        let quotationFile = document.getElementById('validationQuotationFile')

        // Supporting Documents
        displayFileName(poFile)
        displayFileName(quotationFile)
    })

    window.addEventListener('load', function () {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        let forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        validationForm(forms)
    }, false);

})();
