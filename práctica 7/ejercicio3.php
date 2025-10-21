<?php
if(isset($_POST['usuario'])) {
    setcookie('usuario', $_POST['usuario'], time()+3600*24*30);
    header("Location: usuario.php");
}
$ultimo = isset($_COOKIE['usuario']) ? $_COOKIE['usuario'] : '';
?>
<form method="post">
  <label>Nombre de usuario:</label>
  <input type="text" name="usuario" value="<?php echo $ultimo; ?>">
  <button type="submit">Guardar</button>
</form>
<p>Último usuario ingresado: <?php echo $ultimo; ?></p>