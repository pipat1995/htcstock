import { getTakeId,getLendId,clearModal } from "./historiesapi";

// Fetch all the forms we want to apply custom Bootstrap validation styles to
var forms = document.getElementsByClassName('take-validation');
// Loop over them and prevent submission
Array.prototype.filter.call(forms, (form) => {
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
        getTakeId(param)
            .then((res) => {
                modal.find('.modal-body form')[0].action = window.location.pathname+ "/" + res.data.id
                modal.find('.modal-body form').append('<input type="hidden" name="_method" value="PUT" id="methodPut">')

                modal.find('.modal-title').text('อุปกรณ์ ' + res.data.id)
                modal.find('#validationAccess').val(res.data.name)
                modal.find('#validationQty').val(res.data.unit)
                modal.find('#validationTakeName').val(res.data.unit)
                modal.find('#remark').val(res.data.remark)
                modal.find('#created_at').val(res.data.created_at)
                
            })
    } else {
        clearModal(modal)
    }

})

$('#lendModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var param = button.data('param')
    var modal = $(this)
    
    if (param) {
        getLendId(param)
            .then((res) => {
                modal.find('.modal-body form')[0].action = window.location.pathname + "/" + res.data.id
                modal.find('.modal-body form').append('<input type="hidden" name="_method" value="PUT" id="methodPut">')

                modal.find('.modal-title').text('อุปกรณ์ ' + res.data.id)
                modal.find('#validationAccess').val(res.data.name)
                modal.find('#validationQty').val(res.data.unit)
                modal.find('#validationTakeName').val(res.data.unit)
                modal.find('#remark').val(res.data.remark)
                modal.find('#created_at').val(res.data.created_at)
                
            })
    } else {
        clearModal(modal)
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
