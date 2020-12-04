<!DOCTYPE html>
<html>
<head>
	<title>Actualizar empleado</title>
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
		
   <section id="da" style="padding-left: 220px">
		<div class="docs">		
			<div class="estilo">
			<h2>Nombre de empleado</h2><br>
			
			<select id="n_empleado" onclick="envem()">
				<option value="">Seleccionar empleado</option>
				<?php include_once 'includes/user.php';
				$user = new User(); 
				$user->veremple();
				?>
			</select> <br><br>
				<b>Área: </b>
				<select id="ops">
					<optgroup label="Area atual" id="aan"> 
					</optgroup>
					<optgroup label="Area nueva">
						<option value="Jefe de agencia">Jefe de agencia</option>
						<option value="Cajero general">Cajero general</option>
						<option value="Receptor Pagador">Receptor Pagador</option>
						<option value="Secretaría">Secretaría</option>
						<option value="Ejecutivo">Ejecutivo</option>
						<option value="Asesor de crédito">Asesor de crédito</option>
						<option value="Oficial de crédito">Oficial de crédito</option>
						<option value="Agentes">Agentes</option>
					</optgroup>
				</select></br>
				<b>Agencia: </b>
				<select id="n_agenci">
					<optgroup label="Agencia actual" id="agan">
						
					</optgroup>
					<optgroup label="Nueva agencia">
						<?php include_once 'includes/user.php';
						$user = new User(); 
						$user->verage();
						?>
					</optgroup>
				</select>
				<input type="text" id="pu" placeholder="Puesto *"><br>
				<input type="text" id="db_nom" placeholder="Nombre *"><br>				
				<input type="text" id="db_user" placeholder="Usuario *"><br>
				<input type="text" id="db_pas" placeholder="Contraseña *"><br>
				<input type="checkbox" id="estemple" value="Inactivo">
				<label for="inactivo">Desabilitar</label>				
			</div>
			<input type="button" value="Enviar" onclick="upemple()">
		</div>
		</section>
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
	<script type="text/javascript" src="../../js/tabla.js"></script>
	<!-- informaicon-->
	<script type="text/javascript" src="../../js/info/setiem.js"></script>
	<!--updates-->
	<script type="text/javascript" src="../../js/update/setemple.js"></script>
</body>
</html>