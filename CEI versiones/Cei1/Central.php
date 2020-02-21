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
	<body style='background: #0400ff;'>
		<div>
			<div style='position: relative;width: 300px;height: 150px;background: white;float: left;margin: 2px 5px;' onclick='cambia("../cei/");'>	
				<img src="../img/cei_registro.png" style='width: 300px;height: 125px;'/>
				<div style='bottom: 0px;left: 0px;right: 0px;background: #444;position: absolute;text-align: center;height: 25px;font-size: 20px;color: white;'>
					Registro
				</div>
			</div>
			<div style='position: relative;width: 300px;height: 150px;background: white;float: left;margin: 2px 5px;' onclick='cambia("../cei/entradas.php");'>	
				<img src="../img/cei_entradas.png" style='width: 300px;height: 125px;'/>	
				<div style='bottom: 0px;left: 0px;right: 0px;background: #444;position: absolute;text-align: center;height: 25px;font-size: 20px;color: white;'>
					Agenda					
				</div>
			</div>
			<div style='position: relative;width: 300px;height: 150px;background: white;float: left;margin: 2px 5px;'onclick='cambia("../cei/Reporte.php");'>	
				<img src="../img/cei_reporte.png" style='width: 300px;height: 125px;'/>	
				<div style='bottom: 0px;left: 0px;right: 0px;background: #444;position: absolute;text-align: center;height: 25px;font-size: 20px;color: white;'>
					Reportes	
				</div>	
			</div>
		</div>
		<?php 
		include("libre_v1.php");				if($libre_v1=="")		{echo"<script>alert('[libre_v1] no localizado');</script>";}
		//include("Reporte.php");					if($Reporte=="")		{echo"<script>alert('[Reporte] no localizado');</script>";}
		?>
	</body>
</html>
