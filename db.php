<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "portafolio_progiv";

$conexion = mysqli_connect($host, $user, $pass, $db, 3096);

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}
?>