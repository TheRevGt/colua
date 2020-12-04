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
					$da = $datos->consulta;
					$query = $conn->connect()->prepare("SELECT * FROM pc WHERE empleado=?");
				        $query->execute([$da]);
				        echo "<br> <h2>Datos de equipo </h2>";
				        echo "<table>";     
				                echo "<tr>";
				                echo "<th> Nombre </th>";
				                echo "<th> No activo </th>";
				                echo "<th> Tipo </th>";
				                echo "<th> SO </th>";
				                echo "<th> Edicion </th>";
				                echo "<th> Licencia </th>";
				                echo "<th> Marca </th>";
				                echo "<th> Modelo </th>";
				                echo "<th> Serie </th>";
				                echo "<th> IP </th>";
				                echo "<th> Fecha </th>";
				                echo "<th> MAC </th>";
				                echo "<th> Contraseña </th>";
				                echo "<td> Estado</td>";
				                echo "<tr>";
				        $resultado=$query->fetchAll();
				        foreach ($resultado as $res) {
				                echo "<td>".$res["empleado"]."</td>";
				                echo "<td>".$res["no_activo"]."</td>";
				                echo "<td>".$res["tipo"]."</td>";
				                echo "<td>".$res["so"]."</td>";
				                echo "<td>".$res["edicion"]."</td>";
				                echo "<td>".$res["licencia"]."</td>";
				                echo "<td>".$res["marca"]."</td>";
				                echo "<td>".$res["modelo"]."</td>";
				                echo "<td>".$res["serie"]."</td>";
				                echo "<td>".$res["ip"]."</td>";
				                echo "<td>".$res["fecha_entrada"]."</td>";
				                echo "<td>".$res["mack_pc"]."</td>";
				                echo "<td>".$res["paswor"]."</td>";
				                echo "<td>".$res["estado"]."</td>";
				                echo "</tr>";                                   
				        }
				        echo "</table>";
				echo json_encode($resultado);
				break;

			}
		break;
	}


?>