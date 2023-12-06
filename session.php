<?php
include 'connection.php'; // Tu archivo de conexión a la base de datos

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['usuario'];
    $password = $_POST['contrasena'];
    $cargo = $_POST['cargo'];

    // Verificar las credenciales en la base de datos
    $sql = "SELECT id, cargo, ingreso FROM usuarios WHERE nombre_usuario = ? AND clave = ? AND cargo = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $username, $password, $cargo);
    $stmt->execute();
    $stmt->bind_result($userId, $userCargo, $ingreso);

    if ($stmt->fetch()) {
        // Verificar el valor de ingreso
        if ($ingreso == 0) {
            // Redireccionar a oneingreso.php
            session_start();
            $_SESSION['user_id'] = $userId;
            $_SESSION['user_cargo'] = $userCargo;

            echo 0; // Enviar respuesta al cliente
        } else {
            // Credenciales válidas, iniciar sesión
            session_start();
            $_SESSION['user_id'] = $userId;
            $_SESSION['user_cargo'] = $userCargo;

            echo 1; // Enviar respuesta al cliente
        }
    } else {
        // Credenciales inválidas
        echo 'error';
    }

    $stmt->close();
}
?>
