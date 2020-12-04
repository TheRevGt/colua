<?php

include_once 'activoc.php';

$texto = $_GET['tipo'];

$modelo = new Autocompletar();

$res = $modelo->buscar($texto);

echo json_encode($res);

?>