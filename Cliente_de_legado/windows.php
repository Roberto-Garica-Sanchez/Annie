<?php
	
	include("libre_v1.php");				if($libre_v1=="")		{echo"<script>alert('[libre_v1] no localizado');</script>";}
	if($_POST[js]==1){//configuracion para js 
		$conexion= libre_v1::login('localhost',root,'',"",$phpv);//cambia segun cada server
	}
	
	if($_POST[win_carga]==Nuevo) 		{ nuevo($conexion,$phpv);}
	if($_POST[win_carga]==Reportes) 	{ reportes($conexion,$phpv);}
	if($_POST[win_carga]==arrastrar)	{
		$text="background: #343434; color: #0075ff;";
		$conte=$conte."<div style='overflow-x: hidden; overflow-y: hidden; max-height: 500px; right: 0px; bottom: 0px; position: relative; left: 0px;'>";
		$style_all="margin: 0px .5px; text-align: center;";
		libre_v1::db					(empresa,$conexion,$phpv);
		$consu5	= libre_v1::consulta			(folio,$conexion	,CHOFER,$_POST[chofer],'',''	,$phpv,'');
		libre_v1::mysql_da_se	($consu5,0,$phpv);			
		while($datos=libre_v1::mysql_fe_ar	($consu5,$phpv)){
			$consu24	= 	libre_v1::consulta(abo_acu,$conexion	,ID_G,$datos[ID_G],'',''	,$phpv,'1');
			$dato		= 	libre_v1::mysql_fe_ar	($consu24,$phpv);
			$c0='';	$c1='';	$c2='';
			if($datos[Revisado]==0){$c2=white;	$c0=red;			$Revisado="Pendiente";}
			if($datos[Revisado]==1){$c2=white;	$c0=yellowgreen;	$Revisado="Revisada";}
			if($dato[add_en]==''){$c1='#121212';	$Estado="Libre";}
			if($dato[add_en]<>''){$c1='#343434';	$Estado="Arrastrada";}
			
			$conte=$conte.$b1=libre_v1::input2(submit	,Carta_arr	,'',$datos[ID_G]		,"width: 50px;".$style_all.$text,'','onclick="add_arrastra(this);"');
			$conte=$conte.$b2=libre_v1::input2(button	,''			,'',libre_v1::zero($dato[Total_Total]),"background: $c1; color: $c2; width: 60px;".$style_all);
			
			$conte=$conte.$b3=libre_v1::input2(button	,''			,'',$Revisado			,"background: $c1; color:$c0; width: 70px;".$style_all);
			$conte=$conte.$b4=libre_v1::input2(button	,''			,'',$Estado				,"background: $c1; color:$c2; width: 70px;".$style_all);
			
			
			$conte=$conte."<br>";
		}
		echo$conte=$conte."</div>";
	}
	if($_POST[win_carga]==add_arras)	{echo$_POST[Carta_arr];	}
	if($_POST[win_carga]==reportes)		{
	echo"<div style='background: #055293b3; position: absolute; overflow-y: auto; left: 1px; right: 1px; top: 1px; bottom: 1px; width: 1200px;	overflow-y: auto; overflow-x: auto;'>";	
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
			
		echo libre_v1::input2(text,'','','Folio 1'	,'background: #363434; color: white; width: 70px; margin: .5px;');
		echo libre_v1::input2(text,'','',Fecha		,'background: #363434; color: white; width: 70px; margin: .5px;');
		echo libre_v1::input2(text,'','',Operador	,'background: #363434; color: white; width: 150px; margin: .5px;');
		echo libre_v1::input2(text,'','',Unidad		,'background: #363434; color: white; width: 70px; margin: .5px;');
		echo libre_v1::input2(text,'','',Cliente	,'background: #363434; color: white; width: 150px; margin: .5px;');
		echo libre_v1::input2(text,'','',Fletes		,'background: #363434; color: white; width: 70px; margin: .5px;');
		echo libre_v1::input2(text,'','',Sueldo		,'background: #363434; color: white; width: 70px; margin: .5px;');
		echo libre_v1::input2(text,'','',Viaticos	,'background: #363434; color: white; width: 70px; margin: .5px;');
		echo libre_v1::input2(text,'','',Diesel		,'background: #363434; color: white; width: 70px; margin: .5px;');
		echo libre_v1::input2(text,'','',Casetas	,'background: #363434; color: white; width: 70px; margin: .5px;');
		echo libre_v1::input2(text,'','',Facturas	,'background: #363434; color: white; width: 70px; margin: .5px;');
		echo libre_v1::input2(text,'','',"R Y R"	,'background: #363434; color: white; width: 70px; margin: .5px;');
		//echo libre_v1::input2(text,'','',Guias		,'background: #363434; color: white; width: 70px; margin: .5px;');
		echo libre_v1::input2(text,'','',Maniobras	,'background: #363434; color: white; width: 70px; margin: .5px;');
		echo libre_v1::input2(text,'','',"Via Pass"	,'background: #363434; color: white; width: 70px; margin: .5px;');
		
		echo"<div style='background: #0000008a; bottom: 25px; position: absolute; overflow-y: auto; left: 0px; right: 0px; top: 25px;'>";
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
						$FLETES		=$FLETES	+$fletes[TOTAL1];
						$VIATICOS	=$VIATICOS	+$viaticos[TOTAL2];
						$DIESEL		=$DIESEL	+$disel[TOTAL3];
						$CASETAS	=$CASETAS	+$casetas[TOTAL4];
						$FACTURAS	=$FACTURAS	+$facturas[TOTAL5];
						$RYR		=$RYR		+$ryr[TOTAL6];
						$GUIAS		=$GUIAS		+$guias[TOTAL7];
						$MANIOBRAS	=$MANIOBRAS	+$maniobras[TOTAL8];
						$VIAPASS	=$VIAPASS	+$viapass[TOTAL];
						$SUELDOS	=$SUELDOS	+$folio[sueldo];
						echo libre_v1::input2(text,'','',$folio[ID_G]	,'width: 70px; 	margin: .5px;');
						echo libre_v1::input2(text,'','',$data	,'width: 70px; 	margin: .5px;');
						echo libre_v1::input2(text,'',$folio[CHOFER],$folio[CHOFER]	,'width: 150px; 	margin: .5px;');
						echo libre_v1::input2(text,'','',$folio[PLACAS]	,'width: 70px; 	margin: .5px;');
						echo libre_v1::input2(text,'',$folio[CLIENTE],$folio[CLIENTE ]	,'width: 150px; 	margin: .5px;');
						echo libre_v1::input2(text,'','',$fletes	[TOTAL1 ]	,'width: 70px; 	margin: .5px;');
						echo libre_v1::input2(text,'','',$folio		[sueldo ]	,'width: 70px; 	margin: .5px;');
						echo libre_v1::input2(text,'','',$viaticos	[TOTAL2 ]	,'width: 70px; 	margin: .5px;');
						echo libre_v1::input2(text,'','',$disel		[TOTAL3 ]	,'width: 70px; 	margin: .5px;');
						echo libre_v1::input2(text,'','',$casetas	[TOTAL4 ]	,'width: 70px; 	margin: .5px;');
						echo libre_v1::input2(text,'','',$facturas	[TOTAL5 ]	,'width: 70px; 	margin: .5px;');
						echo libre_v1::input2(text,'','',$ryr		[TOTAL6 ]	,'width: 70px; 	margin: .5px;');
					//	echo libre_v1::input2(text,'','',$guias		[TOTAL7 ]	,'width: 70px; 	margin: .5px;');
						echo libre_v1::input2(text,'','',$maniobras	[TOTAL8 ]	,'width: 70px; 	margin: .5px;');
						echo libre_v1::input2(text,'','',$viapass	[TOTAL ]	,'width: 70px; 	margin: .5px;');
						echo"<br>";
					}
				}
			}
		
		echo"</div>";
		echo"<div style='position: absolute; bottom: 0px;'>";
				
			echo libre_v1::input2(text,'','',"N° C: ".$CONTADOR	,'background: #363434; color: white; width: 70px; margin: .5px;');
			echo libre_v1::input2(text,'','',''			,'background: #363434; color: white; width: 70px; margin: .5px;');
			echo libre_v1::input2(text,'','',''			,'background: #363434; color: white; width: 150px; margin: .5px;');
			echo libre_v1::input2(text,'','',''			,'background: #363434; color: white; width: 70px; margin: .5px;');
			echo libre_v1::input2(text,'','',''			,'background: #363434; color: white; width: 150px; margin: .5px;');
			echo libre_v1::input2(text,'','',$FLETES	,'background: #363434; color: white; width: 70px; margin: .5px;');
			echo libre_v1::input2(text,'','',$SUELDOS	,'background: #363434; color: white; width: 70px; margin: .5px;');
			echo libre_v1::input2(text,'','',$VIATICOS	,'background: #363434; color: white; width: 70px; margin: .5px;');
			echo libre_v1::input2(text,'','',$DIESEL	,'background: #363434; color: white; width: 70px; margin: .5px;');
			echo libre_v1::input2(text,'','',$CASETAS	,'background: #363434; color: white; width: 70px; margin: .5px;');
			echo libre_v1::input2(text,'','',$FACTURAS	,'background: #363434; color: white; width: 70px; margin: .5px;');
			echo libre_v1::input2(text,'','',$RYR		,'background: #363434; color: white; width: 70px; margin: .5px;');
			//echo libre_v1::input2(text,'','',$GUIAS		,'background: #363434; color: white; width: 70px; margin: .5px;');
			echo libre_v1::input2(text,'','',$MANIOBRAS	,'background: #363434; color: white; width: 70px; margin: .5px;');
			echo libre_v1::input2(text,'','',$VIAPASS	,'background: #363434; color: white; width: 70px; margin: .5px;');
		echo"</div>";
	echo"</div>";
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
	
	function nuevo($conexion,$phpv)		{
		include("parche1.php");				if($parche1=="")		{echo"<script>alert('[parche1] no localizado');</script>";}
		echo$parche1_config;
		echo general('',$conexion,$phpv);
		echo info('',$conexion,$phpv);
		echo calculadora($conexion,$phpv);
		//echo abonos(" ",$conexion,$phpv);
		echo arrastrados("",$conexion,$phpv);
	}
	function reportes($conexion,$phpv)	{
		include("parche2.php");				if($parche2=="")		{echo"<script>alert('[parche2] no localizado');</script>";}
	}
	$windows=1;
?>