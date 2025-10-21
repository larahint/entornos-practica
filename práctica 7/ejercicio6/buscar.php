<?php
session_start();
include("conectar.php");
$mail = $_POST['mail'];
$reg = mysqli_query($conexion,"select nombre from alumnos where mail='$mail'");
if($fila = mysqli_fetch_array($reg)) {
    $_SESSION['nombre'] = $fila['nombre'];
    echo "Bienvenido " . $_SESSION['nombre'];
} else {
    echo "Mail no encontrado.";
}