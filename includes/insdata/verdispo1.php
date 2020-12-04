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
					
					 public function verestadosdc()
					{
						$empelado = $datos->empleado;
				 	$query = $this->connect()->prepare("SELECT * FROM dispositivo WHERE empleado=?");
			        $query->execute([$empleado]);
			        $resultado=$query->fetchAll();
			        foreach ($resultado as $res) {
			                echo "<td>".$res["id"]."</td>";
			                echo "<td>".$res["nombre"]."</td>";
			                echo "<td>".$res["no_activo"]."</td>";
			                echo "<td>".$res["marca"]."</td>";
			                echo "<td>".$res["modelo"]."</td>";
			                echo "<td>".$res["serie"]."</td>";
			                echo "<td>".$res["fecha_entrada"]."</td>";
			                echo "<td>".$res["estado"]."</td>";
			                echo "</tr>";                                   
			        }
        			echo "</table>";
					}
				
				 	
				break;
			}
		break;
		case 'PUT':
			
		break;
		case 'DELETE':
			
		break;
	}


?>