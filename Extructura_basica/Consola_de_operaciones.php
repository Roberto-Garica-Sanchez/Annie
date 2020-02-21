<?php
    
    include_once($_SERVER["DOCUMENT_ROOT"]."/libre_v5.php");
    if(empty($libre_v5))$libre_v5= new libre_v5('php7',$conexion,'');
    echo"<div id='consola1' class='consola1'>";
        if(!empty($consola))echo$consola;
    echo"</div>";
    echo"<div id='DivOperadores' class='DivOperadores'>";
                    //input($type,$name,$value,$id,$class,$title,$libre,$style)
        echo $libre_v5->input('submit','Operadores','Guardar'   ,'','Boton_menu1','','','');
        echo $libre_v5->input('submit','Operadores','Modificar' ,'','Boton_menu1','','','');
        echo $libre_v5->input('submit','Operadores','Limpiar'   ,'','Boton_menu1','','','');
        echo $libre_v5->input('submit','Operadores','Eliminar'  ,'','Boton_menu1','','','');
    echo"</div>";

?>