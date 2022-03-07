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
				$query = $user->connect()->prepare("SELECT * FROM empleado WHERE nombres=? and estado=''");
		        $query->execute([$emple]);
		        $resultado=$query->fetchAll();
		        foreach ($resultado as $res) {
		        	$are='<option selected value="'.$res["area"].'">'.$res["area"].'</option> ';
		        	$ag='<option selected value="'.$res["agencia"].'">'.$res["agencia"].'</option> ';
					$pu='<option selected value="'.$res["puesto"].'">'.$res["puesto"].'</option> ';       	
		        	echo json_encode([$are, $ag, $pu, $res["nombres"], $res["usuario"], $res["paswor"]]);
		        }
				break;
			}
		break;
	}


?>