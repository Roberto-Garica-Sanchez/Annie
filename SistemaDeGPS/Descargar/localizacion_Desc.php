<?php
     $consulta="SELECT * FROM localizacion WHERE ID_G='".$_POST['Descargar']."'";
     $resu=mysqli_query($conexion,$consulta)or die("Error".mysqli_error($conexion));
     mysqli_data_seek($resu,0);
     

    $resultado=mysqli_fetch_array($resu);
     $_POST['ID']=$resultado['ID_G'];
     $_POST['Dispositivo']=$resultado['dispositivo'];
     $_POST['Longitud']=$resultado['longitud'];
     $_POST['Latitud']=$resultado['latitud'];
     $_POST['Fecha']=$resultado['fecha'];
     $_POST['Hora']=$resultado['hora'];
     $_POST['bateria']=$resultado['level_battery'];
     $_POST['senal']=$resultado['level_signal'];
     $_POST['pulso']=$resultado['pulso'];

?>