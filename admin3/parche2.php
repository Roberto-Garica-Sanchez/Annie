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
	$conte=$conte.	libre_v1::input2(button,'','',Buscar,'','',"onclick='reportes2();'");
	/*$conte=$conte.	"<label>Detalles</label>";	
	$conte=$conte.	libre_v1::input2(checkbox,'','',detallado,"",detallado,"onclick='detalles();'",' ');	
	$conte=$conte.	"<label>Listados</label>";	
	$conte=$conte.	libre_v1::input2(checkbox,'','',lista,"",lista,"onclick='reportes();'",' ');	
	*/
	//$conte=$conte.	libre_v1::input2(button,'','',Graficos,'','',"onclick='grafico();'");
	$conte=$conte."</td></tr></table> ";
	//$conte=
	$style='background: rgba(100, 100, 100, 0.77); color: white; width: 100%; ';
	echo libre_v1::div($style,$libre,$conte);
	$style="width: 100%; background: rgba(0, 0, 0, 0.77); color: white; overflow-y: auto; overflow-x: auto; position: absolute; bottom: 0px; top: 30px;";
	$conte="";
	echo"<div class='respuestas' id='reportes'>";
	echo"</div>";
	echo"<div class='late' >";
		echo"<div>";
			echo"<label class='carda1'>Formato</label><br>";
			echo"<label class='carda1'><input type='radio'name='formato' id='formato' value='listas'  checked='checked'>Listas</label><br>";
			echo"<label class='carda1'><input type='radio'name='formato' id='formato' value='tabla'>Tablero </label><br>";
		echo"</div>";
		echo"<div>";
			echo"<label class='carda1'>Diesel</label><br>";
			echo"<label class='carda1'><input type='checkbox' id='diesel' value='diesel_consentra'>Diesel consentrados </label><br>";
		echo"</div>";
	/*
	<label><input type="checkbox" id="cbox1" value="first_checkbox"> Este es mi primer checkbox</label><br>

<input type="checkbox" id="cbox2" value="second_checkbox"> <label for="cbox2">Este es mi segundo checkbox</label>
	*/
	echo"</div>";
	//$libre="id='reportes'";
	//echo libre_v1::div($style,$libre,$conte);
?>	