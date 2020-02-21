<meta charset="utf-8"/>
<?php
  // Preguntamos si llego una variable llamada ‘valor’ mediante POST
  if(isset($_POST["Chofer"])){
    // Enviamos mensaje para POST
    echo "<hola>Hola mundo! por POST\n</hola>";
  }
  // Preguntamos si llego una variable llamada ‘valor’ mediante GET
  if(isset($_GET["Chofer"])){
    // Enviamos mensaje GET
    echo "Hola mundo! por GET\n";
  }
?>