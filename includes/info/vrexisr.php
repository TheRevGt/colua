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
				$agen = $datos->agencia;
				$query = $user->connect()->prepare("SELECT * FROM red WHERE agencia=? and estatus=''");
		        $query->execute([$agen]);
		        $resultado=$query->fetchAll();
		        foreach ($resultado as $res) {
		        	echo '<option value="'.$res["no_activo"].'">'.$res["nombre"].' ('.$res["no_activo"].')</option> ';
		        	//$estado='<option value="'.$res["estado"].'">'.$res["estado"].'</option> ';
		        	echo json_encode([$tipo]);
		        }
				break;
			}
		break;
	}
?>