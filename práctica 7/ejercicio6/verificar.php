<?php
session_start();
if(isset($_SESSION['nombre']))
    echo "Hola " . $_SESSION['nombre'] . ", bienvenido.";
else
    echo "No puedes acceder a esta página.";
?>