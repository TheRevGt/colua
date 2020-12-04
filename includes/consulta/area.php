<?php

include_once 'areac.php';

$texto = $_GET['tipo'];

$modelo = new Autocompletar();

$res = $modelo->buscar($texto);

echo json_encode($res);

?>