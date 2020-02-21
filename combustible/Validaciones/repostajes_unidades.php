<?php
#validacion generiaca 
    $libre_v4-> Columnas($database,$tabla);
    $columnas=$libre_v4->getColumnas();
    $libre_v4->KeyColumnUsege($database,$tabla);
    $key=$libre_v4->getKeyColumnUsege();
    $validacionGeneral='true';
    $validacion='true';
    $vacio=array();
    //verifica si las columnas estan vacias []
    for ($x=0; $x <count($columnas) ; $x++) {
        if(empty($_POST[$columnas[$x]]) and $key!=$columnas[$x]){
            $validacion='false';$validacionGeneral='false';
            if(empty($consola))$consola='';
            $consola=$consola.$columnas[$x]."<br>";
        }else{
            $validacion='true';
        }
        
        $vacio[$columnas[$x]]=$validacion;

    }

#validaciones Especifica para la tabla 
    if($vacio['Contador_Inicio']=='true' and $vacio['Contador_Final']=='true'){
        $_POST['Total_Despachado']=$_POST['Contador_Final']-$_POST['Contador_Inicio'];
        if($_POST['Total_Despachado']>0){
            $vacio['Total_Despachado']='true';
        }
        else{
            $vacio['Total_Despachado']='false';
            $validacionGeneral='false';
        }
    }
    $validacionFormularo=$vacio;
?>