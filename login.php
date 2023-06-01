<?php
include('./includes/form-validation.php');
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="./style-login.css">
    <title>Iniciar sesión</title>
</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header">
                    <h3>Acceso:</h3>
                </div>
                <div class="card-body">
                    <form action="./login.php" method="post" autocomplete="on">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email" style="min-width:180px" required>
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" name="contrasenia" id="contrasenia" class="form-control" placeholder="Contraseña" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn float-right login_btn text-truncate" id="submit">Acceso</button>
                        </div>
                        <span class="error-message text-danger"><?php if (isset($row) && !password_verify($contrasenia, $row['contrasenia'])) {
                                                                    echo $errorMessage;
                                                                } ?></span>
                    </form>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-center links">
                        ¿No tienes una cuenta?
                        <a href="./new-user.php">Regístrate</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="./validation.js"></script>

</html>