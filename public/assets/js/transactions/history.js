/**  ประวัติการทำงาน
 * 
 * */

// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
    'use strict';
    window.addEventListener('load', function () {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        $('#validationAccess_id').select2();
        if (document.getElementById("validationSCreated_at").value) {
            document.getElementById("validationECreated_at").readOnly = false;
        }
    }, false);
})();


function changeValue(e){
    if (e.value) {
        document.getElementById("validationECreated_at").readOnly = false;
    } else{
        document.getElementById("validationECreated_at").readOnly = true;
    }
}
