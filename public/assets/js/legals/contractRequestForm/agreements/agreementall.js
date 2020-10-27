var createRow = () => {
    let description = null,
        unit_price = 0,
        discount = 0,
        amount = 0,
        id = null
    let div = document.getElementById('table-comercial-lists')
    let selectElemen = div.querySelectorAll('input')
    // validation input
    selectElemen.forEach(element => {

        if (element.name === 'description') {
            description = element.value
        }
        if (element.name === 'unit_price') {
            unit_price = parseFloat(element.value)
        }
        if (element.name === 'discount') {
            discount = parseFloat(element.value)
        }
        if (element.name === 'amount') {
            amount = parseFloat(element.value)
        }
        if (element.name === 'contract_dests_id') {
            id = element.value
        }
    })

    let formData = formDataComercialLists(description, unit_price, discount, amount, id)
    postComercialLists(formData).then(result => {
        comercialLists(result.data.id)
    }).catch(err => {
        let errors = err.response.data.errors
        console.log(errors);
        for (const key in errors) {
            if (errors.hasOwnProperty(key)) {
                const element = errors[key];
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: `${element}`,
                    showConfirmButton: false,
                    timer: 5000
                })
            }
        }
    }).finally(() => {

    })
}

var deleteRow = (id) => {
    deleteComercialLists(id).then(result => {
        if (result.data.status) {
            comercialLists(document.getElementById('validationContractDestsId').value)
        }
    }).catch(err => {
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Purchase list delete fail',
            showConfirmButton: false,
            timer: 2000
        })
    })
}

var formDataComercialLists = (description, unitPrice, discount, amount, id) => {
    var formData = new FormData()
    formData.append('description', description);
    formData.append('unit_price', unitPrice);
    formData.append('discount', discount);
    formData.append('amount', amount);
    formData.append('contract_dests_id', id)
    return formData
}

var postComercialLists = formData => {
    return axios.post('/legal/contract-request/comerciallists', formData)
}

var getComercialLists = id => {
    return axios.get('/legal/contract-request/comerciallists/' + id + '/edit')
}

var deleteComercialLists = id => {
    return axios.delete('/legal/contract-request/comerciallists/' + id)
}

var generateRowFromComercial = (data) => {
    const table = document.getElementById('table-comercial-lists').tBodies[0]
    let newRow = table.insertRow()
    let newCell0 = newRow.insertCell(0),
        newCell1 = newRow.insertCell(1),
        newCell2 = newRow.insertCell(2),
        newCell3 = newRow.insertCell(3),
        newCell4 = newRow.insertCell(4)
    let btn = document.createElement('button')
    btn.innerHTML = "delete"
    btn.type = 'button'
    btn.className = 'btn btn-danger sm'
    btn.setAttribute('onclick', `deleteRow(${data.id})`)

    newCell0.appendChild(btn)
    newCell1.appendChild(document.createTextNode(data.description))
    newCell2.appendChild(document.createTextNode(data.unit_price))
    newCell3.appendChild(document.createTextNode(data.discount))
    newCell4.appendChild(document.createTextNode(data.amount))
}

var comercialLists = (id) => {
    if (id) {
        getComercialLists(id).then(result => {
            document.getElementById('table-comercial-lists').tBodies[0].innerHTML = ""
            result.data.forEach(element => {
                generateRowFromComercial(element)
            });

            document.getElementById('total').textContent = result.data.reduce((previousValue, currentValue) => previousValue + currentValue.amount, 0)

        }).catch(err => {
            let errors = err.response.data.errors
            console.log(errors);
            for (const key in errors) {
                if (errors.hasOwnProperty(key)) {
                    const element = errors[key];
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: `${element}`,
                        showConfirmButton: false,
                        timer: 5000
                    })
                }
            }
        })
    }
}

var calMonthToYear = (e) => {
    document.getElementById('validationWarrantyForYear').value = `${parseInt(e.value/12)}.${e.value%12}`
}
