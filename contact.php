<?php include("./database/db.php") ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="./style-home.css">
    <link rel="stylesheet" href="./style-contact.css">
    <title>Task-Management</title>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <a href="./home.php" class="navbar-brand font-weight-bold">
                Task-Management <i class="fas fa-check-double"></i>
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse fix" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto" id="searchResults">
                    <li class="nav-item ml-1">
                        <a class="nav-link" href="./home.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./tareas.php">Tareas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Contacto</a>
                    </li>
                    <li class="nav-item dropdown">
                    </li>
                </ul>
            </div>
            <div class="dropdown mr-2">
                <a class="nav-link dropdown-toggle mr-5" href="#" role="button" id="profileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <strong>Perfil</strong>
                    <i class="fa-solid fa-bars ml-1" style="color: #ffffff;"></i>
                </a>
                <div class="dropdown-menu bg-dark" aria-labelledby="profileDropdown">
                    <a class="dropdown-item text-light" href="./exit.php" onmouseover="$(this).addClass('text-dark')" onmouseout="$(this).removeClass('text-dark')">
                        <i class="fa-solid fa-right-to-bracket"></i> Cerrar sesión
                    </a>
                </div>
            </div>
        </nav>
        <div class="row">
            <div class="col-3 col-sidebar mt-4">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="./home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./tareas.php">Tareas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="./contact.php">Contacto</a>
                    </li>
                </ul>
                <div class="card mt-3">
                    <div class="card-header bg-dark text-white">
                        Pendientes:
                    </div>
                    <div class="card-body" id="pendientes">
                        <?php
                        $query = "SELECT * FROM tareas";
                        $resultado = mysqli_query($conn, $query);
                        ?>
                        <h3 class="text-center text-dark"><?php echo $resultado->num_rows; ?></h3>
                    </div>
                    <div class="profile dropdown">
                        <div class="dropdown-menu" aria-labelledby="profileDropdown">
                            <a class="dropdown-item" href="#">Cerrar sesión</a>
                        </div>
                    </div>
                </div>
                <?php include('./modals/nueva-tarea.php') ?>
                <?php include('./save.php') ?>
            </div>
            <div class="col-9 col-content mt-5" style="align-items: center;">
                <div class="col-md-8">
                    <table class="table table-bordered w-100">
                        <div class="card-header bg-dark text-white text-align:center">
                            <h3>Contacto</h3>
                        </div>
                        <div class="card-body">
                            <h5>Datos de contacto</h5>
                            <p></p><i class="fa-regular fa-calendar-days"></i> Horario: Lunes a viernes: 9:00 – 18:00 h</p>
                            <p><i class="fa-solid fa-phone"></i>Teléfono:
                                <a href="tel:+34918109200">+34 918 109 200</a>
                            </p>
                            <p><i class="fa-solid fa-envelope"></i> Email:
                                <a href="mailto:info@UAX.es">info@UAX.es</a>
                            </p>
                            <p><i class="fa-solid fa-location-dot"></i> Ubicación:</a></p>
                            <div id="wrapper-9cd199b9cc5410cd3b1ad21cab2e54d3" style="height: 300px;">
                                <div id="map-9cd199b9cc5410cd3b1ad21cab2e54d3"></div>
                                <a href="https://1map.com/es/map-embed">1 Map</a>
                            </div>
                        </div>
                        <div class="card-footer">
                            <footer class="footer" style="text-align: center;">
                                <p>&copy; Task-Management 2022-2023</p>
                            </footer>
                        </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="./scripts/google-maps.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</html>