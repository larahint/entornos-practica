<?php
session_start();

if (!isset($_SESSION['paginas'])) {
  $_SESSION['paginas'] = 0;
}

$_SESSION['paginas']++;

?>
<!doctype html>
<html lang="es">
<head><meta charset="utf-8"><title>Contador de sesión</title></head>
<body style="font-family:Arial;padding:20px">
  <h1>Páginas visitadas en esta sesión</h1>
  <p>Total: <strong><?php echo (int)$_SESSION['paginas']; ?></strong></p>

  <p>
    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">Recargar</a> |
    <a href="?reset=1">Reiniciar contador</a>
  </p>
</body>
</html>
<?php