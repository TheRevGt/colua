let sope = [];

function consultae(){
  var tecnico=document.getElementById('tecnico').value;
  var estado=document.getElementById('estado').value;
  sope ={
      tecnico: tecnico,
      estado: estado
    }
}
function consule1(){
  consultae();
	axios.post('../../includes/soporte/conse.php', sope)
  .then(function (response) {
    document.getElementById('usin').innerHTML=response.data;
  })
  .catch(function (error) {
    console.log(error);
  });
}
function consule(){
  var tecnico=document.getElementById('tecnico').value;
  var estado=document.getElementById('estado').value;
  if (tecnico!="" & estado!="" ) {
    consule1();
  }else {
    alert('Error');
  }
}