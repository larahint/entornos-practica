<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Buscador de Canciones</title>
</head>
<body>
  <h2>Buscador de Canciones</h2>
  <form method="post">
    <input type="text" name="buscar" placeholder="Ingresa el nombre de la canción">
    <button type="submit">Buscar</button>
  </form>

  <?php
  $conexion = mysqli_connect("localhost", "root", "", "prueba");

  if (!$conexion) {
      die("Error al conectar con la base de datos: " . mysqli_connect_error());
  }

  if (isset($_POST['buscar'])) {
      $dato = $_POST['buscar'];

      $reg = mysqli_query($conexion, "SELECT * FROM buscador WHERE canciones LIKE '%$dato%'");

      if (mysqli_num_rows($reg) > 0) {
          echo "<h3>Resultados:</h3>";
          while ($fila = mysqli_fetch_array($reg)) {
              echo $fila['canciones'] . "<br>";
          }
      } else {
          echo "<p>No se encontraron canciones con ese nombre.</p>";
      }
  }

  mysqli_close($conexion);
  ?>
</body>
</html>