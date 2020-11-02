(function () {
    'use strict';

    document.addEventListener('DOMContentLoaded', function () {

        let contract = document.getElementById('validationContractDestsId')
        let poFile = document.getElementById('validationPurchaseOrderFile')
        let quotationFile = document.getElementById('validationQuotationFile')
        let coparationFile = document.getElementById('validationCoparationFile')

        let contractType = document.getElementById('validationContractType')
        // Supporting Documents
        displayFileName(poFile)
        displayFileName(quotationFile)
        displayFileName(coparationFile)

        // Comercial Terms
        if (contract) {
            comercialLists(contract.value)
        }
        // Payment Terms
        if (contractType) {
            changeType(contractType)
        }

    })

    window.addEventListener('load', function () {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        validationForm(forms)
    }, false);

})();

var changeType = (e) => {
    let secondContract = document.getElementById("contractType2")
    switch (e.value) {
        case '8':
            document.getElementById("contractType1").classList.remove('hide-contract');
            document.getElementById("contractType1").classList.add('show-contract');
            document.getElementById("contractType2").classList.remove('show-contract');
            document.getElementById("contractType2").classList.add('hide-contract');
            setValueOfContract(null)
            break;
        case '9':
            document.getElementById("contractType2").classList.remove('hide-contract');
            document.getElementById("contractType2").classList.add('show-contract');
            document.getElementById("contractType1").classList.remove('show-contract');
            document.getElementById("contractType1").classList.add('hide-contract');
            setValueOfContract(secondContract)
            break;
        default:
            document.getElementById("contractType1").classList.remove('show-contract');
            document.getElementById("contractType1").classList.add('hide-contract');
            document.getElementById("contractType2").classList.remove('show-contract');
            document.getElementById("contractType2").classList.add('hide-contract');
            setValueOfContract(null)
            break;
    }
}

var changeContractValue = (e) => {
    let el = document.getElementById(e.offsetParent.id)
    setValueOfContract(el)
    enterNoSubmit(e)
}
var setValueOfContract = (e) => {
    if (e) {
        let el = e.children[0].children
        let total = 100 - parseInt(el[0].children[0].value) - parseInt(el[1].children[0].value)
        el[2].children[0].value = total

        document.getElementsByName('value_of_contract')[0].value = `${el[0].children[0].value},${el[1].children[0].value},${el[2].children[0].value}`
    } else {
        document.getElementsByName('value_of_contract')[0].value = ""
    }

}
