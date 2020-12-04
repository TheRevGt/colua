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
					$empleado = $datos->empleado;
					$nuempleado = $datos->nempleado;
					$tipo = $datos->tipo;
					$activo = $datos->activo;
					$marca = $datos->marca;
					$modelo = $datos->modelo;
					$serie = $datos->serie;
					$ip = $datos->ip;
					$fecha = $datos->fecha;
					$estado = $datos->estado;
					$estatus = $datos->estatus;
					if ($nuempleado=="nuevo") {
						$sql =("UPDATE dispositivo SET empleado=?, nombre=?, no_activo=?, marca=?, modelo=?, serie=?, ip=?, fecha_entrada=?, estado=?, estatus=? where no_activo=?");
				        $stmt=$user->connect()->prepare($sql);
						if ($stmt->execute([$empleado,$tipo,$activo,$marca,$modelo,$serie,$ip,$fecha,$estado,$estatus,$id])) {
							echo "dispositivo actualizado";
						}else{
							echo "Error";
						}					}
					else{
						$sql =("UPDATE dispositivo SET empleado=?, nombre=?, no_activo=?, marca=?, modelo=?, serie=?, ip=?, fecha_entrada=?, estado=?, estatus=? where no_activo=?");
				        $stmt=$user->connect()->prepare($sql);
						if ($stmt->execute([$nuempleado,$tipo,$activo,$marca,$modelo,$serie,$ip,$fecha,$estado,$estatus,$id])) {
							echo "dispositivo actualizado";
						}else{
							echo "Error";
						}
					}
				break;
			}
		break;
	}
?>