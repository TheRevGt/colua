let puesa = [];

function topues(){
  var id=document.getElementById('n_p').value;
  var nombre=document.getElementById('db_nombre').value;
  puesa ={
        nombre: nombre,
        id: id
    }
}
function savepuea1(){
  topues();
	axios.post('../../includes/update/setpue.php', puesa)
  .then(function (response) {
    alert(response.data);
  })
  .catch(function (error) {
    console.log(error);
  });
}
function savepuea(){;
  var agencia=document.getElementById('db_nombre').value;
  if (agencia=="") {
    document.getElementById('db_nombre').focus();
  }else{
    savepuea1();
    document.getElementById('db_nombre').value="";
  }
}