<?php
echo"<div class='formularios'>";
echo"<div class='titulos'>".$title."</div>";
#
if(empty($view))$view='';
if(empty($validacionFormularo))$validacionFormularo='';

$TextColumna=array(
    'of_servicio'=>' Oficial de servicio',
    "HR_LL"=> "Hora Llamada"
);
mysqli_select_db ($conexion ,'combustible');
$Tanques     =$libre_v2->consulta('tanques',$conexion,'','','Nombre','',$phpv,'','');
$ColumnasEspeciales=array(
    'IDTanque'=>array(
        'type'=>'despliegre_mysql',
        'ConsultaMysql'=>$Tanques,
        'DatosMostrar'=>'Nombre'
    ),
    'Estatus'=>array(
        'type'=>'despliegre',
        'ListaDeDatos'=>array('Pendiente','Verificado')
    )
);

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
echo"</div>";
?>