<?php
    // Incluye el archivo de conexión a la base de datos
    include("./database/db.php");

    if (isset($_POST['submit'])) {
        $title = $_POST['tarea'];
        $description = $_POST['descripcion'];
        $etiqueta = $_POST['etiqueta'];
    

        // Realiza la inserción en la base de datos
        $query = "INSERT INTO tareas (title, description, etiqueta) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sss", $title, $description, $etiqueta);
        $result = $stmt->execute();
        
        if (!$result) {
            die("Consulta fallida");
        }
        
    
        // Mostrar un mensaje de éxito con opción para cerrar manualmente
        echo '<div class="alert alert-success mt-4 alert-dismissible fade show" role="alert">
                Tarea guardada con éxito
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>';
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
