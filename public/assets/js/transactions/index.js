// Fetch all the forms we want to apply custom Bootstrap validation styles to
var formTake = document.getElementsByClassName('take-validation');
var formLend = document.getElementsByClassName('lend-validation');
// Loop over them and prevent submission

Array.prototype.filter.call(formTake, (form) => {
    form.addEventListener('submit', (event) => {
        if (parseInt(document.getElementById('validationQty').value) == 0) {
            document.getElementById('validationQty').value = ""
        }
        if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
        }
        form.classList.add('was-validated');
    }, false);
});

Array.prototype.filter.call(formLend, (form) => {
    form.addEventListener('submit', (event) => {
        if (parseInt(document.getElementById('validationQty').value) == 0) {
            document.getElementById('validationQty').value = ""
        }
        if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
        }
        form.classList.add('was-validated');
    }, false);
});

$('#takeModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var param = button.data('param')
    var modal = $(this)

    if (param) {
        getHistorieTakeId(param)
            .then((response) => {
                modal.find('.modal-body form')[0].action = window.location.pathname + "/" + response.id
                for (const _el of modal.find('.form-control')) {
                    _el.disabled = true
                }
                modal.find('.modal-body form').append('<input type="hidden" name="_method" value="PUT" id="methodPut">')
                modal.find('#validationAccess').val(response.access_id)
                modal.find('#validationQty').val(response.qty)
                modal.find('#validationTakeName').val(response.user_lending)
                modal.find('#remark').val(response.remark)
                modal.find('#created_at').val(ISOtoLongDate(response.created_at))
            }).catch(function (error) {
                console.log('Request failed', error);
            })
    } else {
        clearModal(modal)
        modal.find('#created_at').attr('disabled', true)
    }
})

$('#lendModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var param = button.data('param')
    var lending = button.data('lend')
    var modal = $(this)
    if (param) {
        getHistorieLendId(param)
            .then((response) => {
                modal.find('.modal-body form')[0].action = window.location.pathname + "/" + response.id
                modal.find('.modal-body form').append('<input type="hidden" name="_method" value="PUT" id="methodPut">')
                for (const _el of modal.find('.form-control')) {
                    _el.disabled = true
                    if (_el.id === 'validationLendNameBack' && (lending)) {
                        _el.disabled = false
                    }
                }
                
                modal.find('#validationAccess').val(response.access_id)
                modal.find('#validationQty').val(response.qty)
                modal.find('#validationLendName').val(response.user_lending)
                modal.find('#remark').val(response.remark)
                modal.find('#created_at').val(ISOtoLongDate(response.created_at))
                modal.find('#updated_at').val(ISOtoLongDate(response.updated_at))
            }).catch(function (error) {
                console.log('Request failed', error);
            })
    } else {
        clearModal(modal)
        modal.find('#created_at').attr('disabled', true)
        modal.find('#updated_at').attr('disabled', true)
        modal.find('#validationLendNameBack').attr('disabled', true)
    }

})

$('#takeModal').on('hidden.bs.modal', function (event) {
    var modal = $(this)

    clearModal(modal)
})

$('#lendModal').on('hidden.bs.modal', function (event) {
    var modal = $(this)

    clearModal(modal)
})

