import axios from "axios";
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

    // /accessories/{id}
    if (param) {
        axios.get("/histories/take/" + param + "/edit")
            .then((res) => {
                modal.find('.modal-body form')[0].action = "/histories/take/" + res.data.id
                modal.find('.modal-body form').append('<input type="hidden" name="_method" value="PUT" id="methodPut">')

                modal.find('.modal-title').text('อุปกรณ์ ' + res.data.id)
                modal.find('#validationAccess').val(res.data.access_id)
                modal.find('#validationQty').val(res.data.qty)
                modal.find('#validationTakeName').val(res.data.user_take)
                modal.find('#remark').val(res.data.remark)
                modal.find('#created_at').val(res.data.created_at.substr(0, 10))
            })
    } else {
        modal.find('.modal-body form')[0].reset()
        modal.find('.modal-title').text('อุปกรณ์')
        modal.find('.modal-body form')[0].action = "/accessories"
        modal.find('#methodPut').remove()
    }
})
