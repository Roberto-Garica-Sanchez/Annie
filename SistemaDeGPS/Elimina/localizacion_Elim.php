<?php
    $consulta="DELETE FROM localizacion WHERE ID_G='".$_POST['ID']."'";
    $resu=mysqli_query($conexion,$consulta)or die("Error".mysqli_error($conexion));
    $consola=$consola."<a class='MMM'>Registros borrados: ".mysqli_affected_rows($conexion)."</a>";
?>