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
        <li><?php  include_once '../../includes/user.php';
				$user = new User(); echo $user->getNombre(); ?></li>
		<li><a href="../soporte/todos.php">Soporte</a></li>
	    <li><a href="../registrar/agencia.php">Equipos<i class="down"></i></a>
            <ul>
                <li><a href="../registrar/agencia.php">Registrar</a></li>
                <li><a href="../actualiza/agencia.php">Actualizar</a></li>
                <li><a href="../consultas/agencia.php">Consultar</a></li>
            </ul>       
        </li>
	    <li><a href="../registro.php">Usuario</a></li>
	    <li><a href="../../includes/logout.php">Serrar sesión</a></li>
	  	</ul>
	</nav>

	<!-- contenido de la pagina-->
	<div class="">
		<div class="menu">
			<br>
			<br>
			<br>
			<br>
			<li><a href="todos.php"><img src="../../img/todo.png" class="ico"> Todos </a> </li>
			<li><a href="usuario.php"><img src="../../img/user.png" class="ico"> Usuario </a> </li>
			<li><a href="estados.php"><img src="../../img/estado.png" class="ico"> Estado </a></li>
		</div>
		
		<div class="padre">
			<div class="hijo">
				<br>
				<br>
				<br>
				<?php  include_once '../../includes/user.php';
				$user = new User(); echo $user->todosoporte(); ?>
			</div>
		</div>
		
	</div>
	<script type="text/javascript" src="../../js/axios.js"></script>

</body>
</html>