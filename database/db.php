<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "task-gestor";

// Creamos la conexión con la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificamos conexión 
if ($conn->connect_error) { 
    die ("Conexión fallida: " . $con->connect_error);
}
?>

