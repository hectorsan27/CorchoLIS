<?php

	if (session_status() == PHP_SESSION_NONE) {
    	session_start();
	}
	$correo = $_SESSION['correo'];
	$nombre =  $_POST['nombre']; 
	$descripcion =  $_POST['descripcion'];

	require_once("../modelos/modelo.php");
	agregarTablon($correo,$nombre, $descripcion);
	$tablones = cargarTablones($_SESSION['correo']);
	$codigo = $tablones[0][3]; /*Carga primer tablón Hard Coded. Hay que crear una funcion CargarTablón*/
	 /*Codigo del tablón*/
	header("location: /public_html/tablon/".$codigo);
?>
