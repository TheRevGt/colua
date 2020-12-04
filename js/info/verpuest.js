function taac1(){
  let vemcl = [];
  var nagencia=document.getElementById('n_p').value;
  vemcll ={
        noagencia: nagencia
    }
  axios.post('../../includes/info/veremplecv.php', vemcll)
  .then(function (response) {
    document.getElementById('db_nombre').value=response.data;
    
  })
  .catch(function (error) {
    console.log(error);
  });
}
function verempleav(){
  var id=document.getElementById('n_p').value;
  if (id=="") {
    
  }else{
    taac1();
  }
}