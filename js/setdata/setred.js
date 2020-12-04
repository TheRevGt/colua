let datasr = [];
function todored(){
  var na=document.getElementById('n_agencr').value;
  var acti=document.getElementById('db_acr').value;
  var tipor=document.getElementById('db_tipor').value;
  var marcar=document.getElementById('db_marcar').value;
  var modelor=document.getElementById('db_modelor').value;
  var serier=document.getElementById('db_serie').value;
  var ipr=document.getElementById('db_ip').value;
  var dater=document.getElementById('db_dater').value;
  var est= document.getElementById('r_estado').value;
  if (ipr=="") {
    datasr ={
    no_age:na,
    activo: acti,
    tipo: tipor,
    marca: marcar,
    modelo: modelor,
    serie: serier,
    ip: 's/n',
    fecha: dater,
    estado: est
    }
  }
  if (ipr!="" & acti!="") {
    datasr ={
    no_age:na,
    activo: acti,
    tipo: tipor,
    marca: marcar,
    modelo: modelor,
    serie: serier,
    ip: ipr,
    fecha: dater,
    estado: est
    }
  }
}
function savere(){
  todored();
	axios.post('../../includes/insdata/savedred.php', datasr)
  .then(function (response) {
    alert(response.data);
  })
  .catch(function (error) {
    console.log(error);
  });
}
function savered(){
  var na=document.getElementById('n_agencr');
  var tipor=document.getElementById('db_tipor');
  var marcar=document.getElementById('db_marcar');
  var dater=document.getElementById('db_dater');
  var acti=document.getElementById('db_acr');
 if (dater.value=="") {
      dater.focus();
    }
    if (marcar.value=="") {
      marcar.focus();
    }
    if (tipor.value=="") {
      tipor.focus();
    }
    if (na.value=="") {
      na.focus();
    }
    if(na.value!="" & tipor.value!="" & marcar.value!="" & dater.value!=""){
      savere(); 
    }
}