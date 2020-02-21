<?php
    //---------- genera la instruciones en codigo MYSQL para guardar en la tabla localizacion
    //y asigna en orden los variables 
    // si se decea ver la instruciones añada ECHO antes de $sql 
    // echo  $sql=" -----
    $sql = "INSERT INTO usuario (
        nombre,
        apellido,
        edad,
        nota
        ) VALUES (
        '".$_POST['Nombre']."'
        ,'".$_POST['Apellido']."'
        ,'".$_POST['Edad']."'
        ,'".$_POST['Nota']."'
    )";
//    include_once('insert.php');
    if(!include_once( $direcion_base.'insert.php')){
        echo"Error de Carga ->".$direcion_base.'insert.php';
    }
?>