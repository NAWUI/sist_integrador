<?php
session_start();

// Destruir todas las variables de sesión
session_unset();

// Destruir la sesión
session_destroy();

// Redireccionar a la página de inicio de sesión u otra página deseada
header("Location: login.php");
exit();
?>