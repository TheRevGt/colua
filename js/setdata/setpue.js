let puess = [];

function topues() {
    var nombre = document.getElementById('db_pu').value;
    puess = {
        nombr: nombre
    }
}

function savepue1() {
    topues();
    axios.post('../../includes/insdata/savedpue.php', puess).then(function(response) {
        var r = confirm(response.data);
        if (r == true) {
            window.location.href = "admin.php";
        }
    }).catch(function(error) {
        console.log(error);
    });
}

function savepue() {;
    var nombre = document.getElementById('db_pu').value;
    if (nombre == "") {
        document.getElementById('db_pu').focus();
    } else {
        savepue1();
        document.getElementById('db_pu').value = "";
    }
}