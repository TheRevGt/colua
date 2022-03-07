let ipc = [];

function toipc() {
    var empleado = document.getElementById('pcex').value;
    ipc = {
        empleado: empleado
    }
}

function revpc1() {
    toipc();
    axios.post('../../includes/info/vrequi.php', ipc).then(function(response) {
        document.getElementById('eqiac').innerHTML = response.data[0];
        document.getElementById('db_eactivo').value = response.data[1];
        document.getElementById('db_so').value = response.data[2];
        document.getElementById('db_edicion').value = response.data[3];
        document.getElementById('db_licencia').value = response.data[4];
        document.getElementById('db_emarca').value = response.data[5];
        document.getElementById('db_emodelo').value = response.data[6];
        document.getElementById('db_eserie').value = response.data[7];
        document.getElementById('db_eip').value = response.data[8];
        document.getElementById('db_epmac').value = response.data[9];
        document.getElementById('estaan').innerHTML = response.data[11];
        document.getElementById('db_edate').value = response.data[10];
    }).catch(function(error) {
        console.log(error);
    });
}

function revpc() {
    var empleado = document.getElementById('pcex').value;
    if (empleado != "") {
        revpc1();
    }
}