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
				$emple = $datos->user;
				$query = $user->connect()->prepare("SELECT * FROM users WHERE n_user=?");
		        $query->execute([$emple]);
		        $resultado=$query->fetchAll();
		        foreach ($resultado as $res) {
		        	echo json_encode([$res["n_user"], $res["nombre"], $res["pass"], $res["correo"]]);
		        }
				break;
			}
		break;
	}


?>