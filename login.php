<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Iniciar Sesión - Mobiliario Escolar</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
  <style>
    body {
      background-color: #343a40;
      color: #fff;
    }
    .login-container {
      max-width: 400px;
      margin: 50px auto;
      background-color: #495057;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .login-container h2 {
      color: #17a2b8;
      margin-bottom: 20px;
    }
  </style>
</head>
<body>

  <div class="container">
    <div class="login-container">
      <h2 class="text-center">Mobiliario Escolar</h2>
      <form>
        <div class="form-group">
          <label for="usuarioInput">Usuario</label>
          <input type="text" class="form-control" id="usuarioInput" placeholder="Ingrese su usuario" required>
        </div>
        <div class="form-group">
          <label for="contrasenaInput">Contraseña</label>
          <input type="password" class="form-control" id="contrasenaInput" placeholder="Ingrese su contraseña" required>
        </div>
        
    <button type="button" class="btn btn-info btn-block" id="loginBtn">Iniciar Sesión</button>
      </form>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="js/login.js"></script>

</body>
</html>
