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
				$emple = $datos->dispositivo;
				$query = $user->connect()->prepare("SELECT * FROM red WHERE no_activo=?");
		        $query->execute([$emple]);
		        $resultado=$query->fetchAll();
		        foreach ($resultado as $res) {
		        	$tipo='<option selected value="'.$res["agencia"].'">'.$res["agencia"].'</option>';
		        	$estado='<option selected value="'.$res["estado"].'">'.$res["estado"].'</option>';
		        	echo json_encode([$tipo,$res["no_activo"],$res["nombre"],$res["marca"],$res["modelo"],$res["serie"],$res["no_ip"],$res["fecha_entrada"],$estado]);
		        }
				break;
			}
		break;
	}


?>