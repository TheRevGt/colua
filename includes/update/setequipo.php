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
					$nempleado = $datos->nuempleado;
					$tipo = $datos->tipo;
					$activo = $datos->activo;
					$so = $datos->so;
					$edicion = $datos->edicion;
					$lice = $datos->lice;
					$marca = $datos->marca;
					$modelo = $datos->modelo;
					$serie = $datos->serie;
					$ip = $datos->ip;
					$fecha = $datos->fecha;
					$mac = $datos->mac;
					$estado = $datos->estado;
					$estatus = $datos->estatus;
					if ($nempleado=="none") {
						$sql =("UPDATE pc SET empleado=?, no_activo=?, tipo=?, so=?, edicion=?, licencia=?, marca=?, modelo=?, serie=?, ip=?, fecha_entrada=?, mack_pc=?, estado=?, estatus=? where no_activo=?");
				        $stmt=$user->connect()->prepare($sql);
						if ($stmt->execute([$empleado,$activo,$tipo,$so,$edicion,$lice,$marca,$modelo,$serie,$ip,$fecha,$mac,$estado,$estatus,$id])) {
							#echo "Equipo actualizado";
							$sql =("UPDATE software SET pc=?, empleado=? where pc=?");
					        $stmt=$user->connect()->prepare($sql);
							if ($stmt->execute([$activo,$empleado,$id])) {
								echo "Equipo actualizado";
							}else{
								echo "Error";
							}
						}else{
							echo "Error";
						}
					}
					else{
						$sql =("UPDATE pc SET empleado=?, no_activo=?, tipo=?, so=?, edicion=?, licencia=?, marca=?, modelo=?, serie=?, ip=?, fecha_entrada=?, mack_pc=?, estado=?, estatus=? where no_activo=?");
				        $stmt=$user->connect()->prepare($sql);
						if ($stmt->execute([$nempleado,$activo,$tipo,$so,$edicion,$lice,$marca,$modelo,$serie,$ip,$fecha,$mac,$estado,$estatus,$id])) {
							#echo "Equipo actualizado";
							$sql =("UPDATE software SET pc=?, empleado=? where pc=? and empleado=?");
					        $stmt=$user->connect()->prepare($sql);
							if ($stmt->execute([$activo,$nempleado,$id,$empleado])) {
								echo "Equipo actualizado";
							}else{
								echo "Error";
							}
						}else{
							echo "Error";
						}
					}
				break;
			}
		break;
	}
?>