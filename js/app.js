
/* JavaScript */

// Función para validar formulario de registro

function validarRegis(e) {
    var formularioValido = true;
    e.preventDefault();

    var tipo = document.getElementById('tipo').value;
    var nombre = document.getElementById('nombre').value;
    var apellido1 = document.getElementById('ape1').value;
    var apellido2 = document.getElementById('ape2').value;
    var email = document.getElementById('email').value;
    var user = document.getElementById('usuario').value;
    var pass = document.getElementById('passw').value;
    var repass = document.getElementById('repassw').value;
    var condi = document.getElementById('poli').checked;

    var tipoValido = tipoUsuarioCorrecto(tipo);
    var camposTexto = camposConContenido(nombre, apellido1, apellido2);
    var emailValido = emailCorrecto(email);
    var passValida = passCorrecta(pass, repass);

    $('.error').remove();
    $('#titulo').append('<div class="error"></div>');

    if (!tipoValido) {
        $('.error').append('<p>Seleccione un tipo de usuario</p>');
        formularioValido = false;
    }

    if (!camposTexto) {
        $('.error').append('<p>Nombre y apellidos del usuario obligatorios</p>');
        formularioValido = false;
    }

    if (!emailValido) {
        $('.error').append('<p>Email incorrecto</p>');
        formularioValido = false;
    }

    if (!passValida) {
        $('.error').append('<p>Contraseña incorrecta</p>');
        formularioValido = false;
    }

    if (!condi) {
        $('.error').append('<p>Acepta las condiciones de privacidad</p>');
        formularioValido = false;
    }

    if (formularioValido) {
        $.ajax({
            type: 'POST',
            url: 'registrar.php',
            data: { 'tipo': tipo, 'user': user, 'nom': nombre.toUpperCase(), 'apellido1': apellido1.toUpperCase(), 'apellido2': apellido2.toUpperCase(), 'correo': email, 'password': pass },
            success: function () {
                $('.error').remove();
                $('#titulo').after("<p class='mensaje'>Usuario Creado</p>");

                $('#tipo').val("")
                $('#usuario').val("");
                $('#nombre').val("");
                $('#ape1').val("");
                $('#ape2').val("");
                $('#email').val("");
                $('#passw').val("");
                $('#repassw').val("");
            }
        });
    }
}

// Función para validar formulario de modificar profesor

function validarModifyProfe(e) {
    var formularioValido = true;
    e.preventDefault();

    var user = document.getElementById('dni').value;
    var nombre = document.getElementById('nom').value;
    var apellido1 = document.getElementById('apellido1').value;
    var apellido2 = document.getElementById('apellido2').value;
    var email = document.getElementById('correo').value;
    var pass = document.getElementById('password').value;
    var repass = document.getElementById('password2').value;

    var camposTexto = camposConContenido(nombre, apellido1, apellido2);
    var emailValido = emailCorrecto(email);
    var passValida = passCorrecta(pass, repass);

    $('.error').remove();
    $('#imagen').append('<div class="error"></div>');

    if (!camposTexto) {
        $('.error').append('<p>Nombre y apellidos del usuario obligatorios</p>');
        formularioValido = false;
    }

    if (!emailValido) {
        $('.error').append('<p>Email incorrecto</p>');
        formularioValido = false;
    }

    if (!passValida) {
        $('.error').append('<p>Contraseña incorrecta</p>');
        formularioValido = false;
    }

    if (formularioValido) {
        $.ajax({
            type: 'POST',
            url: 'profesores/modificarProfesor.php',
            data: { 'user': user, 'nom': nombre.toUpperCase(), 'apellido1': apellido1.toUpperCase(), 'apellido2': apellido2.toUpperCase(), 'correo': email, 'password': pass },
            success: function () {
                $('#perfil h3').after("<p class='mensaje'>Profesor Modificado</p>");

                $('#nom').val("");
                $('#apellido1').val("");
                $('#apellido2').val("");
                $('#correo').val("");
                $('#password').val("");
                $('#password2').val("");
            }
        });
    }
}

// Función para validar formulario de modificar alumno

function validarModifyAlumno(e) {
    var formularioValido = true;
    e.preventDefault();

    var user = document.getElementById('dni').value;
    var nombre = document.getElementById('nom').value;
    var apellido1 = document.getElementById('apellido1').value;
    var apellido2 = document.getElementById('apellido2').value;
    var email = document.getElementById('correo').value;
    var pass = document.getElementById('password').value;
    var repass = document.getElementById('password2').value;

    var camposTexto = camposConContenido(nombre, apellido1, apellido2);
    var emailValido = emailCorrecto(email);
    var passValida = passCorrecta(pass, repass);

    $('.error').remove();
    $('#imagen').append('<div class="error"></div>');

    if (!camposTexto) {
        $('.error').append('<p>Nombre y apellidos del usuario obligatorios</p>');
        formularioValido = false;
    }

    if (!emailValido) {
        $('.error').append('<p>Email incorrecto</p>');
        formularioValido = false;
    }

    if (!passValida) {
        $('.error').append('<p>Contraseña incorrecta</p>');
        formularioValido = false;
    }

    if (formularioValido) {
        $.ajax({
            type: 'POST',
            url: 'alumnos/modificarAlumno.php',
            data: { 'user': user, 'nom': nombre.toUpperCase(), 'apellido1': apellido1.toUpperCase(), 'apellido2': apellido2.toUpperCase(), 'correo': email, 'password': pass },
            success: function () {
                $('#perfil h3').after("<p class='mensaje'>Alumno Modificado</p>");

                $('#nom').val("");
                $('#apellido1').val("");
                $('#apellido2').val("");
                $('#correo').val("");
                $('#password').val("");
                $('#password2').val("");
            }
        });
    }
}

// Función para crear incidencia

var FormuIncidencia = document.getElementById('formuInci');

if (FormuIncidencia) {
    FormuIncidencia.addEventListener('submit', function (e) {
    
        e.preventDefault();
    
        var contador = document.getElementById('contador').value;
        var asignatura = document.getElementById('asignaSelec').value;
        var inciMin = false;
        var numIncidencias = 0;
        
        for (let i = 1; i < contador; i++) {
            var incidencia = document.getElementById('incidencias' + i).value;
    
            if (incidencia != 0) {
                numIncidencias++;
                inciMin = true;
                var alu = document.getElementById('alumno' + i).value;
    
                var hoy = new Date();
    
                var dia = hoy.getDate();
    
                if (dia < 10) {
                    dia = "0" + dia;
                }
    
                var mes = hoy.getMonth() + 1;
    
                if (mes < 10) {
                    mes = "0" + mes;
                }
    
                var ahoraD = dia + "/" + mes + "/" + hoy.getFullYear();
    
                var min = hoy.getMinutes();
    
                if (min < 10) {
                    min = "0" + min;
                }
    
                var hora = hoy.getHours();
    
                if (hora < 10) {
                    hora = "0" + hora;
                }
    
                var ahoraH = hora + ":" + min;
    
                $.ajax({
                    type: 'POST',
                    url: 'profesores/addIncidencias.php',
                    data: { 'ahoraD': ahoraD, 'ahoraH': ahoraH, 'alu': alu, 'asignatura': asignatura, 'incidencia': incidencia },
                    success: function () {
                        $('#alumnosP .error').remove();
                        
                        for (let i = 1; i < contador; i++) {
                            $('#incidencias' + i).val("0")
                        }
                    }
                });
            }
        }

        if (!inciMin) {
            $('#alumnosP h3').after("<p class='error'>Indique alguna incidencia sobre algún alumno</p>");
        } else {
            if (numIncidencias > 1) {
                $('#alumnosP h3').after("<p class='mensaje'>Incidencias Añadidas</p>");
            } else {
                $('#alumnosP h3').after("<p class='mensaje'>Incidencia Añadida</p>");
            }
        }
        
    }, false);
}




// Función para comprobar si el tipo de usuario es correcto

function tipoUsuarioCorrecto(tipo) {
    if (tipo == '1' || tipo == '2') {
        return true;
    }
    return false;
}

// Función para comprobar que campos tengan contenido

function camposConContenido(nombre, apellido1, apellido2) {
    if (nombre != '' && apellido1 != '' && apellido2 != '') {
        return true;
    }
    return false;
}

// Función para comprobar que el correo es correcto

function emailCorrecto(email) {
    var expRegMail = /^[\w]+@{1}[\w]+\.+[a-z]{2,3}$/;
    if (expRegMail.test(email)) {
        return true;
    }
    return false;
}

// Función para comprobar que coinciden las contraseñas y son correctas

function passCorrecta(pass, repass) {
    if (pass != "" && repass != "") {
        if (pass === repass) {
            return true;
        }
    }
    return false;
}

/* JQUERY */

$(document).ready(function ($) {

    /* Ocultar/Aparecer menú usuario */

    $('.fa-user-circle').click(function () {
        $('#user ul').slideToggle(300);
    });

    /* Ocultar/Aparecer menú resposive */

    $('.fa-bars').click(function () {
        $('#menuRes ul').slideToggle(300);
    });

    /* Cargar Asignaturas */

    $('#alumnosP #asignaturas').change(function() {

        var asignatura = $(this).val();
        var idUser = $('#alumnosP #idUsuario').val();
        var param = $('#alumnosP #parametro').val();

        if (param != null) {
            $('#cursos').load('cursos.php?asig=' + asignatura + '&id=' + idUser + '&param=si');
        }else {
            $('#cursos').load('cursos.php?asig=' + asignatura + '&id=' + idUser);
        }
    });

});
