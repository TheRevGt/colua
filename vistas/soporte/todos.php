<!DOCTYPE html>
<html>
<head>
	<title>Soporte</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="icon" type="image/jpg" href="../../img/ico.png">
	<link href="../../css/dashboard.css" rel="stylesheet">
	<script src="../../js/min.js"></script>
</head>
<body>
	<!-- Nav-->
	<nav class="nav sticky-top flex-md-nowrap p-0 shadow bg-light align-items-center">
	    <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">Soporte</a>
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
	        <ul class="nav flex-column">
	          <li class="nav-item pb-2">
	            <a class="nav-link active" href="todos.php">
	              <span data-feather="list"></span>
	              Todos
	            </a>
	          </li>
	          <li class="nav-item pb-2">
	            <a class="nav-link" href="usuario.php">
	              <span data-feather="users"></span>
	              Usuario
	            </a>
	          </li>
	          <li class="nav-item pb-2">
	            <a class="nav-link" href="estados.php">
	              <span data-feather="star"></span>
	              Estado
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
	        <h1 class="h2">Todos los tikets</h1>
	      	</div>
			<div class="table-responsive-sm">
				<?php
				$user->todosoporte(); 
				?>
			</div>
	    </main>
	  </div>
	</div>
	<script src="../../dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../js/feather.min.js"></script>
    <script src="../../js/dashboard.js"></script>
	<script type="text/javascript" src="../../js/axios.js"></script>

</body>
</html>