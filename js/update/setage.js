let aca = [];

function actagencia(){

  var id=document.getElementById('n_agenc').value;
  var nagencia=document.getElementById('db_nager').value;
  var agencia=document.getElementById('db_ager').value;
  aca ={
      id: id,
      noagencia: nagencia,
      agencia: agencia
    }
}
function upage1(){
  actagencia();
	axios.post('../../includes/update/setage.php', aca)
  .then(function (response) {
    alert(response.data);
    location.reload();
  })
  .catch(function (error) {
    console.log(error);
  });
}
function upage(){
  var id=document.getElementById('n_agenc').value;
  var nagencia=document.getElementById('db_nager').value;
  var agencia=document.getElementById('db_ager').value;
  if (id!="" & nagencia!="" & agencia!="") {
    upage1();
  }else{
    alert("Error");
  }
      
}
