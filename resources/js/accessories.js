import axios from "axios";
// Example starter JavaScript for disabling form submissions if there are invalid fields

// Fetch all the forms we want to apply custom Bootstrap validation styles to
var forms = document.getElementsByClassName('accessories-validation');
// Loop over them and prevent submission
Array.prototype.filter.call(forms,  (form) => {
    form.addEventListener('submit',  (event) => {
        if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
        }
        form.classList.add('was-validated');
    }, false);
});


$('#exampleModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var param = button.data('param')
    var modal = $(this)

    // /accessories/{id}
    if (param) {
        axios.get("/accessories/" + param + "/edit")
            .then((res) => {
                modal.find('.modal-body form')[0].action = "/accessories/" + res.data.id
                modal.find('.modal-body form').append('<input type="hidden" name="_method" value="PUT" id="methodPut">')

                modal.find('.modal-title').text('อุปกรณ์ ' + res.data.id)
                modal.find('#validationName').val(res.data.name)
                modal.find('#validationUnit').val(res.data.unit)
            })
    } else {
        modal.find('.modal-body form')[0].reset()
        modal.find('.modal-title').text('อุปกรณ์')
        modal.find('.modal-body form')[0].action = "/accessories"
        modal.find('#methodPut').remove()
    }
})
