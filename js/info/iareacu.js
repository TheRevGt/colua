let vemc = [];

function dataac(){
  var nagencia=document.getElementById('n_are').value;
  vemc ={
        noagencia: nagencia
    }
}
function veremplesa1(){
  dataac();
	axios.post('../../includes/info/verareasc.php', vemc)
  .then(function (response) {
    document.getElementById('db_nombre').value=response.data[0];
  })
  .catch(function (error) {
    console.log(error);
  });
}
function veremplesa(){
  var id=document.getElementById('n_are').value;
  if (id=="") {
    
  }else{
    veremplesa1();
  }
}