$(document).ready(function() {
    $('#loginBtn').on('click', function() {
        // Obtener los valores del formulario
        var usuario = $('#usuarioInput').val();
        var contrasena = $('#contrasenaInput').val();

        // Realizar la solicitud AJAX
        $.ajax({
            type: 'POST',
            url: 'session.php',
            data: {
                usuario: usuario,
                contrasena: contrasena,
            },
            success: function(response) {
                console.log(response);
                // Manejar la respuesta del servidor
                if (response == 1) {  // Cambiado a == en lugar de ===
                    // Redirigir a la página principal o realizar acciones necesarias
                    Swal.fire({
                        icon: 'success',
                        title: '¡Éxito!',
                        text: 'Inicio de sesión exitoso.',
                        timer: 2000,
                        showConfirmButton: false
                    }).then(function() {
                        window.location.href = 'index.php';
                    });
                } else if(response == 0) {  // Agregado else if
                    // Redirigir a la página oneingreso.php
                    Swal.fire({
                        icon: 'success',
                        title: '¡Éxito!',
                        text: 'Inicio de sesión exitoso.',
                        timer: 2000,
                        showConfirmButton: false
                    }).then(function() {
                        window.location.href = 'oneingreso.php';
                    });
                } else {
                    // Mostrar mensaje de error al usuario
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Credenciales inválidas. Por favor, inténtalo de nuevo.'
                    });
                }
            },
            error: function() {
                // Manejar errores de la solicitud AJAX
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Error al procesar la solicitud. Por favor, inténtalo de nuevo.'
                });
            }
        });
    });
});
