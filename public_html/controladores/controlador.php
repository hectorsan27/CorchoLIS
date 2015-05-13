<?php

//error_reporting(0); //Deshabilita las notificaciones

//Cortamos la URI por partes
header('Content-Type: text/html; charset=utf-8');
$url = $_SERVER['REQUEST_URI'];
$url = explode("/", $url);

//Eliminamos espacios
function eliminarEspacioEnblanco($elemento) { 
	return( $elemento != '' ); 
}

$url = array_filter($url, "eliminarEspacioEnblanco");

if (!isset($_SESSION)){
	session_start();
}
//Enviamos los requires necesarios segun la URI analizada
switch (count($url)) {
	case 0: 
    case 1:	//Inicio
		require_once("../vistas/header_inicio.php"); 
		require("../vistas/vista_inicio.html");
		require_once("../vistas/footer.php");	
        break;
   	case 2:
   		if($url[2] == 'home') {
			require_once("../modelos/modelo.php");
			$correo = $_SESSION['correo'];
			$tablones = cargarTablones($_SESSION['correo']);
			$tablonesComp = cargarTablonesComp($_SESSION['correo']);
			require_once("../vistas/header_home.php");
			require("../vistas/vista_home.php");
			require_once("../vistas/footer.php");
   		}
   		if($url[2] == 'shared') {
				require_once("../modelos/modelo.php");
				require_once("../vistas/header_inicio.php");
				require("../vistas/vista_shared.php");
				require_once("../vistas/footer.php");
   		}
   		if($url[2] == 'cerrar_session') {
	   		if(isset($_SESSION['correo'])){
				unset($_SESSION['correo']); 
			}
			header("Location: /public_html");
			exit();
   		}
   		break;
   	case 3:
   		if($url[2] == 'tablon')
   		 {
   		 	require_once("../modelos/modelo.php");
   		 	if (iddelcodigo($url[3])!=null) {
   		 	$curtablon= iddelcodigo($url[3]);
   		 	$curtablontest = $curtablon;
   			$correo = $_SESSION['correo'];
			$infoUsuario = getInfoUsuario($correo);
   			//TODO implementar if (si correo de session y id coinciden en la base de datos usuarios tablones )
			require_once("../vistas/header_tablon.php");
			require("../vistas/vista_tablon.php"); 
			require_once("../vistas/footer.php");
   		 	}
   		 	else{
   		 		header("location: /public_html");
   		 	}
   		 	
   		}
   		break;
}
?>