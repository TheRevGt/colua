let emp = [];

function stemple() {
    var area = document.getElementById('n_are').value;
    var agen = document.getElementById('n_agenc').value;
    var puesto = document.getElementById('pu').value;
    var emple = document.getElementById('db_nom').value;
    var user = document.getElementById('db_user').value;
    var pass = document.getElementById('db_pas').value;
    emp = {
        area: area,
        agencia: agen,
        puesto: puesto,
        empleado: emple,
        user: user,
        pasword: pass
    }
    console.log(emp);
}

function savedemple1() {
    stemple();
    axios.post('../../includes/insdata/savedem.php', emp).then(function(response) {
        console.log(response);
        var r = confirm(response.data);
        if (r == true) {
            window.location.href = "empleado.php";
        }
    }).catch(function(error) {
        console.log(error);
    });
}

function savedemple() {
    var puesto = document.getElementById('pu').value;
    var emple = document.getElementById('db_nom').value;
    var use = document.getElementById('db_user').value;
    var pa = document.getElementById('db_pas').value;
    if (pa == "") {
        document.getElementById('db_pas').focus();
    }
    if (use == "") {
        document.getElementById('db_user').focus();
    }
    if (puesto == "") {
        document.getElementById('pu').focus();
    }
    if (emple == "") {
        document.getElementById('db_nom').focus();
    }
    if (puesto == "") {
        document.getElementById('pu').focus();
    }
    if (emple != "" & puesto != "" & use != "") {
        savedemple1();
        document.getElementById('pu').value = "";
        document.getElementById('db_nom').value = "";
        document.getElementById('db_user').value = "";
        document.getElementById('db_pas').value = "";
    }
}