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

/*Esconde el fondo oscurecido*/
$(document).ready(function(){
    $(".fondo_oscurecido").hide();
});


/*Muestra el contenido del elemento clicado*/
$(document).ready(function(){
    $('[id^="mostrar_contenido_"]').each(function() {
        $(this).click(function(){
            var id = $(this).attr('id');
            var id_num = id.split('_');
            var expanded_elem = "elem_expanded_" + id_num[2];

            $('[id^="elem_expanded_"]').not(":hidden").each(function() {
                $(".fondo_oscurecido").fadeOut();
                $(this).fadeOut();
            });
            $(".fondo_oscurecido").fadeIn();
            $('#'+expanded_elem).fadeIn();
        });
     });
});

/*Cierra el contenido del elemento actual cuando se clica fuera*/
$(document).ready(function(){
    $(document).mousedown(function(e) {
        $('[id^="elem_expanded_"]').not(":hidden").each(function() {
             if(e.target.id != $(this) && !$(this).find(e.target).length) {
                $(".fondo_oscurecido").fadeOut();
                $(this).fadeOut();
            }
        });
    });
});



var mydragg = function(){
    //Tamaño del container que contendra los elementos
    var tamano_container_x = 1200;
    var tamano_container_y = 550;
    var rotacion;
    var posicion_elemento_x;
    var posicion_elemento_y;
    var posicion_puntero_x;
    var posicion_puntero_y;
    var elemento;
    var diffY, diffX;

    return {

        move : function(divid,xpos,ypos){

            divid.style.left = xpos + 'px';
            divid.style.top = ypos + 'px';

        },

        startMoving : function(divid,evt){
            elemento = divid;

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
            posicion_puntero_x = evt.clientX;
            posicion_puntero_y = evt.clientY;

            //Cogemos los datos del elemento que ha tocado
            posicion_elemento_y = elemento.offsetTop;
            posicion_elemento_x = elemento.offsetLeft;

            rotacion = mydragg.calculateRotation(elemento, posicion_elemento_x); 
            $('#' + elemento.id).css({"transform":"translateZ(5px) rotateY("+rotacion+"deg)"});

            var width = elemento.offsetWidth;
            var height = elemento.offsetHeight;

            //Estilo del raton pasa a movimiento (el "+")
            document.getElementById('container_tablon').style.cursor='move';

            //Calculamos la diferencia de donde hemos clicado a la esquina superior izq. del elemento clicado
            diffX = posicion_puntero_x - posicion_elemento_x,
            diffY = posicion_puntero_y - posicion_elemento_y;

            //Cuando muevan el raton:
            document.onmousemove = function(evt){
                evt = evt || window.event;

                //Posición del puntero
                posicion_puntero_x = evt.clientX,
                posicion_puntero_y = evt.clientY,

                //Posicion del elemento
                    posicion_elemento_x = posicion_puntero_x - diffX,
                    posicion_elemento_y = posicion_puntero_y - diffY;

                     //Calculamos la rotacion que hay que aplicar al div
                    rotacion = mydragg.calculateRotation(elemento, posicion_elemento_x); 
                    $('#' + elemento.id).css({"transform":"translateZ(5px) rotateY("+rotacion+"deg)"});

                    //Controlamos que no pase de los bordes
                    if (posicion_elemento_x < 0) posicion_elemento_x = 0;
                    if (posicion_elemento_y < 0) posicion_elemento_y = 0;
                    // Se comprueba que este dentre de la anchura del container
                    if (posicion_elemento_x + width > tamano_container_x){
                      posicion_elemento_x = tamano_container_x - width;
                    }
                    //Se comprueba que este dentro d ela altura del container
                    if (posicion_elemento_y + height > tamano_container_y) posicion_elemento_y = tamano_container_y -height;
                    // movemos el objeto a la posicion correcta
                mydragg.move(elemento,posicion_elemento_x,posicion_elemento_y);
            }
        },

        stopMoving : function(divid){
            rotacion = mydragg.calculateRotation(elemento, posicion_elemento_x); 
            $('#' + elemento.id).css({"transform":"translateZ(0px) rotateY("+rotacion+"deg)"});
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

        calculateRotation : function(elemento, aX){
            var total_rotation = 0;
            var board_width = $('#container_tablon').outerWidth(true);
            var element_width = $('#' + elemento.id).outerWidth(true);
            var element_x = aX+(element_width/2);
            var rotation = (((-total_rotation) / board_width)*element_x) + (total_rotation/2);
            return rotation;
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

function urlToEmbed(url){
    if (url.indexOf('youtu.be/') != -1){
        return 'https://www.youtube.com/embed/' + url.substring(url.indexOf('youtu.be/') + 9);
    }
    if (url.indexOf('/watch?v=') != -1){
        return 'https://www.youtube.com/embed/' + url.substring(url.indexOf('/watch?v=') + 9);
    }
    return 'https://www.youtube.com/embed/dQw4w9WgXcQ';
}


function obtainNewId(){
    //miramos cuantos elementos hay, para saber la nueva id (si hay 3 elementos previamente, del elem0 al 2, la nueva id sera elem3)
    var elements = document.getElementsByClassName("container_nota");
    var elements2 = document.getElementsByClassName("container_imagen");
    var elements3 = document.getElementsByClassName("container_video");
    var elements4 = document.getElementsByClassName('liPapelera');
    var length = elements.length + elements2.length + elements3.length + elements4.length;
    var id = 'elem';
    return length;
}

function appendChild(div, tamano, tipo, nombre, contenido, url){
    document.getElementById("container_tablon").appendChild(div);

    div.onmousedown= document.getElementById("sample").onmousedown;
    div.onmouseup = document.getElementById("sample").onmouseup;
    
    //variables que enviamos a la funcion
    var idTablon = getCookie("idTablon");
    var posicion_x = 0;
    var posicion_y = 0;

    nuevoElemento(idTablon, posicion_x, posicion_y, tamano, tipo, nombre, contenido, url);
}

function isValidNote(titulo){
    if (titulo.value == ''){
        alert('Nombre obligatorio');
        return false;
    }
    return true;
}

function isValidImage(titulo, url){
    if (titulo.value == '' && url.value == ''){
        alert('Nombre y URL obligatorios');
        return false;
    }
    else{
        if (titulo.value == ''){
            alert('Nombre obligatorio');
        }
        else{
            if (url.value == ''){
                alert('URL obligatorio');
                return false;
            }
            return true;
        }
    }
}

function isValidVideo(titulo, url){
    if (titulo.value == '' && url.value == ''){
        alert('Nombre y URL obligatorios');
        return false;
    }
    else{
        if (titulo.value == ''){
            alert('Nombre obligatorio');
        }
        else{
            if (url.value == ''){
                alert('URL obligatorio');
                return false;
            }
            return true;
        }
    }
}

function checkImageURL(url){
    if(url.match(/\.(jpg|gif|png|jpeg|JPG|GIF|PNG|JPEG)$/) != null){
        return url;
    }
    return 'http://campinaprofessioneel.nl/wp-content/uploads/2015/01/img-not-found.jpg';
}

function addElement_note(){
    var div = document.createElement("div");
    div.id = 'elem' + obtainNewId();
    div.className = 'container_nota';

    //nota tiene un texto de mentira porque si no, no funcionaba el editar
    var titulo = document.getElementById("nombre_nota");
    var nota = document.getElementById("contenido_nota");

    div.innerHTML = '<div class="elemento_tablon_nota" > <h5> ' + titulo.value + '</h5> </div> <div class="eliminar_elemento" onclick = "deleteElement(this);" ></div>  <div id="mostrar_contenido"  class="mostrar_contenido"></div>';

    if (isValidNote(titulo)){
        appendChild(div,'Pequeno', 'Texto', titulo.value, nota.value, '');
    }
}

function addElement_image(){
    var div = document.createElement("div");
    div.id = 'elem' + obtainNewId();
    div.className = 'container_imagen';

    var titulo = document.getElementById("nombre_imagen");
    var url = document.getElementById("url_imagen");
    var descripcion = document.getElementById("descripcion_imagen");

    if (isValidImage(titulo,url)){
        url = checkImageURL(url.value);
        div.innerHTML = '<div class="elemento_tablon_titulo"> <h5>' + titulo.value + '</h5> </div> <img class="elemento_tablon_imagen" src="' + url + ' "> <div class="eliminar_elemento" onclick = "deleteElement(this);" ></div>  <div id="mostrar_contenido"  class="mostrar_contenido"></div>  ';
        appendChild(div,'Pequeno', 'Imagen', titulo.value, descripcion.value, url);
    }
}

function addElement_video(){
    var div = document.createElement("div");
    div.id = 'elem' + obtainNewId();
    div.className = 'container_video';

    var titulo = document.getElementById("nombre_video");
    var url = document.getElementById("url_video");
    var descripcion = document.getElementById("descripcion_video");
    
    if (isValidVideo(titulo,url)){
        var urlEmbeded = urlToEmbed(url.value);
        div.innerHTML = '<div class="elemento_tablon_titulo"> <h5> ' + titulo.value + '</h5> </div> <iframe width="300" height="156" src="' + urlEmbeded + '?autoplay=0&showinfo=0&controls=2&autohide=1" frameborder="0" allowfullscreen></iframe> <div class="eliminar_elemento" onclick = "deleteElement(this);" ></div>  <div id="mostrar_contenido"  class="mostrar_contenido"></div>';
        appendChild(div,'Pequeno', 'Video', titulo.value, descripcion.value, urlEmbeded);
    }
}

function deleteElement(divid){
    //obtiene el div del elemento y lo elimina del div del fondo
    var idElem = divid.parentNode.id;
    var idTablon = getCookie("idTablon");
    var elem = document.getElementById(idElem);
    var titulo = elem.getElementsByTagName('h5')[0].innerHTML;
    var li = document.createElement('li');
    li.className = 'liPapelera';
    li.innerHTML = document.getElementById('sampleLi').innerHTML;
    li.getElementsByTagName('p')[0].innerHTML = titulo;
    var elemClass;
    if (divid.parentNode.className == 'container_nota'){
        elemClass = 'note';
    }
    else{
        if (divid.parentNode.className == 'container_imagen'){
            elemClass = 'img';
            li.getElementsByTagName('div')[0].innerHTML = elem.getElementsByTagName('img')[0].src;
        }
        else{
            elemClass = 'video';
            li.getElementsByTagName('div')[0].innerHTML = elem.getElementsByTagName('iframe')[0].src;
        }
    }
    li.getElementsByTagName('div')[0].className = elemClass;

    document.getElementById("container_tablon").removeChild(elem);
    idElem = idElem.replace('elem','');
    idElem = parseInt(idElem);
    li.id = 'li'+idElem;
    var ul = document.getElementById('ulPapelera');
    ul.insertBefore(li,document.getElementsByClassName('footer_papelera')[0]);

    enviarPapelera(idTablon ,idElem);

    if (document.getElementById('ulPapelera').getElementsByTagName('li').length == 2){
        var li = document.getElementsByClassName('footer_papelera')[0];
        li.innerHTML = document.getElementById('sampleInput').innerHTML;
    }
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
function nuevoElemento(idTablon, posicion_x, posicion_y, tamano, tipo, nombre, contenido, url){
    var action = "INSERT";
    var data = "idTablon="+idTablon+"&posicion_x="+posicion_x+"&posicion_y="+posicion_y+"&tamano="+tamano+"&tipo="+tipo+"&nombre="+nombre+"&contenido="+contenido+"&url="+url+"&action="+action;
    var url = '../controladores/controlador_tablon.php';
    var type = 'POST';
    ajaxCall(data,url,type);
}

function editarPosicion(idTablon, elem, posicion_x, posicion_y){
    var action = "EDIT_POSITION";
    var data = "idTablon="+idTablon+"&idElem="+elem+"&posicion_x="+posicion_x+"&posicion_y="+posicion_y+"&action="+action;;
    var url = '../controladores/controlador_tablon.php';
    var type = 'POST';
    ajaxCall(data,url,type);
}

function restarID(idElem, elements){
    var id;
    var i;
    for (i = 0; i < elements.length; i++){
        if (parseInt(elements[i].id.substring(4)) > idElem){
            id = parseInt(elements[i].id.substring(4))-1;
            elements[i].id = elements[i].id.substring(0,4) + id;
        }
    }
}

function restarID_Li(index,idElem, elements){
    var id;
    var i;
    for (i = index; i < elements.length; i++){
        if (parseInt(elements[i].id.substring(2)) > idElem){
            id = parseInt(elements[i].id.substring(2))-1;
            elements[i].id = elements[i].id.substring(0,2) + id;
        }
    }
}

function eliminarElemento(idTablon, divid){
    var elem = document.getElementById(divid.parentNode.id);
    var index = Array.prototype.indexOf.call(elem.parentNode.children, elem);
    document.getElementById("ulPapelera").removeChild(elem);
    idElem = divid.parentNode.id;
    idElem = idElem.replace('li','');
    idElem = parseInt(idElem);
    restarID_Li(index,idElem, document.getElementsByClassName('liPapelera'));
    restarID(idElem, document.getElementsByClassName('container_nota'));
    restarID(idElem, document.getElementsByClassName('container_imagen'));
    restarID(idElem, document.getElementsByClassName('container_video'));

    var elements = document.getElementsByClassName('elem');
    if (document.getElementById('ulPapelera').getElementsByTagName('li').length == 1){
        var li = document.getElementsByClassName('footer_papelera')[0];
        li.innerHTML = '<label>La papelera se encuentra vacía</label>';
    }
    var action = "DELETE";
    var data = "idTablon="+idTablon+"&idElem="+idElem+"&action="+action;
    var url = '../controladores/controlador_tablon.php';
    var type = 'POST';
    ajaxCall(data,url,type);
}

function addUser(idTablon, correo) {
    var action = "SHARE";
    var correo = document.getElementById("container_tablon");
    var data = "idTablon="+idTablon+"&correo="+correo+"&action="+action;
    var url = '../controladores/controlador_tablon.php';
    var type = 'POST';
    ajaxCall(data,url,type);
}

function enviarPapelera(idTablon, elem){
    var action = "DISCARD";
    var data = "idTablon="+idTablon+"&idElem="+elem+"&action="+action;
    var url = '../controladores/controlador_tablon.php';
    var type = 'POST';
    ajaxCall(data,url,type);
}

function recuperaElemento(idTablon, divid){
    var idElem = divid.parentNode.id;
    var elem = document.getElementById(idElem);
    idElem = idElem.replace('li','');

    var titulo = elem.getElementsByTagName('p')[0];
    var elemClass = elem.getElementsByTagName('div')[0].className;
    document.getElementById("ulPapelera").removeChild(elem);
    if (document.getElementById('ulPapelera').getElementsByTagName('li').length == 1){
        var li = document.getElementsByClassName('footer_papelera')[0];
        li.innerHTML = '<label>La papelera se encuentra vacía</label>';
    }
    var div = document.createElement('div');
    div.id = 'elem'+ idElem;
    if (elemClass == 'note'){
        div.className = 'container_nota';
        div.innerHTML = '<div class="elemento_tablon_nota" > <h5> ' + titulo.innerHTML + '</h5> </div> <div class="eliminar_elemento" onclick = "deleteElement(this);" ></div> <div class="mostrar_contenido"></div>';
    }
    else{
        if (elemClass == 'img'){
            div.className = 'container_imagen';
            var url = elem.getElementsByTagName('div')[0].innerHTML;
            div.innerHTML = '<div class="elemento_tablon_titulo"> <h5>' + titulo.innerHTML + '</h5> </div> <img class="elemento_tablon_imagen" src="' + url + ' "> <div class="eliminar_elemento" onclick = "deleteElement(this);" ></div> <div class="mostrar_contenido"></div>';
        }
        else{
            div.className = 'container_video';
            var url = elem.getElementsByTagName('div')[0].innerHTML;
            div.innerHTML = '<div class="elemento_tablon_titulo"> <h5> ' + titulo.innerHTML + '</h5> </div> <iframe width="300" height="156" src="' + url + '?autoplay=0&showinfo=0&controls=2&autohide=1" frameborder="0" allowfullscreen></iframe> <div class="eliminar_elemento" onclick = "deleteElement(this);" ></div> <div class="mostrar_contenido"></div>';
        }
    }
    
    document.getElementById("container_tablon").appendChild(div);
    div.onmousedown= document.getElementById("sample").onmousedown;
    div.onmouseup = document.getElementById("sample").onmouseup;
    editarPosicion(getCookie("idTablon"),idElem,0,0);
    
    var action = "RECOVER";
    var data = "idTablon="+idTablon+"&idElem="+idElem+"&action="+action;
    var url = '../controladores/controlador_tablon.php';
    var type = 'POST';
    ajaxCall(data,url,type);
}

function emptyTrash(idTablon){
    var ul = document.getElementById('ulPapelera');
    var li = document.getElementsByClassName('footer_papelera')[0];
    var idElem;
    var count = 0;
    while (ul.children.length > 1){
        idElem = ul.children[0].id.substring(2);
        restarID_Li(0,idElem, document.getElementsByClassName('liPapelera'));
        restarID(idElem, document.getElementsByClassName('container_nota'));
        restarID(idElem, document.getElementsByClassName('container_imagen'));
        restarID(idElem, document.getElementsByClassName('container_video'));
        ul.removeChild(ul.children[0]);
    }
    li.innerHTML = '<label>La papelera se encuentra vacía</label>';
    var action = "EMPTY";
    var data = "idTablon="+idTablon+"&action="+action;
    var url = '../controladores/controlador_tablon.php';
    var type = 'POST';
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

function configPerm(idTablon, correo, privilegio){
    var action = "ADMIN";
    var data = "idTablon="+idTablon+"&correo="+correo+"&privilegio="+privilegio+"&action="+action;
    var url = '../controladores/controlador_tablon.php';
    var type= 'POST';
    ajaxCall(data,url,type);
}

function addfile(){
	var div = document.createElement("div");
    //div.id = obtainNewId();
    //div.className = 'container_nota';
	var titulo = document.getElementById("nombre_nota");
    var descripcion = document.getElementById("contenido_nota");
	var url =  "";
	var container = document.getElementById("container_tablon");
	alert("Hola");
	filepicker.setKey("A2bjrTOyRhL7KMmFeZJ6gz");
	filepicker.pick(
	  {
		mimetypes: ['image/*', 'video/*', 'text/plain'],
		container: 'window',
		services:['COMPUTER', 'FACEBOOK', 'GMAIL','DROPBOX','IMAGE_SEARCH','FLICKR','FTP','GITHUB','GOOGLE_DRIVE','SKYDRIVE','PICASA','URL','WEBCAM','INSTAGRAM','ALFRESCO','CUSTOMSOURCE','CLOUDDRIVE','VIDEO'],
	  },
	  function(Blob){
		alert("2");
		console.log(JSON.stringify(Blob));
		alert("3");
		url.value = Blob.url;
		alert("4");
		var tipo = Blob.mimetype;
		alert("5");
		alert(" el tipo es " +tipo);
		var idElemento = obtainNewId();
		div.innerHTML = "<div id=\"elem"+idElemento+"\" class=\"container_nota\" style=\"left: 0px; top: 0px;\" onmousedown=\"mydragg.startMoving(this);\" onmouseup=\"mydragg.stopMoving(this);\">"+
							"<div class=\"elemento_tablon_nota\" > <h5>"+titulo.value+"</h5></div>"+
							"<div class=\"eliminar_elemento\" onclick = \"deleteElement(this);\" ></div>"+
							"<div id=\"mostrar_contenido_"+idElemento+"\" class=\"mostrar_contenido\"></div>"+
						"</div>"
		alert(div.innerHTML);
		div.id = "elem"+idElemento;
		//if (tipo == "text/plain")){
			appendChild(div,'Pequeno', 'TEXTO', titulo.value, descripcion.value, url.value);
		//}
		
	  },
	  function(FPError){
		console.log(FPError.toString());
	  }
	);
	
	/*Blob from a previous pick, etc.*/
	var blob = {
	url: 'https://www.filepicker.io/api/file/gkssQj1GQTa2AkTP0qNQ',
	filename: 'prueba.txt',
	mimetype: 'text/plain',
	isWriteable: true,
	size: 30
	};

	console.log("Loading "+blob.filename);
	filepicker.read(blob,function(data){
		console.log(data);
	});

    //url.value = urlToEmbed(url.value);
	

}

function ajaxCall(data,url,type){
    $.ajax({
        data:  data,
        url:   url,
        type:  type,
    });
}