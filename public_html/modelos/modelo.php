<?php

/*
Conecta con la Base de datos. Hay que llamarla al inicio de cada consulta
*/
function conectarBasedeDatos(){
	$connexion = mysql_connect('localhost', 'root', '');
	mysql_select_db('proyecto_lis', $connexion);
	mysql_set_charset('utf8',$connexion);
	return $connexion;
}

/*
Cierra conexión con la base de datos. Hay que llamarla cuando se acaban de hacer todas las consultas//
Parametros: 
	$connexion : la conexion actual con la Base de datos
*/
function desconectarDeBasedeDatos($connexion){
  	mysql_close($connexion);
}

/*
Registra a un usuario en la Base de datos
Parametros:
	fr-correo : correo del usuario
	fr_nombre : nombre del usuario
	fr_nacimiento : fecha de nacimientos del usuario
 	fr_provincia : provincia de España del usuario
	fr_password : password del usuario sin codificar
*/

function registrarUsuario($fr_correo, $fr_nombre, $fr_nacimiento, $fr_provincia, $fr_password)	{
 	//Damos por hecho que el registro es malo
 	$registroCorrecto = false;
	
  	//Nos conectamos a la BD
	$connexion = conectarBasedeDatos();
  	
	//Evitar SQL Injection
	$fr_correo = mysql_real_escape_string($fr_correo);
	$fr_nombre = mysql_real_escape_string($fr_nombre);
	$fr_nacimiento = mysql_real_escape_string($fr_nacimiento);
	$fr_provincia = mysql_real_escape_string($fr_provincia);
	$fr_password = mysql_real_escape_string($fr_password);

	//Comprovamos que no exista usuario igual
	$query = "SELECT 1 FROM usuarios WHERE (Correo = '$fr_correo')";
	$resultado = mysql_query($query, $connexion);

	$num_rows = mysql_num_rows($resultado);

	//Si o devuelve rows es que no existe ese usuario
	if($num_rows == 0) {
		$fr_password = md5($fr_password);
		$query = "INSERT INTO usuarios (Correo, Nombre, Nacimiento, Provincia, Password)
		VALUES ('$fr_correo', '$fr_nombre', '$fr_nacimiento','$fr_provincia', '$fr_password');";
		$result = mysql_query($query, $connexion);
		$registroCorrecto = true; //Registro correcto
	}
  	desconectarDeBasedeDatos($connexion);
  	return $registroCorrecto;
}

/*
Inicia sesión con un usario
Parametros:
	fl-correo : correo del usuario
	fl_password : password sin codificar del usuario
*/
function loginUsuario($fl_correo,$fl_password) {
	//Damos por hecho que el registro es malo
	$loginCorrecto = false;

	$connexion = conectarBasedeDatos();

	//Proteccion contra mysql injection
	$fl_correo = mysql_real_escape_string($fl_correo);
	$fl_password = mysql_real_escape_string($fl_password);
	$fl_password = md5($fl_password);

	$query = "SELECT 1 FROM usuarios WHERE (Correo = '$fl_correo') AND (Password = '$fl_password')";
	$resultado = mysql_query($query, $connexion);
	
	$num_rows = mysql_num_rows($resultado);
	if($num_rows == 1) {
		$loginCorrecto = true;
	}
	desconectarDeBasedeDatos($connexion);
	return $loginCorrecto;
}
/*
Valida los datos del formulario mediante expressiones regulares
Parametros:
	fr-correo : correo del usuario
	fr_nombre : nombre del usuario
	fr_nacimiento : fecha de nacimientos del usuario
 	fr_provincia : provincia de España del usuario
	fr_password : password del usuario sin codificar
*/

function validarFormularioRegistro($fr_correo, $fr_nombre, $fr_nacimiento, $fr_provincia, $fr_password) {

	if (!preg_match("/^[a-zA-Zà-ú]{1,32}$/",$fr_nombre)) {
		return false;
    } else if ( strlen($fr_correo) < 1 || strlen($fr_correo) > 64 || !filter_var($fr_correo, FILTER_VALIDATE_EMAIL)) {
    	return false;
    } else if ( strlen($fr_provincia) < 1 || strlen($fr_provincia) > 32 ) {
    	return false;
    } else if (  !(preg_match("/^[a-z0-9_-]{8,32}$/i", $fr_password))) { 	
    	return false;
    }
    return true;
}
/*
Valida los datos del login mediante expressiones regulares
Parametros:
	fr-correo : correo del usuario
	fr_password : password del usuario sin codificar
*/
function validarFormularioLogin($fr_correo, $fr_password) {

 	if ( strlen($fr_correo) < 1 || strlen($fr_correo) > 64 || !filter_var($fr_correo, FILTER_VALIDATE_EMAIL)) {
    	return false;
    } else if (  !(preg_match("/^[a-z0-9_-]{8,32}$/i", $fr_password))) { 	
    	return false;
    }
    return true;
}
function anadirElemento($idTablon,$posicion_x,$posicion_y,$tamano, $tipo,$contenido){
		$connexion=conectarBasedeDatos();
	// Saber elementos hay
			$query = "SELECT COUNT(DISTINCT ID_elementos) FROM tablones_elementos WHERE ID_tablones = '$idTablon';";
			$numElement =  mysql_query($query, $connexion);
			$numElement =  mysql_result($numElement, 0);
			//insertar nuevo elemento con el numero de elemento correspondiente
			$query = "INSERT INTO tablones_elementos (ID_tablones, ID_elementos, Posicionx, Posiciony, Tamano, Tipo, Contenido) VALUES ('$idTablon','$numElement', '$posicion_x', '$posicion_y', '$tamano', '$tipo','$contenido');";
			mysql_query($query, $connexion);
		desconectarDeBasedeDatos($connexion);

}
function eliminarElemento($idTablon,$element){
		$connexion=conectarBasedeDatos();
		$query = "DELETE FROM tablones_elementos WHERE ID_tablones = '$idTablon' AND ID_elementos ='$element';";
			mysql_query($query, $connexion);
			$query = "SELECT COUNT(*) FROM tablones_elementos WHERE ID_tablones = '$idTablon';
			";
			$numElement =  mysql_query($query, $connexion);
			$numElement =  mysql_result($numElement, 0);

			for ($i=$element; $i < $numElement; $i++) {
				$i2 = $i+1;
				$query = "UPDATE tablones_elementos SET ID_elementos ='$i' WHERE ID_tablones = '$idTablon' AND ID_elementos ='$i2';";
				mysql_query($query, $connexion);
			}
		desconectarDeBasedeDatos($connexion);

}
function editarPosicionElemento($idTablon,$element,$posicion_x,$posicion_y){
		$connexion=conectarBasedeDatos();
			$query = "
			UPDATE tablones_elementos
			SET Posicionx = '$posicion_x', Posiciony = '$posicion_y'
			WHERE ID_tablones = '$idTablon' AND ID_elementos ='$element';
			";
			mysql_query($query, $connexion);
		desconectarDeBasedeDatos($connexion);
}
function editarContenidoElemento($idTablon,$element,$contenido){
		$connexion=conectarBasedeDatos();
			$query = "
			UPDATE tablones_elementos
			SET contenido = '$contenido'
			WHERE ID_tablones = '$idTablon' AND ID_elementos ='$element';
			";
			mysql_query($query, $connexion);

		desconectarDeBasedeDatos($connexion);

}
function obtenerElementosTablon($idTablon){
	$connexion=conectarBasedeDatos();
	$query = "Select ID_elementos,posicionx,posiciony,tamano,tipo,contenido From tablones_elementos where ID_tablones = '$idTablon';";
	$result = mysql_query($query, $connexion);
	desconectarDeBasedeDatos($connexion);
	return $result;
}

function obtenerPrivilegiosTablon($idTablon, $correo){
	$connexion=conectarBasedeDatos();
	$query = "Select Privilegio From usuarios_tablones where ID_tablon = '$idTablon' AND Correo_usuario = '$correo';";
	$result = mysql_query($query, $connexion);
	$privilegio =  mysql_result($result, 0);
	desconectarDeBasedeDatos($connexion);
	return $privilegio;
}
//Invitar a un usuario al tablon, por defecto privilegio 0
function compartirTablon($idTablon, $correo){
	$connexion=conectarBasedeDatos();
	$query = "INSERT INTO usuarios_tablones (Correo_usuario, ID_tablon, Privilegio) VALUES ('$correo', '$idTablon', '0');";
	$result = mysql_query($query, $connexion);
	desconectarDeBasedeDatos($connexion);
}
function agregarTablon($correo){

	$connexion=conectarBasedeDatos();
	$query = "INSERT INTO tablones (Nombre, Descripcion) VALUES ('Tablon', 'Hola');";
	$result = mysql_query($query, $connexion);
	

	$id =  mysql_insert_id();

	$query = "INSERT INTO usuarios_tablones (Correo_usuario, ID_tablon, Privilegio) VALUES ('$correo', '$id', '4');";
	$result = mysql_query($query, $connexion);
	desconectarDeBasedeDatos($connexion);
}

?>