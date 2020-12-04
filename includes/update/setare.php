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
				$sql =("UPDATE area SET nombre=? where nombre=?");
		        $stmt=$user->connect()->prepare($sql);
				if ($stmt->execute([$nombre,$id])) {
					#echo "Área actualizada";
						$sql2 =("UPDATE empleado SET area=? where area=?");
				        $stmt2=$user->connect()->prepare($sql2);
						if ($stmt2->execute([$nombre,$id])) {
							#echo "Área actualizada";
								$sql3 =("UPDATE puesto SET area=? where area=?");
						        $stmt3=$user->connect()->prepare($sql3);
								if ($stmt3->execute([$nombre,$id])) {
									echo "Área actualizada";
								}else{
									echo "Error";
								}
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