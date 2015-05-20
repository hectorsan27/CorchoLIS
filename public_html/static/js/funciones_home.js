$(document).ready(function(){
    $(".descripcion").dotdotdot({
        ellipsis    : '... '
    });
});


function openBoard(correo,idTablon,codigo){
    var action = "OPENBOARD";
    document.cookie="idTablon="+idTablon;
    var data = "correo="+correo+"&idTablon="+idTablon+"&action="+action;
    var url = 'controladores/controlador_tablon.php';
    var type= 'POST';
    ajaxCall(data,url,type);
    window.location ="/public_html/tablon/"+codigo;
}

/*function deleteBoard(idTablon) {
    var id = div.parentNode.parentNode.id;
    var tablones = document.getElementsByClassName('tablones')[0];
    tablones.removeChild(tablones.children[id]);*/
$(document).ready(function(){
    $('[id^="eliminar-"]').each(function() {
        $(this).click(function(){
            var id = $(this).attr('id');
            var id_num = id.split('-');
            var idTablon = id_num[2];
            $(this).parent().parent().remove();
            var action = "DELETEBOARD";
            var data = "idTablon="+idTablon+"&action="+action;
            var url = 'controladores/controlador_tablon.php';
            var type= 'POST';
            ajaxCall(data,url,type);
        });
    });
});
/*
    var action = "DELETEBOARD";
    var data = "idTablon="+idTablon+"&action="+action;
    var url = 'controladores/controlador_tablon.php';
    var type= 'POST';
    ajaxCall(data,url,type);
}*/

function ajaxCall(data,url,type){
    $.ajax({
        data:  data,
        url:   url,
        type:  type,
    });
}