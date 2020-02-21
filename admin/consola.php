<!DOCTYPE html>
<html lang="mx" xml:lang="mx">
<?php //php7
	/*
	error_reporting(0);
	ini_set( 'display_errors', false );
	error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE );
	*/
date_default_timezone_set("Mexico/General");
$phpv=php7;//vercion de php con que estara trabajando 
$uno_para_todos=1;
$ruta="";
$title='';
$hoja='';	

if ($title==''){$title="Consola $_POST[menu]";}
if (($_POST[menu]==Cuentas)and($_POST[Carta1]<>'')){$title=$title."[$_POST[Carta1]]";}
if ($hoja==''){$hoja=$ruta."estilo1.css";}

include($ruta."libre_uni.php");
if ($libre==''){echo"Error de Carga 'libre_uni'";}$libre='';	

	echo"	
	<head>
			<title>$title</title>
			<META CHARSET='UTF-8'/>
			<meta http-equiv='Content-type' content='text/html; charset=utf-8' />
			<LINK REL='STYLESHEET' HREF='$ruta$hoja'        TYPE='TEXT/CSS'/>			
	</head>
	<body>
		<form action='' method='POST' enctype='multipart/form-data'>";
			echo input2(submit,menu,'',consu_cuen);
			
			$_POST[nombre]=chofer;
			//$grado=5;
			$_POST[fec_ini]=01032016;
			$_POST[fec_fin]=01012017;
			include("/Cuentas/consu_cuen.php");
			if ($_POST[menu]==consu_cuen){}
	echo"
		</form>
	</body>
	";
?>