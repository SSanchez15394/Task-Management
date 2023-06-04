    <?php include('./includes/register.php') ?>

    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link rel="stylesheet" href="./style-login.css">
        <title>Registrarse</title>
    </head>

    <body>

        <div class="container">
            <div class="d-flex justify-content-center h-100">
                <div class="card">
                    <div class="card-header">
                        <h3>Registro:</h3>
                    </div>
                    <div class="card-body">
                        <form action="./new-user.php" method="post" id="form" class="needs-validation">
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="email" name="newEmail" id="newEmail" class="form-control was-validated" placeholder="Introduce un email" required>
                            </div>
                            <div class="invalid-feedback">
                                Por favor, introduce un email válido.
                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" name="newPassword" id="newPassword" class="form-control was-validated" placeholder="Crea una contraseña" required>
                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                </div>
                                <input type="password" name="confirmPassword" id="confirmPassword" class="form-control was-validated" placeholder="Confirma tu contraseña" required>
                            </div>

                            <div class="form-group">
                                <button type="submit" name="submit" class="btn float-right login_btn" id="registro">Registro</button>
                            </div>
                            <span class="error-message text-danger"></span>
                        </form>
                        <div class="card-footer">
                            <div class="d-flex justify-content-center links">
                                ¿Ya tienes una cuenta?
                                <a href="./login.php">Iniciar sesión</a>
                            </div>

                            <div class="or-line-container">
                                <hr class="or-line">
                                <div class="or-text">o</div>
                                <hr class="or-line">
                            </div>

                            <?php require('autentificacion.php'); ?>
                            <div class="google-login-button">
                                <a href="<?php echo $client->createAuthUrl(); ?> ">
                                    <img class="google-logo" src="https://www.freepnglogos.com/uploads/google-logo-png/google-logo-png-google-icon-logo-png-transparent-svg-vector-bie-supply-14.png" alt="Google Logo">
                                    Accede con Google</a>
                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha384-H+8IQYiVkvA/FFmXQXBbVB8YP0KAe4EwUGYeLZMuvzKt/dO+XpDhsiELiKtvTNPB" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <?php
    if (isset($_SESSION['registrationSuccess'])) {
        echo '<script>
            swal({
                title: "¡Buen trabajo!",
                text: "Has completado el registro exitosamente.",
                icon: "success"
            }).then(function() {
                window.location.href = "./index.php";
            });
        </script>';
        unset($_SESSION['registrationSuccess']);
    } elseif (isset($errorMessage)) {
        echo '<script>
            swal({
                title: "¡Ups!",
                text: "Las contraseñas no coinciden. Vuelva a intentarlo.",
                icon: "error"
            });
        </script>';
    }
    ?>




    </html>