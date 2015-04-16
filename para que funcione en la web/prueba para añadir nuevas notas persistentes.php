<!DOCTYPE html>
<html>
<head>
<title>CorchoLIS</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF8" /> 
<link rel="stylesheet" href="static/css/style.css" type="text/css"> 
<link rel="stylesheet" href="static/css/kickstart.css" media="all" /> <!-- KICKSTART -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="../static/js/openTablones.js"></script>
<script src="../static/js/functionDrag.js"></script>
<script src="../static/js/boardFunctions.js"></script>
<link href="../static/css/boardstyle.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">
<script src="../static/js/kickstart.js"></script> <!-- KICKSTART -->
<script type="text/javascript" src="../static/js/openLogin.js"></script>
<script type="text/javascript" src="../static/js/validacion_registro.js"></script>
</head>
<body>
<div id= "body">  
    

        <div id='container'>

            <div id="elem0" class = "elem" style = 'display: none;' onmousedown='mydragg.startMoving(this);' onmouseup='mydragg.stopMoving(this);'>
                <div>
                    <pre>changethenote</pre>
                </div>
                <div style = 'width: 100px; height: 20px; margin: auto;'>
                    <div class ="square" id ="redSquare" onclick="cambiar_fondo(this, 1);"></div>
                    <div class ="square" id ="greenSquare" onclick="cambiar_fondo(this, 2);"></div>
                    <div class ="square" id ="blueSquare" onclick="cambiar_fondo(this, 3);"></div>
                    <div class ="square" id ="deleteSquare" onclick="deleteElement(this);"></div>
                    <div class ="square" id ="editSquare" onclick="editElement(this);"></div>
                </div>
            </div>
            <?php
            $mysql_host = "mysql3.000webhost.com";
            $mysql_database = "a4703405_bd";
            $mysql_user = "a4703405_lis";
            $mysql_password = "caca12";
                    
            $conn = mysql_connect($mysql_host, $mysql_user, $mysql_password);
            mysql_select_db($mysql_database, $conn);
            mysql_set_charset('utf8',$conn);
            $query = "Select ID_elementos,posicionx,posiciony,tamano,tipo,contenido From tablones_elementos where ID_tablones = '1';";
            $result = mysql_query($query, $conn);

            while($row=mysql_fetch_assoc($result)) {
                $elem = $row["ID_elementos"] + 1;
                echo 
                '<div id="elem'. $elem . '" class = "elem" style="width: 200px;height: 100px;left: ' . $row["posicionx"] .'px; top: ' . $row["posiciony"] .'px;" onmousedown="mydragg.startMoving(this);" onmouseup="mydragg.stopMoving(this);">
                    <div>
                        <pre>' . $row["contenido"] . '</pre>
                    </div>
                    <div id = "squareContainer" style = "width: 100px; height: 20px; margin: auto;">
                        <div class ="square" id ="redSquare" onclick="cambiar_fondo(this, 1);"></div>
                        <div class ="square" id ="greenSquare" onclick="cambiar_fondo(this, 2);"></div>
                        <div class ="square" id ="blueSquare" onclick="cambiar_fondo(this, 3);"></div>
                        <div class ="square" id ="deleteSquare" onclick="deleteElement(this);"></div>
                        <div class ="square" id ="editSquare" onclick="editElement(this);"></div>
                    </div>
                </div>';
            }
            mysql_close($conn);
            ?>
        </div>
        <input id='new' type="text" style='width:320px' name="yt">
        <input type="submit" value='Añade nota nueva' onclick="addElement()">
    </div>
</div>
</body>