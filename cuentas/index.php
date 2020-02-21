<!DOCTYPE html>
<html lang="mx" xml:lang="mx">
<?php 
date_default_timezone_set("Mexico/General");
$phpv='php5'	;//vercion de php con que estara trabajando 
$db='empresa';
$db_combustible='combustible';
echo"	
	<head>
			<title>Cuentas 2.0</title>
			<META CHARSET='UTF-8'/>
			<meta http-equiv='Content-type' content='text/html; charset=utf-8' />
	</head>";
?>
	<body onload='load();'>
		<?php
				
			//vercion operativa 4.2
			//include('libre_v2.php');if ($libre_v1==''){echo"Error de Carga 'libre_v1'";}
			//include('libre_v1.php');if ($libre_v2==''){echo"Error de Carga 'libre_v2'";}
			include_once($_SERVER["DOCUMENT_ROOT"]."/CentroDeProcesos.php");
			//include("../libre_uni.php");	if ($libre_uni==''){echo"Error de Carga 'libre_uni'";}
			if(empty($estilo_v1)){echo"<LINK REL='STYLESHEET' HREF='../estilo_v1.css' />";$estilo_v1='cargado';}
			echo'<form action="" method="POST" enctype="multipart/form-data" id="formu1">'; 
			//include_once($_SERVER["DOCUMENT_ROOT"]."/login2.php");
			include_once($_SERVER["DOCUMENT_ROOT"]."/login_tem.php");
			include_once($_SERVER["DOCUMENT_ROOT"].'/CentroDeProcesos.php');
			
			
		
			if($conexion<>""){
				echo"<div style=' min-width: 1000px; position: fixed;background: black;z-index: 1;top: 0px;left: 0px;height: 50px;width: 100%;'>";
					$name='Menu1';
					$v1='Cuentas';
					$v2='Combustible';
					//$v3=Detectar;
					//$v4=Reportes;
					//$v5=Altas;
					$style=" ";
					echo"<div id='lateral' class='lateral'>";//meni principal
						$script_input=" ";	
						echo $libre_v2->menu('submit',$style,'',$name,$v1,$v2,'','','','','','','','','',$script_input);
					echo"</div>"; 
					//contenedor login 
					/*
					echo"<div class='actuador'style='width: 200px; height: 60px; background: #292a2d; position: absolute; top: 5px; right: 10px; border-radius: 10px; z-index: 1; color: white;' onclick='menu();'>";
						echo"<div id='visual_tag' style='left: 10px; position: absolute; top: 20px;'>$_POST[tag]";
						echo"</div>";
						echo"<div style='position: absolute;width: 50px;height: 5px;background: white;top: 10px;right: 20px;box-shadow: inset 0px 0px 12px #0066ff;'></div>";
						echo"<div style='position: absolute;width: 50px;height: 5px;background: white;top: 20px;right: 20px;box-shadow: inset 0px 0px 12px #0066ff;'></div>";
						echo"<div style='position: absolute;width: 50px;height: 5px;background: white;top: 30px;right: 20px;box-shadow: inset 0px 0px 12px #0066ff;'></div>";
						echo"<div style='position: absolute;width: 50px;height: 5px;background: white;top: 40px;right: 20px;box-shadow: inset 0px 0px 12px #0066ff;'></div>";
				
					echo"</div>";
					*/
					echo"<div id='submenu' class='submenuhidden'>";
					/*
						//echo $libre_v1->input2(button,'Repara','','Reparar Cuentas','','','onClick="cambia_co_centro2(this);"',botones_submenu);
						echo $libre_v1->input2('button','Repara','','Reparar Cuentas','','','onClick="cambia_co_centro2(this);"','botones_submenu');
						//echo $libre_v1->input2(button,'Repara','','Reparar Cuentas','','','',botones_submenu);
						
						echo $libre_v1->input2(button,'inicio','','Cambiar De Programa	','','','onclick="redirec(this);"',botones_submenu);
						if($_POST[Soft_version]==''){$_POST[Soft_version]="Ares";}
						echo"<select name='Soft_version' class='botones_submenu' onChange='envia_formulario();'>";
							echo"<OPTION value='' $set>Version del Cliente</OPTION>";
							//if($_POST[Soft_version]=="Legado")	{$set='selected';}else{$set="";}	echo"<OPTION value='Legado' $set>Legado</OPTION>";
							if($_POST[Soft_version]=="Ares")	{$set='selected';}else{$set="";}	echo"<OPTION value='Ares' $set>Ares</OPTION>";
						echo"</select >";
						echo $libre_v1->input2(button,'','','Ajustes de Programa','','','onclick="cambia_co_centro2(this);"',botones_submenu);
						echo $libre_v1->input2(button,'','',Salir,'','','onClick="desconectar();"',botones_submenu);
						*/
					echo"</div>";
				
				echo"</div>";
				echo"<div style='position: absolute;background: blue;top: 60px;left: 2%;right: 2%;'>";
				if($_POST['Menu1']==$v1){include_once($_SERVER["DOCUMENT_ROOT"].'/Cliente_de_legado_ares/Cuentas.php');}
				/*
				if((!empty($_POST['Soft_version']) and $_POST['Soft_version']=='Ares')){	
					if($_POST['Menu1']==$v1){include('../Cliente_de_legado_Ares/Cuentas.php');}
					if($_POST['Menu1']==$v2){include('../Cliente_de_legado_Ares/Combustible/Combustible.php');}
					if($_POST['Menu1']==$v3){include('../detecta_dispositivo.php');if($detecta==false)echo"[detecta_dispositivo] no encontrado";}
				}
				if((!empty($_POST['Soft_version']) and $_POST['Soft_version']=='Legado')){
					echo'<LINK REL="STYLESHEET" HREF="../Cliente_de_legado/estilo.css"        TYPE="TEXT/CSS"/>';
					if($_POST['Menu1']==$v1){include('../Cliente_de_legado/Cuentas.php');}
				
				}
				*/
				echo"</div>";
			}
		
			echo'</form>';
		?>
	</body>
</html>
