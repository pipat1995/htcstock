// Fetch all the forms we want to apply custom Bootstrap validation styles to
var forms = document.getElementsByClassName('accessories-validation');
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


$('#accessoriesModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var param = button.data('param')
    var modal = $(this)
    if (param) {
        getAccessoriesId(param)
            .then((response) => {
                
                modal.find('.modal-body form')[0].action = window.location.pathname + "/" + response.id
                modal.find('.modal-body form').append('<input type="hidden" name="_method" value="PUT" id="methodPut">')

                modal.find('.modal-title').text('อุปกรณ์ ' + response.id)
                modal.find('#validationName').val(response.name)
                modal.find('#validationUnit').val(response.unit)
                modal.find('#validationQty').attr('disabled',true)
                modal.find('#validationQty').val(response.qty)
            }).catch(function (error) {
                console.log('Request failed', error);
            })
    } else {
        clearModal(modal)
        modal.find('.modal-title').text('')
    }
})

$('#accessoriesModal').on('hidden.bs.modal', function (event) {
    var modal = $(this)
    clearModal(modal)
})

// window.addEventListener('load', function () {
//     $('#table-access').DataTable({
//         data: accessories,
//         deferRender: true,
//         buttons: {
//             buttons: ['copy', 'csv', 'excel']
//         },
//         language: {
//             url: 'https://cdn.datatables.net/plug-ins/1.10.21/i18n/Thai.json'
//         },
//         columns: [
//             // {data: 'DT_RowIndex', name: 'DT_RowIndex'},
//             {
//                 data: 'action',
//                 name: 'action',
//                 orderable: false,
//                 searchable: false
//             },
//             {
//                 data: 'name',
//                 name: 'name'
//             },
//             {
//                 data: 'unit',
//                 name: 'unit'
//             },
//         ]
//     });
//     $(".toast").toast('show');
// });
