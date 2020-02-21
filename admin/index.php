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
/*		
error_reporting(0);
ini_set( 'display_errors', false );
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE );
*/
date_default_timezone_set("Mexico/General");
$phpv=php5	;//vercion de php con que estara trabajando 
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
			<meta http-equiv='Content-type' content='text/html; charset=utf-8' />
			<LINK REL='STYLESHEET' HREF='$ruta$hoja'        TYPE='TEXT/CSS'/>
			<script type='text/javascript' language='javascript' src='java1.js'></script> 
			
	</head>";
	//<script type='text/javascrip' language='JavaScript' src='java1.js'></script>
?>

	<body>
		<?php
		//php7
			include($ruta."libre_uni.php");
			if ($libre==''){echo"Error de Carga 'libre_uni'";}$libre='';
            echo'<form action="" method="POST" enctype="multipart/form-data">'; 
			$id="";
			if ($_POST[menu]==Cerrar){$_POST[grado]='';}
			include($ruta."login/login.php");
			if ($libre=='')		{echo"Error de Carga 'login'";}$libre='';
			if (($grado<>'')and($gere==""))	{
				//$m0=$_POST[menu];
				$m1=Cuentas;
				$m2=Taller;
				$m3=Combustible;
				$m4=Almacen;
				$m5=Cerrar;
				$m6=Ajustes;
				include($ruta."menu.php");
				if ($libre==''){echo"Error de Carga 'menu'";}$libre='';
			    if ($_POST[menu]==""){
									//input2($type2,$name,$title,$value,$style,$id,$libre,$class)
					$conte=			input2(image,menu,'',$m1,'position: relative; width: 250px; top: 100px;','','src="img/Cuentas-sistem.png"',' ');		//"<button type='submit' name='menu' value='$m1' src='img/Cuentas-sistem.png' > </button>";	
					$conte=$conte.	input2(image,menu,'',$m2,'position: relative; width: 250px; top: 100px;','','src="img/taller-sistem.png"',' ');
					$conte=$conte.	input2(image,menu,'',$m4,'position: relative; width: 250px; top: 100px;','','src="img/almacen-sistem.png"',' ');
					$conte=$conte.	input2(image,menu,'',$m6,'position: relative; width: 250px; top: 100px;','','src="img/ajustes-sistem.png"',' ');
					echo div('width: 1000px; height: 500px;  top: 100px; position: relative; background: white; box-shadow: 0px 5px 5px white; background-size: 100%; border-radius: 5px; margin-right: auto; margin-left: auto;','',$conte);
				}
			    if ($_POST[menu]==$m1){
					$ruta1="Cuentas/";
						include($ruta.$ruta1.'Cuentas.php');
						if ($libre==''){echo"Error de Carga 'Cuentas.php'";}$libre='';
				}
				if ($_POST[menu]==$m2){
					//$ruta1="taller/";
					//include($ruta.$ruta1.'Taller.php');		
					//if ($libre==''){echo"Error de Carga 'Taller.php'";}$libre='';
					$conte="<img id='' src='img/Construcion-sistem.png' style='width: 960px; height: 400px; top: 20px; left: 20px; position: absolute;'/>";
					echo div("0width: 1000px; height: 500px;  top: 100px; position: relative; background: rgba(249, 255, 11, 0.5);  border-radius: 5px; margin-right: auto; margin-left: auto;",'',$conte);
				}
				if ($_POST[menu]==$m3){
					$ruta1="almacen/";
					include($ruta.$ruta1.'almacen_2.php');		
					$conte="<img id='' src='img/Construcion-sistem.png' style='width: 960px; height: 400px; top: 20px; left: 20px; position: absolute;'/>";
					echo div("width: 1000px; height: 500px;  top: 100px; position: relative; background: rgba(249, 255, 11, 0.5);  border-radius: 5px; margin-right: auto; margin-left: auto;",'',$conte);
				}
				if ($_POST[menu]==$m4){
					$ruta1="almacen/";
					include($ruta.$ruta1.'almacen.php');		
					if ($almacen==''){echo"Error de Carga 'almacen.php'";}$libre='';
				}
				if ($_POST[menu]==$m6){
					$conte="<img id='' src='img/Construcion-sistem.png' style='width: 960px; height: 400px; top: 20px; left: 20px; position: absolute;'/>";
					echo div("width: 1000px; height: 500px;  top: 100px; position: relative; background: rgba(249, 255, 11, 0.5);  border-radius: 5px; margin-right: auto; margin-left: auto;",'',$conte);
				}
				
			}
			echo'</form>';

		?>
	</body>
</html>
