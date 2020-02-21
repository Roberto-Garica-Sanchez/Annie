<?php
    //---------- genera la instruciones en codigo MYSQL para guardar en la tabla localizacion
    //y asigna en orden los variables 
    // si se decea ver la instruciones añada ECHO antes de $sql 
    // echo  $sql=" -----
    $sql = "INSERT INTO localizacion (
        dispositivo,
        longitud,
        latitud,
        fecha,
        hora,
        level_battery,
        level_signal,
        pulso
        ) VALUES (
        '".$_POST['Dispositivo']."'
        ,'".$_POST['Longitud']."'
        ,'".$_POST['Latitud']."'
        ,'".$_POST['Fecha']."'
        ,'".$_POST['Hora']."'
        ,'".$_POST['bateria']."'
        ,'".$_POST['senal']."'
        ,'".$_POST['pulso']."'
    )";
    
    if(!include_once( $direcion_base.'insert.php')){
        echo"Error de Carga ->".$direcion_base.'insert.php';
    }
    
?>