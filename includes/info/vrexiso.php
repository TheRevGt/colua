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
				$query = $user->connect()->prepare("SELECT * FROM software WHERE pc=?");
		        $query->execute([$emple]);
		        $resultado=$query->fetchAll();
		        foreach ($resultado as $res) {
		        	echo '<option value="'.$res["nombre"].'">'.$res["nombre"].'</option>';	
		           	//echo json_encode('<option value="'.$res["pc"].'">'.$res["nombre"].'</option> ');
		        }
				break;
			}
		break;
	}
?>