<?php
if(isset($_POST['noticia'])) {
    setcookie('noticia', $_POST['noticia'], time()+3600*24*30);
    header("Location: ejercicio4.php");
}
$tipo = $_COOKIE['noticia'] ?? 'todas';
?>
<form method="post">
  <input type="radio" name="noticia" value="politica"> Política
  <input type="radio" name="noticia" value="economia"> Economía
  <input type="radio" name="noticia" value="deportes"> Deportes
  <button type="submit">Guardar</button>
</form>
<a href="borrar.php">Borrar preferencia</a>

<?php
if($tipo == 'todas' || $tipo == 'politica') echo "<h2>Noticia política...</h2>";
if($tipo == 'todas' || $tipo == 'economia') echo "<h2>Noticia económica...</h2>";
if($tipo == 'todas' || $tipo == 'deportes') echo "<h2>Noticia deportiva...</h2>";
?>