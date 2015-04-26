//Hace que el contenido y  la presentacion ocupe toda la pantalla verticalmente (outerHeight es el height + padding y borders)//
$(document).ready(function(){  
   $('#content').outerHeight($(window).height() - $(header).outerHeight());
   $('#presentacion').outerHeight($(window).height() - $(footer).outerHeight());

   $('#salto_1').click(function() {
   		 $('html, body').stop().animate({
	        'scrollTop': $('#presentacion').offset().top
	    }, 900, 'swing');
   		return false; //Para que no se modifique la URL//
	});

   $('#salto_2').click(function() {
       $('html, body').stop().animate({
          'scrollTop': $('#header').offset().top /*Hasta header porque esta encima del top*/
      }, 900, 'swing');
      return false; //Para que no se modifique la URL//
  });

    $( window ).resize(function() {
  		$('#content').outerHeight($(window).height() - $(header).outerHeight());
   		$('#presentacion').outerHeight($(window).height() - $(footer).outerHeight());
	});

});