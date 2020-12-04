<!DOCTYPE html>
<html>
<head>
	<title>Actualizar</title>
	<link rel="stylesheet" href="../../css/main.css" />
	<link rel="icon" type="image/jpg" href="../../img/ico.png">
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
	<div class="main" style="padding-left: 220px;">
	
	<section id="equ">
			<div class="docs">
				<div class="estilo">
				<h2>Datos del equipo</h2>
				<b>Empleado</b><br>
				<select id="n_empleado" onclick="ppoex()">
					<option selected value="Nuevo">Equipo nuevo</option>
					<?php include_once '../../includes/user.php';
					$user = new User(); 
					$user->veremple();
					?>					
				</select><br>

				<b>Equipo</b><br>
				 <select id="pcex" onclick="opoex()">
					<option value="">Seleccionar un equipo</option>
					
				</select><br><br>
					Software:
					<form method="POST">
						<select id="software" onclick="envso()" name="idsof" required="">
							<option value="">Seleccionar software</option>
						</select><br>
					<input type="submit" name="delsoft" value="Eliminar" style="width: 20px">
					</form>
			<div class="estilo">
					
					<br><h2>Datos del software </br></h2>
					
					<input type="text" placeholder="Software *" id="nombre">
					<input type="text" placeholder="Edición" id="edicion">
					<input type="button" value="Agregar" onclick="savesof()" style="width: 100px" >
					
					<?php 
					if(isset($_POST['delsoft'])){
						if (isset($_POST['idsof'])) {
							$sql="DELETE FROM software WHERE nombre=? LIMIT 1";
							$stmt=$user->connect()->prepare($sql);
	                		if ($stmt->execute([$_POST["idsof"]])) {
			                		echo'<script type="text/javascript">
									alert("Software eliminado");
									window.location.href="Software.php";
									</script>';
							    }else{
							        echo "Error";
							}
							
						}
					}

					?>
			</div>
					
					<input type="button" value="Actualizar" onclick="upsof()" style="width: 100px">
			</div>
	</section>	
    <br>
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
    			$query = $user->connect()->prepare("SELECT * FROM software" );
		        $query->execute();
		        $resultado=$query->fetchAll();
		        echo "<table id='cons'>
		        	<th>Empleado</th>
		        	<th>Software</th>
		        	<th>Equipo</th>	";
		        foreach ($resultado as $res) {
		            echo ('<tbody>
		                <td>'.$res["empleado"].'</td>
		                <td>'.$res["nombre"].'</td>
		                <td>'.$res["pc"].'</td>
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
	<script type="text/javascript" src="../../js/info/setiexisp.js"></script>
	<script type="text/javascript" src="../../js/info/setiexiso.js"></script>
	<script type="text/javascript" src="../../js/info/setiso.js"></script>
	<script type="text/javascript" src="../../js/update/setsof.js"></script>
	<script type="text/javascript" src="../../js/setdata/insso.js"></script>
</body>
</html>