<?php  

if(!empty($_POST[$name_menu]))
switch ($_POST[$name_menu]) {
    case $elemento_menu[0]:#'Explorador'
        if(!empty($_POST['Operadores']) and $_POST['Operadores']=='Eliminar')       {include_once('Eliminar/Explorar.php');}
        #$tabla='repostajes_unidades';
        #$database='combustible';
        #if(!empty($_POST['Operadores']) and $_POST['Operadores']=='Limpiar')        {include_once('limpiar_formulario/Repostaje_unidades_lim.php');}
        
        #if(!empty($_POST['Descargar']))                                             {include_once('Descargar/Respostaje_unidades_Desc.php');}
        #if(!empty($_POST['Operadores']) and ($_POST['Operadores']=='Guardar' or $_POST['Operadores']=='Modificar'))  
        #{$view='true';} else { $view='false';}
        #include_once('combustible/Validaciones/repostajes_unidades.php');

        #if($validacionGeneral=='true'){
        #    if(!empty($_POST['Operadores']) and $_POST['Operadores']=='Guardar')        {include_once('Guardar/Repostaje_unidades_save.php');}
        #    if(!empty($_POST['Operadores']) and $_POST['Operadores']=='Modificar')      {include_once('Modificar/Repostaje_unidades_mod.php');}
        #}else{
        #    if(empty($consola))$consola='';
        #    $consola=$consola."<a class='ok'>campos vacios</a>";
        #}

        
    break;
    case $elemento_menu[1]:#Archivos Subidos
        if(!empty($_POST['archivos'])){#si hay un archivo selecionado 
            $nombreArchivo=$_SERVER["DOCUMENT_ROOT"]."/archivos_subidos/".$_POST['archivos'];			
            $Archivo_excel= new Excel();	
            if(!empty($nombreArchivo))$Archivo_excel->cargar_excel($nombreArchivo);else echo"ningun archivo selecionado";
            //$Archivo_excel->setDatosExcel();
            $datosExcel=$Archivo_excel->getDatosExcel(); #obtiene los datos excel 
        } 
    break;
    case $elemento_menu[2]:#importar excel  
        if(!empty($_POST['Operador']))
        switch ($_POST['Operador']) {
            case 'Importar':
                    switch ($_POST['TipoDeImportacion']) {
                        case 'Lista':
                            echo"<div class='Contenedor_auto2'>";
                            $elementos=$_POST['Asignacion_RenglonFinalListado']-$_POST['Asignacion_RenglonInicioListado'];
                            echo"Elemento a Caturar: ".$elementos,'<br>';
                                echo"<div class='Contenedor_auto2'>";
                                    $libre_v4->Columnas($_POST['INdatabase'],$_POST['INtabla']);
                                    $libre_v4->KeyColumnUsege($_POST['INdatabase'],$_POST['INtabla']);
                                    $columnas=$libre_v4->GetColumnas();
                                    $excesion=$libre_v4->getKeyColumnUsege();
                                    $inicio=$_POST['Asignacion_RenglonInicioListado'];
                                    $Final=$_POST['Asignacion_RenglonFinalListado'];
                                    for ($x=0; $x <=$elementos; $x++) { #elemento listados para catura 
                                        #obtiene los datos el a hoja de excel
                                            $valores=$libre_v2->crea_array('');
                                            #carga las columnas de la tabla 
                                            for ($y=0; $y < count($columnas); $y++){
                                                #verifica si exite excesion
                                                if($excesion!=$columnas[$y]){
                                                    $celda=$_POST['Asignacion_'.$columnas[$y]].($x+$inicio);
                                                    if(!empty($datosExcel['values'][$celda])){
                                                        $datosExcel['values'][$celda];
                                                        $valores=$libre_v2->add_array($valores,$columnas[$y],$datosExcel['values'][$celda]);
                                                    }
                                                }
                                            }
                                          
                                        #proceso de validacion 
                                        echo"<br>".$file=$_SERVER["DOCUMENT_ROOT"]."/".$_POST['INdatabase']."/Validaciones/".$_POST['INtabla'].".php";   
                                                                          
                                        
                                        
                                        echo"<br>".$file=$_SERVER["DOCUMENT_ROOT"]."/".$_POST['INdatabase']."/Importar/".$_POST['INtabla'].".php";                                    
                                        if(file_exists($file)==true){   
                                            include($file);#archivo que contiene los ajuste para cada tabla 
                                            #inicia proceso de guaraos 
                                                $res='Error';                                   #variable de incicasion de proceso 
                                                echo"<br>Elemento: " .($x+$inicio);             #incidador de elemento Procesado
                                                #Verifica que el registro Apruebe la verificasion de ingreso de datos 
                                                #include();
                                                
                                                    $database=$_POST['INdatabase'];
                                                    $tabla=$_POST['INtabla'];
                                                    $ValoresByKey='true';
                                                    #$valores=array();#->esta pasando directamente de el script  anterioir 
                                                    echo"<br>";
                                                    include($_SERVER["DOCUMENT_ROOT"]."/Save_universal.php");
                                                    echo"<br>";
                                                if($res=='Error')echo "<a style='background: Red;'> ".$res,"</a>";
                                                else echo "<a style='background:green;'> ".$res,"</a>";
                                                echo"<br>";
                                                echo"<br>";
                                            
                                        }else{
                                         echo "<br>El Archivo No Fue Encontrado";
                                        }
                                        
                                    }
                                echo"</div>";
                            echo"</div>";
                        break;
                        case 'Unica':                        
                            echo"<div class='Contenedor_auto2'>";
                            #verifica si el destino a sido ingresado
                            if(!empty($_POST['INdatabase']) and !empty($_POST['INtabla']) and $_POST['INdatabase']!='INdatabase' and $_POST['INtabla']!='INtabla'){ #si ya se seleciono los dtos de destino 
                                #carga de columnas y KEY
                                $libre_v4->Columnas($_POST['INdatabase'],$_POST['INtabla']);    #obtiene las columnas del destino 
                                $libre_v4->KeyColumnUsege($_POST['INdatabase'],$_POST['INtabla']);    #obtiene las columnas del destino 
                                $excesion=$libre_v4->getKeyColumnUsege($_POST['INdatabase'],$_POST['INtabla']);    #obtiene las columnas del destino 
                                $columnas=$libre_v4->GetColumnas();
                                $valores=$libre_v2->crea_array('');
                                for ($y=0; $y < count($columnas); $y++){
                                    #verifica si exite excesion
                                    if($excesion!=$columnas[$y]){
                                        $celda=$_POST['Asignacion_'.$columnas[$y]];
                                        if(!empty($datosExcel['values'][$celda])){
                                            
                                            $valores=$libre_v2->add_array($valores,$columnas[$y],$datosExcel['values'][$celda]);
                                        }
                                    }                                
                                }
                                //include($_SERVER["DOCUMENT_ROOT"]."/combustible/Guardar/Repostaje_unidades_save.php");
                                
                                $database=$_POST['INdatabase'];
                                $tabla=$_POST['INtabla'];
                                $ValoresByKey='true';
                                include($_SERVER["DOCUMENT_ROOT"]."/Save_universal.php");
                                if(empty($res))$res='';
                                echo "<a style='background:green;'> ".$res,"</a>";
                            }
                            echo"</div>";
    
                        break;
                    }
            break;
            case 'Auto Asignacio':
                if(!empty($_POST['INdatabase']) and !empty($_POST['INtabla']) and $_POST['INdatabase']!='INdatabase' and $_POST['INtabla']!='INtabla'){ #si ya se seleciono los dtos de destino 
                    $libre_v4->Columnas($_POST['INdatabase'],$_POST['INtabla']);    #obtiene las columnas del destino 
                    $libre_v4->KeyColumnUsege($_POST['INdatabase'],$_POST['INtabla']);    #obtiene las columnas del destino 
                    $excesion=$libre_v4->getKeyColumnUsege($_POST['INdatabase'],$_POST['INtabla']);    #obtiene las columnas del destino 
                    $columnas=$libre_v4->GetColumnas();
                    if(!empty($datosExcel)){#si hay un archivo excel cargado 
                        for ($Renglones = 1; $Renglones <= $datosExcel['Renglones']; $Renglones++) {#ciclo de las columnas del archivo 
                            for ($x=65; $x<=90; $x++) {# ciclo para abcdef
                                $Columna=chr($x);	
                                if(!empty($datosExcel['values'][$Columna.$Renglones])){
                                    for ($z=0; $z < count($columnas); $z++) {                         
                                        if($excesion!=$columnas[$z]){
                                            $columnas[$z]." - ".$datosExcel['values'][$Columna.$Renglones];
                                            if(strnatcasecmp($columnas[$z],$datosExcel['values'][$Columna.$Renglones])==0){
                                            $datosExcel['values'][$Columna.$Renglones];
                                            $_POST["Asignacion_".$columnas[$z]]=$Columna.$Renglones;
                                            }
                                        }
                                        
                                    }
                                }
                                
                            }
                        }
                    }
    
                }
            break;
    
        }
        if(!empty($_POST['Asignacion'])){
            if(!empty($_POST['CeldaAsigna'])){
                $columna=$_POST['Asignacion'];
                $_POST["Asignacion_".$columna]=$_POST['CeldaAsigna'];
            }
            if(!empty($_POST['Renglon'])){   
                $columna=$_POST['Asignacion'];     
                $_POST["Asignacion_".$columna]=$_POST['Renglon'];
            }
            if(!empty($_POST['Columna'])){   
                $columna=$_POST['Asignacion'];     
                $_POST["Asignacion_".$columna]=$_POST['Columna'];
            }
        }  

    break;
}
//CeldaAsigna
    
?>