<?php
$to      = "destinatario@ejemplo.com";
$subject = "Prueba HTML";
$message = "
<!doctype html>
<html>
  <body>
    <h2 style='margin:0'>Hola 👋</h2>
    <p>Este mensaje se envió en <strong>HTML</strong> usando <code>mail()</code>.</p>
  </body>
</html>";

$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=UTF-8\r\n";
$headers .= "From: Web <no-reply@tu-dominio.com>\r\n";

$ok = mail($to, $subject, $message, $headers);

echo $ok ? "Correo enviado." : "Fallo al enviar.";