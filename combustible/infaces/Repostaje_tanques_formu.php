<?php
echo"<div class='formularios'>";
echo"<div class='titulos'>Editor Registro</div>";
#
if(empty($view))$view='';
if(empty($validacionFormularo))$validacionFormularo='';

$TextColumna=array(
    'IDTanque'=>'Tanque'
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
include_once('general_interfaces.php');
echo"</div>";
?>