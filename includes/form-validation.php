<?php
$errorMessage = ""; // Define la variable $errorMessage vacía al principio

if (!empty($_POST['email'])) {
    if (empty($_POST['email']) || empty($_POST['contrasenia'])) {
        $errorMessage = "Rellena los campos";
    } else {
        session_start();
        include('./database/db.php');

        $email = $_POST["email"];
        $contrasenia = $_POST["contrasenia"];

        // Conectamos a la BBDD
        $conexion = mysqli_connect($servername, $username, $password, $dbname);

        // Verificamos la conexión
        if (!$conexion) {
            die("Error al conectar a la base de datos: " . mysqli_connect_error());
        }

        // Escapamos los datos de entrada para prevenir ataques de inyección SQL
        $email = mysqli_real_escape_string($conexion, $email);

        // Buscamos el usuario y contraseña en nuestra BBDD
        $sql = "SELECT * FROM usuarios WHERE email = '$email'";
        $result = mysqli_query($conexion, $sql);

        // Verificamos que se encontró un usuario
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);

            // Verificamos que la contraseña introducida coincida con la contraseña encriptada en la BBDD
            if (!password_verify($contrasenia, $row['contrasenia'])) {
                $errorMessage = '<script>
                swal({
                    title: "Error",
                    text: "El email o la contraseña son incorrectos.",
                    icon: "error"
                });
            </script>';;
            } else {
                header("Location: home.php");
                exit();
            }

            // Cerramos la conexión a la BBDD
            mysqli_close($conexion);
        }
    }
}
