<?php
    include_once($_SERVER["DOCUMENT_ROOT"]."/libre_v5.php");
    #menu
    $name_menu='MenuControlArchivos';
    $elemento_menu=array(
        'Explorar Subidos',
        'Archivo Subidos'
        ,'Importar Excel'
        ,'Importar Msql'
        ,'MySql');          
    $class=array(
        'Conte_princiapal'=>'Lateral',
        'Div_Opcion'=>'Alineacion_lateral',
        'Boton'=>'botonAjusteDiv',
        'img'=>'ImgAjusteDiv'
    );
    $otros_arrays=array(
        'img_activa'=> 'true',
        'img_defaul'=>'../img/defaul.jpg',
        'img'=>array("","",'',"",""),
        'memoria'=>array('Activa'=>true,'type'=>'hidden')
    );
    $libre_v5->menu($name_menu,$elemento_menu,$class,$otros_arrays);
    #contenido
    echo"<div class='Conte_datos'>";
    include_once("ControlArchivos/Centro_de_procesos.php");
    switch ($_POST[$name_menu]) {
        case $elemento_menu[0]:#explorador
            include_once('interfaces/ExporarArchivos.php');
        break;        
        case $elemento_menu[1]:#Archivos Subidos

        break;
        case $elemento_menu[2]:#importar excel

        break;
    }
    if($_POST[$name_menu]=='Archivo Subidos'){include_once($_SERVER["DOCUMENT_ROOT"]."/cargar_archivos/consultar/Consu_folder.php");}
    if($_POST[$name_menu]=='Importar Excel'){include_once("interfaces/ImportarExcel.php");}
    if($_POST[$name_menu]=='MySql'){include_once("interfaces/MySql.php");}
    
    if($_POST[$name_menu]=='Importar Msql'){}
    echo"</div>";
?>