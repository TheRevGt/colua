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
				echo $noagencia;
				$query = $user->connect()->prepare("SELECT * FROM puesto WHERE nombre=? LIMIT 0");
		        $query->execute([$noagencia]);
		        $resultado=$query->fetchAll();
		        foreach ($resultado as $res) {
		        	echo $res["nombre"];
		        }
				break;
			}
		break;
	}
?>