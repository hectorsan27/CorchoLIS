/*Estas dos funciones controlan el funcionamiento de la caja de Login y Registro.
Esconde ambas cajas y si detecta algun click sobre Login y registro las muestra.
En caso de abrir Login el Registro se cierra y viceversa.*/
$(document).ready(function(){
	$(".fondo_oscurecido").hide();
});

$(document).ready(function(){
	$("#div_registro").hide();
	$("#trigger_registro").click(function () {
		$(".fondo_oscurecido").fadeIn();
	    $("#div_registro").show("scale",{direction: "vertical" });
	});
});

$(document).ready(function(){
	$("#div_login").hide();
	$("#trigger_login").click(function () {
		$(".fondo_oscurecido").fadeIn();
	    $("#div_login").show("scale",{direction: "vertical" });
	});
});

$(document).ready(function(){
	$(document).mouseup(function(e) {
	  if( (e.target.id != 'div_login' && !$('#div_login').find(e.target).length) && (e.target.id != 'div_registro' && !$('#div_registro').find(e.target).length)) {
	    $("#div_login").hide("scale",{direction: "vertical" });
	    $("#div_registro").hide("scale",{direction: "vertical" });
	    $(".fondo_oscurecido").fadeOut();
	  }
	});
});