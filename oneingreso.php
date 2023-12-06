<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Cambiar Usuario y Contraseña</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
  <style>
    body {
      background-color: #343a40;
      color: #fff;
    }
    .change-container {
      max-width: 400px;
      margin: 50px auto;
      background-color: #495057;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .change-container h2 {
      color: #17a2b8;
      margin-bottom: 20px;
    }
    .form-group {
      margin-bottom: 20px;
    }
    .btn-info {
      background-color: #007bff;
      border-color: #007bff;
    }
    .btn-info:hover {
      background-color: #0056b3;
      border-color: #0056b3;
    }
  </style>
</head>
<body>

  <div class="container change-container">
    <h2 class="text-center">Cambiar Usuario y Contraseña</h2>
    <form>
      <div class="form-group">
        <label for="usuarioInput">Nuevo Usuario</label>
        <input type="text" class="form-control" id="usuarioInput" placeholder="Ingrese el nuevo usuario" required>
      </div>
      <div class="form-group">
        <label for="contrasenaInput">Nueva Contraseña</label>
        <input type="password" class="form-control" id="contrasenaInput" placeholder="Ingrese la nueva contraseña" required>
      </div>
      <button type="button" class="btn btn-info btn-block" id="guardarCambiosBtn">Guardar Cambios</button>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="js\oneingreso.js"></script>
  <script>
    // SweetAlert2 para mostrar un mensaje al cargar la página
    document.addEventListener('DOMContentLoaded', function () {
      Swal.fire({
        icon: 'info',
        title: 'Primer Ingreso',
        text: 'En el primer ingreso se solicita cambiar el usuario y la contraseña para mayor seguridad.',
      });
    });
  </script>
</body>
</html>
