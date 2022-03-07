let acr = [];

function actred() {
    var id = document.getElementById('reda').value;
    var nuagencia = document.getElementById('nagencia').value;
    var agencia = document.getElementById('n_agencr').value;
    var activo = document.getElementById('db_acr').value;
    var tipo = document.getElementById('db_tipor').value;
    var marca = document.getElementById('db_marcar').value;
    var modelo = document.getElementById('db_modelor').value;
    var serie = document.getElementById('db_serie').value;
    var ip = document.getElementById('db_ip').value;
    var date = document.getElementById('db_dater').value;
    var estado = document.getElementById('r_estado').value;
    var acti = document.getElementById('estred').checked;
    console.log(nuagencia);
    if (acti == true) {
        if (nuagencia == "") {
            alert("Error al enviar los datos");
        } else {
            acr = {
                id: id,
                agencia: agencia,
                nuagencia: nuagencia,
                activo: activo,
                tipo: tipo,
                marca: marca,
                modelo: modelo,
                serie: serie,
                ip: ip,
                fecha: date,
                estado: estado,
                estatus: "Inactivo",
            }
        }
    } else {
        if (nuagencia == "") {
            alert("Error al enviar los datos");
        } else {
            acr = {
                id: id,
                agencia: agencia,
                nuagencia: nuagencia,
                activo: activo,
                tipo: tipo,
                marca: marca,
                modelo: modelo,
                serie: serie,
                ip: ip,
                fecha: date,
                estado: estado,
                estatus: " ",
            }
        }
    }
}

function upred1() {
    actred();
    axios.post('../../includes/update/setred.php', acr).then(function(response) {
        var r = confirm(response.data);
        if (r == true) {
            window.location.href = "red.php";
        }
    }).catch(function(error) {
        console.log(error);
    });
}

function upred() {
    var id = document.getElementById('reda').value;
    if (id == "") {} else {
        upred1();
    }
}