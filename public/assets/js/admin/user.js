// API
function addRoleApi(user, roles) {
    return axios.post(`/admin/${user}/addrole`, {
        roles: roles
    })
}
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
    'use strict';
    window.addEventListener('load', function () {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        $(".js-select-role-multiple").select2({
            tags: true,
            placeholder: "Select a role"
        });
        $(".js-select-system-multiple").select2({
            tags: true,
            placeholder: "Select a system"
        });
        // Loop over them and prevent submission

    }, false);
})();

var tablerole = document.getElementById('table-role')

function addRole(user) {
    addRoleApi(user, $(".js-select-role-multiple").val())
        .then((response) => {
            console.log(response)
            clearRow(tablerole.tBodies[0])
            createRow(tablerole)
        })
        .catch((error) => {
            console.log(error)
        })
}

function clearRow(bodies) {
    bodies.parentNode.removeChild(bodies);
}

function createRow(table) {
    table.appendChild(document.createElement("TBODY"));
    // Insert a row at the end of table
    let newRow = table.tBodies[0].insertRow();

    // Insert a cell at the end of the row
    let newCell = newRow.insertCell();

    // Append a text node to the cell
    let newText = document.createTextNode('new row');
    newCell.appendChild(newText);
    // bodies.appendChild(bodies)
}
