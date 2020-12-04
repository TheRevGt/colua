let acd = [];

function actdispo(){

  var id=document.getElementById('disex').value;
  var emple=document.getElementById('d_nombre').value;
  var nuemple=document.getElementById('nu_empleado').value;
  var tipo=document.getElementById('opd').value;
  var activo=document.getElementById('di_act').value;
  var marca=document.getElementById('marca').value;
  var modelo=document.getElementById('modelo').value;
  var serie=document.getElementById('n_serie').value;
  var ip=document.getElementById('ipd').value;
  var date=document.getElementById('date').value;
  var estado=document.getElementById('d_estado').value;
  var acti=document.getElementById('estedis').checked;
  if (acti==true) {
    if (nuemple==""){
      alert("Error al enviar dados")
    }else{
      acd ={
      id: id,
      empleado: emple,
      nempleado: nuemple,
      tipo: tipo,
      activo: activo,
      marca: marca,
      modelo: modelo,
      serie: serie,
      ip: ip,
      fecha: date,
      estado: estado,
      estatus: "Inactivo",
      }
    }
  }else{
    if (nuemple==""){
      alert("Error al enviar dados")
    }else{
      console.log(nuemple)
    acd ={
      id: id,
      empleado: emple,
      nempleado: nuemple,
      tipo: tipo,
      activo: activo,
      marca: marca,
      modelo: modelo,
      serie: serie,
      ip: ip,
      fecha: date,
      estado: estado,
      estatus: " ",
    }
  }
}
  
}
function updispo1(){
  actdispo();
	axios.post('../../includes/update/setdispo.php', acd)
  .then(function (response) {
    alert(response.data);
  })
  .catch(function (error) {
    console.log(error);
  });
}
function updispo(){
  var id=document.getElementById('disex').value;
  if (id=="") {
  
  }else{
     updispo1();
  }
     
}