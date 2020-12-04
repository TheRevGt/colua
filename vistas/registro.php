<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registros</title>
	<link rel="stylesheet" href="../css/main.css" />
	<link rel="icon" type="image/jpg" href="../img\ico.png">
	<script src="../js/min.js"></script>
</head>
<body>
	<div id="container">
    <nav>
        <ul>
        <li><?php  include_once '../includes/user.php';
				$user = new User(); echo $user->getNombre(); ?></li>
		<li><a href="soporte/todos.php">Soporte</a></li>
	    <li><a href="registrar/agencia.php">Equipos<i class="down"></i></a>
            <ul>
                <li><a href="registrar/agencia.php">Registrar</a></li>
                <li><a href="actualiza/agencia.php">Actualizar</a></li>
                <li><a href="consultas/agencia.php">Consultar</a></li>
            </ul>       
        </li>
	    <li><a href="registro.php">Usuario<i class="down"></i></a>
	    	<ul>
	    		<li><a href="javaScript:actuali()">Actualizar</a></li>
	    	</ul>
	    </li>
	    <li><a href="../includes/logout.php">Cerrar sesión</a></li>
	  	</ul>
	</nav>
	<br>
	<br>
	<br>
	<section class="da">
		<div class="docs">
		<form method="POST" id="data">
			<br><h2> Nuevo usuario </h2>
			<input type="text" name="reg_user" placeholder="usuario" required=""><br>
			<input type="text" name="reg_nom" placeholder="Nombre" required=""><br>
			<input type="text" name="reg_pas" placeholder="contraseña" required=""><br>
			<input type="text" name="reg_conf" placeholder="Confirmar contraseña" required=""><br>
			<input type="text" name="email" placeholder="Correo electrónico" required=""><br><br>
			<input type="submit" value="Registrar" class="boton">
			<?php
				include_once '../includes/user.php';
				$user = new User();
				if(isset($_POST['reg_user'])&isset($_POST['reg_pas'])){
				    if($user->useExists($_POST['reg_user'])){
				        echo "<script>alert('El usuario ya existe')</script>";
				    }else{
				    	//validad si la contraseña son iguales
				    	if($_POST['reg_pas']==$_POST['reg_conf']){
				    		echo "<script> alert('usuario agregado') </script>";
				    		$user->inse_use();
				    	}else{
				    		echo "<script> alert('La contraseña no coinciden')</script>";
				    	}
				    }
				}
			?>
		</form>
		<br>
		<div class="btncons">
    		<button class="mas" onclick="verotroc()" id="uno"><img src="../img/down.png" height="15" width="15"></button>
    		<button class="mas" onclick=" oculotroc()" id="dos"><img src="../img/up.png" height="15" width="15"></button>
    	<div class="">
    	<section id="consular">
    		<br>    		
    		<h2> Agencias existentes</h2>
    		<br>
    		<?php 
				$query = $user->connect()->prepare("SELECT * FROM users");
		        $query->execute();
		        $resultado=$query->fetchAll();
		        echo "<div>
		        <table style='text-align: center;' id='cons'>
		        <th>Usuario</th>
		        <th>Nombre</th>
		        <th>Correo</th>
		        <th>Contraseña</th>
		        ";
		        foreach ($resultado as $res) {
		        	echo 
			        	"<tr>
			        	<td>".$res["n_user"]."</td>
			        	<td>".$res["nombre"]."</td>
			        	<td>".$res["correo"]."</td>
			        	<td>".$res["pass"]."</td>
			        	</tr>";
		        }
		        echo "</table></div>";
			?>
			<br>
			<button onclick="exportTableToExcel('cons', 'Agencias')" class='xpore'>Exportar</button> 
			<br>
			<br>
		</section>
		<section id="act">
			<form method="POST">
				<br><h2> Actualizar usuario </h2>
				<br><select id="anuser" onclick="envem()" name="auser">
					<?php
						$user->verus();
					?>
				</select><br>
				<input type="text" name="areg_user" placeholder="usuario" required="" id="1"><br>
				<input type="text" name="areg_nom" placeholder="Nombre" required="" id="2"><br>
				<input type="text" name="areg_pas" placeholder="contraseña" required="" id="3"><br>
				<input type="text" name="aemail" placeholder="Correo electrónico" required="" id="4"><br><br>
				<input type="submit" value="Actualizar" class="boton">
				<?php
					if(isset($_POST['areg_user'])&isset($_POST['auser'])){
						$user->auser();
					}
				?>
			</form>
		</section>
    	</div>
		</div>
    		</div>
	</section>
</div>
</section>
</div>
	<script type="text/javascript" src="../js/axios.js"></script>
	<script type="text/javascript" src="../js/info/setuser.js"></script>
	<script type="text/javascript" src="../js/tabla.js"></script>
	<script type="text/javascript">
		document.getElementById('act').style.display = 'none';
		function actuali(){
			document.getElementById('act').style.display = 'block';
			document.getElementById('data').style.display = 'none';
		}
	</script>
</body>
</html>