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
$title=CEI;
$hoja="estilo.css";
echo"	
	<head>
			<title>$title</title>
			<META CHARSET='UTF-8'/>
			<meta http-equiv='Content-type' content='text/html; charset=utf-8' />
	</head>";
?>
	<body  onLoad='mueveReloj()'>
		<?php 
		
		
		include("libre_v1.php");				if($libre_v1=="")		{echo"<script>alert('[libre_v1] no localizado');</script>";}
		include("entrada.php");					if($entrada=="")			{echo"<script>alert('[entrada] no localizado');</script>";}
		
		?>
	</body>
</html>
