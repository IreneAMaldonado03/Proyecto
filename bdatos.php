<?php

$servername = "localhost:3307";
$database = "registro_pw";
$db_username = "root";
$db_password = "";


$conn = new mysqli($servername, $db_username, $db_password, $database);

if ($conn->connect_error) {
    die("La conexion falló" . $conexion->connect_error);
}
?>