<?php
echo"<div class='formularios'>";
    echo"<div class='titulos'>Gestor de Datos</div>";

    echo libre_v3::input('button','','ID Registro','','','Diseno_botones2','','');
    echo libre_v3::input('text','ID',$_POST['ID'],'','','Diseno_botones3','readonly="readonly"','');

    echo libre_v3::input('button','','TAG Dispositivo','','','Diseno_botones2','','');
    echo libre_v3::input('text','Nombre',$_POST['Nombre'],'','','Diseno_botones3','','');

    echo libre_v3::input('button','','Usuario','','','Diseno_botones2','','');
    echo libre_v3::input('text','Usuario',$_POST['Usuario'],'','','Diseno_botones3','','');

    echo libre_v3::input('button','','N Serie','','','Diseno_botones2','','');
    echo libre_v3::input('text','N_serie',$_POST['N_serie'],'','','Diseno_botones3','','');

    

echo"</div>";

?>