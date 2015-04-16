<script type="text/javascript">
$(document).ready(function() {
    $('ul li:has(ul)').hover(function(e) {
         $(this).find('ul').css({display: "block"});
     },
     function(e) {
         $(this).find('ul').css({display: "none"});
     });
});
</script>

<body>
        <div id= "body">
            <div id="header_tablon">
                <ul class="menu menu_header">
                        <li id = 'logo'>
                            <a><div>
                                <div class="elemento_menu">
                                    <img src="static/img/logo_provisional_pequeno.png">
                                </div>
                            </div></a>
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
                        <li><a id="div_anadir">Añadir +</a></li>
                        <li><a>Papelera</a></li>
                        <li><a>Marcadores</a></li>
                    </ul> 
                </div>
            </div> 

            <div id="board">
                <div id="marco_tablon">
                <div id='container_tablon'>
                    <div id="elem0" class = "elem" style = 'display: none;' onmousedown='mydragg.startMoving(this);' onmouseup='mydragg.stopMoving(this);'>
                        <div>
                            <pre>changethenote</pre>
                        </div>
                        <div style = 'width: 64px; height: 20px; margin: auto;'>
                            <div class ="square" id ="redSquare" onclick="cambiar_fondo(this, 1);"></div>
                            <div class ="square" id ="greenSquare" onclick="cambiar_fondo(this, 2);"></div>
                            <div class ="square" id ="blueSquare" onclick="cambiar_fondo(this, 3);"></div>
                            <div class ="square" id ="deleteSquare" onclick="deleteElement(this);"></div>
                            <div class ="square" id ="editSquare" onclick="editElement(this);"></div>
                        </div>
                    </div>
                    <?php
                    require_once("../modelos/modelo.php");
                    $result = obtenerElementosTablon(1);
                    while($row=mysql_fetch_assoc($result)) {
                        $elem = $row["ID_elementos"] + 1;
                        echo 
                        '<div id="elem'. $elem . '" class = "elem" style="width: 200px;height: 100px;left: ' . $row["posicionx"] .'px; top: ' . $row["posiciony"] .'px;" onmousedown="mydragg.startMoving(this);" onmouseup="mydragg.stopMoving(this);">
                            <div>
                                <pre>' . $row["contenido"] . '</pre>
                            </div>
                            <div id = "squareContainer" style = "width: 64px; height: 20px; margin: auto;">
                                <div class ="square" id ="redSquare" onclick="cambiar_fondo(this, 1);"></div>
                                <div class ="square" id ="greenSquare" onclick="cambiar_fondo(this, 2);"></div>
                                <div class ="square" id ="blueSquare" onclick="cambiar_fondo(this, 3);"></div>
                                <div class ="square" id ="deleteSquare" onclick="deleteElement(this);"></div>
                                <div class ="square" id ="editSquare" onclick="editElement(this);"></div>
                            </div>
                        </div>';
                    }
                    ?>
                   
                </div>
                         </div>

            <div id="anadir_elemento">
                <div id="anadir_elemento_seleccion">
                    <div id="elemento_seleccion_texto" class="elemento_seleccion"><img src="static/img/anadir_texto.png"></div>
                    <div id="elemento_seleccion_imagen" class="elemento_seleccion"><img src="static/img/anadir_imagen.png"></div>
                    <div id="elemento_seleccion_video" class="elemento_seleccion"><img src="static/img/anadir_video.png"></div>
                    <!--<div id="elemento_seleccion_enlace" class="elemento_seleccion"> ENLACE </div>-->
                </div>
                <div id="anadir_elemento_formulario">
                    <form id="formulario_imagen" class="vertical">
                        <fieldset>
                            <label for="nombre_imagen">Nombre</label>
                            <input id="nombre_imagen" type="text"/>
                            <label for="descripcion_imagen">Descripción</label>
                            <!--<textarea rows="1" cols="10" id='text2'>
                            </textarea>-->
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
                            <!--<textarea rows="1" cols="10" id='text2'>
                            </textarea>-->
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
                            <input id='new' type="text" name="yt"/>
                            <label for="destacar_nota">Destacar elemento </label>
                            <input type ='checkbox' value = 'Destacar'/>
                            <input type="button" value='Añadir' onclick="addElement_note()"/>
                            <button type="button" class="anadir_elemento_cerrar"> Cancelar</button>
                            
                        </fieldset>
                    </form>
                   
                </div>
                </div> <!--Cierra container-->
            </div>
        </div> <!--Cierra body -->
</body><!--Body cerrado por footer -->