<?php       
    #nombre del Menu
    $name_menu="menu1";

    $elemento_menu= array('Opcion 1','Opcion 2','Opcion 3');
    $file_URLname=  array();
    $otros_arrays=array(
        'img_activa'=> 'false',
        'img_defaul'=>'/img/defaul.jpg',
        'img'=>array("","",'',"",""),
        'memoria'=>array('Activa'=>true,'type'=>'hidden'),
        'ocultar'=>array(
            'Cargas - Compra'=>'true',
            'RdeC'=>'true'
        )
    );
    ########### Ajustes esteticos
    $class=array(
        'Conte_princiapal'=>'Lateral',
        'Div_Opcion'=>'',
        'Boton'=>'Boton_menu1',
        'img'=>''
    );
    $libre_v5->menu($name_menu,$elemento_menu,$class,$otros_arrays);
    $x=0;
    for ($x=0; $x < count($elemento_menu); $x++) { 
        # code...
    }
        echo $elemento_menu[$x];
        $x++;
    }
?>