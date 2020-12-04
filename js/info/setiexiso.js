let ieso = [];

function vdao(){
  var empleado=document.getElementById('pcex').value;
  ieso ={
    empleado: empleado
  }
}
function opoex1(){
  vdao();
	axios.post('../../includes/info/vrexiso.php', ieso)
  .then(function (response) {
    //console.log(response);
    document.getElementById('software').innerHTML=response.data;
  })
  .catch(function (error) {
    console.log(error);
  });
}
function opoex(){
    opoex1();
}
