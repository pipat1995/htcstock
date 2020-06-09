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
        getHistorieTakeId(param)
            .then((res) => {
                modal.find('.modal-body form')[0].action = window.location.pathname+ "/" + res.data.id
                modal.find('.modal-body form').append('<input type="hidden" name="_method" value="PUT" id="methodPut">')

                modal.find('.modal-title').text('อุปกรณ์ ' + res.data.id)
                modal.find('#validationAccess').val(res.data.access_id)
                modal.find('#validationQty').val(res.data.qty)
                modal.find('#validationTakeName').val(res.data.user_take)
                modal.find('#remark').val(res.data.remark)
                modal.find('#created_at').val(ISOtoLongDate(res.data.created_at))
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
        getHistorieLendId(param)
            .then((res) => {
                modal.find('.modal-body form')[0].action = window.location.pathname + "/" + res.data.id
                modal.find('.modal-body form').append('<input type="hidden" name="_method" value="PUT" id="methodPut">')

                modal.find('.modal-title').text('อุปกรณ์ ' + res.data.id)
                modal.find('#validationAccess').val(res.data.access_id)
                modal.find('#validationQty').val(res.data.qty)
                modal.find('#validationLendName').val(res.data.user_lend)
                modal.find('#remark').val(res.data.remark)
                modal.find('#created_at').val(ISOtoLongDate(res.data.created_at))
                
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


// window.addEventListener('load', function () {
//     $('#table-lend').DataTable({
//         data: histories,
//         deferRender: true,
//         buttons: {
//             buttons: ['copy', 'csv', 'excel']
//         },
//         language: {
//             url: 'https://cdn.datatables.net/plug-ins/1.10.21/i18n/Thai.json'
//         },
//         columns: [
//             // {data: 'DT_RowIndex', name: 'DT_RowIndex'},
//             // {
//             //     data: 'action',
//             //     name: 'action',
//             //     orderable: false,
//             //     searchable: false
//             // },
//             {
//                 data: 'access_id',
//                 name: 'access_id'
//             },
//             {
//                 data: 'qty',
//                 name: 'qty'
//             },
//             {
//                 data: 'user_lend',
//                 name: 'user_lend'
//             },
//         ]
//     }); 
//     // END DATATABLE

//     //CALL AJAX
//     // axios.get('/api/histories/take').then(rendertable)
//     $(".toast").toast('show');
// });

// window.addEventListener('load', function () {
    
    
//     $('#table-take').DataTable({
//         data: histories,
//         deferRender: true,
//         buttons: {
//             buttons: ['copy', 'csv', 'excel']
//         },
//         language: {
//             url: 'https://cdn.datatables.net/plug-ins/1.10.21/i18n/Thai.json'
//         },
//         columns: [
//             // {data: 'DT_RowIndex', name: 'DT_RowIndex'},
//             // {
//             //     data: 'action',
//             //     name: 'action',
//             //     orderable: false,
//             //     searchable: false
//             // },
//             {
//                 data: 'access_id',
//                 name: 'access_id'
//             },
//             {
//                 data: 'qty',
//                 name: 'qty'
//             },
//             {
//                 data: 'user_take',
//                 name: 'user_take'
//             },
//         ]
//     }); 
//     // END DATATABLE

//     //CALL AJAX
//     // axios.get('/api/histories/take').then(rendertable)
//     $(".toast").toast('show');
// });