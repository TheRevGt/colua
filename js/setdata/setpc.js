let pc = [];

function todopc() {
    var empleado = document.getElementById('n_empleado').value;
    var tipo = document.getElementById('db_etipo').value;
    var activop = document.getElementById('db_eactivo').value;
    var so = document.getElementById('db_so').value;
    var edicion = document.getElementById('db_edicion').value;
    var li = document.getElementById('db_licencia').value;
    var marcap = document.getElementById('db_emarca').value;
    var modelop = document.getElementById('db_emodelo').value;
    var seriep = document.getElementById('db_eserie').value;
    var ip = document.getElementById('db_eip').value;
    var mac = document.getElementById('db_epmac').value;
    var fep = document.getElementById('db_edate').value;
    var estadop = document.getElementById('estadop').value;
    pc = {
        empleado: empleado,
        tipo: tipo,
        activo: activop,
        so: so,
        edicion: edicion,
        licencia: li,
        marcap: marcap,
        modelop: modelop,
        seriep: seriep,
        ip: ip,
        mac: mac,
        fecha: fep,
        estadop: estadop
    }
}

function savepc1() {
    todopc();
    axios.post('../../includes/insdata/savedpc.php', pc)
    .then(function(response) {
        if (response.data[0] == true) {
            savesof();
        }
    }).catch(function(error) {
        console.log(error);
    });
}

function savepc() {
    var ac = document.getElementById('db_eactivo');
    var so = document.getElementById('db_so');
    var edicion = document.getElementById('db_edicion');
    var marcar = document.getElementById('db_emarca');
    var dater = document.getElementById('db_edate');
    var ip = document.getElementById('db_eip');
    if (dater.value == "") {
        dater.focus();
    }
    if (ip.value == "") {
        ip.focus();
    }
    if (marcar.value == "") {
        marcar.focus();
    }
    if (edicion.value == "") {
        edicion.focus();
    }
    if (so.value == "") {
        so.focus();
    }
    if (ac.value == "") {
        so.focus();
    }
    if (ac.value != "" & so.value != "" & marcar.value != "" & edicion.value != "" & dater.value != "" & ip.value != "") {
        savepc1();
        document.getElementById('db_so').value = "";
        document.getElementById('db_edicion').value = "";
        document.getElementById('db_licencia').value = "";
        document.getElementById('db_emarca').value = "";
        document.getElementById('db_emodelo').value = "";
        document.getElementById('db_eserie').value = "";
        document.getElementById('db_eip').value = "";
        document.getElementById('db_epmac').value = "";
        document.getElementById('db_edate').value = "";
    }
}