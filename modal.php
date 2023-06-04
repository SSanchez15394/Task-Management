<!DOCTYPE html>
<html>
<head>
    <title>Ejemplo de Ventana Modal con PHP</title>
    <!-- Agrega los enlaces a los estilos de Bootstrap y Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <!-- Botón para abrir la ventana modal -->
    <button class="btn btn-primary mt-4" data-toggle="modal" data-target="#exampleModal">Abrir Ventana Modal</button>

    <!-- Ventana modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ventana Modal con PHP</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Formulario para procesar los datos -->
                    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <div class="form-group">
                            <label for="tarea">Tarea</label>
                            <input type="text" class="form-control" id="tarea" name="tarea" placeholder="Ingrese la tarea">
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Ingrese la descripción"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

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
    

    <!-- Agrega los scripts de Bootstrap y jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
