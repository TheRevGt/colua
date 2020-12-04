let sod=[];
function toObjectsso(){
  sod = {
    nombre: document.getElementById('n_empleado').value,
    edicion: document.getElementById('pcex').value,
    empleado: document.getElementById('nombre').value,
    activop: document.getElementById('edicion').value  
  };
}
function savesof1(){
    toObjectsso();
    axios.post('../../includes/insdata/insso.php', sod)
  .then(function (response) {
    console.log(response);
  })
  .catch(function (error) {
    console.log(error);
  });
}
function savesof(){
  var emple=document.getElementById('n_empleado').value;
  var pc=document.getElementById('pcex').value
  var no=document.getElementById('nombre').value;
  if (no=="") {
    document.getElementById('nombre').focus();
  }
  if (emple=="Nuevo") {
    document.getElementById('pcex').focus();
  }
  if (pc=="") {
    document.getElementById('n_empleado').focus();
  }
  
  if(emple!="Nuevo" & pc!="" & no!=""){
    savesof1();
  }
  
}