<?php
	//Evitar PHP Injection
	if (isset($_POST['fr_correo']) && isset($_POST['fr_nombre']) && isset($_POST['fr_nacimiento']) && isset($_POST['fr_provincia']) && isset($_POST['fr_password'])){
		//Aqui se recogen los datos del registro
		$fr_correo = $_POST['fr_correo']; 
		$fr_nombre = $_POST['fr_nombre']; 
		$fr_nacimiento = $_POST['fr_nacimiento']; 
		$fr_provincia = $_POST['fr_provincia']; 
		$fr_password = $_POST['fr_password']; 

		//Incluimos el modelo para usar sus funciones
		require_once("../modelos/modelo.php");

		//Comprobación de que los datos són correctos desde el lado del servidor
		$validado = validarFormularioRegistro($fr_correo, $fr_nombre, $fr_nacimiento, $fr_provincia, $fr_password);

		if ($validado) {
			$insertado = registrarUsuario($fr_correo, $fr_nombre ,$fr_nacimiento,$fr_provincia,$fr_password );

			if($insertado){
				if (!isset($_SESSION)){
					session_start();
				}
				$_SESSION['correo']= $fr_correo;
				header("Location: /public_html/home");
				exit();
			} else {
				echo "<script type='text/javascript'>";
				echo 	"window.location.assign('http://localhost/public_html/');";
				echo 	"alert('Correo en uso');";
				echo "</script>";
			}
		} else {
			echo "<script type='text/javascript'>";
			echo 	"window.location.assign('http://localhost/public_html/');";
			echo 	"alert('Error en el registro');";
			echo "</script>";
		}
	}
	else{
		header("Location: /public_html");
	}
?>