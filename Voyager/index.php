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
	<body  onLoad='mueveReloj()'autocomplete="off">
		<?php 
		include("../libre_v2.php");				if($libre_v2=="")		{echo"<script>alert('[libre_v2] no localizado');</script>";}
		include("menu/top.php");				if($menu_isq=="")		{echo"<script>alert('[menu_top] no localizado');</script>";}
		echo"<div id='style_co_centro' style=''>";
		echo"</div>";
		?>
		
	</body>
</html>
