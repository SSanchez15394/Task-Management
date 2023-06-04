<?php
    // Incluye el archivo de conexión a la base de datos
    include("./database/db.php");

    // Procesar los datos del formulario cuando se envíe
    if (isset($_POST['submit'])) {
        $title = $_POST['tarea'];
        $description = $_POST['descripcion'];

        // Realiza la inserción en la base de datos
        $query = "INSERT INTO tareas (title, description) VALUES (?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $title, $description);
        $result = $stmt->execute();

        if (!$result){
            die("Consulta fallida");
        }

        // Mostrar un mensaje de éxito
        echo '<div class="alert alert-success mt-4">Tarea guardada con éxito</div>';
    }
    ?>