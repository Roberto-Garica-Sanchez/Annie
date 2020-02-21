<?php
if ($libre_v1=='')	{	include("../libre_v1.php");}	if ($libre_v1==''){echo"Error de Carga 'libre_v1'";}
if ($libre_v2=='')	{	include("../libre_v2.php");}	if ($libre_v2==''){echo"Error de Carga 'libre_v2'";}
$libre_v2->db($db,$conexion,$phpv);	
if (!empty($_POST['Carta'])){
	include('descarga_cue2.php');
}
$libre_v2->db($db,$conexion,$phpv);	
//---------------------------modifica el estado de revisado 
IF (!empty($_POST['CambRevi']) and $_POST['CambRevi']=='Pendiente'){
	$res=$libre_v2->espe_tab_update('folio','ID_G',$_POST['Carta1'],'Revisado',1);
	$libre_v2->ejecuta			($conexion,$res,$phpv);
}
IF (!empty($_POST['CambRevi']) and $_POST['CambRevi']=='Revisado'){
		$res=$libre_v2->espe_tab_update('folio','ID_G',$_POST['Carta1'],'Revisado',0);
	$libre_v2->ejecuta			($conexion,$res,$phpv);
}

//---------------------------descarga dato si esta revisada o no 
$consu_folio	=$libre_v2->consulta		('folio',$conexion	,'ID_G',$_POST['Carta1'],'ID_G','1'	,$phpv,'','');
$folio			=$libre_v2->mysql_fe_ar	($consu_folio,$phpv,'');
if(empty($revi))$revi='';
if($folio['Revisado']==0)	{$estado='Pendiente';$_POST['CambRevi']=$revi; 	$style_estado="background: pink; color: black;";}
if($folio['Revisado']==1)	{$estado='Revisado';$_POST['CambRevi']=$revi; 	$style_estado="background: Greenyellow; color: black;";}



//--------------------------------Elimina la cuenta 
if(!empty($_POST['operador']) and  $_POST['operador']=='Eliminar'){
	$style_elimina="display: none;";
	$style_elimina_confirma="display: block;";
	$style_cancela="display: block;";
}else{
	$style_elimina="display: block;";
	$style_elimina_confirma="display: none;";	
	$style_cancela="display: none;";
}

//----------------------------[generarl info]
if(empty($style_chofer))$style_chofer='';
if(empty($style_placas))$style_placas='';
if(empty($style_cliente))$style_cliente='';
if(empty($style_Carta1))$style_Carta1='';
if(empty($style_Carta2))$style_Carta2='';
if(empty($style_Carta3))$style_Carta3='';
if(empty($style_Carta4))$style_Carta4='';
if(empty($style_D))$style_D='';
if(empty($style_M))$style_M='';
if(empty($style_A))$style_A='';
if(empty($style_D_r))$style_D_r='';
if(empty($style_M_r))$style_M_r='';
if(empty($style_A_r))$style_A_r='';
if(empty($style_km_i))$style_km_i='';
if(empty($style_km_f))$style_km_f='';
if(empty($style_flete_r))$style_flete_r='';
if(empty($style_come))$style_come='';
if(empty($N_fact))$N_fact=0;
if(empty($_POST['chofer']))$_POST['chofer']='';
if(empty($_POST['placas']))$_POST['placas']='';
if(empty($_POST['cliente']))$_POST['cliente']='';
if(empty($_POST['n_c']))$_POST['n_c']='';
if(empty($_POST['come']))$_POST['come']='';

echo"<div id='general_info' style=' display: none;padding: 5px; background: #05486cab;width: 220px;right: 0px;top: 0px;bottom: 0px;position: absolute;color: white;'>";
	echo"<div id='datos_info'>";
		echo $libre_v2->input2('text','','','Estado'				,"width: 40%",'',"disabled",'botone_n');
		echo $libre_v2->input2('submit','CambRevi','',$estado				,$style_estado."width: 60%",'',"",'botones_submenu');//.$libre_v2->input2(text,'CambRevi','',$_POST[CambRevi],"",'',"");
		
		echo $libre_v2->input2('text','','','Operador'				,"width: 40%",'',"disabled",'botone_n');		
		echo $libre_v2->input2('text','chofer','',$_POST['chofer']		,"width: 60%".$style_chofer	,''		,'readonly="readonly"','botones_submenu');
				
		echo $libre_v2->input2('text','','','Unidad'				,"width: 40%",'',"disabled",'botone_n');
		echo $libre_v2->input2('text','placas','',$_POST['placas']		,"width: 60%".$style_placas	,''		,'readonly="readonly"','botones_submenu');
				
		echo $libre_v2->input2('text','','','Cliente'				,"width: 40%",'',"disabled",'botone_n');
		echo $libre_v2->input2('text','cliente','',$_POST['cliente']		,"width: 60%".$style_cliente	,''		,'readonly="readonly"','botones_submenu');
				
		echo $libre_v2->input2('text','','','Carta Porte 1'		,"width: 40%"				,''		,"disabled",'botone_n');
		echo $libre_v2->input2('text','Carta1','',$_POST['Carta1']		,"width: 60%".$style_Carta1	,'Carta1'		,'readonly="readonly"onkeypress="return valida_n(event,Carta2)"','botones_submenu');
		echo $libre_v2->input2('text','','','Carta Porte 2'		,"width: 40%"				,''		,"disabled",'botone_n');
		echo $libre_v2->input2('text','Carta2','',$_POST['Carta2']		,"width: 60%".$style_Carta2	,''		,'readonly="readonly"onkeypress="return valida_n(event,Carta3)"','botones_submenu');
		echo $libre_v2->input2('text','','','Carta Porte 3'		,"width: 40%"				,''		,"disabled",'botone_n');
		echo $libre_v2->input2('text','Carta3','',$_POST['Carta3']		,"width: 60%".$style_Carta3	,''		,'readonly="readonly"onkeypress="return valida_n(event,Carta4)"','botones_submenu');
		echo $libre_v2->input2('text','','','Carta Porte 4'		,"width: 40%"				,''		,"disabled",'botone_n');
		echo $libre_v2->input2('text','Carta4','',$_POST['Carta4']		,"width: 60%".$style_Carta4	,''		,'readonly="readonly"onkeypress="return valida_n(event,D)"','botones_submenu');
	
		echo $libre_v2->input2('text','','','Fecha Inicio'			,"width: 40%"				,''		,"disabled",'botone_n');
		echo $libre_v2->input2('text','D','',$_POST['D']				,"width: 20%".$style_D		,''		,'readonly="readonly"onkeypress="return valida_n(event,M)"','botones_submenu');
		echo $libre_v2->input2('text','M','',$_POST['M']				,"width: 20%".$style_M		,''		,'readonly="readonly"onkeypress="return valida_n(event,A"','botones_submenu');
		echo $libre_v2->input2('text','A','',$_POST['A']				,"width: 20%".$style_A		,''		,'readonly="readonly"onkeypress="return valida_n(event,D_r)"','botones_submenu');
		
		echo $libre_v2->input2('text','',''	,'Fecha Final'		,"width: 40%"				,''		,"disabled",'botone_n');
		echo $libre_v2->input2('text','D_r','',$_POST['D_r']			,"width: 20%".$style_D_r	,''		,'readonly="readonly"onkeypress="return valida_n(event,M_r)"','botones_submenu');
		echo $libre_v2->input2('text','M_r','',$_POST['M_r']			,"width: 20%".$style_M_r	,''		,'readonly="readonly"onkeypress="return valida_n(event,A_r"','botones_submenu');
		echo $libre_v2->input2('text','A_r','',$_POST['A_r']			,"width: 20%".$style_A_r	,''		,'readonly="readonly"onkeypress="return valida_n(event,km_i)"','botones_submenu');
		
		echo $libre_v2->input2('text','',''	,'Km Inicio'		,"width: 40%"				,''		,"disabled",'botone_n');
		echo $libre_v2->input2('text','km_i','',$_POST['km_i']			,"width: 60%".$style_km_i	,''		,'readonly="readonly"onkeypress="return valida_n(event,km_f)"','botones_submenu');
		echo $libre_v2->input2('text','',''	,'Km Final'			,"width: 40%"				,''		,"disabled",'botone_n');
		echo $libre_v2->input2('text','km_f','',$_POST['km_f']			,"width: 60%".$style_km_f	,''		,'readonly="readonly"onkeypress="return valida_n(event,flete_r)"','botones_submenu');
		echo $libre_v2->input2('text','',''	,'Flete R'			,"width: 40%"				,''		,"disabled",'botone_n');
		echo $libre_v2->input2('text','flete_r','',$_POST['flete_r']	,"width: 60%".$style_flete_r,''		,'readonly="readonly"onkeypress="return valida_n(event)"','botones_submenu');
		
		echo $libre_v2->input2('text','',''	,'N° Cuenta'		,"width: 40%"				,''		,"disabled",'botone_n');
		echo $libre_v2->input2('text','n_c','',$N_fact+1			,"width: 60%"				,'n_c'		,"readonly=''",'botones_submenu');
		
		
		echo $libre_v2->input2('text','','','Comentarios'			,"width: 100%"				,'',"disabled",'botone_n');
		echo $libre_v2->input2('tarea','come','',$_POST['come']		,"width: 100%; $style_come",'come'		,' readonly="readonly"placeholder="" maxlength ="200"','botones_submenu');
	echo"</div>";
	//if($_POST[Carta1]<>'')echo $libre_v2->input2(submit,'operador','',"Reparar"		,'position: absolute;bottom: 40px;right: 110px;width: 110px;'					,'Analizar_cuenta'		,'',botones_submenu);
	echo $libre_v2->input2('submit','operador','',"Limpiar"		,'position: absolute;bottom: 5px;right: 110px;width: 110px;'					,'limpia_cuenta'		,'','botones_submenu');
	echo $libre_v2->input2('submit','operador','',"Cancelar"		,$style_cancela		.'position: absolute;bottom: 5px;right: 110px;width: 110px;'					,'Cancelar_cuenta'		,'','botones_submenu');
	echo $libre_v2->input2('submit','operador','',"Eliminar"		,$style_elimina			.'position: absolute;bottom: 5px;right: 0px;width: 110px; '					,'Elimina_cuenta'		,'','botones_submenu');
	echo $libre_v2->input2('submit','operador','',"Confirmar"		,$style_elimina_confirma.'position: absolute;bottom: 5px;right: 0px;width: 110px; color: red;'					,'Elimina_cuenta'		,'','botones_submenu');
	//echo $libre_v2->input2(submit,'operador','',"Guardar"		,'width: 110px;position: absolute;bottom: 5px;right: 0px;'	,'guarda_cuenta'		,'',botones_submenu);
	//echo $libre_v2->input2(button,'operador','',"Guardar Cambios",'display: none;	width: 110px;position: absolute;bottom: 5px;right: 0px;'	,'cambio_cuenta'		,'',botones_submenu);
	//echo $libre_v2->input2(button,'operador','',"Confirmar"		,'display: none;	width: 110px;position: absolute;bottom: 40px;right: 0px;background: yellow;color: black;','confirma_cuenta','',botones_submenu);
echo"</div>";	
echo"<div style='display: none;position: absolute;top: 0px;height: 50px;right: 230px;left: 145px;background: #102f41;padding: 5px;box-shadow: inset 0px 0px 0px 1px white;'  >";	

	$libre_v2->db					($db,$conexion,$phpv);	
	$consu1		= $libre_v2->consulta			('choferes',$conexion	,'','','Nombre_Ch',''	,$phpv,'','');
	$consu2		= $libre_v2->consulta			('placas',$conexion	,'','','',''	,$phpv,'','');
	$consu3		= $libre_v2->consulta			('clientes',$conexion	,'','','',''	,$phpv,'','');	
	echo "<table border ='0'><tr><td>";
	if(empty($_POST['chofer_b']) and !empty($_POST['chofer']))$_POST['chofer_b']=$_POST['chofer'];
	echo $libre_v2->despliegre_mysql	('chofer','Chofer'		,$consu1,'Nombre_Ch'	,$phpv,"style='width: 300px;' id='chofer'",'','','');
	echo "<br>";
	echo $libre_v2->despliegre_mysql	('cliente_b','Clientes'	,$consu3,'Nombre_Cl'	,$phpv," style='width: 300px;' id='cliente'",'','','');
	echo "</td><td>";
	echo $libre_v2->despliegre_mysql	('placas_b','Placas'		,$consu2,'Placas'		,$phpv,"style='height: 36px;' id='placas'",'','','');	
	echo "</td><td>";
	if(empty($_POST['D_i'])){$_POST['D_i']=date("d");}
	if(empty($_POST['M_i'])){$_POST['M_i']=date("m")-1;}
	if(empty($_POST['A_i'])){$_POST['A_i']=date("Y");}
	if(empty($_POST['D_f'])){$_POST['D_f']=date("d");}
	if(empty($_POST['M_f'])){$_POST['M_f']=date("m");}
	if(empty($_POST['A_f'])){$_POST['A_f']=date("Y");}
	if($_POST['M_i']==0){$_POST['M_i']=12;$_POST['A_i']=$_POST['A_i']-1;}
	$style='width: 30px; margin: 1px; text-align: center;';		
	if(empty($libre))$libre='';
	echo $libre_v2->input2('text','','',"Flecha Inicial","width: 100px; height: 17px;",'','disabled','botone_n','');
	echo $libre_v2->input2('text','D_i','',$_POST['D_i'],$style,'D_i',$libre,'','');
	echo $libre_v2->input2('text','M_i','',$_POST['M_i'],$style,'M_i',$libre,'','');
	echo $libre_v2->input2('text','A_i','',$_POST['A_i'],$style."width: 35px;",'A_i',$libre,'');
	//echo "</td><td>";
	echo"<br>";
	echo $libre_v2->input2('text','','',"Flecha Final","width: 100px; height: 17px;",'','disabled','botone_n');	
	echo $libre_v2->input2('text','D_f','',$_POST['D_f'],$style,'D_f',$libre,'');
	echo $libre_v2->input2('text','M_f','',$_POST['M_f'],$style,'M_f',$libre,'');
	echo $libre_v2->input2('text','A_f','',$_POST['A_f'],$style."width: 35px;",'A_f',$libre,'');
	echo $libre_v2->input2('submit','','','Buscar','','',"",'','');
	echo "</td><td>";
	echo $libre_v2->input2('button','','',"Analizar o Reparar",$style."width: 140px; height: 17px;",'',$libre,'botone_n');
	echo"<br>";
	//echo $libre_v2->input2(button,'operador','',$config_scan,$style."width: 41px; height: 17px;",'',$libre,botone_n);
	echo $libre_v2->input2('button','operador','',"Todos",$style."width: 69px; height: 17px;",'',"onClick='diagnostico2(this);'",'');
	if($_POST['Carta1']<>'')echo $libre_v2->input2('button','operador','',"Actual",$style."width: 69px; height: 17px;",'',"onClick='diagnostico2(this);'",'');
	echo "</td></tr></table> ";
	
echo"</div>";	
echo"<div style=' display: none; position: absolute;top: 60px;right: 230px;height: 500px;left: 145px;background: #000000c2;padding: 5px;overflow-y: auto;'>";	
	echo $libre_v2->input2('text','',''		,"N°"			,"margin: 0px .5px;text-align: center;width: 40px;",'','','');
	echo $libre_v2->input2('text','',''		,"Cuenta"		,"margin: 0px .5px;text-align: center; width: 50px;",'','','');
	echo $libre_v2->input2('text','',''		,"Saldo"		,"margin: 0px .5px;text-align: center;",'','','');
	echo $libre_v2->input2('text','',''		,"Sueldo"		,"margin: 0px .5px;text-align: center;",'','','');
	echo $libre_v2->input2('text','',''		,"Fecha"		,"margin: 0px .5px;text-align: center;",'','','');
	echo $libre_v2->input2('text','',''		,"Cliente"		,"margin: 0px .5px;text-align: center;width: 250px;",'','','');
	echo $libre_v2->input2('text','',''		,"Revision"		,"margin: 0px .5px;text-align: center;",'','','');
	echo $libre_v2->input2('text','',''		,"Estado"		,"margin: 0px .5px;text-align: center;",'','','');

echo"</div>";	
$type="text";
echo"<div style='position: absolute;bottom: 0px;width: 100px;height: 471px;'>";
$type='hidden';
//-------------------------------------------------------------

if(empty($_POST['hidden_fe']))$_POST['hidden_fe']='';
$total1=	$libre_v2->presenta2 ('hidden_fe'	,'1TEXT_C','1TEXT',$type,'','','');
$total2=	$libre_v2->presenta2 ('hidden_v'		,'2TEXT_C','2TEXT',$type,'','','');
$total3=	$libre_v2->presenta2 ('hidden_d'		,'3TEXT_C','3TEXT',$type,'','','');
$total4=	$libre_v2->presenta2 ('hidden_c'		,'4TEXT_C','4TEXT',$type,'','','');
$total4_via=$libre_v2->presenta2 ('hidden_c_via'	,'4TEXT_C_VIA','4TEXT_VIA',$type,'','','');
$total5=	$libre_v2->presenta2 ('hidden_f'		,'5TEXT_C','5TEXT',$type,'','','');
$total6=	$libre_v2->presenta2 ('hidden_r'		,'6TEXT_C','6TEXT',$type,'','','');
$total7=	$libre_v2->presenta2 ('hidden_g'		,'7TEXT_C','7TEXT',$type,'','','');
$total8=	$libre_v2->presenta2 ('hidden_m'		,'8TEXT_C','8TEXT',$type,'','','');
$total9=	$libre_v2->presenta2 ('hidden_ab'	,'ab_Com','ab',$type,'','','');
$total10=	$libre_v2->presenta2 ('hidden_ac'	,'ID_ac','ac',$type,'','','');
//-------------------------------------------------------------

if(empty($_POST['come']))$_POST['come']='';
if(empty($_POST['comi']))$_POST['comi']='';
if(empty($_POST['hidden_ac_a']))$_POST['hidden_ac_a']='';
if(empty($_POST['presio_d']))$_POST['presio_d']='';
if(empty($_POST['crome_i']))$_POST['crome_i']='';
if(empty($_POST['crome_f']))$_POST['crome_f']='';
echo $libre_v2->input2($type,'comi','',$_POST['comi'],'','','','');
echo $libre_v2->input2($type,'crome_i','',$_POST['crome_i'],'','','','');
echo $libre_v2->input2($type,'crome_f','',$_POST['crome_f'],'','','','');
echo $libre_v2->input2($type,'presio_d','',$_POST['presio_d'],'','','','');
echo $libre_v2->input2($type,'hidden_fe','',$_POST['hidden_fe'],'','','','');
echo $libre_v2->input2($type,'hidden_v','',$_POST['hidden_v'],'','','','');
echo $libre_v2->input2($type,'hidden_d','',$_POST['hidden_d'],'','','','');
echo $libre_v2->input2($type,'hidden_c','',$_POST['hidden_c'],'','','','');
echo $libre_v2->input2($type,'hidden_c_via','',$_POST['hidden_c_via'],'','','','');
echo $libre_v2->input2($type,'hidden_f','',$_POST['hidden_f'],'','','','');
echo $libre_v2->input2($type,'hidden_r','',$_POST['hidden_r'],'','','','');
echo $libre_v2->input2($type,'hidden_g','',$_POST['hidden_g'],'','','','');
echo $libre_v2->input2($type,'hidden_m','',$_POST['hidden_m'],'','','','');
echo $libre_v2->input2($type,'hidden_c','',$_POST['hidden_c'],'','','','');
echo $libre_v2->input2($type,'hidden_ab','',$_POST['hidden_ab'],'','','','');
echo $libre_v2->input2($type,'hidden_ac','',$_POST['hidden_ac'],'','','','');
echo $libre_v2->input2($type,'hidden_ac_a','',$_POST['hidden_ac_a'],'','','','');	
echo"</div>";
echo"<div style='background: #000000c4;overflow-y: auto;width: 145px;height: 479px;bottom: 0px;position: absolute;'>";
	$folios	=$libre_v2->consulta		('choferes',$conexion	,'','','Nombre_Ch',''	,$phpv,'','');
	$libre_v2->mysql_da_se($folios,0,$phpv);	
	while($datos=$libre_v2->mysql_fe_ar($folios,$phpv,'')){
		$color='';
		if ($_POST['chofer']==$datos['Nombre_Ch'])$color="background: yellowgreen";
		echo $libre_v2->input2('submit','chofer',$datos['Nombre_Ch']		,$datos['Nombre_Ch']		,"margin: 1px 1px;text-align: center;width: 126px;$color;",'','','');
		echo "<br>";
	}

	
echo"</div>";
echo"<div id='Datos_conso' style='position: absolute;bottom: 0px;left: 145px;right: 230px;height: 28px;background: rgba(0, 0, 0, 0.76);box-shadow: inset 0px 0px 0px 1px white;overflow-y: auto;'>";
	
echo"</div>";
echo"<div id='Datos_res' style='display: none;position: absolute;top: 90px;bottom: 30px;right: 230px;left: 145px;background: #05486cab;padding: 5px;overflow-y: auto;box-shadow: inset 0px 0px 0px 1px white;'>";	
/*
	//echo$_POST[A_i];echo"<br>";
	//echo$_POST[A_f];echo"<br>";
	//echo$_POST[M_i];echo"<br>";
	//echo$_POST[M_f];
	$res="SELECT * FROM fechas WHERE A >= $_POST[A_i] AND A <= $_POST[A_f] ORDER BY ID_G DESC";
	if($_POST[A_i]==$_POST[A_f])$res="SELECT * FROM fechas WHERE A >= $_POST[A_i] AND A <= $_POST[A_f] AND M >= $_POST[M_i] AND M <= $_POST[M_f] ORDER BY ID_G DESC";
	//echo"<br>";echo$res;
	$consu_fecha	= $libre_v2->ejecuta($conexion,$res,$phpv);
	$libre_v2->mysql_da_se		($consu_fecha,0,$phpv);
	$D_i	=$libre_v2->zero($_POST[D_i]);	$A_i=$libre_v2->zero($_POST[A_i]);	$M_i=$libre_v2->zero($_POST[M_i]);
	$D_f	=$libre_v2->zero($_POST[D_f]);	$A_f=$libre_v2->zero($_POST[A_f]);	$M_f=$libre_v2->zero($_POST[M_f]);
	$fec_ini= $A_i.$M_i.$D_i;
	$fec_fin= $A_f.$M_f.$D_f;
	
	while($fechas=$libre_v2->mysql_fe_ar($consu_fecha,$phpv)){
		$D		=$libre_v2->zero($fechas[D]);		$A	=$libre_v2->zero($fechas[A]);	$M	=$libre_v2->zero($fechas[M]);
		$D_c	=$libre_v2->zero($fechas[D_c]);		$A_c=$libre_v2->zero($fechas[A_c]);	$M_c=$libre_v2->zero($fechas[M_c]);
		$fec_set= $A.$M.$D;
		
		if(($fec_ini<=$fec_set)&&($fec_fin>=$fec_set)){
			$consu_abo_acu	=$libre_v2->consulta		(abo_acu,$conexion	,'ID_G',$fechas[ID_G],'ID_G','1'	,$phpv,'');
			$abo_acu		=$libre_v2->mysql_fe_ar	($consu_abo_acu,$phpv);
			
			$res	= "SELECT * FROM folio WHERE ID_G LIKE  '$fechas[ID_G]'";
			if($_POST[chofer]<>chofer){$res=$res." AND CHOFER LIKE  '$_POST[chofer_b]'";}
			if(($_POST[placas_b]<>placas_b)and($_POST[placas_b]<>'')){$res=$res." AND PLACAS LIKE  '$_POST[placas_b]'";}
			if(($_POST[cliente_b]<>cliente_b)and($_POST[cliente_b]<>'')){$res=$res." AND CLIENTE LIKE  '$_POST[cliente_b]'";}
		
			$folios	= $libre_v2->ejecuta			($conexion,$res,$phpv);
			$libre_v2->mysql_da_se				($folios,0,$phpv);	
			$folio=$libre_v2->mysql_fe_ar		($folios,$phpv);
			if($folio<>""){
				$x++;
				if($abo_acu[add_en]==''){$style='background:#121212;';	$Estado="Libre";}
				if($abo_acu[add_en]<>''){$style='background:#6d6d6d;';	$Estado="Arrastrada";}
				if($folio[Revisado]==0){$style_Revisado="color: red;";			$Revisado="Pendiente";}
				if($folio[Revisado]==1){$style_Revisado="color: yellowgreen;";	$Revisado="Revisada";}
				$fecha="$fechas[D]-$fechas[M]-$fechas[A]";
				echo $libre_v2->input2(text,'',''		,$x						,"margin: 2px .5px;text-align: center;width: 40px;color: white;".$style);
				//echo $libre_v2->input2(submit,Carta,''	,$fechas[ID_G]			,"margin: 2px .5px;text-align: center; width: 50px;color: white; background: #102f41;",botones_submenu);
				echo $libre_v2->input2(submit,Carta,''	,$fechas[ID_G]			,"margin: 2px .5px;text-align: center; width: 50px; height: 17px;",'','',botones_submenu	);
				echo $libre_v2->input2(text,'',''		,$abo_acu[Total_Total]		,"margin: 2px .5px;text-align: center;color: white;".$style);
				echo $libre_v2->input2(text,'',''		,$folio[sueldo]			,"margin: 2px .5px;text-align: center;color: white;".$style);
				echo $libre_v2->input2(text,'',''		,$fecha					,"margin: 2px .5px;text-align: center;color: white;".$style);
				
				echo $libre_v2->input2(text,'',''		,$folio[CLIENTE]		,"margin: 2px .5px;text-align: center; width: 250px;color: white;".$style);
				echo $libre_v2->input2(text,'',''		,$Revisado				,"margin: 2px .5px;text-align: center; color: white;".$style.$style_Revisado);
				echo $libre_v2->input2(text,'',''		,$Estado				,"margin: 2px .5px;text-align: center; color: white;".$style);
				echo"<br>";
			}
		}
	}
	if($x==0){
		echo "<img src='../img/vacio-sistem.png' style='position: absolute;left: 410px;top: 150px;height: 156px;'></img>";
	}
*/

		$libre_v2->db($db,$conexion,$phpv);
		$res="SELECT * FROM fechas WHERE A >= ".$_POST['A_i']." AND A <= ".$_POST['A_f']." ORDER BY ID_G DESC";
		if($_POST['A_i']==$_POST['A_f'])$res="SELECT * FROM fechas WHERE A >= ".$_POST['A_i']." AND A <= ".$_POST['A_f']." AND M >= ".$_POST['M_i']." AND M <= ".$_POST['M_f']." ORDER BY ID_G DESC";
		
		$consu_fecha	= $libre_v2->ejecuta($conexion,$res,$phpv);
		$libre_v2->mysql_da_se		($consu_fecha,0,$phpv);
		$D_i	=$libre_v2->zero($_POST['D_i']);	$A_i=$libre_v2->zero($_POST['A_i']);	$M_i=$libre_v2->zero($_POST['M_i']);
		$D_f	=$libre_v2->zero($_POST['D_f']);	$A_f=$libre_v2->zero($_POST['A_f']);	$M_f=$libre_v2->zero($_POST['M_f']);
		$fec_ini= $A_i.$M_i.$D_i;
		$fec_fin= $A_f.$M_f.$D_f;
		$x=0;
		while($fechas=$libre_v2->mysql_fe_ar($consu_fecha,$phpv,'')){
			$D		=$libre_v2->zero($fechas['D']);		$A	=$libre_v2->zero($fechas['A']);	$M	=$libre_v2->zero($fechas['M']);
			$D_c	=$libre_v2->zero($fechas['D_c']);		$A_c=$libre_v2->zero($fechas['A_c']);	$M_c=$libre_v2->zero($fechas['M_c']);
			$fec_set= $A.$M.$D;
			if(($fec_ini<=$fec_set)&&($fec_fin>=$fec_set)){
				$consu_abo_acu	=$libre_v2->consulta		('abo_acu',$conexion	,'ID_G',$fechas['ID_G'],'ID_G','1'	,$phpv,'','');
				$abo_acu		=$libre_v2->mysql_fe_ar	($consu_abo_acu,$phpv,'');
				
				$res	= "SELECT * FROM folio WHERE ID_G LIKE  '".$fechas['ID_G']."'";
				if($_POST['chofer']!='chofer'){$res=$res." AND CHOFER LIKE  '".$_POST['chofer_b']."'";}
				if(($_POST['placas_b']!='placas_b')and($_POST['placas_b']!='')){$res=$res." AND PLACAS LIKE  '".$_POST['placas_b']."'";}
				if(($_POST['cliente_b']!='cliente_b')and($_POST['cliente_b']!='')){$res=$res." AND CLIENTE LIKE  '".$_POST['cliente_b']."'";}
				
				$folios	= $libre_v2->ejecuta			($conexion,$res,$phpv);
				$libre_v2->mysql_da_se				($folios,0,$phpv);	
				$folio=$libre_v2->mysql_fe_ar		($folios,$phpv,'');

				if(!empty($folio)){
					$x++;
					if($abo_acu['add_en']==''){$style='background:#121212;';	$Estado="Libre";}
					if($abo_acu['add_en']<>''){$style='background:#6d6d6d;';	$Estado="Arrastrada";}
					if($folio['Revisado']==0){$style_Revisado="color: red;";			$Revisado="Pendiente";}
					if($folio['Revisado']==1){$style_Revisado="color: yellowgreen;";	$Revisado="Revisada";}
					$fecha=$fechas['D']."-".$fechas['M']."-".$fechas['A'];
					if($_POST['Carta1']==$fechas['ID_G'])echo "<div style='box-shadow: inset 0px 0px 7px 9px #6eff00'>";
					echo $libre_v2->input2('text','',''		,$x						,"margin: 2px .5px;text-align: center;width: 40px;color: white;".$style,'','disabled','');
					echo $libre_v2->input2('submit','Carta',''	,$fechas['ID_G']			,"margin: 2px .5px;text-align: center; width: 50px; height: 17px;",'','','botones_submenu');
					echo $libre_v2->input2('text','',''		,$abo_acu['Total_Total']		,"margin: 2px .5px;text-align: center;color: white;".$style,'','disabled','');
					echo $libre_v2->input2('text','',''		,$folio['sueldo']			,"margin: 2px .5px;text-align: center;color: white;".$style,'','disabled','');
					echo $libre_v2->input2('text','',''		,$fecha					,"margin: 2px .5px;text-align: center;color: white;".$style,'','disabled','');
					
					echo $libre_v2->input2('text','',''		,$folio['CLIENTE']		,"margin: 2px .5px;text-align: center; width: 250px;color: white;".$style,'','disabled','');
					echo $libre_v2->input2('text','',''		,$Revisado				,"margin: 2px .5px;text-align: center; color: white;".$style.$style_Revisado,'','disabled','');
					echo $libre_v2->input2('text','',''		,$Estado				,"margin: 2px .5px;text-align: center; color: white;".$style,'','disabled','');
					if($_POST['Carta1']==$fechas['ID_G'])echo "</div>";
					else
					echo"<br>";
				}
			}
			
		}
		
		if($x==0){
			echo "<img src='../img/vacio-sistem.png' style='position: absolute;left: 410px;top: 150px;height: 156px;'></img>";
		}
echo"</div>";




?>