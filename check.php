<?php
include("./database/db.php");
session_start();


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if (isset($_POST['done'])) {
        $query = "DELETE FROM tareas WHERE id_tarea = $id";
        $result = mysqli_query($conn, $query);

        if (!$result) {
            die("Consulta fallida");
        }
        header('Location: tareas.php');
    }
}
?>