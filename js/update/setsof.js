let acr = [];

function actso(){
  var id=document.getElementById('pcex').value;
  var software=document.getElementById('software').value;
  var nombre=document.getElementById('nombre').value;
  var edicion=document.getElementById('edicion').value;
    acr ={
      id: id,
      software: software,
      nombre: nombre,
      edicion: edicion
    }
  
}
function upsof1(){
  actso();
  axios.post('../../includes/update/setso.php', acr)
  .then(function (response) {
    alert(response.data);
  })
  .catch(function (error) {
    console.log(error);
  });
}
function upsof(){
  var id=document.getElementById('software').value;
  if (id=="") {
  
  }else{
     upsof1();
  }
     
}