
<body>
    <div id= "body">
        <div id="header_tablon">
            <ul class="menu menu_header">
                    <li id = 'logo'>
                       <div>
                            <div class="elemento_menu">
                                <a href="home"><img src="static/img/logo_provisional_pequeno.png"></a>
                            </div>
                        </div>
                    </li>
                    <li id = 'homeIcon'>
                        <a><div>
                            <div class="elemento_menu">
                                <p>HOME</p>
                            </div>
                            <div class="elemento_menu">
                                <img src="static/img/icono_home.png">
                            </div>
                        </div></a>
                    </li>
                    <li id = 'boards'>
                        <a><div>
                            <div class="elemento_menu">
                                <p>TABLONES</p>
                            </div>
                            <div class="elemento_menu">
                                <img src="static/img/icono_tablones.png">
                            </div>
                        </div></a>
                    </li>
                    <li  id = 'addBoardIcon'>
                        <a><div>
                            <div class="elemento_menu">
                                <p>AÑADIR TABLÓN</p>
                            </div>
                            <div class="elemento_menu">
                                <img src="static/img/icono_anadir_tablon.png">
                            </div>
                        </div></a>
                    </li>
                    <li id = 'username'>
                        <a><div>
                            <div class="elemento_menu">
                                <p>USERNAME</p>
                            </div>
                            <div class="elemento_menu">
                                <img src="static/img/icono_usuario.png">
                            </div>
                        </div></a>
                    </li>
                    <li id = 'configuration'>
                        <a><div>
                            <div class="elemento_menu">
                                <p>CONFIGURACIÓN</p>
                            </div>
                            <div class="elemento_menu">
                                <img src="static/img/icono_configuracion.png">
                            </div>
                        </div></a>
                    </li>

            </ul>
            
            <div id="board-menu">
                <ul class="menu">
                    <li><a>Nombre Tablón</a></li>
                    <?php
                        $privilegio = obtenerPrivilegiosTablon(1,"pere@gmail.com");
                        //echo $privilegio;
                        if ($privilegio > 0){
                    ?>
                    <li><a id="div_anadir">Añadir +</a></li>
                    <?php 
                        }
                    ?>
                    <li><a>Papelera</a></li>
                    <li><a>Marcadores</a></li>
                    <?php
                        //echo $privilegio;
                        if ($privilegio > 2){
                    ?>
                    <li><a id="div_invitar">Invitar</a></li>
                    <?php 
                        }
                        if ($privilegio > 3){
                    ?>
                    <li><a id="div_administrar">Administrar</a>
                    </li>
                    <?php
                    }
                    ?>
                    ?>
                </ul> 
            </div>
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
                            <div>
                                <pre>' . $row["contenido"] . '</pre>
                            </div>
                            <div id = "squareContainer" style = "width: 64px; height: 20px; margin: auto;">
                                <div class ="square" id ="redSquare" onclick="cambiar_fondo(this, 1);"></div>
                                <div class ="square" id ="deleteSquare" onclick="deleteElement(this);"></div>
                                <div class ="square" id ="editSquare" onclick="editElement(this);"></div>
                            </div>
                        </div>';}
                        ?>
                   
                </div>
            </div>
            <div id="invitar">
                <form id="formulario_invitar" class="vertical">
                    <fieldset>
                        <label for="correo">Correo</label>
                        <input id='correo' type="text" name="yt"/>
                        <input type="button" value='Invitar' onclick="addUser(1,correo.value)"/>
                        <button type="button" class="anadir_elemento_cerrar"> Cancelar</button>  
                    </fieldset>
                </form>
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

            <div id="anadir_elemento">
                <div id="anadir_elemento_seleccion">
                    <div id="elemento_seleccion_texto" class="elemento_seleccion"><img src="static/img/anadir_texto.png"></div>
                    <div id="elemento_seleccion_imagen" class="elemento_seleccion"><img src="static/img/anadir_imagen.png"></div>
                    <div id="elemento_seleccion_video" class="elemento_seleccion"><img src="static/img/anadir_video.png"></div>
                </div>
                <div class="form-style-1-heading">AÑADIR NOTA</div>
                <form>
                    <ul class="form-style-1">
                        <li>
                            <label>Nombre</label>
                            <input id="nombre_imagen" type="text" class="field-long"/>
                        </li>
                        <li>
                            <label for="descripcion_imagen">Descripción</label>
                            <input id="descripcion_imagen" type="text" class="field-long"/>
                        </li>
                        <li>
                            <label for="url_imagen">URL Imagen</label>
                            <input id="url_imagen" type="text" class="field-long"/>
                        </li>
                        <li>
                            <label for="destacar_imagen">Destacar elemento </label>
                            <input type ='checkbox' value = 'Destacar' class="field-long">
                        </li>
                        <li>
                            <input type="button" value='Añadir' onclick="addElement_image()">
                        </li>
                    </ul>
                </form>
            </div>
            
        </div><!--Cierra board -->
    </div> <!--Cierra div body -->
</body><!--Cierra body -->

        <div id="div_login">
            <div class="form-style-1-heading">INICIO DE SESIÓN</div>
            <form action="controladores/controlador_login.php" method="post">
                <ul class="form-style-1">
                    <li>
                        <label>Correo Usuario</label>
                        <input type="email" name="fl_correo" class="field-long" />
                    </li>
                    <li>
                        <label>Password</label>
                        <input type="password" name="fl_password" class="field-long" />
                    </li>
                    <li>
                        <input type="submit" value="Submit" />
                    </li>
                </ul>
            </form>
        </div>


     <div id="anadir_elemento">
                <div id="anadir_elemento_seleccion">
                    <div id="elemento_seleccion_texto" class="elemento_seleccion"><img src="static/img/anadir_texto.png"></div>
                    <div id="elemento_seleccion_imagen" class="elemento_seleccion"><img src="static/img/anadir_imagen.png"></div>
                    <div id="elemento_seleccion_video" class="elemento_seleccion"><img src="static/img/anadir_video.png"></div>
                </div>
                <div id="anadir_elemento_formulario">
                    <form id="formulario_imagen" class="vertical">
                        <fieldset>
                            <label for="nombre_imagen">Nombre</label>
                            <input id="nombre_imagen" type="text"/>
                            <label for="descripcion_imagen">Descripción</label>
                            <input id="descripcion_imagen" type="text"/>
                            <label for="url_imagen">URL Imagen</label>
                            <input id="url_imagen" type="text"/>
                            <label for="destacar_imagen">Destacar elemento </label>
                            <input type ='checkbox' value = 'Destacar'>
                            <input type="button" value='Añadir' onclick="addElement_image()">
                            <button type="button" class="anadir_elemento_cerrar">Cancelar</button>
                        </fieldset>
                    </form>

                    <form id="formulario_video" class="vertical">
                         <fieldset>
                            <label for="nombre_video">Nombre</label>
                            <input id="nombre_video" type="text"/>
                            <label for="descripcion_video">Descripción</label>
                            <input id="descripcion_video" type="text"/>
                            <label for="url_video">URL Video</label>
                            <input id="url_video" type="text"/>
                            <label for="destacar_video">Destacar elemento </label>
                            <input type ='checkbox' value = 'Destacar'>
                            <input type="button" value='Añadir' onclick="addElement_video()">
                            <button type="button" class="anadir_elemento_cerrar">Cancelar</button>
                        </fieldset>
                    </form>

                    <form id="formulario_texto" class="vertical">
                        <fieldset>
                            <label for="text2">Nota</label>
                            <input id='new_note' type="text" name="yt"/>
                            <label for="destacar_nota">Destacar elemento </label>
                            <input type ='checkbox' value = 'Destacar'/>
                            <input type="button" value='Añadir' onclick="addElement_note()"/>
                            <button type="button" class="anadir_elemento_cerrar"> Cancelar</button>
                            
                        </fieldset>
                    </form>                      
                </div>
            </div> <!--Cierra container--> 