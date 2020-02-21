<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <title>Importar Archivo Excel </title>
</head>
    <body>  
        <?php 
            include_once($_SERVER["DOCUMENT_ROOT"]."/libre_v2.php");

            echo"<script type='text/javascript' language='javascript' src='../cargar_archivos/subir.js'></script> ";
        ?>
        <form action="" id='form_subir'></form>
            <?php
//input2				($type2,$name,$title,$value,$style,$id,$libre,$class)
            echo $libre_v2->input2('file','archivo','','',"",'archivo','form="form_subir"','');
            echo $libre_v2->input2('button','cancelar','','Cancelar',"",'cancelar','form="form_subir"','');
            echo $libre_v2->input2('submit','enviar','','Enviar',"",'subir','form="form_subir"','');
            ?>
            <span id='mensaje'></span>
            <div id='contenedor' style='width: 500px;height: 15px;background: #343434; ' >
                <div id='Barra_procentaje' style='height: 100%;background: yellow;width: 10%;transition-duration: .5s;'></div>
            </div>
            
    </body>
</html>