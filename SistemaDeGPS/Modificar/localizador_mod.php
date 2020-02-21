<?php
    //$sql = "UPDATE agenda SET nombre='$nombre', direccion='$direccion',".

    $sql = "UPDATE localizacion SET
        dispositivo     ='".$_POST['Dispositivo']."',
        longitud        ='".$_POST['Longitud']."',
        latitud         ='".$_POST['Latitud']."',
        fecha          ='".$_POST['Fecha']."',
        hora           ='".$_POST['Hora']."',
        level_battery  ='".$_POST['bateria']."',
        level_signal   ='".$_POST['senal']."',
        pulso           ='".$_POST['pulso']."'
        WHERE ID_G=".$_POST['ID']."        
    ";
    
    //include_once('update.php');
    if(!include_once( $direcion_base.'update.php')){
        echo"Error de Carga ->".$direcion_base.'update.php';
    }
    
    
?>