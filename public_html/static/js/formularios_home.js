/*
	FORMULARIOS VISTA_HOME
*/

$(document).ready(function(){
	$(".fondo_oscurecido").hide();
});

/*Formulario añadir tablón*/
$(document).ready(function(){
	$("#div_anadir_tablon").hide();
	$("#anadir_tablon_privado").click(function () {
		$(".fondo_oscurecido").fadeIn();
	    $("#div_anadir_tablon").show("scale");
	});
});
/*Cierra añadir tablón al hacer click fuera*/
$(document).ready(function(){
	$(document).mouseup(function(e) {
	if(e.target.id != 'div_anadir_tablon' && !$('#div_anadir_tablon').find(e.target).length) {
	    $("#div_anadir_tablon").hide("scale");
	    $(".fondo_oscurecido").fadeOut();
	  }
	});
});
