let acp = [];

function actpc() {
    var id = document.getElementById('pcex').value;
    var emple = document.getElementById('n_empleado').value;
    var emplenuevo = document.getElementById('nu_empleado').value;
    var tipo = document.getElementById('db_etipo').value;
    var activo = document.getElementById('db_eactivo').value;
    var so = document.getElementById('db_so').value;
    var edicion = document.getElementById('db_edicion').value;
    var lice = document.getElementById('db_licencia').value;
    var marca = document.getElementById('db_emarca').value;
    var modelo = document.getElementById('db_emodelo').value;
    var serie = document.getElementById('db_eserie').value;
    var ip = document.getElementById('db_eip').value;
    var mac = document.getElementById('db_epmac').value;
    var date = document.getElementById('db_edate').value;
    var estado = document.getElementById('estadop').value;
    var acti = document.getElementById('estepc').checked;
    if (acti == true) {
        if (emplenuevo == "") {
            alert("Error al enviar dados")
        } else {
            acp = {
                id: id,
                empleado: emple,
                nuempleado: emplenuevo,
                tipo: tipo,
                activo: activo,
                so: so,
                edicion: edicion,
                lice: lice,
                marca: marca,
                modelo: modelo,
                serie: serie,
                ip: ip,
                mac: mac,
                fecha: date,
                estado: estado,
                estatus: "Inactivo",
            }
        }
    } else {
        if (emplenuevo == "") {
            alert("Error al enviar dados")
        } else {
            acp = {
                id: id,
                empleado: emple,
                nuempleado: emplenuevo,
                tipo: tipo,
                activo: activo,
                so: so,
                edicion: edicion,
                lice: lice,
                marca: marca,
                modelo: modelo,
                serie: serie,
                ip: ip,
                mac: mac,
                fecha: date,
                estado: estado,
                estatus: " ",
            }
        }
    }
}

function uppc1() {
    actpc();
    axios.post('../../includes/update/setequipo.php', acp)
    .then(function(response) {
        var r = confirm(response.data);
        if (r == true) {
            window.location.href = "equipo.php";
        }
    }).catch(function(error) {
        console.log(error);
    });
}

function uppc() {
    var id = document.getElementById('pcex').value;
    if (id == "") {
        document.getElementById('pcex').focus();
    } else {
        uppc1();
    }
}