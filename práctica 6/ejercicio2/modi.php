<?php
include("conexion.inc");
$id          = (int)($_POST['id'] ?? 0);
$ciudad      = trim($_POST['ciudad'] ?? '');
$pais        = trim($_POST['pais'] ?? '');
$habitantes  = (int)($_POST['habitantes'] ?? 0);
$superficie  = (float)($_POST['superficie'] ?? 0);
$tieneMetro  = (int)($_POST['tieneMetro'] ?? 0);

$sql = "UPDATE Ciudades
        SET ciudad='$ciudad', pais='$pais', habitantes=$habitantes,
            superficie=$superficie, tieneMetro=$tieneMetro
        WHERE id=$id";
mysqli_query($link, $sql) or die(mysqli_error($link));

echo "La ciudad fue modificada.<br><a href='Menu.html'>Volver al Menú</a>";
mysqli_close($link);