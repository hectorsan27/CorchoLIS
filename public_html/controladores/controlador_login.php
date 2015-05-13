<?php
//Evitar PHP Injection
	if (isset($_POST['fl_correo']) && isset($_POST['fl_password'])){
		//Aqui se recogen los datos del login
		$fl_correo =  $_POST['fl_correo']; 
		$fl_password =  $_POST['fl_password'];


		//Incluimos el modelo para usar sus funciones
		require_once("../modelos/modelo.php");
		$validado = validarFormularioLogin($fl_correo, $fl_password);
		if ($validado) {
			$resultado = loginUsuario($fl_correo,$fl_password);
			if ($resultado) {
				//Guardamos en la variable de sesión el usuario logeado
				if (!isset($_SESSION)){
					session_start();
				}
				$_SESSION['correo']= $fl_correo;
				echo "<script type='text/javascript'>";
				echo 	"window.location.assign('http://localhost/public_html/home');";
				echo 	"alert('Logeo exitoso');";
				echo "</script>";
				exit();

			} else {
				echo "<script type='text/javascript'>";
				echo 	"window.location.assign('http://localhost/public_html/');";
				echo 	"alert('Correo o password incorrecto(s)');";
				echo "</script>";
				exit();
			}
		} else {
			echo "<script type='text/javascript'>";
			echo 	"window.location.assign('http://localhost/public_html/');";
			echo 	"alert('Correo o password incorrecto(s)');";
			echo "</script>";
			exit();
		}
	}
	else{
		header("Location: /public_html");
	}
?>