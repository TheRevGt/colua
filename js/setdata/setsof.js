let data = [];  
function eliminas(){
    var fila=document.getElementById('s').value;
    var fi=fila-1;
    document.getElementById("tablas").deleteRow(fi);
}
function guardars(){   
    var nombre = document.getElementById("nombre").value;
    var edicion = document.getElementById("edicion").value;
    //console.log(nombre);
    if (nombre=="") {
      document.getElementById("nombre").focus();
    }else{
      var fila="<tr><td class='nombre'>"+nombre+"</td><td class='edicion'>"+edicion+"</td>";
      var btn = document.createElement("TR");
      btn.innerHTML=fila;
      document.getElementById("tablas").appendChild(btn);
      document.getElementById("nombre").value = "";
      document.getElementById("edicion").value = "";
    }   
}

function toObjects(){
  data=[];
  document.querySelectorAll('.software tbody tr').forEach(function(e){
  let fila = {
    nombre: e.querySelector('.nombre').innerText,
    edicion: e.querySelector('.edicion').innerText,
    empleado: document.getElementById('n_empleado').value,
    activop: document.getElementById('db_eactivo').value  
  };
  data.push(fila);  
});
}


function savesof1(){
    toObjects();
    axios.post('../../includes/insdata/savesof.php', data)
  .then(function (response) {
    console.log(response);
  })
  .catch(function (error) {
    console.log(error);
  });
}
function savesof(){
  savesof1();
  elimanarFila();
  savepc();
}

function elimanarFila(){
  $('.software tbody').empty();
}