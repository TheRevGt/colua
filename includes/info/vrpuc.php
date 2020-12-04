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
				$area = $datos->area;
				$query = $user->connect()->prepare("SELECT * FROM puesto WHERE area=?");
		        $query->execute([$area]);
		        $resultado=$query->fetchAll();
		        echo "<div>
		        <table style='text-align: center;' id='cons2'>
		        <th>Nombre</th>
		        ";
		        foreach ($resultado as $res) {
		        	echo 
			        	"<tr>
			        	<td>".$res["nombre"]."</td>
			        	</tr>";
		        }
		        echo "</table> <br></div>";
				break;
			}
		break;
	}
?>