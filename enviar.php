<?php
$destinatario = 'sergiosanchez15394@hotmail.com';

// esto es al correo al que se enviard el mensaje
$nombre = $_POST[ 'correo'];
$mensaje = $_POST['mensaje'];


$header = "Enviado desde la pagina de AlexCG Design";
$mensajeCompleto = $mensaje . "\nAtentamente: " . $nombre;

mail($destinatario, $mensajeCompleto, $header) ;
echo "<script>alert('Correo enviado exitosamente')</script>" ;
echo "<script> setTimeout(\'location.href='./contact.php'\",1000)</script>";
?>