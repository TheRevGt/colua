<?php
include 'db.php';
$conn= new DB();
    $metodo = $_SERVER["REQUEST_METHOD"];
	$ruta = implode("/", array_slice(explode("/", $_SERVER["REQUEST_URI"]), 3));
	$datos = json_decode(file_get_contents("php://input"));
	switch($metodo){
		case 'POST':
			switch ($ruta) {
				default:
				//Asi jalas los datos para la fila 0 del object. Obviamente recorres el array y guardas va.
				for ($i=0; $i < count($datos); $i++) { 
					$nombre = $datos[$i]->nombre;
					$edicion = $datos[$i]->edicion;
					$emple = $datos[$i]->empleado;
					$sql="INSERT INTO software(nombre,edicion,empleado) VALUES(?,?,?)";
	        			$stmt=$conn->connect()->prepare($sql);
		            if ($stmt->execute([$nombre,$edicion,$emple])) {
		                echo "<script> alert('Softeares agregados')</script>";
		            }else{
		                echo "<script> alert('Error')</script>";
		            }
					//Este ok lo podes usar para verificar en el cliente que si se logro el post. Con if podes regresar codigos que querras poner para determinar si se ha guardado, si hubo un error etc.
					}
				echo json_encode("ok");
				break;
			}
		break;
	}
?>