<?php

	include("../Testing/libre_v1.php");				if($libre_v1=="")		{echo"<script>alert('[libre_v1] no localizado');</script>";}
	
	include("../Testing/libre_v2.php");				if($libre_v2=="")		{echo"<script>alert('[libre_v2] no localizado');</script>";}
	$db=empresa;
	if($_POST[js]==1){//configuracion para js 
		$conexion= libre_v1::login('localhost',root,root,"",$phpv);//cambia segun cada server
	}
	if($_POST[win_carga]==Nuevo) 		{	nuevo($conexion,$phpv);}
	if($_POST[win_carga]==Reportes) 	{	
	//reportes($db,$conexion,$phpv);
	echo"<div id='configs'style='display: block;position: absolute;top: 0px;height: 50px;right: 230px;left: 145px;background: #102f41;padding: 5px;box-shadow: inset 0px 0px 0px 1px white;'  >";	
		libre_v1::db					($db,$conexion,$phpv);	
		$consu1		= libre_v1::consulta			(choferes,$conexion	,'','','Nombre_Ch',''	,$phpv,'');
		$consu2		= libre_v1::consulta			(placas,$conexion	,'','','',''	,$phpv,'');
		$consu3		= libre_v1::consulta			(clientes,$conexion	,'','','',''	,$phpv,'');	
		echo "<table border ='0'><tr><td>";
		if(($_POST[chofer_b]=="")and($_POST[chofer]<>""))$_POST[chofer_b]=$_POST[chofer];
		echo libre_v1::despliegre_mysql	(chofer_b,Chofer		,$consu1,Nombre_Ch	,$phpv,"style='width: 300px;' id='chofer'");
		echo "<br>";
		echo libre_v1::despliegre_mysql	(cliente_b,Clientes	,$consu3,Nombre_Cl	,$phpv," style='width: 300px;' id='cliente'");
		echo "</td><td>";
		echo libre_v1::despliegre_mysql	(placas_b,Placas		,$consu2,Placas		,$phpv,"style='height: 36px;' id='placas'");	
		echo "</td><td>";
		if($_POST[D_i]==""){$_POST[D_i]=date("d");}
		if($_POST[M_i]==""){$_POST[M_i]=date("m")-1;}
		if($_POST[A_i]==""){$_POST[A_i]=date("Y");}
		if($_POST[D_f]==""){$_POST[D_f]=date("d");}
		if($_POST[M_f]==""){$_POST[M_f]=date("m");}
		if($_POST[A_f]==""){$_POST[A_f]=date("Y");}
		if($_POST[M_i]==0){$_POST[M_i]=12;$_POST[A_i]=$_POST[A_i]-1;}
		$style='width: 30px; margin: 1px; text-align: center;';		
		echo libre_v1::input2(text,'','',"Flecha Inicial","width: 100px; height: 17px;",'',disabled,botone_n);
		echo libre_v1::input2(text,D_i,'',$_POST[D_i],$style,'D_i',$libre);
		echo libre_v1::input2(text,M_i,'',$_POST[M_i],$style,'M_i',$libre);
		echo libre_v1::input2(text,A_i,'',$_POST[A_i],$style."width: 35px;",'A_i',$libre);
		//echo "</td><td>";
		echo"<br>";
		echo libre_v1::input2(text,'','',"Flecha Final","width: 100px; height: 17px;",'',disabled,botone_n);	
		echo libre_v1::input2(text,D_f,'',$_POST[D_f],$style,'D_f',$libre);
		echo libre_v1::input2(text,M_f,'',$_POST[M_f],$style,'M_f',$libre);
		echo libre_v1::input2(text,A_f,'',$_POST[A_f],$style."width: 35px;",'A_f',$libre);
		echo libre_v1::input2(button,'','',Buscar,'','',"onclick='genera_reporte();'");
		
		echo "</td></tr></table> ";
		echo"<div id='mas_opciones1' class='mas_opciones1'>";
		
			//echo "<div onclick='ventanas2(mas_opciones1);' style='z-index: 1; position: absolute; width: 20px; height: 17px; background: #ada7a7; float: right; right: 0px; text-align: center;top: 0px;' >¬</div>";
			//echo "MAS...<br>";
			echo libre_v1::input2(button,'','',"Mas Opciones","width: 132px; height: 20px;"				,''		,"onclick='ventanas2(mas_opciones1);'",botones_submenu);
		
			echo"<label><input type='checkbox' id='ver' 	>Ver Elementos					</label><br>";
			echo"<label><input type='checkbox' id='sueldos' 	>Sueldos					</label><br>";
			echo"<label><input type='checkbox' id='isr' 		>I.S.R.						</label><br>";
			echo"<label><input type='checkbox' id='abonos' 		>Abonos						</label><br>";
			echo"<label><input type='checkbox' id='acumulados' 	>Acumulados					</label><br>";
			
			echo"<label><input type='checkbox' id='casetas' 	>Casetas					</label><br>";
			echo"<label><input type='checkbox' id='via_pass' 	>Via Pass					</label><br>";
			echo"<label><input type='checkbox' id='diesel' 		>Diesel						</label><br>";
			echo"<label><input type='checkbox' id='facturas' 	>Facturas 					</label><br>";
			echo"<label><input type='checkbox' id='fletes_r' 	>Fletes Reales				</label><br>";
			echo"<label><input type='checkbox' id='fletes' 		>Fletes 					</label><br>";
			echo"<label><input type='checkbox' id='guias' 		>Guias 						</label><br>";
			echo"<label><input type='checkbox' id='maniobras'	>Maniobras					</label><br>";
			echo"<label><input type='checkbox' id='ryr'			>Reparaciones y Refaciones 	</label><br>";
			echo"<label><input type='checkbox' id='viatico' 	>Viaticos 					</label><br>";
		echo"</div>";
	echo"</div>";
	echo"<div id='Datos_conso' style='position: absolute;bottom: 0px;left: 145px;right: 230px;height: 28px;background: rgba(0, 0, 0, 0.76);box-shadow: inset 0px 0px 0px 1px white;overflow-y: auto;'>";
	
	echo"</div>";
	echo"<div id='Datos_res' style='position: absolute;top: 90px;bottom: 30px;right: 230px;left: 145px;background: #05486cab;padding: 5px;overflow-y: auto;box-shadow: inset 0px 0px 0px 1px white;'>";	

	echo"</div>";	
	//echo"<div id='general_info' style='padding: 5px; background: #05486cab;width: 220px;right: 0px;top: 0px;bottom: 0px;position: absolute;color: white;'>";
	echo"<div id='general_info' class='general_info'>";
		echo "<div onclick='ventanas2(general_info);' style='z-index: 1; position: absolute; width: 20px; height: 17px; background: #ada7a7; float: right; right: 0px; text-align: center;top: 0px;' >X</div>";

		echo"<div id='datos_info'>";
		
		echo"</div>";
	echo"</div>";
	
	}
	if($_POST[win_carga]==Guardar) 		{	guarda($conexion,$phpv);}
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
				libre_v1::db							($db,$conexion,$phpv);	
				$consu5	= libre_v1::consulta			(folio,$conexion	,'','','ID_G','1'	,$phpv,'');
				libre_v1::mysql_da_se					($consu5,0,$phpv);			
				while($datos=libre_v1::mysql_fe_ar		($consu5,$phpv)){
					echo libre_v1::input2(button,'name','',$datos[ID_G],"width: 40px; margin: .5px .5px; text-align: center;",'','onclick="diagnostico1(this);" readonly="readonly"',botones_submenu);
				}
				
		echo"</div>";
	}
	if($_POST[win_carga]==diagnostico0){
		libre_v1::db($db,$conexion,$phpv);
		libre_v1::Auto_veri($conexion,$phpv,1);
	}
	if($_POST[win_carga]==diagnostico1){
		libre_v1::db($db,$conexion,$phpv);
		$Carta=$_POST[Carta];
		libre_v1::manua_veri($Carta,$conexion,$phpv);
	}

	if($_POST[win_carga]==Folder)		{		
		echo"<div style='background: rgba(44, 45, 45, 0.8); position: absolute; width: 400px; height: 100px; top: 5px; left: 5px; border-radius: 5px; '>";	
			libre_v1::db					($db,$conexion,$phpv);	
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
	if($_POST[win_carga]==Folder2)		{	//echo$_POST[A_i];echo"<br>";
		$systm[diagnostico]=false;
		if($systm[diagnostico]==true){
			echo"Chofer: ".$_POST[chofer];
			echo"<br>Dia inicio: "	.$_POST[D_i];
			echo"<br>Mes inicio: "		.$_POST[M_i];
			echo"<br>Año inicio: "	.$_POST[A_i];
			echo"<br>Dia fin: "		.$_POST[D_f];
			echo"<br>Mes fin: "		.$_POST[M_f];
			echo"<br>Año fin: "		.$_POST[A_f];
		}
		libre_v2::db($db,$conexion,$phpv);
		$res="SELECT * FROM fechas WHERE A >= $_POST[A_i] AND A <= $_POST[A_f] ORDER BY ID_G DESC";
		if($_POST[A_i]==$_POST[A_f])$res="SELECT * FROM fechas WHERE A >= $_POST[A_i] AND A <= $_POST[A_f] AND M >= $_POST[M_i] AND M <= $_POST[M_f] ORDER BY ID_G DESC";
		
		$consu_fecha	= libre_v1::ejecuta($conexion,$res,$phpv);
		libre_v1::mysql_da_se		($consu_fecha,0,$phpv);
		$D_i	=libre_v1::zero($_POST[D_i]);	$A_i=libre_v1::zero($_POST[A_i]);	$M_i=libre_v1::zero($_POST[M_i]);
		$D_f	=libre_v1::zero($_POST[D_f]);	$A_f=libre_v1::zero($_POST[A_f]);	$M_f=libre_v1::zero($_POST[M_f]);
		$fec_ini= $A_i.$M_i.$D_i;
		$fec_fin= $A_f.$M_f.$D_f;
		if($systm[diagnostico]==true){
			echo"SQL: <br >".$res;
			echo"<br>Codigo ini: ".$fec_ini;
			echo"<br>Codigo fin: ".$fec_fin;
		}
		while($fechas=libre_v1::mysql_fe_ar($consu_fecha,$phpv)){
			$D		=libre_v1::zero($fechas[D]);		$A	=libre_v1::zero($fechas[A]);	$M	=libre_v1::zero($fechas[M]);
			$D_c	=libre_v1::zero($fechas[D_c]);		$A_c=libre_v1::zero($fechas[A_c]);	$M_c=libre_v1::zero($fechas[M_c]);
			$fec_set= $A.$M.$D;
			if(($fec_ini<=$fec_set)&&($fec_fin>=$fec_set)){
				$consu_abo_acu	=libre_v1::consulta		(abo_acu,$conexion	,'ID_G',$fechas[ID_G],'ID_G','1'	,$phpv,'');
				$abo_acu		=libre_v1::mysql_fe_ar	($consu_abo_acu,$phpv);
				
				$res	= "SELECT * FROM folio WHERE ID_G LIKE  '$fechas[ID_G]'";
				if($_POST[chofer]<>chofer){$res=$res." AND CHOFER LIKE  '$_POST[chofer_b]'";}
				if(($_POST[placas_b]<>placas_b)and($_POST[placas_b]<>'')){$res=$res." AND PLACAS LIKE  '$_POST[placas_b]'";}
				if(($_POST[cliente_b]<>cliente_b)and($_POST[cliente_b]<>'')){$res=$res." AND CLIENTE LIKE  '$_POST[cliente_b]'";}
				if($systm[diagnostico]==true){
					echo"<br>SQL: ".$res;
				}
				$folios	= libre_v1::ejecuta			($conexion,$res,$phpv);
				libre_v1::mysql_da_se				($folios,0,$phpv);	
				$folio=libre_v1::mysql_fe_ar		($folios,$phpv);
				if($folio<>""){
					$x++;
					if($abo_acu[add_en]==''){$style='background:#121212;';	$Estado="Libre";}
					if($abo_acu[add_en]<>''){$style='background:#6d6d6d;';	$Estado="Arrastrada";}
					if($folio[Revisado]==0){$style_Revisado="color: red;";			$Revisado="Pendiente";}
					if($folio[Revisado]==1){$style_Revisado="color: yellowgreen;";	$Revisado="Revisada";}
					$fecha="$fechas[D]-$fechas[M]-$fechas[A]";
					if($_POST[Carta1]==$fechas[ID_G])echo "<div style='box-shadow: inset 0px 0px 7px 9px #6eff00'>";
					echo libre_v1::input2(text,'',''		,$x						,"margin: 2px .5px;text-align: center;width: 40px;color: white;".$style,'',disabled);
					//echo libre_v1::input2(submit,Carta,''	,$fechas[ID_G]			,"margin: 2px .5px;text-align: center; width: 50px;color: white; background: #102f41;",botones_submenu);
				
						echo libre_v1::input2(submit,Carta,''	,$fechas[ID_G]			,$style_ID_G."margin: 2px .5px;text-align: center; width: 50px; height: 17px;",'','',botones_submenu	);
					
					//echo libre_v1::input2(submit,Carta,''	,$fechas[ID_G]			,$style_ID_G."margin: 2px .5px;text-align: center; width: 50px; height: 17px;",'','',botones_submenu	);
								echo libre_v1::input2(text,'',''		,$abo_acu[Total_Total]		,"margin: 2px .5px;text-align: center;color: white;".$style,'',disabled);
					echo libre_v1::input2(text,'',''		,$folio[sueldo]			,"margin: 2px .5px;text-align: center;color: white;".$style,'',disabled);
					echo libre_v1::input2(text,'',''		,$fecha					,"margin: 2px .5px;text-align: center;color: white;".$style,'',disabled);
					
					echo libre_v1::input2(text,'',''		,$folio[CLIENTE]		,"margin: 2px .5px;text-align: center; width: 250px;color: white;".$style,'',disabled);
					echo libre_v1::input2(text,'',''		,$Revisado				,"margin: 2px .5px;text-align: center; color: white;".$style.$style_Revisado,'',disabled);
					echo libre_v1::input2(text,'',''		,$Estado				,"margin: 2px .5px;text-align: center; color: white;".$style,'',disabled);
					if($_POST[Carta1]==$fechas[ID_G])echo "</div>";
					else
					echo"<br>";
				}
			}
			
		}
		
		if($x==0){
			echo "<img src='../img/vacio-sistem.png' style='position: absolute;left: 410px;top: 150px;height: 156px;'></img>";
		}
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
	if($_POST[win_carga]==Ejecutor)		{
		$res=$_POST[sql];
		libre_v1::db					($db,$conexion,$phpv);	
		echo libre_v1::ejecuta			($conexion,$res,$phpv);
	}
	if($_POST[win_carga]==arrastrar)	{
		$text="background: #343434; color: #0075ff;";
		$conte=$conte."<div style='overflow-x: hidden; overflow-y: hidden; max-height: 500px; right: 0px; bottom: 0px; position: relative; left: 0px;'>";
		$style_all="margin: 0px .5px; text-align: center;";
		libre_v1::db					($db,$conexion,$phpv);
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
		libre_v1::db						($db,$conexion,$phpv);
		echo$_POST[ID_G];
	}
	if($_POST[win_carga]==reportes)		{//replazado por general Reportes
	//echo"<LINK REL='STYLESHEET' HREF='../windows.css' />";
	echo"<div style='background: #2237a5c9; position: absolute; overflow-y: auto; left: 1px; right: 1px; top: 1px; bottom: 1px; width: 1200px;	overflow-y: auto; overflow-x: auto;'>";	
		libre_v1::db						($db,$conexion,$phpv);
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
	if($_POST[win_carga]==genera_reportes){
		$systm[diagnostico]=false;
		echo"<div style='position: absolute;left: 0px; right: 1px;'>";
			echo libre_v1::input2(text,'','','Folio 1'		,'background: #363434; color: white; width: 50px; margin: 0px .5px; text-align: center;','',"disabled");
			echo libre_v1::input2(text,'','',Fecha		,'background: #363434; color: white; width: 75px; margin: 0px .5px; text-align: center;','',"disabled");
			if($_POST[chofer]==chofer)		echo libre_v1::input2(text,'','',Operador		,'background: #363434; color: white; width: 200px;margin: 0px .5px;; text-align: center;','',"disabled");
			if(($_POST[placas]==placas)or($_POST[placas]==placas_b))		echo libre_v1::input2(text,'','',Unidad		,'background: #363434; color: white; width: 75px; margin: 0px .5px; text-align: center;','',"disabled");
			if(($_POST[cliente]==cliente)or($_POST[cliente]==cliente_b))	echo libre_v1::input2(text,'','',Cliente	,'background: #363434; color: white; width: 200px;margin: 0px .5px; text-align: center;','',"disabled");
		
			if($_POST[sueldo]=="true")		echo libre_v1::input2(text,'','',Sueldos	,'background: #363434; color: white; width: 75px; margin: 0px .5px; text-align: center;','',"disabled");
			if($_POST[isr]=="true")			echo libre_v1::input2(text,'','',"I.S.R."	,'background: #363434; color: white; width: 75px; margin: 0px .5px; text-align: center;','',"disabled");
			if($_POST[abonos]=="true")		echo libre_v1::input2(text,'','',Abonos		,'background: #363434; color: white; width: 75px; margin: 0px .5px; text-align: center;','',"disabled");
			if($_POST[acumulados]=="true")	echo libre_v1::input2(text,'','',Acumulados	,'background: #363434; color: white; width: 75px; margin: 0px .5px; text-align: center;','',"disabled");
			if($_POST[casetas]=="true")		echo libre_v1::input2(text,'','',Casetas	,'background: #363434; color: white; width: 75px; margin: 0px .5px; text-align: center;','',"disabled");
			if($_POST[via_pass]=="true")	echo libre_v1::input2(text,'','',"Via Pass"	,'background: #363434; color: white; width: 75px; margin: 0px .5px; text-align: center;','',"disabled");
			if($_POST[diesel]=="true")		echo libre_v1::input2(text,'','',Diesel		,'background: #363434; color: white; width: 75px; margin: 0px .5px; text-align: center;','',"disabled");
			if($_POST[facturas]=="true")	echo libre_v1::input2(text,'','',Facturas	,'background: #363434; color: white; width: 75px; margin: 0px .5px; text-align: center;','',"disabled");
			if($_POST[flete_r]=="true")		echo libre_v1::input2(text,'','',"Fletes R"	,'background: #363434; color: white; width: 75px; margin: 0px .5px; text-align: center;','',"disabled");
			if($_POST[fletes]=="true")		echo libre_v1::input2(text,'','',Fletes		,'background: #363434; color: white; width: 75px; margin: 0px .5px; text-align: center;','',"disabled");
			if($_POST[guias]=="true")		echo libre_v1::input2(text,'','',"Guias"	,'background: #363434; color: white; width: 75px; margin: 0px .5px; text-align: center;','',"disabled");
			if($_POST[maniobras]=="true")	echo libre_v1::input2(text,'','',"Maniobras",'background: #363434; color: white; width: 75px; margin: 0px .5px; text-align: center;','',"disabled");
			if($_POST[ryr]=="true")			echo libre_v1::input2(text,'','',"R Y R"	,'background: #363434; color: white; width: 75px; margin: 0px .5px; text-align: center;','',"disabled");
			if($_POST[viaticos]=="true")	echo libre_v1::input2(text,'','',Viaticos	,'background: #363434; color: white; width: 75px; margin: 0px .5px; text-align: center;','',"disabled");
		
		echo"</div>";
		libre_v1::db						($db,$conexion,$phpv);
		$_POST[D_i]=libre_v1::zero			($_POST[D_i]);
		$_POST[M_i]=libre_v1::zero			($_POST[M_i]);
		$_POST[A_i]=libre_v1::zero			($_POST[A_i]);
		$_POST[D_f]=libre_v1::zero			($_POST[D_f]);
		$_POST[M_f]=libre_v1::zero			($_POST[M_f]);
		$_POST[A_f]=libre_v1::zero			($_POST[A_f]);
		$D_i	=libre_v1::zero($_POST[D_i]);		$A_i=libre_v1::zero($_POST[A_i]);	$M_i=libre_v1::zero($_POST[M_i]);
		$D_f	=libre_v1::zero($_POST[D_f]);		$A_f=libre_v1::zero($_POST[A_f]);	$M_f=libre_v1::zero($_POST[M_f]);
		$fec_ini= $A_i.$M_i.$D_i;
		$fec_fin= $A_f.$M_f.$D_f;
		
		$sql="SELECT * FROM fechas WHERE A >= $A_i AND A_r <= $A_f AND M >= $M_i AND M_r <= $M_f ORDER BY ID_G DESC ";
		$fecha = libre_v1::ejecuta($conexion,$sql,$phpv);
		$contador=0;
		echo"<div id='lista_datos' style='display: block;background: #545454;bottom: 25px;position: absolute;overflow-y: auto;left: 0px;top: 26px;right: 1px;'>";$CONTADOR=0;
			$FLETES=0;
			$VIATICOS=0;
			$DIESEL=0;
			$CASETAS=0;
			$FACTURAS=0;
			$RYR=0;
			$GUIAS=0;
			$MANIOBRAS=0;
			$VIAPASS=0;
		while($fechas=libre_v1::mysql_fe_ar	($fecha,$phpv)){
			
			$D		=libre_v1::zero($fechas[D]);		$A	=libre_v1::zero($fechas[A]);	$M	=libre_v1::zero($fechas[M]);
			$D_c	=libre_v1::zero($fechas[D_c]);		$A_c=libre_v1::zero($fechas[A_c]);	$M_c=libre_v1::zero($fechas[M_c]);
			$fec_set= $A.$M.$D;
			$data="$fechas[D]-$fechas[M]-$fechas[A]";
			if(($fec_ini<=$fec_set)&&($fec_fin>=$fec_set)){
				
				
				 $sql	= "SELECT * FROM folio WHERE ID_G LIKE  '$fechas[ID_G]'";
				if(($_POST[chofer]<>chofer)and($_POST[chofer]<>chofer_b)){$sql=$sql." AND CHOFER LIKE  '$_POST[chofer]'";}
				if(($_POST[placas]<>placas)and($_POST[placas]<>placas_b)){$sql=$sql." AND PLACAS LIKE  '$_POST[placas]'";}
				if(($_POST[cliente]<>cliente)and($_POST[cliente]<>cliente_b)){$sql=$sql." AND CLIENTE LIKE  '$_POST[cliente]'";}
				if($systm[diagnostico]==true){
					echo"<br>SQL: ".$sql;
				}
				$folios	= libre_v1::ejecuta($conexion,$sql,$phpv);$folio=libre_v1::mysql_fe_ar($folios,$phpv,"genera_reportes");				
				if($folio[ID_G]<>''){
				
					$abo_acu_con	= libre_v1::consulta	(abo_acu	,$conexion,ID_G,$folio[ID_G],'1','',$phpv,'');$abo_acu			= libre_v1::mysql_fe_ar	($abo_acu_con	,$phpv);
					$fletes_con		= libre_v1::consulta	(fletes		,$conexion,ID_G,$folio[ID_G],'1','',$phpv,'');$fletes			= libre_v1::mysql_fe_ar	($fletes_con	,$phpv);
					if($_POST[viaticos]=="true"){	$viaticos_con	= libre_v1::consulta	(viaticos		,$conexion,ID_G,$folio[ID_G],'1','',$phpv,'');$viaticos		= libre_v1::mysql_fe_ar	($viaticos_con	,$phpv);}
					if($_POST[diesel]=="true"){		$disel_con		= libre_v1::consulta	(disel			,$conexion,ID_G,$folio[ID_G],'1','',$phpv,'');$disel		= libre_v1::mysql_fe_ar	($disel_con		,$phpv);}
					if($_POST[casetas]=="true"){	$casetas_con	= libre_v1::consulta	(casetas		,$conexion,ID_G,$folio[ID_G],'1','',$phpv,'');$casetas		= libre_v1::mysql_fe_ar	($casetas_con	,$phpv);}
					if($_POST[via_pass]=="true"){	$casetas_via_con= libre_v1::consulta	(casetas_via	,$conexion,ID_G,$folio[ID_G],'1','',$phpv,'');$casetas_via	= libre_v1::mysql_fe_ar	($casetas_via_con	,$phpv);}
					if($_POST[facturas]=="true"){	$facturas_con	= libre_v1::consulta	(facturas		,$conexion,ID_G,$folio[ID_G],'1','',$phpv,'');$facturas		= libre_v1::mysql_fe_ar	($facturas_con	,$phpv);}
					if($_POST[ryr]=="true"){		$ryr_con		= libre_v1::consulta	(ryr			,$conexion,ID_G,$folio[ID_G],'1','',$phpv,'');$ryr			= libre_v1::mysql_fe_ar	($ryr_con		,$phpv);}
					if($_POST[guias]=="true"){		$guias_con		= libre_v1::consulta	(guias			,$conexion,ID_G,$folio[ID_G],'1','',$phpv,'');$guias		= libre_v1::mysql_fe_ar	($guias_con		,$phpv);}
					if($_POST[maniobras]=="true"){	$maniobras_con	= libre_v1::consulta	(maniobras		,$conexion,ID_G,$folio[ID_G],'1','',$phpv,'');$maniobras	= libre_v1::mysql_fe_ar	($maniobras_con	,$phpv);}
				
					$SUELDOS	=$SUELDOS	+$folio		[sueldo];
					$ISR		=$ISR		+$abo_acu	[rete];	
					$ABONOS		=$ABONOS	+$abo_acu	[Totalab];	
					$ACUMULADOS	=$ACUMULADOS+$abo_acu	[Totalac];
					$CASETAS	=$CASETAS	+$casetas	[TOTAL4];
					$VIA_PASS	=$VIA_PASS	+$casetas_via	[TOTAL];	
					$DIESEL		=$DIESEL	+$disel		[TOTAL3];
					$FACTURAS	=$FACTURAS	+$facturas	[TOTAL5];
					$FLETE_R	=$FLETE_R	+$fletes	[Flete_R];
					$FLETES		=$FLETES	+$fletes	[TOTAL1];
					$GUIAS		=$GUIAS		+$guias		[TOTAL7];
					$MANIOBRAS	=$MANIOBRAS	+$maniobras	[TOTAL8];
					$RYR		=$RYR		+$ryr		[TOTAL6];
					$VIATICOS	=$VIATICOS	+$viaticos	[TOTAL2];
		
					$contador=$contador+1;
					echo libre_v1::input2(button,'','',$fechas[ID_G]						,'width: 50px; 	margin: 0px.5px; text-align: center;',''," onclick='descarga_datos_reporte(this);'");
					echo libre_v1::input2(text,'','',$data								,'width: 75px; 	margin: 0px.5px; text-align: center;','',"disabled");
					if($_POST[chofer]==chofer)		echo libre_v1::input2(text,''	,$folio[CHOFER],$folio[CHOFER]		,'width: 200px; margin: 0px.5px; text-align: center;','',"disabled");
					if(($_POST[placas]==placas)	or($_POST[placas]==placas_b))		echo libre_v1::input2(text,'','',$folio[PLACAS]						,'width: 75px; 	margin: 0px.5px; text-align: center;','',"disabled");
					if(($_POST[cliente]==cliente)or($_POST[cliente]==cliente_b))	echo libre_v1::input2(text,''	,$folio[CLIENTE],$folio[CLIENTE ]	,'width: 200px;	margin: 0px.5px; text-align: center;','',"disabled");
					
					if($_POST[sueldo]=="true")		echo libre_v1::input2(text,'','',$folio			[sueldo]	,'width: 75px; 	margin: 0px.5px; text-align: center;','',"disabled");
					if($_POST[isr]=="true")			echo libre_v1::input2(text,'','',$abo_acu		[rete]		,'width: 75px; 	margin: 0px.5px; text-align: center;','',"disabled");
					if($_POST[abonos]=="true")		echo libre_v1::input2(text,'','',$abo_acu		[Totalab]	,'width: 75px; 	margin: 0px.5px; text-align: center;','',"disabled");
					if($_POST[acumulados]=="true")	echo libre_v1::input2(text,'','',$abo_acu		[Totalac]	,'width: 75px; 	margin: 0px.5px; text-align: center;','',"disabled");
					
					if($_POST[casetas]=="true")		echo libre_v1::input2(text,'','',$casetas		[TOTAL4]	,'width: 75px; 	margin: 0px.5px; text-align: center;','total_casetas',"disabled");
					if($_POST[via_pass]=="true")	echo libre_v1::input2(text,'','',$casetas_via	[TOTAL]		,'width: 75px; 	margin: 0px.5px; text-align: center;','',"disabled");
					if($_POST[diesel]=="true")		echo libre_v1::input2(text,'','',$disel			[TOTAL3]	,'width: 75px; 	margin: 0px.5px; text-align: center;','',"disabled");
					if($_POST[facturas]=="true")	echo libre_v1::input2(text,'','',$facturas		[TOTAL5]	,'width: 75px; 	margin: 0px.5px; text-align: center;','',"disabled");
					if($_POST[flete_r]=="true")		echo libre_v1::input2(text,'','',$fletes		[Flete_R]	,'width: 75px; 	margin: 0px.5px; text-align: center;','',"disabled");
					if($_POST[fletes]=="true")		echo libre_v1::input2(text,'','',$fletes		[TOTAL1]	,'width: 75px; 	margin: 0px.5px; text-align: center;','',"disabled");
					if($_POST[maniobras]=="true")	echo libre_v1::input2(text,'','',$maniobras		[TOTAL8]	,'width: 75px; 	margin: 0px.5px; text-align: center;','',"disabled");
					
					if($_POST[guias]=="true")		echo libre_v1::input2(text,'','',$maniobras		[TOTAL8]	,'width: 75px; 	margin: 0px.5px; text-align: center;','',"disabled");
					if($_POST[ryr]=="true")			echo libre_v1::input2(text,'','',$ryr			[TOTAL6]	,'width: 75px; 	margin: 0px.5px; text-align: center;','',"disabled");
					if($_POST[viaticos]=="true")	echo libre_v1::input2(text,'','',$viaticos		[TOTAL2]	,'width: 75px; 	margin: 0px.5px; text-align: center;','',"disabled");
		
					echo"<br>";
				}
			}
		}
		if($contador==0){
			echo "<div >";
			echo "<img src='../img/vacio-sistem.png'style='position: absolute;width: 100px;height: 100px;overflow: hidden;padding: 5px 5px 5px 5px;'></img>";
			echo"<a style='    position: absolute;left: 110px;font-size: 25px;top: 28px;'>Ningun dato entre esos parametros </a>";
			echo "</div >";
		}
		
		echo"</div>";
		echo"<div style='position: absolute; bottom: 0px; left: 0px;right: 1px;'>";
				
			echo libre_v1::input2(text,'','',"N° ".$contador	,'background: #363434; color: white; width: 50px; margin: .5px;');
			echo libre_v1::input2(text,'','','Fecha'			,'background: #363434; color: white; width: 75px; margin: .5px; text-align: center;');
			if($_POST[chofer]==chofer)		echo libre_v1::input2(text,'','','Operador'			,'background: #363434; color: white; width: 200px;margin: .5px; text-align: center;','',"disabled");
			if(($_POST[placas]==placas)or($_POST[placas]==placas_b))		echo libre_v1::input2(text,'','','Placas'			,'background: #363434; color: white; width: 75px; margin: .5px; text-align: center;','',"disabled");
			if(($_POST[cliente]==cliente)or($_POST[cliente]==cliente_b))	echo libre_v1::input2(text,'','','Cliente'			,'background: #363434; color: white; width: 200px;margin: .5px; text-align: center;','',"disabled");
		
			if($_POST[sueldo]=="true")		echo libre_v1::input2(text,'','',$SUELDOS	,'background: #363434; color: white; width: 75px; margin: .5px; text-align: center;','',"disabled");
			if($_POST[isr]=="true")			echo libre_v1::input2(text,'','',$ISR		,'background: #363434; color: white; width: 75px; margin: 0px .5px; text-align: center;','',"disabled");
			if($_POST[casetas]=="true")		echo libre_v1::input2(text,'','',$CASETAS	,'background: #363434; color: white; width: 75px; margin: .5px; text-align: center;','total_casetas','',"disabled");
			if($_POST[via_pass]=="true")	echo libre_v1::input2(text,'','',$VIAPASS	,'background: #363434; color: white; width: 75px; margin: .5px; text-align: center;','',"disabled");
			if($_POST[diesel]=="true")		echo libre_v1::input2(text,'','',$DIESEL	,'background: #363434; color: white; width: 75px; margin: .5px; text-align: center;','',"disabled");
			if($_POST[flete_r]=="true")		echo libre_v1::input2(text,'','',$FLETE_R	,'background: #363434; color: white; width: 75px; margin: .5px; text-align: center;','',"disabled");
			if($_POST[fletes]=="true")		echo libre_v1::input2(text,'','',$FLETES	,'background: #363434; color: white; width: 75px; margin: .5px; text-align: center;','',"disabled");
			if($_POST[facturas]=="true")	echo libre_v1::input2(text,'','',$FACTURAS	,'background: #363434; color: white; width: 75px; margin: .5px; text-align: center;','',"disabled");
			if($_POST[ryr]=="true")			echo libre_v1::input2(text,'','',$RYR		,'background: #363434; color: white; width: 75px; margin: .5px; text-align: center;','',"disabled");
		
		echo"</div>";
		
	}
	if($_POST[win_carga]==descarga_datos_reporte){
		echo "hola2342 ";
		
		libre_v1::db							($db,$conexion,$phpv);	
		
		//inf1 -> interface 1 
		$recive[ID_G]=$_POST[ID_G];
		$recive[chofer]=$_POST[chofer];
		$recive[placas]=$_POST[placas];
		$recive[cliente]=$_POST[cliente];
		$recive[D_i]=libre_v1::zero			($_POST[D_i]);
		$recive[M_i]=libre_v1::zero			($_POST[M_i]);
		$recive[A_i]=libre_v1::zero			($_POST[A_i]);
		$recive[D_f]=libre_v1::zero			($_POST[D_f]);
		$recive[M_f]=libre_v1::zero			($_POST[M_f]);
		$recive[A_f]=libre_v1::zero			($_POST[A_f]);
		
		//$D_i	=libre_v1::zero($_POST[D_i]);		$A_i=libre_v1::zero($_POST[A_i]);	$M_i=libre_v1::zero($_POST[M_i]);
		//$D_f	=libre_v1::zero($_POST[D_f]);		$A_f=libre_v1::zero($_POST[A_f]);	$M_f=libre_v1::zero($_POST[M_f]);
		$fec_ini= $recive[A_i].$recive[M_i].$recive[D_i];
		$fec_fin= $recive[A_f].$recive[M_f].$recive[D_f];
		
		$local[inf1][activa]=false;
		$local[inf1][title]="";
		
		if($_POST[actuador]==totales){
			$local[inf1][activa]=true;
			$local[inf1][title]="Totales";
			//$consu_fecha		= libre_v2::consulta(fechas,$conexion	,'','','ID_G',''	,$phpv,'');
			$sql="SELECT * FROM fechas WHERE A >= $recive[A_i] AND A_r <= $recive[A_f] AND M >= $recive[M_i] AND M_r <= $recive[M_f] ORDER BY ID_G DESC ";
			$consu_fecha= libre_v1::ejecuta($conexion,$sql,$phpv);
			libre_v1::mysql_da_se($consu_fecha,0,$phpv);			
		
			$flete=0;
			$viaticos=0;
			$combustible=0;
			$casetas=0;
			$x=0;
			while($fechas=libre_v1::mysql_fe_ar		($consu_fecha,$phpv)){
				
			
				$D		=libre_v1::zero($fechas[D]);		$A	=libre_v1::zero($fechas[A]);	$M	=libre_v1::zero($fechas[M]);
				$D_c	=libre_v1::zero($fechas[D_c]);		$A_c=libre_v1::zero($fechas[A_c]);	$M_c=libre_v1::zero($fechas[M_c]);
				$fec_set= $A.$M.$D;
				if(($fec_ini<=$fec_set)&&($fec_fin>=$fec_set)){
					$x++;
					$consu5=libre_v2::consulta('folio'			,$conexion	,'ID_G',$_POST[Carta],'ID_G','1'	,$phpv,'');
					$consu6=libre_v2::consulta('fletes'	    	,$conexion	,'ID_G',$_POST[Carta],'ID_G','1'	,$phpv,'');
					$consu7=libre_v2::consulta('viaticos'		,$conexion	,'ID_G',$_POST[Carta],'ID_G','1'	,$phpv,'');
					$consu8=libre_v2::consulta('disel'	    	,$conexion	,'ID_G',$_POST[Carta],'ID_G','1'	,$phpv,'');
					$consu9=libre_v2::consulta('casetas'		,$conexion	,'ID_G',$_POST[Carta],'ID_G','1'	,$phpv,'');
					$consu9_1=libre_v2::consulta('casetas_via'	,$conexion	,'ID_G',$_POST[Carta],'ID_G','1'	,$phpv,'');
					
					$consu10=libre_v2::consulta('facturas'		,$conexion	,'ID_G',$_POST[Carta],'ID_G','1'	,$phpv,'');
					$consu11=libre_v2::consulta('ryr'			,$conexion	,'ID_G',$_POST[Carta],'ID_G','1'	,$phpv,'');
					$consu12=libre_v2::consulta('guias'	    	,$conexion	,'ID_G',$_POST[Carta],'ID_G','1'	,$phpv,'');
					$consu13=libre_v2::consulta('maniobras'		,$conexion	,'ID_G',$_POST[Carta],'ID_G','1'	,$phpv,'');
					$consu14=libre_v2::consulta('km'			,$conexion	,'ID_G',$_POST[Carta],'ID_G','1'	,$phpv,'');
					$dato6=libre_v2::mysql_fe_ar		($consu6,$phpv);
					$dato7=libre_v2::mysql_fe_ar		($consu7,$phpv);
					$dato8=libre_v2::mysql_fe_ar		($consu8,$phpv);
					$dato9=libre_v2::mysql_fe_ar		($consu9,$phpv);
					$dato10=libre_v2::mysql_fe_ar		($consu10,$phpv);
					
					$flete			=$flete+$dato6[TOTAL1];
					$viaticos		=$viaticos+$dato7[TOTAL2];
					$combustible	=$combustible+$dato8[TOTAL3];
					$casetas		=$casetas+$dato9[TOTAL4];
					$facturas		=$facturas+$dato8[TOTAL5];
				}	
			}
			
					$flete			=libre_v2::formato_num($flete);
					$viaticos		=libre_v2::formato_num($viaticos);
					$combustible	=libre_v2::formato_num($combustible);
					$casetas		=libre_v2::formato_num($casetas);
					$facturas		=libre_v2::formato_num($facturas);
			
		}
		if($_POST[actuador]==unico){
			$local[inf1][activa]=true;
			$local[inf1][title]=$recive[ID_G];
		}
		if($local[inf1][activa]==true){
			echo"<div>";
			if($local[inf1][title]<>"")echo libre_v1::input2(text,'','',$local[inf1][title]		,"width: 100%; height: 20px;"				,''		,"disabled",botone_n);
			//echo libre_v1::input2(text,'','',$kilometraje		,"width: 132px; height: 20px;"				,''		,"disabled",botones_submenu);
			echo"<div>";
			echo"</div>";
			echo libre_v1::input2(text,'','','Kilometraje'		,"width: 88px; height: 20px;"				,''		,"disabled",botone_n);
			echo libre_v1::input2(text,'','',$kilometraje		,"width: 132px; height: 20px;"				,''		,"disabled",botones_submenu);
			echo"<div style='width: 220px'>";
				echo libre_v1::input2(text,'','','Flete'		,"width: 88px; height: 20px;"				,''		,"disabled",botone_n);
				echo libre_v1::input2(text,'','',$flete			,"width: 132px; height: 20px;"				,''		,"disabled",botones_submenu);
				echo libre_v1::input2(text,'','','Viaticos'		,"width: 88px; height: 20px;"				,''		,"disabled",botone_n);
				echo libre_v1::input2(text,'','',$viaticos		,"width: 132px; height: 20px;"				,''		,"disabled",botones_submenu);
				echo libre_v1::input2(text,'','','Combustible'	,"width: 88px; height: 20px;"				,''		,"disabled",botone_n);
				echo libre_v1::input2(text,'','',$combustible	,"width: 132px; height: 20px;"				,''		,"disabled",botones_submenu);
				echo libre_v1::input2(text,'','','Casetas'		,"width: 88px; height: 20px;"				,''		,"disabled",botone_n);
				echo libre_v1::input2(text,'','',$casetas		,"width: 132px; height: 20px;"				,''		,"disabled",botones_submenu);
				echo libre_v1::input2(text,'','','Factura'		,"width: 88px; height: 20px;"				,''		,"disabled",botone_n);
				echo libre_v1::input2(text,'','',$fatura		,"width: 132px; height: 20px;"				,''		,"disabled",botones_submenu);
				echo libre_v1::input2(text,'','','RyR'			,"width: 88px; height: 20px;"				,''		,"disabled",botone_n);
				echo libre_v1::input2(text,'','',$ryr			,"width: 132px; height: 20px;"				,''		,"disabled",botones_submenu);
				echo libre_v1::input2(text,'','','Guias'		,"width: 88px; height: 20px;"				,''		,"disabled",botone_n);
				echo libre_v1::input2(text,'','',$guia			,"width: 132px; height: 20px;"				,''		,"disabled",botones_submenu);
				echo libre_v1::input2(text,'','','Maniobras'	,"width: 88px; height: 20px;"				,''		,"disabled",botone_n);
				echo libre_v1::input2(text,'','',$maniobra		,"width: 132px; height: 20px;"				,''		,"disabled",botones_submenu);
				echo libre_v1::input2(text,'','','Via Pass'		,"width: 88px; height: 20px;"				,''		,"disabled",botone_n);
				echo libre_v1::input2(text,'','',$via_pass		,"width: 132px; height: 20px;"				,''		,"disabled",botones_submenu);
			echo"</div>";
			echo"<div style='width: 220px'>";
				echo libre_v1::input2(text,'','','Rendimiento'		,"width: 88px; height: 20px;"				,''		,"disabled",botone_n);
				echo libre_v1::input2(text,'','',$rendimiento		,"width: 132px; height: 20px;"				,''		,"disabled",botones_submenu);
				echo libre_v1::input2(text,'','','ISR.'		,"width: 88px; height: 20px;"				,''		,"disabled",botone_n);
				echo libre_v1::input2(text,'','',$isr		,"width: 132px; height: 20px;"				,''		,"disabled",botones_submenu);
				echo libre_v1::input2(text,'','','Comision'		,"width: 88px; height: 20px;"				,''		,"disabled",botone_n);
				echo libre_v1::input2(text,'','',$comisicon		,"width: 132px; height: 20px;"				,''		,"disabled",botones_submenu);
			echo"</div>";
			echo"<div style='width: 220px'>";
				echo libre_v1::input2(text,'','','Flete R'		,"width: 88px; height: 20px;"				,''		,"disabled",botone_n);
				echo libre_v1::input2(text,'','',$flete_r		,"width: 132px; height: 20px;"				,''		,"disabled",botones_submenu);
				echo libre_v1::input2(text,'','','Gasto Total'	,"width: 88px; height: 20px;"				,''		,"disabled",botone_n);
				echo libre_v1::input2(text,'','',$gasto_t		,"width: 132px; height: 20px;"				,''		,"disabled",botones_submenu);
				echo libre_v1::input2(text,'','','NETO'		,"width: 88px; height: 20px;"				,''		,"disabled",botone_n);
				echo libre_v1::input2(text,'','',$neto		,"width: 132px; height: 20px;"				,''		,"disabled",botones_submenu);
			echo"</div>";
			echo"<div style='width: 220px'>";
				echo libre_v1::input2(text,'','','Fecha Captura',"width: 88px; height: 20px;"				,''		,"disabled",botone_n);
				echo libre_v1::input2(text,'','',$fecha_c		,"width: 132px; height: 20px;"				,''		,"disabled",botones_submenu);
				echo libre_v1::input2(text,'','','Fecha Salida'	,"width: 88px; height: 20px;"				,''		,"disabled",botone_n);
				echo libre_v1::input2(text,'','',$fecha_s		,"width: 132px; height: 20px;"				,''		,"disabled",botones_submenu);
				echo libre_v1::input2(text,'','','Fecha Llegada',"width: 88px; height: 20px;"				,''		,"disabled",botone_n);
				echo libre_v1::input2(text,'','',$fecha_l		,"width: 132px; height: 20px;"				,''		,"disabled",botones_submenu);
			echo"</div>";
		}
		
	}
	if($_POST[win_carga]==ares1){
		libre_v1::db							($db,$conexion,$phpv);	
		$system[diagnostico]=false;
		$recive[ID_G]=$_POST[ID_G];
		$recive[chofer]=$_POST[chofer];
		$recive[placas]=$_POST[placas];
		$recive[cliente]=$_POST[cliente];
		$recive[D_i]=libre_v1::zero			($_POST[D_i]);
		$recive[M_i]=libre_v1::zero			($_POST[M_i]);
		$recive[A_i]=libre_v1::zero			($_POST[A_i]);
		$recive[D_f]=libre_v1::zero			($_POST[D_f]);
		$recive[M_f]=libre_v1::zero			($_POST[M_f]);
		$recive[A_f]=libre_v1::zero			($_POST[A_f]);
		$recive[actua]=$_POST[actuador];
		$local[fecha_ini]= $recive[A_i].$recive[M_i].$recive[D_i];
		$local[fecha_fin]= $recive[A_f].$recive[M_f].$recive[D_f];
		if($system[diagnostico]==true){
			echo"<br>ID_G: ". $recive[ID_G];
			echo"<br>chofer: ". $recive[chofer];
			echo"<br>placas: ". $recive[placas];
			echo"<br>cliente: ". $recive[cliente];
			echo"<br>Fecha ini: ". $local[fecha_ini];
			echo"<br>Fecha fin: ". $local[fecha_fin];
		}
		if($recive[actua]==totales){
			$sql="SELECT * FROM fechas WHERE A >= $_POST[A_i] AND A <= $_POST[A_f] ORDER BY ID_G DESC";
			if($recive[A_i]==$recive[A_f])	$sql="SELECT * FROM fechas WHERE A >= $recive[A_i] AND A_r <= $recive[A_f] AND M >= $recive[M_i] AND M_r <= $recive[M_f] ORDER BY ID_G DESC ";
			if($recive[A_i]<$recive[A_f])	$sql="SELECT * FROM fechas WHERE (A >= $recive[A_i] AND A_r <= $recive[A_f]) OR (M >= $recive[M_i] AND M_r <= $recive[M_f]) ORDER BY ID_G DESC ";
			$consu_fecha= libre_v1::ejecuta($conexion,$sql,$phpv);
			libre_v1::mysql_da_se($consu_fecha,0,$phpv);			
			if($system[diagnostico]==true){
				echo "<br>sql: ".$sql;
			}
			$array=libre_v2::crea_array('');
			while($fechas=libre_v1::mysql_fe_ar		($consu_fecha,$phpv)){//busca en las fechas 
				$res=libre_v2::busca_array($array,$fechas[ID_G]);
				if($res==false)$array=libre_v2::add_array($array,'',$fechas[ID_G]);
				$data= $recive[A].$recive[M].$recive[D];
				
			}
			if(($recive[chofer]<>chofer)or($recive[placas]<>placas_b)or($recive[cliente]<>cliente_b)){
				$sql	= "SELECT * FROM folio ";
				if($recive[chofer]<>chofer_b)	{
					if($where==false){$sql=$sql." WHERE ";$where=true;}
					$sql=$sql." CHOFER LIKE  '$recive[chofer]'";
				}
				if($recive[placas]<>placas_b)	{
					if($where==true){$sql=$sql." AND ";}
					if($where==false){$sql=$sql." WHERE ";$where=true;}
					$sql=$sql." PLACAS LIKE  '$recive[placas]'";
				}
				if($recive[cliente]<>cliente_b)	{
					if($where==true){$sql=$sql." AND ";}
					if($where==false){$sql=$sql." WHERE ";$where=true;}
					$sql=$sql." CLIENTE LIKE  '$recive[cliente]'";
				}	
				if($system[diagnostico]==true){
					echo "<br>sql: ".$sql;
				}
				if($where==false)$sql	= "SELECT * FROM folio WHERE ID_G LIKE  '$array[$x]'";
				$respuesta= libre_v1::ejecuta($conexion,$sql,$phpv);
				$array2=libre_v2::crea_array('');
				while($fechas=libre_v1::mysql_fe_ar	($respuesta,$phpv)){//busca en folios 
					$res=libre_v2::busca_array($array2,$fechas[ID_G]);
					if($res==false)$array2=libre_v2::add_array($array2,'',$fechas[ID_G]);
					$data= $recive[A].$recive[M].$recive[D];
				}			
			}
			if(count($array2)<>0){
				$array3=libre_v2::crea_array('');
				for($x=0; $x<count($array); $x++){//cusca los elementos iguales entre los dos parametros de busquedad
					$res2=libre_v2::busca_array($array2,$array[$x]);
					if($res2==true){
						$res=libre_v2::busca_array($array3,$array[$x]);
						if($res==false)$array3=libre_v2::add_array($array3,'',$array[$x]);
					}
				}
			}
			if(count($array2)==0)$array3=$array;	//pasa comperte la busqueda 1 si no hay segundo paramatros de busqueda 
			echo"<div style='width: 220px'>";
				if($system[diagnostico]==true){
					echo libre_v1::input2(text,'','','Para 1.'		,"width: 88px; height: 20px;"				,''		,"disabled",botone_n);
					echo libre_v1::input2(text,'','',count($array)	,"width: 132px; height: 20px;"				,''		,"disabled",botones_submenu);
					echo libre_v1::input2(text,'','','para . '		,"width: 88px; height: 20px;"				,''		,"disabled",botone_n);
					echo libre_v1::input2(text,'','',count($array2)	,"width: 132px; height: 20px;"				,''		,"disabled",botones_submenu);
				}
				echo libre_v1::input2(text,'','','Elementos'		,"width: 88px; height: 20px;"				,''		,"disabled",botone_n);
				echo libre_v1::input2(text,'','',count($array3)		,"width: 132px; height: 20px;"				,''		,"disabled",botones_submenu);
			echo"</div>";
			//------------------
			
			//------------------
			$flete		= libre_v2::suma_totales($array3,fletes		,Fletes		,TOTAL1		,false,$conexion,$phpv);
			$flete_r	= libre_v2::suma_totales($array3,fletes		,"Flete R"	,Flete_R	,false,$conexion,$phpv);
			$viaticos	= libre_v2::suma_totales($array3,viaticos	,Viaticos	,TOTAL2		,false,$conexion,$phpv);
			$disel		= libre_v2::suma_totales($array3,disel		,Diesel		,TOTAL3		,false,$conexion,$phpv);
			$casetas	= libre_v2::suma_totales($array3,casetas	,Casetas	,TOTAL4		,false,$conexion,$phpv);
			$facturas	= libre_v2::suma_totales($array3,facturas	,Facturas	,TOTAL5		,false,$conexion,$phpv);
			$ryr		= libre_v2::suma_totales($array3,ryr		,"R y R"	,TOTAL6		,false,$conexion,$phpv);
			$guia		= libre_v2::suma_totales($array3,guias		,Guias		,TOTAL7		,false,$conexion,$phpv);
			$maniobras	= libre_v2::suma_totales($array3,maniobras	,Maniobras	,TOTAL8		,false,$conexion,$phpv);
			$via_pass	= libre_v2::suma_totales($array3,casetas_via,"Via Pass"	,TOTAL		,false,$conexion,$phpv);
			echo "<div>";
					echo libre_v1::input2(text,'','',Ingresos					,"width: 88px; height: 20px;"				,''		,"disabled",botone_n);
					echo libre_v1::input2(text,'','',$flete[formato]			,"width: 122px; height: 20px; text-align: right;padding: 0px 5px;"				,''		,"disabled",botones_submenu);
			echo "</div>";
			echo "<div style='width: 220px;'>";			
					echo libre_v1::input2(text,'','',"Gastos sin Facturar" 		,"width: 100%; height: 20px;"				,''		,"disabled",botone_n);
					//echo libre_v1::input2(text,'','',$flete		,"width: 122px; height: 20px; text-align: right;padding: 0px 5px;"				,''		,"disabled",botones_submenu);					
						
					echo libre_v1::input2(text,'','',"Guias" 					,"width: 88px; height: 20px;"				,''		,"disabled",botone_n);
					echo libre_v1::input2(text,'','',$guia[formato]				,"width: 122px; height: 20px; text-align: right;padding: 0px 5px;"				,''		,"disabled",botones_submenu);
					echo libre_v1::input2(text,'','',"maniobras" 				,"width: 88px; height: 20px;"				,''		,"disabled",botone_n);
					echo libre_v1::input2(text,'','',$maniobras[formato]		,"width: 122px; height: 20px; text-align: right;padding: 0px 5px;"				,''		,"disabled",botones_submenu);
					$total_gastos_sin_factura=($guia[normal])+($maniobras[normal]);
					echo libre_v1::input2(text,'','',"Total" 					,"width: 88px; height: 20px;"				,''		,"disabled",botone_n);
					echo libre_v1::input2(text,'','',$total_gastos_sin_factura	,"width: 122px; height: 20px; text-align: right;padding: 0px 5px;"				,''		,"disabled",botones_submenu);
					
			echo "</div>";
			//----------------------
		}
		
	}
	if($_POST[win_carga]==ares2){
		include ('xml.php');
		$peliculas = new SimpleXMLElement($xmlstr);
		//echo $peliculas->pelicula[0]->argumento;
		echo"<br>". $peliculas->pelicula[1];
		echo"<br>". $peliculas->pelicula[0]->puntuacion[1][tipo];
		echo"<br>". count($peliculas->pelicula[0]);
		for($x=0; $x<=count($peliculas->pelicula[0]); $x++){
			echo $peliculas->pelicula[0][$x];
		}
		
		echo"<br>". count($peliculas->pelicula);

	}
	if($_POST[win_carga]==menu_left)	{
		if($_POST[chofer]=="")$_POST[chofer]=Todos;
		echo libre_v1::input2(button,'choferes','',$_POST[chofer],'','',' onclick="menu_left(this);"');
		echo"<div style='position: absolute; top: 25px; bottom: 5px; width: 120px; overflow-x: hidden; overflow-y: auto;'>";
		libre_v1::db						($db,$conexion,$phpv);
		$consu	= libre_v1::consulta		(choferes,$conexion	,'','','',''	,$phpv,'');
		$consu5	= libre_v1::consulta		(folio,$conexion	,CHOFER,$_POST[chofer],'',''	,$phpv,'');
		if($_POST[operador]==choferes)	while($chofer=libre_v1::mysql_fe_ar	($consu,$phpv))		echo libre_v1::input2(button,'cuentas','',$chofer[Nombre_Ch],'',''," onclick='menu_left(this);'")."<br>";
		if($_POST[operador]==cuentas)	while($datos=libre_v1::mysql_fe_ar	($consu5,$phpv))	echo libre_v1::input2(button,'','',$datos[ID_G],'',''," ")."<br>";
		echo"</div>";
	}
	if($_POST[win_carga]==graficos)		{
		libre_v1::db						($db,$conexion,$phpv);
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
		libre_v1::db							($db,$conexion,$phpv);
		$choferes_con	= libre_v1::consulta	(choferes	,$conexion,Nombre_Ch,$_POST[chofer],'1','',$phpv,'');
		$choferes		= libre_v1::mysql_fe_ar	($choferes_con	,$phpv);
		echo$choferes[N_fact]+1;
	}
	if($_POST[win_carga]==verificador)	{
		if(($_POST[elemento]==Carta1)||($_POST[elemento]==Carta2)||($_POST[elemento]==Carta3)||($_POST[elemento]==Carta4)){
			libre_v1::db							($db,$conexion,$phpv);
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
		libre_v1::db					($db,$conexion,$phpv);	
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
	function reportes	($db,$conexion,$phpv){ 
	
	//creado el 23-09-17
	//tansferido y re-escrito 06-03-2018
	$parche2=" ";
	//#4180c3
	libre_v1::db					($db,$conexion,$phpv);	
	$consu1		= libre_v1::consulta			(choferes,$conexion	,'','','',''	,$phpv,'');
	$consu2		= libre_v1::consulta			(placas,$conexion	,'','','',''	,$phpv,'');
	$consu3		= libre_v1::consulta			(clientes,$conexion	,'','','',''	,$phpv,'');	
	
		$conte=$conte.libre_v2::input2(text,'','',Operadores,'text-align: center;');
		$conte=$conte.libre_v2::input2(text,'','',Unidades,'text-align: center;');
		$conte=$conte.libre_v2::input2(text,'','',Clietes,'text-align: center;');
	
	$conte=$conte.	libre_v1::input2(text,'','',"Flecha Inicial","text-align: center;",'',disabled);
	
	$conte=$conte.	libre_v1::input2(text,'','',"Flecha Final","text-align: center;",'',disabled);	
	$conte=$conte."<br>";
		$conte=$conte.libre_v1::despliegre_mysql	(chofer,Chofer		,$consu1,Nombre_Ch	,$phpv," id='chofer'");
		$conte=$conte.libre_v1::despliegre_mysql	(placas,Placas		,$consu2,Placas		,$phpv," id='placas'");	
		$conte=$conte.libre_v1::despliegre_mysql	(cliente,Clientes	,$consu3,Nombre_Cl	,$phpv," id='cliente'");
	
	$mesA=date("m")-1;
	$anoA=date("Y");
	$mesB=date("m");
	$anoB=date("Y");
	if($mesA==0){
		$mesA=12;
		$anoA=date("Y")-1;
	}
	if($mesA==12){
		$mesB=1;
		$anoB=date("Y")+1;
	}
	$style='width: 30px; margin: 1px; text-align: center;';		
	$conte=$conte.	libre_v1::input2(text,D,'',date("d"),$style,'D',$libre);
	$conte=$conte.	libre_v1::input2(text,M,'',$mesA,$style,'M',$libre);
	$conte=$conte.	libre_v1::input2(text,A,'',$anoA,$style,'A',$libre);
	
	$conte=$conte.	libre_v1::input2(text,D_r,'',date("d"),$style,'D_r',$libre);
	$conte=$conte.	libre_v1::input2(text,M_r,'',$mesB,$style,'M_r',$libre);
	$conte=$conte.	libre_v1::input2(text,A_r,'',$anoB,$style,'A_r',$libre);
	
	$conte=$conte.	libre_v1::input2(button,'','',Buscar,'','',"onclick='Reporte2();'");
	$conte=$conte."</td></tr></table> ";
	//$conte=
	$style='background: rgba(100, 100, 100, 0.77); color: white; width: 100%;left: 110px;position:absolute; ';
	echo libre_v1::div($style,$libre,$conte);
	//--------------------
	$conte="";
	echo"<div id='res_reportes' style='position: absolute;right: 0px;top: 55px;bottom: 55px;left: 200px;background: white;box-shadow: inset 0px 0px 20px 3px #102f41;overflow-x: scroll;overflow-y: hidden;padding: 2px;'>";
	echo"</div>";
	echo"<div id='consola_reportes' style='position: absolute;bottom: 0px;right: 0px;left: 200px;background: #1c1d1f;height: 40px;overflow-x: hidden;overflow-y: scroll;padding: 2px;'>";
	echo"</div>";
	echo"<div class='late' >";
		echo"<label class='carda1'>Formato De Visualizacion</label><br>";
		echo"<div id='lista_buscador' style='background: white;box-shadow: inset 0px 0px 10px 0px black;padding: 2px;'>";
			echo"<label ><input type='radio'name='formato' id='formato' value='lista'  checked='checked'	>Listas		</label><br>";
			echo"<label ><input type='radio'name='formato' id='formato' value='tabla'						>Cartas 	</label><br>";
			echo"<label ><input type='radio'name='formato' id='formato' value='grafica'					>Grafica	</label><br>";
		echo"</div>";
		echo"<label>Totales a Ver</label><br>";
		echo"<div style='overflow-y: scroll;height: 200px;background: white;box-shadow: inset 0px 0px 9px 0px black;padding: 2px;'>";
		//echo"<label>Diesel</label><br>";
			echo"<label><input type='checkbox' id='sueldos' 	>Sueldos					</label><br>";
			echo"<label><input type='checkbox' id='isr' 		>I.S.R.						</label><br>";
			echo"<label><input type='checkbox' id='abonos' 		>Abonos						</label><br>";
			echo"<label><input type='checkbox' id='acumulados' 	>Acumulados					</label><br>";
			
			echo"<label><input type='checkbox' id='casetas' 	>Casetas					</label><br>";
			echo"<label><input type='checkbox' id='via_pass' 	>Casetas Via Pass			</label><br>";
			echo"<label><input type='checkbox' id='diesel' 		>Diesel						</label><br>";
			echo"<label><input type='checkbox' id='facturas' 	>Facturas 					</label><br>";
			echo"<label><input type='checkbox' id='fletes_r' 	>Fletes Reales				</label><br>";
			echo"<label><input type='checkbox' id='fletes' 		>Fletes 					</label><br>";
			echo"<label><input type='checkbox' id='guias' 		>Guias 						</label><br>";
			echo"<label><input type='checkbox' id='maniobras'	>Maniobras					</label><br>";
			echo"<label><input type='checkbox' id='ryr'			>Reparaciones y Refaciones 	</label><br>";
			echo"<label><input type='checkbox' id='viatico' 	>Viaticos 					</label><br>";
		echo"</div>";	
	echo"</div>";
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
	if($_POST[win_carga]==Registra_arrastre){	
		if($db==""){$db="empresa";}
		libre_v1::db($db,$conexion,$phpv);
		
		$consu=					libre_v1::consulta		(abo_acu,$conexion,ID_G,$_POST[ID_G_arrastra],'','',$phpv,1);
		$datos=					libre_v1::mysql_fe_ar	($consu,$phpv);		
		$sql=					libre_v1::espe_tab_update(abo_acu,ID_G,$_POST[ID_G_arrastra],add_en,$_POST[ID_G]);//notifica al arrastrado su nuevo add_en
		if($_POST[ejecuta]==si)	libre_v1::ejecuta($conexion,$sql,$phpv);
		
		$sql=					libre_v1::espe_tab_update(abo_acu,ID_G,$_POST[ID_G],ID_ac1,$_POST[ID_G_arrastra]);//notifica la cuenta el nuevo arrastrado 
		if($_POST[ejecuta]==si)	libre_v1::ejecuta($conexion,$sql,$phpv);
		$sql=					libre_v1::espe_tab_update(abo_acu,ID_G,$_POST[ID_G],ac1,$datos[Total_Total]);//notifica la valor el nuevo arrastrado 
		if($_POST[ejecuta]==si)	libre_v1::ejecuta($conexion,$sql,$phpv);
		echo$datos[Total_Total];
	}
	if($_POST[win_carga]==Elimina_arrastre){		
		if($db==""){$db="empresa";}
								libre_v1::db($db,$conexion,$phpv);
		$sql=					libre_v1::espe_tab_update(abo_acu,ID_G,$_POST[ID_G_arrastra],add_en,'');//notifica al arrastrado su nuevoliberacion( add_en)
		if($_POST[ejecuta]==si)	libre_v1::ejecuta($conexion,$sql,$phpv);
		$sql=					libre_v1::espe_tab_update(abo_acu,ID_G,$_POST[ID_G],ID_ac1,'');//notifica la cuenta el nuevo arrastrado 
		if($_POST[ejecuta]==si)	libre_v1::ejecuta($conexion,$sql,$phpv);
		$sql=					libre_v1::espe_tab_update(abo_acu,ID_G,$_POST[ID_G],ac1,'');//notifica la valor el nuevo arrastrado 
		if($_POST[ejecuta]==si)	libre_v1::ejecuta($conexion,$sql,$phpv);
		echo"1";
	}
	if($_POST[win_carga]==gene_list_arras){			
		$text="background: #343434; color: #0075ff;";
		$style_all="margin: 0px .5px; text-align: center;";
		libre_v1::db							($db,$conexion,$phpv);
		if(($_POST[chofer]<>chofer)&&($_POST[chofer]<>'')){			
			$consu5	= libre_v2::consulta			(folio,$conexion	,CHOFER,$_POST[chofer],'ID_G','1'	,$phpv,'',false);				
			libre_v1::mysql_da_se	($consu5,0,$phpv);			
			while($datos=libre_v1::mysql_fe_ar	($consu5,$phpv)){
				$consu24	= 	libre_v1::consulta(abo_acu,$conexion	,ID_G,$datos[ID_G],'',''	,$phpv,'1');
				$dato		= 	libre_v1::mysql_fe_ar	($consu24,$phpv);
				$c0='';	$c1='';	$c2='';
				if($datos[Revisado]==0){$c2=white;	$c0=red;			$Revisado="Pendiente";}
				if($datos[Revisado]==1){$c2=white;	$c0=yellowgreen;	$Revisado="Revisada";}
				if($dato[add_en]==''){$c1='#121212';	$Estado="Libre";}
				if($dato[add_en]<>''){$c1='#343434';	$Estado="Arrastrada";}
				
				if($Estado==Libre)		echo libre_v1::input2(button	,Carta_arr	,'',$datos[ID_G]		,"width: 50px;".$style_all.$text,'','onclick="add_arrastra(this);"');
				if($Estado==Arrastrada)	echo libre_v1::input2(button	,Carta_arr	,'',$datos[ID_G]		,"width: 50px;".$style_all.$text,'','');
				//echo libre_v1::input2(submit	,Carta_arr	,'',$datos[ID_G]		,"width: 50px;".$style_all.$text,'','');
				echo libre_v1::input2(button	,''			,'',libre_v1::zero($dato[Total_Total]),"background: $c1; color: $c2; width: 60px;".$style_all);
				echo libre_v1::input2(button	,''			,'',$Revisado			,"background: $c1; color:$c0; width: 70px;".$style_all);
				echo libre_v1::input2(button	,''			,'',$Estado				,"background: $c1; color:$c2; width: 70px;".$style_all);
				echo "<br>";
			}
		}
	}
	if($_POST[win_carga]==load_Cuentas){
		if($_POST[id_I]==Altas){	
			libre_v1::db						($db,$conexion,$phpv);
			$consu5		= libre_v2::consulta	(folio,$conexion	,CHOFER,$_POST[chofer],'ID_G','1'	,$phpv,'',false);
			libre_v1::mysql_da_se				($consu5,0,$phpv);		
			$consu_asig	= libre_v2::consulta	(asignaciones,$conexion	,Nombre_Ch,$_POST[chofer],'ID_asignaciones','1'	,$phpv,'',false);
			libre_v1::mysql_da_se				($consu_asig,0,$phpv);		
			
			$x=0;
			while($datos=libre_v1::mysql_fe_ar	($consu5,$phpv)){
				$x++;
			}
			$n_datos=$x;
			echo"<div style='position: absolute;left: 0px;right: 0px;height: 116px;'>";
				echo libre_v1::input2(text,'','',"Datos Vinculados","width: 100%",'',"disabled",botone_n);
				echo libre_v1::input2(button,'','',"N° Viajes","width: 100px; height: 17px;",'',"",botone_n);;
				echo libre_v1::input2(text,'','',$n_datos,"",'',"");
				echo libre_v1::input2(button,'','',"Rendimiento","width: 100px; height: 17px;",'',"",botone_n);
				echo libre_v1::input2(text,'','','',"",'',"");
				echo libre_v1::input2(button,'','',"Total ISR ","width: 100px; height: 17px;",'',"",botone_n);
				echo libre_v1::input2(text,'','','',"",'',"");
				echo libre_v1::input2(button,'','',"Total Sueldos","width: 100px; height: 17px;",'',"",botone_n);
				echo libre_v1::input2(text,'','','',"",'',"");
				echo libre_v1::input2(button,'','',"Tiempo Servicio ","width: 100px; height: 17px;",'',"",botone_n);
				echo libre_v1::input2(text,'','','',"",'',"");
				//echo libre_v1::input2(text,'','',"Datos Vinculados","width: 100%",'',"disabled",botone_n);
				
			echo"</div>";		
			echo"<div id='dato_unidad' style='position: absolute;left: 0px;right: 0px;bottom: 300px;height: 150px;'>";
				echo libre_v1::input2(text,'','',"Unidad"					,"width: 100%",'',"disabled",botone_n);
				echo "<img src='../img/defaul.jpg'style='position: absolute;top: 35px;left: 5px;width: 100px;height: 100px;overflow: hidden;padding: 5px 5px 5px 5px;'></img>";
				echo libre_v1::input2(button,'','',Placas,'width: 100px;top: 40px;left: 125px;position: absolute;','','',botone_n);
				echo libre_v1::input2(button,'','','N° Economico' ,'width: 100px;top: 75px;left: 125px;position: absolute;','','',botone_n);
				
				//$datos_asig=libre_v1::mysql_fe_ar	($consu_asig,$phpv);
				$unidad_asignada=false;
				while($datos_asig=libre_v1::mysql_fe_ar	($consu5,$phpv)){
					
					if($datos_asig[Actual]==1){
						$unidad_asignada=$datos_asig[placas];
						
					}
					
				}
				if($unidad_asignada==false){
					$unidad_asignada="Sin Unidad";
					$n_eco="Sin numero ";
				}
				echo libre_v1::input2(button,'','',$unidad_asignada,'width: 100px;top: 40px;left: 225px;position: absolute;','','',botones_submenu);
				echo libre_v1::input2(button,'','',$n_eco ,'width: 100px;top: 75px;left: 225px;position: absolute;','','',botones_submenu);
				
				
				
				
				
				
				echo libre_v1::input2(button,'','','Otros' ,'width: 200px;top: 35px;right: 0px;position: absolute;font-size: 12px;height: 20px;','','',botone_n);
				echo "<div style='position: absolute;bottom: 5px;right: 0px;top: 56px;width: 196px;background: white;overflow-x: hidden;overflow-y: auto;padding: 2px 2px;'>";
					libre_v1::mysql_da_se			($consu5,0,$phpv);		
					$array_placas=libre_v2::crea_array('');//crea un array
					while($datos=libre_v2::mysql_fe_ar	($consu5,$phpv)){
						libre_v1::input2(button,'','',$datos[PLACAS],'margin: 1px; width: 60px','','',botone_n);
						$busca=libre_v2::busca_array($array_placas,$datos[PLACAS]);//busca si existe
						if($busca==false)$array_placas=libre_v2::add_array($array_placas,'',$datos[PLACAS]);//añade si no existe 
					}
					for($x=0; $x<=count($array_placas); $x++){
						
						echo libre_v1::input2(button,'','',$array_placas[$x],'margin: 1px; width: 60px','','','');
						echo "<br>";
					}
				echo "</div>";
			echo"</div>";
			echo"<div style='position: absolute;left: 0px;right: 0px;bottom: 0px;height: 300px;'>";
				echo libre_v1::input2(text,'','',"Viajes"					,"width: 100%",'',"disabled",botone_n);
				echo"<div id='list_viajes' style='position: absolute;background: #ffffff;left: 5px;right: 5px;bottom: 5px;top: 31px;overflow-y: auto;overflow-x: hidden;'>";
				
					libre_v1::mysql_da_se			($consu5,0,$phpv);		
					while($datos=libre_v1::mysql_fe_ar	($consu5,$phpv)){
						echo libre_v1::input2(button,'','',$datos[ID_G],'margin: 1px; width: 40px','','','');
					}
				echo"</div>";
			echo"</div>";
		
		}
	}
	if($_POST[win_carga]=="Ajustes de Programa"){
		echo libre_v1::input2(text,'','',Vercion);
		//echo libre_v1::input2(text,'','','Base De Datos');
		//echo libre_v1::input2(text,'','',Vercion);
		carpetas();
	}
function carpetas($dir){
	if($dir==''){$dir=".";}
	$directorio = opendir($dir); //ruta actual
	$array_carpetas=array();
	$array_elementos=array();
	echo "<br>";
	while ($archivo = readdir($directorio)){ //obtenemos un archivo y luego otro sucesivamente
		if (is_dir($archivo)){//verificamos si es o no un directorio
			echo "[".$archivo . "]<br />"; //de ser un directorio lo envolvemos entre corchetes
			$array_carpetas[]=$archivo;
		}
		else{
			echo $archivo . "<br />";
			$array_elementos[]=$archivo;
		}
	}
	$res			= array(
	"carpetas"	=> $array_carpetas,
	"elementos"	=> $array_elementos
	
	);
	return $res;
}

	
	$windows=1;
//3141219721
//transportegarcia.com/cpanel
//RobertoGC123$% 
//usuario transpor
?>	