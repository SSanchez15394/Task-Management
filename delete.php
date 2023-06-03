<?php
include("./database/db.php");
session_start();

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$query = "SELECT * FROM tareas WHERE id_tarea = $id";
	$result = mysqli_query($conn, $query);

	if (!$result) {
		die("Consulta fallida");
	}

	if (mysqli_num_rows($result) == 1) {
		$row = mysqli_fetch_array($result);
		$title = $row['title'];
		$description = $row['description'];
	}

	if (isset($_POST['done'])) {
		echo "HECHO!";

		$query = "DELETE FROM tareas WHERE id_tarea = $id";
		$result = mysqli_query($conn, $query);

		if (!$result) {
			die("No se pudo eliminar");
		}

		$_SESSION['message'] = "Tarea borrada!";
		$_SESSION['message_type'] = "danger";
		header("location: index.php");
	}
}
?>

<?php include("includes/header.php"); ?>

<style>
	body {
		background-color: #e9ebef;
	}
</style>
<div class="row p-5">
	<div class="mx-auto card" style="background-color: #FFF2CD;">
		<h1 class="card-header bg-warning"><?php echo $title; ?></h1>
		<div class="card-body">
			<h5 class="card-title">Descripción: </h5>
			<p class="card-text"><?php echo $description; ?></p>
			<form action="delete.php?id=<?php echo $_GET['id']; ?>" method="POST">
				<p class="card-text">¿Seguro que quieres borrarla?</p>
				<button class="btn btn-danger btn-block" name="done">¡Si!</button>
			</form>
		</div>
	</div>
</div>