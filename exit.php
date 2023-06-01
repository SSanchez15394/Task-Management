<?php
session_start();
// Cerramos la sesión actual y regresaremos al login
session_destroy();
header("location:./login.php");
?>