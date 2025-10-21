<?php
if(isset($_POST['estilo'])) {
    setcookie('estilo', $_POST['estilo'], time()+3600*24*30); // 30 días
    header("Location: ejercicio1.php");
}
$estilo = isset($_COOKIE['estilo']) ? $_COOKIE['estilo'] : 'claro';
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="<?php echo $estilo; ?>.css">
</head>
<body>
<form method="post">
  <label>Elige estilo:</label>
  <select name="estilo">
    <option value="claro">Claro</option>
    <option value="oscuro">Oscuro</option>
  </select>
  <button type="submit">Guardar</button>
</form>
</body>
</html>