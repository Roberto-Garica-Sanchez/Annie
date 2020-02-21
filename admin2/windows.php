<?php
	
	include("libre_v1.php");				if($libre_v1=="")		{echo"<script>alert('[libre_v1] no localizado');</script>";}
	if($_POST[js]==1){//configuracion para js 
		$conexion= libre_v1::login('localhost',root,root,"",$phpv);//cambia segun cada server
	}
	
	if($_POST[win_carga]==Nuevo) 		{ nuevo($conexion,$phpv);}
	if($_POST[win_carga]==Reportes) 	{ reportes($conexion,$phpv);}
	if($_POST[win_carga]==Guardar) 		{ guarda($conexion,$phpv);}
	if($_POST[win_carga]=='Reparar Cuentas'){
		//echo libre_v1::input2(button,'','','Sistema De Reparacion','position: absolute; left: 200px; right: 5px;','','',botone_n);
		echo"<label style='position: absolute; left: 200px; background: black; right: 5px; height: 10px; color: white;     padding: 20px 0px 20px 0px;'>		<center>Sistema De Reparacion</center></label>";	
		
		echo"<div style='position: absolute; padding: 5px 5px 5px 5px; top: 0px; left: 0px; width: 185px; height: 80px; background: #3b5b8c;'>";
		echo libre_v1::input2(button,'Auto','',Auto,"width: 40px; margin: .5px .5px; text-align: center;",'','onclick="diagnostico1(this);" readonly="readonly"',botones_submenu);
		echo"</div>";
		echo"<div id='Diagnostico1' style='color: white;border: 5px;position: absolute; left: 200px; top: 55px; right: 5px; background: rgb(28, 29, 31); bottom: 5px; overflow-x: hidden; overflow-y: auto; '>";
			//Auto_veri($conexion,$phpv,1);
		echo"</div>";
		echo"<div style='width: 184px; height: 570px; position: absolute; background: rgb(59, 91, 140); top: 100px; overflow: hidden; padding: 5px 5px 5px 5px;overflow-x: hidden; overflow-y: auto;'>";
				libre_v1::db							(empresa,$conexion,$phpv);	
				$consu5	= libre_v1::consulta			(folio,$conexion	,'','','ID_G','1'	,$phpv,'');
				libre_v1::mysql_da_se					($consu5,0,$phpv);			
				while($datos=libre_v1::mysql_fe_ar		($consu5,$phpv)){
					echo libre_v1::input2(button,'name','',$datos[ID_G],"width: 40px; margin: .5px .5px; text-align: center;",'','onclick="diagnostico1(this);" readonly="readonly"',botones_submenu);
				}
				
		echo"</div>";
	}
	if($_POST[win_carga]==diagnostico0){
		libre_v1::db(empresa,$conexion,$phpv);
		Auto_veri($conexion,$phpv,1);
	}
	if($_POST[win_carga]==diagnostico1){
		libre_v1::db(empresa,$conexion,$phpv);
		$Carta=$_POST[Carta];
		manua_veri($Carta,$conexion,$phpv);
	}
function Auto_veri($conexion,$phpv,$interfa)	{
	libre_v1::db							(empresa,$conexion,$phpv);	
	$consu5	= libre_v1::consulta			(folio,$conexion	,'','','ID_G','1'	,$phpv,'');
	libre_v1::mysql_da_se					($consu5,0,$phpv);	
	if($interfa<>""){
		while($datos=libre_v1::mysql_fe_ar		($consu5,$phpv)){	
			echo"<div style='float: left; position: relative;background: blue; margin: 1px;'>";
				echo"<div>";
					echo libre_v1::input2(text,'','',Folios,'width: 50px; text-align: center;','','',botones_submenu);
					echo libre_v1::input2(text,'','',$datos[ID_G],'width: 50px; background: #248ec1; color: white;text-align: center;','','',botones_submenu);
				
				$tb 	= array(folio,abo_acu,casetas,casetas_c,casetas_via,casetas_c_via,disel,disel_c,fechas,fletes,fletes_c,facturas,facturas_c,viaticos,viaticos_c,ryr,ryr_c,guias,guias_c,maniobras,maniobras_c,km,update1,choferes);
				$estatus=bien; 
				$color=green;
				for($x=0; $x<=21; $x++){
					$res= verificador($datos[ID_G],$tb[$x],$conexion,$phpv);
					if($res==0){$estatus="Mal"; $color=red;}
				}	
				echo libre_v1::input2(text,'','','Estatus:',"background: $color; color: white; width: 50px;",'','',botones_submenu);
				echo libre_v1::input2(text,'','',$estatus,"background: $color; color: white; width: 50px;",'','',botones_submenu);
				echo"</div>";
			echo"</div>";
		}
	}
	if($interfa==""){
		while($datos=libre_v1::mysql_fe_ar		($consu5,$phpv)){	
				$tb 	= array(folio,abo_acu,casetas,casetas_c,casetas_via,casetas_c_via,disel,disel_c,fechas,fletes,fletes_c,facturas,facturas_c,viaticos,viaticos_c,ryr,ryr_c,guias,guias_c,maniobras,maniobras_c,km,update1,choferes);
				$estatus='bien'; 
				for($x=0; $x<=21; $x++){
					$res= verificador($datos[ID_G],$tb[$x],$conexion,$phpv);
					if($res==0){$estatus="mal"; }
				}	
				if($estatus=="mal")echo"<br>".$datos[ID_G];
		}
	}
}
function manua_veri($Carta,$conexion,$phpv)		{
	echo"<div>";
		echo libre_v1::input2(text,'','',Folios);
		echo libre_v1::input2(text,'','',$Carta);
	echo"</div>";
	echo"<div>";
	$tb 	= array(folio,abo_acu,casetas,casetas_c,casetas_via,casetas_c_via
	,disel,disel_c,fechas,fletes,fletes_c,facturas,facturas_c,viaticos,viaticos_c,ryr
	,ryr_c,guias,guias_c,maniobras,maniobras_c,km,update1,choferes);
	$estatus=bien;
	for($x=0; $x<=21; $x++){
		$res="";
		echo"<br>";
		$res= verificador($Carta,$tb[$x],$conexion,$phpv);
		if($res==0){$estatus="Mal";}
		echo libre_v1::input2(text,'','',$tb[$x]);
		echo libre_v1::input2(text,'','',$res);
	}	
	echo"<br>";
	echo libre_v1::input2(text,'','',Estatus);
	echo libre_v1::input2(text,'','',$estatus);
	echo"</div>";
	
}
function verificador($Carta,$tb,$conexion,$phpv){		
		$consu	= libre_v1::consulta		($tb,$conexion,ID_G,$Carta,'',''	,$phpv,'');
		$datos=libre_v1::mysql_fe_ar		($consu,$phpv);
		if($datos[ID_G]==""){$res=0;}
		if($datos[ID_G]<>""){$res=1;}
		return $res;
}
	if($_POST[win_carga]==Folder)		{		
		echo"<div style='background: rgba(44, 45, 45, 0.8); position: absolute; width: 400px; height: 100px; top: 5px; left: 5px; border-radius: 5px; '>";	
			libre_v1::db					(empresa,$conexion,$phpv);	
			$consu1		= libre_v1::consulta			(choferes,$conexion	,'','','',''	,$phpv,'');
			$consu2		= libre_v1::consulta			(placas,$conexion	,'','','',''	,$phpv,'');
			$consu3		= libre_v1::consulta			(clientes,$conexion	,'','','',''	,$phpv,'');	
			
		$style='width: 30px; margin: 1px;';	
			echo libre_v1::despliegre_mysql	(chofer,Chofer		,$consu1,Nombre_Ch	,$phpv," id='chofer' style='margin: 1px;'");
			echo "<br>";
			echo libre_v1::despliegre_mysql	(placas,Placas		,$consu2,Placas		,$phpv," id='placas' style='margin: 1px;'");	
			echo "<br>";
			echo libre_v1::despliegre_mysql	(cliente,Clientes	,$consu3,Nombre_Cl	,$phpv," id='cliente'style='margin: 1px;'");
	
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
	$conte=$conte.	libre_v1::input2(button,'','',Buscar,'','',"onclick='reportes();'");
	$conte=$conte."</td></tr></table> ";	
	echo"</div>	";

		echo"</div>";
		echo"<div style='background: rgba(44, 45, 45, 0.8); position: absolute; width: 800px; height: 400px; top: 110px; left: 5px; border-radius: 5px; '>";	
			echo"<div id='res_folder' style='background: white; position: absolute; top: 5px; bottom: 5px; left: 5px; right: 5px;'>";
			echo"</div>";
		echo"</div>";
	}
	if($_POST[win_carga]==Eliminar)		{
		echo"<div style='background: orange; position: absolute; width: 220px; height: 100px; left: 20px;'>";
			echo"<label style='position: absolute; background: #ffed25; width: 220px; text-align: center;'>Eliminar Cuenta </label>";
			echo"<div style='position: absolute; top: 20px;'>";
				echo"Este Proceso ELIMINA la Cuenta De Forma DEFINITIVA";
			echo"</div>";
			echo libre_v1::input2(button,'','Eliminara De Dorma Definitiva La Cuenta',Confirmar,'position: absolute;left: 5px; bottom: 5px;',Elimina,'onclick="Elim(this);"');
			echo libre_v1::input2(button,'','Cancelar Operacion',Cancelar,'position: absolute; right: 5px; bottom: 5px;',Elimina,'onclick="Elim(this);"');
		echo"</div>";
	}
	if($_POST[win_carga]==Ejecutor){
		$res=$_POST[sql];
		libre_v1::db					(empresa,$conexion,$phpv);	
		echo libre_v1::ejecuta			($conexion,$res,$phpv);
	}
	if($_POST[win_carga]==arrastrar)	{
		$text="background: #343434; color: #0075ff;";
		$conte=$conte."<div style='overflow-x: hidden; overflow-y: hidden; max-height: 500px; right: 0px; bottom: 0px; position: relative; left: 0px;'>";
		$style_all="margin: 0px .5px; text-align: center;";
		libre_v1::db					(empresa,$conexion,$phpv);
		$consu5	= libre_v1::consulta			(folio,$conexion	,CHOFER,$_POST[chofer],'ID_G','1'	,$phpv,'');
		libre_v1::mysql_da_se	($consu5,0,$phpv);			
		while($datos=libre_v1::mysql_fe_ar	($consu5,$phpv)){
			$consu24	= 	libre_v1::consulta(abo_acu,$conexion	,ID_G,$datos[ID_G],'',''	,$phpv,'1');
			$dato		= 	libre_v1::mysql_fe_ar	($consu24,$phpv);
			$c0='';	$c1='';	$c2='';
			if($datos[Revisado]==0){$c2=white;	$c0=red;			$Revisado="Pendiente";}
			if($datos[Revisado]==1){$c2=white;	$c0=yellowgreen;	$Revisado="Revisada";}
			if($dato[add_en]==''){$c1='#121212';	$Estado="Libre";}
			if($dato[add_en]<>''){$c1='#343434';	$Estado="Arrastrada";}
			
			$conte=$conte.$b1=libre_v1::input2(button	,Carta_arr	,'',$datos[ID_G]		,"width: 50px;".$style_all.$text,'','onclick="add_arrastra(this);"');
			$conte=$conte.$b2=libre_v1::input2(button	,''			,'',libre_v1::zero($dato[Total_Total]),"background: $c1; color: $c2; width: 60px;".$style_all);
			$conte=$conte.$b3=libre_v1::input2(button	,''			,'',$Revisado			,"background: $c1; color:$c0; width: 70px;".$style_all);
			$conte=$conte.$b4=libre_v1::input2(button	,''			,'',$Estado				,"background: $c1; color:$c2; width: 70px;".$style_all);
			
			
			$conte=$conte."<br>";
		}
		echo$conte=$conte."</div>";
	}
	if($_POST[win_carga]==add_arras)	{
		echo$_POST[Carta_arr];	
		}
	if($_POST[win_carga]==des_arras)	{		
		libre_v1::db						(empresa,$conexion,$phpv);
		$folio_con	= libre_v1::consulta	(folio	,$conexion,ID_G,$_POST[ID_G],'1','',$phpv,'');
		$folio		= libre_v1::mysql_fe_ar	($folio_con	,$phpv);
		echo$folio[Difer_1];
	}
	if($_POST[win_carga]==reportes)		{
	echo"<LINK REL='STYLESHEET' HREF='../admin2/windows.css' />";
	echo"<div style='background: #2237a5c9; position: absolute; overflow-y: auto; left: 1px; right: 1px; top: 1px; bottom: 1px; width: 1200px;	overflow-y: auto; overflow-x: auto;'>";	
		libre_v1::db						(empresa,$conexion,$phpv);
		$_POST[D]=libre_v1::zero			($_POST[D]);
		$_POST[M]=libre_v1::zero			($_POST[M]);
		$_POST[A]=libre_v1::zero			($_POST[A]);
		$_POST[D_r]=libre_v1::zero			($_POST[D_r]);
		$_POST[M_r]=libre_v1::zero			($_POST[M_r]);
		$_POST[A_r]=libre_v1::zero			($_POST[A_r]);
		$D_i	=libre_v1::zero($_POST[D]);			$A_i=libre_v1::zero($_POST[A]);		$M_i=libre_v1::zero($_POST[M]);
		$D_f	=libre_v1::zero($_POST[D_r]);		$A_f=libre_v1::zero($_POST[A_r]);	$M_f=libre_v1::zero($_POST[M_r]);
		$fec_ini= $A_i.$M_i.$D_i;
		$fec_fin= $A_f.$M_f.$D_f;
		$CONTADOR=0;
		$FLETES=0;
		$VIATICOS=0;
		$DIESEL=0;
		$CASETAS=0;
		$FACTURAS=0;
		$RYR=0;
		$GUIAS=0;
		$MANIOBRAS=0;
		$VIAPASS=0;
		$res="SELECT * FROM fechas WHERE A >= $_POST[A] AND A_r <= $_POST[A_r] ORDER BY ID_G DESC ";
		$fecha = libre_v1::ejecuta			($conexion,$res,$phpv);
		libre_v1::mysql_da_se		($fecha,0,$phpv);	
		if(!$_POST['List']){
		echo libre_v1::input2(text,'','','Folio 1'	,'background: #363434; color: white; width: 50px; margin: .5px;','',"disabled");
		echo libre_v1::input2(text,'','',Fecha		,'background: #363434; color: white; width: 75px; margin: .5px;','',"disabled");
		echo libre_v1::input2(text,'','',Operador	,'background: #363434; color: white; width: 180px;margin: .5px;','',"disabled");
		echo libre_v1::input2(text,'','',Unidad		,'background: #363434; color: white; width: 75px; margin: .5px;','',"disabled");
		echo libre_v1::input2(text,'','',Cliente	,'background: #363434; color: white; width: 180px;margin: .5px;','',"disabled");
		echo libre_v1::input2(text,'','',"Fletes R"	,'background: #363434; color: white; width: 75px; margin: .5px;','',"disabled");
		echo libre_v1::input2(text,'','',Fletes		,'background: #363434; color: white; width: 75px; margin: .5px;','',"disabled");
		echo libre_v1::input2(text,'','',Sueldo		,'background: #363434; color: white; width: 75px; margin: .5px;','',"disabled");
		echo libre_v1::input2(text,'','',Diesel		,'background: #363434; color: white; width: 75px; margin: .5px;','',"disabled");
		echo libre_v1::input2(text,'','',Casetas	,'background: #363434; color: white; width: 75px; margin: .5px;','',"disabled");
		echo libre_v1::input2(text,'','',Facturas	,'background: #363434; color: white; width: 75px; margin: .5px;','',"disabled");
		echo libre_v1::input2(text,'','',"R Y R"	,'background: #363434; color: white; width: 75px; margin: .5px;','',"disabled");
		echo libre_v1::input2(text,'','',"Via Pass"	,'background: #363434; color: white; width: 75px; margin: .5px;','',"disabled");
		}		
		echo"<div style=' background: #0000008a; bottom: 25px; position: absolute; overflow-y: auto; left: 0px; right: 0px; top: 20px;'>";
			while($fechas=libre_v1::mysql_fe_ar	($fecha,$phpv)){
				$D		=libre_v1::zero($fechas[D]);		$A	=libre_v1::zero($fechas[A]);	$M	=libre_v1::zero($fechas[M]);
				$D_c	=libre_v1::zero($fechas[D_c]);		$A_c=libre_v1::zero($fechas[A_c]);	$M_c=libre_v1::zero($fechas[M_c]);
				$fec_set= $A.$M.$D;
				$fechas[D]	=libre_v1::zero			($fechas[D]);
				$fechas[M]	=libre_v1::zero			($fechas[M]);
				$fechas[A]	=libre_v1::zero			($fechas[A]);
				$fechas[D_r]=libre_v1::zero			($fechas[D_r]);
				$fechas[M_r]=libre_v1::zero			($fechas[M_r]);
				$fechas[A_r]=libre_v1::zero			($fechas[A_r]);
				$data="$fechas[D]-$fechas[M]-$fechas[A]";
				$folios="";
				if(($fec_ini<=$fec_set)&&($fec_fin>=$fec_set)){
					$res	= "SELECT * FROM folio WHERE ID_G LIKE  '$fechas[ID_G]'";
					if($_POST[C]<>chofer){$res=$res." AND CHOFER LIKE  '$_POST[C]'";}
					if($_POST[P]<>placas){$res=$res." AND PLACAS LIKE  '$_POST[P]'";}
					if($_POST[CL]<>cliente){$res=$res." AND CLIENTE LIKE  '$_POST[CL]'";}
					$folios	= libre_v1::ejecuta			($conexion,$res,$phpv);
					libre_v1::mysql_da_se				($folios,0,$phpv);	
					$folio=libre_v1::mysql_fe_ar	($folios,$phpv);
					if($folio<>""){
						$fletes_con		= libre_v1::consulta	(fletes			,$conexion,ID_G,$folio[ID_G],'1','',$phpv,'');
						$fletes			= libre_v1::mysql_fe_ar	($fletes_con	,$phpv);
						$viaticos_con	= libre_v1::consulta	(viaticos		,$conexion,ID_G,$folio[ID_G],'1','',$phpv,'');
						$viaticos		= libre_v1::mysql_fe_ar	($viaticos_con	,$phpv);
						$disel_con		= libre_v1::consulta	(disel			,$conexion,ID_G,$folio[ID_G],'1','',$phpv,'');
						$disel			= libre_v1::mysql_fe_ar	($disel_con		,$phpv);
						$casetas_con	= libre_v1::consulta	(casetas		,$conexion,ID_G,$folio[ID_G],'1','',$phpv,'');
						$casetas		= libre_v1::mysql_fe_ar	($casetas_con	,$phpv);
						$facturas_con	= libre_v1::consulta	(facturas		,$conexion,ID_G,$folio[ID_G],'1','',$phpv,'');
						$facturas		= libre_v1::mysql_fe_ar	($facturas_con	,$phpv);
						$ryr_con		= libre_v1::consulta	(ryr			,$conexion,ID_G,$folio[ID_G],'1','',$phpv,'');
						$ryr			= libre_v1::mysql_fe_ar	($ryr_con		,$phpv);
						$guias_con		= libre_v1::consulta	(guias			,$conexion,ID_G,$folio[ID_G],'1','',$phpv,'');
						$guias			= libre_v1::mysql_fe_ar	($guias_con		,$phpv);
						$maniobras_con	= libre_v1::consulta	(maniobras		,$conexion,ID_G,$folio[ID_G],'1','',$phpv,'');
						$maniobras		= libre_v1::mysql_fe_ar	($maniobras_con	,$phpv);
						$viapass_con	= libre_v1::consulta	(casetas_via	,$conexion,ID_G,$folio[ID_G],'1','',$phpv,'');
						$viapass		= libre_v1::mysql_fe_ar	($viapass_con	,$phpv);
						$CONTADOR	=$CONTADOR+1;
						$FLETES		=$FLETES	+$fletes	[TOTAL1];
						$VIATICOS	=$VIATICOS	+$viaticos	[TOTAL2];
						$DIESEL		=$DIESEL	+$disel		[TOTAL3];
						$CASETAS	=$CASETAS	+$casetas	[TOTAL4];
						$FACTURAS	=$FACTURAS	+$facturas	[TOTAL5];
						$RYR		=$RYR		+$ryr		[TOTAL6];
						$GUIAS		=$GUIAS		+$guias		[TOTAL7];
						$MANIOBRAS	=$MANIOBRAS	+$maniobras	[TOTAL8];
						$VIAPASS	=$VIAPASS	+$viapass	[TOTAL];
						$SUELDOS	=$SUELDOS	+$folio		[sueldo];
						$FLETE_R	=$FLETE_R	+$fletes	[Flete_R];
						$all="position: absolute;";		
						if(!$_POST['List']){
							
							echo libre_v1::input2(text,'','',$folio[ID_G]						,'width: 50px; 	margin: 0px.5px;');
							echo libre_v1::input2(text,'','',$data								,'width: 75px; 	margin: 0px.5px;');
							echo libre_v1::input2(text,''	,$folio[CHOFER],$folio[CHOFER]		,'width: 180px; margin: 0px.5px;');
							echo libre_v1::input2(text,'','',$folio[PLACAS]						,'width: 75px; 	margin: 0px.5px;');
							echo libre_v1::input2(text,''	,$folio[CLIENTE],$folio[CLIENTE ]	,'width: 180px;	margin: 0px.5px;');
							echo libre_v1::input2(text,'','',$fletes	[Flete_R ]				,'width: 75px; 	margin: 0px.5px;');
							echo libre_v1::input2(text,'','',$fletes	[TOTAL1 ]				,'width: 75px; 	margin: 0px.5px;');
							echo libre_v1::input2(text,'','',$disel		[TOTAL3 ]				,'width: 75px; 	margin: 0px.5px;');
							echo libre_v1::input2(text,'','',$casetas	[TOTAL4 ]				,'width: 75px; 	margin: 0px.5px;');
							echo libre_v1::input2(text,'','',$facturas	[TOTAL5 ]				,'width: 75px; 	margin: 0px.5px;');
							echo libre_v1::input2(text,'','',$ryr		[TOTAL6 ]				,'width: 75px; 	margin: 0px.5px;');
							echo libre_v1::input2(text,'','',$guias		[TOTAL7 ]				,'width: 75px; 	margin: 0px.5px;');
							echo libre_v1::input2(text,'','',$viapass	[TOTAL ]				,'width: 75px; 	margin: 0px.5px;');
							echo"<br>";
			}
						/*
						if(!$_POST['List']){
							if($_POST[Deta]){echo"<div id='reporte1'>";}else {echo"<div id='reporte0'>";}
							echo"<div style='background: #343434; position: absolute; width: 200px; height: 300px; left: 5px; '>";
							echo "<label style='$all top: 10px; left: 10px;'>Folio</label>";
							echo "<label style='$all top: 10px; left: 100px;'>Fecha</label>";
							echo "<label style='$all top: 55px; left: 10px;'>Operador</label>";
							echo "<label style='$all top: 100px; left: 10px;'>Unidad</label>";
							echo "<label style='$all top: 145px; left: 10px;'>Cliente</label>";
							echo "<label style='$all top: 190px; left: 10px;'>Rendimiento</label>";
							
							echo libre_v1::input2(button,'','',$folio[ID_G]					,$all.'width: 70px; margin: .5px; top: 27px; left: 10px;');
							echo libre_v1::input2(button,'','',$data							,$all.'width: 75px; margin: .5px; top: 27px; left: 100px;');
							echo libre_v1::input2(button,'',$folio[CHOFER],$folio[CHOFER]		,$all.'width: 180px;margin: .5px; top: 72px; left: 10px;');
							echo libre_v1::input2(button,'','',$folio[PLACAS]					,$all.'width: 70px; margin: .5px; top: 117px; left: 10px;');
							echo libre_v1::input2(button,'',$folio[CLIENTE],$folio[CLIENTE ]	,$all.'width: 180px;margin: .5px; top: 163px; left: 10px;');
							$comi=  round($fletes[Flete_R]*0.0928,2);
							$total_men=$casetas[TOTAL4 ]+$facturas[TOTAL5 ]+$ryr[TOTAL6 ]+$guias[TOTAL7]+$maniobras[TOTAL8]+$folio[sueldo]+$disel[TOTAL3 ]+$viapass[TOTAL]+$comi;
							$total=$fletes[Flete_R]-$total_men;
							$re=    round($fletes[Flete_R]*0.01,2);
							//echo$total;
							$re=    round($total/$re,2);
							if ($re>=20){$color=green;}else{$color=red;}
							echo libre_v1::input2(button,'','',$re	,$all."width: 60px; margin: .5px; top: 190px; right: 10px; color: $color;");
							echo"</div>";
							
							
							echo"<div style='color: black; position: absolute; left: 210px; background: #ffffff82; right: 5px;  top: 5px; bottom: 5px;'>";
							$all="margin: 0px .5px 0px .5px; width: 70px;";
							$total=0;
							echo libre_v1::input2(button,'','',' '			,$all);
							echo libre_v1::input2(button,'','',Ingreso	,$all);
							echo libre_v1::input2(button,'','',Gastos		,$all);
							echo libre_v1::input2(button,'','',Total		,$all);
							echo libre_v1::input2(button,'','',Flete		,$all);				$total=$total+$fletes	[Flete_R ];
							echo libre_v1::input2(button,'','',$fletes	[Flete_R],$all.'');
							echo libre_v1::input2(button,'','',' '			,$all);
							echo libre_v1::input2(button,'','',$total		,$all);
							echo libre_v1::input2(button,'','','Casetas'	,$all);
							echo libre_v1::input2(button,'','',' '			,$all);				$total=$total-$casetas	[TOTAL4 ];
							echo libre_v1::input2(button,'','',$casetas	[TOTAL4 ],$all);
							echo libre_v1::input2(button,'','',$total		,$all);
							echo libre_v1::input2(button,'','','Facturadas',$all);
							echo libre_v1::input2(button,'','',' '			,$all);				$total=$total-$facturas	[TOTAL5 ];
							echo libre_v1::input2(button,'','',$facturas	[TOTAL5 ],$all);
							echo libre_v1::input2(button,'','',$total		,$all);
							echo libre_v1::input2(button,'','Refaciones y Reparaciones','R  Y R ',$all);
							echo libre_v1::input2(button,'','',' '			,$all);				$total=$total-$ryr		[TOTAL6 ];
							echo libre_v1::input2(button,'','',$ryr		[TOTAL6 ],$all);
							echo libre_v1::input2(button,'','',$total			,$all);
							echo libre_v1::input2(button,'','','Guias',$all);
							echo libre_v1::input2(button,'','',' '			,$all);				$total=$total-$guias	[TOTAL7 ];
							echo libre_v1::input2(button,'','',$guias		[TOTAL7 ],$all);
							echo libre_v1::input2(button,'','',$total		,$all);
							echo libre_v1::input2(button,'','','Maniobras',$all);
							echo libre_v1::input2(button,'','',' '			,$all);				$total=$total-$maniobras[TOTAL8 ];
							echo libre_v1::input2(button,'','',$maniobras	[TOTAL8 ],$all);
							echo libre_v1::input2(button,'','',$total		,$all);
							echo libre_v1::input2(button,'','','Sueldo'	,$all);
							echo libre_v1::input2(button,'','',' '			,$all);				$total=$total-$folio	[sueldo ];
							echo libre_v1::input2(button,'','',$folio		[sueldo ],$all);
							echo libre_v1::input2(button,'','',$total		,$all);
							echo libre_v1::input2(button,'','','Diesel'	,$all);
							echo libre_v1::input2(button,'','',' '			,$all);				$total=$total-$disel		[TOTAL3 ];
							echo libre_v1::input2(button,'','',$disel		[TOTAL3 ],$all);
							echo libre_v1::input2(button,'','',$total		,$all);
							echo libre_v1::input2(button,'','','Via Pass'	,$all);
							echo libre_v1::input2(button,'','',' '			,$all);				$total=$total-$viapass	[TOTAL ];
							echo libre_v1::input2(button,'','',$viapass	[TOTAL ],$all);
							echo libre_v1::input2(button,'','',$total		,$all);
							echo libre_v1::input2(button,'','','Comision'	,$all);				$comi=  round($fletes[Flete_R]*0.0928,2);
							echo libre_v1::input2(button,'','',' '			,$all);				$total=$total-$comi;
							echo libre_v1::input2(button,'','',$comi,$all);
							echo libre_v1::input2(button,'','',$total		,$all);
								echo"<div style='background: black'>";
								echo libre_v1::input2(button,'','','Totales'	,$all);				
								echo libre_v1::input2(button,'','',$fletes[Flete_R]	,$all."color: green;");		$total_men=$casetas[TOTAL4 ]+$facturas[TOTAL5 ]+$ryr[TOTAL6 ]+$guias[TOTAL7]+$maniobras[TOTAL8]+$folio[sueldo]+$disel[TOTAL3 ]+$viapass[TOTAL]+$comi;
								echo libre_v1::input2(button,'','','-'.$total_men		,$all."color: red;"); if ($total>0){$color=green;}else{$color=red;}
								echo libre_v1::input2(button,'','',$total				,$all."color: $color;");
								echo"</div >";
							echo "</div>";
						
						echo "</div>";
						}
						
						*/
					
					}
				}
			}
		echo"</div>";
		echo"<div style='position: absolute; bottom: 0px; left: 0px;'>";
				
			echo libre_v1::input2(text,'','',"N° ".$CONTADOR	,'background: #363434; color: white; width: 50px; margin: .5px;');
			echo libre_v1::input2(text,'','',''			,'background: #363434; color: white; width: 75px; margin: .5px;');
			echo libre_v1::input2(text,'','',''			,'background: #363434; color: white; width: 180px;margin: .5px;');
			echo libre_v1::input2(text,'','',''			,'background: #363434; color: white; width: 75px; margin: .5px;');
			echo libre_v1::input2(text,'','',''			,'background: #363434; color: white; width: 180px;margin: .5px;');
			echo libre_v1::input2(text,'','',$FLETE_R	,'background: #363434; color: white; width: 75px; margin: .5px;');
			echo libre_v1::input2(text,'','',$FLETES	,'background: #363434; color: white; width: 75px; margin: .5px;');
			echo libre_v1::input2(text,'','',$SUELDOS	,'background: #363434; color: white; width: 75px; margin: .5px;');
			echo libre_v1::input2(text,'','',$DIESEL	,'background: #363434; color: white; width: 75px; margin: .5px;');
			echo libre_v1::input2(text,'','',$CASETAS	,'background: #363434; color: white; width: 75px; margin: .5px;');
			echo libre_v1::input2(text,'','',$FACTURAS	,'background: #363434; color: white; width: 75px; margin: .5px;');
			echo libre_v1::input2(text,'','',$RYR		,'background: #363434; color: white; width: 75px; margin: .5px;');
			echo libre_v1::input2(text,'','',$VIAPASS	,'background: #363434; color: white; width: 75px; margin: .5px;');
		echo"</div>";
	
	echo"</div>";
	}
	if($_POST[win_carga]==reportes2)	{
		echo"hola";
	}
	if($_POST[win_carga]==menu_left)	{
		if($_POST[chofer]=="")$_POST[chofer]=Todos;
		echo libre_v1::input2(button,'choferes','',$_POST[chofer],'','',' onclick="menu_left(this);"');
		echo"<div style='position: absolute; top: 25px; bottom: 5px; width: 120px; overflow-x: hidden; overflow-y: auto;'>";
		libre_v1::db						(empresa,$conexion,$phpv);
		$consu	= libre_v1::consulta		(choferes,$conexion	,'','','',''	,$phpv,'');
		$consu5	= libre_v1::consulta		(folio,$conexion	,CHOFER,$_POST[chofer],'',''	,$phpv,'');
		if($_POST[operador]==choferes)	while($chofer=libre_v1::mysql_fe_ar	($consu,$phpv))		echo libre_v1::input2(button,'cuentas','',$chofer[Nombre_Ch],'',''," onclick='menu_left(this);'")."<br>";
		if($_POST[operador]==cuentas)	while($datos=libre_v1::mysql_fe_ar	($consu5,$phpv))	echo libre_v1::input2(button,'','',$datos[ID_G],'',''," ")."<br>";
		echo"</div>";
	}
	if($_POST[win_carga]==graficos)		{
		libre_v1::db						(empresa,$conexion,$phpv);
		$_POST[D]=libre_v1::zero			($_POST[D]);
		$_POST[M]=libre_v1::zero			($_POST[M]);
		$_POST[A]=libre_v1::zero			($_POST[A]);
		$_POST[D_r]=libre_v1::zero			($_POST[D_r]);
		$_POST[M_r]=libre_v1::zero			($_POST[M_r]);
		$_POST[A_r]=libre_v1::zero			($_POST[A_r]);
		$D_i	=libre_v1::zero($_POST[D]);			$A_i=libre_v1::zero($_POST[A]);		$M_i=libre_v1::zero($_POST[M]);
		$D_f	=libre_v1::zero($_POST[D_r]);		$A_f=libre_v1::zero($_POST[A_r]);	$M_f=libre_v1::zero($_POST[M_r]);
		$fec_ini= $A_i.$M_i.$D_i;
		$fec_fin= $A_f.$M_f.$D_f;
		$CONTADOR=0;
		$FLETES=0;
		$VIATICOS=0;
		$DIESEL=0;
		$CASETAS=0;
		$FACTURAS=0;
		$RYR=0;
		$GUIAS=0;
		$MANIOBRAS=0;
		$VIAPASS=0;
		$res="SELECT * FROM fechas WHERE A >= $_POST[A] AND A_r <= $_POST[A_r] ORDER BY ID_G DESC ";
		$fecha = libre_v1::ejecuta			($conexion,$res,$phpv);
		libre_v1::mysql_da_se		($fecha,0,$phpv);	
		while($fechas=libre_v1::mysql_fe_ar	($fecha,$phpv)){
			$D		=libre_v1::zero($fechas[D]);		$A	=libre_v1::zero($fechas[A]);	$M	=libre_v1::zero($fechas[M]);
			$D_c	=libre_v1::zero($fechas[D_c]);		$A_c=libre_v1::zero($fechas[A_c]);	$M_c=libre_v1::zero($fechas[M_c]);
			$fec_set= $A.$M.$D;
			$fechas[D]	=libre_v1::zero			($fechas[D]);
			$fechas[M]	=libre_v1::zero			($fechas[M]);
			$fechas[A]	=libre_v1::zero			($fechas[A]);
			$fechas[D_r]=libre_v1::zero			($fechas[D_r]);
			$fechas[M_r]=libre_v1::zero			($fechas[M_r]);
			$fechas[A_r]=libre_v1::zero			($fechas[A_r]);
			$data="$fechas[D]-$fechas[M]-$fechas[A]";
			$folios="";
			if(($fec_ini<=$fec_set)&&($fec_fin>=$fec_set)){
				$res	= "SELECT * FROM folio WHERE ID_G LIKE  '$fechas[ID_G]'";
				if($_POST[C]<>chofer){$res=$res." AND CHOFER LIKE  '$_POST[C]'";}
				if($_POST[P]<>placas){$res=$res." AND PLACAS LIKE  '$_POST[P]'";}
				if($_POST[CL]<>cliente){$res=$res." AND CLIENTE LIKE  '$_POST[CL]'";}
				$folios	= libre_v1::ejecuta			($conexion,$res,$phpv);
				libre_v1::mysql_da_se				($folios,0,$phpv);	
				$folio=libre_v1::mysql_fe_ar	($folios,$phpv);
				if($folio<>""){
					$fletes_con		= libre_v1::consulta	(fletes			,$conexion,ID_G,$folio[ID_G],'1','',$phpv,'');
					$fletes			= libre_v1::mysql_fe_ar	($fletes_con	,$phpv);
					$FLETES		=$FLETES	+$fletes[TOTAL1];
					$FLETES_R	=$FLETES_R	+$fletes[Flete_R];
				}
			}
		}
		$por=($FLETES*100)/$FLETES_R;
		$alto=(500*$por)/100;
		$res=$alto=libre_v1::forma_num($alto,1);
		echo libre_v1::div("height: 500px; background: #2e67a7; position: absolute; left: 10px; right: 10px; top: 10px; border-radius: 10px;",'',$res);
	}
	if($_POST[win_carga]==folder)		{
	echo$_POST[selet];
	}
	if($_POST[win_carga]==n_cuenta)		{	
		libre_v1::db							(empresa,$conexion,$phpv);
		$choferes_con	= libre_v1::consulta	(choferes	,$conexion,Nombre_Ch,$_POST[chofer],'1','',$phpv,'');
		$choferes		= libre_v1::mysql_fe_ar	($choferes_con	,$phpv);
		echo$choferes[N_fact]+1;
	}
	if($_POST[win_carga]==verificador)	{
		if(($_POST[elemento]==Carta1)||($_POST[elemento]==Carta2)||($_POST[elemento]==Carta3)||($_POST[elemento]==Carta4)){
			libre_v1::db							(empresa,$conexion,$phpv);
			$sql="SELECT * FROM folio WHERE Carta1 = $_POST[dato] OR Carta2 = $_POST[dato] OR Carta3 = $_POST[dato] OR Carta4 = $_POST[dato] ORDER BY ID_G DESC ";
			$res=libre_v1::ejecuta($conexion,$sql,$phpv);
			libre_v1::mysql_da_se	($res,0,$phpv);			
			$folio		= libre_v1::mysql_fe_ar	($res,$phpv);
			if($folio[ID_G]<>''){echo"background: red; ";}
			if($folio[ID_G]==''){echo"background: Green; ";}
		}
	}
	if($_POST[win_carga]==verificador2){
		$res=$_POST[sql];
		libre_v1::db					(empresa,$conexion,$phpv);	
		$consu=libre_v1::ejecuta		($conexion,$res,$phpv);
		$dato=libre_v1::mysql_fe_ar ($consu,$phpv);
		echo $dato[ID_G];
		
	}
	function nuevo		($conexion,$phpv){
		include("parche1.php");				if($parche1=="")		{echo"<script>alert('[parche1] no localizado');</script>";}
		echo$parche1_config;
		echo general	('',$conexion,$phpv);
		echo info		('',$conexion,$phpv);
		echo calculadora($conexion,$phpv);
		echo arrastrados("",$conexion,$phpv);
		echo ventana	(Consola,min);
		echo operadores();
		/*
		echo $parche1_config;
		echo info		('',$conexion,$phpv);
		echo general	('left: 110px;',$conexion,$phpv,$cuenta);
		echo calculadora($conexion,$phpv,$cuenta);
		echo arrastrados('left: 740px; ',$conexion,$phpv,$cuenta);
		echo ventana	(Consola,min);	
		echo operadores('
		*/
	}
	function reportes	($conexion,$phpv){
		include("parche2.php");				if($parche2=="")		{echo"<script>alert('[parche2] no localizado');</script>";}
	}
	function guarda		($conexion,$phpv){
		echo $_POST[sql];
	}
	function build_insert($date){
	$sql="INSERT INTO ".$date[config][tb]." (".$date[mysql][0];
		for($x=1; $x<=count($date[mysql])-1; $x++){
			$sql=$sql.",".$date[mysql][$x];
		}
		$sql=$sql.") VALUE ('".$_POST[$date[name][0]];
		for($x=1; $x<=count($date[name])-1; $x++){
			$sql=$sql."','".$_POST[$date[name][$x]];
		}
		$sql=$sql."')";
		return $sql;
	}
	$windows=1;
?>