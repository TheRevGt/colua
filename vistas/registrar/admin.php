<!DOCTYPE html>
<html>
<head>
	<title>Registrar administración</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="icon" type="image/jpg" href="../../img/ico.png">
	<link href="../../css/dashboard.css" rel="stylesheet">
	<script src="../../js/min.js"></script>
</head>
<body>
	<div id="container">
    <nav class="nav sticky-top flex-md-nowrap p-0 shadow bg-light align-items-center">
	    <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">Resgistro</a>
	    <div class="float-right" style="float: right;">
	    <button class="navbar-toggler  d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
	    <span data-feather="menu"></span>
	    </button>	
	    </div>
	    
	      <div class="nav">
	      <ul class="nav px-4">
	        <li class="nav-item text-nowrap"></span><a class="nav-link" href="../soporte/todos.php">Soporte</a>
	        </li>
	      </ul>
	      <ul class="nav px-4">
	        <li class="dropdown">
	            <a class="nav-link dropdown-toggle" id="menunav" role="button" data-toggle="dropdown">
	              Equipos
	            </a>
	            <div class="dropdown-menu" aria-labelledby="menunav">
	              <a class="dropdown-item" href="agencia.php">Registro</a>
	              <div class="dropdown-divider"></div>
	              <a class="dropdown-item" href="../actualiza/agencia.php">Actualizar</a>
	              <div class="dropdown-divider"></div>
	              <a class="dropdown-item" href="../consultas/agencia.php">Consultar</a>
	            </div>
	          </li>
	      </ul>
	      <ul class="nav px-4">
	        <li class="nav-item text-nowrap">
	          <a class="nav-link" href="../registro.php">Usuarios</a>
	        </li>
	      </ul>
	      <ul class="nav px-3">
	        <li class="nav-item text-nowrap">
	          <a class="nav-link" href="../../includes/logout.php">Cerrar sesión</a>
	        </li>
	      </ul>
	    </div>
	  </nav>
	<div class="container-fluid">
	  <div class="row">
	    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
	      <div class="sidebar-sticky pt-5">
		  <p class='h4'>Registro</p>
	        <ul class="nav flex-column">
	          <li class="nav-item pb-2">
	            <a class="nav-link" href="agencia.php">
	              <span data-feather="map-pin"></span>
	              Agencia
	            </a>
	          </li>
	          <li class="nav-item pb-2">
	            <a class="nav-link active" href="admin.php">
	              <span data-feather="git-merge"></span>
	              Administrativo
	            </a>
	          </li>
	          <li class="nav-item pb-2">
	            <a class="nav-link" href="empleado.php">
	              <span data-feather="users"></span>
	              Empleado
	            </a>
	          </li>
	          <li class="nav-item pb-2">
	            <a class="nav-link" href="equipo.php">
	              <span data-feather="monitor"></span>
	              Equipos
	            </a>
	          </li>
	          <li class="nav-item pb-2">
	            <a class="nav-link" href="dispositivo.php">
	              <span data-feather="hard-drive"></span>
	              Dispositivos
	            </a>
	          </li>
	          <li class="nav-item pb-2">
	            <a class="nav-link" href="red.php">
	              <span data-feather="server"></span>
	              Redes
	            </a>
	          </li>
	        </ul>
	      </div>
	      <footer class="pt-1 my-md-5 pt-md-5 fixed-bottom">
		    <div>
		      <div class="col-12 col-md">
		        <img class="mb-2" src="../../img/logo.png" width="150">
		        <small class="d-block mb-3 text-muted">&copy; 2020</small>
		      </div>
		    </div>
		  </footer>
	    </nav>
	<!-- contenido de la pagina-->
	<?php include_once '../../includes/user.php'; $user = new User(); ?>
	<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-5 align-items-center"> 
	     	<div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
	        <h1 class="h2">Datos administrativos</h1>
	      	</div>
	      	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
	    	<!--área-->
	        <h2 class="h3">Datos del área</h2>
	      	</div>
	      	<div class="form w-75">
	      		<div class="form-group row">
			    	<label class="col-sm-2 col-form-label h4">Área:</label>
			    	<div class="col-sm-10">
			      		<input type="text" type="text" class="form-control" id="db_nombre" placeholder="Nombre del área *">
			    	</div>
				</div>
				<div class="form-group row">
					<div class="sticky-top col-sm-10">
						<input class="btn float-right text-white bg-colua" type="button" value="Registrar" onclick="saveare()">  
					</div>
				</div>
			</div>
			<div class="container col-sm-12">
    		<div class="btncons">
    			<button class="mas" onclick="verotroc()" id="uno"><span data-feather="chevron-down"></span></button>
    			<button class="mas" onclick=" oculotroc()" id="dos"><span data-feather="chevron-up"></span></button>
    		</div>
    		</div>
    		<div class="consular col-sm-12">
    			<section id="consular">    		
    			<h2> Áreas existentes</h2>
    			<?php 
    			$query = $user->connect()->prepare("SELECT * FROM area");
		        $query->execute();
		        $resultado=$query->fetchAll();
		        echo "<table class='table table-hover table-sm' id='cons'>
		        <thead class='thead-light'>
		        	<tr>
			        <th>Nombre</th>
		        	</tr>
		        <thead>";
		        foreach ($resultado as $res) {
		        	echo 
			        	"<tr>
			        	<td>".$res["nombre"]."</td>
			        	</tr>";
		        }
		        echo "</table>"; ?>
				<button onclick="exportTableToExcel('cons', 'Áreas')" class='btn float-right text-white bg-export'>Guardar <span data-feather="file-text"></button> 
				</section>
    		</div>
	      	<h2 class="h3">Datos del puesto</h2>
	      	<div class="form w-75">
	      		<div class="form-group row">
			    	<label class="col-sm-2 col-form-label h4">Puesto:</label>
			    	<div class="col-sm-10">
			      		<input type="text" type="text" class="form-control" id="db_pu" placeholder="Nombre del puesto *">
			    	</div>
				</div>
				<div class="form-group row">
					<div class="sticky-top col-sm-10">
						<input class="btn float-right text-white bg-colua" type="button" value="Registrar" onclick="savepue()">  
					</div>
				</div>
			</div>
			<div class="container col-sm-12">
    		<div class="btncons">
    			<button class="mas" onclick="verotroc2()" id="uno2"><span data-feather="chevron-down"></span></button>
    			<button class="mas" onclick=" oculotroc2()" id="dos2"><span data-feather="chevron-up"></span></button>
    		</div>
    		<div class="consular col-sm-12">
    			<section id="consular2">
    			<div id="c2">
    				<h2> Puestos existentes</h2>
    			<?php
    			$query = $user->connect()->prepare("SELECT * FROM puesto");
		        $query->execute();
		        $resultado=$query->fetchAll();
		        echo "<table class='table table-hover table-sm' id='cons2'>
		        <thead class='thead-light'>
		        	<tr>
			        <th>Nombre</th>
		        	</tr>
		        <thead>";
		        foreach ($resultado as $res) {
		        	echo 
			        	"<tr>
			        	<td>".$res["nombre"]."</td>
			        	</tr>";
		        }
		        echo "</table>"; ?>
    			</div>
			<button onclick="exportTableToExcel('cons2', 'Puestos')" class='btn float-right text-white bg-export'>Guardar <span data-feather="file-text"></button>
    		</div>
	      </div>
	    </main>
	<script src="../../dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../js/feather.min.js"></script>
    <script src="../../js/dashboard.js"></script>
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