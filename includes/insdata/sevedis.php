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
					$tipo = $datos->tipo;
					$codigo = $datos->codigo;
					$marca = $datos->marca;
					$modelo = $datos->modelo;
					$serie = $datos->serie;
					$ipd = $datos->ip;
					$fecha = $datos->fecha;
					$estado = $datos->estado;
					$emple = $datos->empleado;
					if ($codigo=="") {
						$query = $user->connect()->prepare('SELECT * FROM dispositivo order by id desc limit 1');
				        $query->execute();
				        $resultado=$query->fetchAll();
				        foreach ($resultado as $res) {
				            $num= $res["id"]+1;
				            if ($user->acreExists($codigo)=="" || $user->acreExists($codigo)=="s/n"){
							if ($user->acdiExists($codigo)=="" || $user->acdiExists($codigo)=="s/n") {
								if ($user->acpcExists($codigo)=="" || $user->acpcExists($codigo)=="s/n") {
									if ($user->ipdExists($ipd)=="" || $user->ipdExists($ipd)=="s/n") {
										if ($user->iprExists($ipd)=="" || $user->iprExists($ipd)=="s/n") {
											if ($user->ipeExists($ipd)=="" || $user->ipeExists($ipd)=="s/n") {
												$sql="INSERT INTO dispositivo(empleado,nombre,no_activo,marca,modelo,serie,ip,fecha_entrada,estado,estatus) VALUES(?,?,?,?,?,?,?,?,?,?)";
							        			$stmt=$user->connect()->prepare($sql);
								            	if ($stmt->execute([$emple,$tipo,$num,$marca,$modelo,$serie,$ipd,$fecha,$estado," "])) {
								                	echo "Equipo registrado";
								            	}else{
								                	echo "Error";
								            	}
											}else{
												echo "Numero de ip existente";
											}
										}else{
											echo "Numero de ip existente";
										}
									}else{
										echo "Numero de ip existente";
									}
								}else{
									echo "Numero de activo existente";
								}
							}else{
								echo "Numero de activo existente";
							}
						}else{
							echo "Numero de activo existente";
						}            
				        }
					}
					else{
						if ($user->acreExists($codigo)=="" || $user->acreExists($codigo)=="s/n"){
						if ($user->acdiExists($codigo)=="" || $user->acdiExists($codigo)=="s/n") {
							if ($user->acpcExists($codigo)=="" || $user->acpcExists($codigo)=="s/n") {
								if ($user->ipdExists($ipd)=="" || $user->ipdExists($ipd)=="s/n") {
									if ($user->iprExists($ipd)=="" || $user->iprExists($ipd)=="s/n") {
										if ($user->ipeExists($ipd)=="" || $user->ipeExists($ipd)=="s/n") {
											$sql="INSERT INTO dispositivo(empleado,nombre,no_activo,marca,modelo,serie,ip,fecha_entrada,estado,estatus) VALUES(?,?,?,?,?,?,?,?,?,?)";
						        			$stmt=$user->connect()->prepare($sql);
							            	if ($stmt->execute([$emple,$tipo,$codigo,$marca,$modelo,$serie,$ipd,$fecha,$estado," "])) {
							                	echo "Equipo registrado";
							            	}else{
							                	echo "Error";
							            	}
										}else{
											echo "Numero de ip existente";
										}
									}else{
										echo "Numero de ip existente";
									}
								}else{
									echo "Numero de ip existente";
								}
							}else{
								echo "Numero de activo existente";
							}
						}else{
							echo "Numero de activo existente";
						}
					}else{
						echo "Numero de activo existente";
					}
					}
				break;

			}
		break;
	}


?>