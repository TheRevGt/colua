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
					$ids = $datos->ids;
					$estatus = $datos->estatus;
					$h= $datos->fecha;
					$c= $datos->comentario;
					$sql =("UPDATE soporte SET estado=?, fecha_solucion=?, cometario=? where id=?");
			        $stmt=$user->connect()->prepare($sql);
					if ($stmt->execute([$estatus,$h,$c,$ids])) {
						echo "Ticket solucionado";
					}else{
						echo "Error";
					}
				break;
			}
		break;
	}
?>