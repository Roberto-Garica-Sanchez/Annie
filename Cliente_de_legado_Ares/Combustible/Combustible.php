
<?php
$phpv=php5;//vercion de php con que estara trabajando 
$db=empresa;

if ($libre_v1=='')	{	include("../libre_v1.php");}	if ($libre_v1==''){echo"Error de Carga 'libre_v1'";}
if ($libre_v2=='')	{	include("../libre_v2.php");}	if ($libre_v2==''){echo"Error de Carga 'libre_v2'";}
if($estilo==""){echo"<LINK REL='STYLESHEET' HREF='../Cliente_de_legado/estilo.css' />";$estilo=cargado;}
$style='    position: absolute;top: 60px;width: 105px;z-index: 1;';
echo libre_v2::menu2(submit,$style,'id="sub_menu"',name2set,idI,id_I,Estados,Folder,'Arc. Mur.',Modificar,Ajustes,'',$v7,$v8,$v9,$v10,$v11,' ')	;

echo"<div id='div_centro' style='width: 1250px;position: relative;overflow: hidden;top: 45px;height: 600px;background: url(../img/8.jpg);margin-right: auto;margin-left: auto;'>";
if($_POST[Soft_version]==Ares){	
	if ($_POST[name2set]==Estados)		{include("tanque.php");}
	if ($_POST[name2set]==Folder)		{include("folder2.php");}
	if ($_POST[name2set]=='Arc. Mur.')	{include("Baul.php");}
	
	if ($_POST[name2set]==Modificar)	{include("Nuevo.php");}
	if ($_POST[name2set]==Ajustes)		{include("ajustes1.php");if ($ajustes1==''){echo"Error de Carga 'ajustes1'";} }
} 
echo"</div>";

?>