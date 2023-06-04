<?php include("./database/db.php") ?>
<?php include("includes/header.php") ?>
<?php session_start(); ?>

<link rel="stylesheet" href="./style-home.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<div style="display: flex; flex-wrap: wrap;">
    <div style="display: flex; flex-wrap: wrap;">
        <div class="b-example-divider b-example-vr">
            <div class="d-flex flex-column flex-shrink-0 p-3 bg-dark" style="width: 280px;">
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                        <a href="./home.php" class="nav-link" aria-current="page">
                            <svg class="bi pe-none me-2" width="16" height="16">
                                <use xlink:href="#home" />
                            </svg>
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="./mis-tareas.php" class="nav-link link-body-emphasis active">
                            <svg class="bi pe-none me-2" width="16" height="16">
                                <use xlink:href="#speedometer2" />
                            </svg>
                            Mis Tareas
                        </a>
                    </li>

                    <li>
                        <a href="./etiquetas.php" class="nav-link link-body-emphasis">
                            <svg class="bi pe-none me-2" width="16" height="16">
                                <use xlink:href="#people-circle" />
                            </svg>
                            Etiquetas
                        </a>
                    </li>
                </ul>
                <hr>
                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="./assets/img/task-list.png" alt="" width="32" height="32" class="rounded-circle me-2">
                        <strong class="ml-1">Perfil</strong>
                    </a>
                    <ul class="dropdown-menu text-small shadow">
                        <li><a class="dropdown-item" href="./mis-datos.php">Mis datos</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="./exit.php">Cerrar Sesión</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div>
            <div class="p-4">
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <div class="card card-body">
                            <form action="save.php" method="POST">
                                <div class="form-group">
                                    <input type="text" name="title" class="form-control" placeholder="Tarea" autofocus required>
                                </div>
                                <div class="form-group">
                                    <textarea name="description" rows="2" class="form-control" placeholder="Descripción" required></textarea>
                                </div>
                                <div class="form-group">
									<label for="etiquetas">Etiqueta</label>
									<select name="etiqueta" id="etiqueta">
										<option value="Trabajo">Trabajo</option>
										<option value="Casa">Casa</option>
										<option value="Otros">Otros</option>
									</select>
								</div>
                                <input type="submit" class="btn btn-primary btn-block" name="save_task" value="Guardar">

                                <?php if (isset($_SESSION['message'])) { ?>
                                    <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show mt-2" role="alert">
                                        <?= $_SESSION['message'] ?>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                <?php session_unset();
                                } ?>
                            </form>
                        </div>
                        <div class="card mt-2">
                            <div class="card-header">
                                Tareas pendientes:
                            </div>
                            <div class="alert-warning card-body">
                                <?php
                                $query = "SELECT * FROM tareas";
                                $resultado = mysqli_query($conn, $query);
                                ?>

                                <h3 class="text-center"><?php echo $resultado->num_rows; ?></h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <table class="table table-bordered">
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
                                        <tr>
                                            <td class="file"><?php echo $row['id_tarea']; ?></td>
                                            <td class="file"><?php echo $row['title']; ?></td>
                                            <td class="file"><?php echo $row['description']; ?></td>

                                            <td class="file">
                                                <div class="d-flex justify-content-center align-center">
                                                    <a href="edit.php?id=<?php echo $row['id_tarea'] ?>" class="btn btn-info mr-1"><i class="fa fa-marker"></i></a>
                                                    <a href="check.php?id=<?php echo $row['id_tarea'] ?>" class="btn btn-success mr-1"><i class="fas fa-check"></i></a>
                                                    <a href="delete.php?id=<?php echo $row['id_tarea'] ?>" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
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
            <style>
    body {
        background-image: url(./assets/img/task-management.png);
        margin-top: 30px;
    }

    .sidebar {
        height: 100vh;
        position: fixed;
        top: 0;
        left: 0;
        z-index: 1;
        overflow-x: hidden;
        overflow-y: auto;
        transition: all 0.3s;
        padding-top: 56px;
        background-color: #FFF2CD;
    }

    @media (max-width: 767.98px) {
        .sidebar {
            padding-top: 0;
        }
    }
</style>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>