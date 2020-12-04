let iedis = [];

function vdadis(){
  var empleado=document.getElementById('d_nombre').value;
  iedis ={
        empleado: empleado
    }
}
function dispoex1(){
  vdadis();
	axios.post('../../includes/info/vrexisd.php', iedis)
  .then(function (response) {
    document.getElementById('disex').innerHTML=response.data;
  })
  .catch(function (error) {
    console.log(error);
  });
}
function dispoex(){
    dispoex1();
}
