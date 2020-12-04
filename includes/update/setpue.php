<?php
include_once '../user.php';
$user= new User();
    $metodo = $_SERVER["REQUEST_METHOD"];
	$ruta = implode("/", array_slice(explode("/", $_SERVER["REQUEST_URI"]), 3));
	$datos = json_decode(file_get_contents("php://input"));
	switch($metodo){
		case 'POST':
			switch ($ruta) {
				default:
				$id = $datos->id;
				$nombre = $datos->nombre;
				$sql =("UPDATE puesto SET nombre=? where nombre=?");
		        $stmt=$user->connect()->prepare($sql);
				if ($stmt->execute([$nombre,$id])) {
					#echo "puesto actualizada";
						$sql2 =("UPDATE empleado SET puesto=? where puesto=?");
				        $stmt2=$user->connect()->prepare($sql2);
						if ($stmt2->execute([$nombre,$id])) {
							#echo "puesto actualizada";
							echo "Datos actualizdo";
						}else{
							echo "Error";
						}
				}else{
					echo "Error";
				}
				break;
			}
		break;
	}


?>