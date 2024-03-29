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
		        	echo "<h2>Todos los tickets</h2>";
			        echo "<table class='table table-hover table-sm' id='resultado'>";     
			                echo "<thead class='thead-light'><tr>";
			                echo "<th> ID ticket</th>";
			                echo "<th> Empleado </th>";
			                echo "<th> Agencia </th>";
			                echo "<th> Puesto </th>";
			                echo "<th> Dirección Ip </th>";
			                echo "<th> Problema </th>";
			                echo "<th> Estado </th>";
			                echo "<th> Fecha de entrada </th>";
			                echo "<th> Fecha de solución </th>";
			                echo "</thead><tr>";
			        $resultado=$query->fetchAll();
			        foreach ($resultado as $res) {
			                echo "<td>".$res["id"]."</td>";
			                echo "<td>".$res["empleado"]."</td>";
			                echo "<td>".$res["agencia"]."</td>";
			                echo "<td>".$res["puesto"]."</td>";
			                echo "<td>".$res["ip"]."</td>";
			                echo "<td>".$res["problema"]."</td>";
			                echo "<td>".$res["estado"]."</td>";
			                echo "<td>".date("d/m/Y H:i:s", strtotime($res["fecha_activo"]))."</td>";
                if ($res["fecha_solucion"]=="") {
                    echo "<td>".$res["fecha_solucion"]."</td>";
                }else{
                    echo "<td>".date("d/m/Y H:i:s", strtotime($res["fecha_solucion"]))."</td>";
                }
			                echo "</tr>";                                   
			        }
			        echo "</table> </div>";
		        }
				break;
	}
?>