<?php
    
    echo"<div id='consola' class='consola'>";
        echo$consola;
    echo"</div>";
    echo"<div id='Botones_de_operaciones' class='Botones_de_operaciones'>";
        echo libre_v3::input('submit','Operadores','Guardar','','','Boton_menu1','','');
        echo libre_v3::input('submit','Operadores','Modificar','','','Boton_menu1','','');
        echo libre_v3::input('submit','Operadores','Limpiar','','','Boton_menu1','','');
        echo libre_v3::input('submit','Operadores','Eliminar','','','Boton_menu1','','');
    echo"</div>";

?>