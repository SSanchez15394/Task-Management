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
}

if (isset($_POST['update'])) {
	$id = $_GET['id'];
	$title = $_POST['title'];
	$description = $_POST['description'];

	$query = "UPDATE tareas SET title = ?, description = ? WHERE id_tarea = ?";
	$stmt = mysqli_prepare($conn, $query);
	mysqli_stmt_bind_param($stmt, "ssi", $title, $description, $id);
	$result = mysqli_stmt_execute($stmt);

	if (!$result) {
		die("Consulta fallida");
	}

	$_SESSION['message'] = 'Tarea actualizada con éxito';
	$_SESSION['message_type'] = 'warning';
	header('Location: index.php');
}

?>

<?php include("includes/header.php") ?>
<style>
	body {
		background-color: #e9ebef;
	}
</style>
<div class="p-4">
	<div class="row">
		<div class="col-md-4 mb-4">
			<div class="card card-body ">
				<form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
					<div class="form-group">
						<input type="text" name="title" value="<?php echo $title; ?>" class="form-control" placeholder="Título de la tarea" autofocus>
					</div>
					<div class="form-group">
						<textarea name="description" rows="2" class="form-control" placeholder="Descripción"><?php echo $description; ?></textarea>
					</div>
					<button class="btn btn-primary btn-block" name="update">Actualizar</button>
				</form>
			</div>
		</div>
	</div>
</div>