<?php 
    #$elemento=$elementos_ajustes[x]
    if(!empty($_POST['Operadores']) and $_POST['Operadores']=='Limpiar')    {include_once('limpiar_formulario/'.$elemento.'.php');}
    if(!empty($_POST['Operadores']) and $_POST['Operadores']=='Eliminar')   {include_once('Elimina/'.$elemento.'.php');}
    if(!empty($_POST['Descargar']))                                         {include_once('Descargar/'.$elemento.'.php');}
    if(!empty($_POST['Operadores']) and ($_POST['Operadores']=='Guardar' or $_POST['Operadores']=='Modificar'))  
    {$view='true';} else { $view='false';}
    include_once('Validaciones/'.$elemento.'.php');#modificas el enrutado -> eliminar document_root

    if(!empty($validacionGeneral) and $validacionGeneral=='true'){
        if(!empty($_POST['Operadores']) and $_POST['Operadores']=='Guardar')        {include_once('Guardar/'.$elemento.'.php');}
        if(!empty($_POST['Operadores']) and $_POST['Operadores']=='Modificar')      {include_once('Modificar/'.$elemento.'.php');}
    }else{
        if(empty($consola))$consola='';
        $consola=$consola."<a class='ok'>campos vacios</a>";
    }
?>