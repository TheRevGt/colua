let sor = [];

function toso(){
  var nagencia=document.getElementById('software').value;
  var pc=document.getElementById('pcex').value;
  sor ={
        noagencia: nagencia,
        pc: pc
    }
}
function envso1(){
  toso();
	axios.post('../../includes/info/vrso.php', sor)
  .then(function (response) {
    document.getElementById('nombre').value=response.data[0];
    document.getElementById('edicion').value=response.data[1];
  })
  .catch(function (error) {
    console.log(error);
  });
}
function envso(){
  var id=document.getElementById('software').value;
  if (id=="") {
    
  }else{
    envso1();
  }
}
