let aresa = [];

function toareac(){
  var id=document.getElementById('n_are').value;
  var nombre=document.getElementById('db_nombre').value;
  aresa ={
        nombre: nombre,
        id: id
    }
}
function uparea1(){
  toareac();
  axios.post('../../includes/update/setare.php', aresa)
  .then(function (response) {
    alert(response.data);
  })
  .catch(function (error) {
    console.log(error);
  });
}
function uparea(){;
  var agencia=document.getElementById('db_nombre').value;
  if (agencia=="") {
    document.getElementById('db_nombre').focus();
  }else{
    uparea1();
    document.getElementById('db_nombre').value="";
  }
}