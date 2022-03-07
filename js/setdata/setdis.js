let datadis = [];

function toObjectdispo() {
    var op = document.getElementById("opd").value;
    var cac = document.getElementById("di_act").value;
    var mar = document.getElementById("marca").value;
    var mod = document.getElementById("modelo").value;
    var nser = document.getElementById("n_serie").value;
    var dat = document.getElementById("date").value;
    var es = document.getElementById("d_estado").value;
    var ip = document.getElementById("ipd").value;
    var emple = document.getElementById('d_nombre').value;
    if (ip == "") {
        datadis = {
            tipo: op,
            codigo: cac,
            marca: mar,
            modelo: mod,
            serie: nser,
            fecha: dat,
            estado: es,
            ip: 's/n',
            empleado: emple
        }
    }
    if (ip != "") {
        datadis = {
            tipo: op,
            codigo: cac,
            marca: mar,
            modelo: mod,
            serie: nser,
            fecha: dat,
            estado: es,
            ip: ip,
            empleado: emple
        }
    }
}

function savesodis1() {
    toObjectdispo();
    axios.post('../../includes/insdata/sevedis.php', datadis).then(function(response) {
        var r = confirm(response.data);
        if (r == true) {
            window.location.href = "dispositivo.php";
        }
    }).catch(function(error) {
        console.log(error);
    });
}

function savesodis() {
    var op = document.getElementById("opd").value;
    var cac = document.getElementById("di_act").value;
    var mar = document.getElementById("marca").value;
    var mod = document.getElementById("modelo").value;
    var nser = document.getElementById("n_serie").value;
    var dat = document.getElementById("date").value;
    var es = document.getElementById("d_estado").value;
    var ip = document.getElementById("ipd").value;
    if (dat == "") {
        document.getElementById("date").focus();
    }
    if (mar == "") {
        document.getElementById("marca").focus();
    }
    if (cac = "") {
        document.getElementById("di_act").focus();;
    }
    if (op == "") {
        document.getElementById("opd").focus();
    }
    if (op != "" & mar != "" & dat != "") {
        savesodis1();
        document.getElementById("opd").value = "";
        document.getElementById("di_act").value = "";
        document.getElementById("marca").value = "";
        document.getElementById("modelo").value = "";
        document.getElementById("n_serie").value = "";
        document.getElementById("ipd").value = "";
        document.getElementById("date").value = "";
    }
}