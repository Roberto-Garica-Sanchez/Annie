<?php
    //el programa detecta que boton de operacion ha cido presionada (guadar,modificar,elminar)
    //y mediante el uso de los menus conoser exactamente que decea hacer el usuario 
    /*
        if($_POST['Operadores']=='Guardar')     {include_once('');}
        if($_POST['Operadores']=='Modificar')   {include_once('');}
        if($_POST['Operadores']=='Limpiar')     {include_once('');}
        if($_POST['Operadores']=='Eliminar')    {include_once('');}
        if($_POST['Descargar']<>"")             {include_once('');}
    */

    if($_POST[$nombre_del_menu_princiapl]=="Localizacion"){}
    if($_POST[$nombre_del_menu_princiapl]=="Ajustes"){ 
        if($_POST[$nombre_de_submenu_Ajustes]=="Localizacion"){
            if($_POST['Operadores']=='Guardar')     {include_once($direcion_base.'Guardar\localizaciones_save.php');}
            if($_POST['Operadores']=='Modificar')   {include_once($direcion_base.'Modificar\localizador_mod.php');}
            if($_POST['Operadores']=='Limpiar')     {include_once($direcion_base.'limpiar_formulario\localizacion_lim.php');}
            if($_POST['Operadores']=='Eliminar')    {include_once($direcion_base.'Elimina\localizacion_Elim.php');}
            if($_POST['Descargar']<>"")             {include_once($direcion_base.'Descargar\localizacion_Desc.php');}   
        }
        if($_POST[$nombre_de_submenu_Ajustes]=="Dispositivos"){
        }
        if($_POST[$nombre_de_submenu_Ajustes]=="Usuarios"){
            if($_POST['Operadores']=='Guardar')     {include_once($direcion_base.'Guardar\usuarios_save.php');}
            if($_POST['Operadores']=='Modificar')   {include_once($direcion_base.'Modificar\Usuario_mod.php');}
            if($_POST['Operadores']=='Limpiar')     {include_once($direcion_base.'limpiar_formulario\usuarios_lim.php');}
            if($_POST['Operadores']=='Eliminar')    {include_once($direcion_base.'Elimina\Usuarios_Elim.php');}
            if($_POST['Descargar']<>"")             {include_once($direcion_base.'Descargar\Usuario_Des.php');}
        }
    }

?>