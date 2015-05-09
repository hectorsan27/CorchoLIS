/* Esconde y añade puntos suspensivos a textos que no caben dentro de un Div*/
$(document).ready(function(){
    $(".elemento_tablon_descripcion").dotdotdot({
        ellipsis    : '... '
    });
    $(".elemento_tablon_titulo").dotdotdot({
        ellipsis    : '... '
    });
    $(".elemento_tablon_nota").dotdotdot({
        ellipsis    : '... '
    });
});

var mydragg = function(){
    //Tamaño del container que contendra los elementos
    var tamano_container_x = 1200;
    var tamano_container_y = 550;
    return {

        move : function(divid,xpos,ypos){

            divid.style.left = xpos + 'px';
            divid.style.top = ypos + 'px';

        },

        startMoving : function(divid,evt){

            //Ponemos todos los elementos atras y el elemento seleccionado se pone adelante
            var i;
            var elements = document.getElementsByClassName("container_video");
            for (i = 0; i < elements.length; i++){
                elements[i].style.zIndex = "0";
            }
            elements = document.getElementsByClassName("container_imagen");
            for (i = 0; i < elements.length; i++){
                elements[i].style.zIndex = "0";
            }
            elements = document.getElementsByClassName("container_nota");
            for (i = 0; i < elements.length; i++){
                elements[i].style.zIndex = "0";
            }
            divid.style.zIndex = "1";

            //Cogemos los datos de la posicion del raton

            evt = evt || window.event;
            var posX = evt.clientX;
            var posY = evt.clientY;

            //Cogemos los datos del elemento que ha tocado
            var divTop = divid.style.top;
            var divLeft = divid.style.left;
            var width = divid.offsetWidth;
            var height = divid.offsetHeight;


            //Cogemos los datos del div del fondo (el corcho)
            divTop = divTop.replace('px','');
            divLeft = divLeft.replace('px','');

            //Estilo del raton pasa a movimiento (el "+")
            document.getElementById('container_tablon').style.cursor='move';
            //Calculamos la diferencia de donde hemos clicado a la esquina superior izq. del elemento clicado
            var diffX = posX - divLeft,
                diffY = posY - divTop;

            //Cuando muevan el raton:
            document.onmousemove = function(evt){
                evt = evt || window.event;

                //Se volverá a coger la posicion del raton
                var posX = evt.clientX,
                    posY = evt.clientY,
                    // La posicion ACTUAL de la esquina del div es aX y aY
                    aX = posX - diffX,
                    aY = posY - diffY;

                    //Controlamos que no pase de los bordes
                    if (aX < 0) aX = 0;
                    if (aY < 0) aY = 0;
                    // Se comprueba que este dentre de la anchura del container
                    if (aX + width > tamano_container_x){
                      aX = tamano_container_x - width;
                    }
                    //Se comprueba que este dentro d ela altura del container
                    if (aY + height > tamano_container_y) aY = tamano_container_y -height;
                    // movemos el objeto a la posicion correcta

                mydragg.move(divid,aX,aY);
            }
        },

        stopMoving : function(divid){
            document.getElementById('container_tablon').style.cursor='default';
            var idTablon = getCookie("idTablon");
            var positionx = divid.style.left;
            positionx = positionx.replace('px','');
            var positiony = divid.style.top;
            positiony = positiony.replace('px','');
            var elem = divid.id;
            elem = elem.replace('elem','');
            editarPosicion(idTablon,elem,positionx,positiony);
            document.onmousemove = function(){}
        },
    }
}();

function cambiar_fondo(divid, color) {

    //cogemos el id del contenedor
    var idElem = divid.parentNode.parentNode.id;
    var elem = document.getElementById(idElem);

    //cambiamos el color segun el color que hayan elegido
    if (color == 1){
        elem.style.backgroundColor = 'red';
    }

    else{
        if (color == 2){
            elem.style.backgroundColor = 'green';
        }
        else{
            elem.style.backgroundColor = 'blue';
        }
    }
}

function addElement_note(){
    // creamos un nuevo div
    var div = document.createElement("div");
    //miramos cuantos elementos hay, para saber la nueva id (si hay 3 elementos previamente, del elem0 al 2, la nueva id sera elem3)
    var elements = document.getElementsByClassName("elemento_tablon");
    var elements2 = document.getElementsByClassName("elemento_tablon_2");
    var length = elements.length + elements2.length - 2;
    var id = 'elem';
    id = id+length;
    //ponemos el ID y la clase al nuevo DIV
    div.id = id;
    div.className = 'elemento_tablon_2';

    //nota tiene un texto de mentira porque si no, no funcionaba el editar
    var note = document.getElementById("contenido_nota");  
    var inner = '<p>' + note.value + '</p>';
    div.innerHTML = inner;

    // cogemos el div del fondo y le añadimos el nuevo div
    var container = document.getElementById("container_tablon");
    container.appendChild(div);

    //añadimos el onMouseDown/UP
    div.onmousedown= document.getElementById("sample").onmousedown;
    div.onmouseup = document.getElementById("sample").onmouseup;

    //variables que enviamos a la funcion
    var idTablon = getCookie("idTablon");
    var posicion_x = 0;
    var posicion_y = 0;
    var tamano = "Pequeno";
    var tipo = "Texto";
    var contenido = note.value;
    //guardamos el elemento en la base de datos
    nuevoElemento(idTablon, posicion_x, posicion_y, tamano, tipo, contenido);
}

function addElement_image(){
    // creamos un nuevo div
    var div = document.createElement("div");
    //miramos cuantos elementos hay, para saber la nueva id (si hay 3 elementos previamente, del elem0 al 2, la nueva id sera elem3)
    var elements = document.getElementsByClassName("elemento_tablon");
    var elements2 = document.getElementsByClassName("elemento_tablon_2");
    var length = elements.length + elements2.length - 2;
    var id = 'elem';
    id = id+length;
    //ponemos el ID y la clase al nuevo DIV
    div.id = id;
    div.className = 'elemento_tablon';
    //cogemos el elem0, que es una muestra de prueba (Factory Method)
    var imagen = document.getElementById("imagen");
    //cambiamos elem0 por elemX, segun el id de antes
    var inner = imagen.innerHTML.replace('imagen',id);
    //obtenemos el texto que hay en el input y lo remplazamos por el texto que hay en elem0
    //elem0 tiene un texto de mentira porque si no, no funcionaba el editar

    var nombre_imagen = document.getElementById("nombre_imagen");  
    inner = inner.replace('titulo', nombre_imagen.value);
    div.innerHTML = inner;

    var url_imagen = document.getElementById("url_imagen");  
    inner = inner.replace('url', url_imagen.value);
    div.innerHTML = inner;

    var descripcion_imagen = document.getElementById("descripcion_imagen");  
    inner = inner.replace('descripcion',descripcion_imagen.value);
    div.innerHTML = inner;

    // cogemos el div del fondo y le añadimos el nuevo div
    var container = document.getElementById("container_tablon");
    container.appendChild(div);

    //añadimos el onMouseDown/UP
    div.onmousedown= document.getElementById("sample").onmousedown;
    div.onmouseup = document.getElementById("sample").onmouseup;
    
    //variables que enviamos a la funcion
    var idTablon = getCookie("idTablon");
    var posicion_x = 0;
    var posicion_y = 0;
    var tamano = "Pequeno";
    var tipo = "imagen";
    var contenido = inner;
    //guardamos el elemento en la base de datos
    nuevoElemento(idTablon, posicion_x, posicion_y, tamano, tipo, contenido);
}

function addElement_video(){
   // creamos un nuevo div
    var div = document.createElement("div");
    //miramos cuantos elementos hay, para saber la nueva id (si hay 3 elementos previamente, del elem0 al 2, la nueva id sera elem3)
    var elements = document.getElementsByClassName("elemento_tablon");
    var elements2 = document.getElementsByClassName("elemento_tablon_2");
    var length = elements.length + elements2.length - 2;
    var id = 'elem';
    id = id+length;
    //ponemos el ID y la clase al nuevo DIV
    div.id = id;
    div.className = 'elemento_tablon';
    //cogemos el elem0, que es una muestra de prueba (Factory Method)
    var video = document.getElementById("video");
    //cambiamos elem0 por elemX, segun el id de antes
    var inner = video.innerHTML.replace('video',id);
    //obtenemos el texto que hay en el input y lo remplazamos por el texto que hay en elem0
    //elem0 tiene un texto de mentira porque si no, no funcionaba el editar

    var nombre_video = document.getElementById("nombre_video");  
    inner = inner.replace('titulo', nombre_video.value);
    div.innerHTML = inner;

    var url_video = document.getElementById("url_video");
    url_video.value = url_video.value.replace('watch?v=','embed/');
    inner = inner.replace('url', url_video.value);
    div.innerHTML = inner;

    var descripcion_video = document.getElementById("descripcion_video"); 
    inner = inner.replace('descripcion',descripcion_video.value);
    div.innerHTML = inner;

    // cogemos el div del fondo y le añadimos el nuevo div
    var container = document.getElementById("container_tablon");
    container.appendChild(div);

    //añadimos el onMouseDown/UP
    div.onmousedown= document.getElementById("sample").onmousedown;
    div.onmouseup = document.getElementById("sample").onmouseup;
    
    //variables que enviamos a la funcion
    var idTablon = getCookie("idTablon");
    var posicion_x = 0;
    var posicion_y = 0;
    var tamano = "Pequeno";
    var tipo = "Video";
    var contenido = inner;
    //guardamos el elemento en la base de datos
    nuevoElemento(idTablon, posicion_x, posicion_y, tamano, tipo, contenido);
}

function deleteElement(divid){
    //obtiene el div del elemento y lo elimina del div del fondo
    var idElem = divid.parentNode.parentNode.id;
    var idTablon = getCookie("idTablon");
    var elem = document.getElementById(idElem);
    document.getElementById("container_tablon").removeChild(elem);
    idElem = idElem.replace('elem','');
    idElem = parseInt(idElem);

    var elements = document.querySelectorAll('.elemento_tablon, .elemento_tablon_2');
    var i;
    var item;
    var id;
    for (i = idElem; i < elements.length - 2; i++){
        id = elements[i+2].id.substring(0,4) + i;
        elements[i+2].id = id;
    }
    enviarPapelera(idTablon ,idElem);
}

function editElement(divid){
     //obtiene el div del elemento, y dentro de ese div, obtiene el div en el cual está el texto (<pre>)
    var idElem = divid.parentNode.parentNode.id;
    var elem = document.getElementById(idElem);
    var childs = elem.childNodes;
    var text = childs[1];

    //reemplaza el texto que habia por el nuevo
    var note = document.getElementById("new");
    text.innerHTML = "<pre>"+note.value+"</pre>";
    elem.style.backgroundColor = 'orange';
}

//LLAMADAS AJAX
function nuevoElemento(idTablon, posicion_x, posicion_y, tamano, tipo, contenido){
    var action = "INSERT";
    var data = "idTablon="+idTablon+"&posicion_x="+posicion_x+"&posicion_y="+posicion_y+"&tamano="+tamano+"&tipo="+tipo+"&contenido="+contenido+"&action="+action;
    var url = 'controladores/controlador_tablon.php';
    var type= 'POST';
    ajaxCall(data,url,type);
}

function editarPosicion(idTablon, elem, posicion_x, posicion_y){
    var action = "EDIT_POSITION";
    var data = "idTablon="+idTablon+"&idElem="+elem+"&posicion_x="+posicion_x+"&posicion_y="+posicion_y+"&action="+action;;
    var url = 'controladores/controlador_tablon.php';
    var type= 'POST';
    ajaxCall(data,url,type);
}

function deleteElement(idTablon, elem){
    var action = "DELETE";
    var data = "idTablon="+idTablon+"&idElem="+elem+"&action="+action;
    var url = 'controladores/controlador_tablon.php';
    var type= 'POST';
    ajaxCall(data,url,type);
}

function addUser(idTablon, correo) {
    var action = "SHARE";
    var correo = document.getElementById("container_tablon");
    var data = "idTablon="+idTablon+"&correo="+correo+"&action="+action;
    var url = 'controladores/controlador_tablon.php';
    var type= 'POST';
    ajaxCall(data,url,type);
}

function enviarPapelera(idTablon, elem){
    var action = "DISCARD";
    var data = "idTablon="+idTablon+"&idElem="+elem+"&action="+action;
    var url = 'controladores/controlador_tablon.php';
    var type= 'POST';
    ajaxCall(data,url,type);
}

function recoverElement(idTablon, elem){
    var action = "RECOVER";
    var data = "idTablon="+idTablon+"&idElem="+elem+"&action="+action;
    var url = 'controladores/controlador_tablon.php';
    var type= 'POST';
    ajaxCall(data,url,type);
}

function emptyTrash(idTablon){
    var action = "EMPTY";
    var data = "idTablon="+idTablon+"&action="+action;
    var url = 'controladores/controlador_tablon.php';
    var type= 'POST';
    ajaxCall(data,url,type);
}
function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
    }
    return "";
}

function ajaxCall(data,url,type){
    $.ajax({
        data:  data,
        url:   url,
        type:  type,
    });
}