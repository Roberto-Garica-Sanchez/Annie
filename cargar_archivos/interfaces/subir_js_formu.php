
<?php
    include_once($_SERVER["DOCUMENT_ROOT"]."/libre_v2.php");
    echo"<div id='' class='Contenedor_auto1'>";
        
        //echo"<script type='text/javascript' language='javascript' src='ControlArchivos/Backen/subir.js'></script> ";
        echo"<script type='text/javascript' language='javascript' src='/cargar_archivos/Backen/subir.js'></script> ";        
        echo $libre_v2->input2('file','archivo','','',"",'archivo','','inputFile');
        echo $libre_v2->input2('button','cancelar','','Cancelar',"",'cancelar','','Diseno_botones3');
        echo $libre_v2->input2('submit','enviar','','Enviar',"",'subir','','Diseno_botones3');

        
        echo"<div id='mensaje' style='height: 19px;padding: 0px 9px 0px 10px;margin: 5px 0px 5px 0px;'></div>";
        echo"<div id='contenedor' style='min-width: 500px;height: 15px;background: #343434;padding: 5px;border-radius: 4px;margin: 5px 0px;width: 100%;box-shadow: inset 0px 0px 4px 0px blue;    transition-duration: 1s;' >";
            echo"<div id='Barra_procentaje' style='height: 100%;background: yellow;width: 10%;transition-duration: .5s;'></div>";
        echo"</div>";
    echo"</div>";
    /*
    echo"<div id='' class='Contenedor_auto1'>";
        include_once($_SERVER["DOCUMENT_ROOT"].'/cargar_archivos/consultar/Consu_folder.php');
    echo"</div>";
    */
?>
            