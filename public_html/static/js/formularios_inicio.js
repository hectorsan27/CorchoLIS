/*
	FORMULARIOS VISTA_INICIO
*/
$(document).ready(function(){
	$(".fondo_oscurecido").hide();
});

/*Formulario  registro*/
$(document).ready(function(){
	$("#div_registro").hide();
	$("#trigger_registro").click(function () {
		$(".fondo_oscurecido").fadeIn();
	    $("#div_registro").show("scale");
	});
});

/*Formulario  login*/
$(document).ready(function(){
	$("#div_login").hide();
	$("#trigger_login").click(function () {
		$(".fondo_oscurecido").fadeIn();
	    $("#div_login").show("scale");
	});
});

/*Cierra los formularios al hacer click fuera*/
$(document).ready(function(){
	$(document).mouseup(function(e) {
	  if( (e.target.id != 'div_login' && !$('#div_login').find(e.target).length) && (e.target.id != 'div_registro' && !$('#div_registro').find(e.target).length)) {
	    $("#div_login").hide("scale");
	    $("#div_registro").hide("scale");
	    $(".fondo_oscurecido").fadeOut();
	  }
	});
});
