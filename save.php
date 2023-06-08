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
    }
?>
