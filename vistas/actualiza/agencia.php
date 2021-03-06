<!DOCTYPE html>
<html>
<head>
	<title>Actualizar agencia</title>
	<link rel="icon" type="image/jpg" href="../../img\ico.png">
	<link rel="stylesheet" href="../../css/main.css" />
	<script src="../../js/min.js"></script>
</head>
<body>
	<?php include_once '../../includes/user.php'; $user = new User(); ?>
	<div id="container">
    <nav>
        <ul>
        <li><a href="../soporte/todos.php">Soporte</a></li>
	    <li><a href="agencia.php">Equipos<i class="down"></i></a>
            <ul>
                <li><a href="../registrar/agencia.php">Registrar</a></li>
                <li><a href="agencia.php">Actualizar</a></li>
                <li><a href="../consultas/agencia.php">Consultar</a></li>
            </ul>       
        </li>
	    <li><a href="../registro.php">Usuario</a></li>
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
		
    <section id="age" style="padding-left: 220px">
    	<div class="docs">
    		<div class="estilo">
    			<h2>Datos de agencia</h2>
    			<select id="n_agenc" onclick="envag()">
				<?php include_once '../includes/user.php';
				$user = new User(); 
				$user->verage();
				?>
				</select>
				<div id="contag">
				<input type="text" id="db_nager">
		        <input type="text" id="db_ager">
		        <b>Asignar tecnico</b>
		        <select id="tecnic">
		        	<option value="0">Ninguno</option>
		        	<?php
		        	$query = $user->connect()->prepare("SELECT * FROM users WHERE nombre!='Administrador'");
			        $query->execute();
			        $resultado=$query->fetchAll();
			        foreach ($resultado as $res) {
			            echo '<option value="'.$res["id_user"].'">'.$res["nombre"].' </option>';            
			        }?>
		        </select>				
				</div>				
    		</div>
    		<input type="button" value="Actualizar" onclick="upagea()">
    		<br>
    		<br>
    		<br>
    		<div class="btncons">
    			<button class="mas" onclick="verotroc()" id="uno"><img src="../../img/down.png" height="15" width="15"></button>
    			<button class="mas" onclick=" oculotroc()" id="dos"><img src="../../img/up.png" height="15" width="15"></button>
    		</div>

    	</div>
   	</section>
   	<div class="consular">
    	<section id="consular">
    		<br>    		
    		<h2> Agencias existentes</h2>
    		<br>
    		<?php 
				$query = $user->connect()->prepare("SELECT u.nombre AS user_nombre, a.n_agencia, a.nombre FROM users u, agencia a WHERE u.id_user=a.soport");
		        $query->execute();
		        $resultado=$query->fetchAll();
		        echo "<div>
		        <table style='text-align: center;' id='cons'>
		        <th>Numero</th>
		        <th>Nombre</th>
		        <th>Tecnico</th>
		        ";
		        foreach ($resultado as $res) {
		        	echo 
			        	"<tr>
			        	<td>".$res["n_agencia"]."</td>
			        	<td>".$res["nombre"]."</td>
			        	<td>".$res["user_nombre"]."</td>
			        	</tr>";
		        }
		        echo "</table></div>";
			?>
			<br>
			<button onclick="exportTableToExcel('cons', 'Agencias')" class='xpore'>Exportar</button> 
			<br>
			<br>
    	</div>
    	</section>
    </section>
	</div>
	<script type="text/javascript" src="../../js/axios.js"></script>
	<script type="text/javascript" src="../../js/tabla.js"></script>
	<!-- informaicon-->
	<script type="text/javascript" src="../../js/info/setiag.js"></script>
	<!--updates-->
	<script type="text/javascript" src="../../js/update/setagea.js"></script>
</body>
</html>