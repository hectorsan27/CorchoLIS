<?php



error_reporting(0); //Deshabilita las notificaciones



//Cortamos la URL por partes

header('Content-Type: text/html; charset=utf-8');

$url = $_SERVER['REQUEST_URI'];


$url = explode("/", $url);

$sitio = false;

//Eliminamos espacios

function eliminarEspacioEnblanco($elemento) { 

	return( $elemento != '' ); 

}

$url = array_filter($url, "eliminarEspacioEnblanco");

//Enviamos los requires necesarios segun la URL analizada



switch (count($url)) {


    case 0:	//Inicio

		require_once("../vistas/header_inicio.php"); 

		require("../vistas/pagina_inicio.html");

		require_once("../vistas/footer.php");
		$sitio = true;	

        break;

   case 1:

   		if($url[1] == 'tablones') {

			require_once("../vistas/header_tablon.php");

			require("../vistas/vista_tablon.html");
			$sitio = true;

   		} 

   		if($url[1] == 'cerrar_session') {

			session_start();

	   		if(isset($_SESSION['logeado'])){

				unset($_SESSION['logeado']); 

			}

			header("Location: /public_html");

			exit();

   		}

   		break;

}
if ($sitio == false){
	print "<meta http-equiv=Refresh content=\"0 ; url= /\">";
}

?>