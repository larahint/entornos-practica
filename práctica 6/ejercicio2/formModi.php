<?php
include("conexion.inc");
$id = (int)($_POST['id'] ?? 0);

$res = mysqli_query($link, "SELECT * FROM Ciudades WHERE id=$id") or die(mysqli_error($link));
if (mysqli_num_rows($res) == 0) {
  echo "Ciudad inexistente.<br><a href='FormModiIni.html'>Continuar</a>";
  mysqli_close($link);
  exit;
}
$fila = mysqli_fetch_assoc($res);
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Editar Ciudad</title></head>
<body>
  <h3>Editar Ciudad #<?php echo $id; ?></h3>
  <form action="Modi.php" method="post">
    <input type="hidden" name="id" value="<?php echo $fila['id']; ?>">
    <label>Ciudad: <input type="text" name="ciudad" value="<?php echo htmlspecialchars($fila['ciudad']); ?>" required></label><br><br>
    <label>País: <input type="text" name="pais" value="<?php echo htmlspecialchars($fila['pais']); ?>" required></label><br><br>
    <label>Habitantes: <input type="number" name="habitantes" value="<?php echo (int)$fila['habitantes']; ?>" required></label><br><br>
    <label>Superficie: <input type="number" step="0.01" name="superficie" value="<?php echo (float)$fila['superficie']; ?>" required></label><br><br>
    <label>Tiene Metro:
      <select name="tieneMetro" required>
        <option value="0" <?php if(!$fila['tieneMetro']) echo 'selected'; ?>>No</option>
        <option value="1" <?php if($fila['tieneMetro']) echo 'selected'; ?>>Sí</option>
      </select>
    </label><br><br>
    <button type="submit">Guardar cambios</button>
  </form>
  <p><a href="Menu.html">Volver al Menú</a></p>
</body>
</html>
<?php
mysqli_free_result($res);
mysqli_close($link);