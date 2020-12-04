let acaad = [];

function actagencia(){

  var id=document.getElementById('n_agenc').value;
  var nagencia=document.getElementById('db_nager').value;
  var agencia=document.getElementById('db_ager').value;
  var tecnico=document.getElementById('tecnic').value;
  acaad ={
      id: id,
      noagencia: nagencia,
      agencia: agencia,
      tecnico: tecnico
    }
}
function upage1(){
  actagencia();
	axios.post('../../includes/update/setagea.php', acaad)
  .then(function (response) {
    alert(response.data);
    location.reload();
  })
  .catch(function (error) {
    console.log(error);
  });
}
function upagea(){
  var id=document.getElementById('n_agenc').value;
  var nagencia=document.getElementById('db_nager').value;
  var agencia=document.getElementById('db_ager').value;
  if (id!="" & nagencia!="" & agencia!="") {
    upage1();
  }else{
    alert("Error");
  }
      
}
