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

            elements = document.getElementsByClassName("elem");

            var i;
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
            var eWi = parseInt(divid.style.width);
            var eHe = parseInt(divid.style.height);

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
                    // La posicion ACTUAL deberia ser aX y aY
                    aX = posX - diffX,
                    aY = posY - diffY;

                    //Controlamos que no pase de los bordes
                    if (aX < 0) aX = 0;
                    if (aY < 0) aY = 0;
                    // Se comprueba que este dentre de la anchura del container
                    if (aX + eWi > tamano_container_x){
                      aX = tamano_container_x - eWi;
                    }
                    //Se comprueba que este dentro d ela altura del container
                    if (aY + eHe > tamano_container_y) aY = tamano_container_y -eHe;
                    // movemos el objeto a la posicion correcta

                mydragg.move(divid,aX,aY);
            }
        },

        stopMoving : function(divid){
            document.getElementById('container_tablon').style.cursor='default';
            var idTablon = 1;
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
    var elements = document.getElementsByClassName("elem");
    var length = elements.length - 3;
    var id = 'elem';
    id = id+length;
    //ponemos el ID y la clase al nuevo DIV
    div.id = id;
    div.className = 'elem';
    var nota = document.getElementById("nota");
    var contenido_nota = document.getElementById("contenido_nota");
    nota.innerHTML = nota.innerHTML.replace('changethenote',nombre_nota.value);
    div.innerHTML = nota.innerHTML;

    //ponemos la anchura y altura
    div.style.width = '200px';
    div.style.height = '100px';

    // cogemos el div del fondo y le añadimos el nuevo div
    var container = document.getElementById("container_tablon");
    container.appendChild(div);

    //añadimos el onMouseDown/UP de nota
    div.onmousedown= nota.onmousedown;
    div.onmouseup = nota.onmouseup;
    
    

    //variables que enviamos a la funcion
    var idTablon = 1;
    var posicion_x = 0;
    var posicion_y = 0;
    var tamano = "Pequeno";
    var tipo = "Texto";
    var contenido = div.innerHTML;
    //guardamos el elemento en la base de datos
    nuevoElemento(idTablon, posicion_x, posicion_y, tamano, tipo, contenido);
}

function addElement_image(){
     // creamos un nuevo div
    var div = document.createElement("div");
    //miramos cuantos elementos hay, para saber la nueva id (si hay 3 elementos previamente, del elem0 al 2, la nueva id sera elem3)
    var elements = document.getElementsByClassName("elem");
    var length = elements.length -3;
    var id = 'elem';
    id = id+length;
    //ponemos el ID y la clase al nuevo DIV
    div.id = id;
    div.className = 'elem';
    var nota = document.getElementById("nota");

    /*
        ???
    */

    //ponemos la anchura y altura
    div.style.width = '200px';
    div.style.height = '100px';

    // cogemos el div del fondo y le añadimos el nuevo div
    var container = document.getElementById("container_tablon");
    container.appendChild(div);

    //añadimos el onMouseDown/UP de elem0
    div.onmousedown= imagen.onmousedown;
    div.onmouseup = imagen.onmouseup;
    
    //variables que enviamos a la funcion
    var idTablon = 1;
    var posicion_x = 0;
    var posicion_y = 0;
    var tamano = "Pequeno";
    var tipo = "imagen";
    var contenido = div.innerHTML;
    //guardamos el elemento en la base de datos
    nuevoElemento(idTablon, posicion_x, posicion_y, tamano, tipo, contenido);
}

function addElement_video(){
   // creamos un nuevo div
    var div = document.createElement("div");
    //miramos cuantos elementos hay, para saber la nueva id (si hay 3 elementos previamente, del elem0 al 2, la nueva id sera elem3)
    var elements = document.getElementsByClassName("elem");
    var length = elements.length - 3;
    var id = 'elem';
    id = id+length;
    //ponemos el ID y la clase al nuevo DIV
    div.id = id;
    div.className = 'elem';
   

    /*
        ???
    */
    
    //ponemos la anchura y altura
    div.style.width = '200px';
    div.style.height = '100px';

    // cogemos el div del fondo y le añadimos el nuevo div
    var container = document.getElementById("container_tablon");
    container.appendChild(div);

    //añadimos el onMouseDown/UP de elem0
    div.onmousedown= video.onmousedown;
    div.onmouseup = video.onmouseup;
    
    //variables que enviamos a la funcion
    var idTablon = 1;
    var posicion_x = 0;
    var posicion_y = 0;
    var tamano = "Pequeno";
    var tipo = "Video";
    var contenido = div.innerHTML;
    //guardamos el elemento en la base de datos
    nuevoElemento(idTablon, posicion_x, posicion_y, tamano, tipo, contenido);
}

function deleteElement(divid){
    //obtiene el div del elemento y lo elimina del div del fondo
    var idElem = divid.parentNode.parentNode.id;
    var idTablon = 1;
    var elem = document.getElementById(idElem);
    document.getElementById("container_tablon").removeChild(elem);
    idElem = idElem.replace('elem','');
    idElem = parseInt(idElem);

    var elements = document.getElementsByClassName("elem");
    var i;
    var item;
    for (i = idElem; i < elements.length - 3; i++){
        elements[i+3].id = "elem" + i;
    }
    //alert(idTablon + "," + idElem);
    eliminarElemento(idTablon ,idElem);
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

//PERSISTENCIA

function nuevoElemento(idTablon, posicion_x, posicion_y, tamano, tipo, contenido){
    $.ajax({
                data:  "idTablon="+idTablon+"&posicion_x="+posicion_x+"&posicion_y="+posicion_y+"&tamano="+tamano+"&tipo="+tipo+"&contenido="+contenido+"&action="+"INSERT",
                url:   'controladores/controlador_tablon.php',
                type:  'POST',
        });
}

function editarPosicion(idTablon, elem, posicion_x, posicion_y){
    //especificamos que es un editar
    var action = "EDIT_POSITION";
      $.ajax({
                data:  "idTablon="+idTablon+"&idElem="+elem+"&posicion_x="+posicion_x+"&posicion_y="+posicion_y+"&action="+action,
                url:   'controladores/controlador_tablon.php',
                type:  'POST',
        });
}

function eliminarElemento(idTablon, elem){
      var action = "DELETE";
      $.ajax({
                data:  "idTablon="+idTablon+"&idElem="+elem+"&action="+action,
                url:   'controladores/controlador_tablon.php',
                type:  'POST',
        });
}


function addUser(idTablon, correo) {
    alert(correo);
    var action = "SHARE";
    var correo = document.getElementById("container_tablon");
      $.ajax({
                data:  "idTablon="+idTablon+"&correo="+correo+"&action="+action,
                url:   'controladores/controlador_tablon.php',
                type:  'POST',
        });
}

function addBoard(correo){
    var action = "ADDBOARD";
    alert(correo);
    $.ajax({
                data: "correo="+correo+"&action="+action,
                url:   'controladores/controlador_tablon.php',
                type:  'POST',
        });
}