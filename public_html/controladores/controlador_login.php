<?php
	//Aqui se recogen los datos del login
	$fl_correo =  $_POST['fl_correo']; 
	$fl_password =  $_POST['fl_password'];


	//Incluimos el modelo para usar sus funciones
	require_once("../modelos/modelo.php");
	$validado = validarFormularioLogin($fl_correo, $fl_password);
	echo "<script type='text/javascript'>alert('hola');</script>";
	if ($validado) {
		$resultado = loginUsuario($fl_correo,$fl_password);
		if ($resultado) {
			//Guardamos en la variable de sesión el usuario logeado
			session_start();
			$_SESSION['correo']= $fl_correo;
			echo "<script type='text/javascript'>alert('Logeado con éxito');</script>";
			header("Location: /public_html/home");
			exit();

		} else {
			echo "<script type='text/javascript'>alert('No pasa el logeo');</script>";
			header("Location: /public_html");
			exit();
		}
	} else {
		echo "<script type='text/javascript'>alert('No pasa la validación');</script>";
		header("Location: /public_html");
		exit();
	}
?>