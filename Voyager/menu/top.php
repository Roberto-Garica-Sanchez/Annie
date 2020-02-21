<?php
$menu_isq=1;
$name=menu;
//$v1=Registro;
$v2=Nuevo;
$v3=Folder;
$v6=Salir;

$style=" ";
	echo"<div id='style_co_top'>";
		echo"<div id='menu' class='menu' style=''>";
		echo"</div>";
		//echo"<div id='lateral' class='lateral' style=' display: none;'>";
		echo"<div id='lateral' class='lateral' style=''>";
		
		echo libre_v1::menu($style,$libre,$name,$v1,$v2,$v3,$v4,$v5,$v6,$v7,$v8,$v9,$v10,$v11,$script_input);			
			echo libre_v1::input2(hidden,'','','','position: relative;float: right;margin-right: 15px;background: black;color:  white;height:  50px;width:  150px;font-size:  20px;',idia,'',"");
			echo libre_v1::input2(hidden,'','','','position: relative;float: right;margin-right: 15px;background: black;color:  white;height:  50px;width:  150px;font-size:  20px;',imes,'',"");
			echo libre_v1::input2(hidden,'','','','position: relative;float: right;margin-right: 15px;background: black;color:  white;height:  50px;width:  150px;font-size:  20px;',iano,'',"");
			echo libre_v1::input2(hidden,'','','','position: relative;float: right;margin-right: 5px;background: black;color:  white;width:  150px;height: 50px;font-size:  20px;'	,ihora,'',"");
			echo libre_v1::input2(hidden,'','','','position: relative;float: right;margin-right: 5px;background: black;color:  white;width:  150px;height: 50px;font-size:  20px;'	,iminuto,'',"");
		echo"</div>";
		echo "<div style='width: 200px; height: 60px; background: #292a2d; position: absolute; top: 5px; right: 10px; border-radius: 10px; z-index: 1; color: white;' onclick='menu();'>";
			echo "<div style='left: 10px; position: absolute; top: 20px;'>";
			if ($conexion==''){echo libre_v1::input2(button,'','',Login,'color: white; background: #292a2d;',user,'');}
			echo "</div>";
			$style1="position: absolute;background: rgb(59, 91, 140);right: 20px;width: 50px;height: 5px;";
			echo libre_v1::div("top: 15px;".$style1);
			echo libre_v1::div("top: 28px;".$style1);
			echo libre_v1::div("top: 41px;".$style1);
		echo "</div>";
		echo "<div id='submenu' class='submenuhidden'>";
		echo libre_v1::input2(button,'','','','',fecha,'',botones_submenu);
		echo libre_v1::input2(button,'','','','',reloj,'',botones_submenu);
		if ($conexion==''){			
			echo libre_v1::input2(text		,'','','','',usuario,"placeholder='User'",botones_submenu);
			echo libre_v1::input2(password	,'','','','',pass,"placeholder='Password'",botones_submenu);
			echo libre_v1::input2(button	,'','',Submit,'','logi','onclick="login();"',botones_submenu);
			echo libre_v1::input2(button	,'','','Exit','display: none;','exi','onclick="desconectar()	;"',botones_submenu);
			echo libre_v1::input2(text		,'','','','',res_log,"",botones_submenu);
			
		}
			
		echo "</div>";
	echo "</div>";
$style_co_top="";
?>