
<?php
include 'connection.php'; // Tu archivo de conexión a la base de datos

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start();
    // Obtener datos del formulario
    $newUsername = $_POST['nuevoUsuario'];
    $newPassword = $_POST['nuevaContrasena'];

    // Obtener la contraseña actual del usuario
    $sqlCurrentPassword = "SELECT clave FROM usuarios WHERE id = ?";
    $stmtCurrentPassword = $conn->prepare($sqlCurrentPassword);
    $stmtCurrentPassword->bind_param("i", $_SESSION['user_id']); // Suponiendo que ya hay una sesión iniciada
    $stmtCurrentPassword->execute();
    $stmtCurrentPassword->store_result(); // Almacenar los resultados para liberar la consulta
    $stmtCurrentPassword->bind_result($currentPassword);

    if ($stmtCurrentPassword->fetch()) {
        // Verificar si la nueva contraseña es diferente de la antigua
        if ($newPassword !== $currentPassword) {
            // Actualizar el nombre de usuario y contraseña
            $sqlUpdate = "UPDATE usuarios SET nombre_usuario = ?, clave = ?, ingreso = 1 WHERE id = ?";
            $stmtUpdate = $conn->prepare($sqlUpdate);
            $stmtUpdate->bind_param("ssi", $newUsername, $newPassword, $_SESSION['user_id']);

            if ($stmtUpdate->execute()) {
                // Redirigir a login.php después de actualizar
                echo 0;
                exit();
            } else {
                // Manejar el error de actualización
                echo 'Error al actualizar los datos. Por favor, inténtelo de nuevo.';
            }

            $stmtUpdate->close();
        } else {
            // La nueva contraseña es igual a la antigua
            echo 1;
        }
    } else {
        // Manejar el error al obtener la contraseña actual
        echo 'Error al obtener la contraseña actual. Por favor, inténtelo de nuevo.';
    }

    $stmtCurrentPassword->close();
} else {
    // Manejar la solicitud incorrecta
    echo 'Acceso no autorizado.';
}
?>
