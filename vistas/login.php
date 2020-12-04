<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="icon" type="image/jpg" href="img\ico.png">
	<link rel="stylesheet" href="css/main.css" />
</head>
<body>
			<?php
            if(isset($errorLogin)){
                echo $errorLogin;
            }
        	?>
    <div id="container">
    <nav>
        <ul>
		<li><a href="index.php"><img src="img/logo.png" width="120" height="40"></a></li>
	  	</ul>
	</nav>
        <section id="log">
        	<br><br>
        	<br>
        	<div id='welcome-slide'>		    	
   				<img src='img/gradics.jpg' style="width: 100%; height: 100%; z-index: 2; mix-blend-mode: lighten;margin: 0px; padding: 0px;">
   				<div id='claim'>
      				<h1>Bienvenido</h1>
      			<form method="POST" >
					<h2> Ingresar datos </h2>
						<input type="text" name="username" placeholder="Usuario" required="true"></br>
						<input type="password" name="password" placeholder="Contraseña" required="true"></br>
						</br>
					<button type="submit" class="send">Enviar</button></br>	
				</form>
   			</div>
				
		</section>
</body>
</html>