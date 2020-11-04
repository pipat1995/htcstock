/**  เบิก
 * 
 * */

// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
    'use strict';
    window.addEventListener('load', function () {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        $('#validationAccess_id').select2();
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        validationForm(forms)
    }, false);
})();

function quantity(e) {
    if (e.value > 0) {
        $(':button[type="submit"]').prop('disabled', false)
    } else {
        $(':button[type="submit"]').prop('disabled', true)
    }
}

function checkQtyAccess(e) {
    var inputNumber = document.getElementById('validationQty')
    if (e.value) {
        getAccessoriesId(e.value).then(res => {
            if (res.qty > 0) {
                // inputNumber.value = res.qty
                inputNumber.offsetParent.children[0].innerHTML = `จำนวน มีอยู่ <span class="badge badge-secondary">${res.qty}</span>`
                $(':button[type="submit"]').prop('disabled', false)
            } else {
                inputNumber.offsetParent.children[0].innerHTML = `จำนวน มีอยู่ <span class="badge badge-secondary">${0}</span>`
                // inputNumber.value = 0
                // inputNumber.max = 0
                $(':button[type="submit"]').prop('disabled', true)
            }
        })
    } 

}

function changeValue(e) {
    if (e.value) {
        document.getElementById("validationECreated_at").readOnly = false;
    } else {
        document.getElementById("validationECreated_at").readOnly = true;
    }
}
