(function () {
    'use strict';

    document.addEventListener('DOMContentLoaded', function () {
        let contract = document.getElementById('validationContractDestsId')

        let quotationFile = document.getElementById('validationQuotationFile')
        let coparationFile = document.getElementById('validationCoparationFile')
        let factoryPermissionFile = document.getElementById('validationFactoryPermission')
        let wastePermissionFile = document.getElementById('validationWastePermission')

        let contractType = document.getElementById('validationContractType')

        // Supporting Documents
        displayFileName(quotationFile)
        displayFileName(coparationFile)
        displayFileName(factoryPermissionFile)
        displayFileName(wastePermissionFile)
        // Comercial Terms
        comercialLists(contract.value)
        // Payment Terms
        changeType(contractType)

    })

    window.addEventListener('load', function () {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation')
        // Loop over them and prevent submission
        validationForm(forms)
    }, false);

})();


var changeType = (e) => {
    let firstContract = document.getElementById("contractType1")
    switch (e.value) {
        case '7':
            firstContract.classList.remove('hide-contract')
            firstContract.classList.add('show-contract')
            setValueOfContract(firstContract)
            break;
        default:
            firstContract.classList.remove('show-contract')
            firstContract.classList.add('hide-contract')
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
    document.getElementsByName('value_of_contract')[0].value = `${el[0].children[0].value}`
}
