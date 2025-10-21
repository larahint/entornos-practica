<?php
include("conexion.inc");

// Captura y sanea
$ciudad      = trim($_POST['ciudad'] ?? '');
$pais        = trim($_POST['pais'] ?? '');
$habitantes  = (int)($_POST['habitantes'] ?? 0);
$superficie  = (float)($_POST['superficie'] ?? 0);
$tieneMetro  = (int)($_POST['tieneMetro'] ?? 0);

// Inserta
$sql = "INSERT INTO Ciudades (ciudad, pais, habitantes, superficie, tieneMetro)
        VALUES ('$ciudad', '$pais', $habitantes, $superficie, $tieneMetro)";
mysqli_query($link, $sql) or die(mysqli_error($link));

echo "La ciudad fue agregada.<br>";
echo "<a href='Menu.html'>Volver al Menú</a>";

// Cierra
mysqli_close($link);