<?php

	$action =  $_POST["action"];
	require_once("../modelos/modelo.php");

	//crear nuevos elementos
	if ($action == 'INSERT'){
		//coger variables recibidas
		$idTablon = $_POST["idTablon"];
		$posicion_x = $_POST["posicion_x"];
		$posicion_y = $_POST["posicion_y"];
		$tamano = $_POST["tamano"];
		$tipo = $_POST["tipo"];
		$contenido = $_POST["contenido"];

		anadirElemento($idTablon,$posicion_x,$posicion_y,$tamano, $tipo,$contenido);

	}
	if ($action == 'EDIT_POSITION'){
		$idTablon = $_POST["idTablon"];
		$element = $_POST["idElem"];
		$posicion_x = $_POST["posicion_x"];
		$posicion_y = $_POST["posicion_y"];

		editarPosicionElemento($idTablon,$element,$posicion_x,$posicion_y);
	}
	if ($action == 'EDIT_CONTENT'){
		$idTablon = $_POST["idTablon"];
		$element = $_POST["idElem"];
		$contenido = $_POST["contenido"];

		editarContenidoElemento($idTablon,$element,$contenido);
	}
	if ($action == 'DELETE'){
		$idTablon = $_POST["idTablon"];
		$element = $_POST["idElem"];

		eliminarElemento($idTablon,$element);
		
	}
	if ($action == 'SHARE'){
		$idTablon = $_POST["idTablon"];
		$correo = $_POST["correo"];

		compartirTablon($idTablon,$correo);
		
	}
?>
