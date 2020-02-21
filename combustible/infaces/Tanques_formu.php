<?php
echo"<div class='formularios'>";
echo"<div class='titulos'>Editor Registro</div>";
if(empty($view))$view='';
$TextColumna=array(
    'Ultimo_Repostaje'=>'Ultimo Repostaje'
);
mysqli_select_db ($conexion ,'almacen');
$Placas     =$libre_v2->consulta('unidades',$conexion,'','','Placas','',$phpv,'','');
mysqli_select_db ($conexion ,'combustible');
$ColumnaBusca='';
$DatoBusca='';
$fechas=array();
#registro Nuevo 
if(empty($_POST['ID'])){
    $fechas[]=date("Y-m-d");
}

#registro Existente 
if(!empty($_POST['ID'])){
    #valida que hay un tanque[Nombre] ingresado 
    if(!empty($_POST['Nombre'])){
        $Fecha_reg=$libre_v2->consulta('tanques',$conexion,'Nombre',$_POST['Nombre'],'Fecha','',$phpv,'','');
        $datos=$libre_v2->mysql_fe_ar($Fecha_reg,$phpv,'');
            $fechas[]=$datos['Fecha'];
        
        $ColumnaBusca='IDTanque';
        $DatoBusca=$_POST['Nombre'];
        $Fechas_rep =$libre_v2->consulta('repostajes_tanques',$conexion,$ColumnaBusca,$DatoBusca,'Fecha','',$phpv,'','');
        while ($datos=$libre_v2->mysql_fe_ar($Fechas_rep,$phpv,'')) {
            $fechas[]=$datos['Fecha'];
        }
    }    
    #tanque sin repostajes 
    #tanque Con repostajes 

}

$ColumnasEspeciales=array(
    /*'Ultimo_Repostaje'=>array(
        'type'=>'data'
    ),*/
    'Ultimo_Repostaje'=>array(
        'type'=>'despliegre',
        'ListaDeDatos'=>$fechas,
    ),
    'Tipo'=>array(
        'type'=>'despliegre',
        'ListaDeDatos'=>array('Estacionario','Movil')
    ),
    'Unidad'=>array(
        'type'=>'despliegre_mysql',
        'ConsultaMysql'=>$Placas,
        'DatosMostrar'=>'Placas'
    )
);
if(empty($validacionFormularo))$validacionFormularo='';

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