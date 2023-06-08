<?php include("./database/db.php") ?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="./style-home.css">
	<title>Task-Management</title>
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
		<a href="#" class="navbar-brand font-weight-bold">
			Task-Management <i class="fas fa-check-double"></i>
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse fix" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto" id="searchResults">
				<li class="nav-item active ml-1">
					<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
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
	<div class="row">
		<div class="col-3 col-sidebar mt-4">
			<ul class="nav flex-column">
				<li class="nav-item">
					<a class="nav-link" href="#">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="./tareas.php">Tareas</a>
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
				<table class="table table-bordered w-100">
					<div id="content">
						<div class="welcome-section mt-2 ml-3">
							<h1 class="ml-1"><strong>Bienvenido a Task-Management</strong></h1>
							<p></p>
							<h2>El gestor de tareas web para todo el mundo</h2><br>
							<h3>Todas tus tareas en un mismo sitio. <br>
								En la organización está el éxito.</h3> <br>
							<h3>Task-Management se creó para poder dar al usuario <br> de una manera fácil,
								cómoda y sencilla, una forma de poder añadir y organizar mejor su agenda teniendo <br> un total control de sus tareas de una manera
								muy sencilla.</h3>
							<p>
							<h3>Con una interfaz amigable, esta web está pensada <br> para personas menos habituadas con el mundo <br> tecnológico, que no quieran complejas maneras de edición y que al final no les guste la aplicación
								debido a su compleiidad.</h3>
						</div>
					</div><br>
					<footer class="footer">
						<div class="container text-center">
							<p>&copy; Task-Management 2022-2023</p>
						</div>
					</footer>
			</div>
		</div>
	</div>
</body>
<script src="./search.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</html>