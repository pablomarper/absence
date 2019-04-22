/* JQUERY */

$(document).ready(function($) {

    /* Estilo al boton del menú activo */

    $('nav table tr td a').click(function() {
        $('td a.activo').removeClass('activo');
        $(this).addClass('activo');
    });

    /* Ocultar/Aparecer menú usuario */

    $('.fa-user-circle').click(function() {
        $('#user ul').slideToggle(300);
    });

    
});