$(document).ready(function(){
	$(".descripcion").dotdotdot({
		ellipsis	: '... '
	});
});

function addBoard(correo){
	var action = "ADDBOARD";
	alert(correo);
	$.ajax({
                data: "correo="+correo+"&action="+action,
                url:   'controladores/controlador_tablon.php',
                type:  'POST',
        });
}