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
					$nombre = $datos->nombre;
					$edicion = $datos->edicion;
					$emple = $datos->empleado;
					$idp= $datos->activop;
					$sql="INSERT INTO software(nombre,edicion,empleado,pc) VALUES(?,?,?,?)";
	        			$stmt=$user->connect()->prepare($sql);
		            if ($stmt->execute([$nombre,$edicion,$emple,$idp])) {
		                echo "Softeares agregados";
		            }else{
		                echo "Error";
		            }
				break;

			}
		break;
	}
?>