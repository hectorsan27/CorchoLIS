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
    	if (isset($_SESSION['correo'])){
   				header("Location: /public_html/home");
   		}
   		else{
   			require_once("../vistas/header_inicio.php"); 
			require("../vistas/vista_inicio.html");
			require_once("../vistas/footer.php");	
   		}
        break;
   	case 2:
         if($url[2] == 'contacto') {
            require_once("../vistas/header_home.php");
            require_once("../vistas/vista_contacto.php");
            require_once("../vistas/footer.php");
         }
         if($url[2] == 'tos') {
            require_once("../vistas/header_home.php");
            require_once("../vistas/vista_tos.php");
            require_once("../vistas/footer.php");
         }
         if($url[2] == 'sobre_nosotros') {
            require_once("../vistas/header_home.php");
            require_once("../vistas/vista_sobre-nosotros.php");
            require_once("../vistas/footer.php");
         }
   		if($url[2] == 'home') {
   			if (isset($_SESSION['correo'])){
   				require_once("../modelos/modelo.php");
				$correo = $_SESSION['correo'];
				$tablones = cargarTablones($_SESSION['correo']);
				$tablonesComp = cargarTablonesComp($_SESSION['correo']);
				require_once("../vistas/header_home.php");
				require("../vistas/vista_home.php");
				require_once("../vistas/footer.php");
   			}
   			else{
   				header("Location: /public_html");
   			}
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
   		 	if (getID($url[3])!=null) {
	   		 	$curtablon= getID($url[3]);
	   		 	$curtablontest = $curtablon;
	   			$correo = $_SESSION['correo'];
				$infoUsuario = getInfoUsuario($correo);
				$infoTablon = getInfoTablon($curtablontest);
	   			//TODO implementar if (si correo de session y id coinciden en la base de datos usuarios tablones )
				require_once("../vistas/header_tablon.php");
				require("../vistas/vista_tablon.php"); 
				require_once("../vistas/footer.php");
            echo '<script>document.cookie = "idTablon=' . $curtablon . ' "</script>';
   		 	}
   		 	else{
   		 		header("location: /public_html");
   		 	}
   		 	
   		}
   		break;
}
?>