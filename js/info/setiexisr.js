let iered = [];

function vdare(){
  var agenci=document.getElementById('n_agencr').value;
  iered ={
        agencia: agenci
    }
}
function redex1(){
  vdare();
	axios.post('../../includes/info/vrexisr.php', iered)
  .then(function (response) {
    //console.log(response);
    document.getElementById('reda').innerHTML=response.data;
  })
  .catch(function (error) {
    console.log(error);
  });
}
function redex(){
    redex1();
}