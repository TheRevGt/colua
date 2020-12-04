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
					$area = $datos->area;
					$agencia = $datos->agencia;
					$pues = $datos->puesto;
					$nom = $datos->nombre;
					$use = $datos->user;
					$pa = $datos->pass;
					$esta = $datos->estado;
					$sql =("UPDATE empleado SET area=?, puesto=?, nombres=?, usuario=?, paswor=?, agencia=?, estado=? where nombres=?");
			        $stmt=$user->connect()->prepare($sql);
					if ($stmt->execute([$area,$pues,$nom,$use,$pa,$agencia,$esta,$id])) {
						#echo "empleado actualizado";
							$sql2 =("UPDATE dispositivo SET empleado=? where empleado=?");
					        $stmt2=$user->connect()->prepare($sql2);
							if ($stmt2->execute([$nom,$id])) {
								#echo "empleado actualizado";
								$sql3 =("UPDATE pc SET empleado=? where empleado=?");
						        $stmt3=$user->connect()->prepare($sql3);
								if ($stmt3->execute([$nom,$id])) {
									#echo "empleado actualizado";
									$sql4 =("UPDATE soporte SET empleado=? where empleado=?");
							        $stmt4=$user->connect()->prepare($sql4);
									if ($stmt4->execute([$nom,$id])) {
										#echo "Empleado actualizado";
											$sql5 =("UPDATE software SET empleado=? where empleado=?");
									        $stmt5=$user->connect()->prepare($sql5);
											if ($stmt5->execute([$nom,$id])) {
												echo "Empleado actualizado";
											}else{
												echo "Error";
											}
									}else{
										echo "Error";
									}
								}else{
									echo "Error";
								}
							}else{
								echo "Error";
							}
					}else{
						echo "Error";
					}
				break;
			}
		break;
	}


?>