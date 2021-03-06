(function () {
    'use strict';

    document.addEventListener('DOMContentLoaded', function () {
        let contract = document.getElementById('validationContractDestsId')
        let poFile = document.getElementById('validationPurchaseOrderFile')
        let quotationFile = document.getElementById('validationQuotationFile')
        let coparationFile = document.getElementById('validationCoparationFile')
        let workPlanFile = document.getElementById('validationWorkPlan')

        let contractType = document.getElementById('validationContractType')
        let warranty = document.getElementById('validationWarranty')
        // Supporting Documents
        displayFileName(poFile)
        displayFileName(quotationFile)
        displayFileName(coparationFile)
        displayFileName(workPlanFile)

        // Comercial Terms
        if (contract) {
            comercialLists(contract.value)
        }

        // Payment Terms
        if (contractType) {
            changeType(contractType)
        }

        // warranty
        calMonthToYear(warranty)
    })

    window.addEventListener('load', function () {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        // document.getElementById('validationDate').value = new Date().toDateInputValue();
        let forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        validationForm(forms)
    }, false);
})();

var changeType = (e) => {
    let firstContract = document.getElementById("contractType1")
    let secondContract = document.getElementById("contractType2")
    switch (e.value) {
        case '1':
            firstContract.classList.remove('hide-contract')
            firstContract.classList.add('show-contract')
            setValueOfContract(firstContract)
            secondContract.classList.add('hide-contract')
            secondContract.classList.remove('show-contract')

            break;
        case '2':
            secondContract.classList.remove('hide-contract')
            secondContract.classList.add('show-contract')
            setValueOfContract(secondContract)
            firstContract.classList.add('hide-contract')
            firstContract.classList.remove('show-contract')

            break;
        default:
            firstContract.classList.remove('show-contract')
            secondContract.classList.remove('show-contract')
            firstContract.classList.add('hide-contract')
            secondContract.classList.add('hide-contract')
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
