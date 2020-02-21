<?php  //subir archivo 
    echo $nombre_temporal=$_FILES['archivo']['tmp_name'];
    $nombre=$_FILES['archivo']['name'];
    move_uploaded_file($nombre_temporal,$_SERVER["DOCUMENT_ROOT"].'/archivos_subidos/'.$nombre);
    //echo"ok";
?>