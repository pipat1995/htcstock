(function () {
    'use strict';

    document.addEventListener('DOMContentLoaded', function () {
        let subtype = document.getElementById('validationSubType')
        changeSubType(subtype)
        displayFileBySubType(subtype)
    })

    window.addEventListener('load', function () {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        validationForm(forms)

    }, false);

})();

var changeSubType = (e) => {
    let uid = e.options[e.selectedIndex]
    let array = document.querySelectorAll('.sub-type')
    array.forEach(element => {
        if (element.id === uid.dataset.id) {
            let form = element.getElementsByTagName('form')[0]
            let key = form.querySelector("input[name='sub_type_contract_id']")
            key.value = uid.value
            element.classList.remove('hide-contract')
            element.classList.add('show-contract')
        } else {
            element.classList.remove('show-contract')
            element.classList.add('hide-contract')
        }
    });
}

var totalOfMaid = (e) => {
    let road = document.getElementById('validationRoad').value
    let building = document.getElementById('validationBuilding').value
    let toilet = document.getElementById('validationToilet').value
    let canteen = document.getElementById('validationCanteen').value
    let washing = document.getElementById('validationWashing').value
    let water = document.getElementById('validationWater').value
    let mowing = document.getElementById('validationMowing').value
    let general = document.getElementById('validationGeneral').value
    let total = parseInt(road) + parseInt(building) + parseInt(toilet) + parseInt(canteen) + parseInt(washing) + parseInt(water) + parseInt(mowing) + parseInt(general)
    document.getElementById('total').value = total
}


var displayFileBySubType = e => {
    let subtype = e.options[e.selectedIndex]
    if (subtype.dataset.id === 'bus-contract') {
        let quotationFile = document.getElementById('validationQuotationFile')
        let coparationFile = document.getElementById('validationCoparationFile')
        let transportation = document.getElementById('validationTransportationPermission')
        let vehicle = document.getElementById('validationVehicleRegistration')
        let route = document.getElementById('validationRoute')
        let insurance = document.getElementById('validationInsurance')
        let driver = document.getElementById('validationDriverLicense')
        // Supporting Documents
        displayFileName(quotationFile)
        displayFileName(coparationFile)
        displayFileName(transportation)
        displayFileName(vehicle)
        displayFileName(route)
        displayFileName(insurance)
        displayFileName(driver)
    }
    if (subtype.dataset.id === 'cleaning-contract') {
        
    }
    if (subtype.dataset.id === 'cook-contract') {
        
    }
    if (subtype.dataset.id === 'doctor-contract') {
        
    }
    if (subtype.dataset.id === 'nurse-contract') {
        
    }
    if (subtype.dataset.id === 'security-contract') {
        
    }
    if (subtype.dataset.id === 'subcontractor-contract') {
        
    }
    if (subtype.dataset.id === 'transportation-contract') {
        
    }
    if (subtype.dataset.id === 'it-contract') {
        
    }
}
