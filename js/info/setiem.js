let iemple = [];

function toiemple(){
  var empleado=document.getElementById('n_empleado').value;
  iemple ={
        empleado: empleado
    }
}
function envem1(){
  toiemple();
	axios.post('../../includes/info/vremple.php', iemple)
  .then(function (response) {
    //console.log(response.data[0]);
    document.getElementById('aan').innerHTML=response.data[0];
    document.getElementById('agan').innerHTML=response.data[1];
    document.getElementById('pu').value=response.data[2];
    document.getElementById('db_nom').value=response.data[3];
    document.getElementById('db_user').value=response.data[4];
    document.getElementById('db_pas').value=response.data[5];
    //document.getElementById('db_nager').value=response.data[1];
    //document.getElementById('db_ager').value=response.data[0];
  })
  .catch(function (error) {
    console.log(error);
  });
}
function envem(){
  var id=document.getElementById('n_empleado').value;
  if (id=="") {
    
  }else{
    envem1();
  }
}
