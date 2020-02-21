<?php

	$cei="cei";
	$school="school";
	$user="gerente";
	//$cei="id4258000_cei";
	//$user="id4258000_gerente";
//	include("libre_v1.php");				if($libre_v1=="")		{echo"<script>alert('[libre_v1] no localizado');</script>";}
		$conexion= libre_v1::login('localhost',$user,gerente,"",$phpv);//cambia segun cada server
	echo"<div style='position: relative;width: 400px;height: 600px;background: #06f9;margin-left: auto;margin-right: auto;margin-top: auto;margin-bottom: auto;box-shadow: 0px 10px 10px 1px #0009; color: white;'>";	
		echo"<div style='position: absolute;width: 400px;height: 40px;background: #565656;font-size: 30px;text-align: center;'>";
			echo"Sign Up";
		echo"</div>";
		echo"<div style='position: absolute;top: 50px;right: 20px;left: 135px;bottom: 50px;'>";
		$style="font-size: 20px; height: 50px;margin: 6px 0px;";
			echo libre_v1::input2(text,'','','',$style,'nombre'	,"placeholder='Name	'			maxlength ='50'	onkeyup='ElemMaysPrim(this)'",botones_submenu);
			echo libre_v1::input2(hidden,'','',' ',$style,'firt',"placeholder='Next Name'		maxlength ='50'	onkeyup='ElemMaysPrim(this)'",botones_submenu);
			echo libre_v1::input2(text,'','','',$style,'last'	,"placeholder='Last Name'		maxlength ='50'	onkeyup='ElemMaysPrim(this)'",botones_submenu);
			echo libre_v1::input2(text,'','','',$style,'mail'	,"placeholder='Email(@ucol.mx)' maxlength ='50'								   ",botones_submenu);
			echo libre_v1::input2(text,'','','',$style,'cuenta'	,"placeholder='Account Number' 	maxlength ='8'	onchange='ver_cuenta()' onkeypress='return valida_n(event)' ",botones_submenu);
			echo libre_v1::input2(text,'','','',$style,'level'	,"placeholder='Level(B+)' 	  	maxlength ='10' onkeyup='ElemMaysPrim(this)''",botones_submenu);
			
						libre_v1::db		($cei,$conexion,$phpv);
			$consu	= 	libre_v1::consulta	($school,$conexion	,'','','','1'	,$phpv,'');
			echo libre_v1::despliegre_mysql	(school,School,$consu,tag,$phpv,"style='$style' id='school'",botones_submenu);
			echo libre_v1::input2(button,'','',Submit,$style,'',"placeholder='N Account' onclick='reg_alum()'",botones_submenu);
		echo"</div>";

		echo "<img src='../img/user-sistem.png' 	style='position: absolute; width: 80px; top: 41px; left: 30px;' />";
		echo "<img src='../img/school-sistem.png' 	style='position: absolute; width: 80px; top: 417px; left: 30px;' />";
	
		echo"<div id='Respuesta' style='text-align: center;padding-top: 10px;position: absolute;bottom: 0px;left: 10px;right: 10px;height: 35px;background: black;'>";
		echo"</div>";
		//echo libre_v1::input2(button,'','','Register Entry','position: absolute; bottom: 50px; right: -200px; height: 50px;width: 200px;  background: yellow;    font-size: 25px;','',"onclick='cambia();'");
	echo"</div>";
	
	/*
echo"<div style='position: relative;width: 400px;height: 600px;background: #06f9;margin-left: auto;margin-right: auto;margin-top: auto;margin-bottom: auto;box-shadow: 0px 10px 10px 1px #0009; color: white;'>";	
		echo"<div style='position: absolute;width: 400px;height: 40px;background: #565656;font-size: 30px;text-align: center;'>";
			echo"Sign Up";
		echo"</div>";
		echo libre_v1::input2(text,'','','','position: absolute;top: 65px;left: 125px;font-size: 20px;height: 50px;width: 200px;text-align: center;','nombre',"placeholder='Name	'");
		echo libre_v1::input2(text,'','','','position: absolute;top: 135px;left: 125px;font-size: 20px;height: 50px;width: 200px;text-align: center;','firt',"placeholder='First Name'");
		echo libre_v1::input2(text,'','','','position: absolute;top: 205px;left: 125px;font-size: 20px;height: 50px;width: 200px;text-align: center;','last',"placeholder='Last Name'");
		echo libre_v1::input2(text,'','','','position: absolute;top: 275px;left: 125px;font-size: 20px;height: 50px;width: 200px;text-align: center;','mail',"placeholder='mail' ");
		echo libre_v1::input2(text,'','','','position: absolute;top: 345px;left: 125px;font-size: 15px;height: 50px;width: 200px;text-align: center;','cuenta',"placeholder='Account Number' onchange='ver_cuenta()' onkeypress='return valida_n(event)'  maxlength ='8'");
		
					libre_v1::db		($cei,$conexion,$phpv);
		$consu	= 	libre_v1::consulta	($school,$conexion	,'','','','1'	,$phpv,'');
		echo libre_v1::despliegre_mysql	(school,School,$consu,name,$phpv,"style='position: absolute; top: 410px;left: 125px;font-size: 20px;height: 50px;width: 200px; text-align: center;' id='school'");
		
		echo "<img src='../img/user-sistem.png' 	style='position: absolute; width: 80px; top: 60px; left: 30px;' />";
		echo "<img src='../img/school-sistem.png' 	style='position: absolute; width: 80px; top: 420px; left: 30px;' />";
		echo libre_v1::input2(button,'','',Submit,'position: absolute;top: 480px;left: 125px;font-size: 20px;height: 50px;width: 200px;text-align: center;','',"placeholder='N Account' onclick='reg_alum()'");
		

		echo"<div id='Respuesta' style='text-align: center;padding-top: 10px;position: absolute;bottom: 0px;left: 10px;right: 10px;height: 35px;background: black;'>";
		echo"</div>";
		//echo libre_v1::input2(button,'','','Register Entry','position: absolute; bottom: 50px; right: -200px; height: 50px;width: 200px;  background: yellow;    font-size: 25px;','',"onclick='cambia();'");
	echo"</div>";
	*/
	$login=" ";
?>