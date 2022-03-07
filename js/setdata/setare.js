let aread = [];

function toarea() {
    var nombre = document.getElementById('db_nombre').value;
    aread = {
        nombre: nombre
    }
}

function saveare1() {
    toarea();
    axios.post('../../includes/insdata/savedar.php', aread).then(function(response) {
        var r = confirm(response.data);
        if (r == true) {
            window.location.href = "admin.php";
        }
    }).catch(function(error) {
        console.log(error);
    });
}

function saveare() {;
    var nombre = document.getElementById('db_nombre').value;
    if (nombre == "") {
        document.getElementById('db_nombre').focus();
    } else {
        saveare1();
        document.getElementById('db_nombre').value = "";
    }
}