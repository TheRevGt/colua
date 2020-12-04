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
				$noagencia = $datos->noagencia;
				$query = $user->connect()->prepare("SELECT * FROM agencia WHERE n_agencia=?");
		        $query->execute([$noagencia]);
		        $resultado=$query->fetchAll();
		        foreach ($resultado as $res) {
		        	echo json_encode([$res["nombre"], $res["n_agencia"]]);
		        }
				break;
			}
		break;
	}
?>