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
				$query = $user->connect()->prepare("SELECT * FROM soporte WHERE id=?");
		        $query->execute([$id]);
		        $resultado=$query->fetchAll();
		        foreach ($resultado as $res) {
		        	echo json_encode([$res["empleado"], $res["agencia"], $res["puesto"],$res["ip"],$res["fecha_activo"],$res["problema"],$res["id"]]);
		        }
				break;
			}
		break;
	}
?>