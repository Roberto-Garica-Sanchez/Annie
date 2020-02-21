<?php
    //el programa detecta que boton de operacion ha cido presionada (guadar,modificar,elminar)
    //y mediante el uso de los menus conoser exactamente que decea hacer el usuario 

    $libre_v5->memorias('');
    switch ($_POST[$name_menu]) {
        case $elemento_menu[0]: #Abastecimiento
            if(!empty($_POST[$name_menu_repostajes]))
            switch ($_POST[$name_menu_repostajes]) {
                case $elementos_menu_repostajes[0]: #Carga De Combustible
                    $tabla='repostajes_unidades';
                    $database='combustible';
                    if(!empty($_POST['Operadores']) and $_POST['Operadores']=='Limpiar')        {include_once('limpiar_formulario/Repostaje_unidades_lim.php');}
                    if(!empty($_POST['Operadores']) and $_POST['Operadores']=='Eliminar')       {include_once('Elimina/Repostajes_unidades_Elim.php');}
                    if(!empty($_POST['Descargar']))                                             {include_once('Descargar/Respostaje_unidades_Desc.php');}
                    if(!empty($_POST['Operadores']) and ($_POST['Operadores']=='Guardar' or $_POST['Operadores']=='Modificar'))  
                    {$view='true';} else { $view='false';}
                    include_once('combustible/Validaciones/repostajes_unidades.php');
                
                    if($validacionGeneral=='true'){
                        if(!empty($_POST['Operadores']) and $_POST['Operadores']=='Guardar')        {include_once('Guardar/Repostaje_unidades_save.php');}
                        if(!empty($_POST['Operadores']) and $_POST['Operadores']=='Modificar')      {include_once('Modificar/Repostaje_unidades_mod.php');}
                    }else{
                        if(empty($consola))$consola='';
                        $consola=$consola."<a class='ok'>campos vacios</a>";
                    }
                    
                break;
                case $elementos_menu_repostajes[1]:#Compra De Combustible
                    $tabla='repostajes_tanques';
                    $database='combustible';
                    if(!empty($_POST['Operadores']) and $_POST['Operadores']=='Limpiar')        {include_once('limpiar_formulario/Repostaje_tanques_lim.php');}
                    if(!empty($_POST['Operadores']) and $_POST['Operadores']=='Eliminar')       {include_once('Elimina/Repostajes_tanques_Elim.php');}
                    if(!empty($_POST['Descargar']))                                             {include_once('Descargar/Respostaje_tanques_Desc.php');}
                    if(!empty($_POST['Operadores']) and ($_POST['Operadores']=='Guardar' or $_POST['Operadores']=='Modificar'))  
                    {$view='true';}else{ $view='false';}
                    include_once($_SERVER["DOCUMENT_ROOT"].'/combustible/Validaciones/repostaje_tanques.php');
                    if($validacionGeneral=='true'){
                        if(!empty($_POST['Operadores']) and $_POST['Operadores']=='Guardar')        {include_once('Guardar/Repostaje_tanques_save.php');}
                        if(!empty($_POST['Operadores']) and $_POST['Operadores']=='Modificar')      {include_once('Modificar/Repostaje_tanques_mod.php');}
                    }else{
                        if(empty($consola))$consola='';
                        $consola=$consola."<a class='ok'>campos vacios</a>";
                    }                
                break;
            }
        break;
        case $elemento_menu[1]: #Ajustes
            if(!empty($_POST[$name_menu_tanques]))
            switch ($_POST[$name_menu_tanques]) {
                case $elementos_ajustes[0]:#tanques
                    $tabla='tanques';
                    $database='combustible';
                    if(!empty($_POST['Operadores']) and $_POST['Operadores']=='Limpiar')    {include_once('limpiar_formulario/Tanques_lim.php');}
                    if(!empty($_POST['Operadores']) and $_POST['Operadores']=='Eliminar')   {include_once('Elimina/tanques_Elim.php');}
                    if(!empty($_POST['Descargar']))                                         {include_once('Descargar/Tanques_Desc.php');}
                    if(!empty($_POST['Operadores']) and ($_POST['Operadores']=='Guardar' or $_POST['Operadores']=='Modificar'))  
                    {$view='true';} else { $view='false';}
                    include_once($_SERVER["DOCUMENT_ROOT"].'/combustible/Validaciones/tanques.php');
                    
                    if(!empty($validacionGeneral) and $validacionGeneral=='true'){
                        if(!empty($_POST['Operadores']) and $_POST['Operadores']=='Guardar')        {include_once('Guardar/Tanques_save.php');}
                        if(!empty($_POST['Operadores']) and $_POST['Operadores']=='Modificar')      {include_once('Modificar/tanques_mod.php');}
                    }else{
                        if(empty($consola))$consola='';
                        $consola=$consola."<a class='ok'>campos vacios</a>";
                    }
                
                break;
                case $elementos_ajustes[1]:#Analisis Cargas - Compra
                break;
                case $elementos_ajustes[3]:#operadores
                $elemento=$elementos_ajustes[3];
                $tabla='operadores';
                $database='almacen';
                include("enrutador.php");
                break;
                case $elementos_ajustes[4]:#Clientes
                $elemento=$elementos_ajustes[4];
                $tabla='clientes';
                $database='almacen';
                include("enrutador.php");
                break;
                case $elementos_ajustes[5]:#Unidades
                $elemento=$elementos_ajustes[5];
                $tabla='unidades';
                $database='almacen';
                include("enrutador.php");
                break;
            }   
        break;
        case $elemento_menu[2]:#reporte

        break;
    }
    
?>
