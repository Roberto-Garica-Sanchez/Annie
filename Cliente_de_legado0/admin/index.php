<!DOCTYPE html>
<html lang="mx" xml:lang="mx">
<?php //php7
/*
------------Include  requeridos[Nombre]
-->"login.php"
--> "libre_uni.php"
------------function requeridas[Libreria/funcion(s)]
--> "libre_uni.php"
*/		
error_reporting(0);
ini_set( 'display_errors', false );
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE );
date_default_timezone_set("Mexico/General");

$phpv=php7;//vercion de php con que estara trabajando 
$uno_para_todos=1;
$ruta="";
$title='';
$hoja='';

if ($title==''){$title="U P T $_POST[menu]";}
if (($_POST[menu]==Cuentas)and($_POST[Carta1]<>'')){$title=$title."[$_POST[Carta1]]";}
if ($hoja==''){$hoja=$ruta."estilo1.css";}

echo"	
	<head>
			<title>$title</title>
			<META CHARSET='UTF-8'/>
			<LINK REL='STYLESHEET' HREF='$ruta$hoja'        TYPE='TEXT/CSS'/>
			<script language='JavaScript' type='text/javascrip' src='java1.js'></script>
	</head>";
?>

	<body>
		<?php
		//php7
			include($ruta."libre_uni.php");
			if ($libre==''){echo"Error de Carga 'libre_uni'";}$libre='';
            echo'<form action="" method="POST" enctype="multipart/form-data">'; 
			$id="";
			include($ruta."login/login.php");
			if ($libre=='')		{echo"Error de Carga 'login'";}$libre='';
			if ($conexion<>'')	{
				$m0=$_POST[menu];
				$m2=Cuentas;
				$m3=Taller;
				$m4=Almacen;
				$m5=Cerrar;
				$m6=Ajustes;
				include($ruta."menu.php");
				if ($libre==''){echo"Error de Carga 'menu'";}$libre='';
			    if ($_POST[menu]==$m2){
					$ruta1="Cuentas/";
						include($ruta.$ruta1.'Cuentas.php');
						if ($libre==''){echo"Error de Carga 'Cuentas.php'";}$libre='';
				}
				if ($_POST[menu]==$m3){
					$ruta1="taller/";
					include($ruta.$ruta1.'Taller.php');		
					if ($libre==''){echo"Error de Carga 'Taller.php'";}$libre='';
				}
				if ($_POST[menu]==$m4){
					$ruta1="almacen/";
					include($ruta.$ruta1.'almacen.php');		
					if ($libre==''){echo"Error de Carga 'almacen.php'";}$libre='';
				}
				
			}
			echo'</form>';

		?>
	</body>
</html>
