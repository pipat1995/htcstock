/**  เบิก
 * 
 * */
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
    'use strict';
    window.addEventListener('load', function () {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function (
            form) {
            form.addEventListener('submit', function (event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
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
