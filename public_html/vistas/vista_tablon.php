<body>
	<div id="container">
	<!-- Barra inicial de la WEB que nos permite Registrarnos, Logearnos o Cerrar Session-->
		<div id="header">
			<div id="container_logo">
				<a href="">
					<img src="static/img/logo_provisional.png" alt="Logo">
				</a>
	    	</div>
	    	<div id="container_login">
	    		<ul class="lista_horizontal_tablon">
                    <li id = 'homeIcon' class="hvr-rotate">
                        <a>
                            <div class="elemento_menu">
                                <img src="static/img/icono_home.png">
                            </div>
                        </a>
                    </li>
                    <li id = 'username' class="hvr-rotate">
                        <a>
	                        <div class="elemento_menu">
	                            <img src="static/img/icono_usuario.png">
	                        </div>
                        </a>
                    </li>
	    		</ul>
	    	</div>
	    	<div id="container_login">
	    		<ul class="lista_horizontal_tablon">
                    <li id = 'nombre_tablon' class="hvr-rotate">
                        <a>
	                        <div class="elemento_menu">
	                            <img src="">
	                        </div>
                        </a>
                    </li>
                    <?php
                        $privilegio = obtenerPrivilegiosTablon(1,"pere@gmail.com");
                        //echo $privilegio;
                        if ($privilegio > 0){
                    ?>
                    <li id = 'div_anadir' class="hvr-rotate">
                        <a>
	                        <div class="elemento_menu">
	                            <img src="static/img/icono_anadir_elemento.png">
	                        </div>
                        </a>
                    </li>
                    <?php 
                        }
                    ?>
                    <li id = 'div_papelera' class="hvr-rotate">
                        <a>
	                        <div class="elemento_menu">
	                            <img src="static/img/icono_papelera.png">
	                        </div>
                        </a>
                    </li>
                    <?php
                        //echo $privilegio;
                        if ($privilegio > 2){
                    ?>
                    <li id = 'div_compartir' class="hvr-rotate">
                        <a>
	                        <div class="elemento_menu">
	                            <img src="static/img/icono_compartir.png">
	                        </div>
                        </a>
                    </li>
                    <?php 
                        }
                        if ($privilegio > 3){
                    ?>
                    <li id = 'div_configurar' class="hvr-rotate">
                        <a>
	                        <div class="elemento_menu">
	                            <img src="static/img/icono_configuracion.png">
	                        </div>
                        </a>
                    </li>
                    <?php
                    }
                    ?>
	    		</ul>
	    	</div>
		</div>
		<div id="content_tablon">
			<div id="anadir_elemento">
                <div id="anadir_elemento_seleccion" class="form-style-1-heading">
                    <div id="elemento_seleccion_texto" class="elemento_seleccion" class="movedown"><img src="static/img/anadir_nota.png"></div>
                    <div id="elemento_seleccion_imagen" class="elemento_seleccion"><img class="movedown " src="static/img/anadir_imagen.png"></div>
                    <div id="elemento_seleccion_video" class="elemento_seleccion"><img class="movedown" src="static/img/anadir_video.png"></div>
                </div>
                <form id="formulario_nota">
                	<ul class="form-style-1">
                        <li>
                            <label>Nombre</label>
                            <input id="nombre_nota" type="text" class="field-long"/>
                        </li>
                        <li>
                            <label>Contenido</label>
                            <textarea id="contenido_nota" class="field-long field-textarea"></textarea>
                        </li>
                        <li>
                            <input class="aceptar" type="button" value='Añadir' onclick="addElement_note()">
                        </li>
                    </ul>
                </form>
                <form id="formulario_imagen">
                    <ul class="form-style-1">
                        <li>
                            <label>Nombre</label>
                            <input id="nombre_imagen" type="text" class="field-long"/>
                        </li>
                        <li>
                            <label>Descripción</label>
                            <input id="descripcion_imagen" type="text" class="field-long"/>
                        </li>
                        <li>
                            <label>URL Imagen</label>
                            <input id="url_imagen" type="text" class="field-long"/>
                        </li>
                        <li>
                            <label>Destacar elemento </label>
                            <input type ='checkbox' value = 'Destacar'>
                        </li>
                        <li>
                            <input class="aceptar" type="button" value='Añadir' onclick="addElement_image()">
                        </li>
                    </ul>
                </form>
                <form id="formulario_video">
                    <ul class="form-style-1">
                        <li>
                            <label>Nombre</label>
                            <input id="nombre_video" type="text" class="field-long"/>
                        </li>
                        <li>
                            <label>Descripción</label>
                            <input id="descripcion_video" type="text" class="field-long"/>
                        </li>
                        <li>
                            <label>URL Imagen</label>
                            <input id="url_video" type="text" class="field-long"/>
                        </li>
                        <li>
                            <label>Destacar elemento </label>
                            <input type ='checkbox' value = 'Destacar'>
                        </li>
                        <li>
                            <input class="aceptar" type="button" value='Añadir' onclick="addElement_video()">
                        </li>
                    </ul>
                </form>
           	</div>
           	<div id="compartir_tablon">
           		<div id="compartir_tablon_header" class="form-style-1-heading">
           			<img src="static/img/compartir_tablon.png"></img>
           		</div>
                <form id="formulario_invitar">
                    <ul class="form-style-1">
                    	<li>
                        	<label>Correo</label>
                    	</li>
                    	<li>
                        	<input id='correo' type="text" class="field-long" placeholder="example@domain.com"/>
                    	</li>
                    	<li>
                        	<input class="aceptar" type="button" value='Invitar' onclick="addUser(1,correo.value)"/>
                    	</li>
                    </ul>
                </form>
	        </div>



			<div id="board">
	            <div id="marco_tablon">
	                <div id='container_tablon'>

	                    <div id="nota" class = "elem" style = 'display: none;' onmousedown='mydragg.startMoving(this);' onmouseup='mydragg.stopMoving(this);'>
	                        <div>
	                            <pre>changethenote</pre>
	                        </div>
	                        <div style = 'width: 64px; height: 20px; margin: auto;'>
	                            <div class ="square" id ="redSquare" onclick="cambiar_fondo(this, 1);"></div>
	                            <div class ="square" id ="deleteSquare" onclick="deleteElement(this);"></div>
	                            <div class ="square" id ="editSquare" onclick="editElement(this);"></div>
	                        </div>
	                    </div>

	                    <div id="imagen" class = "elem" style = 'display: none;' onmousedown='mydragg.startMoving(this);' onmouseup='mydragg.stopMoving(this);'>
	                        <div>
	                            <pre><b><center>titulo</center></b></pre>
	                        </div>
	                        <img src = "url" style = 'width: 200px; height: auto'>
	                        <div>
	                            <pre>descripcion</pre>
	                        </div>  
	                        <div style = 'width: 64px; height: 20px; margin: auto;'>
	                            <div class ="square" id ="deleteSquare" onclick="deleteElement(this);"></div>
	                            <div class ="square" id ="editSquare" onclick="editElement(this);"></div>
	                        </div>  
	                    </div>

	                    <div id="video" class = "elem" style = 'display: none;' onmousedown='mydragg.startMoving(this);' onmouseup='mydragg.stopMoving(this);'>
	                        <div>
	                            <pre><b><center>titulo</center></b></pre>
	                        </div>
	                        <iframe width='200' src = "url" allowfullscreen>
	                        </iframe>
	                        
	                        
	                        <div>
	                            <pre>descripcion</pre>
	                        </div>
	                        <div style = 'width: 64px; height: 20px; margin: auto;'>
	                            <div class ="square" id ="deleteSquare" onclick="deleteElement(this);"></div>
	                            <div class ="square" id ="editSquare" onclick="editElement(this);"></div>
	                        </div>    
	                    </div>

	                    <?php
	                    $result = obtenerElementosTablon(1);
	                    while($row=mysql_fetch_assoc($result)) {
	                        $elem = $row["ID_elementos"];
	                        echo 
	                        '<div id="elem'. $elem . '" class = "elem" style="width: 200px;height: 100px;left: ' . $row["posicionx"] .'px; top: ' . $row["posiciony"] .'px;" onmousedown="mydragg.startMoving(this);" onmouseup="mydragg.stopMoving(this);">
	                            ' . $row["contenido"] . '
	                        </div>';}
	                        ?>
	                   
	                </div>
	            </div>
	            
	            <div id="administrar">
	                
	                    <table class="sorteable">
	                        <?php
	                        $usuarios = obtenerUsuariosTablon(1);
	                        while($fila=mysql_fetch_array($usuarios)){ ?>
	                            <tr><td>
	                                <?php echo $fila['Correo_usuario']; ?>
	                            </td><td>
	                                <?php echo $fila['Privilegio']; ?> 
	                            </td><td>
	                            <form  method= "post" action="controladores/controlador_tablon.php" class="vertical"><?php if($fila['Privilegio']<4){ ?>
	                                <input name="priv" id="priv" type="number"/> <?php } ?>
	                                <input name="action" id="action" type="hidden" value="ADMIN"/>
	                                <input name="correo" id="correo" type="hidden" value="<?php echo $fila['Correo_usuario']; ?>"/>
	                                <input name="id_tablon" id="id_tablon" type="hidden" value="1"/>
	                            </form></td></tr>
	                        <?php   
	                        }
	                        ?>
	                    </table>
	            </div>
	        </div><!--Cierra board -->
		</div>
</body>