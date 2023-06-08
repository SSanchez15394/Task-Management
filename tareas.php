<?php include("./database/db.php") ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./style-home.css">
    <title>Task-Management</title>
</head>

<body>

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
                <li class="nav-item active">
                    <a class="nav-link" href="./tareas.php">Tareas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./contact.php">Contacto</a>
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


    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <form class="form-inline my-2 my-lg-0">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-search"></i>
                                </span>
                            </div>
                            <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Buscar">
                        </div>
                    </form>
                </li>
            </ul>
        </div>


        <div class="row">
            <div class="col-3 col-sidebar mt-4">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="./home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="./tareas.php">Tareas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./contact.php">Contacto</a>
                    </li>
                </ul>
                <div class="card mt-3">
                    <div class="card-header bg-dark text-white">
                        Pendientes:
                    </div>

                    <div class="card-body">
                        <?php
                        $query = "SELECT * FROM tareas";
                        $resultado = mysqli_query($conn, $query);
                        ?>

                        <h3 class="text-center text-dark"><?php echo $resultado->num_rows; ?></h3>
                        <h3 class="text-center">

                        </h3>
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
            <div class="col-9 col-content mt-5">
                <div class="col-md-8">
                    <div class="form-floating my-3">
                        <input type="text" class="form-control" id="search" placeholder="Buscar">
                        <label for="search"></label>
                    </div>
                    <table class="table table-bordered w-100" id="table-search">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tarea</th>
                                <th>Descripción</th>
                                <th>Etiqueta</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM tareas";
                            $result_tasks = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_array($result_tasks)) { ?>
                                <div>
                                    <tr class="table-row">
                                    <tr class="table-row" id="task-<?php echo $row['id_tarea']; ?>">
                                        <td class="file"><?php echo $row['id_tarea']; ?></td>
                                        <td class="file"><?php echo $row['title']; ?></td>
                                        <td class="file"><?php echo $row['description']; ?></td>
                                        <td class="file"><?php echo $row['etiqueta']; ?></td>
                                        <!-- Fila donde estarán los botones de opciones -->
                                        <td class="file">
                                            <div class="d-flex justify-content-center align-center">
                                                <?php include('./modals/editar-tarea.php') ?>
                                                <?php include('./modals/tarea-completada.php') ?>
                                                <?php include('./modals/eliminar-tarea.php') ?>
                                            </div>
                                        </td>
                                    </tr>
                                </div>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="./search.js"></script>

</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</html>