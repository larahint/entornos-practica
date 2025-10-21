<?php
session_start();
$id = $_GET['id'];
$_SESSION['carrito'][] = $id;
echo "Producto agregado. <a href='mostrar.php'>Ver carrito</a>";
?>