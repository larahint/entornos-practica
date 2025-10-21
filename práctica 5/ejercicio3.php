<?php
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
?>
<!doctype html>
<html lang="es">
<head><meta charset="utf-8"><title>Recomendá el sitio</title></head>
<body style="font-family:Arial;padding:20px">
  <h1>Recomendá el sitio</h1>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
    <label>Tu nombre:<br><input type="text" name="tu_nombre" required></label><br><br>
    <label>Tu email:<br><input type="email" name="tu_email" required></label><br><br>
    <label>Email de tu amigo/a:<br><input type="email" name="amigo_email" required></label><br><br>
    <button type="submit">Enviar recomendación</button>
  </form>
</body>
</html>
<?php
  exit;
}

$tu_nombre   = trim($_POST['tu_nombre'] ?? '');
$tu_email    = trim($_POST['tu_email'] ?? '');
$amigo_email = trim($_POST['amigo_email'] ?? '');

if (!filter_var($tu_email, FILTER_VALIDATE_EMAIL) || !filter_var($amigo_email, FILTER_VALIDATE_EMAIL)) {
  exit("Algún email es inválido.");
}

$subject = "¡$tu_nombre te recomienda este sitio!";
$body = "
<!doctype html><html><body>
<p>Hola,</p>
<p><strong>$tu_nombre</strong> (<a href='mailto:$tu_email'>$tu_email</a>) te recomienda visitar este sitio:</p>
<p><a href='https://tu-dominio.com'>https://tu-dominio.com</a></p>
</body></html>";

$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=UTF-8\r\n";
$headers .= "From: Recomendaciones <no-reply@tu-dominio.com>\r\n";
$headers .= "Reply-To: $tu_email\r\n";

echo mail($amigo_email, $subject, $body, $headers) ? "Recomendación enviada" : "No se pudo enviar";