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
		<div>
			<div style='position: relative; width: 200px; '>	</div>
		</div>
<?php

	$cei="cei";
	$school="school";
	$user="gerente";
	//$cei="id4258000_cei";
	//$user="id4258000_gerente";
	include("libre_v1.php");				if($libre_v1=="")		{echo"<script>alert('[libre_v1] no localizado');</script>";}
	$conexion= libre_v1::login('localhost',$user,gerente,"",$phpv);//cambia segun cada server
	libre_v1::db($cei,$conexion,$phpv);
	echo"<div style='position: relative;width: 1175px;height: 650px;background: black; color: white;margin-left: auto;margin-right: auto;margin-top: auto;margin-bottom: auto;box-shadow: 0px 10px 10px 1px #0009; color: white;'>";	
		echo "<div style='position: absolute;background: #444;top: 5px;left: 5px;right: 5px;height: 90px'>";		
			echo"<label style='position: absolute;top: 5px;left: 50px;font-size: 20px;'>Account Number</label>";
			echo"<br>";
			echo "<div style='position: absolute;bottom: 15px;left: 50px;width: 400px;'>";		
				$consu	= libre_v1::consulta	(alumnos,$conexion	,'','','','1'	,$phpv,'');
				echo libre_v1::despliegre_mysql	(cuenta,Account,$consu,cuenta,$phpv,"id='cuenta' style='font-size: 20px; width: 120px;'");
				echo libre_v1::input2(button,'','',Submit,'font-size: 20px;position: absolute;right: 0px;','',"onclick='reg_agen();'");
			echo "</div>";
		echo "</div>";
		echo "<div style='background: #444;'>";		
			echo libre_v1::input2(button,'','','','position: relative;float: right;margin-right: 15px;background: black;color:  white;height:  50px;width:  150px;font-size:  20px;',fecha,'',"");
			echo libre_v1::input2(hidden,'','','','position: relative;float: right;margin-right: 15px;background: black;color:  white;height:  50px;width:  150px;font-size:  20px;',idia,'',"");
			echo libre_v1::input2(hidden,'','','','position: relative;float: right;margin-right: 15px;background: black;color:  white;height:  50px;width:  150px;font-size:  20px;',imes,'',"");
			echo libre_v1::input2(hidden,'','','','position: relative;float: right;margin-right: 15px;background: black;color:  white;height:  50px;width:  150px;font-size:  20px;',iano,'',"");
			echo libre_v1::input2(button,'','','','position: relative;float: right;margin-right: 5px;background: black;color:  white;width:  150px;height: 50px;font-size:  20px;'	,reloj,'',"");
			echo libre_v1::input2(hidden,'','','','position: relative;float: right;margin-right: 5px;background: black;color:  white;width:  150px;height: 50px;font-size:  20px;'	,ihora,'',"");
			echo libre_v1::input2(hidden,'','','','position: relative;float: right;margin-right: 5px;background: black;color:  white;width:  150px;height: 50px;font-size:  20px;'	,iminuto,'',"");
		echo "</div>";
		echo "<div style='position: absolute;bottom: 510px;left: 5px; right: 5px;top: 100px;'>";
libre_v1::db					(cei,$conexion,$phpv);	
$consu1		= libre_v1::consulta			(alumnos,$conexion	,'','','',''	,$phpv,'');

$style='margin: .5px .5px .5px .5px;font-size: 20px; background: white; color: black;    padding: 5px 5px 5px 5px;';		
echo libre_v1::despliegre_mysql	(alumnos,Alumno		,$consu1,cuenta	,$phpv," id='alumnos' style='$style width: 120px;'");


echo libre_v1::input2(text,'','',"Star Date "	,$style,'');
echo libre_v1::input2(text,D,'',date("d")			,$style."width: 50px;",'D',$libre);
echo libre_v1::input2(text,M,'',date("m")			,$style."width: 50px;",'M',$libre);
echo libre_v1::input2(text,A,'',date("Y")			,$style."width: 50px;",'A',$libre);

echo libre_v1::input2(text,'','',"Final Data"		,$style,'');	
echo libre_v1::input2(text,D_r,'',date("d")			,$style."width: 50px;",'D_r',$libre);
echo libre_v1::input2(text,M_r,'',date("m")			,$style."width: 50px;",'M_r',$libre);
echo libre_v1::input2(text,A_r,'',date("Y")			,$style."width: 50px;",'A_r',$libre);
$code=date("Y").date("m").date("d");
echo libre_v1::input2(button,'','',Buscar,$style,'',"onclick='reportes()'");
		echo "</div>";
		echo "<div style='position: absolute;bottom: 470px;left: 10px;background: #444;'>";
					echo libre_v1::input2(text,'','',Account			,'margin: .5px .5px .5px .5px; font-size: 20px; background: black; color: white;    padding: 5px 5px 5px 5px;','',"readonly='readonly'",'');
					echo libre_v1::input2(text,'','',Name				,'margin: .5px .5px .5px .5px; font-size: 20px; background: black; color: white;    padding: 5px 5px 5px 5px;width: 300px;','',"readonly='readonly'",'');
					echo libre_v1::input2(text,'','',"Starting Hour"		,'margin: .5px .5px .5px .5px; font-size: 20px; background: black; color: white;    padding: 5px 5px 5px 5px;','',"readonly='readonly'",'');
					//echo libre_v1::input2(text,'','',"Entry Date"		,'margin: .5px .5px .5px .5px; font-size: 20px; background: black; color: white;    padding: 5px 5px 5px 5px;width: 130px;','',"readonly='readonly'",'');
					echo libre_v1::input2(text,'','',"turn-off Hour"	,'margin: .5px .5px .5px .5px; font-size: 20px; background: black; color: white;    padding: 5px 5px 5px 5px;width: 130px;','',"readonly='readonly'",'');
				//	echo libre_v1::input2(text,'','',"turn-off Date"	,'margin: .5px .5px .5px .5px; font-size: 20px; background: black; color: white;    padding: 5px 5px 5px 5px;width: 130px;','',"readonly='readonly'",'');
					echo libre_v1::input2(text,'','',"Time"				,'margin: .5px .5px .5px .5px; font-size: 20px; background: black; color: white;    padding: 5px 5px 5px 5px;width: 80px;','',"readonly='readonly'",'');
					
		echo "</div>";
		echo "<div id='list_agen' style='position: absolute;bottom: 5px;left: 5px;right: 5px;background: #3b75b0;height: 450px;overflow-x: hidden;overflow-y: auto;  padding: 5px 5px 5px 5px;'>";			
			$res="SELECT * FROM agenda WHERE code_entrada_fecha like $code ";
			$consu = libre_v1::ejecuta			($conexion,$res,$phpv);		
			libre_v1::mysql_da_se					($consu,0,$phpv);
			while($datos=libre_v1::mysql_fe_ar		($consu,$phpv)){
				$consu1=libre_v1::consulta	(alumnos,$conexion,cuenta,$datos[cuenta],'','',$phpv,'','');
				$alumno=libre_v1::mysql_fe_ar		($consu1,$phpv);
				$nombre=$alumno[name]." ".$alumno[firt]." ".$alumno[last];
				$co="";
				$co=$co."<div style='position: relative;   '>";
					$co=$co. libre_v1::input2(text,'','',$datos[cuenta]	,'margin: .5px .5px .5px .5px; font-size: 20px; background: black; color: white;    padding: 5px 5px 5px 5px;','',"readonly='readonly'",'');
					$co=$co. libre_v1::input2(text,'','',$nombre	,'margin: .5px .5px .5px .5px; font-size: 20px; background: black; color: white;    padding: 5px 5px 5px 5px;width: 300px;','',"readonly='readonly'",'');
					$co=$co. libre_v1::input2(text,'','',$datos[entrada_hora]	,'margin: .5px .5px .5px .5px; font-size: 20px; background: black; color: white;    padding: 5px 5px 5px 5px;','',"readonly='readonly'",'');
					$co=$co. libre_v1::input2(text,'','',$datos[entrada_fecha]	,'margin: .5px .5px .5px .5px; font-size: 20px; background: black; color: white;    padding: 5px 5px 5px 5px;width: 130px;','',"readonly='readonly'",'');
					$co=$co. libre_v1::input2(text,'','',$datos[salida_hora]	,'margin: .5px .5px .5px .5px; font-size: 20px; background: black; color: white;    padding: 5px 5px 5px 5px;width: 130px;','',"readonly='readonly'",'');
					$co=$co. libre_v1::input2(text,'','',$datos[salida_fecha]	,'margin: .5px .5px .5px .5px; font-size: 20px; background: black; color: white;    padding: 5px 5px 5px 5px;width: 130px;','',"readonly='readonly'",'');
					$co=$co. libre_v1::input2(text,'','',$datos[tiempo]			,'margin: .5px .5px .5px .5px; font-size: 20px; background: #ffed25; color: black;    padding: 5px 5px 5px 5px;width: 80px;','',"readonly='readonly'",'');
					if($datos[salida_fecha]==''){
						$co=$co. libre_v1::input2(button,$datos[cuenta],'',"Get Out"	,'margin: .5px .5px .5px .5px; font-size: 20px; background: green; color: white;    padding: 5px 5px 5px 5px;width: 90px;',$datos[entrada_hora],"readonly='readonly' onclick=' reg_getout(this);'",'');
					}else{
						$co=$co. libre_v1::input2(button,'','',"Finished"	,'margin: .5px .5px .5px .5px; font-size: 20px; background: #444; color: white;    padding: 5px 5px 5px 5px;width: 90px;','',"readonly='readonly'",'');
					}
				$co=$co."</div>";
				$to=$co.$to;
			}	
			echo$to;
		echo "</div>";	
	echo"</div>";
	
	$Reporte=" ";
?>
	</body>
</html>
