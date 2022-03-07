let ace = [];

function actemple() {
    var id = document.getElementById('n_empleado').value;
    var are = document.getElementById('ops').value;
    var agencia = document.getElementById('n_agenci').value;
    var pue = document.getElementById('pu').value;
    var nom = document.getElementById('db_nom').value;
    var user = document.getElementById('db_user').value;
    var pas = document.getElementById('db_pas').value;
    var acti = document.getElementById('estemple').checked;
    if (acti == true) {
        ace = {
            id: id,
            area: are,
            agencia: agencia,
            puesto: pue,
            nombre: nom,
            user: user,
            pass: pas,
            estado: "Inactivo",
        }
    } else {
        ace = {
            id: id,
            area: are,
            agencia: agencia,
            puesto: pue,
            nombre: nom,
            user: user,
            pass: pas,
            estado: " ",
        }
    }
}

function upemple1() {
    actemple();
    axios.post('../../includes/update/setemple.php', ace).then(function(response) {
        var r = confirm(response.data);
        if (r == true) {
            window.location.href = "empleado.php";
        }
    }).catch(function(error) {
        console.log(error);
    });
}

function upemple() {
    var id = document.getElementById('n_empleado').value;
    if (id == "") {} else {
        upemple1();
        document.getElementById('pu').value = "";
        document.getElementById('db_nom').value = "";
        document.getElementById('db_user').value = "";
        document.getElementById('db_pas').value = "";
    }
}