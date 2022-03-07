<!DOCTYPE html>
<html>
<head>
    <title>Consulta activos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/jpg" href="../../img/ico.png">
    <link href="../../css/dashboard.css" rel="stylesheet">
    <script src="../../js/min.js"></script>
</head>
<body>
    <!-- Nav-->
    <nav class="nav sticky-top flex-md-nowrap p-0 shadow bg-light align-items-center">
        <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">Resgistro</a>
        <div class="float-right" style="float: right;">
        <button class="navbar-toggler  d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span data-feather="menu"></span>
        </button>   
        </div>
        
          <div class="nav">
          <ul class="nav px-4">
            <li class="nav-item text-nowrap"></span><a class="nav-link" href="../../index.php">Soporte</a>
            </li>
          </ul>
          <ul class="nav px-4">
            <li class="dropdown">
                <a class="nav-link dropdown-toggle" id="menunav" role="button" data-toggle="dropdown">
                  Equipos
                </a>
                <div class="dropdown-menu" aria-labelledby="menunav">
                  <a class="dropdown-item" href="../registraru/agencia.php">Registro</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="../actualizau/agencia.php">Actualizar</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="agencia.php">Consultar</a>
                </div>
              </li>
          </ul>
          <ul class="nav px-3">
            <li class="nav-item text-nowrap">
              <a class="nav-link" href="../../includes/logout.php">Cerrar sesión</a>
            </li>
          </ul>
        </div>
      </nav>
    <div class="container-fluid">
      <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
          <div class="sidebar-sticky pt-5">
            <ul class="nav flex-column">
              <li class="nav-item pb-2">
                <a class="nav-link" href="agencia.php">
                  <span data-feather="map-pin"></span>
                  Agencia
                </a>
              </li>
              <li class="nav-item pb-2">
                <a class="nav-link" href="areas.php">
                  <span data-feather="git-merge"></span>
                  Área
                </a>
              </li>
              <li class="nav-item pb-2">
                <a class="nav-link" href="empleado.php">
                  <span data-feather="users"></span>
                  Empleado
                </a>
              </li>
              <li class="nav-item pb-2">
                <a class="nav-link active" href="activos.php">
                  <span data-feather="hash"></span>
                  Activo
                </a>
              </li>
              <li class="nav-item pb-2">
                <a class="nav-link" href="estados.php">
                  <span data-feather="star"></span>
                  Estado
                </a>
              </li>
              <li class="nav-item pb-2">
                <a class="nav-link" href="red.php">
                  <span data-feather="server"></span>
                  Redes
                </a>
              </li>
            </ul>
          </div>
          <footer class="pt-1 my-md-5 pt-md-5 fixed-bottom">
            <div>
              <div class="col-12 col-md">
                <img class="mb-2" src="../../img/logo.png" width="150">
                <small class="d-block mb-3 text-muted">&copy; 2020</small>
              </div>
            </div>
          </footer>
        </nav>
    <?php include_once '../../includes/user.php'; $user = new User(); ?>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-5 align-items-center"> 
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
            <h1 class="h2">Consulta por activos</h1>
            </div>
            <form class="form w-75" method="POST">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label h4">Numero de activo:</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="search" name="tipo-consulta" id="tipo-mascota" placeholder="Activo" class="consul">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="sticky-top col-sm-10">
                        <input class="btn float-right text-white bg-colua" type="submit" value="Consultar" name="send">  
                    </div>
                </div>
            </form>
            <div id="tab" class="table-responsive">
                <?php
                if (isset($_POST['send'])) {
                    $consulta=$_POST['tipo-consulta'];
                    $user->veractivo($consulta);
                    $user->vereactivos($consulta);
                    $user->vereactivospc($consulta);        
                }?>
            </div>
            <div class=" align-items-center">
                <button onclick="exportTableToExcel('resultado', 'Reporte de equipo')" class='btn text-white bg-export'>Guardar equipo <span data-feather="monitor"></button>
                <button onclick="exportTableToExcel('resultado2', 'Reporte de software de equipo')" class='btn text-white bg-export'>Guardar software <span data-feather="code"></button>
                <button onclick="exportTableToExcel('resultado3', 'Reporte de dispositivo')" class='btn text-white bg-export'>Guardar dispositivo <span data-feather="server"></button>
                <button type="button" value="Create PDF" id="btPrint" onclick="createPDF()" class='btn text-white bg-export'>Guardar en PDF <span data-feather="file-text"></button>
            </div>
          </div>
        </main>
      </div>
    </div>
    <script type="text/javascript">
        function createPDF() {
        var fe= new Date();
        var sTable = document.getElementById('tab').innerHTML;
        var style = "<style>"; 
        style=style+"h2{font-size: 15px;text-align: center;}";       
        style = style + "table, th, td {width: auto;text-align: center; padding-right: 4px; padding-left: 4px;  border: 1px solid #898383; border-collapse: collapse; margin: auto; font-size: 11px;}";
        style=style + ".header{background-color: rgb(0,102,204); margin-top: auto; position: relative; text-align: center;}";
        style=style+".im{width: 250; height: 80px;}"
        style = style + "</style>";
        var win = window.open('', '', 'height=700,width=700');
        win.document.write('<html><head>');
        win.document.write(style);
        win.document.write('</head>');
        win.document.write('<body>');
        win.document.write('<h2>Reporte de equipos ',fe.getDate(),'/',fe.getMonth(),'/',fe.getFullYear(),' ',fe.getHours(),':',fe.getMinutes(),'</h2>');
        win.document.write(sTable);
        win.document.write('</body></html>');
        win.document.close();
        win.print();    
    }
    </script>
    <script src="../../dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../js/feather.min.js"></script>
    <script src="../../js/dashboard.js"></script>
    <script type="text/javascript" src="../../js/tabla.js"></script>
    <script type="text/javascript" src="../../js/consulta/activo.js"></script>
</body>
</html>