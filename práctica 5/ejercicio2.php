<?php
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
?>
<!doctype html>
<html lang="es">
<head><meta charset="utf-8"><title>Contacto</title></head>
<body style="font-family:Arial;padding:20px">
  <h1>Contacto</h1>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
    <label>Nombre:<br><input type="text" name="nombre" required></label><br><br>
    <label>Email:<br><input type="email" name="email" required></label><br><br>
    <label>Mensaje:<br><textarea name="mensaje" rows="6" required></textarea></label><br><br>
    <button type="submit">Enviar</button>
  </form>
</body>
</html>
<?php
  exit;
}


$nombre  = trim($_POST['nombre'] ?? '');
$email   = trim($_POST['email'] ?? '');
$mensaje = trim($_POST['mensaje'] ?? '');

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  exit("Email inválido.");
}

$to      = "webmaster@tu-dominio.com";
$subject = "Contacto desde el sitio";
$body = "
<!doctype html><html><body>
<h2>Nuevo contacto</h2>
<p><strong>Nombre:</strong> ".htmlspecialchars($nombre)."</p>
<p><strong>Email:</strong> ".htmlspecialchars($email)."</p>
<p><strong>Mensaje:</strong><br>".nl2br(htmlspecialchars($mensaje))."</p>
</body></html>";

$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=UTF-8\r\n";
$headers .= "From: Form Contacto <no-reply@tu-dominio.com>\r\n";
$headers .= "Reply-To: ".$email."\r\n";

echo mail($to, $subject, $body, $headers) ? "Enviado" : "No se pudo enviar";