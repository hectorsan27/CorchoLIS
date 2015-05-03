/* Es conde y añade puntos suspensivos a textos que no caben dentro de un Div*/
$(document).ready(function(){
    $(".elemento_tablon_descripcion").dotdotdot({
        ellipsis    : '... '
    });
    $(".elemento_tablon_titulo").dotdotdot({
        ellipsis    : '... '
    });
    $(".elemento_tablon_nota").dotdotdot({
        ellipsis    : '... '
    });
});
