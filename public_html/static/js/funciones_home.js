$(document).ready(function(){
	$(".descripcion").dotdotdot({
		ellipsis	: '... '
	});
});

/*
function addBoard(correo){
    var action = "ADDBOARD";
    var data = "correo="+correo+"&action="+action;
    var url = 'controladores/controlador_tablon.php';
    var type= 'POST';
    ajaxCall(data,url,type);
    window.location ="/public_html/home";
}*/

function openBoard(correo,idTablon,codigo){
    var action = "OPENBOARD";
    document.cookie="idTablon="+idTablon;
    var data = "correo="+correo+"&idTablon="+idTablon+"&action="+action;
    var url = 'controladores/controlador_tablon.php';
    var type= 'POST';
    ajaxCall(data,url,type);
    window.location ="/public_html/tablon/"+codigo;
}

function ajaxCall(data,url,type){
    $.ajax({
        data:  data,
        url:   url,
        type:  type,
    });
}