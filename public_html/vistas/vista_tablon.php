<body>
	<div id="container">
	<!-- Barra inicial de la WEB que nos permite Registrarnos, Logearnos o Cerrar Session-->
		<div id="header">
			<div id="container_logo">
				<a href="">
					<img src="../static/img/logo_provisional.png" alt="Logo">
				</a>
	    	</div>
	    	<div id="container_login" >
	    		<ul class="lista_horizontal_tablon">
                    <li id = 'homeIcon' class="hvr-rotate" title="Home">
                        <a href="/public_html/home">
                            <div class="elemento_menu">
                                <img src="../static/img/icono_home.png" >
                            </div>
                        </a>
                    </li>
                    <li id = 'username' class="hvr-rotate" title="Perfil de usuario">
                        <a>
	                        <div class="elemento_menu">
	                            <img src="../static/img/icono_usuario.png" >
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
                        $privilegio = obtenerPrivilegiosTablon($curtablon,$correo);
                        //echo $privilegio;
                        if ($privilegio > 0){
                    ?>
                    <li id = 'div_anadir' class="hvr-rotate" title="Añadir elemento">
                        <a>
	                        <div class="elemento_menu">
	                            <img src="../static/img/icono_anadir_elemento.png"> 
	                        </div>
                        </a>
                    </li>
                    <li id = 'div_papelera' class="hvr-rotate" title="Papelera">
                        <a>
	                        <div class="elemento_menu">
	                            <img src="../static/img/icono_papelera.png" >
	                        </div>
                        </a>
                    </li>
                     <?php }
                        //echo $privilegio;
                        if ($privilegio > 2){
                    ?>
                    <li id = 'div_compartir' class="hvr-rotate" title="Compartir tablón">
                        <a>
	                        <div class="elemento_menu">
	                            <img src="../static/img/icono_compartir.png">
	                        </div>
                        </a>
                    </li>
                    <?php 
                        }
                    ?>
                     <li id = 'div_permisos' class="hvr-rotate" title="Permisos">
                        <a>
                            <div class="elemento_menu">
                                <img src="../static/img/icono_permisos.png">
                            </div>
                        </a>
                    </li>

                    <?php
                        if ($privilegio > 3){
                    ?>
                    <li id = 'div_configurar' class="hvr-rotate" title="Configuración">
                        <a>
	                        <div class="elemento_menu">
	                            <img src="../static/img/icono_configuracion.png">
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
                    <div id="elemento_seleccion_texto" class="elemento_seleccion"><img src="../static/img/anadir_nota.png"></div>
                    <div id="elemento_seleccion_imagen" class="elemento_seleccion"><img src="../static/img/anadir_imagen.png"></div>
                    <div id="elemento_seleccion_video" class="elemento_seleccion"><img src="../static/img/anadir_video.png"></div>
                </div>
                <form id="formulario_nota">
                    <div class="form-style-1-heading">
                            <p>Añadir nota</p>
                    </div>
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
                            <input class="aceptar pointer" type="button" value='Añadir' onclick="addElement_note()">
                        </li>
                    </ul>
                </form>
                <form id="formulario_imagen">
                    <div class="form-style-1-heading">
                            <p>Añadir imagen</p>
                        </div>
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
                            <input class="aceptar pointer" type="button" value='Añadir' onclick="addElement_image()">
                        </li>
                    </ul>
                </form>
                <form id="formulario_video">
                     <div class="form-style-1-heading">
                            <p>Añadir video</p>
                        </div>
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
                            <input class="aceptar pointer" type="button" value='Añadir' onclick="addElement_video()">
                        </li>
                    </ul>
                </form>
           	</div>
           	<div id="compartir_tablon">
           		<div id="compartir_tablon_header" class="form-style-1-heading">
           			<img src="../static/img/compartir_tablon.png"></img>
           		</div>
                <form id="formulario_invitar">
                    <div class="form-style-1-heading">
                            <p>Compartir tablón</p>
                    </div>
                    <ul class="form-style-1">
                    	<li>
                        	<label>Correo</label>
                    	</li>
                    	<li>
                        	<input id='correo' type="text" class="field-long" placeholder="example@domain.com"/>
                    	</li>
                    	<li>
                        	<input class="aceptar pointer" type="button" value='Invitar' onclick="addUser(1,correo.value)"/>
                    	</li>
                    </ul>
                </form>
	        </div>
			<div id="papelera">
				<div id="papelera_header" class="form-style-1-heading">
                    <img src="../static/img/papelera.png"></img>
                </div>
				<form id="formulario_papelera">	
                    <div class="form-style-1-heading">
                            <p>Papelera</p>
                    </div>
				<ul class="form-style-1">
					<?php 
					$elementos = obtenerElementosTablon($curtablon,0);
					$i = 0;
					while($fila=mysql_fetch_array($elementos)){
						$idElem = $fila['ID_elementos'];
						$i = $i+1;?>
					<li>
						<label>Nombre:&nbsp;&nbsp;<p><?php echo $fila['Nombre']; ?></p></label>
                        <label>Fecha de eliminación:&nbsp;&nbsp;<p> 8 May, 2015</p></label>
						<input class="pointer" type="button" value="Eliminar" name="eliminar" id="eliminar" onclick="deleteElement(1,<?php echo "'$idElem'"; ?>)"/>
						<input class="pointer" type="button" value="Recuperar" name="recuperar" id="recuperar" onclick="recoverElement(1,<?php echo "'$idElem'"; ?>)"/>
					</li>
					<?php } if ($i >= 1){ ?>
					<li class="footer_papelera">
					   <input class="pointer" type= "button" value='Vaciar papelera' onclick="emptyTrash(1)"/>
					</li>
					<?php }else if($i < 1){?>
                    <li class="footer_papelera">
                        <label>La papelera se encuentra vacía</label>
                    </li>
                    <?php
                    };?>
				</ul>		
				</form>
			</div>	


			<div id="board">
	            <div id="marco_tablon">
	                <div id='container_tablon'>
                        <!-- Elemento del tipo video-->
                        <div class="container_video" onmousedown='mydragg.startMoving(this);' onmouseup='mydragg.stopMoving(this);'>
                            <div class="elemento_tablon_titulo">
                                <h5>The Witcher 3: Gameplay Trailer </h5>
                            </div>
                            <iframe width="300" height="156" src="https://www.youtube.com/embed/nYwe_WHARdc?autoplay=0&showinfo=0&controls=2&autohide=1" frameborder="0" allowfullscreen></iframe>
                        </div>
                        <!--Elemento del tipo nota-->
                        <div class="container_nota" onmousedown='mydragg.startMoving(this);' onmouseup='mydragg.stopMoving(this);'>
                            <div class="elemento_tablon_nota" >
                                <h5>Este es el título de una nota</h5>
                            </div>
                        </div>
                        <!--Elemento del tipo imagen-->
                        <div class="container_imagen" onmousedown='mydragg.startMoving(this);' onmouseup='mydragg.stopMoving(this);'>
                            <div class="elemento_tablon_titulo">
                                <h5>Imagen valle</h5>
                            </div>
                            <img class="elemento_tablon_imagen" src="http://borkurart.com/media/images/df_mountains.jpg">
                        </div>

	                    <div id="sample" style = 'display: none;' onmousedown='mydragg.startMoving(this);' onmouseup='mydragg.stopMoving(this);'>
	                    </div>

	                    <?php
	                    $result = obtenerElementosTablon($curtablon,0);
	                    while($row=mysql_fetch_assoc($result)) {
	                        $elem = $row["ID_elementos"];
                            if ($row["Tipo"] == 'Texto'){
                                $class = 'elemento_tablon_2';
                            }
                            else {
                                $class = 'elemento_tablon';
                            }
	                        echo 
	                        '<div id="elem'. $elem . '" class = "' . $class . '" style="left: ' . $row["Posicionx"] .'px; top: ' . $row["Posiciony"] .'px;" onmousedown="mydragg.startMoving(this);" onmouseup="mydragg.stopMoving(this);">
                                <p>' . $row["Contenido"] . '</p>
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