<?php
	$cei="cei";
	$school="school";
	$user="gerente";
	//$cei="id4258000_cei";
	//$user="id4258000_gerente";
	include("libre_v1.php");				if($libre_v1=="")		{echo"<script>alert('[libre_v1] no localizado');</script>";}
	if($_POST[js]==1){//configuracion para js 
		$conexion= libre_v1::login('localhost',$user,gerente,"",$phpv);//cambia segun cada server
	}
	if($_POST[win_carga]==reg_alum)			{
		libre_v1::db($cei,$conexion,$phpv);
		$sql=libre_v1::espe_tab_insert	
		(alumnos
		,'cuenta',$_POST['cuenta']
		,'name'	,$_POST['name']
		,'firt'	,$_POST['firt']
		,'last'	,$_POST['last']
		,'correo',$_POST['mail']
		,'level',$_POST['level']
		,'school',$_POST['school']
		);
		libre_v1::ejecuta($conexion,$sql,$phpv);
		echo"1";
	}
	if($_POST[win_carga]==ver_cuenta)		{
		libre_v1::db		($cei,$conexion,$phpv);
		$dat=$_POST[cuenta];
		$sql="SELECT * FROM alumnos WHERE cuenta = $dat ORDER BY cuenta DESC ";
		$res=libre_v1::ejecuta($conexion,$sql,$phpv);
		$dato=libre_v1::mysql_fe_ar($res,$phpv);
		if($dato[cuenta]<>""){$res=1;}
		if($dato[cuenta]==""){$res=0;}
		echo$c1=$res;
	}
	
	if($_POST[win_carga]==Entrada)			{	//Interfaces para registrar entrada
		echo"<div style='position: relative;margin-bottom: auto;margin-top: auto;margin-left: auto;margin-right: auto;width: 600px;height: 200px;background: black;top: 20px;'>";
			echo"<div style='position: absolute;margin: 5px;background: #444;right: 0px;left: 0px;height: 50px;'>";
			echo libre_v1::input2(text,'','','','text-align: center;position: absolute;top: 0px;left: 0px;bottom: 0px;width: 450px;font-size: 30px;',cuenta,"onkeypress='return valida_n(event,entrada)'placeholder='Numero de Cuenta' maxlength ='8'");
			echo libre_v1::input2(button,'','','Buscar','position: absolute;top: 0px;right: 0px;bottom: 0px;width: 134px;font-size: 25px;'	,busca,"onclick='entrada();'"); 
			
			echo"</div>";
			echo"<div id='res_entrada' style='color: white;text-align: center;position: absolute;top: 60px;left: 5px;height: 115px;background: #102f41;right: 145px;overflow-y: auto;'>";
			echo"</div>";
			echo libre_v1::input2(button,'','',"Registrar",'position: absolute;bottom: 5px;right: 5px;height: 135px;width: 135px;font-size: 25px; background: #989898;',entra_ckeck,'onclick="reg_agen();" disabled'); 
			
			echo"<div id='con_entrada' style='color: white;text-align: center;position: absolute;bottom: 1px;left: 5px;height: 25px;background: rgb(59, 91, 140);right: 145px;overflow-y: auto;overflow-x:hidden;'>";
			echo"</div>";
		echo"</div>";
	}
	if($_POST[win_carga]==Salida)			{	//Interfaces para registrar salida
		echo"<div style='position: relative;margin-bottom: auto;margin-top: auto;margin-left: auto;margin-right: auto;width: 600px;height: 200px;background: black;top: 20px;'>";
			echo"<div style='position: absolute;margin: 5px;background: #444;right: 0px;left: 0px;height: 50px;'>";
			echo libre_v1::input2(text,'','','','text-align: center;position: absolute;top: 0px;left: 0px;bottom: 0px;width: 450px;font-size: 30px;',cuenta,"onkeypress='return valida_n(event,salida)'placeholder='Numero de Cuenta' maxlength ='8'");
			echo libre_v1::input2(button,'','','Buscar','position: absolute;top: 0px;right: 0px;bottom: 0px;width: 134px;font-size: 25px;'	,busca,"onclick='salida();'"); 
			
			echo"</div>";
			echo"<div id='res_salida' style='color: white;text-align: center;position: absolute;top: 60px;left: 5px;height: 115px;background: #102f41;right: 145px;overflow-y: auto;'>";
			echo"</div>";
			echo libre_v1::input2(button,'','',"Registrar",'position: absolute;bottom: 5px;right: 5px;height: 135px;width: 135px;font-size: 20px; background: #989898;',salida_ckeck,'onclick="reg_getout()" disabled'); 
			
			echo"<div id='con_salida' style='color: white;text-align: center;position: absolute;bottom: 1px;left: 5px;height: 25px;background: rgb(59, 91, 140);right: 145px;overflow-y: auto;overflow-x:hidden;'>";
			echo"</div>";
		echo"</div>";
	}
	if($_POST[win_carga]=="Existe_alumno")	{	//consulta si existe un alumno return 1 or 0 
		$cuenta=$_POST[cuenta];	
		$conexion= 	libre_v1::login			('localhost',$user,gerente,"",$phpv);//cambia segun cada server
					libre_v1::db			($cei,$conexion,$phpv);
		$consu=		libre_v1::consulta		(alumnos,$conexion,cuenta,$cuenta,'','',$phpv,1);
		$datos=		libre_v1::mysql_fe_ar	($consu,$phpv);
		if($datos[cuenta]<>''){echo"1";}
		if($datos[cuenta]==''){echo"0";}
	}
	if($_POST[win_carga]=="des_data_alum")	{	//venta de datos de alumno 
		$cuenta=$_POST[cuenta];	
		$conexion= 	libre_v1::login			('localhost',$user,gerente,"",$phpv);//cambia segun cada server
					libre_v1::db			($cei,$conexion,$phpv);
		$consu=		libre_v1::consulta		(alumnos,$conexion,cuenta,$cuenta,'','',$phpv,1);
		$datos=		libre_v1::mysql_fe_ar	($consu,$phpv);
		$nombre=$datos[name]." ".$datos[firt]." ".$datos[last];
		
			echo libre_v1::input2(button,'','',$nombre,'position: absolute;left: 5px;top: 5px;width: 295px;height: 50px;font-size: 20px;','',"");
			echo libre_v1::input2(button,'','',$datos[cuenta],'position: absolute;right: 5px;width: 140px;top: 5px;height: 50px;font-size: 20px;','',"");
			echo libre_v1::input2(button,'','',$datos[school],'position: absolute;bottom: 5px	;left: 5px;width: 440px;height: 50px;font-size: 15px;','',"");
		
	}
	if($_POST[win_carga]==ver_cierres)		{	//verifica que el alumno tenga seradas sus horas 
		$cuenta=$_POST[cuenta];	
		$conexion= 	libre_v1::login			('localhost',$user,gerente,"",$phpv);//cambia segun cada server
					libre_v1::db			($cei,$conexion,$phpv);
		
		$sql="SELECT * FROM agenda WHERE cuenta = '$cuenta' AND tiempo='' ORDER BY cuenta DESC ";
		$consu=libre_v1::ejecuta			($conexion,$sql,$phpv);
		$datos=libre_v1::mysql_fe_ar		($consu,$phpv);
		$res=1;
		libre_v1::mysql_da_se					($consu,0,$phpv);
		while($datos=libre_v1::mysql_fe_ar		($consu,$phpv)){
			if($datos[cuenta]<>""){$res=0;}
		}
		echo$res;
	}
	if($_POST[win_carga]=="reg_agen")		{ 	//registra un entrada 
		libre_v1::db($cei,$conexion,$phpv);
		$cuenta	=$_POST[cuenta];
		$reloj	=$_POST[reloj];
		$fecha	=$_POST[fecha];
		$segundo	=$_POST[segundo];
		$code_entrada_hora=$_POST[hora].$_POST[minuto].$_POST[segundo];
		$code_entrada_fecha=$_POST[ano].$_POST[mes].$_POST[dia];
		$sql="INSERT INTO agenda (cuenta,salida_hora,salida_fecha,entrada_hora
		,entrada_fecha,code_salida_hora,code_salida_fecha,code_entrada_hora,code_entrada_fecha,tiempo,horas,minutos
		) VALUE (
			'$cuenta','','','$reloj','$fecha','','','$code_entrada_hora','$code_entrada_fecha','','','')";
		libre_v1::ejecuta						($conexion,$sql,$phpv);
		echo"1";
	}
	if($_POST[win_carga]=="reg_getout")		{
		$cuenta	=$_POST[cuenta];
		libre_v1::db($cei,$conexion,$phpv);
		$reloj	=$_POST[reloj];
		$fecha	=$_POST[fecha];
		$code_salida_hora=$_POST[hora].$_POST[minuto];
		$code_salida_fecha=$_POST[ano].$_POST[mes].$_POST[dia];		
		
		//consulta			($tabla,$conexion,$col_espe,$espe,$orde,$dire,$phpv,$buscar,$pre_sql)
		$sql="SELECT * FROM agenda WHERE cuenta='$cuenta' AND tiempo=''";
		$consu0=libre_v1::ejecuta			($conexion,$sql,$phpv);
		libre_v1::mysql_da_se				($consu0,0,$phpv);
		$datos=libre_v1::mysql_fe_ar		($consu0,$phpv);
		$hora_f=$code_salida_hora[0]		.$code_salida_hora[1];
		$minu_f=$code_salida_hora[2]		.$code_salida_hora[3];
		$segundos_f=$code_salida_hora[4]		.$code_salida_hora[5];
		$hora_i=$datos[code_entrada_hora][0].$datos[code_entrada_hora][1];
		$minu_i=$datos[code_entrada_hora][2].$datos[code_entrada_hora][3];
		$segundoi=$datos[code_entrada_hora][4].$datos[code_entrada_hora][5];
		$datos[code_entrada_fecha];
		
		//echo"<br>".$minutos_i=($hora_i*60)+$minu_i;
		//echo"<br>".$minutos_f=($hora_f*60)+$minu_f;
		//echo"<br>".$total_m=$minutos_f-$minutos_i;
		//libre_v1::cal_tiempo($hora_i,$hora_f,$minu_i,$minu_f);
		//echo$res[horas].":".$res[minutos];
		$tiempo=($res[horas]*60)+$res[minutos];
		if($code_salida_fecha<>$datos[code_entrada_fecha]){$tiempo="Out of the Day";}
		if($hora_f>17){$tiempo="Out of Time";}
		$sql=libre_v1::espe_tab_update	(agenda,ID_G,$datos[ID_G]
		,salida_hora,$reloj
		,salida_fecha,$fecha
		,code_salida_hora,$code_salida_hora
		,code_salida_fecha,$code_salida_fecha
		,tiempo,$tiempo
		,horas,$res[horas]
		,minutos,$res[minutos]);
		
		//libre_v1::ejecuta			($conexion,$sql,$phpv);
		//echo"1";
	
	}
	
	if($_POST[win_carga]=="Reportes")		{		//intefaces de reportes
		libre_v1::db($cei,$conexion,php5);
		echo "<div style='position: absolute;background: #444;top: 5px;left: 5px;right: 5px;height: 120px'>";
			echo"<div style='position: absolute;top: 12px;left: 100px;'>";
			echo"</div>";
			echo"<div style='position: absolute;width: 300px;top: 12px;left: 250px;'>";
				echo libre_v1::input2(button,'','',"Fecha Inicio"	,$style."width: 100px;background: black;",'','',botones_submenu);
				echo libre_v1::input2(text,D,'',date("d")			,$style."width: 50px;",'D',$libre,botones_submenu);
				echo libre_v1::input2(text,M,'',date("m")			,$style."width: 50px;",'M',$libre,botones_submenu);
				echo libre_v1::input2(text,A,'',date("Y")			,$style."width: 50px;",'A',$libre,botones_submenu);
				echo "<br>";
				echo libre_v1::input2(button,'','',"Fecha Final"	,$style."width: 100px;background: black;",'','',botones_submenu);	
				echo libre_v1::input2(text,D_r,'',date("d")			,$style."width: 50px;",'D_r',$libre,botones_submenu);
				echo libre_v1::input2(text,M_r,'',date("m")			,$style."width: 50px;",'M_r',$libre,botones_submenu);
				echo libre_v1::input2(text,A_r,'',date("Y")			,$style."width: 50px;",'A_r',$libre,botones_submenu);
			echo"</div>";
			echo libre_v1::input2(button,'','',Crear,'font-size: 20px;position: absolute;left: 535px;top: 12px;height: 63px;','onclick="reportes()"','onclick="reportes()"');
			echo"<div style='position: absolute;bottom: 0px;left: 0px;right: 0px;height: 33px;background: black;'>";
				echo libre_v1::input2				(button,'','','Listado','width:50%;','noselet','onclick="automenu(this);menureporte(this);"',botones_submenu);
				echo libre_v1::input2				(button,'','','General','width:50%;','selet','onclick="automenu(this);menureporte(this);"',botones_submenu);
			echo"</div>";	
		echo "</div>";		
		echo "<div id='list_agen' style='color: white;position: absolute;bottom: 5px;left: 5px;right: 5px;background: #000000ad;top: 125px;overflow-x: hidden;overflow-y: auto;padding: 5px 5px 5px 5px;'>";			
			
		echo "</div>";
			
		
	}
	if($_POST[win_carga]=="reportes")		{
		if($_POST[selet]=="General"){$style1="display: block;";$style2="display: none;";}
		if($_POST[selet]=="Listado")	{$style1="display: none;";$style2="display: block;";}
		// lista 
		echo"<div id='list' style='$style2 position: absolute;top: 0px;left: 5px;right: 5px;bottom: 0px;background: #ffffff2e;'>";		
			echo"<div style='position: relative;margin-right: auto;margin-left: auto;width: 850px;'>";
				echo libre_v1::input2(text,'','',"Cuenta"			,'margin: .5px; background: black; color: white;	padding: 5px;text-align: center;width: 70px;'	,'',"readonly='readonly'",'');
				echo libre_v1::input2(text,'','',Nombre				,'margin: .5px; background: black; color: white;	padding: 5px;text-align: center;width: 200px;'	,'',"readonly='readonly'",'');
				echo libre_v1::input2(text,'','',"Entrada"			,'margin: .5px; background: black; color: white;    padding: 5px;text-align: center;width: 166px;'				,'',"readonly='readonly'",'');
				echo libre_v1::input2(text,'','',"Salida"			,'margin: .5px; background: black; color: white;    padding: 5px;text-align: center;width: 166px;'	,'',"readonly='readonly'",'');
				echo libre_v1::input2(text,'','',"Tiempo(m)"				,'margin: .5px; background: white; color: black;    padding: 5px;text-align: center;width: 80px;'	,'',"readonly='readonly'",'');
				echo libre_v1::input2(text,'','',"Estado"			,'margin: .5px; background: white; color: black;    padding: 5px;text-align: center;width: 80px;'	,'',"readonly='readonly'",'');
			echo"</div>";
			echo"<div style='position: relative;margin-right: auto;margin-left: auto;width: 850px;bottom: 0px; overflow-y: auto; overflow-x: hidden;    max-height: 395px;'>";
				$inicio=$_POST[A]	.$_POST[M]	.$_POST[D];
				$fin=$_POST[A_r]	.$_POST[M_r].$_POST[D_r];
				libre_v1::db($cei,$conexion,$phpv);	
				$res="SELECT * FROM agenda WHERE code_entrada_fecha >= $inicio AND code_entrada_fecha <= $fin";
				$consu = libre_v1::ejecuta				($conexion,$res,$phpv);		
				libre_v1::mysql_da_se					($consu,0,$phpv);
				$x=0;
				$tiempo=0;
				while($datos=libre_v1::mysql_fe_ar		($consu,$phpv)){
				//for($y=1; $y<=20; $y++){
					$x=$x+1;
					$tiempo=$tiempo+$datos[tiempo];
					$consu1=libre_v1::consulta			(alumnos,$conexion,cuenta,$datos[cuenta],'','',$phpv,'','');
					$alumno=libre_v1::mysql_fe_ar		($consu1,$phpv);
					$nombre=$alumno[name]." ".$alumno[firt]." ".$alumno[last];
					echo libre_v1::input2(text,'','',$datos[cuenta]			,'margin: .5px; background: black; color: white;	padding: 5px;text-align: center;width: 70px;'	,'',"readonly='readonly'",'');
					echo libre_v1::input2(text,'','',$nombre				,'margin: .5px; background: black; color: white;	padding: 5px;text-align: center;width: 200px;'	,'',"readonly='readonly'",'');
					echo libre_v1::input2(text,'','',$datos[entrada_hora]	,'margin: .5px; background: black; color: white;    padding: 5px;text-align: center;width: 70px;'				,'',"readonly='readonly'",'');
					echo libre_v1::input2(text,'','',$datos[entrada_fecha]	,'margin: .5px; background: black; color: white;    padding: 5px;text-align: center;width: 85px;'	,'',"readonly='readonly'",'');
					echo libre_v1::input2(text,'','',$datos[salida_hora]	,'margin: .5px; background: black; color: white;    padding: 5px;text-align: center;width: 70px;'	,'',"readonly='readonly'",'');
					echo libre_v1::input2(text,'','',$datos[salida_fecha]	,'margin: .5px; background: black; color: white;    padding: 5px;text-align: center;width: 85px;'	,'',"readonly='readonly'",'');
					echo libre_v1::input2(text,'','',$datos[tiempo]			,'margin: .5px; background: white; color: black;    padding: 5px;text-align: center;width: 80px;'	,'',"readonly='readonly'",'');
					if($datos[salida_fecha]==''){
						echo libre_v1::input2(button,'','',Pendiente			,'margin: .5px;background: #ffed25;color: black;    padding: 5px;text-align: center;width: 90px;'	,'',"readonly='readonly' ",'');
					}else{
						echo libre_v1::input2(button,'','',"Terminado"		,'margin: .5px; background: green; color: white;    padding: 5px;text-align: center;width: 90px;'	,'',"readonly='readonly'",'');
					}
					echo"<br>";
				}
			echo"</div>";	
		echo"</div>";
		//datos generales 
		echo"<div id='general'style='$style1 width: 600px;height: 200px;background: #102f41;position: relative;margin-left: auto;margin-right: auto;'>";
			echo"<div style='position: absolute;top: 20px;left: 0px;right: 0px;height: 50px;background: white;'>";
				echo libre_v1::input2(button,'','','Total De Horas'		,'width: 35%;height:50px;font-size: 20px;','','',botones_submenu);
				echo libre_v1::input2(button,'','',$tiempo.' Minutos'	,'width: 64.9%;height: 50px;right: 0px;position: absolute;font-size: 20px;','','',botones_submenu);
			echo"</div>";
			echo"<div style='position: absolute;top: 80px;left: 0px;right: 0px;height: 50px;background: white;'>";
				echo libre_v1::input2(button,'','','Total De Asistencias'		,'width: 35%;height:50px;font-size: 20px;','','',botones_submenu);
				echo libre_v1::input2(button,'','',$x.' Asistencias'	,'width: 64.9%;height: 50px;right: 0px;position: absolute;font-size: 20px;','','',botones_submenu);
			echo"</div>";/*
			echo"<div style='position: absolute;top: 140px;left: 0px;right: 0px;height: 50px;background: white;'>";
				echo libre_v1::input2(button,'','','Total De alumnos'		,'width: 35%;height:50px;font-size: 20px;','','',botones_submenu);
				echo libre_v1::input2(button,'','',$ads.' Minutos'	,'width: 64.9%;height: 50px;right: 0px;position: absolute;font-size: 20px;','','',botones_submenu);
			echo"</div>";*/
		echo"</div>";
			
	
		/*
		echo $_POST[alumnos];echo"<br>";
		echo $_POST[D];echo"<br>";
		echo $_POST[M];echo"<br>";
		echo $_POST[A];echo"<br>";
		echo $_POST[D_r];echo"<br>";
		echo $_POST[M_r];echo"<br>";
		echo $_POST[A_r];echo"<br>";
		echo $_POST[alumnos];
		echo"<br>";
		$inicio=$_POST[A]	.$_POST[M]	.$_POST[D];
		$fin=$_POST[A_r]	.$_POST[M_r].$_POST[D_r];
		libre_v1::db					(cei,$conexion,$phpv);	
		$res="SELECT * FROM agenda WHERE code_entrada_fecha >= $inicio AND code_entrada_fecha <= $fin";
		$consu = libre_v1::ejecuta				($conexion,$res,$phpv);		
		libre_v1::mysql_da_se					($consu,0,$phpv);
		while($datos=libre_v1::mysql_fe_ar		($consu,$phpv)){
			$consu1=libre_v1::consulta			(alumnos,$conexion,cuenta,$datos[cuenta],'','',$phpv,'','');
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
		echo$to;*/
	}	
	if($_POST[win_carga]=="login")			{
		$log=1;
		$usuario=$_POST[usuario];
		$clave	=$_POST[pass];		
		$conexion= 	libre_v1::login			('localhost',$user,gerente,"",$phpv);//cambia segun cada server
					libre_v1::db			($cei,$conexion,$phpv);
		$consu=		libre_v1::consulta		(usuarios,$conexion,nombre,$usuario,'','',$phpv,1);
					libre_v1::mysql_da_se	($consu,0,$phpv);
		$datos=		libre_v1::mysql_fe_ar	($consu,$phpv);
		
		if($datos[ID_G]=='')		{$log=2;}
		if(($datos[clave]<>$clave)and($log==1))	{$log=3;}
		echo $log;
	}
	if($_POST[win_carga]=="conectar")		{
		$usuario=$_POST[usuario];
		$clave	=$_POST[pass];		
		$conexion= 	libre_v1::login			('localhost',$user,gerente,"",$phpv);//cambia segun cada server
					libre_v1::db			($cei,$conexion,$phpv);
		$consu=		libre_v1::consulta		(usuarios,$conexion,nombre,$usuario,'','',$phpv,1);
		$datos=		libre_v1::mysql_fe_ar	($consu,$phpv);
		echo $datos[tag];
	}
	if($_POST[win_carga]=="out_agen")		{
		$cuenta=$_POST[cuenta];
		$entrada_fecha=$_POST[fecha];
		libre_v1::db($cei,$conexion,$phpv);
		$sql="SELECT * FROM agenda WHERE cuenta='$cuenta' AND entrada_fecha='$entrada_fecha'";
		$consu0=libre_v1::ejecuta			($conexion,$sql,$phpv);
		libre_v1::mysql_da_se				($consu0,0,$phpv);
		while($datos=libre_v1::mysql_fe_ar		($consu0,$phpv)){
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
				$co=$co. libre_v1::input2(text,'','',$datos[tiempo]			,'margin: .5px .5px .5px .5px; font-size: 20px; background: #ffed25; color: black;	padding: 5px 5px 5px 5px;width: 80px;','',"readonly='readonly'",'');
				if($datos[salida_fecha]==''){
					$co=$co. libre_v1::input2(button,$datos[cuenta],'',"Get Out"	,'margin: .5px .5px .5px .5px; font-size: 20px; background: green; color: white;    padding: 5px 5px 5px 5px;width: 90px;',$datos[entrada_hora],"readonly='readonly' onclick=' reg_getout(this);'",'');
				}else{
					$co=$co. libre_v1::input2(button,'','',"Finished"	,'margin: .5px .5px .5px .5px; font-size: 20px; background: #444; color: white;    padding: 5px 5px 5px 5px;width: 90px;','',"readonly='readonly'",'');
				}
			$co=$co."</div>";
			$to=$co.$to;
			
		}
		echo $to;
	}
	if($_POST[win_carga]=="verfica_time")	{
		echo "hola";
		echo"<br>";
		echo $_POST[cuenta];
		echo"<br>";
		echo $_POST[fecha];
		echo"<br>";
		echo $_POST[hora];
		echo"<br>";
		$cuenta=$_POST[cuenta];
		$entrada_fecha=$_POST[fecha];
		libre_v1::db($cei,$conexion,$phpv);
		$sql="SELECT * FROM agenda WHERE cuenta='$cuenta' AND entrada_fecha='$entrada_fecha'";
		
		$consu0=libre_v1::ejecuta			($conexion,$sql,$phpv);
		libre_v1::mysql_da_se				($consu0,0,$phpv);
		while($datos=libre_v1::mysql_fe_ar		($consu0,$phpv)){
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
				$co=$co. libre_v1::input2(text,'','',$datos[tiempo]			,'margin: .5px .5px .5px .5px; font-size: 20px; background: #ffed25; color: black;	padding: 5px 5px 5px 5px;width: 80px;','',"readonly='readonly'",'');
				if($datos[salida_fecha]==''){
					$co=$co. libre_v1::input2(button,$datos[cuenta],'',"Get Out"	,'margin: .5px .5px .5px .5px; font-size: 20px; background: green; color: white;    padding: 5px 5px 5px 5px;width: 90px;',$datos[entrada_hora],"readonly='readonly' onclick=' reg_getout(this);'",'');
				}else{
					$co=$co. libre_v1::input2(button,'','',"Finished"	,'margin: .5px .5px .5px .5px; font-size: 20px; background: #444; color: white;    padding: 5px 5px 5px 5px;width: 90px;','',"readonly='readonly'",'');
				}
			$co=$co."</div>";
			$to=$co.$to;
			
		}
		echo $to;
	}
	
	if($_POST[win_carga]=="Ajustes")		{//INTEFACEZ AJUSTES
		echo"<div style='position: relative;top: 0px;left: 0px;right: 0px;height: 33px;background: black; width: 850px;margin-left: auto;margin-right: auto;'>";
			echo libre_v1::input2				(button,'','','Estudiantes','width:50%;','noselet','onclick="automenu(this);menuajuste(this);"',botones_submenu);
			echo libre_v1::input2				(button,'','','Escuelas','width:50%;','selet','onclick="automenu(this);menuajuste(this);"',botones_submenu);
		echo"</div>";	
		echo"<div id='res_ajustes' style='position: absolute;bottom: 0px;left: 0px;right: 0px;top: 33px;background: #0000006b;'>";	
			echo"<div id='res_school' style='display: block;position: relative;width: 850px;/*height: 100%;*/background: #a2a9a2;;margin-left: auto;margin-right: auto;'>";
				
				echo"<div style='position: absolute;top: 0px;right: 0px;height: 100px;left: 0px;background: #3064b3;margin: 5px;'>";
					echo libre_v1::input2(button,'','',"Escuela",'width: 100%;font-size: 30px;height: 40px;','','',botone_n);
					echo libre_v1::input2(button,'','',"Actualizar",'    position: absolute;right: 5px;height: 45px;bottom: 5px;text-align: center;','','onclick="actua_school();"');
				echo"</div>";
				echo"<div style='position: absolute;bottom: 0px;left: 0px;right: 0px;height: 413px;background: #a2a9a2;    top: 105px;'>";
					echo"<div id='list_school'style='position: absolute;height: 200px;left: 5px;right: 5px;background: #fff;border: 1px;overflow-x: hidden;overflow-y: auto;box-shadow: inset 0px 1px 5px 1px black;padding: 5px;'>";
									libre_v1::db			($cei,$conexion,$phpv);
						$consu=		libre_v1::consulta		(school,$conexion,cuenta,$cuenta,'','',$phpv,1);
						while($datos=libre_v1::mysql_fe_ar		($consu,$phpv)){
							echo"<div style='width: 100%;height: 35px;  margin: 1px 0px;background: #343434;'>";
								//$nombre=$datos[name]." ".$datos[firt]." ".$datos[last];
								echo libre_v1::input2(button,'','',$datos[tag],'height: 35px;','','');
								echo libre_v1::input2(button,'','',$datos[name],'height: 35px; width: 400px;    margin: 0px 1px;','','');
								echo "<img id='modifi_school' 	name='$datos[tag]'src='../img/document.png' 			style='height: 35px;position: absolute;left: 510px;' title='Modificar' onclick=' operadores(this);'	>";
								echo "<img id='delect_school'	name='$datos[tag]'src='../img/document-delete-icon.png' 	style='height: 35px;position: absolute;left: 540px;' title='Eliminar'onclick=' operadores(this);'>";
							echo"</div>";	
							
						}
					echo"</div>";
					
					echo"<div style='position: absolute;top: 210px;bottom: 0px;left: 0px;right: 0px;'>";
						echo"<div id='datos_school'  style='position: absolute;top: 10px;left: 20px;right: 20px;height: 135px;background: white;padding: 10px;box-shadow: inset 0px 1px 5px 1px black;'>";
								echo libre_v1::input2(label,'','',"Escuela",'','','');
								echo"<br>";
								echo libre_v1::input2(text,'','',"",'width: 400px','name_school','placeholder="Nombre (Ejemplo: Faculta de Ingenieria Electromencanica)"maxlength="70"',botones_submenu);
								echo"<br>";
								echo libre_v1::input2(label,'','',"Tag",'','','',botone_n);
								echo"<br>";
								//echo libre_v1::input2(text,'','',"",'width: 120px','tag_school','placeholder="Tag (Ejemplo: FIE)"onKeyUp="Maysall(this);" maxlength="10" ',botones_submenu);
								libre_v1::db			($cei,$conexion,$phpv);
								$consu	= 	libre_v1::consulta	($school,$conexion	,'','','','1'	,$phpv,'');
								echo libre_v1::despliegre_mysql	(school,Escuela,$consu,tag,$phpv,"style='width: 120px;' id='tag_school'",botones_submenu);
						echo"</div>";
						echo libre_v1::input2(button,'','',"Limpiar"		,'position: absolute;bottom: 5px;right: 130px;width: 120px;'				,'clear_school'		,'onclick="operadores(this)"',botones_submenu);
						echo libre_v1::input2(button,'','',"Guardar"		,'width: 120px;position: absolute;bottom: 5px;right: 5px;'					,'save_school'		,'onclick="operadores(this);"',botones_submenu);
						echo libre_v1::input2(button,'','',"Guardar Cambios",'display: none;width: 120px;position: absolute;bottom: 5px;right: 5px;'	,'cambios_school'	,'onclick="operadores(this);"',botones_submenu);
						echo libre_v1::input2(button,'','',"Confirmar"		,'display: none; width: 120px;position: absolute;bottom: 5px;right: 255px;background: yellow;color: black;','confirma_school','onclick="operadores(this)"',botones_submenu);
					echo"</div>";
					
					echo"<div id='con_school' style='position: absolute;bottom: 0px;left: 10px;width: 400px;background: black;color: white;height: 20px; text-align: center;'>";
					echo"</div>";
				echo"</div>";
			echo"</div>";
			//-----------------------------------------------------------------------------------------------------------
			echo"<div id='res_studen' style='display: none;position: relative;width: 850px;/*height: 100%;*/background: #a2a9a2;;margin-left: auto;margin-right: auto;'>";
			
				echo"<div style='position: absolute;top: 0px;right: 0px;height: 100px;left: 0px;background: #3064b3;margin: 5px;'>";
					echo libre_v1::input2(button,'','',"Estudiante",'width: 100%;font-size: 30px;height: 40px;','','',botone_n);
					echo libre_v1::input2(button,'','',"Actualizar",'    position: absolute;right: 5px;height: 45px;bottom: 5px;text-align: center;','','onclick="actua_studen();"');
				echo"</div>";
				echo"<div style='position: absolute;bottom: 0px;left: 0px;right: 0px;height: 413px;background: #a2a9a2;    top: 105px;'>";
					echo"<div id='list_studen'style='position: absolute;height: 200px;left: 5px;right: 5px;background: #fff;border: 1px;overflow-x: hidden;overflow-y: auto;box-shadow: inset 0px 1px 5px 1px black;padding: 5px;'>";
									libre_v1::db			($cei,$conexion,$phpv);
						$consu=		libre_v1::consulta		(alumnos,$conexion,cuenta,$cuenta,'','',$phpv,1);
						while($datos=libre_v1::mysql_fe_ar		($consu,$phpv)){
							echo"<div style='width: 100%;height: 35px;  margin: 1px 0px;background: #343434;'>";
								$nombre=$datos[name]." ".$datos[last];
								echo libre_v1::input2(button,'','',$datos[cuenta],'height: 35px;','','');
								echo libre_v1::input2(button,'','',$nombre,'height: 35px; width: 400px;    margin: 0px 1px;','','');
								echo libre_v1::input2(button,'','',$datos[school],'height: 35px; ','','');
								echo "<img id='modifi_studen' 	name='$datos[cuenta]'src='../img/document.png' 				style='height: 35px;position: absolute;left: 605px;' title='Modificar' onclick=' operadores(this);'	>";
								echo "<img id='delect_studen'	name='$datos[cuenta]'src='../img/document-delete-icon.png' 	style='height: 35px;position: absolute;left: 640px;' title='Eliminar'	onclick=' operadores(this);'>";
							echo"</div>";	
							
						}
					echo"</div>";
					echo"<div style='position: absolute;top: 210px;bottom: 0px;left: 0px;right: 0px;'>";
						echo"<div id='datos_studen'  style='position: absolute;top: 10px;left: 20px;right: 20px;height: 135px;background: white;padding: 10px;box-shadow: inset 0px 1px 5px 1px black;'>";
							echo libre_v1::input2(button,'','',"Nombre",'width: 120px; background: black;','','',botones_submenu);
							echo libre_v1::input2(text,'','',"",'width: 120px;','name_studen'	,'placeholder="Nombre(s)"			maxlength="50"	onkeyup="ElemMaysPrim(this)"',botones_submenu);
							echo libre_v1::input2(hidden,'','',"",'width: 120px;','firt_studen'	,'placeholder="Apellido(s)"			maxlength="50"	onkeyup="ElemMaysPrim(this)"',botones_submenu);
							echo libre_v1::input2(text,'','',"",'width: 120px;','last_studen'	,'placeholder="Apellido(s)"			maxlength="50"	onkeyup="ElemMaysPrim(this)"',botones_submenu);
							echo libre_v1::input2(button,'','',"Numero Cuenta",'width: 120px; background: black;margin: 0px 0px 0px 5px;','','',botones_submenu);
							echo libre_v1::input2(text,'','',"",'width: 120px;','account_studen','placeholder="20122000"	maxlength="8"onkeypress="return valida_n(event)" onchange="ver_cuenta(this)" ',botones_submenu);
							echo"<br>";
							echo libre_v1::input2(button,'','',"Correo",'width: 120px; background: black;','','',botones_submenu);
							echo libre_v1::input2(text,'','',"",'width: 240px;','mail_studen','placeholder="Email(@ucol.mx)"	maxlength="50"',botones_submenu);
							echo"<br>";
							echo libre_v1::input2(button,'','',"Nivel",'width: 120px; background: black;','','',botones_submenu);
							//echo libre_v1::input2(text,'','',"",'width: 120px;','level_studen','placeholder="Nivel Ingles"			maxlength="10"	onkeyup="ElemMaysPrim(this)"',botones_submenu);
							libre_v1::db		($cei,$conexion,$phpv);
							$consu	= 	libre_v1::consulta	(nivel,$conexion	,'','','','1'	,$phpv,'');
							echo libre_v1::despliegre_mysql	(nivel,Nivel,$consu,nivel,$phpv,"style='width: 120px;' id='level_studen'",botones_submenu);
							echo"<br>";
							echo libre_v1::input2(button,'','',"Escuela",'width: 120px; background: black;','','',botones_submenu);
											
							$consu	= 	libre_v1::consulta	($school,$conexion	,'','','','1'	,$phpv,'');
							echo libre_v1::despliegre_mysql	(school,Escuela,$consu,tag,$phpv,"style='width: 120px;' id='school_studen'",botones_submenu);
						echo"</div>";
						echo libre_v1::input2(button,'','',"Limpiar"		,'position: absolute;bottom: 5px;right: 130px;width: 120px;'				,'clear_studen'		,'onclick="operadores(this)"',botones_submenu);
						echo libre_v1::input2(button,'','',"Guardar"		,'width: 120px;position: absolute;bottom: 5px;right: 5px;'					,'save_studen'		,'onclick="operadores(this);"',botones_submenu);
						echo libre_v1::input2(button,'','',"Guardar Cambios",'display: none;width: 120px;position: absolute;bottom: 5px;right: 5px;'	,'cambios_studen'	,'onclick="operadores(this);"',botones_submenu);
						echo libre_v1::input2(button,'','',"Confirmar"		,'display: none; width: 120px;position: absolute;bottom: 5px;right: 255px;background: yellow;color: black;','confirma_studen','onclick="operadores(this)"',botones_submenu);
					echo"</div>";
					
					
					echo"<div id='con_studen' style='position: absolute;bottom: 0px;left: 10px;width: 400px;background: black;color: white;height: 20px; text-align: center;'>";
					echo"</div>";
				echo"</div>";
			echo"</div>";
		echo"</div>";	
		
	}
	if($_POST[win_carga]=="descarga_school"){//descarga una escuela para su modificasion 
		
		$tag=$_POST[tag];
					libre_v1::db			($cei,$conexion,$phpv);
		$consu=		libre_v1::consulta		(school,$conexion,tag,$tag,'','',$phpv);
		$datos=libre_v1::mysql_fe_ar		($consu,$phpv);
		echo libre_v1::input2(label,'','',"Escuela",'','','');
		echo"<br>";
		echo libre_v1::input2(text,'','',$datos[name],'width: 400px','name_school','placeholder="Nombre (Ejemplo: Faculta de Ingenieria Electromencanica)"maxlength="70"',botones_submenu);
		echo"<br>";
		echo libre_v1::input2(label,'','',"Tag",'','','',botone_n);
		echo"<br>";
		//echo libre_v1::input2(text,'','',$datos[tag],'width: 120px','tag_school','placeholder="Tag (Ejemplo: FIE)"onKeyUp="Maysall(this);" maxlength="10" ',botones_submenu);
		libre_v1::db			($cei,$conexion,$phpv);
		$consu	= 	libre_v1::consulta	($school,$conexion	,'','','','1'	,$phpv,'');
		echo libre_v1::despliegre_mysql	(school,Escuela,$consu,tag,$phpv,"style='width: 120px;' id='tag_school'",botones_submenu,tag,$datos[tag]);
		
	}
	if($_POST[win_carga]=="descarga_studen"){//descarga una estudiantes para su modificasion 
	
		$cuenta=$_POST[cuenta];
					libre_v1::db			($cei,$conexion,$phpv);
		$consu=		libre_v1::consulta		(alumnos,$conexion,cuenta,$cuenta,'','',$phpv);
		$datos=libre_v1::mysql_fe_ar		($consu,$phpv);
		echo libre_v1::input2(button,'',''	,"Nombre",'width: 120px; background: black;','','',botones_submenu);
		echo libre_v1::input2(text,'',''	,$datos[name],'width: 120px;','name_studen','placeholder="Nombre(s)"				maxlength="50"	onkeyup="ElemMaysPrim(this)"',botones_submenu);
		echo libre_v1::input2(hidden,'',''	,$datos[firt],'width: 120px;','firt_studen','placeholder="Apellido(s)"			maxlength="50"	onkeyup="ElemMaysPrim(this)"',botones_submenu);
		echo libre_v1::input2(text,'',''	,$datos[last],'width: 120px;','last_studen','placeholder="Apellido(s)"			maxlength="50"	onkeyup="ElemMaysPrim(this)"',botones_submenu);
		echo libre_v1::input2(button,'',''	,"Numero de Cuenta",'width: 120px;  background: black;margin: 0px 0px 0px 5px;','','',botones_submenu);
		echo libre_v1::input2(text,'',''	,$datos[cuenta],'width: 120px;background: #0000004f; color: black;','account_studen','disabled placeholder="Account Number"	maxlength="8"onkeypress="return valida_n(event)" onchange="ver_cuenta(this)" ',botones_submenu);
		echo"<br>";
		echo libre_v1::input2(button,'',''	,"Correo",'width: 120px; background: black;','','',botones_submenu);
		echo libre_v1::input2(text,'',''	,$datos[correo],'width: 240px;','mail_studen','placeholder="Email(@ucol.mx)"	maxlength="50"',botones_submenu);
		echo"<br>";
		echo libre_v1::input2(button,'',''	,"Nivel",'width: 120px; background: black;','','',botones_submenu);
		libre_v1::db		($cei,$conexion,$phpv);
		$consu	= 	libre_v1::consulta	(nivel,$conexion	,'','','','1'	,$phpv,'');
		echo libre_v1::despliegre_mysql	(nivel,Nivel,$consu,nivel,$phpv,"style='width: 120px;' id='level_studen'",botones_submenu,'nivel',$datos[level]);
		echo"<br>";
		echo libre_v1::input2(button,'',''	,"Escuela",'width: 120px; background: black;','','',botones_submenu);
						
		$consu	= 	libre_v1::consulta	(school,$conexion	,'','','','1'	,$phpv,'');
		echo libre_v1::despliegre_mysql	(school,School,$consu,'tag',$phpv,"style='width: 120px;' id='school_studen'",botones_submenu,'tag',$datos[school]);
	}	
	if($_POST[win_carga]=="elimina_school")	{//elinina una escuela 
	
		$tag=$_POST[tag];
		libre_v1::db			($cei,$conexion,$phpv);
		$sql=libre_v1::delete(school,tag,$tag,$conexion,$phpv);		
		echo"1";
	}	
	if($_POST[win_carga]=="ver_tag")		{//revisa si esta disponible un tag en school
		$tag=$_POST[tag];
					libre_v1::db			($cei,$conexion,$phpv);
					//consulta			($tabla,$conexion,$col_espe,$espe,$orde,$dire,$phpv,$buscar,$pre_sql)
		$consu=		libre_v1::consulta		(school,$conexion,tag,$tag,'','',$phpv,1);
		$res=1;
		while($datos=libre_v1::mysql_fe_ar		($consu,$phpv)){
		if($datos[tag]<>"")$res=0;
				
		}
		echo $res;
	}
	if($_POST[win_carga]=="save_school")	{//guarda una escuela
		$tag=$_POST[tag];
		$name=$_POST[name];
		libre_v1::db($cei,$conexion,$phpv);
		$sql=libre_v1::espe_tab_insert	
		(school
		,'tag',$tag
		,'name'	,$name
		);
		libre_v1::ejecuta($conexion,$sql,$phpv);
		echo"1";
	}
	if($_POST[win_carga]=="actua_school")	{
		libre_v1::db			($cei,$conexion,$phpv);
		$consu=		libre_v1::consulta		(school,$conexion,cuenta,$cuenta,'','',$phpv,1);
		while($datos=libre_v1::mysql_fe_ar		($consu,$phpv)){
			echo"<div style='width: 100%;height: 35px;  margin: 1px 0px;background: #343434;'>";
				//$nombre=$datos[name]." ".$datos[firt]." ".$datos[last];
				echo libre_v1::input2(button,'','',$datos[tag],'height: 35px;','','');
				echo libre_v1::input2(button,'','',$datos[name],'height: 35px; width: 400px;','','');
				echo "<img id='modifi_school' 	name='$datos[tag]'src='../img/document.png' 			style='height: 35px;position: absolute;left: 510px;' title='Modificar' onclick=' operadores(this);'	>";
				echo "<img id='delect_school'	name='$datos[tag]'src='../img/document-delete-icon.png' 	style='height: 35px;position: absolute;left: 540px;' title='Eliminar'onclick=' operadores(this);'>";
			echo"</div>";	
			
		}
	}
	if($_POST[win_carga]=="actua_studen")	{
						libre_v1::db			($cei,$conexion,$phpv);
		$consu=		libre_v1::consulta		(alumnos,$conexion,cuenta,$cuenta,'','',$phpv,1);
		while($datos=libre_v1::mysql_fe_ar		($consu,$phpv)){
			echo"<div style='width: 100%;height: 35px;  margin: 1px 0px;background: #343434;'>";
				$nombre=$datos[name]." ".$datos[firt]." ".$datos[last];
				echo libre_v1::input2(button,'','',$datos[cuenta],'height: 35px;','','');
				echo libre_v1::input2(button,'','',$nombre,'height: 35px; width: 400px;    margin: 0px 1px;','','');
				echo libre_v1::input2(button,'','',$datos[school],'height: 35px; ','','');
				echo "<img id='modifi_studen' 	name='$datos[cuenta]'src='../img/document.png' 				style='height: 35px;position: absolute;left: 605px;' title='Modificar' onclick=' operadores(this);'	>";
				echo "<img id='delect_studen'	name='$datos[cuenta]'src='../img/document-delete-icon.png' 	style='height: 35px;position: absolute;left: 640px;' title='Eliminar'	onclick=' operadores(this);'>";
			echo"</div>";	
			
		}
	}
	if($_POST[win_carga]=="cambios_school")	{
		$tag=$_POST[tag];
		$name=$_POST[name];
		libre_v1::db($cei,$conexion,$phpv);
		$sql=libre_v1::espe_tab_update	(school,tag,$tag,name,$name);
		libre_v1::ejecuta($conexion,$sql,$phpv);
		echo"1";
	}
	if($_POST[win_carga]=="cambios_studen")	{
		$cuenta	=$_POST[cuenta];
		$name	=$_POST[name];
		$firt	=$_POST[firt];
		$last	=$_POST[last];
		$correo	=$_POST[correo];
		$level	=$_POST[level];
		$school	=$_POST[school];
		libre_v1::db($cei,$conexion,$phpv);
		$sql=libre_v1::espe_tab_update(alumnos,cuenta,$cuenta,name,$name,firt,$firt,last,$last,correo,$correo,level,$level,school,$school);
		libre_v1::ejecuta($conexion,$sql,$phpv);
		echo"1";
	}
	if($_POST[win_carga]=="elimina_studen")	{
		$cuenta=$_POST[cuenta];
		libre_v1::db($cei,$conexion,$phpv);
		libre_v1::delete(alumnos,cuenta,$cuenta,$conexion,$phpv);
		echo"1";
	}
	$windows=1;
?>