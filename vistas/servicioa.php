<!DOCTYPE html>
<html>
<head>
	<title>Servicios</title>
	<link rel="stylesheet" href="css/main.css" />
	<link rel="icon" type="image/jpg" href="img\ico.png">
	<script src="js/min.js"></script>
</head>
<body>
	<div id="container">
    <nav>
        <ul>
		<li><a href="vistas/soporte/todos.php">Soporte</a></li>
	    <li><a href="vistas/registrar/agencia.php">Equipos<i class="down"></i></a>
            <ul>
                <li><a href="vistas/registrar/agencia.php">Registrar</a></li>
                <li><a href="vistas/actualiza/agencia.php">Actualizar</a></li>
                <li><a href="vistas/consultas/agencia.php">Consultar</a></li>
            </ul>       
        </li>
	    <li><a href="vistas/registro.php">Usuario</a></li>
	    <li><a href="includes/logout.php">Cerrar sesión</a></li>
	  	</ul>
	</nav>
	<div class="main">
	<div id='welcome-slide'>
   		<img src='img/gradics.jpg' style="width: 100%; height: 100%; z-index: 2; mix-blend-mode: lighten;margin: 0px; padding: 0px;">
   		<div id='claim'>
      	<h1>Bienvenido</h1>
      	<h2><?php echo $user->getNombre(); ?></h2>
   </div>
</div>
	</div>
	<script type="text/javascript" src="js/axios.js"></script>
</body>
</html>