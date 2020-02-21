<?php //php7
/*
------------Include  requeridos[Nombre]
-->"libre_tal.php"
-->"Nuevo.php"
------------function requeridas[Libreria/funcion(s)]
--> "libre_tal.php"

*/
include("libre_tal.php");
if ($libre==''){echo"Error de Carga 'libre_tal.php'";}$libre='';
if ($_POST[name2set]=='')$_POST[name2set]=Nuevo;
sub_menu('',menu2,name2set,'',Nuevo,Folder,'Arc. Mur.',Modificar,Altas,Reporte,'+','+','+','+','+','+');
echo"<div id='Conte-pri'>";
	if ($_POST[name2set]==Nuevo)		{
		include($ruta1."Nuevo.php");
		if ($libre==''){echo"Error de Carga 'Nuevo.php'";}$libre='';
	}
	/*if ($_POST[name2set]==Folder)		{include("folder.php");}
	if ($_POST[name2set]=='Arc. Mur.')	{include("Baul.php");}
	if ($_POST[name2set]==Modificar)	{include("Cambio.php");}
	if ($_POST[name2set]==Altas)		{include("ajuste.php");}
    if ($_POST[name2set]==Reporte)     	{include("reporte.php");}
    if ($_POST[name2set]==m)      	    {include("memoria.php");}*/
echo"</div>";
$libre=1;
?>
