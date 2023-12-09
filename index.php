<?php
include("session.php");
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Panel de Control - Mobiliario Escolar</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
  <!-- ... tus otras etiquetas head ... -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
  <!-- Agregar los enlaces a los estilos de Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <!-- Agregar el enlace al archivo de estilo personalizado -->
  <link rel="stylesheet" href="style.css">
  <style>
    body {
      background-color: #343a40;
    }

    .navbar-dark {
      background-color: #495057;
    }

    .login-container {
      max-width: 80%;
      margin: 10px auto;
      background-color: #495057;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .login-container h2 {
      color: #17a2b8;
      margin-bottom: 20px;
    }

    .user-icon {

      color: #17a2b8;
      text-align: center
      ;
      /* Color del ícono de usuario */
      padding: 5px;
      cursor: pointer;
    }

    .intro {
      color: #17a2b8;
    }
  </style>
</head>

<body>

  <!-- Barra de navegación -->
  <nav class="navbar navbar-expand-lg navbar-dark ">
    <a class="navbar-brand" href="#">Mobiliario Escolar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Reparaciones</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Inventario</a>
        </li>
        <!-- Nuevo: Ícono de usuario y menú desplegable -->
        <!-- Nuevo: Ícono de usuario y menú desplegable -->
        <li class="nav-item dropdown">
          <div class="user-icon" data-toggle="dropdown">
            <i class="fa fa-user-circle fa-2x" aria-hidden="true"></i>
            <?php
            echo $_SESSION['user_name'] ?>
          </div>
          <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="logout.php">Cerrar Sesión</a>
          </div>
        </li>

      </ul>
    </div>
  </nav>
  <!-- Botón "Añadir Aula" debajo de la barra de navegación -->
  <div class="container mt-4">
    <!-- Botón visible en pantallas grandes (escritorio) -->
    <button type="button" class="btn btn-primary d-none d-lg-block" data-toggle="modal" data-target="#addAulaModal">
      Añadir Aula
    </button>
    <!-- Botón visible en pantallas pequeñas (móvil) -->
    <button type="button" class="btn btn-primary btn-block d-block d-lg-none" data-toggle="modal"
      data-target="#addAulaModal">
      Añadir Aula
    </button>
  </div>

  <!-- Contenido principal -->
  <section class="intro">
    <div class="container mt-4">
      <div class="table-responsive">
        <!-- Agregar la clase "table-rounded" a la tabla -->
        <table class="table table-bordered table-rounded mb-0">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Numero del Aula</th>
              <th scope="col" class="d-none d-lg-table-cell">Capacidad</th>
              <th scope="col" class="d-none d-lg-table-cell">Ubicación</th>
              <th scope="col" class="d-none d-lg-table-cell">Tipo</th>
              <th scope="col">Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php
            include "connection.php";

            // Consulta SQL para obtener las aulas
            $sql = "SELECT Numero, capacidad, ubicacion, Tipo FROM aulas";
            $result = $conn->query($sql);

            // Verificar si hay resultados
            if ($result->num_rows > 0) {
              // Iterar sobre las filas de resultados
              while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                  <td>
                    <?php echo $row['Numero']; ?>
                  </td>
                  <td class="d-none d-lg-table-cell">
                    <?php echo $row['capacidad']; ?>
                  </td>
                  <td class="d-none d-lg-table-cell">
                    <?php echo $row['ubicacion']; ?>
                  </td>
                  <td class="d-none d-lg-table-cell">
                    <?php echo $row['Tipo']; ?>
                  </td>
                  <td>
                    <!-- Botones "Eliminar" y "Editar" -->
                    <div class="btn-group" role="group">
                      <button type="button" class="btn btn-danger btn-sm px-3">
                        <i class="fas fa-times"></i> Eliminar
                      </button>
                      <button type="button" class="btn btn-warning btn-sm px-3">
                        <i class="fas fa-pencil-alt"></i> Editar
                      </button>
                      <button type="button" class="btn btn-info btn-sm px-3">
                        <i class="fas fa-info-circle"></i> Ver info
                      </button>
                    </div>
                  </td>
                </tr>
                <?php
              }
            }

            // Cerrar conexión
            $conn->close();
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>




  <!-- Modal para añadir aula -->
  <div class="modal fade" id="addAulaModal" tabindex="-1" role="dialog" aria-labelledby="addAulaModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addAulaModalLabel">Añadir Aula</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- Contenido del formulario para añadir aula -->
          <form id="addAulaForm">
            <div class="form-group">
              <label for="fotoInput">Foto del Aula <i class="fas fa-info-circle" data-toggle="tooltip"
                  data-placement="top" title="Carga una foto del aula"></i></label>
              <input type="file" class="form-control" id="fotoInput" accept="image/*" required>
            </div>
            <div class="form-group">
              <label for="numeroInput">Número del Aula <i class="fas fa-info-circle" data-toggle="tooltip"
                  data-placement="top" title="Ingresa el número del aula"></i></label>
              <input type="text" class="form-control" id="numeroInput" placeholder="Ej. 101" required>
            </div>
            <div class="form-group">
              <label for="ubicacionInput">Ubicación <i class="fas fa-info-circle" data-toggle="tooltip"
                  data-placement="top" title="Ingresa la ubicación del aula"></i></label>
              <input type="text" class="form-control" id="ubicacionInput" placeholder="Ej. Edificio A" required>
            </div>
            <div class="form-group">
              <label for="capacidadInput">Capacidad del Aula <i class="fas fa-info-circle" data-toggle="tooltip"
                  data-placement="top" title="Ingresa la capacidad del aula"></i></label>
              <input type="number" class="form-control" id="capacidadInput" placeholder="Ej. 30" required>
            </div>
            <div id="botonesInforme" style="display: none;">
              <button type="button" class="btn btn-secondary" id="botonInforme1">añadir reparaciones</button>
              <button type="button" class="btn btn-info" id="botonInforme2">añadir mobiliario</button>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary" id="guardarAulaBtn">Guardar</button>
          <button type="button" class="btn btn-success" id="iniciarInformeBtn">Iniciar Informe</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal para añadir reparaciones -->
  <div class="modal fade" id="addReparacionesModal" tabindex="-1" role="dialog"
    aria-labelledby="addReparacionesModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addReparacionesModalLabel">Añadir Reparaciones</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- Contenido del formulario para añadir reparación -->
          <form id="addReparacionForm">
            <div class="form-group">
              <label for="tituloReparacionInput">Título <i class="fas fa-info-circle" data-toggle="tooltip"
                  data-placement="top" title="Ingresa el título de la reparación"></i></label>
              <input type="text" class="form-control" id="tituloReparacionInput" required>
            </div>
            <div class="form-group">
              <label for="descripcionMobiliarioInput">Descripción <i class="fas fa-info-circle" data-toggle="tooltip"
                  data-placement="top" title="Ingresa la descripción del mobiliario"></i></label>
              <textarea class="form-control" id="descripcionMobiliarioInput" rows="3" required></textarea>
            </div>
            <div class="form-group">
              <label for="fechaReparacionInput">Fecha <i class="fas fa-info-circle" data-toggle="tooltip"
                  data-placement="top" title="Selecciona la fecha de la reparación"></i></label>
              <input type="date" class="form-control" id="fechaReparacionInput" required>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary" id="guardarReparacionBtn">Guardar</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal para añadir mobiliario -->
  <div class="modal fade" id="addMobiliarioModal" tabindex="-1" role="dialog" aria-labelledby="addMobiliarioModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addMobiliarioModalLabel">Añadir Mobiliario del Aula</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- Contenido del formulario para añadir mobiliario -->
          <form id="addMobiliarioForm">
            <div class="form-group">
              <label for="cantidadMobiliarioInput">Cantidad <i class="fas fa-info-circle" data-toggle="tooltip"
                  data-placement="top" title="Ingresa la cantidad de mobiliario"></i></label>
              <input type="number" class="form-control" id="cantidadMobiliarioInput" required>
            </div>
            <div class="form-group">
              <label for="descripcionMobiliarioInput">Descripción <i class="fas fa-info-circle" data-toggle="tooltip"
                  data-placement="top" title="Ingresa la descripción del mobiliario"></i></label>
              <textarea class="form-control" id="descripcionMobiliarioInput" rows="3" required></textarea>
            </div>
            <div class="form-group">
              <label for="estadoMobiliarioInput">Estado <i class="fas fa-info-circle" data-toggle="tooltip"
                  data-placement="top" title="Ingresa el estado del mobiliario"></i></label>
              <input type="text" class="form-control" id="estadoMobiliarioInput" required>
            </div>
            <div class="form-group">
              <label for="observacionMobiliarioInput">Observación <i class="fas fa-info-circle" data-toggle="tooltip"
                  data-placement="top" title="Ingresa alguna observación sobre el mobiliario"></i></label>
              <textarea class="form-control" id="observacionMobiliarioInput" rows="3"></textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary" id="guardarMobiliarioBtn">Guardar</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Scripts de Bootstrap (jQuery y Popper.js son requeridos) -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <!-- Scripts adicionales para activar el tooltip y validar el formulario -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>


  <!-- Scripts adicionales para gestionar los nuevos modales -->

  <script>
    $(function () {
      $('[data-toggle="tooltip"]').tooltip();

      // Mostrar botones en el modal de añadir aula al hacer clic en "Iniciar Informe"
      $('#iniciarInformeBtn').on('click', function () {
        // Mostrar los botones del informe
        $('#botonesInforme').show();
      });

      // Validación del formulario
      $('#guardarAulaBtn, #iniciarInformeBtn').on('click', function () {
        if ($('#addAulaForm')[0].checkValidity()) {
          // Si el formulario es válido, puedes continuar con el guardado o iniciar informe
          Swal.fire({
            icon: 'success',
            title: 'Operación exitosa',
            text: 'La información se ha guardado correctamente.'
          });
        } else {
          // Si el formulario no es válido, muestra un mensaje de error
          Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Por favor, completa todos los campos.'
          });

          // Ocultar los botones del informe si el formulario no es válido
          $('#botonesInforme').hide();
        }
      });

      // Mostrar modal de añadir reparaciones al hacer clic en "Botón Informe 1"
      $('#botonInforme1').on('click', function () {
        $('#addReparacionesModal').modal('show');
      });

      // Mostrar modal de añadir mobiliario al hacer clic en "Botón Informe 2"
      $('#botonInforme2').on('click', function () {
        $('#addMobiliarioModal').modal('show');
      });

      // Validación del formulario de reparaciones
      $('#guardarReparacionBtn').on('click', function () {
        if ($('#addReparacionForm')[0].checkValidity()) {
          // Si el formulario es válido, puedes continuar con el guardado
          Swal.fire({
            icon: 'success',
            title: 'Operación exitosa',
            text: 'Las reparaciones se han guardado correctamente.'
          });
          $('#addReparacionesModal').modal('hide');
        } else {
          // Si el formulario no es válido, muestra un mensaje de error
          Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Por favor, completa todos los campos.'
          });
        }
      });

      // Validación del formulario de mobiliario
      $('#guardarMobiliarioBtn').on('click', function () {
        if ($('#addMobiliarioForm')[0].checkValidity()) {
          // Si el formulario es válido, puedes continuar con el guardado
          Swal.fire({
            icon: 'success',
            title: 'Operación exitosa',
            text: 'El mobiliario se ha guardado correctamente.'
          });
          $('#addMobiliarioModal').modal('hide');
        } else {
          // Si el formulario no es válido, muestra un mensaje de error
          Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Por favor, completa todos los campos.'
          });
        }
      });
    });
  </script>
</body>

</html>