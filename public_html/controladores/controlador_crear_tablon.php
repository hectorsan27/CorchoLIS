<?php
	if (!isset($_SESSION)) {
    	session_start();
	}
	$correo = $_SESSION['correo'];
	$nombre =  $_POST['nombre'];
	$descripcion =  $_POST['descripcion'];

	require_once("../modelos/modelo.php");
	agregarTablon($correo,$nombre,$descripcion);
	$tablones = cargarTablones($_SESSION['correo']);
	$ultimo_tablon = count($tablones)-1;
	if ($ultimo_tablon == -1){
		$ultimo_tablon = 0;
	}
	$codigo = $tablones[$ultimo_tablon][3];
	header("location: /public_html/tablon/".$codigo);
?>
