<!DOCTYPE html>
<html>
<head>
	<title>Soporte</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/jpg" href="img/ico.png">
    <link href="css/dashboard.css" rel="stylesheet">
    <script src="js/min.js"></script>
    <script src="js/jquery.js"></script>
	<script src="js/view.js"></script>
	<script type="text/javascript" src="js/push.min.js"></script>
</head>
<body>
	<section>
		<div id='background'></div>
		<div id='preview'><div id='close'><span data-feather="x"></span></div><div id='content'></div></div>
	</section>
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
            <li class="nav-item text-nowrap"></span><a class="nav-link" href="index.php">Soporte</a>
            </li>
          </ul>
          <ul class="nav px-4">
            <li class="dropdown">
                <a class="nav-link dropdown-toggle" id="menunav" role="button" data-toggle="dropdown">
                  Equipos
                </a>
                <div class="dropdown-menu" aria-labelledby="menunav">
                  <a class="dropdown-item" href="vistas/registraru/agencia.php">Registro</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="vistas/actualizau/agencia.php">Actualizar</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="vistas/consultasu/agencia.php">Consultar</a>
                </div>
              </li>
          </ul>
          <ul class="nav px-3">
            <li class="nav-item text-nowrap">
              <a class="nav-link" href="includes/logout.php">Cerrar sesión</a>
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
                <a class="nav-link" href="index.php">
                  <span data-feather="toggle-right"></span>
                  Activos
                </a>
              </li>
              <li class="nav-item pb-2">
                <a class="nav-link" href="javaScript:vertodoso()">
                  <span data-feather="list"></span>
                  Todos
                </a>
              </li>
            </ul>
          </div>
          <footer class="pt-1 my-md-5 pt-md-5 fixed-bottom">
            <div>
              <div class="col-12 col-md">
                <img class="mb-2" src="img/logo.png" width="150">
                <small class="d-block mb-3 text-muted">&copy; 2020</small>
              </div>
            </div>
          </footer>
        </nav>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-5 align-items-center">
		    <div id="activosc">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
            <h1 class="h2">Tikets</h1>
            </div>
            <div class="row">
	            <?php $data_empre = $user->getNombre();
      			$_SESSION['us'] = $data_empre; ?>
	            <!--VER-->
			    <div class="col-sm-4" onClick="reply_click()" id="data_noti">
					<?php
						$query = $user->connect()->prepare("SELECT * FROM soporte WHERE tecnico=? AND estado='Activo'");
				        $query->execute([$user->getNombre()]);
				        $resultado=$query->fetchAll();
				        echo "<div class='ef2' id='ef2'>";
				        foreach ($resultado as $res) {
				        	echo 
				        	'<div class="card">';
				       		$dir="../soporte/docs/".$res["id"]; //ruta de imagenes
				        	if(!file_exists($dir)){
								echo "Sin docs";
							}else{
							$directorio = opendir($dir);
							while ($archivo = readdir($directorio)) {
							if ($archivo=="." || $archivo=="..") { echo " "; } else {
							$archivos[$archivo] = $archivo;
							}
							}
							ksort ($archivos);
							foreach ($archivos as $archivo) {
								$info = new SplFileInfo($archivo);
								$formato=$info->getExtension();
								if ($formato=="jpg" OR $formato=="jpeg" OR $formato=="gif" OR $formato=="png") {
									if (file_exists($dir.'/'.$archivo)) {
									    echo "<img src='$dir/$archivo' height='100' width='100' class='image'>";
									} else {
									}									
								}else{
									if (file_exists($dir.'/'.$archivo)) {
									    echo "<span data-feather='file(filename)'></span><a href='$dir/$archivo'> $archivo </a>";
									} else {
									}
									
								}
							}
						}
						echo "<div class='card-body'>
						    <h5 class='card-title'>ID ticket: ".$res["id"]."</h5>
						    <p class='card-text'><b>Empleado:</b> ".$res["empleado"]."</p>
						    <p class='card-text'><b>Fecha:</b> ".date("d/m/Y H:i:s", strtotime($res["fecha_activo"]))."</p>
						    <p class='card-text'><b>Problema:</b> ".$res["problema"]."</p>
						    <button class='btn btn-primary' id='".$res["id"]."'>Ver</button>
				        	</div>
						  </div><br>
						  <script>
							Push.create('Soprte COLUA RL '+".$res["id"].", {
								body: '".$res["problema"]."',
								icon: 'img/ico.png',
								timeout: 12000,
								onClick: function () {
									window.location = 'index.php'; 
									this.close();
								}
							});
							</script>";
				        }
					?>
				</div>
			    </div>
			    <!--FORM-->
			    <div class="col-sm-8" id="inform">
			    <div class="form-group row">
                    <label class="col-sm-3 col-form-label h4">Numero de ticket:</label>
                    <div class="col-sm-9">
                    	<label class="form-control" id="idso"></label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label h4">Empleado:</label>
                    <div class="col-sm-9">
                    	<label class="form-control" id="nombre"></label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label h4">Agencia:</label>
                    <div class="col-sm-9">
                    	<label class="form-control" id="agencia"></label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label h4">Puesto:</label>
                    <div class="col-sm-9">
                    	<label class="form-control" id="puesto"></label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label h4">IP:</label>
                    <div class="col-sm-9">
                    	<label class="form-control" id="ip"></label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label h4">Fecha:</label>
                    <div class="col-sm-9">
                    	<label class="form-control" id="fecha"></label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label h4">Problema:</label>
                    <div class="col-sm-9">
                    	<textarea class="form-control" id="comentarios" rows="7" placeholder="Descripción del problema:" readonly></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label h4">Comentario:</label>
                    <div class="col-sm-9">
                    	<textarea class="form-control" id="comentario" rows="7" placeholder="Agregar comentario:"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label h4">Solución:</label>
                    <div class="col-sm-9">
                    	<input type="checkbox" id="estado" value="Reuselto">
                    </div>
                </div>
			    <div class="form-group row">
                    <div class="sticky-top col-sm-10">
                        <input class="informe btn float-right text-white bg-colua" type="button" value="Actualizar" id="env">  
                    </div>
                </div>
		    </div>
		    </div>
		</div>
		    <div id="todosop">
				asdasd
	    		<section class="table-resposive" onClick="reply_click()">
					<?php
					$query = $user->connect()->prepare("SELECT * FROM soporte WHERE tecnico=?");
			        $query->execute([$user->getNombre()]);
			        	echo "<h2>Todos los tickets</h2>";
				        echo "<div class='table table-hover table-sm'>
				        <table id='resultado'>";     
				                echo "<thead class='thead-light'><tr>";
				                echo "<th> ID ticket</th>";
				                echo "<th> Empleado </th>";
				                echo "<th> Agencia </th>";
				                echo "<th> Puesto </th>";
				                echo "<th> Dirección Ip </th>";
				                echo "<th> Problema </th>";
				                echo "<th> Comentario </th>";
				                echo "<th> Estado </th>";
				                echo "<th> Fecha de entrada </th>";
				                echo "<th> Fecha de solución </th>";
				                echo "<tr></thead>";
				        $resultado=$query->fetchAll();
				        foreach ($resultado as $res) {
				                echo "<td>".$res["id"]."</td>";
				                echo "<td>".$res["empleado"]."</td>";
				                echo "<td>".$res["agencia"]."</td>";
				                echo "<td>".$res["puesto"]."</td>";
				                echo "<td>".$res["ip"]."</td>";
				                echo "<td>".$res["problema"]."</td>";
				                echo "<td>".$res["cometario"]."</td>";
				                echo "<td>".$res["estado"]."</td>";
				                echo "<td>".date("d/m/Y H:i:s", strtotime($res["fecha_activo"]))."</td>";
				                if ($res["fecha_solucion"]=="") {
				                    echo "<td>".$res["fecha_solucion"]."</td>";
				                }else{
				                    echo "<td>".date("d/m/Y H:i:s", strtotime($res["fecha_solucion"]))."</td>";
				                }
				                echo "</tr>";                                   
				        }
				        echo "</table> </div>";		
					?>
			    </section>
	    	</div>
          </div>
        </main>
      </div>
    </div>
		<script src="dist/js/bootstrap.bundle.min.js"></script>
    	<script src="js/feather.min.js"></script>
    	<script src="js/dashboard.js"></script>
		<script type="text/javascript" src="js/info/setisopor.js"></script>
		<script type="text/javascript" src="js/update/setsoporte.js"></script>
		<script type="text/javascript" src="js/axios.js"></script>
		<script type="text/javascript">
			document.getElementById('todosop').style.display = 'none';
			function vertodoso(){
				document.getElementById('todosop').style.display = 'block';
				document.getElementById('activosc').style.display = 'none';

			}			
		</script>
		<script type="text/javascript">
			//cargar notificaciones
			$(document).ready(function(){
			setInterval(
				function(){
					$('#data_noti').load('includes/info/noti.php');
				},60000
				);
			});
			//limpiar campos no encontrados
			var images = $(".image");

			$(images).on("error", function(event) {
			$(event.target).css("display", "none");
			});
		    
		$('.informe').click( function() {
			var comentid=document.getElementById('comentario').value;
			document.getElementById('comentario').innerHTML= comentid;
			var id=document.getElementById('idso').value;
			var acti=document.getElementById('estado').checked;
			if (acti==true) {
			    createPDF();
				upsoporte();
			}else{
				document.getElementById('estado').focus();
			}
		});

        function createPDF() {
        var sTable = document.getElementById('inform').innerHTML;
        var style = '<style> body{pading: 50px;}.padre textarea{  width: 100%;  border-bottom: solid black 1px;} .firma{text-align:center;} h2{text-align:center;}.padre {margin-right: 5px; width: auto;text-align: left;}.hijo { width: 80%;display: inline-block; text-align: left;margin: 5px;}</style>';
        var win = window.open('', '', 'height=700,width=700');
        win.document.write('<html><head>');
        win.document.write(style);
        win.document.write('</head>');
        win.document.write('<body>');
        win.document.write('<h2>Reporte soporte tecnico</h2>');
        win.document.write(sTable);
        win.document.write('<br><br><br><div class="firma"> F: _______________________________ </div>');
        win.document.write('</body></html>');
        win.document.close();
        win.print();    
    }
    </script>
</body>
</html>