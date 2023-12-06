$(document).ready(function () {
    $('#guardarCambiosBtn').click(function () {
      // Obtener valores de los campos
      const nuevoUsuario = $('#usuarioInput').val();
      const nuevaContrasena = $('#contrasenaInput').val();
  
      // Enviar variables a tu servidor por AJAX
      $.ajax({
        type: 'POST',
        url: 'oneingreso_action.php', // Cambia esto con la ruta correcta a tu script PHP
        data: {
          nuevoUsuario: nuevoUsuario,
          nuevaContrasena: nuevaContrasena,
        },
        success: function (response) {
          if (response == 0) {
            Swal.fire({
              icon: 'success',
              title: 'Cambios guardados con éxito',
              showConfirmButton: false,
              timer: 1500
            }).then(function () {
              // Redirigir a login.php
              window.location.href = 'login.php';
            });
          }else if(response == 1){
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'La nueva contraseña no puede ser igual a la contraseña actual.',
              });
          }else {
            Swal.fire({
              icon: 'error',
              title: 'Error',
              text: 'Hubo un problema al guardar los cambios. Inténtalo de nuevo.',
            });
          }
        },
        error: function () {
          // Manejar errores de AJAX
          Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Hubo un problema al comunicarse con el servidor. Inténtalo de nuevo.',
          });
        },
      });
    });
  });
  