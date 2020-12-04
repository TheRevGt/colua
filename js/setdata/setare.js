let aread = [];

function toarea(){
  var nombre=document.getElementById('db_nombre').value;
  aread ={
        nombre: nombre
    }
}
function saveare1(){
  toarea();
	axios.post('../../includes/insdata/savedar.php', aread)
  .then(function (response) {
    alert(response.data);
  })
  .catch(function (error) {
    console.log(error);
  });
}
function saveare(){;
  var nombre=document.getElementById('db_nombre').value;
  if (nombre=="") {
    document.getElementById('db_nombre').focus();
  }else{
    saveare1();
    document.getElementById('db_nombre').value="";
    //location.reload();
  }
}
