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

        $_SESSION['message'] = 'Tarea completada.';
        $_SESSION['message_type'] = 'success';
        header('Location: tareas.php');
    }
}
?>

<script>
    // Desvanecer gradualmente el mensaje de éxito
    setTimeout(function() {
        var successMessage = document.querySelector('.alert-success');
        if (successMessage) {
            var opacity = 1;
            var interval = setInterval(function() {
                if (opacity <= 0) {
                    clearInterval(interval);
                    successMessage.remove();
                } else {
                    successMessage.style.opacity = opacity;
                    opacity -= 0.1;
                }
            }, 200);
        }
    }, 3000);
</script>