<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registrar usuario</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="../dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="icon" type="image/jpg" href="../img/ico.png">
	<link href="../css/dashboard.css" rel="stylesheet">
	<script src="../js/min.js"></script>
</head>
<body>
	<!-- Nav-->
	<nav class="nav sticky-top flex-md-nowrap p-0 shadow bg-light align-items-center">
	    <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">Resgistro</a>
	    <div class="float-right" style="float: right;">
	    <button class="navbar-toggler  d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
	    <span data-feather="menu"></span>
	    </button>	
	    </div>
	    
	      <div class="nav">
	      <ul class="nav px-4">
	        <li class="nav-item text-nowrap"></span><a class="nav-link" href="soporte/todos.php">Soporte</a>
	        </li>
	      </ul>
	      <ul class="nav px-4">
	        <li class="dropdown">
	            <a class="nav-link dropdown-toggle" id="menunav" role="button" data-toggle="dropdown">
	              Equipos
	            </a>
	            <div class="dropdown-menu" aria-labelledby="menunav">
	              <a class="dropdown-item" href="registrar/agencia.php">Registro</a>
	              <div class="dropdown-divider"></div>
	              <a class="dropdown-item" href="actualiza/agencia.php">Actualizar</a>
	              <div class="dropdown-divider"></div>
	              <a class="dropdown-item" href="consultas/agencia.php">Consultar</a>
	            </div>
	          </li>
	      </ul><ul class="nav px-4">
	        <li class="dropdown">
	            <a class="nav-link dropdown-toggle" id="menunav" role="button" data-toggle="dropdown">
	              Usuario
	            </a>
	            <div class="dropdown-menu" aria-labelledby="menunav">
	              <a class="dropdown-item" href="actualizar.php">Actualizar</a>
	            </div>
	          </li>
	      </ul>
	      <ul class="nav px-3">
	        <li class="nav-item text-nowrap">
	          <a class="nav-link" href="../includes/logout.php">Cerrar sesión</a>
	        </li>
	      </ul>
	    </div>
	  </nav>
	    <?php include_once '../includes/user.php'; $user = new User(); ?>
	    <main role="main" class="col-md-10 ml-sm-auto px-md-5 align-items-center"> 
	     	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
	        <h1 class="h2">Registrar usuario del sistema</h1>
	      	</div>
	      	<form class="form w-75" method="POST">
	      		<div class="form-group row">
			    	<label class="col-sm-3 col-form-label h4">Usuario:</label>
			    	<div class="col-sm-9">
			      		<input type="text" type="text" class="form-control" name="reg_user" placeholder="Usuario *" required="true">
			    	</div>
				</div>
				<div class="form-group row">
			    	<label class="col-sm-3 col-form-label h4">Nombre:</label>
			    	<div class="col-sm-9">
			      		<input type="text" type="text" class="form-control" name="reg_nom" placeholder="Nombre *" required="true">
			    	</div>
				</div>
				<div class="form-group row">
			    	<label class="col-sm-3 col-form-label h4">Contraseña:</label>
			    	<div class="col-sm-9">
			      		<input type="text" type="text" class="form-control" name="reg_pas" placeholder="Contraseña *" required="true">
			    	</div>
				</div>
				<div class="form-group row">
			    	<label class="col-sm-3 col-form-label h4">Confirmar contraseña:</label>
			    	<div class="col-sm-9">
			      		<input type="text" type="text" class="form-control" name="reg_conf" placeholder="Confirmar contraseña *" required="true">
			    	</div>
				</div>
				<div class="form-group row">
			    	<label class="col-sm-3 col-form-label h4">Correo:</label>
			    	<div class="col-sm-9">
			      		<input type="text" type="text" class="form-control" name="email" placeholder="Correo *" required="true">
			    	</div>
				</div>
				<div class="form-group row">
					<div class="sticky-top col-sm-10">
						<input class="btn float-right text-white bg-colua" type="submit" value="Registrar">  
					</div>
				</div>
			</form>
			<?php
				if(isset($_POST['reg_user'])&isset($_POST['reg_pas'])){
				    if($user->useExists($_POST['reg_user'])){
				        echo "<script>alert('El usuario ya existe')</script>";
				    }else{
				    	if($_POST['reg_pas']==$_POST['reg_conf']){
				    		echo "<script> alert('Usuario agregado') </script>";
				    		$user->inse_use();
				    	}else{
				    		echo "<script> alert('La contraseña no coinciden')</script>";
				    	}
				    }
				}
			?>
			<div class="container col-sm-12">
    		<div class="btncons">
    			<button class="mas" onclick="verotroc()" id="uno"><span data-feather="chevron-down"></span></button>
    			<button class="mas" onclick=" oculotroc()" id="dos"><span data-feather="chevron-up"></span></button>
    		</div>
    		</div>
    		<div class="consular col-sm-12">
    			<section id="consular">    		
    			<h2> Usuarios existentes</h2>
    			<?php 
				$query = $user->connect()->prepare("SELECT * FROM users");
		        $query->execute();
		        $resultado=$query->fetchAll();
		        echo "
		        <table class='table table-hover table-sm' id='cons'>
		        <thead class='thead-light'>
		        	<tr>
			        <th>Usuario</th>
			        <th>Nombre</th>
			        <th>Correo</th>
			        <th>Contraseña</th>
		        	</tr>
		        <thead>";
		        foreach ($resultado as $res) {
		        	echo 
			        	"<tr>
			        	<td>".$res["n_user"]."</td>
			        	<td>".$res["nombre"]."</td>
			        	<td>".$res["correo"]."</td>
			        	<td>".$res["pass"]."</td>
			        	</tr>";
		        }
		        echo "</table>";
				?>
			<button onclick="exportTableToExcel('cons', 'Usuarios')" class='btn float-right text-white bg-export'>Guardar <span data-feather="file"></button> 
    		</div>
	      </div>
	    </main>
	  </div>
	</div>
	<script src="../dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/feather.min.js"></script>
    <script src="../js/dashboard.js"></script>
	<script type="text/javascript" src="../js/axios.js"></script>
	<script type="text/javascript" src="../js/info/setuser.js"></script>
	<script type="text/javascript" src="../js/tabla.js"></script>
	<script type="text/javascript">
    if (window.history.replaceState) { // verificamos disponibilidad
    window.history.replaceState(null, null, window.location.href);
    }
  </script>
</body>
</html>