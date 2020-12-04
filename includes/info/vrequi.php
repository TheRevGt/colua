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
				$emple = $datos->empleado;
				$query = $user->connect()->prepare("SELECT * FROM pc WHERE no_activo=?");
		        $query->execute([$emple]);
		        $resultado=$query->fetchAll();
		        foreach ($resultado as $res) {
		        	$tipo='<option selected value="'.$res["tipo"].'">'.$res["tipo"].'</option> ';
		        	$estado='<option selected value="'.$res["estado"].'">'.$res["estado"].'</option> ';
		        	echo json_encode([$tipo, $res["no_activo"], $res["so"], $res["edicion"], $res["licencia"], $res["marca"], $res["modelo"], $res["serie"], $res["ip"], $res["mack_pc"], $res["fecha_entrada"], $estado]);
		        }
				break;
			}
		break;
	}


?>