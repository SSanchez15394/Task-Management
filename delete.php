<?php
include("./database/db.php");
session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM tareas WHERE id_tarea = $id";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Consulta fallida");
    }

    $_SESSION['message'] = 'Tarea eliminada con éxito';
    $_SESSION['message_type'] = 'danger';
    header('Location: tareas.php');
    exit;
}
?>
