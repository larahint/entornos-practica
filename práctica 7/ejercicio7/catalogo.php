<?php
$conexion = mysqli_connect("localhost","root","","compras");
$reg = mysqli_query($conexion,"select * from catalogo");
while($fila = mysqli_fetch_array($reg)) {
  echo $fila['producto']." - $".$fila['precio']." ";
  echo "<a href='carrito.php?id=".$fila['id']."'>Agregar</a><br>";
}
?>