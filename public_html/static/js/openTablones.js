/*Estas funciones controlan que se abran los diferentes menus y opciones de la página de trabajo en el tablón*/

$(document).ready(function(){
	$("#anadir_elemento").hide();
	$("#div_anadir").click(function () {
		if ($("#anadir_elemento").is(':visible')) {
			$("#anadir_elemento").hide();
		} else {
			$("#anadir_elemento").show();
		}
	});
});

$(document).ready(function(){
	$("#formulario_imagen").hide();
	$("#formulario_video").hide();
	$("#formulario_texto").hide();
	$("#formulario_enlace").hide();

	$("#elemento_seleccion_imagen").click(function () {
		$("#formulario_video").hide();
		$("#formulario_texto").hide();
		$("#formulario_enlace").hide();
	    $("#formulario_imagen").show();
	});
		$("#elemento_seleccion_video").click(function () {
		$("#formulario_imagen").hide();
		$("#formulario_texto").hide();
		$("#formulario_enlace").hide();
	    $("#formulario_video").show();
	});
		$("#elemento_seleccion_enlace").click(function () {
		$("#formulario_video").hide();
		$("#formulario_texto").hide();
		$("#formulario_imagen").hide();
	    $("#formulario_enlace").show();
	});
		$("#elemento_seleccion_texto").click(function () {
		$("#formulario_video").hide();
		$("#formulario_imagen").hide();
		$("#formulario_enlace").hide();
	    $("#formulario_texto").show();
	});
});
$(document).ready(function(){
	$(".anadir_elemento_cerrar").click(function () {
	    $("#anadir_elemento").hide();
	});
});
