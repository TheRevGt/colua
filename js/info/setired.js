let idis = [];

function vred(){
  var empleado=document.getElementById('reda').value;
  idis ={
        dispositivo: empleado
    }
}
function redac1(){
  vred();
	axios.post('../../includes/info/vrred.php', idis)
  .then(function (response) {
    //console.log(response);
    document.getElementById('rees').innerHTML=response.data[0];
    document.getElementById('db_acr').value=response.data[1];
    document.getElementById('db_tipor').value=response.data[2];
    document.getElementById('db_marcar').value=response.data[3];
    document.getElementById('db_modelor').value=response.data[4];
    document.getElementById('db_serie').value=response.data[5];
    document.getElementById('db_ip').value=response.data[6];
    document.getElementById('db_dater').value=response.data[7];
    document.getElementById('rss').innerHTML=response.data[8];
  })
  .catch(function (error) {
    console.log(error);
  });
}
function redac(){
    redac1();
}
