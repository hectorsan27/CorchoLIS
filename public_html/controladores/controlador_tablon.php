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
		$nombre = $_POST["nombre"];
		$url = $_POST["url"];

		anadirElemento($idTablon,$posicion_x,$posicion_y,$tamano,$tipo,$nombre,$contenido,$url);
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

	if ($action == 'DISCARD'){
		$idTablon = $_POST["idTablon"];
		$element = $_POST["idElem"];
		enviarPapelera($idTablon,$element);	
	}

	if ($action == 'RECOVER'){
		$idTablon = $_POST["idTablon"];
		$element = $_POST["idElem"];
		recuperarElemento($idTablon,$element);	
	}

	if ($action == 'EMPTY'){
		$idTablon = $_POST["idTablon"];
		vaciarPapelera($idTablon);	
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

	if ($action == 'ADDBOARD'){
		$correo = $_POST["correo"];

		agregarTablon($correo);
		
	}

	if ($action == 'OPENBOARD'){
		$correo = $_POST["correo"];
		$idTablon = $_POST["idTablon"];		
		$_SESSION['tablonid']= $idTablon;
		
		header('Location: /public_html/tablon/'.$idTablon);
		exit();
	}
	if ($action == 'DELETEBOARD'){
		$idTablon = $_POST["idTablon"];
		deleteboard($idTablon);
		exit();
	}

	if ($action == 'ADMIN'){
		
		$correo = $_POST["correo"];
		$idTablon = $_POST["idTablon"];
		$privilegio = $_POST["privilegio"];
		modificarPrivilegios($idTablon, $correo, $privilegio);
		header('Location: /public_html/tablon');
		exit();
	}
?>
