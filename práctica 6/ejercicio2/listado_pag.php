<?php
include("conexion.inc");

$por_pagina = 3;
$pagina = isset($_GET['pagina']) ? max(1, (int)$_GET['pagina']) : 1;
$inicio = ($pagina - 1) * $por_pagina;

// total
$rTotal = mysqli_query($link, "SELECT COUNT(*) AS c FROM Ciudades");
$tot = mysqli_fetch_assoc($rTotal)['c'];
$total_paginas = max(1, (int)ceil($tot / $por_pagina));

// página actual
$sql = "SELECT * FROM Ciudades ORDER BY id LIMIT $inicio, $por_pagina";
$rPage = mysqli_query($link, $sql) or die(mysqli_error($link));
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Listado paginado</title></head>
<body>
  <h3>Listado con paginación</h3>
  <p>Registros: <?php echo $tot; ?> | Página <?php echo $pagina; ?> de <?php echo $total_paginas; ?></p>
  <table border="1" cellpadding="6" cellspacing="0">
    <tr>
      <th>ID</th><th>Ciudad</th><th>País</th><th>Habitantes</th><th>Superficie</th><th>Tiene Metro</th>
    </tr>
    <?php while ($f = mysqli_fetch_assoc($rPage)) { ?>
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

  <p>
  <?php
    for ($i = 1; $i <= $total_paginas; $i++) {
      if ($i == $pagina) echo "<strong>$i</strong> ";
      else echo "<a href='Listado_pag.php?pagina=$i'>$i</a> ";
    }
  ?>
  </p>
  <p><a href="Menu.html">Volver al Menú</a></p>
</body>
</html>
<?php
mysqli_free_result($rPage);
mysqli_free_result($rTotal);
mysqli_close($link);