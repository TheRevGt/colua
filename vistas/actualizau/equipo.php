<!DOCTYPE html>
<html>
<head>
	<title>Actualizar equipo</title>
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
	            <a class="nav-link active" href="equipo.php">
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
	        <h1 class="h2">Actualizar equipo</h1>
	      	</div>
	      	<div class="form w-75">
	      		<div class="form-group row">
			    	<label class="col-sm-2 col-form-label h4">Empleado:</label>
			    	<div class="col-sm-10">
			      		<select class="form-control" id="n_empleado" onclick="ppoex()">
						<?php 
						$user->veremple();
						?>
					</select>
			    	</div>
				</div>
	      		<div class="form-group row">
			    	<label class="col-sm-2 col-form-label h4">Equipo asignado:</label>
			    	<div class="col-sm-10">
			      		<select class="form-control" id="pcex" onclick="revpc()">
							<option value="">Sin equipo</option>
						</select>
			    	</div>
				</div>
				<div class="form-group row">
			    	<label class="col-sm-2 col-form-label h4">Nuevo empleado:</label>
			    	<div class="col-sm-10">
			      		<select class="form-control" id="nu_empleado">
							<?php  
							$user->veremple();
							?>
							<option selected value="none">Seleccionar</option>
						</select>
			    	</div>
				</div>
				<div class="form-group row">
			    	<label class="col-sm-2 col-form-label h4">Tipo de equipo:</label>
			    	<div class="col-sm-10">
			    		<select class="form-control" id="db_etipo">
							<optgroup id="eqiac" label="Tipo actual">
							</optgroup>
							<optgroup label="Tipo nuevo">
								<option value="Escritorio">Escritorio</option>
								<option value="Laptop">Laptop</option>	
							</optgroup>
						</select>
			    	</div>
				</div>
				<div class="form-group row">
				    <label class="col-sm-2 col-form-label h4">Activo:</label>
				    <div class="col-sm-10">
				    	<input type="text" class="form-control" id="db_eactivo" placeholder="Código activo *">
				    </div>
				</div>
				<div class="form-group row">
				    <label class="col-sm-2 col-form-label h4">SO:</label>
				    <div class="col-sm-10">
				    	<input type="text" class="form-control" id="db_so" placeholder="Sistema Operativo *">
				    </div>
				</div>
				<div class="form-group row">
				    <label class="col-sm-2 col-form-label h4">Edición:</label>
				    <div class="col-sm-10">
				    	<input type="text" class="form-control" id="db_edicion" placeholder="Edición de SO *">
				    </div>
				</div>
				<div class="form-group row">
				    <label class="col-sm-2 col-form-label h4">Licencia:</label>
				    <div class="col-sm-10">
				    	<input type="text" class="form-control" id="db_licencia" placeholder="Licencia de SO">
				    </div>
				</div>
				<div class="form-group row">
				    <label class="col-sm-2 col-form-label h4">Marca:</label>
				    <div class="col-sm-10">
				    	<input type="text" class="form-control" id="db_emarca" placeholder="Marca *">
				    </div>
				</div>
				<div class="form-group row">
				    <label class="col-sm-2 col-form-label h4">Modelo:</label>
				    <div class="col-sm-10">
				    	<input type="text" class="form-control" id="db_emodelo" placeholder="Modelo">
				    </div>
				</div>
				<div class="form-group row">
				    <label class="col-sm-2 col-form-label h4">Serie:</label>
				    <div class="col-sm-10">
				    	<input type="text" class="form-control" id="db_eserie" placeholder="Numero de serie">
				    </div>
				</div>
				<div class="form-group row">
				    <label class="col-sm-2 col-form-label h4">IP:</label>
				    <div class="col-sm-10">
				    	<input type="text" class="form-control" id="db_eip" placeholder="Dirección de IP *">
				    </div>
				</div>
				<div class="form-group row">
				    <label class="col-sm-2 col-form-label h4">MAC:</label>
				    <div class="col-sm-10">
				    	<input type="text" class="form-control" id="db_epmac" placeholder="MAC del eqipo">
				    </div>
				</div>
				<div class="form-group row">
				    <label class="col-sm-2 col-form-label h4">Fecha de compra:</label>
				    <div class="col-sm-10">
				    	<input type="date" class="form-control" id="db_edate">
				    </div>
				</div>
				<div class="form-group row">
			    	<label class="col-sm-2 col-form-label h4">Estado de equipo:</label>
			    	<div class="col-sm-10">
			      		<select class="form-control" id="estadop">
							<optgroup id="estaan" label="Estado actual">
							</optgroup>
							<optgroup label="Nuevo estado">
								<option value="Excelente">Excelente</option>
								<option value="Bueno">Bueno</option>
								<option value="Deficiente">Deficiente</option>	
							</optgroup>
						</select>
			    	</div>
				</div>
				<div class="form-group row">
			    	<label class="col-sm-2 col-form-label h4">Desabilitar equipo:</label>
			    	<div class="col-sm-10">
			      		<input type="checkbox" class="form-check-input" id="estepc" value="Inactivo">
			    	</div>
				</div>
				<div class="form-group row">
					<div class="sticky-top col-sm-10">
						<input class="btn float-right text-white bg-colua" type="button" value="Actualizar" onclick="uppc()">  
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
    			<h2> Equipo existentes</h2>
    			<?php 
				$query = $user->connect()->prepare("SELECT * FROM pc WHERE estatus=''");
		        $query->execute();
		        $resultado=$query->fetchAll();
		        echo "
		        <table class='table table-hover table-sm' id='cons'>
		        <thead class='thead-light'>
		        	<tr>
			        <th>Activo</th>
		        	<th>Empleado</th>
		        	<th>Tipo</th>
		        	<th>Marca</th>
		        	<th>Serie</th>
		        	<th>Direccion IP</th>
		        	<th>Estado</th>
		        	</tr>
		        <thead>";
		        foreach ($resultado as $res) {
		        	echo 
			        	'<tr>
			        	<td>'.$res["no_activo"].'</td>
		                <td>'.$res["empleado"].'</td>
		                <td>'.$res["tipo"].'</td>
		                <td>'.$res["marca"].'</td>
		                <td>'.$res["serie"].'</td>
		                <td>'.$res["ip"].'</td>
		                <td>'.$res["estado"].'</td>
			        	</tr>';
		        }
		        echo "</table>";
				?>
			<button onclick="exportTableToExcel('cons', 'Equipos')" class='btn float-right text-white bg-export'>Guardar <span data-feather="file"></button> 
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
	<script type="text/javascript" src="../../js/info/setiequi.js"></script>
	<script type="text/javascript" src="../../js/update/setequipo.js"></script>
</body>
</html>