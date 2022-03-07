let sod = [];

function toObjectsso() {
    sod = {
        nombre: document.getElementById('nombre').value,
        edicion: document.getElementById('edicion').value,
        empleado: document.getElementById('n_empleado').value,
        activop: document.getElementById('pcex').value
    };
}

function savesof1() {
    toObjectsso();
    axios.post('../../includes/insdata/insso.php', sod).then(function(response) {
        var r = confirm(response.data);
        if (r == true) {
            window.location.href = "software.php";
        }
    }).catch(function(error) {
        console.log(error);
    });
}

function savesof() {
    var emple = document.getElementById('n_empleado').value;
    var pc = document.getElementById('pcex').value
    var no = document.getElementById('nombre').value;
    if (no == "") {
        document.getElementById('nombre').focus();
    }
    if (emple == "Nuevo") {
        document.getElementById('pcex').focus();
    }
    if (pc == "") {
        document.getElementById('n_empleado').focus();
    }
    if (emple != "Nuevo" & pc != "" & no != "") {
        savesof1();
    }
}