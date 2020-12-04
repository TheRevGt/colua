<?php
if ($user->getiduser()=="admin") {
	include_once 'vistas/servicioa.php';
}else{
	 include_once 'vistas/soporteu/activos.php';
}
?>