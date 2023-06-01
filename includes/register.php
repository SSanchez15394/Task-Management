<?php
// NUEVO REGISTRO
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST["newEmail"]) && !empty($_POST["newPassword"])) {
        include('./database/db.php');

        // ENCRIPTAREMOS Y VERIFICAREMOS LA CONTRASEÑA
        $newEmail = $_POST["newEmail"];
        $newPassword = $_POST['newPassword'];
        $confirmPassword = $_POST["confirmPassword"];

        if ($newPassword !== $confirmPassword) {
            $errorMessage = 'Las contraseñas no coinciden.';
        } else {
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

            // INSERTAREMOS NUEVOS DATOS
            $stmt = $conn->prepare("INSERT INTO usuarios(email, contrasenia) VALUES (?, ?)");
            $stmt->bind_param("ss", $newEmail, $hashedPassword);

            if ($stmt->execute()) {
                $_SESSION['registrationSuccess'] = true;
                header("Location:./new-user.php");
                exit();
            } else {
                echo 'Error en el registro. Por favor inténtelo de nuevo más tarde.';
            }

            // CERRAR LA CONEXIÓN A LA BASE DE DATOS
            $stmt->close();
            $conn->close();
        }
    }
}
