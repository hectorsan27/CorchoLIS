<body>
	<div id="container">
	<!-- Barra inicial de la WEB que nos permite Registrarnos, Logearnos o Cerrar Session-->
		<div id="header">
			<div id="container_logo">
				<a href="/public_html/">
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
                    <li id = 'div_username' class="hvr-rotate" title="Perfil de usuario">
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
	    		</ul>
	    	</div>
		</div>
		<div id="content_tablon">
            <!--Formularios menus-->
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
                            <label>URL Vídeo</label>
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
				    <ul id = 'ulPapelera' class="form-style-1">
                        <?php 
                        $elementos = obtenerElementosTablon($curtablon,1);
                        $i = 0;
                        while($fila=mysql_fetch_array($elementos)){
                        $idElem = $fila['ID_elementos'];
						$i = $i+1;?>
    					
                        <li id = 'li<?php echo $idElem ?>' class = 'liPapelera'>
    						<label>Nombre:&nbsp;&nbsp;<p><?php echo $fila['Nombre']; ?></p></label>
                            <label>Fecha de eliminación:&nbsp;&nbsp;<p> 8 May, 2015</p></label>
    						<input class="pointer" type="button" value="Eliminar" name="eliminar" id="eliminar" onclick="eliminarElemento(<?php echo "'$curtablon'"; ?>, this)"/>
    						<input class="pointer" type="button" value="Recuperar" name="recuperar" id="recuperar" onclick="recuperaElemento(<?php echo "'$curtablon'"; ?>, this)"/>
                            <?php
                                if ($fila['Tipo'] == 'Texto'){
                                    echo "<div style = 'display: none;' class = 'note'></div>";
                                }
                                else{
                                    if ($fila['Tipo'] == 'Imagen'){
                                        echo "<div style = 'display: none;' class = 'img'>" . $fila['Url'] . "</div>";
                                    }
                                    else{
                                        echo "<div style = 'display: none;' class = 'video'>" . $fila['Url'] . "</div>";
                                    }
                                }    
                            ?>
    					</li>

    					<?php } if ($i >= 1){ ?>
    					<li class="footer_papelera">
    					   <input class="pointer" type= "button" value='Vaciar papelera' onclick="emptyTrash(<?php echo "'$curtablon'"; ?>)"/>
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
			<div id="username">
           		<div id="username_tablon_header" class="form-style-1-heading">
           			<img src="../static/img/compartir_tablon.png"></img>
           		</div>
                <form id="formulario_username">
                    <div class="form-style-1-heading">
                            <p>Perfil de usuario</p>
                    </div>
                    <ul class="form-style-1">
                    	<li>
                        	<label>Nombre:&nbsp;&nbsp;</label><p><?php echo $infoUsuario[0]; ?></p>
                    	</li>
						<li>
                        	<label>Correo:&nbsp;&nbsp;</label><p><?php echo $correo; ?></p>
                    	</li>
                    	<li>
                        	<label>Nacimiento:&nbsp;&nbsp;</label><p><?php echo $infoUsuario[1]; ?></p>
                    	</li>
						<li>
                        	<label>Província:&nbsp;&nbsp;</label><p><?php echo $infoUsuario[2];?></p>
                    	</li>
                    </ul>
                </form>
	        </div>
			<div id="permisos">
				<div id="permisos_header" class="form-style-1-heading">
                    <img src="../static/img/permisos.png"></img>
                </div>
					<form id="formulario_permisos" method= "post" action="controladores/controlador_tablon.php">
						<div class="form-style-1-heading">
							<p>Usuarios</p>
						</div>
						<ul class="form-style-1">
	                        <?php
	                        $usuarios = obtenerUsuariosTablon($curtablon);
							$i = 0;
	                        while($fila=mysql_fetch_array($usuarios)){ ?>
							<li>
								<label>Usuario:</label>
                                <p><?php echo $fila['Correo_usuario']; ?></p>
								<?php if ($privilegio > 2) {?>
									<label>Privilegio: </label>
									<select class="select_permisos field-select" name="perm_privilegio[<?php echo $i; ?>]" id="perm_privilegio">
										<option selected="selectd" value='<?php echo $fila['Privilegio']; ?>'>
											<?php 
											if ($fila['Privilegio'] == 0){
												echo "Viewer";
											}else if ($fila['Privilegio'] == 1){
												echo "Publisher";
											}else if ($fila['Privilegio'] == 3){
												echo "Admin";
											}else if ($fila['Privilegio'] == 4){
												echo "Owner";
											} ?></option>
										<?php 
											if ($fila['Privilegio'] != 0){ ?>
										<option value='0'>Viewer</option> <?php } ?>
										<?php 
											if ($fila['Privilegio'] != 1){ ?>
										<option value='1'>Publisher</option> <?php } ?>
										<?php 
											if ($fila['Privilegio'] != 3){ ?>
										<option value='3'>Admin</option> <?php } ?>
										<?php 
											if ($fila['Privilegio'] != 4){ ?>
										<option value='4'>Owner</option> <?php } ?>
									</select>
									
	                                <input name="correo[<?php echo $i; ?>]" id="correo" type="hidden" value="<?php echo $fila['Correo_usuario']; ?>"/>
									
								</li>
								<?php } ?></tr>
	                        <?php   
	                        $i = $i + 1;
							} ?>
							<li>
								<?php if ($privilegio > 2) {?>
								<input name="confirmar" id="confirmar" type="button" value="Confirmar" onclick="
								<?php 
									$j = 0;
									while ($j<$i) { ?>
										configPerm(<?php echo $curtablon; ?>, correo[<?php echo $j; ?>].value, perm_privilegio[<?php echo $j; ?>].value);
										<?php 
										$j = $j + 1;
										} ?>
								"/>	
								<?php } ?>
							</li>
						</ul>
					</form>
	            </div>
            <!--Tablon-->
			<div id="board">
	            <div id="marco_tablon">
                    <div id="banner_tablon"><?php echo $infoTablon[0];?></div>
	                <div id='container_tablon'>
	                    <div id="sample" style = 'display: none;' onmousedown='mydragg.startMoving(this);' onmouseup='mydragg.stopMoving(this);'>
                            <li id= 'sampleLi'>
                                <label>Nombre:&nbsp;&nbsp;<p> </p></label>
                                <label>Fecha de eliminación:&nbsp;&nbsp;<p> 8 May, 2015</p></label>
                                <input class="pointer" type="button" value="Eliminar" name="eliminar" id="eliminar" onclick="eliminarElemento(<?php echo "'$curtablon'"; ?>, this)"/>
                                <input class="pointer" type="button" value="Recuperar" name="recuperar" id="recuperar" onclick="recuperaElemento(<?php echo "'$curtablon'"; ?>, this)"/>
                                <div style = 'display: none;'></div>
                            </li>
                            <li id = 'sampleInput'>
                                <input class="pointer" type= "button" value='Vaciar papelera' onclick="emptyTrash(<?php echo "'$curtablon'"; ?>)"/>
                            </li>
	                    </div>

	                    <?php
	                    $result = obtenerElementosTablon($curtablon,0);
	                    while($row=mysql_fetch_assoc($result)) {
                            if ($row["Tipo"] == 'Texto'){
                                echo 
                                '<div id="elem' . $row["ID_elementos"] . '" class="container_nota" style="left: ' . $row["Posicionx"] .'px; top: ' . $row["Posiciony"] . 'px;" onmousedown="mydragg.startMoving(this);" onmouseup="mydragg.stopMoving(this);">
                                    <div class="elemento_tablon_nota" > <h5>' . $row["Nombre"] . '</h5></div>
                                    <div class="eliminar_elemento" onclick = "deleteElement(this);" ></div>
                                </div>';
                            }
                            elseif ($row["Tipo"] == 'Imagen'){
                                echo 
                                '<div id="elem' . $row["ID_elementos"] . '" class="container_imagen" style="left: ' . $row["Posicionx"] . 'px; top: ' . $row["Posiciony"] . 'px;" onmousedown="mydragg.startMoving(this);" onmouseup="mydragg.stopMoving(this);">
                                    <div class="elemento_tablon_titulo"><h5>' . $row["Nombre"] . '</h5></div>
                                    <img class="elemento_tablon_imagen" src="' . $row["Url"] . '">
                                    <div class="eliminar_elemento" onclick = "deleteElement(this);" ></div>
                                </div>';

                            }
                            else{
                                echo
                                '<div id="elem' . $row["ID_elementos"] . '" class="container_video" style="left: ' . $row["Posicionx"] . 'px; top: ' . $row["Posiciony"] . 'px;" onmousedown="mydragg.startMoving(this);" onmouseup="mydragg.stopMoving(this);">
                                    <div class="elemento_tablon_titulo"><h5>' . $row["Nombre"] . '</h5></div>
                                    <iframe width="300" height="156" src="' . $row["Url"] . '?autoplay=0&showinfo=0&controls=2&autohide=1" frameborder="0" allowfullscreen></iframe>
                                    <div class="eliminar_elemento" onclick = "deleteElement(this);" ></div>
                                </div>';
                            }
                        }
                        ?>
	                </div>
	            </div>
	        </div><!--Cierra board -->
		</div>
    </div>
</body  