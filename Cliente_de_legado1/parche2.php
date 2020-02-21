<?php 
	//creado el 23-09-17
	$parche2=" ";
	libre_v1::db					(empresa,$conexion,$phpv);	
	$consu1		= libre_v1::consulta			(choferes,$conexion	,'','','',''	,$phpv,'');
	$consu2		= libre_v1::consulta			(placas,$conexion	,'','','',''	,$phpv,'');
	$consu3		= libre_v1::consulta			(clientes,$conexion	,'','','',''	,$phpv,'');	
	$conte=$conte."<table border ='0'><tr><td>";
	$conte=$conte.libre_v1::despliegre_mysql	(chofer,Chofer		,$consu1,Nombre_Ch	,$phpv," id='chofer'");
	$conte=$conte.libre_v1::despliegre_mysql	(placas,Placas		,$consu2,Placas		,$phpv," id='placas'");	
	$conte=$conte.libre_v1::despliegre_mysql	(cliente,Clientes	,$consu3,Nombre_Cl	,$phpv," id='cliente'");
	$conte=$conte."</td><td>";
	
	$style='width: 30px; margin: 1px;';		
	//$libre="onchange='reportes();'";
	$conte=$conte.	libre_v1::input2(text,'','',"Flecha Inicial","",'');
	$conte=$conte.	libre_v1::input2(text,D,'',"",$style,'D',$libre);
	$conte=$conte.	libre_v1::input2(text,M,'',"",$style,'M',$libre);
	$conte=$conte.	libre_v1::input2(text,A,'',"",$style,'A',$libre);
	$conte=$conte."</td><td>";
	$conte=$conte.	libre_v1::input2(text,'','',"Flecha Final","",'');	
	$conte=$conte.	libre_v1::input2(text,D_r,'',date(" d "),$style,'D_r',$libre);
	$conte=$conte.	libre_v1::input2(text,M_r,'',"",$style,'M_r',$libre);
	$conte=$conte.	libre_v1::input2(text,A_r,'',"",$style,'A_r',$libre);
	$conte=$conte."</td><td>";
	$conte=$conte.	libre_v1::input2(button,'','',Buscar,'','',"onclick='reportes();'");
	$conte=$conte."</td></tr></table> ";
	//$conte=
	$style='background: rgba(100, 100, 100, 0.77); color: white; width: 100%; ';
	echo libre_v1::div($style,$libre,$conte);
	$style="width: 100%;
background: rgba(0, 0, 0, 0.77);
color: white;
overflow-y: auto;
overflow-x: auto;
position: absolute;
bottom: 0px;
top: 30px;";
	$conte="";
	$libre="id='reportes'";
	echo libre_v1::div($style,$libre,$conte);
?>	