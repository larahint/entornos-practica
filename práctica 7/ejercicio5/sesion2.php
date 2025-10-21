<?php
session_start();
echo "Usuario: " . $_SESSION['usuario'] . "<br>";
echo "Clave: " . $_SESSION['clave'];
?>