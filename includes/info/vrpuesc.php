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
				$area = $datos->area;
				$query = $user->connect()->prepare("SELECT * FROM puesto WHERE agencia=? and area=?");
		        $query->execute([$noagencia,$area]);
		        $resultado=$query->fetchAll();
		        echo "<option value=''>Seleccionar puesto</option>";
		        foreach ($resultado as $res) {
		        	echo '<option value="'.$res["nombre"].'">'.$res["nombre"].' </option>';
		        }
				break;
			}
		break;
	}
?>