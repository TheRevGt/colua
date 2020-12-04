let d = [];

function tomad(){
  var emple=document.getElementById('d_nombre').value;
  d ={
        empleado: emple
    }
}
function setinfo(){
  tomad();
	axios.post('includes/user.php', d)
  .then(function (response) {
    console.log(response);
  })
  .catch(function (error) {
    console.log(error);
  });
}
