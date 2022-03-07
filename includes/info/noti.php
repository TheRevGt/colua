<?php
include_once '../user.php';
$user = new User();
session_start();
$query = $user->connect()->prepare("SELECT * FROM soporte WHERE tecnico=? AND estado='Activo'");
				        $query->execute([$_SESSION['us']]);
				        $resultado=$query->fetchAll();
				        echo "<div class='ef2' id='ef2'>";
				        foreach ($resultado as $res) {
				        	echo 
				        	'<div class="card">';
				       		$dir="../soporte/docs/".$res["id"]; //ruta de imagenes
				        	if(!file_exists($dir)){
								echo "Sin docs";
							}else{
							$directorio = opendir($dir);
							while ($archivo = readdir($directorio)) {
							if ($archivo=="." || $archivo=="..") { echo " "; } else {
							$archivos[$archivo] = $archivo;
							}
							}
							ksort ($archivos);
							foreach ($archivos as $archivo) {
								$info = new SplFileInfo($archivo);
								$formato=$info->getExtension();
								if ($formato=="jpg" OR $formato=="jpeg" OR $formato=="gif" OR $formato=="png") {
									if (file_exists($dir.'/'.$archivo)) {
									    echo "<img src='$dir/$archivo' height='100' width='100' class='image'>";
									} else {
									}									
								}else{
									if (file_exists($dir.'/'.$archivo)) {
									    echo "<span data-feather='file(filename)'></span><a href='$dir/$archivo'> $archivo </a>";
									} else {
									}
									
								}
							}
						}
						echo "<div class='card-body'>
						    <h5 class='card-title'>ID ticket: ".$res["id"]."</h5>
						    <p class='card-text'><b>Empleado:</b> ".$res["empleado"]."</p>
						    <p class='card-text'><b>Fecha:</b> ".date("d/m/Y H:i:s", strtotime($res["fecha_activo"]))."</p>
						    <p class='card-text'><b>Problema:</b> ".$res["problema"]."</p>
						    <button class='btn btn-primary' id='".$res["id"]."'>Ver</button>
				        	</div>
						  </div><br>
						  <script>
							Push.create('Soprte COLUA RL '+".$res["id"].", {
								body: '".$res["problema"]."',
								icon: 'img/ico.png',
								timeout: 12000,
								onClick: function () {
									window.location = 'index.php'; 
									this.close();
								}
							});
							</script>";
				        }
 ?>