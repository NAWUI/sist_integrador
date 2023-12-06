 $(document).ready(function () {
    // Función para guardar el aula
    function guardarAula() {
      // Obtener los valores del formulario
      var foto = $("#fotoInput").val();
      var numero = $("#numeroInput").val();
      var ubicacion = $("#ubicacionInput").val();
      var capacidad = $("#capacidadInput").val();

      // Realizar la petición AJAX para guardar los datos
      $.ajax({
        type: "POST",
        url: "guardar_aula.php", // Cambia esto por la URL de tu script de guardado en el servidor
        data: {
          foto: foto,
          numero: numero,
          ubicacion: ubicacion,
          capacidad: capacidad
        },
        success: function (response) {
          // Manejar la respuesta del servidor
          console.log(response); // Puedes imprimir la respuesta en la consola para depuración

          // Verificar si el mensaje es "Aula guardada exitosamente"
          if (response.trim() === "Aula guardada exitosamente") {
            // Mostrar SweetAlert2 con el mensaje de éxito
            Swal.fire({
              icon: 'success',
              title: 'Éxito',
              text: response,
              confirmButtonText: 'Aceptar'
            });

            // Cerrar el modal después de guardar
            $("#addAulaModal").modal("hide");

            // Limpiar los campos del formulario
            $("#fotoInput, #numeroInput, #ubicacionInput, #capacidadInput").val("");
          } else {
            // Mostrar SweetAlert2 con el mensaje de error
            Swal.fire({
              icon: 'error',
              title: 'Error',
              text: response,
              confirmButtonText: 'Aceptar'
            });
          }
        },
        error: function (error) {
          // Manejar errores en la petición AJAX
          console.error("Error al guardar el aula:", error);
        }
      });
    }

    // Asignar la función guardarAula al evento de clic del botón "Guardar"
    $("#guardarAulaBtn").click(function () {
      guardarAula();
    });
  });
