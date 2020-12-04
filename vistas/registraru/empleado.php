<!DOCTYPE html>
<html>
<head>
	<title>Registrar empleado</title>
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
                <li><a href="agencia.php">Registrar</a></li>
                <li><a href="../actualizau/agencia.php">Actualizar</a></li>
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
		<li><a href="admin.php"><img src="../../img/administracion.png" class="ico"> Administrativo </a> </li>
		<li><a href="empleado.php"><img src="../../img/emple.png" class="ico"> Empleado </a></li>
		<li><a href="equipo.php"><img src="../../img/equipo.png" class="ico"> Equipo </a></li>
		<li><a href="dispositivo.php"><img src="../../img/dispo.png" class="ico"> Dispositivo </a></li>
		<li><a href="red.php"> <img src="../../img/red.png" class="ico">Dispositivo de red </a></li>
	</div>
	<!-- contenido de la pagina-->
	<div class="main">
		<section id="da" style="padding-left: 220px">
		<div class="docs">		
			<div class="estilo">
			<h2>Datos del empleado</h2><br>
			<b>Agencia: </b><br>
				<select id="n_agenc">
    				<option value=" ">Seleccionar agencia</option>
				<?php include_once '../../includes/user.php';
				$user = new User(); 
				$user->verage();
				?>
				</select>
				<br><b>Área administrativa: </b><br>
				<select id="n_are">
    				<option value=" ">Seleccionar área</option>
    				<?php $user->verare(); ?>
				</select>
				<br><b>Puesto: </b><br>
				<select id="pu" >
    				<option value=" ">Seleccionar puesto</option>
    				<?php $user->verpuesto(); ?>
				</select>
				<input type="text" id="db_nom" placeholder="Nombre *"><br>
				<input type="text" id="db_user" placeholder="Usuario *"><br>
				<input type="text" id="db_pas" placeholder="Contraseña *"><br>				
			</div>
			<input type="button" value="Enviar" onclick="savedemple()">
			<br>
			<br>
		</section>
	</div>
	<div style="width:70%; padding-left: 220px; margin-left: 15%;">
	<div class="btncons">
    			<button class="mas" onclick="verotroc()" id="uno"><img src="../../img/down.png" height="15" width="15"></button>
    			<button class="mas" onclick="oculotroc()" id="dos"><img src="../../img/up.png" height="15" width="15"></button>
    		</div>
    	<div>
    	<section id="consular">
    		<h2> Agencias existentes</h2>
    		<div id="c1">
    		<?php 
    			$query = $user->connect()->prepare("SELECT * FROM empleado WHERE estado=''" );
		        $query->execute();
		        $resultado=$query->fetchAll();
		        echo "<table id='cons'>
		        	<th>Nombre</th>
		        	<th>Area</th>
		        	<th>Puesto</th>
		        	<th>Agencia</th>
		        	<th>Usuario</th>
		        	<th>Contraseña</th>	";
		        foreach ($resultado as $res) {
		            echo ('<tbody>
		                <td>'.$res["nombres"].'</td>
		                <td>'.$res["area"].'</td>
		                <td>'.$res["puesto"].'</td>
		                <td>'.$res["agencia"].'</td>
		                <td>'.$res["usuario"].'</td>
		                <td>'.$res["paswor"].'</td>
		                </tbody>');          
		        }
		    echo "</table> <br>";
    		?>    			
    		</div>
			<button onclick="exportTableToExcel('cons', 'Empleado')" class='xpore'>Exportar</button> 
    	</div>
    	</section>
		</div>
	</div>
	<script type="text/javascript" src="../../js/axios.js"></script>
	<script type="text/javascript" src="../../js/setdata/setemp.js"></script>
	<script type="text/javascript" src="../../js/tabla.js"></script>
</body>
</html>