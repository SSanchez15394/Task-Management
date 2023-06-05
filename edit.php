<?php
include("./database/db.php");
session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM tareas WHERE id_tarea = $id";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Consulta fallida");
    }

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $title = $row['title'];
        $description = $row['description'];
    }
}

if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $etiqueta = $_POST['etiqueta'];

    $query = "UPDATE tareas SET title = ?, description = ?, etiqueta = ? WHERE id_tarea = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "sssi", $title, $description, $etiqueta, $id);
    $result = mysqli_stmt_execute($stmt);

    if (!$result) {
        die("Consulta fallida");
    }

    $_SESSION['message'] = 'Tarea actualizada con éxito';
    $_SESSION['message_type'] = 'warning';
    header('Location: tareas.php');
}

?>

