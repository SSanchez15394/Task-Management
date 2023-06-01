<?php
session_start();
include("./database/db.php");

if (isset( $_POST['save_task'] )) {
    $title = $_POST['title'];    
    $description = $_POST['description'];

    $query = "INSERT INTO tareas (title, description) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ss", $title, $description);
    $result = mysqli_stmt_execute($stmt);

    if (!$result){
        die("Consulta fallida");
    }

    $_SESSION['message'] = 'Tarea guardada con exito';
    $_SESSION['message_type'] = 'warning';

    header("Location: index.php");
}
?>