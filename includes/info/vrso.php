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
				$pc = $datos->pc;
				$query = $user->connect()->prepare("SELECT * FROM software WHERE nombre=? and pc=? LIMIT 1");
		        $query->execute([$noagencia,$pc]);
		        $resultado=$query->fetchAll();
		        foreach ($resultado as $res) {
		        	echo json_encode([$res["nombre"], $res["edicion"]]);
		        }
				break;
			}
		break;
	}
?>