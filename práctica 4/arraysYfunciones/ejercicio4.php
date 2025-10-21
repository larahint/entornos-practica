<?php

function comprobar_nombre_usuario($nombre_usuario){
  // tamaño válido
  if (strlen($nombre_usuario) < 3 || strlen($nombre_usuario) > 20){
    echo $nombre_usuario . " no es válido<br>";
    return false;
  }

  // caracteres permitidos
  $permitidos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789-_";
  for ($i = 0; $i < strlen($nombre_usuario); $i++){
    if (strpos($permitidos, substr($nombre_usuario, $i, 1)) === false){
      echo $nombre_usuario . " no es válido<br>";
      return false;
    }
  }

  echo $nombre_usuario . " es válido<br>";
  return true;
}


$tests = [
  "ab",                          // demasiado corto (2)
  "abc",                         // válido (3)
  "usuario_ok",                  // válido (letras + _)
  "User-123",                    // válido (letras + - + números)
  "con espacio",                 // inválido (espacio)
  "demasiado_largo_de_nombre_123", // inválido (>20)
  "inv@lido",                    // inválido (@ no permitido)
  "ok_",                         // válido
  "OK-99",                       // válido
  "___",                         // válido (3 guiones bajos)
];

echo "<h3>Resultados de prueba</h3>";
foreach ($tests as $t) {
  comprobar_nombre_usuario($t);
}
?>