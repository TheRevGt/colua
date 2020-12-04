<!DOCTYPE html>
<html>
<head>
	<title>Actualizar red</title>
	<link rel="stylesheet" href="../../css/main.css" />
	<link rel="icon" type="image/jpg" href="../../img/ico.png">
	<script src="../../js/min.js"></script>
</head>
<body>
	<?php include_once '../../includes/user.php'; $user = new User(); ?>
	<div id="container">
    <nav>
        <ul>
        <li><a href="../../index.php">Soporte</a></li>
	    <li><a href="agencia.php">Equipos<i class="down"></i></a>
            <ul>
                <li><a href="../registraru/agencia.php">Registrar</a></li>
                <li><a href="agencia.php">Actualizar</a></li>
                <li><a href="../consultasu/agencia.php">Consultar</a></li>
            </ul>       
        </li>
	    <li><a href="../../includes/logout.php">Cerrar sesión</a></li>
	  	</ul>
	</nav>
	<div class="menu">
		<br>
		<br>
		<br>
		<li><a href="agencia.php"><img src="../../img/agencia.png" class="ico"> Agencia </a> </li>
		<li><a href="admin.php"><img src="../../img/administracion.png" class="ico"> Área </a> </li>
		<li><a href="admin2.php"><img src="../../img/administracion.png" class="ico"> Puesto </a> </li>
		<li><a href="empleado.php"><img src="../../img/emple.png" class="ico"> Empleado </a></li>
		<li><a href="equipo.php"><img src="../../img/equipo.png" class="ico"> Equipo </a></li>
		<li><a href="software.php"><img src="../../img/software.png" class="ico"> Software </a></li>
		<li><a href="dispositivo.php"><img src="../../img/dispo.png" class="ico"> Dispositivo </a></li>
		<li><a href="red.php"> <img src="../../img/red.png" class="ico">Dispositivo de red </a></li>
	</div>

	<!-- contenido de la pagina-->
	<div class="main">
		
   <section id="red" style="padding-left: 220px;">
		<div class="docs">
			<div class="estilo">
				<h2>Datos del dispositivo de Red</h2></br>
				<b>Agencia:</b>
				<select id="n_agencr" onclick="redex()">
					<optgroup label="Agencia asignada" id="rees">
						
					</optgroup>
					<optgroup label="Nueva agencia">
						<?php include_once '../../includes/user.php';
					$user = new User(); 
					$user->verage();
					?>
					</optgroup>
					<option value="Nuevo">Equipo nuevo</option>
				</select><br>
				<b>Dispositivo</b> <br>
				<select id="reda" onclick="redac()">
					
				</select><br>
				<br><b>Asignar a nueva agencia</b>
				<select id="nagencia">
					<option value="nuevo">Nueva agencia</option>
					<?php include_once '../../includes/user.php';
					$user = new User(); 
					$user->verage();
					?>
				</select>
					<input type="text" id="db_acr" placeholder="Codigo de activo *"></br>
					<input type="text" id="db_tipor" placeholder="Dipositivo *">
					<input type="text" id="db_marcar" placeholder="Marca *"></br>
					<input type="text" id="db_modelor" placeholder="Modelo"></br>
					<input type="text" id="db_serie" placeholder="Serie"></br>
					<input type="text" id="db_ip" placeholder="IP"></br>	
					<input type="date" id="db_dater"></br>
					<select id="r_estado">
						<optgroup label="Estado actual" id="rss">
							
						</optgroup>
						<optgroup label="Nuevo estado">
							<option value="Excelente">Excelente</option>
							<option value="Bueno">Bueno</option>
							<option value="Deficiente">Deficiente</option>	
						</optgroup>
						
					</select>
					<input type="checkbox" id="estred" value="Inactivo">
					<label for="inactivo">Desabilitar</label>			
			</div>
				<input type="button" value="Enviar" onclick="upred()">
				<br><br>
		</div>

	</section>		
<br>
    <div style="width:70%; padding-left: 220px; margin-left: 15%;">		
	<div class="btncons">
    			<button class="mas" onclick="verotroc()" id="uno"><img src="../../img/down.png" height="15" width="15"></button>
    			<button class="mas" onclick="oculotroc()" id="dos"><img src="../../img/up.png" height="15" width="15"></button>
    		</div>
    		<div style="">
    	<section id="consular">
    		<h2> Agencias existentes</h2>
    		<div id="c1">
    		<?php 
    			$query = $user->connect()->prepare("SELECT * FROM red WHERE estatus=''" );
		        $query->execute();
		        $resultado=$query->fetchAll();
		        echo "<table id='cons'>
		        	<th>Agencia</th>
		        	<th>Activo</th>
		        	<th>Nombre</th>
		        	<th>Marca</th>
		        	<th>Serie</th>
		        	<th>Direccion IP</th>	";
		        foreach ($resultado as $res) {
		            echo ('<tbody>
		                <td>'.$res["agencia"].'</td>
		                <td>'.$res["no_activo"].'</td>
		                <td>'.$res["nombre"].'</td>
		                <td>'.$res["marca"].'</td>
		                <td>'.$res["serie"].'</td>
		                <td>'.$res["no_ip"].'</td>
		                </tbody>');          
		        }
		    echo "</table> <br>";
    		?>    			
    		</div>
			<button onclick="exportTableToExcel('cons', 'Empleado')" class='xpore'>Exportar</button> 
    	</div>
    	</section>


</div>

	<script type="text/javascript" src="../../js/axios.js"></script>
	<script type="text/javascript" src="../../js/tabla.js"></script>
	<!-- informaicon-->
	<script type="text/javascript" src="../../js/info/setiexisr.js"></script>
	<script type="text/javascript" src="../../js/info/setired.js"></script>
	<!--updates-->
	<script type="text/javascript" src="../../js/update/setred.js"></script>
</body>
</html>