<?php
echo"<div class='formularios'>";
    echo"<div class='titulos'>Gestor de Datos</div>";

    echo libre_v3::input('button','','ID Registro','','','Diseno_botones2','','');
    echo libre_v3::input('text','ID',$_POST['ID'],'','','Diseno_botones3','readonly="readonly"','');

    echo libre_v3::input('button','','Nombre','','','Diseno_botones2','','');
    echo libre_v3::input('text' ,'Nombre',$_POST['Nombre'],'','','Diseno_botones3','','');

    echo libre_v3::input('button','','Apellidos','','','Diseno_botones2','','');
    echo libre_v3::input('text','Apellido',$_POST['Apellido'],'','','Diseno_botones3','','');

    echo libre_v3::input('button','','Edad','','','Diseno_botones2','','');
    echo libre_v3::input('text','Edad',$_POST['Edad'],'','','Diseno_botones3','','');

    echo libre_v3::input('button','','Nota','','','Diseno_botones2','','');
    echo libre_v3::input('text','Nota',$_POST['Nota'],'','','Diseno_botones3','','');
echo"</div>";

?>