<!DOCTYPE html>
<html lang="es">
<head></head>
<body>			
	<?php
		/*
		// Conexion a BD
		$servername = 'localhost';
		$username = "tdiw-a10";
		$password = "fbXFqbbON0";
		
		$conn = mysql_connect($servername, $username, $password);
		mysql_select_db('tdiw-a10', $conn);
		*/
		// Conexion a BD
		$mysql_host = "mysql3.000webhost.com";
		$mysql_database = "a4703405_bd";
		$mysql_user = "a4703405_lis";
		$mysql_password = "caca12";
		
		$conn = mysql_connect($mysql_host, $mysql_user, $mysql_password);
		mysql_select_db($mysql_database, $conn);
		mysql_set_charset('utf8',$conn);
		
		/*
		// variables que pueden variar
		$positionX = $_POST["positionX"];
		$positionY = $_POST["positionY"];
		$width = $_POST["width"];
		$height = $_POST["height"];
		$type = $_POST["type"];
		$content = $_POST["content"];
		//variables que NO pueden variar
		$element = $_POST["element"];
		$board = $_POST["board"];
		*/
		//variables recibidas por el formulario
		$idTablon = $_POST["idTablon"];
		$posicion_x = $_POST["posicion_x"];
		$posicion_y = $_POST["posicion_y"];
		$tamano = $_POST["tamano"];
		$tipo = $_POST["tipo"];
		$contenido = $_POST["contenido"];
		$action =  $_POST["action"];			
			
		// updatear elementos
		if ($action == 'UPDATE'){
			$query = "
			UPDATE elementos_Tablon
			SET positionX = '$positionX', positionY = '$positionY', width = '$width', height = '$height', type = '$type', content = '$content'
			WHERE board= '$board' AND element ='$element';
			";
		}

		//crear nuevos elementos
		if ($action = 'INSERT'){
			// Saber elementos hay
			$query = "
			SELECT COUNT(*)
			FROM tablones_elementos
			WHERE ID_tablones = '$idTablon';
			";
			$numElement =  mysql_query($query, $conn);
			$numElement = mysql_result($numElement, 0);
			console.log($numElement);
			$idTablon = 1;
			//insertar nuevo elemento con el numero de elemento correspondiente
			$query = "
			INSERT INTO tablones_elementos (ID_tablones, ID_elementos, Posicionx, Posiciony, Tamano, Tipo, Contenido)
			VALUES ('$idTablon','$numElement', '$posicion_x', '$posicion_y', '$tamano', '$tipo','$contenido');
			";
			$result = mysql_query($query, $conn);
		}
	
		//borrar elementos
		if ($action = 'DELETE'){
			$query = "
			DELETE FROM Elementos_Tablon
			WHERE  board = '$board' AND element = '$element';
			";
		}
	?>
</body>
</html>