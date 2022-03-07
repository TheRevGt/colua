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
				$nombre = $datos->nombr;
				if($user->pueExists($nombre)){
					echo "Ya existe";
				}else{
					$sql="INSERT INTO puesto(nombre) VALUES(?)";
	        		$stmt=$user->connect()->prepare($sql);
			        if ($stmt->execute([$nombre])) {
			            echo ("Puesto agregado");
			        }else{
			        	echo ("Error");
			        }
			    }
				break;
			}
		break;
		case 'PUT':
			
		break;
		case 'DELETE':
			
		break;
	}


?>