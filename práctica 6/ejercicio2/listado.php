<?php
include("conexion.inc");
$res = mysqli_query($link, "SELECT * FROM Ciudades ORDER BY id") or die(mysqli_error($link));
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Listado de Ciudades</title></head>
<body>
  <h3>Listado completo</h3>
  <table border="1" cellpadding="6" cellspacing="0">
    <tr>
      <th>ID</th><th>Ciudad</th><th>País</th><th>Habitantes</th><th>Superficie</th><th>Tiene Metro</th>
    </tr>
    <?php while ($f = mysqli_fetch_assoc($res)) { ?>
    <tr>
      <td><?php echo $f['id']; ?></td>
      <td><?php echo htmlspecialchars($f['ciudad']); ?></td>
      <td><?php echo htmlspecialchars($f['pais']); ?></td>
      <td><?php echo (int)$f['habitantes']; ?></td>
      <td><?php echo (float)$f['superficie']; ?></td>
      <td><?php echo (int)$f['tieneMetro']; ?></td>
    </tr>
    <?php } ?>
  </table>
  <p><a href="Menu.html">Volver al Menú</a></p>
</body>
</html>
<?php
mysqli_free_result($res);
mysqli_close($link);