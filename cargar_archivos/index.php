<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <title>Importar Archivo Excel </title>
    
</head>
    <body>  
        <?php 
            //include_once($_SERVER["DOCUMENT_ROOT"]."/libre_v2.php");
            include_once($_SERVER["DOCUMENT_ROOT"]."/CentroDeProcesos.php");
            echo"<script type='text/javascript' language='javascript' src='../cargar_archivos/Backen/subir.js'></script> ";		
        
            echo"<form action='' id='form'>";
                include_once($_SERVER["DOCUMENT_ROOT"]."/cargar_archivos/interfaces/subir_js_formu.php");
                //include_once($_SERVER["DOCUMENT_ROOT"]."/cargar_archivos/Backen/Subir.php");
            echo"</form>";
        ?>
            
    </body>
</html>