<?php 
//creado el 16-10-17
	$parche3=" ";
	libre_v1::db								(empresa,$conexion,$phpv);	
	$consu1		= libre_v1::consulta			(choferes,$conexion	,'','','',''	,$phpv,'');
	$consu2		= libre_v1::consulta			(placas,$conexion	,'','','',''	,$phpv,'');
	$consu3		= libre_v1::consulta			(clientes,$conexion	,'','','',''	,$phpv,'');	
	$conte=$conte."<table border ='0'><tr><td>";
	$conte=$conte.libre_v1::despliegre_mysql	(chofer,Chofer		,$consu1,Nombre_Ch	,$phpv," id='chofer'");
	$conte=$conte.libre_v1::despliegre_mysql	(placas,Placas		,$consu2,Placas		,$phpv," id='placas'");	
	$conte=$conte.libre_v1::despliegre_mysql	(cliente,Clientes	,$consu3,Nombre_Cl	,$phpv," id='cliente'");
	$conte=$conte."</td><td>";
	
	$style='width: 30px; margin: 1px;';		
	$conte=$conte.	libre_v1::input2(text,'','',"Flecha Inicial","",'');
	$conte=$conte.	libre_v1::input2(text,D,'',date("d"),$style,'D',$libre);
	$conte=$conte.	libre_v1::input2(text,M,'',date("m")-1,$style,'M',$libre);
	$conte=$conte.	libre_v1::input2(text,A,'',date("Y"),$style,'A',$libre);
	$conte=$conte."</td><td>";
	$conte=$conte.	libre_v1::input2(text,'','',"Flecha Final","",'');	
	$conte=$conte.	libre_v1::input2(text,D_r,'',date("d"),$style,'D_r',$libre);
	$conte=$conte.	libre_v1::input2(text,M_r,'',date("m"),$style,'M_r',$libre);
	$conte=$conte.	libre_v1::input2(text,A_r,'',date("Y"),$style,'A_r',$libre);
	$conte=$conte."</td><td>";
	$conte=$conte.	libre_v1::input2(button,'','',Buscar,'','',"onclick='folder();'");
	$conte=$conte."</td></tr></table> ";
	//$conte=
	$style='background: rgba(100, 100, 100, 0.77); color: white; width: 100%; ';
	echo libre_v1::div($style,$libre,$conte);
	$style="width: 100%; background: rgba(0, 0, 0, 0.77); color: white; overflow-y: auto; overflow-x: auto; position: absolute; bottom: 0px; top: 30px;";
	$conte="";
	$libre="id='folder'";
	echo libre_v1::div($style,$libre,$conte);
?>	
