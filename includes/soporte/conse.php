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
				$tecnico = $datos->tecnico;
				$estado = $datos->estado;
				$query = $user->connect()->prepare("SELECT * FROM soporte WHERE tecnico=? AND estado=?");
		        $query->execute([$tecnico,$estado]);
		        	echo "<br> <h2>Todos los tickets</h2>";
			        echo "<div class='ared'>
			        <table id='resultado'>";     
			                echo "<div><tr>";
			                echo "<th> ID ticket</th>";
			                echo "<th> Empleado </th>";
			                echo "<th> Agencia </th>";
			                echo "<th> Puesto </th>";
			                echo "<th> Dirección Ip </th>";
			                echo "<th> Problema </th>";
			                echo "<th> Estado </th>";
			                echo "<th> Fecha de entrada </th>";
			                echo "<th> Fecha de solución </th>";
			                echo "<tr>";
			        $resultado=$query->fetchAll();
			        foreach ($resultado as $res) {
			                echo "<td>".$res["id"]."</td>";
			                echo "<td>".$res["empleado"]."</td>";
			                echo "<td>".$res["agencia"]."</td>";
			                echo "<td>".$res["puesto"]."</td>";
			                echo "<td>".$res["ip"]."</td>";
			                echo "<td>".$res["problema"]."</td>";
			                echo "<td>".$res["estado"]."</td>";
			                echo "<td>".$res["fecha_activo"]."</td>";
			                echo "<td>".$res["fecha_solucion"]."</td>";
			                echo "</tr>";                                   
			        }
			        echo "</table> </div>";
		        }
				break;
	}
?>