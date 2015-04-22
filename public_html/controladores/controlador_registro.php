<?php
	//Aqui se recogen los datos del formulario de registro

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
			echo "<script type='text/javascript'>alert('Registrado con éxito');</script>";
		} else {
			echo "<script type='text/javascript'>alert('Error en el registro');</script>";
		}
	} else {
			echo "<script type='text/javascript'>alert('Error en el registro');</script>";
	}


?>