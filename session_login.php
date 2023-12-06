<?php
include('connection.php');
session_start();


$user_check = $_SESSION['nombre'];

$ses_sql = mysqli_query($conn, "SELECT usuarios.id,usuarios.nombre, localidades.id_evaluador, localidades.id FROM usuarios INNER JOIN localidades ON usuarios.id = localidades.id_evaluador WHERE usuarios.nombre = '$user_check';");
$vec = mysqli_fetch_row($ses_sql);
//  $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

$id_usr = $vec[0];
$id_loc = $vec[3];

if (!isset($_SESSION['nombre'])) {
    header("location:login.php");
    // die();
} else {
    header("location:index.php");

}
?>