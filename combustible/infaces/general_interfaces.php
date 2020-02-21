<?php

$Repostaje= new inface($database,$tabla,$phpv,$conexion);
$array=array(
    'tipo'=>array('formulario'=>'true','lista'=>'false'),
    'class'=>array(
        'columnaFija'=>'Diseno_botones2',
        'casilla'=>'Diseno_botones3',
        'id'=>''
    ),
    'viewValidacion'=>$view,
    'validacionFormularo'=>$validacionFormularo,
    'CambiosColumnas'=> array(
        'TextColumna'=>$TextColumna,                     //remplaza el nombre de una columna contador_inicial -> Inicio de Contador 
        'ColumnasEspeciales'=>$ColumnasEspeciales       //si se activa es te puede ingresar algo diferente a text
    )
);
$Repostaje->interface($array);    
?>