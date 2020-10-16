(function () {
    'use strict';

    document.addEventListener('DOMContentLoaded', function () {
        let contract = document.getElementById('validationContractDestsId')
        let poFile = document.getElementById('validationPurchaseOrderFile')
        let quotationFile = document.getElementById('validationQuotationFile')
        let coparationFile = document.getElementById('validationCoparationFile')
        let boqFile = document.getElementById('validationBOQFile')

        let contractType = document.getElementById('validationContractType')
        let warranty = document.getElementById('validationWarranty')
        // Supporting Documents
        displayFileName(poFile)
        displayFileName(quotationFile)
        displayFileName(coparationFile)
        displayFileName(boqFile)
        // Comercial Terms
        comercialLists(contract.value)
        // Payment Terms
        changeType(contractType)
        // warranty
        calMonthToYear(warranty)

    })

    window.addEventListener('load', function () {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        validationForm(forms)
    }, false);
})();

var changeType = (e) => {
    let firstContract = document.getElementById("contractType1")
    switch (e.value) {
        case '4':
            firstContract.classList.remove('hide-contract');
            firstContract.classList.add('show-contract');
            setValueOfContract(firstContract)
            break;
        default:
            firstContract.classList.remove('show-contract');
            firstContract.classList.add('hide-contract');
            document.getElementsByName('value_of_contract')[0].value = ""
            break;
    }
}
var changeContractValue = (e) => {
    let el = document.getElementById(e.offsetParent.id)
    setValueOfContract(el)
    enterNoSubmit(e)
}
var setValueOfContract = (e) => {
    let el = e.children[0].children
    let total = 100 - parseInt(el[0].children[0].value) - parseInt(el[1].children[0].value)
    el[2].children[0].value = total

    document.getElementsByName('value_of_contract')[0].value = `${el[0].children[0].value},${el[1].children[0].value},${el[2].children[0].value}`
}
