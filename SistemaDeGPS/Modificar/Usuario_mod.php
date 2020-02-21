<?php

    $sql = "UPDATE usuario SET 
        nombre          ='".$_POST['Nombre']."',
        apellido        ='".$_POST['Apellido']."',
        edad            ='".$_POST['Edad']."',
        nota            ='".$_POST['Nota']."'
        WHERE ID_G=".$_POST['ID']."        
    ";
    //include_once('update.php');
    if(!include_once( $direcion_base.'update.php')){
        echo"Error de Carga ->".$direcion_base.'update.php';
    }
    
?>