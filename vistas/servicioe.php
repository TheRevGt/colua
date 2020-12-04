<!DOCTYPE html>
<html>
<head>
	<title>Servicios</title>
	<link rel="stylesheet" href="../css/main.css" />
	<script src="js/min.js"></script>
</head>
<body>
	<div id="container">
    <nav>
        <ul>
        <li> Usuario: <?php include_once '../includes/user.php';
				$user = new User(); echo $user->getNombre(); ?></li>
		<li><a href="vistas/soporte/activos.php">Soporte</a></li>
	    <li><a href="index.php">Equipos<i class="down"></i></a>
            <ul>
                <li><a href="vistas/registrar/agencia.php">Registrar</a></li>
                <li><a href="vistas/actualiza/agencia.php">Actualizar</a></li>
                <li><a href="vistas/consultas/agencia.php">Consultar</a></li>
            </ul>       
        </li>
	    <li><a href="includes/logout.php">Cerrar sesión</a></li>
	  	</ul>
	</nav>
	<!-- contenido de la pagina-->
	<div class="main">
		
	</div>
</body>
</html>