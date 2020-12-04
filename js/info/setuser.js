let iuser = [];

function toiemple(){
  var empleado=document.getElementById('anuser').value;
  iuser ={
        user: empleado
    }
}
function envem1(){
  toiemple();
	axios.post('../includes/info/veruser.php', iuser)
  .then(function (response) {
    //console.log(response.data[0]);
    document.getElementById('1').value=response.data[0];
    document.getElementById('2').value=response.data[1];
    document.getElementById('3').value=response.data[2];
    document.getElementById('4').value=response.data[3];
  })
  .catch(function (error) {
    console.log(error);
  });
}
function envem(){
  var id=document.getElementById('anuser').value;
  if (id=="") {
    
  }else{
    envem1();
  }
}