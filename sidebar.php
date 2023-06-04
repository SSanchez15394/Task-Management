<?php include("./database/db.php") ?>
<?php include("includes/header.php") ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="./style-sidebar.css">
    <title>Task-Management</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a href="sidebar.php" class="navbar-brand font-weight-bold">
            Task-Management <i class="fas fa-check-double"></i>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse fix" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active ml-1">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Tareas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Conócenos</a>
                </li>
                <li class="nav-item dropdown">
                </li>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <form class="form-inline my-2 my-lg-0">

                                <input class="form-control mr-sm-2 ml-3" type="search" placeholder="Buscar" aria-label="Buscar" style="border-radius: 10px;">
                            </form>

                        </li>
                    </ul>
                </div>


            </ul>


            <div class="dropdown">
                <a href="./exit.php" class="text-white font-weight-bold mr-3">
                    <i class="fas fa-sign-out-alt"></i> Cerrar sesión
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
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Tareas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Conócenos</a>
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
                <!-- Modal para añadir nueva tarea -->
                <button class="btn btn-primary mt-4" data-toggle="modal" data-target="#addTaskModal">Añadir nueva tarea</button>
                <div class="modal fade" id="addTaskModal" tabindex="-1" role="dialog" aria-labelledby="addTaskModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-info">
                                <h1 class="modal-title text-dark" id="addTaskModalLabel">Añadir nueva tarea</h1>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Formulario para procesar los datos -->
                                <form method="POST" action="sidebar.php">
                                    <div class="form-group">
                                        <label for="tarea">Tarea</label>
                                        <input type="text" class="form-control" id="tarea" name="tarea" placeholder="Tarea">
                                    </div>
                                    <div class="form-group">
                                        <label for="descripcion">Descripción</label>
                                        <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Descripción"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary" name="submit">Guardar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <?php include('./save.php') ?>

                <div class="mt-5">
                    <a class="nav-link dropdown-toggle" href="#" role="button" id="profileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="profile-image" src="./assets/img/google.png" alt="Imagen de perfil">
                        Perfil
                    </a>
                </div>
            </div>
            <div class="col-9 col-content mt-5">
                <div class="col-md-8">
                    <table class="table table-bordered w-100">
                        <thead class="bg-warning">
                            <tr>
                                <th>ID</th>
                                <th>Tarea</th>
                                <th>Descripción</th>
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
                                        <td class="file"><?php echo $row['id_tarea']; ?></td>
                                        <td class="file"><?php echo $row['title']; ?></td>
                                        <td class="file"><?php echo $row['description']; ?></td>
                                        <!-- Fila donde estarán los botones de opciones -->
                                        <td class="file">

                                            <!-- MODAL PARA EDITAR TAREA -->
                                            <div class="modal fade" id="editModal<?php echo $row['id_tarea']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel<?php echo $row['id_tarea']; ?>" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editModalLabel<?php echo $row['id_tarea']; ?>">Editar tarea</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="edit.php?id=<?php echo $row['id_tarea']; ?>" method="POST">
                                                                <div class="form-group">
                                                                    <input type="text" name="title" value="<?php echo $row['title']; ?>" class="form-control" placeholder="Tarea" autofocus>
                                                                </div>
                                                                <div class="form-group">
                                                                    <textarea name="description" rows="2" class="form-control" placeholder="Descripción"><?php echo $row['description']; ?></textarea>
                                                                </div>
                                                                <button class="btn btn-primary btn-block" name="update">Actualizar</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-center align-center">
                                                <button type="button" class="btn btn-info mr-1" data-toggle="modal" data-target="#editModal<?php echo $row['id_tarea']; ?>">
                                                    <i class="fa fa-marker"></i>

                                                    <button type="button" class="btn btn-success mr-1 marcar-completado" data-toggle="modal" data-target="#completadoModal<?php echo $row['id_tarea']; ?>">
                                                        <i class="fas fa-check"></i>
                                                    </button>

                                                    <!-- MODAL PARA MARCAR TAREA COMO COMPLETADA -->
                                                    <div class="modal fade" id="completadoModal<?php echo $row['id_tarea']; ?>" tabindex="-1" role="dialog" aria-labelledby="completadoModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="completadoModalLabel">Marcar como completado</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    ¿Estás seguro de que deseas marcar esta tarea como completada?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                                    <form action="check.php?id=<?php echo $row['id_tarea']; ?>" method="POST">
                                                                        <button type="submit" class="btn btn-success" name="done">Marcar como completado</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <!-- MODAL PARA ELIMINAR TAREA -->
                                                    <div class="modal fade" id="deleteModal<?php echo $row['id_tarea']; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel<?php echo $row['id_tarea']; ?>" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="deleteModalLabel<?php echo $row['id_tarea']; ?>">Eliminar tarea</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    ¿Estás seguro de que deseas eliminar esta tarea?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                                    <a href="delete.php?id=<?php echo $row['id_tarea']; ?>" class="btn btn-danger">Eliminar</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?php echo $row['id_tarea']; ?>">
                                                        <i class="far fa-trash-alt"></i>
                                                    </button>
                                                    </a>
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
    </div>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
</body>

</html>