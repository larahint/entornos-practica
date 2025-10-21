<?php
setcookie('noticia', '', time()-3600);
header("Location: periodico.php");
?>