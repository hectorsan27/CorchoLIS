/*Comprueba si el formato de Mail es correcto. Si lo és muestra un efecto visual verde,
en caso contrario rojo.*/

$(document).ready(function(){
	$('#fr_correo').blur(function(){
		var fr_correo = $(this).val();
		var correcto = validarEmail(fr_correo);
		if(!correcto) {
            $('#fr_correo').removeClass('correct');
            $('#fr_correo').addClass('error');
		} else {
            $('#fr_correo').removeClass('error');
            $('#fr_correo').addClass('correct');
		}
		actualizarSubmit();
	});
});

/*Comprueba si el formato de Nombre es correcto. Si lo és muestra un efecto visual verde,
en caso contrario rojo.*/
$(document).ready(function(){
	$('#fr_nombre').blur(function(){
		var fr_nombre = $(this).val();
		var correcto = validarNombre(fr_nombre);
    		if(!correcto) {
            $('#fr_nombre').removeClass('correct');
            $('#fr_nombre').addClass('error');
		} else {
            $('#fr_nombre').removeClass('error');
            $('#fr_nombre').addClass('correct');
		}
		actualizarSubmit();
	});
});

/*Comprueba si el formato de Nacimiento es correcto. Si lo és muestra un efecto visual verde,
en caso contrario rojo.*/
$(document).ready(function(){
	$('#fr_nacimiento').blur(function(){
		var fr_nacimiento = $(this).val();
    	if(fr_nacimiento == "" ) {
            $('#fr_nacimiento').removeClass('correct');
            $('#fr_nacimiento').addClass('error');
		} else {
        $('#fr_nacimiento').removeClass('error');
        $('#fr_nacimiento').addClass('correct');
        }
		actualizarSubmit();
	});
});

/*Comprueba si el formato de Provincia es correcto. Si lo és muestra un efecto visual verde,
en caso contrario rojo.*/
$(document).ready(function(){
	$('#fr_provincia').blur(function(){
		var fr_provincia = $(this).val();
    	if(fr_provincia == "Default" ) {
            $('#fr_provincia').removeClass('correct');
            $('#fr_provincia').addClass('error');
		} else {
        $('#fr_provincia').removeClass('error');
        $('#fr_provincia').addClass('correct');
        }
		actualizarSubmit();
	});
});

/*Comprueba si el formato de Password es correcto. Si lo és muestra un efecto visual verde,
en caso contrario rojo.*/
$(document).ready(function(){
	$('#fr_password').blur(function(){
		var fr_password = $(this).val();
		var correcto = validarPassword(fr_password);
    	if(!correcto) {
            $('#fr_password').removeClass('correct');
            $('#fr_password').addClass('error');
		} else {
            $('#fr_password').removeClass('error');
            $('#fr_password').addClass('correct');
		}
		actualizarSubmit();
	});
});

/*Desabilita por defecto el boton de Registrarse*/
$(document).ready(function(){
	$('#submit_registro').attr("disabled","disabled");
});

/*Comprueba si todos los campos tienen un formato correcto. En caso afirmativo activa
el botón de registro.*/

function actualizarSubmit(){
	var fr_nombre = $('#fr_nombre').val();
	var fr_correo = $('#fr_correo').val();
	var fr_password = $('#fr_password').val();

	if(validarNombre(fr_nombre) && validarEmail(fr_correo) && validarPassword(fr_password)) {
		$('#submit_registro').removeAttr("disabled");
	} else {3
		$('#submit_registro').attr("disabled","disabled");
	}
}

/*Valida el Email mediante expresiones regulares.*/
function validarEmail(fr_correo) {
		var expresionRegularEmail = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i; 
		if( !(expresionRegularEmail.test(fr_correo)) || (fr_correo.length > 64) ) {
			return false;
    	} else {
    		return true;
		}
}

/*Valida el Nombre mediante expresiones regulares*/
function validarNombre(fr_nombre) {
		var expresionRegularNombreUsuario = /^[a-zA-Zà-ú]{1,32}$/;
		if( !(expresionRegularNombreUsuario.test(fr_nombre)) ) {
			return false;
    	} else {
    		return true;
		}
}
/*Valida la Password mediante expresiones regulares*/
function validarPassword(fr_password) {
		var expresionRegularPasswordUsuario = /^[a-z0-9_-]{8,32}$/i;
		if( !(expresionRegularPasswordUsuario.test(fr_password))) {
			return false;
    	} else {
    		return true;
		}
}




