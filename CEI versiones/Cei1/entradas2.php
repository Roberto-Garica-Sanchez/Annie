<?php

	$cei="cei";
	$school="school";
	$user="gerente";
	//$cei="id4258000_cei";
	//$user="id4258000_gerente";
	include("libre_v1.php");				if($libre_v1=="")		{echo"<script>alert('[libre_v1] no localizado');</script>";}
		$conexion= libre_v1::login('localhost',$user,gerente,"",$phpv);//cambia segun cada server
	echo"<div style='position: relative;width: 1175px;height: 490px;background: black; color: white;margin-left: auto;margin-right: auto;margin-top: auto;margin-bottom: auto;box-shadow: 0px 10px 10px 1px #0009; color: white;'>";	
		
		echo "<div style='position: absolute;background: #444;top: 5px;left: 5px;right: 5px;height: 90px'>";	
			echo libre_v1::input2(text,'','',"Check Input"			,'position: absolute; left: 420px;margin: .5px .5px .5px .5px; font-size: 20px; background: #ffed25; color: black;  padding: 5px 5px 5px 5px;width: 200px;  text-align: center;','',"readonly='readonly'",'');
			echo"<label style='position: absolute;top: 5px;left: 50px;font-size: 20px;'>Number of Account</label>";
			echo"<br>";
			echo "<div style='position: absolute;bottom: 15px;left: 50px;width: 400px;'>";		
				//echo libre_v1::input2(text,'','Example "0000-0000"','','font-size: 20px',cuenta2,"placeholder='Seach'"); 
				//echo"<a style='font-size: 20px;'>or</a>";
				libre_v1::db($cei,$conexion,$phpv);
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
		echo "<div style='position: absolute;top: 105px;left: 10px;background: #444;'>";
					echo libre_v1::input2(text,'','',Account			,'margin: .5px .5px .5px .5px; font-size: 20px; background: black; color: white;    padding: 5px 5px 5px 5px;','',"readonly='readonly'",'');
					echo libre_v1::input2(text,'','',Name				,'margin: .5px .5px .5px .5px; font-size: 20px; background: black; color: white;    padding: 5px 5px 5px 5px;width: 300px;','',"readonly='readonly'",'');
					echo libre_v1::input2(text,'','',"Starting"		,'margin: .5px .5px .5px .5px; font-size: 20px; background: black; color: white;    padding: 5px 5px 5px 5px;width: 241px;','',"readonly='readonly'",'');
					//echo libre_v1::input2(text,'','',"Entry Date"		,'margin: .5px .5px .5px .5px; font-size: 20px; background: black; color: white;    padding: 5px 5px 5px 5px;width: 130px;','',"readonly='readonly'",'');
					echo libre_v1::input2(text,'','',"Ending"	,'margin: .5px .5px .5px .5px; font-size: 20px; background: black; color: white;    padding: 5px 5px 5px 5px;width: 241px;','',"readonly='readonly'",'');
					//echo libre_v1::input2(text,'','',"turn-off Date"	,'margin: .5px .5px .5px .5px; font-size: 20px; background: black; color: white;    padding: 5px 5px 5px 5px;width: 130px;','',"readonly='readonly'",'');
					echo libre_v1::input2(text,'','',"Time"				,'margin: .5px .5px .5px .5px; font-size: 20px; background: black; color: white;    padding: 5px 5px 5px 5px;width: 80px;','',"readonly='readonly'",'');
					
		echo "</div>";
		echo "<div id='list_agen' style='position: absolute;top: 150px;left: 5px;right: 5px;background: #3b75b0;height: 35px;overflow-x: hidden;overflow-y: auto;  padding: 5px 5px 5px 5px;'>";			
			$consu	= libre_v1::consulta			(agenda,$conexion	,'','','',''	,$phpv,'','');
			$posi= libre_v1::mysql_nu_ro			($consu,$phpv);
			libre_v1::mysql_da_se					($consu,$posi-1,$phpv);
			
			while(
			$datos=libre_v1::mysql_fe_ar		($consu,$phpv)
			){
				$consu1=libre_v1::consulta	(alumnos,$conexion,cuenta,$datos[cuenta],'','',$phpv,'','');
				$alumno=libre_v1::mysql_fe_ar		($consu1,$phpv);
				$nombre=$alumno[name]." ".$alumno[firt]." ".$alumno[last];
				$co="";
				$co=$co."<div style='position: relative;   '>";
					$co=$co. libre_v1::input2(text,'','',$datos[cuenta]	,'margin: .5px .5px .5px .5px; font-size: 20px; background: black; color: white;    		padding: 5px 5px 5px 5px;','',"readonly='readonly'",'');
					$co=$co. libre_v1::input2(text,'','',$nombre	,'margin: .5px .5px .5px .5px; font-size: 20px; background: black; color: white;    			padding: 5px 5px 5px 5px;width: 300px;','',"readonly='readonly'",'');
					$co=$co. libre_v1::input2(text,'','',$datos[entrada_hora]	,'margin: .5px .5px .5px .5px; font-size: 20px; background: black; color: white;    padding: 5px 5px 5px 5px;','',"readonly='readonly'",'');
					$co=$co. libre_v1::input2(text,'','',$datos[entrada_fecha]	,'margin: .5px .5px .5px .5px; font-size: 20px; background: black; color: white;    padding: 5px 5px 5px 5px;width: 130px;','',"readonly='readonly'",'');
					$co=$co. libre_v1::input2(text,'','',$datos[salida_hora]	,'margin: .5px .5px .5px .5px; font-size: 20px; background: black; color: white;    padding: 5px 5px 5px 5px;','',"readonly='readonly'",'');
					$co=$co. libre_v1::input2(text,'','',$datos[salida_fecha]	,'margin: .5px .5px .5px .5px; font-size: 20px; background: black; color: white;    padding: 5px 5px 5px 5px;width: 130px;','',"readonly='readonly'",'');
					$co=$co. libre_v1::input2(text,'','',$datos[tiempo]			,'margin: .5px .5px .5px .5px; font-size: 20px; background: #ffed25; color: black;  padding: 5px 5px 5px 5px;width: 80px;','',"readonly='readonly'",'');
					/*if($datos[salida_fecha]==''){
						$co=$co. libre_v1::input2(button,$datos[cuenta],'',"End Out"	,'margin: .5px .5px .5px .5px; font-size: 20px; background: green; color: white;    padding: 5px 5px 5px 5px;width: 90px;',$datos[entrada_hora],"readonly='readonly' onclick=' reg_getout(this);'",'');
					}else{
						$co=$co. libre_v1::input2(button,'','',"Finished"	,'margin: .5px .5px .5px .5px; font-size: 20px; background: #444; color: white;    padding: 5px 5px 5px 5px;width: 90px;','',"readonly='readonly'",'');
					}*/
				$co=$co."</div>";
				$to=$co.$to;
			}	
			echo$to;
		echo "</div>";	
		echo "<div style='position: absolute;background: #444;top: 218px;left: 5px;right: 5px;height: 90px'>";	
			echo libre_v1::input2(text,'','',"Check Out"			,'position: absolute; left: 420px;margin: .5px .5px .5px .5px; font-size: 20px; background: #ffed25; color: black;  padding: 5px 5px 5px 5px;width: 200px;  text-align: center;','',"readonly='readonly'",'');
			echo "<div style='position: absolute;left: 30px;top: 20px;width: 220px;'>";
				echo libre_v1::input2(text,'','Example "12345678"','','font-size: 20px;',cuenta2,"placeholder='Seach'"); 
				echo libre_v1::input2(button,'','',Submit,'font-size: 20px;position: absolute;right: 0px;','',"onclick='out_agen();'");
			
			echo "</div>";
		echo"</div>";	
		echo "<div id='list_out' style='position: absolute;top: 320px;left: 5px;right: 5px;background: #3b75b0;height: 150px;overflow-x: hidden;overflow-y: auto;  padding: 5px 5px 5px 5px;'>";			
			
		echo "</div>";
		
		
		
	echo"</div>";
	
	$entrada=" ";
?>