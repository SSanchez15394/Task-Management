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
                <button id="añadirTarea" class="btn btn-primary mt-4" data-toggle="modal" data-target="#addTaskModal"><i class="fa-solid fa-circle-plus"></i> Añadir nueva tarea</button>
                <div class="modal fade" id="addTaskModal" tabindex="-1" role="dialog" aria-labelledby="addTaskModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-info">
                                <h2 class="modal-title text-dark" id="addTaskModalLabel">Añadir nueva tarea</h2>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Formulario para procesar los datos -->
                                <form method="POST" action="tareas.php">
                                    <div class="form-group text-dark">
                                        <h5><label for="tarea">Tarea:</label></h5>
                                        <input type="text" class="form-control" id="tarea" name="tarea" placeholder="Tarea">
                                    </div>
                                    <div class="form-group text-dark">
                                        <h5><label for="descripcion">Descripción:</label></h5>
                                        <h5><textarea class="form-control" id="descripcion" name="descripcion" placeholder="Descripción" maxlength="150"></textarea>
                                    </div>
                                    <div class="form-group text-dark">
                                        <h5><label for="etiqueta">Etiqueta:</label></h5>
                                        <select class="form-control" id="etiqueta" name="etiqueta">
                                            <option value="Trabajo">Trabajo</option>
                                            <option value="Estudios">Estudios</option>
                                            <option value="Casa">Hogar</option>
                                            <option value="Familia">Familia</option>
                                            <option value="Ocio">Ocio</option>
                                            <option value="Otros">Otros</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary" name="submit">Guardar</button>
                                </form>

                            </div>

                        </div>
                    </div>
                </div>


                <?php include('./save.php') ?>

            </div>
            <div class="col-9 col-content mt-5" style="align-items: center;">
                <div class="col-md-8">
                    <table class="table table-bordered w-100">
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
                                            <div class="form-group">
                                                <label for="edit-etiqueta">Etiqueta</label>
                                                <select class="form-control" id="edit-etiqueta" name="etiqueta">
                                                    <option value="Trabajo">Trabajo</option>
                                                    <option value="Trabajo">Estudios</option>
                                                    <option value="Casa">Hogar</option>
                                                    <option value="Familia">Familia</option>
                                                    <option value="Ocio">Ocio</option>
                                                    <option value="Otros">Otros</option>
                                                </select>
                                            </div>
                                            <button class="btn btn-primary btn-block" name="update">Actualizar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

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

                        <div class="card-header bg-dark text-white text-align:center">
                            <h3>Contacto</h3>
                        </div>
                        <div class="card-body">
                            <h6>Datos de contacto</h6>
                            <p></p><i class="fa-regular fa-calendar-days"></i> Horario: Lunes a viernes: 9:00 – 18:00 h</p>
                            <p><i class="fa-solid fa-phone"></i> Teléfono
                                <a href="tel:+34918109200">+34 918 109 200</a>
                            <p><i class="fa-solid fa-location-dot"></i><a href="https://goo.gl/maps/7kCua5R3KrZgWCaaA" target="_blank"> Ubicación</a></p>
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
    </div>

    <script src="./search.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
</body>

</html>