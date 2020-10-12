(function () {
    'use strict';

    document.addEventListener('DOMContentLoaded', function () {


    })

    window.addEventListener('load', function () {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        document.getElementById('validationDate').value = new Date().toDateInputValue();
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission

        validationForm(forms)
    }, false);

})();
class ComercialList {
    constructor(description = null, unit_price = null, discount = null, amount = null) {
        this.description = description;
        this.unit_price = unit_price;
        this.discount = discount;
        this.amount = amount;
    }
}
var comercialList = []
var createRow = () => {
    let model = new ComercialList
    model.description = document.getElementById('validationDescription').value
    model.unit_price = parseFloat(document.getElementById('validationUnitPrice').value)
    model.discount = parseFloat(document.getElementById('validationDiscount').value)
    model.amount = parseFloat(document.getElementById('validationAmount').value)
    comercialList.push(model);

    // console.log(comercialList[comercialList.length - 1])
    const table = document.getElementById('table-comercial-lists').tBodies[0]
    var newRow = table.insertRow()
    var newCell0 = newRow.insertCell(0),
        newCell1 = newRow.insertCell(1),
        newCell2 = newRow.insertCell(2),
        newCell3 = newRow.insertCell(3),
        newCell4 = newRow.insertCell(4)

    var btn = document.createElement('button')
    btn.innerHTML = "delete"
    btn.type = 'button'
    btn.className = 'btn btn-danger sm'
    btn.setAttribute('onclick', 'deleteRow(this)')
    newCell0.appendChild(btn)
    newCell1.appendChild(document.createTextNode(comercialList[comercialList.length - 1].description))
    newCell2.appendChild(document.createTextNode(comercialList[comercialList.length - 1].unit_price))
    newCell3.appendChild(document.createTextNode(comercialList[comercialList.length - 1].discount))
    newCell4.appendChild(document.createTextNode(comercialList[comercialList.length - 1].amount))
    document.getElementById('total').textContent = comercialList.reduce((previousValue, currentValue) => previousValue + currentValue.amount, 0)
    console.log(comercialList);
}

var deleteRow = (e) => {
    const table = document.getElementById('table-comercial-lists').tBodies[0]
    comercialList.shift()
    table.deleteRow(1)
    document.getElementById('total').textContent = comercialList.reduce((previousValue, currentValue) => previousValue + currentValue.amount, 0)
}

var changeType = (e) => {
    switch (e.value) {
        case '1':
            document.getElementById("contractType1").classList.remove('hide-contract');
            document.getElementById("contractType1").classList.add('show-contract');

            document.getElementById("contractType2").classList.add('hide-contract');
            document.getElementById("contractType2").classList.remove('show-contract');
            break;
        case '2':
            document.getElementById("contractType2").classList.remove('hide-contract');
            document.getElementById("contractType2").classList.add('show-contract');

            document.getElementById("contractType1").classList.add('hide-contract');
            document.getElementById("contractType1").classList.remove('show-contract');
            break;
        default:
            document.getElementById("contractType1").classList.remove('show-contract');
            document.getElementById("contractType2").classList.remove('show-contract');
            document.getElementById("contractType1").classList.add('hide-contract');
            document.getElementById("contractType2").classList.add('hide-contract');
            break;
    }
}
