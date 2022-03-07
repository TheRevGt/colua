<!DOCTYPE html>
<html>
<head>
	<title>Actualizar agencia</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="icon" type="image/jpg" href="../../img/ico.png">
	<link href="../../css/dashboard.css" rel="stylesheet">
	<script src="../../js/min.js"></script>
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
	        <li class="nav-item text-nowrap"></span><a class="nav-link" href="../../index.php">Soporte</a>
	        </li>
	      </ul>
	      <ul class="nav px-4">
	        <li class="dropdown">
	            <a class="nav-link dropdown-toggle" id="menunav" role="button" data-toggle="dropdown">
	              Equipos
	            </a>
	            <div class="dropdown-menu" aria-labelledby="menunav">
	              <a class="dropdown-item" href="../registraru/agencia.php">Registro</a>
	              <div class="dropdown-divider"></div>
	              <a class="dropdown-item" href="agencia.php">Actualizar</a>
	              <div class="dropdown-divider"></div>
	              <a class="dropdown-item" href="../consultasu/agencia.php">Consultar</a>
	            </div>
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
	        <ul class="nav flex-column">
	          <li class="nav-item pb-2">
	            <a class="nav-link active" href="agencia.php">
	              <span data-feather="map-pin"></span>
	              Agencia
	            </a>
	          </li>
	          <li class="nav-item pb-2">
	            <a class="nav-link" href="admin.php">
	              <span data-feather="git-merge"></span>
	              Área
	            </a>
	          </li>
	          <li class="nav-item pb-2">
	            <a class="nav-link" href="admin2.php">
	              <span data-feather="git-branch"></span>
	              Puesto
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
	            <a class="nav-link" href="software.php">
	              <span data-feather="code"></span>
	              Software
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
	    <?php include_once '../../includes/user.php'; $user = new User(); ?>
	    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-5 align-items-center"> 
	     	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
	        <h1 class="h2">Actualizar agencias</h1>
	      	</div>
	      	<div class="form w-75">
	      		<div class="form-group row">
			    	<label class="col-sm-2 col-form-label h4">Agencia:</label>
			    	<div class="col-sm-10">
			      		<select class="form-control" id="n_agenc" onclick="envag()">
						<?php
						$user->verage();
						?>
						</select>
			    	</div>
				</div>
	      		<div class="form-group row">
			    	<label class="col-sm-2 col-form-label h4">Numero:</label>
			    	<div class="col-sm-10">
			      		<input type="text" type="text" class="form-control" id="db_nager" placeholder="Numero de agencia *">
			    	</div>
				</div>
				<div class="form-group row">
				    <label class="col-sm-2 col-form-label h4">Nombre:</label>
				    <div class="col-sm-10">
				    	<input type="text" class="form-control" id="db_ager" placeholder="Nombre de agencia">
				    </div>
				</div>
				<div class="form-group row">
				    <label class="col-sm-2 col-form-label h4">Técnico:</label>
				    <div class="col-sm-10">
				    	<select class="form-control" id="tecnic">
				        	<option value="0">Ninguno</option>
				        	<?php
				        	$query = $user->connect()->prepare("SELECT * FROM users WHERE nombre!='Administrador'");
					        $query->execute();
					        $resultado=$query->fetchAll();
					        foreach ($resultado as $res) {
					            echo '<option value="'.$res["id_user"].'">'.$res["nombre"].' </option>';            
					        }?>
				        </select>
				    </div>
				</div>
				<div class="form-group row">
					<div class="sticky-top col-sm-10">
						<input class="btn float-right text-white bg-colua" type="button" value="Actualizar" onclick="upagea()">  
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
    			<h2> Agencias existentes</h2>
    			<?php 
				$query = $user->connect()->prepare("SELECT u.nombre AS user_nombre, a.n_agencia, a.nombre FROM users u, agencia a WHERE u.id_user=a.soport");
		        $query->execute();
		        $resultado=$query->fetchAll();
		        echo "
		        <table class='table table-hover table-sm' id='cons'>
		        <thead class='thead-light'>
		        	<tr>
			        <th>Numero</th>
			        <th>Nombre</th>
			        <th>Tecnico</th>
		        	</tr>
		        <thead>";
		        foreach ($resultado as $res) {
		        	echo 
			        	"<tr>
			        	<td>".$res["n_agencia"]."</td>
			        	<td>".$res["nombre"]."</td>
			        	<td>".$res["user_nombre"]."</td>
			        	</tr>";
		        }
		        echo "</table>";
				?>
			<button onclick="exportTableToExcel('cons', 'Agencias')" class='btn float-right text-white bg-export'>Guardar <span data-feather="file"></button> 
    		</div>
	      </div>
	    </main>
	  </div>
	</div>
	<script src="../../dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../js/feather.min.js"></script>
    <script src="../../js/dashboard.js"></script>
	<script type="text/javascript" src="../../js/axios.js"></script>
	<script type="text/javascript" src="../../js/tabla.js"></script>
	<!-- informaicon-->
	<script type="text/javascript" src="../../js/info/setiag.js"></script>
	<!--updates-->
	<script type="text/javascript" src="../../js/update/setagea.js"></script>
</body>
</html>