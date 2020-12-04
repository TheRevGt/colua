let agen = [];

function toagen(){
  var nagencia=document.getElementById('n_agenc').value;
  agen ={
        noagencia: nagencia
    }
}
function envag1(){
  toagen();
	axios.post('../../includes/info/vrag.php', agen)
  .then(function (response) {
    document.getElementById('db_nager').value=response.data[1];
    document.getElementById('db_ager').value=response.data[0];
  })
  .catch(function (error) {
    console.log(error);
  });
}
function envag(){
  var id=document.getElementById('n_agenc').value;
  if (id=="") {
    
  }else{
    envag1();
  }
}
