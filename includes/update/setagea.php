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
				$noagencia = $datos->noagencia;
				$agencia = $datos->agencia;
				$soport= $datos->tecnico;
				$sql =("UPDATE agencia SET n_agencia=?, nombre=?, soport=? where n_agencia=?");
		        $stmt=$user->connect()->prepare($sql);
				if ($stmt->execute([$noagencia,$agencia,$soport,$id])) {
					#echo "Agencia actualizada";
					#actualizamos en areas
					$sql2 =("UPDATE area SET agencia=? where agencia=?");
			        $stmt2=$user->connect()->prepare($sql2);
					if ($stmt2->execute([$noagencia,$id])) {
						#echo "Agencias en área actualizada";
							$sql3 =("UPDATE empleado SET agencia=? where agencia=?");
					        $stmt3=$user->connect()->prepare($sql3);
							if ($stmt3->execute([$noagencia,$id])) {
								#echo "Agencias en área empleado";
									$sql4 =("UPDATE puesto SET agencia=? where agencia=?");
							        $stmt4=$user->connect()->prepare($sql4);
									if ($stmt4->execute([$noagencia,$id])) {
										#echo "Agencias en área actualizada";
										$sql5 =("UPDATE red SET agencia=? where agencia=?");
								        $stmt5=$user->connect()->prepare($sql5);
										if ($stmt5->execute([$noagencia,$id])) {
											#echo "Agencias en área actualizada";
											$sql6 =("UPDATE soporte SET agencia=? where agencia=?");
									        $stmt6=$user->connect()->prepare($sql6);
											if ($stmt6->execute([$noagencia,$id])) {
												echo "Agencias actualizada";
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
					
				}else{
					echo "Error";
				}
				break;
			}
		break;
	}


?>