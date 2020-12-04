let iepc = [];

function vdap(){
  var empleado=document.getElementById('n_empleado').value;
  iepc ={
        empleado: empleado
    }
}
function ppoex1(){
  vdap();
	axios.post('../../includes/info/vrexisp.php', iepc)
  .then(function (response) {
    document.getElementById('pcex').innerHTML=response.data;
  })
  .catch(function (error) {
    console.log(error);
  });
}
function ppoex(){
    ppoex1();
}
