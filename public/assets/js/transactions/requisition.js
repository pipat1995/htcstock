/**  คืน
 * 
 * */
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
    'use strict';
    window.addEventListener('load', function () {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        $('#validationAccess_id').select2();
        $('#validationTrans_by').select2();

        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        validationForm(forms)

        if (document.getElementById("validationSCreated_at").value) {
            document.getElementById("validationECreated_at").readOnly = false;
        }
    }, false);
})();

var maxQty = 0

function checkQtyAccess(e) {
    getAccessoriesId(e.value).then(res => {
        if (res.qty > 0) {
            maxQty = res.qty
            document.getElementById('validationQty').value = maxQty
            $(':button[type="submit"]').prop('disabled', false)
        } else {
            document.getElementById('validationQty').value = null
            $(':button[type="submit"]').prop('disabled', true)
        }
        document.getElementById('validationQty').max = maxQty
    })
}

function quantity(e) {
    if (e.value > 0) {
        $(':button[type="submit"]').prop('disabled', false)
    } else {
        $(':button[type="submit"]').prop('disabled', true)
    }
}

function changeValue(e) {
    if (e.value) {
        document.getElementById("validationECreated_at").readOnly = false;
    } else {
        document.getElementById("validationECreated_at").readOnly = true;
    }
}
