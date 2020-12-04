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
				//Asi jalas los datos para la fila 0 del object. Obviamente recorres el array y guardas va.
					$n_ag = $datos->no_age;
					$codigo = $datos->activo;
					$tipo = $datos->tipo;
					$marca = $datos->marca;
					$modelo = $datos->modelo;
					$serie = $datos->serie;
					$ip = $datos->ip;
					$fecha = $datos->fecha;
					$estado = $datos->estado;
					echo $codigo;
					if ($codigo=="") {
						$query = $user->connect()->prepare('SELECT * FROM red order by id desc limit 1');
				        $query->execute();
				        $resultado=$query->fetchAll();
				        foreach ($resultado as $res) {
				            $num= $res["id"]+1;
				            if ($user->acreExists($num)=="" || $user->acreExists($num)=="s/n"){
							if ($user->acdiExists($num)=="" || $user->acdiExists($num)=="s/n") {
								if ($user->acpcExists($num)=="" || $user->acpcExists($num)=="s/n") {
									if ($user->iprExists($ip)=="" || $user->iprExists($ip)=="s/n") {
										if ($user->ipdExists($ip)=="" || $user->ipdExists($ip)=="s/n") {
											if ($user->ipeExists($ip)=="" || $user->ipeExists($ip)=="s/n") {
												$sql="INSERT INTO red(agencia,no_activo,nombre,marca,modelo,serie,no_ip,fecha_entrada,estado,estatus) VALUES(?,?,?,?,?,?,?,?,?,?)";
				        						$stmt=$user->connect()->prepare($sql);
									            if ($stmt->execute([$n_ag,$num,$tipo,$marca,$modelo,$serie,$ip,$fecha,$estado," "])) {
									                echo "Dispositivo de red agregado";
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
				    }else{
				    	if ($user->acreExists($codigo)=="" || $user->acreExists($codigo)=="s/n"){
							if ($user->acdiExists($codigo)=="" || $user->acdiExists($codigo)=="s/n") {
								if ($user->acpcExists($codigo)=="" || $user->acpcExists($codigo)=="s/n") {
									if ($user->iprExists($ip)=="" || $user->iprExists($ip)=="s/n") {
										if ($user->ipdExists($ip)=="" || $user->ipdExists($ip)=="s/n") {
											if ($user->ipeExists($ip)=="" || $user->ipeExists($ip)=="s/n") {
												$sql="INSERT INTO red(agencia,no_activo,nombre,marca,modelo,serie,no_ip,fecha_entrada,estado,estatus) VALUES(?,?,?,?,?,?,?,?,?,?)";
				        						$stmt=$user->connect()->prepare($sql);
									            if ($stmt->execute([$n_ag,$codigo,$tipo,$marca,$modelo,$serie,$ip,$fecha,$estado," "])) {
									                echo "Dispositivo de red agregado";
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
				break;
		break;
	}


?>