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

/*
Anadir un nuevo elemento a el tablon actual
Parametros:
	idTablon : identificador del tablon donde se anadira
	posicion_x : posicion sobre el eje x, donde se añadira
	posicion_y : posicion sobre el eje y, donde se añadira
	tamano : tamano predefinido del elemento
	tipo : tipo de elemento que se anadira
	nombre : nombre que se le asignara al elemento
	contenido : varaiable que almacenara lo que hay en el elemento
	url : contendra la uniform resource locator, ya sea una imagen o un video
 */
function anadirElemento($idTablon,$posicion_x,$posicion_y,$tamano,$tipo,$nombre,$contenido,$url){
	$connexion=conectarBasedeDatos();
	// Saber elementos hay
	$query = "SELECT COUNT(DISTINCT ID_elementos) FROM tablones_elementos WHERE ID_tablones = '$idTablon';";
	$numElement =  mysql_query($query, $connexion);
	$numElement =  mysql_result($numElement, 0);
	//insertar nuevo elemento con el numero de elemento correspondiente
	$query = "INSERT INTO tablones_elementos (ID_tablones, ID_elementos, Posicionx, Posiciony, Tamano, Tipo, Contenido, Nombre, Url, Papelera) VALUES ('$idTablon','$numElement', '$posicion_x', '$posicion_y', '$tamano', '$tipo','$contenido','$nombre','$url','0');";
	mysql_query($query, $connexion);
	desconectarDeBasedeDatos($connexion);

}

/*
Eliminar un elemento del tablon actual
Parametros:
	idTablon : identificador del tablon donde se eliminara
	element : identificador del elemento a eliminar del tablon
 */
function eliminarElemento($idTablon,$element){
	$connexion=conectarBasedeDatos();
	$query = "DELETE FROM tablones_elementos WHERE ID_tablones = '$idTablon' AND ID_elementos ='$element';";
	mysql_query($query, $connexion);
	$query = "SELECT COUNT(*) FROM tablones_elementos WHERE ID_tablones = '$idTablon';";
	$numElement =  mysql_query($query, $connexion);
	$numElement =  mysql_result($numElement, 0);

	for ($i=$element; $i < $numElement; $i++) {
		$i2 = $i+1;
		$query = "UPDATE tablones_elementos SET ID_elementos ='$i' WHERE ID_tablones = '$idTablon' AND ID_elementos ='$i2';";
		mysql_query($query, $connexion);
	}
	desconectarDeBasedeDatos($connexion);
}

/*
Permite recuperar un elemento de la papelera, a partir de su id 
Parametros:
	idTablon : identificador del tablon de donde se ha borrado el elemento
	element : identificador del elemento que se recuperara de la papelera
Precondicion:
	element : tiene que haber sido previamente eliminado
 */
function recuperarElemento($idTablon,$element){
	$connexion=conectarBasedeDatos();
	$query = "UPDATE tablones_elementos SET Papelera ='0' WHERE ID_tablones = '$idTablon' AND ID_elementos ='$element';";
	mysql_query($query, $connexion);
	desconectarDeBasedeDatos($connexion);
}

/*
Borra todos los elementos eliminados que estan en la papelera
Parametros:
	idTablon : identificador del tablon 
 */
function vaciarPapelera($idTablon){
	$connexion=conectarBasedeDatos();
	$query = "DELETE FROM tablones_elementos WHERE ID_tablones = '$idTablon' AND Papelera = '1';";
	mysql_query($query, $connexion);
	$query = "SELECT ID_elementos FROM tablones_elementos WHERE ID_tablones = '$idTablon' ORDER BY ID_elementos";
	$result = mysql_query($query, $connexion);
	$index = 0;
	while ($row=mysql_fetch_assoc($result)) {
		$id = $row["ID_elementos"];
		$query = "UPDATE tablones_elementos SET ID_elementos ='$index' WHERE ID_tablones = '$idTablon' AND ID_elementos ='$id';";
		$result2 = mysql_query($query, $connexion);
		$index = $index + 1;
	}
	desconectarDeBasedeDatos($connexion);
	header("Location: /public_html/tablon");
}

/*
La funcion permite que un elemento eliminado vaya a la papelera
Prametros:
	idTablon : identificador del tablon
	element : identificador del elemento que sera trasladado a la papelera
 */
function enviarPapelera($idTablon,$element){
	$connexion=conectarBasedeDatos();
	$query = "UPDATE tablones_elementos SET Papelera ='1' WHERE ID_tablones = '$idTablon' AND ID_elementos ='$element';";
	mysql_query($query, $connexion);
	desconectarDeBasedeDatos($connexion);
}

/*
Permite que al mover un elemento se actualize la posicion donde esta
Prametros:
	idTablon : identificador del tablon
	element : identificador del elemento que se movera
	posicion_x : posicion sobre el eje x, donde esta el elemento
	posicion_y : posicion sobre el eje y, donde esta el elemento
 */
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

/*Funcion no implementada en el proyecto, pero si declarada. Permitiria poder modificar elementos ya creados. */
function obtenerElementosTablon($idTablon, $papelera){
	$connexion=conectarBasedeDatos();
	$query = "Select ID_elementos,Posicionx,Posiciony,Tipo,Contenido,Nombre,Url From tablones_elementos where ID_tablones = '$idTablon' AND Papelera = '$papelera';";
	$result = mysql_query($query, $connexion);
	if ($result == null){
		$result = array();
	}
	desconectarDeBasedeDatos($connexion);
	return $result;
}

/*
Permite cargar los elementos de un tablón desde la base de datos.
	idTablon : identificador del tablon
	papelera: Obtendra los elementos que estan en la papelera del tablon
 */
function obtenerPrivilegiosTablon($idTablon, $correo){
	$connexion=conectarBasedeDatos();
	$query = "Select Privilegio From usuarios_tablones where ID_tablon = '$idTablon' AND Correo_usuario = '$correo';";
	$result = mysql_query($query, $connexion);
	$privilegio =  mysql_result($result, 0);
	desconectarDeBasedeDatos($connexion);
	return $privilegio;
}

/*
Invitar a un usuario al tablon, por defecto se le da privilegio 0.
	idTablon : identificador del tablon
	correo: correo que identifica a un usuario al que invitar
	privilegio: por defect sera 0, aunque se puede modificar.
*/
function compartirTablon($idTablon, $correo){
	$connexion=conectarBasedeDatos();
	/*
	$query = "SELECT pass From Tablones where ID_tablon = '$idTablon';";
	$result = mysql_query($query, $connexion);
	$codigo = mysql_result($result, 0);
			$subject = "Corcholis";
    		$message = "Hola, ha compartido un tablon contigo, para acceder a el utiliza este link: http://localhost/public_html/shared.php <br>\n Introduce el codigo=".$codigo."";
    		$headers = "From:" . "projectlis15@gmail.com";
    		mail($correo,$subject,$message,$headers);
	*/
	$query = "INSERT INTO usuarios_tablones (Correo_usuario, ID_tablon, Privilegio) VALUES ('$correo', '$idTablon', '0');";
	mysql_query($query, $connexion);
	desconectarDeBasedeDatos($connexion);
}

/*
Genera una contrasena encriptada, a partir de la puesta por el usuario.
	longitud : longitud que tiene que tener la contraseña
 */
function generar_password($longitud){
  $caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789';
  $password = '';
  for ($i=0; $i<$longitud; $i++) {
  	$password .= substr($caracteres,rand(0,61), 1);
  }
  return $password;
}

function deleteboard($idTablon) {
	$connexion=conectarBasedeDatos();
	$query = "DELETE FROM tablones_elementos WHERE ID_tablones ='$idTablon';";
	mysql_query($query, $connexion);
	$query = "DELETE FROM usuarios_tablones WHERE ID_tablon ='$idTablon';";
	mysql_query($query, $connexion);
	$query = "DELETE FROM tablones WHERE ID ='$idTablon';";
	mysql_query($query, $connexion);
	desconectarDeBasedeDatos($connexion);
}

/*
Permite agregar un nuevo tablon, se nos pedira datos como el nombre o la descripcion.
	nombre : nombre del tablon
	descripcion: breve texto sobre el tablon
	url: direccion url que tendra el tablon
	correo: correo que identifica al propietario del tablon
 */
function agregarTablon($correo, $nombre, $descripcion, $url){
	$connexion=conectarBasedeDatos();
	$codigovalido = 0;

	while($codigovalido != 1){
		$pass = generar_password(8);
		$query = "SELECT 1 From tablones Where pass = '$pass';";
		$passvalida = mysql_query($query, $connexion);

		$num_rows = mysql_num_rows($passvalida);
		if($num_rows == 1) {
			$codigovalido = 0;
		}
		else{
			$codigovalido = 1;
		}
	}

	$query = "INSERT INTO `tablones`(`ID`, `Nombre`, `Descripcion`, `Pass`, `Url`) VALUES ('0','$nombre','$descripcion','$pass', '$url')";
	
	$result = mysql_query($query, $connexion);
	
	$id =  mysql_insert_id();

	$query = "INSERT INTO usuarios_tablones (Correo_usuario, ID_tablon, Privilegio) VALUES ('$correo', '$id', '4');";
	$result = mysql_query($query, $connexion);
	desconectarDeBasedeDatos($connexion);
}

/*
Permite cargar los usuarios que comparten un tablon.
	idTablon : identificador del tablon
 */
function obtenerUsuariosTablon($idTablon){
	$connexion=conectarBasedeDatos();
	$query = "Select Correo_usuario, Privilegio From usuarios_tablones where ID_tablon = '$idTablon';";
	$usuarios = mysql_query($query, $connexion);
	desconectarDeBasedeDatos($connexion);
	return $usuarios;
}

/*
Funcion que da la posibilidad al propietario o administrador d eun tablon dar privilegios a los otros usuarios
	idTablon : identificador del tablon
	correo: correo que identifica a los usuarios
	privilegio: numero que define uno de los privilegios posibles
 */
function modificarPrivilegios($idTablon, $correo, $privilegio){
	$connexion=conectarBasedeDatos();
	$query = "REPLACE INTO usuarios_tablones (Correo_usuario, ID_tablon, Privilegio) VALUES ('$correo', '$idTablon', '$privilegio');";
	$result = mysql_query($query, $connexion);
	desconectarDeBasedeDatos($connexion);
}

/*
Carga en la pantalla home los diferentes tablones que tiene un propietario.
	correo: correo que identifica al usuario
 */
function cargarTablones($correo){
	$connexion=conectarBasedeDatos();
	$query = "SELECT * from usuarios_tablones group by ID_tablon having count(ID_tablon) = 1 and Correo_usuario = '$correo';";
	$result = mysql_query($query, $connexion);
	$i = 0;
	$array = array();
	while ($row=mysql_fetch_assoc($result)) {
		$id = $row["ID_tablon"];
		$query = "SELECT * from tablones WHERE ID = '$id';";
		$result2 = mysql_query($query, $connexion);
		$row2=mysql_fetch_assoc($result2,0);
		$array[$i][0] = $row2["Nombre"];
		$array[$i][1] = $row2["Descripcion"];
		$array[$i][2] = $row2["ID"];
		$array[$i][3] = $row2["Pass"];
		$array[$i][4] = $row2["Url"];
		$i = $i + 1;
	}
	desconectarDeBasedeDatos($connexion);
	return $array;
}

/*
Carga en la pantalla home los diferentes tablones que tiene un usuarios que sean compartidos
	correo: correo que identifica al usuario
 */
function cargarTablonesComp($correo){
	$connexion=conectarBasedeDatos();
	$query = "SELECT * from usuarios_tablones WHERE Correo_usuario = '$correo';";
	$result = mysql_query($query, $connexion);
	$i = 0;
	$array = array();
	while ($row=mysql_fetch_assoc($result)) {
		$id = $row["ID_tablon"];
		$query = "SELECT * from usuarios_tablones WHERE ID_tablon = '$id' group by ID_tablon having count(ID_tablon) > 1;";
		$result2 = mysql_query($query, $connexion);
		while ($row2=mysql_fetch_assoc($result2)){
			$id = $row2["ID_tablon"];
			$query = "SELECT * from tablones WHERE ID = '$id';";
			$result3 = mysql_query($query, $connexion);
			$row3=mysql_fetch_assoc($result3,0);
			$array[$i][0] = $row3["Nombre"];
			$array[$i][1] = $row3["Descripcion"];
			$array[$i][2] = $row3["ID"];
			$array[$i][3] = $row3["Pass"];
			$array[$i][4] = $row3["Url"];
			$i = $i + 1;
		}
	}
	desconectarDeBasedeDatos($connexion);
	return $array;
}

function getID($pass){
	$connexion=conectarBasedeDatos();
	$query = "SELECT ID from tablones WHERE Pass = '$pass';";
	$result = mysql_query($query, $connexion);
	$result = mysql_result($result,0);
	return $result;
}

function getInfoUsuario($correo){
	$connexion=conectarBasedeDatos();
	$query = "SELECT * from usuarios WHERE Correo = '$correo';";
	$result = mysql_query($query, $connexion);
	$array = array();
	$row = mysql_fetch_assoc($result, 0);
	$array[0] = $row["Nombre"];
	$array[1] = $row["Nacimiento"];
	$array[2] = $row["Provincia"];
	desconectarDeBasedeDatos($connexion);
	return $array;
}
function getInfoTablon($idTablon){
	$connexion=conectarBasedeDatos();
	$query = "SELECT * from tablones WHERE ID = '$idTablon';";
	$result = mysql_query($query, $connexion);
	$array = array();
	$row = mysql_fetch_assoc($result, 0);
	$array[0] = $row["Nombre"];
	$array[1] = $row["Descripcion"];
	$array[2] = $row["Pass"];
	desconectarDeBasedeDatos($connexion);
	return $array;
}
?>