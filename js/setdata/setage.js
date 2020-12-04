let agen = [];

function toagen(){
  var nagencia=document.getElementById('db_nager').value;
  var agencia=document.getElementById('db_ager').value;
  agen ={
        noagencia: nagencia,
        agencia: agencia
    }
}
function saveage1(){
  toagen();
	axios.post('../../includes/insdata/savedag.php', agen)
  .then(function (response) {
    alert(response.data);
  })
  .catch(function (error) {
    console.log(error);
  });
}
function saveage(){
  var nagencia=document.getElementById('db_nager').value;
  var agencia=document.getElementById('db_ager').value;
  if (nagencia=="") {
    document.getElementById('db_nager').focus();
  }
  if (agencia=="") {
    document.getElementById('db_ager').focus();
  }
  if (nagencia!= "" & agencia!= "") {
    saveage1();
    document.getElementById('db_nager').value="";
    document.getElementById('db_ager').value="";

  }
}
