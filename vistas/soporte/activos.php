<!DOCTYPE html>
<html>
<head>
	<title>Soporte</title>
	<link rel="stylesheet" href="css/main.css"/>
	<link rel="icon" type="image/jpg" href="img\ico.png">
	<script src="js/min.js"></script>
</head>
<body>
	<div id="container">
    <nav>
        <ul>
        <li><?php echo $user->getNombre(); ?></li>
		<li><a href="index.php">Soporte</a></li>
	    <li><a href="vistas/registrou/agencia.php">Equipos<i class="down"></i></a>
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
			<button><a href="index.php">Tickets </a></button>
			<button onclick="vertodoso()">Resueltos</button>
		</div>
		<div class="main">
		
	    <section id="datas">
	    	<section id="activosc">
	    	<h2>Tickets</h2>
	    		<section style="width: 100%; padding-left: 260px;" onClick="reply_click()">
					<?php 
						$query = $user->connect()->prepare("SELECT * FROM soporte WHERE tecnico=? AND estado='Activo'");
				        $query->execute([$user->getNombre()]);
				        $resultado=$query->fetchAll();
				        echo "<br>";
				        foreach ($resultado as $res) {
				        	echo 
				        	"<br><div class='ef' style='float: left'> <br>
				        	<b>Id:</b>".$res["id"]."<br>
				        	<b>Empleado:</b> ".$res["empleado"]."<br>
				        	<b>Fecha:</b> ".$res["fecha_activo"]."<br> 
				        	<b>Problema:</b> ".$res["problema"]."<br>";
				        	foreach ($resultado as $res) {
				        	echo 
				        	"<div class='ef' style='float: left'> <br>
				        	<b>Id:</b>".$res["id"]."<br>
				        	<b>Empleado:</b> ".$res["tecnico"]."<br>
				        	<b>Fecha:</b> ".$res["fecha_activo"]."<br> 
				        	<b>Problema:</b> ".$res["problema"]."<br>
				        	";
				        	$dir="docs/".$res["id"]; //ruta de imagenes
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
							echo "<img src='$dir/$archivo' height='50' width='50'>";
							}
						}
				        echo "<br><button id='".$res["id"]."'>Ver</button>
				        	<div>";
				        }
					?>
			    </section>
			    <section style="padding-left:360px; text-align: left;">

			    	<div class="padre">
			    		Numero de ticket: <label id="idso"></label><br>
			    		<div class="hijo" style="width: 60px">
			    			Nombre:
			    		</div>
			    		<div class="hijo">
			    			<input type="text" id="nombre" style="width: 270px" disabled><br>
			    		</div>
			    	</div>
			    	<div class="padre">
			    		<div class="hijo" style="width: 60px">
			    			Agencia:
			    		</div>
			    		<div class="hijo">
			    			<input type="text" id="agencia" style="width: 270px" disabled><br>
			    		</div>
			    	</div>
			    	<div class="padre">
			    		<div class="hijo" style="width: 60px">
			    			Puesto:
			    		</div>
			    		<div class="hijo">
			    			<input type="text" id="puesto" style="width: 270px" disabled><br>
			    		</div>
			    	</div>
			    	<div class="padre">
			    		<div class="hijo" style="width: 60px">
			    			ip:
			    		</div>
			    		<div class="hijo">
			    			<input type="text" id="ip" style="width: 270px" disabled><br>
			    		</div>
			    	</div>
			    	<div class="padre">
			    		<div class="hijo" style="width: 60px">
			    			fecha:
			    		</div>
			    		<div class="hijo">
			    			<input type="text" id="fecha" style="width: 270px" disabled><br>
			    		</div>
			    	</div>
			    	<div class="padre">
			    		<div class="hijo" style="width: 60px">
			    			Problema:
			    		</div>
			    	</div>
			    	<div class="padre">
			    		<div class="hijo" style="padding-left: 60px">
			    			<textarea id="comentarios" rows="13" placeholder="Descripción del problema:" style="width: 270px" disabled></textarea>
			    		</div>
			    	</div>
			    	<div class="padre">
			    		<div class="hijo" style="width: 60px">
			    			Solucionado:
			    		</div>
			    	</div>
			    	<div class="padre">
			    		<div class="hijo" id="" style="width: 60px">
			    			<input type="checkbox" id="estado" value="Reuselto">
			    		</div>
			    	</div>
			    	<div class="padre">
			    		<input type="button" onclick="upsoporte()" value="Enviar" style="width: 150px">		
			    	</div>
			    
			    </section>
			</section>
			<section id="todosop">
	    	<h2>Tickets</h2>
	    		<section style="width: 100%; padding-left: 260px;" onClick="reply_click()">
					<?php 
						$query = $user->connect()->prepare("SELECT * FROM soporte WHERE tecnico=? ");
				        $query->execute([$user->getNombre()]);
				        $resultado=$query->fetchAll();
				        echo "<br>";
				        foreach ($resultado as $res) {
				        	echo 
				        	"<div class='ef' style='float: left;'> <br>
				        	<b>Id</b>:".$res["id"]."<br>
				        	<b>Empleado:</b> ".$res["empleado"]."<br>
				        	<b>Fecha:</b> ".$res["fecha_activo"]."<br> 
				        	<b>Problema:</b> ".$res["problema"]."<br>
				        	<b>Problema:</b> ".$res["estado"]."<br>
				        	<br>
				        	</div>";
				        }
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
        win.document.write('<h2>Consultas ',fe.getDate(),'/',fe.getMonth(),'/',fe.getFullYear(),' ',fe.getHours(),':',fe.getMinutes(),'</h2>');
        win.document.write(sTable);
        win.document.write('</body></html>');
        win.document.close();
        win.print();    
    }
    </script>
</body>
</html>