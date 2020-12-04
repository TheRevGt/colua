let isop = [];
let id=0;
  function reply_click(e) {
          e = e || window.event;
          e = e.target || e.srcElement;
          if (e.nodeName === 'BUTTON') {
          id=e.id;
          isop ={
            id: e.id
          }
          axios.post('includes/info/vrsop.php', isop)
          .then(function (response) {
          document.getElementById('idso').innerHTML=response.data[6];
          document.getElementById('nombre').innerHTML=response.data[0];
          document.getElementById('agencia').innerHTML=response.data[1];
          document.getElementById('puesto').innerHTML=response.data[2];
          document.getElementById('ip').innerHTML=response.data[3];
          document.getElementById('fecha').innerHTML=response.data[4];
          document.getElementById('comentarios').innerHTML=response.data[5];
        })
        .catch(function (error) {
          console.log(error);
        });
          }
  }
