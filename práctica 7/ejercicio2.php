<?php
if(isset($_COOKIE['contador'])) {
    $visitas = $_COOKIE['contador'] + 1;
    echo "Has visitado esta página $visitas veces.";
} else {
    $visitas = 1;
    echo "Bienvenido, es tu primera visita.";
}
setcookie('contador', $visitas, time()+3600*24*30);
?>