let idis = [];

function vdisp(){
  var empleado=document.getElementById('disex').value;
  idis ={
        dispositivo: empleado
    }
}
function dispoac1(){
  vdisp();
	axios.post('../../includes/info/vrdispo.php', idis)
  .then(function (response) {
    //document.getElementById('d_nombre').innerHTML=response.data[0];
    document.getElementById('opd').value=response.data[1];
    document.getElementById('di_act').value=response.data[2];
    document.getElementById('marca').value=response.data[3];
    document.getElementById('modelo').value=response.data[4];
    document.getElementById('n_serie').value=response.data[5];
    document.getElementById('ipd').value=response.data[6];
    document.getElementById('date').value=response.data[7];
    document.getElementById('anestadod').innerHTML=response.data[8];
  })
  .catch(function (error) {
    console.log(error);
  });
}
function dispoac(){
    dispoac1();
}
