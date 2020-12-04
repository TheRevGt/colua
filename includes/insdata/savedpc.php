<?php
include_once '../user.php';
$user= new User();
    $metodo = $_SERVER["REQUEST_METHOD"];
	$ruta = implode("/", array_slice(explode("/", $_SERVER["REQUEST_URI"]), 3));
	$datos = json_decode(file_get_contents("php://input"));
	switch($metodo){
		case 'GET':
			
		break;
		case 'POST':
			switch ($ruta) {

				default:
				$emple = $datos->empleado;
				$tipop = $datos->tipo;
				$activop = $datos->activo;
				$so = $datos->so;
				$edicionp = $datos->edicion;
				$li = $datos->licencia;
				$marcap = $datos->marcap;
				$modelop = $datos->modelop;
				$seriep = $datos->seriep;
				$ip = $datos->ip;
				$mac = $datos->mac;
				$fechap = $datos->fecha;
				$estadop = $datos->estadop;
				if ($user->acreExists($activop)=="" || $user->acreExists($activop)=="s/n"){
					if ($user->acdiExists($activop)=="" || $user->acdiExists($activop)=="s/n") {
						if ($user->acpcExists($activop)=="" || $user->acpcExists($activop)=="s/n") {
							if ($user->iprExists($ip)=="" || $user->iprExists($ip)=="s/n") {
								if ($user->ipdExists($ip)=="" || $user->ipdExists($ip)=="s/n") {
									if ($user->ipeExists($ip)=="" || $user->ipeExists($ip)=="s/n") {
										$sql="INSERT INTO pc(empleado,no_activo,tipo,so,edicion,licencia,marca,modelo,serie,ip,fecha_entrada,mack_pc,estado,estatus) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
	        							$stmt=$user->connect()->prepare($sql);
					            		if ($stmt->execute([$emple,$activop,$tipop,$so,$edicionp,$li,$marcap,$modelop,$seriep,$ip,$fechap,$mac,$estadop," "])) {
					                		echo "Equipo agregado";
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
				break;
			}
		break;
	}


?>