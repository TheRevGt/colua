<!DOCTYPE html>
<html>
<head>
	<title>Soporte</title>
	<link rel="stylesheet" href="../../css/main.css"/>
	<link rel="icon" type="image/jpg" href="../../img/ico.png">
	<script src="../../js/min.js"></script>
</head>
<body>
	<div id="container">
    <nav>
        <ul>
        <li> Usuario: <?php include_once '../../includes/user.php';
				$user = new User(); $user->getNombre(); ?></li>
		<li><a href="index.php">Soporte</a></li>
	    <li><a href="vistas/registro/agencia.php">Equipos<i class="down"></i></a>
            <ul>
                <li><a href="../registrar/agencia.php">Registrar</a></li>
                <li><a href="../actualiza/agencia.php">Actualizar</a></li>
                <li><a href="../consultas/agencia.php">Consultar</a></li>
            </ul>       
        </li>
	    <li><a href="../includes/logout.php">Cerrar sesión</a></li>
	  	</ul>
	</nav>

	<!-- contenido de la pagina-->
	<div class="">
		<div class="menu">
			<br>
			<br>
			<br>
			<button><a href="index.php">Tickets </a></button>
			<button><a href="todous.php">Resueltos</a></button>
		</div>
		<div class="main">
		
	    <section>
	    	<h2>Tickets</h2>
	    		<section style="width: 100%; padding-left: 260px;" onClick="reply_click()">
					<?php 
						$query = $user->connect()->prepare("SELECT * FROM soporte WHERE tecnico=? AND estado='Activo'");
				        $query->execute([$user->getNombre()]);
				        $resultado=$query->fetchAll();
				        echo "<br>";
				        foreach ($resultado as $res) {
				        	echo 
				        	"<br><div class='ef'> <br>
				        	Id: <p>".$res["id"]." </p><br>
				        	Empleado: ".$res["empleado"]."<br>
				        	Fecha: ".$res["fecha_activo"]."<br> 
				        	Problema: ".$res["problema"]."<br>
				        	<br><button id='".$res["id"]."'>Ver</button>
				        	<div>";
				        }
					?>
			    </section>
	    </section>
		</div>
</body>
</html>