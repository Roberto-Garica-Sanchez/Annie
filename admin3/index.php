<!DOCTYPE html>
<html lang="mx" xml:lang="mx">
<?php //php5 php7

error_reporting(0);
ini_set( 'display_errors', false );
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE );
date_default_timezone_set("Mexico/General");
$index=1;
$phpv=php5;
$uno_para_todos=1;
$title=Cuentas;
$hoja="estilo.css";
echo"	
	<head>
			<title>$title</title>
			<META CHARSET='UTF-8'/>
			<meta http-equiv='Content-type' content='text/html; charset=utf-8' />
	</head>";
?>
	<body >
		<?php 
		include("libre_v1.php");				if($libre_v1=="")		{echo"<script>alert('[libre_v1] no localizado');</script>";}
		include("menu/top.php");				if($menu_isq=="")		{echo"<script>alert('[menu_top] no localizado');</script>";}
		include("menu/left.php");				if($menu_left=="")		{echo"<script>alert('[menu_left] no localizado');</script>";}
		include("contenedores_v1.php");			if($contenedores_v1==""){echo"<script>alert('[contenedores_v1] no localizado');</script>";}
		?>
	</body>
</html>
