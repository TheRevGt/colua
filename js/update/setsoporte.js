let acsopt = [];
function actsopor(){
  var date = new Date();
  var dateStr =
  ("00" + (date.getMonth() + 1)).slice(-2) + "/" +
  ("00" + date.getDate()).slice(-2) + "/" +
  date.getFullYear() + " " +
  ("00" + date.getHours()).slice(-2) + ":" +
  ("00" + date.getMinutes()).slice(-2) + ":" +
  ("00" + date.getSeconds()).slice(-2);
  var id=document.getElementById('idso').innerHTML;
  var acti=document.getElementById('estado').checked;
  var coment=document.getElementById('comentario').value;

  if (acti==true) {
    acsopt ={
      ids: id,      
      fecha: dateStr,
      estatus: "Resuelto",
      comentario: coment
    }
  }
}
function upsoporte1(){
  actsopor();
	axios.post('includes/update/setsoporte.php', acsopt)
  .then(function (response) {
    //console.log(response);
    alert(response.data);
  })
  .catch(function (error) {
    console.log(error);
  });
}
function upsoporte(){
  var id=document.getElementById('idso').value;
  var acti=document.getElementById('estado').checked;
  if (acti==true) {
    upsoporte1();
    window.location.href="index.php";
  }else{
    document.getElementById('estado').focus();
  }     
}