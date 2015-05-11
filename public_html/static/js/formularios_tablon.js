/*
	FORMULARIOS VISTA_INICIO
*/
$(document).ready(function(){
	$(".fondo_oscurecido").hide();
});

$(document).ready(function(){
	$("#div_registro").hide();
	$("#trigger_registro").click(function () {
		$(".fondo_oscurecido").fadeIn();
	    $("#div_registro").show("scale");
	});
});

$(document).ready(function(){
	$("#div_login").hide();
	$("#trigger_login").click(function () {
		$(".fondo_oscurecido").fadeIn();
	    $("#div_login").show("scale");
	});
});

$(document).ready(function(){
	$(document).mouseup(function(e) {
	  if( (e.target.id != 'div_login' && !$('#div_login').find(e.target).length) && (e.target.id != 'div_registro' && !$('#div_registro').find(e.target).length)) {
	    $("#div_login").hide("scale");
	    $("#div_registro").hide("scale");
	    $(".fondo_oscurecido").fadeOut();
	  }
	});
});

/*
	FORMULARIOS VISTA_HOME
*/

/*Formulario añadir tablón*/
$(document).ready(function(){
	$("#div_anadir_tablon").hide();
	$("#anadir_tablon_privado").click(function () {
		$(".fondo_oscurecido").fadeIn();
	    $("#div_anadir_tablon").show("scale");
	});
});

$(document).ready(function(){
	$(document).mouseup(function(e) {
	if(e.target.id != 'div_anadir_tablon' && !$('#div_anadir_tablon').find(e.target).length) {
	    $("#div_anadir_tablon").hide("scale");
	    $(".fondo_oscurecido").fadeOut();
	  }
	});
});

/*
	FORMULARIOS VISTA_TABLON
*/

/*Formulario añadir elemento al tablon*/
$(document).ready(function(){
	$("#anadir_elemento").hide();
	$("#div_anadir").click(function () {
		if ($("#anadir_elemento").is(':visible')) {
			$("#anadir_elemento").hide("drop",{direction: "vertical" });
		} else {
			$("#formulario_nota").show();
			$("#anadir_elemento").show("drop",{direction: "vertical" });		
		}
	});
});
/*Formulario papelere*/
$(document).ready(function(){
	$("#papelera").hide();
	$("#div_papelera").click(function () {
		if ($("#papelera").is(':visible')) {
			$("#papelera").hide("drop",{direction: "vertical" });
		} else {
			$("#formulario_papelera").show();
			$("#papelera").show("drop",{direction: "vertical" });
			
		}
	});
});
/*Formulario compartir tablon*/
$(document).ready(function(){
	$("#compartir_tablon").hide();
	$("#div_compartir").click(function () {
		if ($("#compartir_tablon").is(':visible')) {
			$("#compartir_tablon").hide("drop",{direction: "vertical" });
		} else {
			$("#formulario_invitar").show();
			$("#compartir_tablon").show("drop",{direction: "vertical" });
			
		}
	});
});
/*Formulario administrar usuarios*/
$(document).ready(function(){
	$("#permisos").hide();
	$("#div_permisos").click(function () {
		if ($("#permisos").is(':visible')) {
			$("#permisos").hide("drop",{direction: "vertical" });
		} else {
			$("#formulario_permisos").show();
			$("#permisos").show("drop",{direction: "vertical" });
			
		}
	});
});

/*Cerrar formulario al clicar fuera de él*/
$(document).ready(function(){
	$(document).mouseup(function(e) {
	  if(e.target.id != 'anadir_elemento' && !$('#anadir_elemento').find(e.target).length) {
	    $("#anadir_elemento").hide("drop",{direction: "vertical" });
	    $("#formulario_imagen").hide();
		$("#formulario_video").hide();
		$("#formulario_nota").hide();

	  }
	   if(e.target.id != 'permisos' && !$('#permisos').find(e.target).length) {
	    $("#permisos").hide("drop",{direction: "vertical" });
	    $("#formulario_permisos").hide();
	  }
	  if(e.target.id != 'compartir_tablon' && !$('#compartir_tablon').find(e.target).length) {
	    $("#compartir_tablon").hide("drop",{direction: "vertical" });
	    $("#formulario_invitar").hide();
	  }
	  if(e.target.id != 'papelera' && !$('#papelera').find(e.target).length) {
	    $("#papelera").hide("drop",{direction: "vertical" });
	    $("#formulario_papelera").hide();
	  }
	});
	
	$(".aceptar").click(function(){
		$("#anadir_elemento").hide("drop",{direction: "vertical" });
		$("#invitar").hide("drop",{direction: "vertical" });
		$("#administrar").hide("drop",{direction: "vertical" });
	});
});

$(document).ready(function(){
	$("#formulario_imagen").hide();
	$("#formulario_video").hide();
	$("#formulario_nota").hide();

	$("#elemento_seleccion_imagen").click(function () {
		$("#formulario_video").hide();
		$("#formulario_nota").hide();
	    $("#formulario_imagen").show();
	});
		$("#elemento_seleccion_video").click(function () {
		$("#formulario_imagen").hide();
		$("#formulario_nota").hide();
	    $("#formulario_video").show();
	});
		$("#elemento_seleccion_enlace").click(function () {
		$("#formulario_video").hide();
		$("#formulario_nota").hide();
		$("#formulario_imagen").hide();
	});
		$("#elemento_seleccion_texto").click(function () {
		$("#formulario_video").hide();
		$("#formulario_imagen").hide();
	    $("#formulario_nota").show();
	});
});
$(document).ready(function(){
	$(".anadir_elemento_cerrar").click(function () {
	    $("#anadir_elemento").hide();
	});
});
