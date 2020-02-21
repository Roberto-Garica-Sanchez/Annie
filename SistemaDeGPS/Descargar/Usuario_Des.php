<?php
     $consulta="SELECT * FROM usuario WHERE ID_G='".$_POST['Descargar']."'";
     $resu=mysqli_query($conexion,$consulta)or die("Error".mysqli_error($conexion));
     mysqli_data_seek($resu,0);
     

    $resultado=mysqli_fetch_array($resu);
     $_POST['ID']=$resultado['ID_G'];
     $_POST['Nombre']=$resultado['nombre'];
     $_POST['Apellido']=$resultado['apellido'];
     $_POST['Edad']=$resultado['edad'];
     $_POST['Nota']=$resultado['nota'];
     
?>