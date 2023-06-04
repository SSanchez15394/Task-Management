<?php include("./database/db.php") ?>
<?php include("includes/header.php") ?>
<?php session_start(); ?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link rel="stylesheet" href="./style-home.css">

<div class="container-fluid">
	<div style="display: flex; flex-wrap: wrap;">
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
			<a href="home.php" class="navbar-brand font-weight-bold">
				Task-Management <i class="fas fa-check-double"></i>
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
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

				</ul>
				<div class="dropdown">
					<a href="./exit.php" class="text-white font-weight-bold mr-3">
						<i class="fas fa-sign-out-alt"></i> Cerrar sesión
					</a>
					
				</div>
				
			</div>
			


			<div style="display: flex; flex-wrap: wrap;">
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
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>