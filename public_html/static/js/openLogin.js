/*Estas dos funciones controlan el funcionamiento de la caja de Login y Registro.
Esconde ambas cajas y si detecta algun click sobre Login y registro las muestra.
En caso de abrir Login el Registro se cierra y viceversa.*/

$(document).ready(function(){
	$("#div_registro").hide();
	$("#trigger_registro").click(function () {
		$("#div_login").hide();
	    $("#div_registro").show();
	});
	$(".cerrar_registro_y_login").click(function(){
 		$("#div_registro").hide();
	});
});

$(document).ready(function(){
	$("#div_login").hide();
	$("#trigger_login").click(function () {
		$("#div_registro").hide();
	    $("#div_login").show();
	});
	$(".cerrar_registro_y_login").click(function(){
 		$("#div_login").hide();
	});
});