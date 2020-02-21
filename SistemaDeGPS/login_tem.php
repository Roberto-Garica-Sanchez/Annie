<?php
    //host: localhost  
    //usuario: gps
    //constraseña: gps1234
    //Base de datos: gps
    $conexion = mysqli_connect('localhost','gps','gps1234','gps'); //inicia comunicasion a  servidor 
    if (!$conexion) {  //verifica la conexion, si detecta un error devulve una mensaje, y el error 
        die("Connection failed: " . mysqli_connect_error());
    }
?>