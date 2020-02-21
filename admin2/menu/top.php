<?php
$menu_isq=1;
$name=choferes;
$v1=Nuevo;
$v2=Folder;
$v3=Modificar;
$v4=Reportes;
$v5=Altas;

$style=" ";
	$conte=$conte."<div id='lateral' class='lateral'>";
		$script_input=" onclick=' cambia_co_centro	(this); '";	
		$conte=$conte.libre_v1::menu($style,$libre,$name,$v1,$v2,$v3,$v4,$v5,$v6,$v7,$v8,$v9,$v10,$v11,$script_input);
	$conte=$conte."</div>";
	$conte=$conte."<div style='width: 200px; height: 60px; background: #292a2d; position: absolute; top: 5px; right: 10px; border-radius: 10px; z-index: 1; color: white;' onclick='menu();'>";
		$conte=$conte."<div style='left: 10px; position: absolute; top: 20px;'>Usuarios";
		$conte=$conte."</div>";$res=$res.libre_v1::div("top: 15px;".$style1);
		$conte=$conte.libre_v1::div("top: 15px;".$style1);
		$conte=$conte.libre_v1::div("top: 28px;".$style1);
		$conte=$conte.libre_v1::div("top: 41px;".$style1);
	$conte=$conte."</div>";
	$conte=$conte."<div id='submenu' class='submenuhidden'>";
		$conte=$conte.libre_v1::input2(button,'Repara','','Reparar Cuentas','','','onClick="cambia_co_centro(this);"',botones_submenu);
		$conte=$conte.libre_v1::input2(button,'inicio','','Cambiar De Programa	','','','onclick="redirec(this);"',botones_submenu);
		$conte=$conte.libre_v1::input2(button,'','',Ajustes,'','','',botones_submenu);
		$conte=$conte.libre_v1::input2(button,'','',Salir,'','','',botones_submenu);
	$conte=$conte."</div>";
$style_co_top=$conte;
$conte="";
?>