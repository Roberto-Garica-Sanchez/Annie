<?php
    include_once($_SERVER["DOCUMENT_ROOT"]."/combustible/infaces/Repostaje_formu.php");
    echo"<div id='' class='' style='padding: 5px;background: red;border-radius: 5px;position: relative;float: left;'>";
    echo"</div>";
    echo"<div class='Contenedor_auto2'>";
    $MySql_complex= new libre_v4('php7',$conexion);
    $MySql_complex->descarga_db('empresa',$conexion,'php7','');
    //$MySql_complex->ViewEstructuraDB();

    $tabla="repostajes";
    $ColumnasInsert     = array('Fecha','Placas','Cliente','Operador','Contador_Inicio','Contador_Final','Total_Despachado') ;
    $ValoresInsert      = array($_POST['Fecha'],$_POST['Placas'],$_POST['Cliente'],$_POST['Operador'],$_POST['Contador_Inicio'],$_POST['Contador_Final'],$_POST['Total_Despachado']);
    $getColumnas        = array('*') ;
    $BuscaColumnas      = array('ID_G') ;
    $BuscaDatos         = array(5);
    $ModifiColumnas     = array('Fecha','Placas','Cliente','Operador','Contador_Inicio','Contador_Final','Total_Despachado') ;
    $ModifiDatos        = array($_POST['Fecha'],$_POST['Placas'],$_POST['Cliente'],$_POST['Operador'],$_POST['Contador_Inicio'],$_POST['Contador_Final'],$_POST['Total_Despachado']);
    $array=array(
        "tabla"=>$tabla,
        "Operacion"=>
        array(  'INSERT'=>array(
                "Activar"    =>'true',//'false'
                "ColumnasInsert"    =>$ColumnasInsert,//array(),
                "ValoresInsert"     =>$ValoresInsert //array(),
            ),      'SELECT'=>array(
                "Activar"	=>'false',//'false'
                "LIKE"		=>'true',//'false'
                "getColumnas"    =>$getColumnas,//array()
                "BuscaColumnas"  =>$BuscaColumnas,//array()
                "BuscaDatos"     =>$BuscaDatos,//array()
            ),      'UPDATE'=>array(
                "Activar"	=>'false',//'false'
                "LIKE"		=>'false',//'false'
                "ModifiColumnas"    =>$ModifiColumnas,//array()
                "ModifiDatos"       =>$ModifiDatos,//array()
                "BuscaColumnas"  	=>$BuscaColumnas,//array()
                "BuscaDatos"     	=>$BuscaDatos,//array()
            ),      'DELETE'=>array(
                "Activar"	=>'false',//'false'
                "LIKE"		=>'false',//'false'
                "BuscaColumnas"  	=>$BuscaColumnas,//array()
                "BuscaDatos"     	=>$BuscaDatos,//array()
            )
        )
    );
    $Ares_v1->GeneraSql($array);
    $Ares_v1->setSql();
    
    echo"</div>";
?>