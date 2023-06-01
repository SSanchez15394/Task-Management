<?php
if (!empty($_POST['email'])) {
    if (empty($_POST['email'])) {
        echo "rellena los campos";
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
            if (password_verify($contrasenia, $row['contrasenia'])) {
                // Damos acceso al usuario
                header('location:index.php');
            } else {
                $errorMessage = 'Email o contraseñas incorrectos. Por favor revísa los campos.';
            }
            // Cerramos la conexión a la BBDD
            mysqli_close($conexion);
        }
    }
}
