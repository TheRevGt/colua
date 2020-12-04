<?php
include '../user.php';
$user= new User();
    $metodo = $_SERVER["REQUEST_METHOD"];
	$ruta = implode("/", array_slice(explode("/", $_SERVER["REQUEST_URI"]), 3));
	$datos = json_decode(file_get_contents("php://input"));
	switch($metodo){
		case 'POST':
			switch ($ruta) {
				default;
					$area = $datos->area;
					$agen = $datos->agencia;
					$puesto = $datos->puesto;
					$empleado = $datos->empleado;
					$use = $datos->user;
					$pasw = $datos->pasword;
					if($user->empExists($empleado)){
						echo "El empleado ya existe";
					}else{
						if ($user->usemExists($use)) {
							echo "El usuario ya existe";
						}else{
							$sql="INSERT INTO empleado(area,puesto,nombres,usuario,paswor,agencia,estado) VALUES(?,?,?,?,?,?,?)";
			        		$stmt=$user->connect()->prepare($sql);
				            if ($stmt->execute([$area,$puesto,$empleado,$use,$pasw,$agen," "])) {
				                echo "Empleado agregado";
				            }else{
				                echo "Error";
				            }
						}
			}					
		    break;
		}
		break;
	}
?>