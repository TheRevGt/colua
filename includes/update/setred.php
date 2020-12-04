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
					$agencia = $datos->agencia;
					$nuevaag = $datos->nuagencia;
					$activo = $datos->activo;
					$tipo = $datos->tipo;
					$marca = $datos->marca;
					$modelo = $datos->modelo;
					$serie = $datos->serie;
					$ip = $datos->ip;
					$fecha = $datos->fecha;
					$estado = $datos->estado;
					$estatus = $datos->estatus;
					if ($nuevaag=="nuevo") {
						$sql =("UPDATE red SET agencia=?, no_activo=?,  nombre=?, marca=?, modelo=?, serie=?, no_ip=?, fecha_entrada=?, estado=?, estatus=? where no_activo=?");
				        $stmt=$user->connect()->prepare($sql);
						if ($stmt->execute([$agencia,$activo,$tipo,$marca,$modelo,$serie,$ip,$fecha,$estado,$estatus,$id])) {
							echo "dispositivo actualizado";
						}else{
							echo "Error";
						}
					}else{
						$sql =("UPDATE red SET agencia=?, no_activo=?,  nombre=?, marca=?, modelo=?, serie=?, no_ip=?, fecha_entrada=?, estado=?, estatus=? where no_activo=?");
				        $stmt=$user->connect()->prepare($sql);
						if ($stmt->execute([$nuevaag,$activo,$tipo,$marca,$modelo,$serie,$ip,$fecha,$estado,$estatus,$id])) {
							echo "Dispositivo actualizado";
						}else{
							echo "Error";
						}
					}
					
				break;
			}
		break;
	}
?>