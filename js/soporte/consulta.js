let sopu = [];

function consultau(){
  var sop=document.getElementById('usuari').value;
  sopu ={
      soport: sop,
    }
}
function consulu1(){
  consultau();
	axios.post('../../includes/soporte/consu.php', sopu)
  .then(function (response) {
    document.getElementById('usin').innerHTML=response.data;
  })
  .catch(function (error) {
    console.log(error);
  });
}
function consulu(){
  var sop=document.getElementById('usuari').value;
  if (sop=="") {
    document.getElementById('usuari').focus();
  }else {
    consulu1();
  }
}