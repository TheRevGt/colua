<!DOCTYPE html>
<html>
<head>
	<title>Actualizar software</title>	
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
	        <li class="nav-item text-nowrap"></span><a class="nav-link" href="../soporte/todos.php">Soporte</a>
	        </li>
	      </ul>
	      <ul class="nav px-4">
	        <li class="dropdown">
	            <a class="nav-link dropdown-toggle" id="menunav" role="button" data-toggle="dropdown">
	              Equipos
	            </a>
	            <div class="dropdown-menu" aria-labelledby="menunav">
	              <a class="dropdown-item" href="../registrar/agencia.php">Registro</a>
	              <div class="dropdown-divider"></div>
	              <a class="dropdown-item" href="agencia.php">Actualizar</a>
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
		  <p class='h4'>Actualizar</p>
	        <ul class="nav flex-column">
	          <li class="nav-item pb-2">
	            <a class="nav-link" href="agencia.php">
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
	            <a class="nav-link " href="empleado.php">
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
	            <a class="nav-link active" href="software.php">
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
	        <h1 class="h2">Datos del equipo</h1>
	      	</div>
	      	<div class="form w-75">
	      		<div class="form-group row">
			    	<label class="col-sm-2 col-form-label h4">Empleado:</label>
			    	<div class="col-sm-10">
			      		<select class="form-control" id="n_empleado" onclick="ppoex()">
							<option selected value="Nuevo">Equipo nuevo</option>
							<?php  
							$user->veremple();
							?>					
						</select>
			    	</div>
				</div>
				<div class="form-group row">
			    	<label class="col-sm-2 col-form-label h4">Equipo:</label>
			    	<div class="col-sm-10">
			    		<form method="POST">
			      		<select class="form-control" id="pcex" onclick="opoex()" name="idpc">
							<option value="">Seleccionar un equipo</option>
						</select>
			    	</div>
				</div>
				<div class="form-group row">
			    	<label class="col-sm-2 col-form-label h4">Software:</label>
			    	<div class="col-sm-10">
			    		
							<select class="col-sm-10" id="software" onclick="envso()" name="idsof" required="">
								<option value="">Seleccionar software</option>
							</select>
						<input type="submit" name="delsoft" value="Eliminar">
						</form>
			    	</div>
				</div>
				<h3 class="h3">Datos del software</h3>
				<div class="form-group row">
				    <label class="col-sm-2 col-form-label h4">Software:</label>
				    <div class="col-sm-10">
				    	<input type="text" class="form-control" id="nombre" placeholder="Nombre *">
				    </div>
				</div>
				<div class="form-group row">
				    <label class="col-sm-2 col-form-label h4">Edición:</label>
				    <div class="col-sm-10">
				    	<input type="text" class="form-control" id="edicion" placeholder="Edición del software *">
				    </div>
				</div>
				<div class="form-group row">
					<div class="sticky-top col-sm-10">
						<input class="btn float-right text-white bg-colua" type="button" value="Actualizar" onclick="upsof()">
				    	<input class="btn float-right text-white bg-colua mx-2" type="button" value="Agregar nuevo" onclick="savesof()">
					</div>
				</div>
				<?php 
					if(isset($_POST['delsoft'])){
						if (isset($_POST['idsof'])) {
							$sql="DELETE FROM software WHERE nombre=? AND pc = ?";
							$stmt=$user->connect()->prepare($sql);
	                		if ($stmt->execute([$_POST["idsof"],$_POST["idpc"]])) {
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
			<div class="container col-sm-12">
    		<div class="btncons">
    			<button class="mas" onclick="verotroc()" id="uno"><span data-feather="chevron-down"></span></button>
    			<button class="mas" onclick=" oculotroc()" id="dos"><span data-feather="chevron-up"></span></button>
    		</div>
    		</div>
    		<div class="consular col-sm-12">
    			<section id="consular">    		
    			<h2> Softwares existentes</h2>
    			<?php 
				$query = $user->connect()->prepare("SELECT s.empleado, s.nombre, s.edicion, s.pc FROM software s, pc p
            	WHERE s.pc=p.no_activo AND p.estatus=''");
		        $query->execute();
		        $resultado=$query->fetchAll();
		        echo "
		        <table class='table table-hover table-sm' id='cons'>
		        <thead class='thead-light'>
		        	<tr>
			        <th>Empleado</th>
		        	<th>Software</th>
		        	<th>Edición</th>
		        	<th>Equipo</th>
		        	</tr>
		        <thead>";
		        foreach ($resultado as $res) {
		        	echo 
			        	'<tr>
			        	<td>'.$res["empleado"].'</td>
		                <td>'.$res["nombre"].'</td>
		                <td>'.$res["edicion"].'</td>
		                <td>'.$res["pc"].'</td>
			        	</tr>';
		        }
		        echo "</table>";
				?>
			<button onclick="exportTableToExcel('cons', 'Software')" class='btn float-right text-white bg-export'>Guardar <span data-feather="file"></button> 
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
	<script type="text/javascript" src="../../js/info/setiexisp.js"></script>
	<script type="text/javascript" src="../../js/info/setiexiso.js"></script>
	<script type="text/javascript" src="../../js/info/setiso.js"></script>
	<script type="text/javascript" src="../../js/update/setsof.js"></script>
	<script type="text/javascript" src="../../js/setdata/insso.js"></script>
</body>
</html>