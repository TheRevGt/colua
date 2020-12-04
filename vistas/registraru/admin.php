<!DOCTYPE html>
<html>
<head>
	<title>Registrar administración</title>
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
		
    <section id="are" style="padding-left: 220px">
    	<div class="docs">
    		<div class="estilo">
    			<h2>Datos administrativos</h2><br>
    			<h2>Datos de area</h2>
    			<input type="text" id="db_nombre" placeholder="Area *"><br>
    		</div>
    		<input type="button" value="Enviar" onclick="saveare()">
    		<br>
    		<br>
    		<div class="btncons">
    			<button class="mas" onclick="verotroc()" id="uno"><img src="../../img/down.png" height="15" width="15"></button>
    			<button class="mas" onclick="oculotroc()" id="dos"><img src="../../img/up.png" height="15" width="15"></button>
    		</div>
    	</div>
    </section>
    	<div class="consular">
    	<section id="consular">
    		<h2> Agencias existentes</h2>
    		<div>
    			<?php 
    			$query = $user->connect()->prepare("SELECT * FROM area");
		        $query->execute();
		        $resultado=$query->fetchAll();
		        echo "<div>
		        <table style='text-align: center;' id='cons'>
		        <th>Nombre</th>
		        ";
		        foreach ($resultado as $res) {
		        	echo 
			        	"<tr>
			        	<td>".$res["nombre"]."</td>
			        	</tr>";
		        }
		        echo "</table> <br></div>"; ?>
    		</div>
			<button onclick="exportTableToExcel('cons', 'Administrativo')" class='xpore'>Exportar</button> 
			<br>
			<br>
    	</div>
    	</section>
    </section>

   	<!--Puesto-->
   	<section id="are" style="padding-left: 220px">
    	<div class="docs">
    		<div class="estilo">
    			<h2>Datos del puesto</h2>
    			<input type="text" id="db_pu" placeholder="Puesto *"><br>
    		</div>
    		<input type="button" value="Enviar" onclick="savepue()">
    		<br>
    		<br>
    		<div class="btncons">
    			<button class="mas" onclick="verotroc2()" id="uno2"><img src="../../img/down.png" height="15" width="15"></button>
    			<button class="mas" onclick=" oculotroc2()" id="dos2"><img src="../../img/up.png" height="15" width="15"></button>
    		</div>
    	</div>
    </section>
    	<div class="consular">
    	<section id="consular2">
    		<br>    		
    		<h2> Puesto existentes</h2>
    		<div id="c2">
    			<?php 
    			$query = $user->connect()->prepare("SELECT * FROM puesto");
		        $query->execute();
		        $resultado=$query->fetchAll();
		        echo "<div>
		        <table style='text-align: center;' id='cons'>
		        <th>Nombre</th>
		        ";
		        foreach ($resultado as $res) {
		        	echo 
			        	"<tr>
			        	<td>".$res["nombre"]."</td>
			        	</tr>";
		        }
		        echo "</table> <br></div>"; ?>
    		</div>
			<button onclick="exportTableToExcel('cons2', 'Administrativo')" class='xpore'>Exportar</button> 
			<br>
			<br>
    	</div>
    	</section>
    </section>
</div>
	<script type="text/javascript" src="../../js/axios.js"></script>
	<script type="text/javascript" src="../../js/tabla.js"></script>
	<script type="text/javascript" src="../../js/setdata/setare.js"></script>
	<script type="text/javascript" src="../../js/setdata/setpue.js"></script>
	<script type="text/javascript">
		datos2=document.getElementById('consular2');
		dos2=document.getElementById('dos2');
		datos2.style.display = 'none';
		dos2.style.display = 'none';
		function verotroc2(){
			datos2=document.getElementById('consular2');
			uno2=document.getElementById('uno2');
			dos2=document.getElementById('dos2');
			datos2.style.display = 'block';
			dos2.style.display = 'block';
			uno2.style.display = 'none';
			}
		function oculotroc2(){
			datos2=document.getElementById('consular2');
			uno2=document.getElementById('uno2');
			dos2=document.getElementById('dos2');
			datos2.style.display = 'none';
			dos2.style.display = 'none';
			uno2.style.display = 'block';
		}
	</script>
</body>
</html>