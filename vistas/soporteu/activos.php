<!DOCTYPE html>
<html>
<head>
	<title>Soporte</title>
	<link rel="stylesheet" href="css/main.css"/>
	<link rel="icon" type="image/jpg" href="img\ico.png">
	<script src="js/min.js"></script>
	<script src="js/jquery.js"></script>
	<script src="js/view.js"></script>
	<script type="text/javascript" src="js/push.min.js"></script>
</head>
<body>
	<div id="container">
    <nav>
        <ul>
		<li><a href="index.php">Soporte</a></li>
	    <li><a href="vistas/registraru/agencia.php">Equipos<i class="down"></i></a>
            <ul>
                <li><a href="vistas/registraru/agencia.php">Registrar</a></li>
                <li><a href="vistas/actualizau/agencia.php">Actualizar</a></li>
                <li><a href="vistas/consultasu/agencia.php">Consultar</a></li>
            </ul>       
        </li>
	    <li><a href="includes/logout.php">Cerrar sesión</a></li>
	  	</ul>
	</nav>

	<!-- contenido de la pagina-->
	<div class="">
		<div class="menu">
			<br>
			<br>
			<br>
			<li><a href="index.php"><img src="img/todo.png" class="ico">Tickets </a></li>
			<li><a href="javaScript:vertodoso()"><img src="img/checked.png" class="ico">Tickets </a></li>
		</div>
		<div class="main">
		<section>
			<div id='background'></div>
			<div id='preview'><div id='close'><img src="img/close.png"></div><div id='content'></div></div>
	    </section>
	    <section id="datas">
	    	<section id="activosc">
	    	<h2>Tickets</h2>
	    		<section style="width: 100%; padding-left: 260px;" onClick="reply_click()">
					<?php 
					header("Refresh: 60; URL='index.php'");
						$query = $user->connect()->prepare("SELECT * FROM soporte WHERE tecnico=? AND estado='Activo'");
				        $query->execute([$user->getNombre()]);
				        $resultado=$query->fetchAll();
				        echo "<br><div class='ef2' id='ef2'>";
				        foreach ($resultado as $res) {
				        	echo 
				        	"<div class='ef' style='float: left'> <br>
				        	<b>Id:</b>".$res["id"]."<br>
				        	<b>Empleado:</b> ".$res["empleado"]."<br>
				        	<b>Fecha:</b> ".$res["fecha_activo"]."<br> 
				        	<b>Problema:</b> ".$res["problema"]."<br>
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
							</script>
				        	";
				       		$dir="../soporte/docs/".$res["id"]; //ruta de imagenes
				        	if(!file_exists($dir)){
								echo "Sin imagenes";
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
									    echo "<a href='$dir/$archivo'> $archivo </a>";
									} else {
									}
									
								}
							}
						}
						echo "<br><button id='".$res["id"]."'>Ver</button>
				        	</div>";
				        }
				        echo "</div>";
					?>
			    </section>
			    <section style="padding-left:360px; text-align: left;">
			    <section style="text-align: left;" id="inform">

			    	<div class="padre">
			    		<b>Numero de ticket:</b> <label id="idso"></label><br>
			    		<div class="hijo" style="width: 60px">
			    			<b>Nombre: </b>
			    		</div>
			    		<div class="hijo">
			    			<label id="nombre"></label>			    			
			    		</div>
			    	</div>
			    	<div class="padre">
			    		<div class="hijo" style="width: 60px">
			    			<b>Agencia: </b>
			    		</div>
			    		<div class="hijo">
			    			<label id="agencia"></label>
			    		</div>
			    	</div>
			    	<div class="padre">
			    		<div class="hijo" style="width: 60px">
			    			<b>Puesto: </b>
			    		</div>
			    		<div class="hijo">
			    			<span id="puesto"></span>
			    		</div>
			    	</div>
			    	<div class="padre">
			    		<div class="hijo" style="width: 60px">
			    			<b>ip: </b>
			    		</div>
			    		<div class="hijo">
			    			<label id="ip"></label>
			    		</div>
			    	</div>
			    	<div class="padre">
			    		<div class="hijo" style="width: 60px">
			    			<b>fecha: </b>
			    		</div>
			    		<div class="hijo">
			    			<label id="fecha"></label>
			    		</div>
			    	</div>
			    	<div class="padre">
			    		<div class="hijo" style="width: 60px">
			    			<b>Problema: </b>
			    		</div>
			    	</div>
			    	<div class="padre">
			    		<div class="hijo" style="padding-left: 60px">
			    			<textarea id="comentarios" rows="13" placeholder="Descripción del problema:" readonly></textarea>
			    		</div>
			    	</div>
			    	<div class="padre">
			    		<div class="hijo" style="width: 60px">
			    			<b>Comentario: </b>
			    		</div>
			    	</div>
			    	<div class="padre">
			    		<div class="hijo" style="padding-left: 60px">
			    			<textarea id="comentario" rows="13" placeholder="Agregar comentario:"></textarea>
			    		</div>
			    	</div>
			    </section>
			    	<div class="padre">
			    		<div class="hijo" style="width: 60px">
			    			<b>Solucionado: </b>
			    		</div>
			    	</div>
			    	<div class="padre">
			    		<div class="hijo" id="" style="width: 60px">
			    			<input type="checkbox" id="estado" value="Reuselto">
			    		</div>
			    	</div>
			    	<div class="padre">
			    		<input type="button" class="informe" value="Enviar" style="width: 150px">
			    	</div>
			    
			    </section>
			</section>
			<section id="todosop">
	    	<h2>Tickets</h2>
	    		<section style="width: 100%; padding-left: 260px;" onClick="reply_click()">
					<?php
					$query = $user->connect()->prepare("SELECT * FROM soporte WHERE tecnico=?");
			        $query->execute([$user->getNombre()]);
			        	echo "<br> <h2>Todos los tickets</h2>";
				        echo "<div class='ared'>
				        <table id='resultado'>";     
				                echo "<div><tr>";
				                echo "<th> ID ticket</th>";
				                echo "<th> Empleado </th>";
				                echo "<th> Agencia </th>";
				                echo "<th> Puesto </th>";
				                echo "<th> Dirección Ip </th>";
				                echo "<th> Problema </th>";
				                echo "<th> Estado </th>";
				                echo "<th> Fecha de entrada </th>";
				                echo "<th> Fecha de solución </th>";
				                echo "<tr>";
				        $resultado=$query->fetchAll();
				        foreach ($resultado as $res) {
				                echo "<td>".$res["id"]."</td>";
				                echo "<td>".$res["empleado"]."</td>";
				                echo "<td>".$res["agencia"]."</td>";
				                echo "<td>".$res["puesto"]."</td>";
				                echo "<td>".$res["ip"]."</td>";
				                echo "<td>".$res["problema"]."</td>";
				                echo "<td>".$res["estado"]."</td>";
				                echo "<td>".$res["fecha_activo"]."</td>";
				                echo "<td>".$res["fecha_solucion"]."</td>";
				                echo "</tr>";                                   
				        }
				        echo "</table> </div>";		
					?>
			    </section>
			    

	    </section>
	    </section>
		</div>
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