s<?php
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
					$software = $datos->software;
					$nombre = $datos->nombre;
					$edicion = $datos->edicion;
					$sql =("UPDATE software SET nombre=?, edicion=?,  pc=? where pc=? and nombre=?");
			        $stmt=$user->connect()->prepare($sql);
					if ($stmt->execute([$nombre,$edicion,$id,$id,$software])) {
						echo "Software actualizado";
					}else{
						echo "Error";
					}
				break;
			}
		break;
	}
?>