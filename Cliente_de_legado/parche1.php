<?php 
	//creado el 05-09-17
	//update 11-10-2017
	$parche1=" ";	
	

function info			($win,$conexion,$phpv,$cuenta){	
	libre_v1::db					(empresa,$conexion,$phpv);
	$consu1		= libre_v1::consulta			(choferes,$conexion	,'','',Nombre_Ch,''	,$phpv,'');
	$consu2		= libre_v1::consulta			(placas,$conexion	,'','',Placas,''	,$phpv,'');
	$consu3		= libre_v1::consulta			(clientes,$conexion	,'','',Nombre_Cl,''	,$phpv,'');
	$choferes	= libre_v1::despliegre_mysql	(chofer,Chofer		,$consu1,Nombre_Ch	,$phpv,"onchange='desca_arrasta(this);'onclick='desca_arrasta(this);'");
	$placas 	= libre_v1::despliegre_mysql	(placas,Placas		,$consu2,Placas		,$phpv);	
	$cliente	= libre_v1::despliegre_mysql	(cliente,Clientes	,$consu3,Nombre_Cl	,$phpv);
	
	$estado		= libre_v1::input2(hidden,Revisado,'',$_POST[Revisado],$style,Revisado,$libre);
	if($_POST[Revisado]==0){$estado=$estado.libre_v1::input2(button,CambRevi,'',Pendiente, 'color: white; background: #343434;',CambRevi,'onclick="revi();"');}
	if($_POST[Revisado]==1){$estado=$estado.libre_v1::input2(button,CambRevi,'',Revisado,'color: white; background: #343434;',CambRevi,'onclick="revi();"');}
	$carta1=				libre_v1::input2(text,Carta1,'',$_POST[Carta1],'','',$libre);
	$carta2=				libre_v1::input2(text,Carta2,'',$_POST[Carta2],'','',$libre);
	$carta3=				libre_v1::input2(text,Carta3,'',$_POST[Carta3],'','',$libre);
	$carta4=				libre_v1::input2(text,Carta4,'',$_POST[Carta4],'','',$libre);	

	$FLETE_R=				libre_v1::input2(text,flete_r,'',$_POST[flete_r],'',flete_r	,'onKeyUp="calcula_update();"');
	$n_cuenta=				libre_v1::input2(text,n_c	 ,'',$_POST[n_c],'',''			,'readonly="readonly"');
	$libre="";
	$km_i=					libre_v1::input2(text,km_i		,'',$_POST[km_i],'',km_i,$libre.' onKeyUp="calcula_update();" ');
	$km_f=					libre_v1::input2(text,km_f		,'',$_POST[km_f],'',km_f,$libre.' onKeyUp="calcula_update();" ');
	
	$style='width: 30px; box-shadow: 0px 5px 5px black;';	
	
	$fecha_s=			libre_v1::input2(text,D,'',libre_v1::zero			($_POST[D]),$style,'',$libre);
	$fecha_s=$fecha_s.	libre_v1::input2(text,M,'',libre_v1::zero			($_POST[M]),$style,'',$libre);
	$fecha_s=$fecha_s.	libre_v1::input2(text,A,'',libre_v1::zero			($_POST[A]),$style,'',$libre);
	
	$fecha_l=			libre_v1::input2(text,D_r,'',libre_v1::zero			($_POST[D_r]),$style,'',$libre);
	$fecha_l=$fecha_l.	libre_v1::input2(text,M_r,'',libre_v1::zero			($_POST[M_r]),$style,'',$libre);
	$fecha_l=$fecha_l.	libre_v1::input2(text,A_r,'',libre_v1::zero			($_POST[A_r]),$style,'',$libre);
	
	if($_POST[D_c]=="")$_POST[D_c]=date("d");
	if($_POST[M_c]=="")$_POST[M_c]=date("m");
	if($_POST[A_c]=="")$_POST[A_c]=date("Y");
	$libre=libre_v1::focuas_a(2,M_c);		$fecha_r=			libre_v1::input2(text,D_c,'',$_POST[D_c],$style,'',$libre.'readonly="readonly"');
	$libre=libre_v1::focuas_a(2,A_c);		$fecha_r=$fecha_r.	libre_v1::input2(text,M_c,'',$_POST[M_c],$style,'',$libre.'readonly="readonly"');
	$libre=libre_v1::focuas_a(4,D);			$fecha_r=$fecha_r.	libre_v1::input2(text,A_c,'',$_POST[A_c],$style,'',$libre.'readonly="readonly"');

	$celdas=" ";
	
	$style="width: 1070px; height: 100px; background: rgba(5, 72, 108, 0.67); color: white;";
	$conte=$conte.	"<table border='0' style='background: rgba(5, 72, 108, 0.67) ;'><tr style='background: cornflowerblue;'>";      
	$conte=$conte.	"<tr><td>Estado			</td><td>".$estado		."</td></tr>";
	$conte=$conte.	"<tr><td>Cliente		</td><td>".$cliente		."</td></tr>";
	$conte=$conte.	"<tr><td>Operador		</td><td>".$choferes	."</td></tr>";
	$conte=$conte.	"<tr><td>Unidad			</td><td>".$placas 		."</td></tr>";
	$conte=$conte.	"<tr><td>Flete R.		</td><td>".$FLETE_R		."</td></tr>";
	$conte=$conte. 	"<tr><td>N° Cuentas		</td><td>".$n_cuenta	."</td></tr>";
	
	$conte=$conte.	"<tr><td style='background: #1a86ff;' colspan='2'>	<center>Cartas Portes			</center>		</td></tr>";
	$conte=$conte.	"<tr><td style='background: #1a86ff;'>1	[Index]		</td><td>".$carta1."</td></tr>";
	$conte=$conte.	"<tr><td style='background: #1a86ff;'>2			</td><td>".$carta2."</td></tr>";
	$conte=$conte.	"<tr><td style='background: #1a86ff;'>3			</td><td>".$carta3."</td></tr>";
	$conte=$conte. 	"<tr><td style='background: #1a86ff;'>4			</td><td>".$carta4."</td></tr>";
	
	$conte=$conte.	"<tr><td style='background: #54b3af;'  colspan='2'>	<center>Kilometraje		</center>		</td></tr>";
	$conte=$conte.	"<tr><td style='background: #54b3af;'>Inicio		</td><td style='background: #54b3af;'>".$km_i				."</td></tr>";
	$conte=$conte.	"<tr><td style='background: #54b3af;'>Llegada		</td><td style='background: #54b3af;'>".$km_f				."</td></tr>";
	
	$conte=$conte.	"<tr><td colspan='2'>	<center>Fechas 			</center> 	</td></tr>";
	$conte=$conte. 	"<tr><td style='background: #57849c;' >Fecha Reg.		</td><td style='background: #57849c;'>".$fecha_r		."</td></tr>";
	$conte=$conte. 	"<tr><td style='background: #57849c;'>Fecha Salida	</td><td style='background: #57849c;'>".$fecha_s			."</td></tr>";
	$conte=$conte. 	"<tr><td style='background: #57849c;'>Fecha Legada	</td><td style='background: #57849c;'>".$fecha_l			."</td></tr>";
	
	$conte=$conte. 	"<td style='background: #444;' colspan='2'> Comentario</td></tr>";
	$conte=$conte. 	"<tr><td style='background: #444;' colspan='4' rowspan='2' ><TEXTAREA name='come'  style='height: 30px; width: 200px;' placeholder='Comentarios' >$_POST[come]</TEXTAREA>	</td></tr>";
	$conte=$conte.	"<tr></tr></table>";
	//$style1="width: 225px; height: 505px; background: rgba(5, 72, 108, 0.67); position: relative; float: right; ";
	if($style1=="")$style1=" ";
	//$div_info=libre_v1::windows			("Informacion",$style1,$style2,$conte,$win);
	$res="<div style='position: absolute; left: 630px; color: white;'>$conte</div>";
	return $res;
}

function general		($style0,$conexion,$phpv,$cuenta){
	libre_v1::db						(empresa,$conexion,$phpv);
	if($cuenta<>""){
		include("../admin2/descarga_cue2.php");				
		if($descarga_cue2=="")		{echo"<script>alert('[descarga_cue2] no localizado');</script>";}
	}
	$name_menu ="menu-list";
	$opti_menu1="Fletes";
	$opti_menu2="Viaticos";
	$opti_menu3="Diesel";
	$opti_menu4="Casetas";
	$opti_menu5="Facturas";
	$opti_menu6="R y R";
	$opti_menu7="Guias";
	$opti_menu8="Maniobras";
	$opti_menu9="Via Pass";
	$style_all="margin: 0px .5px; width: 60px; text-align: center;";
	$TYPE=text;
	$conta=0;
	for($x=1; $x<=20; $x++){
		$name1="4TEXT_VIA".$x;
		$name2="9TEXT".$x;
		$_POST[$name2]=$_POST[$name1];
	}
	for($x=1; $x<=20; $x++){
		$text="background: #343434; color: #0075ff;";
		$conta=$conta+1;
		$id=$conta;
		$general=$general.libre_v1::input2($TYPE,'',$id,$x,$style_all.$text,'',$id);
		for($y=1; $y<10; $y++){	
			$name=$y."TEXT";
			$name0=$name;
			$name=$y."TEXT".$x;
			$title=$y."TEXT_C".$x;
			$style1="";
			$id=$name;
			$style1="background: #9E9E9E; color: black;";
			$libre_all="";
			if(($x>5)&&($y==1))	{$style1="background: #003f47; color: black;";$libre_all='readonly="readonly"';}//limite 1  -> fletes
			if(($x>5)&&($y==2))	{$style1="background: #003f47; color: black;";$libre_all='readonly="readonly"';}//limite 2  -> casetas
			if(($x>7)&&($y==3))	{$style1="background: #003f47; color: black;";$libre_all='readonly="readonly"';}//limite 3  -> diesel
			if(($x>20)&&($y==4)){$style1="background: #003f47; color: black;";$libre_all='readonly="readonly"';}//limite 4  -> casetas
			if(($x>5)&&($y==5))	{$style1="background: #003f47; color: black;";$libre_all='readonly="readonly"';}//limite 5  -> facturas
			if(($x>10)&&($y==6)){$style1="background: #003f47; color: black;";$libre_all='readonly="readonly"';}//limite 6  -> "r y r "
			if(($x>5)&&($y==7))	{$style1="background: #003f47; color: black;";$libre_all='readonly="readonly"';}//limite 7  -> "Guias "
			if(($x>10)&&($y==8)){$style1="background: #003f47; color: black;";$libre_all='readonly="readonly"';}//limite 8  -> "Maniobras "
			if(($x>20)&&($y==9)){$style1="background: #003f47; color: black;";$libre_all='readonly="readonly"';}//limite 9  -> via pass
			if($name0=="1TEXT"){ $total1=$total1+$_POST[$name];}
			if($name0=="2TEXT"){ $total2=$total2+$_POST[$name];}
			if($name0=="3TEXT"){ $total3=$total3+$_POST[$name];}
			if($name0=="4TEXT"){ $total4=$total4+$_POST[$name];}
			if($name0=="5TEXT"){ $total5=$total5+$_POST[$name];}
			if($name0=="6TEXT"){ $total6=$total6+$_POST[$name];}
			if($name0=="7TEXT"){ $total7=$total7+$_POST[$name];}
			if($name0=="8TEXT"){ $total8=$total8+$_POST[$name];}
			if($name0=="9TEXT"){ $total9=$total9+$_POST[$name];}
			$value=$_POST[$name];
			$title=$_POST[$title];
			
			//input2							  ($type2,$name,$title	,$value,$style		,$id,$libre,$class)	onkeypress="return pulsar(event)"
			if($y==9){
				$name="4TEXT_VIA".$x;
			}
			$general=$general.libre_v1::input2($TYPE,$name,$title,$value,$style_all.$style1,$id,$libre_all.
			'onKeyUp="mueve_diba_text(event,this); 	calcula_update();" onKeyPress=" mueve_diba_text(event,this); 	"');
			//$conta=$conta+1;
			//$id=$conta;
		}
		$general=$general."<br>";	
	}
	$gene=$general;
	$general="";
	$style_all=$style_all."background: #343434; color: #0075ff;";
	$general=$general.libre_v1::input2($TYPE,'','','',$style_all);
	$general=$general.libre_v1::input2($TYPE,$name_menu,'',$opti_menu1,$style_all);
	$general=$general.libre_v1::input2($TYPE,$name_menu,'',$opti_menu2,$style_all);
	$general=$general.libre_v1::input2($TYPE,$name_menu,'',$opti_menu3,$style_all);
	$general=$general.libre_v1::input2($TYPE,$name_menu,'',$opti_menu4,$style_all);
	$general=$general.libre_v1::input2($TYPE,$name_menu,'',$opti_menu5,$style_all);
	$general=$general.libre_v1::input2($TYPE,$name_menu,'',$opti_menu6,$style_all);
	$general=$general.libre_v1::input2($TYPE,$name_menu,'',$opti_menu7,$style_all);
	$general=$general.libre_v1::input2($TYPE,$name_menu,'',$opti_menu8,$style_all);
	$general=$general.libre_v1::input2($TYPE,$name_menu,'',$opti_menu9,$style_all);
	$general=$general.libre_v1::input2(hidden,focus_gene,'',$_POST[focus_gene],$style_all);
	$general=$general."<br>".$gene;

	$general=$general.libre_v1::input2($TYPE,'','',TOTALES,$style_all).libre_v1::input2(hidden,hidden_fe				,'',5	);
	$general=$general.libre_v1::input2($TYPE,TOTAL1,'',$total1,$style_all.$text,TOTAL1,"onchange='calculadora();'").libre_v1::input2(hidden,hidden_fe		,'',5	);
	$general=$general.libre_v1::input2($TYPE,TOTAL2,'',$total2,$style_all.$text,TOTAL2,"onchange='calculadora();'").libre_v1::input2(hidden,hidden_v		,'',5	);
	$general=$general.libre_v1::input2($TYPE,TOTAL3,'',$total3,$style_all.$text,TOTAL3,"onchange='calculadora();'").libre_v1::input2(hidden,hidden_d		,'',7	);
	$general=$general.libre_v1::input2($TYPE,TOTAL4,'',$total4,$style_all.$text,TOTAL4,"onchange='calculadora();'").libre_v1::input2(hidden,hidden_c		,'',20	);
	$general=$general.libre_v1::input2($TYPE,TOTAL5,'',$total5,$style_all.$text,TOTAL5,"onchange='calculadora();'").libre_v1::input2(hidden,hidden_c_via	,'',20	);
	$general=$general.libre_v1::input2($TYPE,TOTAL6,'',$total6,$style_all.$text,TOTAL6,"onchange='calculadora();'").libre_v1::input2(hidden,hidden_f		,'',5	);
	$general=$general.libre_v1::input2($TYPE,TOTAL7,'',$total7,$style_all.$text,TOTAL7,"onchange='calculadora();'").libre_v1::input2(hidden,hidden_r		,'',10	);
	$general=$general.libre_v1::input2($TYPE,TOTAL8,'',$total8,$style_all.$text,TOTAL8,"onchange='calculadora();'").libre_v1::input2(hidden,hidden_g		,'',5	);
	$general=$general.libre_v1::input2($TYPE,TOTAL9,'',$total9,$style_all.$text,TOTAL9,"onchange='calculadora();'").libre_v1::input2(hidden,hidden_m		,'',10	);
	$res=$res."<div style='background: black; width: auto; height: auto; position: absolute; top: 0px; $style0' >$general</div>";
	if($style1=="")$style1=" ";
	return $res;
}

function abonos			($win,$conexion,$phpv,$cuenta){
	$text="background: #343434; color: #0075ff;";
	$style_all="margin: 0px .5px; text-aling: center;";
	$conte=$conte.libre_v1::input2(text,'','',"Saldo Arrastrado"	,"width: 140px;".$style_all);
	$conte=$conte.libre_v1::input2(text,'','',"Abonos"				,"width: 140px;".$style_all);
	$conte=$conte."<br>";
	$style_all=$style_all." width: 70px;";
	$conte=$conte.libre_v1::input2(text,'','',"N° Folio 1"			,$style_all);
	$conte=$conte.libre_v1::input2(text,'','',"Monto"				,$style_all);
	$conte=$conte.libre_v1::input2(text,'','',"Fechas"				,$style_all);
	$conte=$conte.libre_v1::input2(text,'','',"Monto"				,$style_all);
	$totalac=0;
	$totalab=0;
	for($x=1; $x<6; $x++){
		$name1="ID_ac".$x;
		$name2="ac".$x;
		$name3="ab_Com".$x;
		$name4="ab".$x;		
		$dato="";
		if($_POST[$name1]<>""){
			$consu24	= 	libre_v1::consulta		(abo_acu,$conexion	,ID_G,$_POST[$name1],'',''	,$phpv,'1');
			$dato		= 	libre_v1::mysql_fe_ar	($consu24,$phpv);
		}		
		$conte=$conte."<br>";
		//input2				($type2,$name,$title,$value,$style,$id,$libre,$class)	
		$conte=$conte.libre_v1::input2(hidden	,$name1,'',$_POST[$name1]).libre_v1::input2(text	,Delete_Arr,'',$_POST[$name1],$style_all.$text);	
		$conte=$conte.libre_v1::input2(text		,$name2,'',$dato[Total_Total],$style_all,$name2,'onKeyUp="calcula_update();"');//onKeyUp="mueve_diba_text(event,this);	
		$conte=$conte.libre_v1::input2(text		,$name3,'',$_POST[$name3],$style_all,'');	
		$conte=$conte.libre_v1::input2(text		,$name4,'',$_POST[$name4],$style_all,$name4,'onKeyUp="calcula_update();"');	
		$totalac=$totalac+$_POST[$name2];
		$totalab=$totalab+$_POST[$name4];
	}
	$conte=$conte."<br>";
	$conte=$conte.libre_v1::input2(text		,'','','',$style_all);	
	$conte=$conte.libre_v1::input2(text		,Totalac,'',$totalac,$style_all,Totalac,'readonly="readonly"');	
	$conte=$conte.libre_v1::input2(text		,'','','',$style_all);
	$conte=$conte.libre_v1::input2(text		,Totalab,'',$totalab,$style_all,Totalab,'readonly="readonly"');	
	
	
	
	
	//windows 3
	$style1="width: 324px; height: 205px; background: rgba(5, 72, 108, 0.67); position: absolute; bottom: 0px; left: 405px;";
	$style1=" ";
	if($win=="")$win=min;
//	$div_abonos=libre_v1::windows			(Abonos,$style1,$style2,$conte,$win);
	$res="<div style='position: absolute; background: blue;left: 558px; top: 480px;'	>".$conte."</div>";

	return $res;
}

function arrastrados	($win,$conexion,$phpv,$cuenta){	
		$conte=$conte."<table border='0' style=''>";
			$conte=$conte."<tr>";
			$conte=$conte."<td>".libre_v1::input2(button,'','',"Folio 1"	,'width: 50px; height: 15px; box-shadow: 0px 5px 5px black;','')."</td>";	
			$conte=$conte."<td>".libre_v1::input2(button,'','',"Saldo"  	,'width: 60px; height: 15px; box-shadow: 0px 5px 5px black;','')."</td>";	
			$conte=$conte."<td>".libre_v1::input2(button,'','',"Estado"  	,'width: 70px; height: 15px; box-shadow: 0px 5px 5px black;','')."</td>";	
			$conte=$conte."<td>".libre_v1::input2(button,'','',"Añadidos"  	,'width: 70px; height: 15px; box-shadow: 0px 5px 5px black;','')."</td>";	
			$conte=$conte."</tr>";	
		$conte=$conte."</table>";
		$text="background: #343434; color: #0075ff;";
		$conte=$conte."<div style='overflow-x: hidden; overflow-y: auto; right: 0px; bottom: 0px; position: absolute; left: 0px; top: 25px;background: #34374b;'>";
		/*	if($_POST[Arrastrar]<>"x"){
				$consu5		= libre_v1::consulta			(folio,$conexion	,CHOFER,$_POST[chofer],'',''	,$phpv,'');
				$style_all="margin: 0px .5px; text-align: center;";
				libre_v1::mysql_da_se	($consu5,0,$phpv);
				
				
			}	
		*/
		$conte=$conte."</div>";
	
	$res="<div style='    position: absolute; top: 470px; left: 500px; background: RGBA(49, 114, 177, 0.8); height: 270px; width: 350px;'>$conte</div>";
	return $res;
}

function calculadora	($conexion,$phpv,$cuenta){	
	libre_v1::db						(empresa,$conexion,$phpv);
	if($cuenta<>""){
		include("descarga_cue2.php");		
		if($descarga_cue2=="")		{echo"<script>alert('[descarga_cue2] no localizado');</script>";}
	}
	//Calculadora
	for($x=1; $x<=9; $x++){
		for($y=1; $y<=20; $y++){
			$name=$x."TEXT".$y;
			
			$total=$total+$_POST[$name];
		}
		$_POST["TOTAL".$x]=$total;
		$total=0;
	}
	$FLETES		= $total1=$_POST[TOTAL1];
	$VIATICOS	= $total2=$_POST[TOTAL2];
	$DIESEL		= $total3=$_POST[TOTAL3];
	$CASETAS	= $total4=$_POST[TOTAL4];
	$FACTURAS	= $total5=$_POST[TOTAL5];
	$RYR		= $total6=$_POST[TOTAL6];
	$GUIAS		= $total7=$_POST[TOTAL7];
	$MANIOBRAS	= $total8=$_POST[TOTAL8];
	$VIA_PASS	= $total9=$_POST[TOTAL9];
	$TOTALAC	= $total10=$_POST[Totalac];
	$TOTALAB	= $total11=$_POST[Totalab];
	$Flete_R	= $_POST[flete_r];
	$PRECIO_D	= $_POST[presio_d];
	$KM_I		= $_POST[km_i];
	$KM_F		= $_POST[km_f];
	
	$total=0;
	for($y=1; $y<=5; $y++){$name1="ac".$y;$total=$total+$_POST[$name1];}
	$TOTALAC=$total;
	$total=0;
	for($y=1; $y<=5; $y++){$name1="ab".$y;$total=$total+$_POST[$name1];}
	$TOTALAB=$total;
	$iva=(($total3+$comi)/1.15)*0.15;
	if($_POST[comi]=="")$_POST[comi]=15;
	$iva			=libre_v1::forma_num($iva,2);
	$G_T			=libre_v1::forma_num($CASETAS+$FACTURAS+$RYR+$GUIAS+$MANIOBRAS,2);//casetas+facturas+ryr+guias+maniobras
	$CHOFER			=libre_v1::forma_num($FLETES*0.15,2);				
	if($_POST[comi]<>'')$CHOFER=libre_v1::forma_num($total1*($_POST[comi]/100),2);
	$T_G			=libre_v1::forma_num($CHOFER+$G_T,2);
	$COMICIONES		=libre_v1::forma_num($Flete_R*0.0928,2);
	$DIF_VIA_GSC	=libre_v1::forma_num($VIATICOS-$G_T,2);
	$T_G_F			=libre_v1::forma_num($T_G+$DIESEL+$COMICIONES+$VIA_PASS,2);
	$NETO_CARRO		=libre_v1::forma_num($Flete_R-$T_G_F,2);
	$RENDIMIENTO	=libre_v1::forma_num($NETO_CARRO/($Flete_R*0.01),2);
	$ISR			=libre_v1::forma_num((($CHOFER*7.5)/100),2);
	$DIF_TV			=libre_v1::forma_num($VIATICOS+$ISR-$T_G,2);
	$TOTALTOTAL		=libre_v1::forma_num($TOTALAC+$TOTALAB+$DIF_TV,2);
	$Total_km		=libre_v1::forma_num($KM_F-$KM_I);
	$T_L			=libre_v1::forma_num($DIESEL/$PRECIO_D);
	$KM_L			=libre_v1::forma_num($Total_km/$T_L);
	
	$TYPE=text;
	$libre_all='readonly="readonly"';
	$style_all="margin: 0px .5px; width: 81px;";
		//input2							($type2,$name,$title,$value,$style,$id,$libre,$class)
		$calculos=$calculos.libre_v1::input2($TYPE,'','',"Comision %",$style_all.'background: #343434; color: #0075ff;','',$libre_all);
		$calculos=$calculos.libre_v1::input2($TYPE,comi,'',$_POST[comi],$style_all."background: #9E9E9E;",comi,"onkeyup='calcula_update();'");
		$calculos=$calculos.libre_v1::input2($TYPE,'','','Presio Diesel',$style_all.'background: #343434; color: #0075ff;','',$libre_all);
		$calculos=$calculos.libre_v1::input2($TYPE,presio_d,'',$_POST[presio_d],$style_all."background: #9E9E9E;",presio_d,"onkeyup='calcula_update();'");
		$calculos=$calculos.libre_v1::input2($TYPE,'','','',$style_all,'',$libre_all);
		$calculos=$calculos.libre_v1::input2($TYPE,'','','',$style_all,'',$libre_all);
		$calculos=$calculos."<br>";
		$calculos=$calculos.libre_v1::input2($TYPE,'','',"GASTOS T.",$style_all,'',$libre_all);
		$calculos=$calculos.libre_v1::input2($TYPE,'',$TITLE_G_T,$G_T,$style_all,G_T,$libre_all);
		$calculos=$calculos.libre_v1::input2($TYPE,'','',"GTS.SIN CHOF.",$style_all,'',$libre_all);
		$calculos=$calculos.libre_v1::input2($TYPE,'','',$G_T,$style_all."background: orange;",G_T2,$libre_all);	
		$calculos=$calculos.libre_v1::input2($TYPE,'','',"FLETE R.",$style_all,'',$libre_all);
		$calculos=$calculos.libre_v1::input2($TYPE,'','',$Flete_R,$style_all."background: #00d2ff;",flete_r2,$libre_all);
		$calculos=$calculos."<br>";
		$calculos=$calculos.libre_v1::input2($TYPE,'','',"CHOFER",$style_all,'',$libre_all);
		$calculos=$calculos.libre_v1::input2($TYPE,'','',$CHOFER,$style_all,"CHOFER",$libre_all);	
		$calculos=$calculos.libre_v1::input2($TYPE,'','',"VIATICOS",$style_all,'',$libre_all);
		$calculos=$calculos.libre_v1::input2($TYPE,'','',$VIATICOS,$style_all."background: #01d501;",VIATICOS,$libre_all);	
		$calculos=$calculos.libre_v1::input2($TYPE,'','',"TOTAL G.",$style_all,'',$libre_all);
		$calculos=$calculos.libre_v1::input2($TYPE,'',"Diesel[$total3] + Gasto T.[$T_G] + Comision[$COMICIONES] + Via pass[$VIA_PASS] = $T_G_F ",$T_G_F,$style_all."background: orange;",T_G_F,$libre_all);	
		$calculos=$calculos."<br>";
		//$calculos=$calculos.libre_v1::input2($TYPE,'','',"TOTAL G.",$style_all,'',$libre_all);
		//$calculos=$calculos.libre_v1::input2($TYPE,'','',$T_G,$style_all."background: orange;",T_G);	
		$calculos=$calculos.libre_v1::input2($TYPE,'','',"ISR",$style_all);
		$calculos=$calculos.libre_v1::input2($TYPE,'','',$ISR,$style_all,ISR);
		$calculos=$calculos.libre_v1::input2($TYPE,'','',"DIFERENCIA",$style_all,'',$libre_all);
		$calculos=$calculos.libre_v1::input2($TYPE,'','',$DIF_VIA_GSC,$style_all."background: yellow;",DIF_VIA_GSC,$libre_all);
		$calculos=$calculos.libre_v1::input2($TYPE,'','',"NETO CARRO",$style_all,'',$libre_all);
		$calculos=$calculos.libre_v1::input2($TYPE,'','',$NETO_CARRO,$style_all."background: #01d501;",NETO_CARRO,$libre_all);
		$calculos=$calculos."<br>";
		//$calculos=$calculos.libre_v1::input2($TYPE,'','',"VIATICOS",$style_all,'',$libre_all);
		//$calculos=$calculos.libre_v1::input2($TYPE,'','',$VIATICOS,$style_all."background: #01d501;",VIATICOS2,$libre_all);
		$calculos=$calculos.libre_v1::input2($TYPE,'','',"VIATICOS",$style_all,'',$libre_all);
		$calculos=$calculos.libre_v1::input2($TYPE,'','',$VIATICOS,$style_all."background: #01d501;",VIATICOS2,$libre_all);
		$calculos=$calculos.libre_v1::input2($TYPE,'','','',$style_all);	
		$calculos=$calculos.libre_v1::input2($TYPE,'','','',$style_all);	
		$calculos=$calculos.libre_v1::input2($TYPE,'','','',$style_all);	
		$calculos=$calculos.libre_v1::input2($TYPE,'','','',$style_all);	
		$calculos=$calculos."<br>";
		//$calculos=$calculos.libre_v1::input2($TYPE,'','',"ISR",$style_all);
		//$calculos=$calculos.libre_v1::input2($TYPE,'','',$ISR,$style_all."background: orange;",ISR);
		$calculos=$calculos.libre_v1::input2($TYPE,'','',"DIFERENCIA",$style_all);
		$calculos=$calculos.libre_v1::input2($TYPE,'','',$DIF_TV,$style_all."background: yellow;",DIF_TV,$libre_all);	
		$calculos=$calculos.libre_v1::input2($TYPE,'','','',$style_all);	
		$calculos=$calculos.libre_v1::input2($TYPE,'','','',$style_all);	
		$calculos=$calculos.libre_v1::input2($TYPE,'','',"RENDIMIENTO",$style_all."background: yellow;");
		$calculos=$calculos.libre_v1::input2($TYPE,'','',$RENDIMIENTO,$style_all."background: yellow;",RENDIMIENTO,$libre_all);
		$calculos=$calculos."<br>";		
		//$calculos=$calculos.libre_v1::input2($TYPE,'','',"DIFERENCIA",$style_all);
		//$calculos=$calculos.libre_v1::input2($TYPE,'','',$DIF_TV,$style_all."background: yellow;",DIF_TV,$libre_all);	
		$calculos=$calculos.libre_v1::input2($TYPE,'','','',$style_all);	
		$calculos=$calculos.libre_v1::input2($TYPE,'','','',$style_all);	
		$calculos=$calculos.libre_v1::input2($TYPE,'','','',$style_all);	
		$calculos=$calculos.libre_v1::input2($TYPE,'','','',$style_all);	
		$calculos=$calculos.libre_v1::input2($TYPE,'','','',$style_all);	
		$calculos=$calculos.libre_v1::input2($TYPE,'','','',$style_all);
		$calculos=$calculos."<br>";			
		$calculos=$calculos.libre_v1::input2($TYPE,'','','',$style_all);
		$calculos=$calculos.libre_v1::input2($TYPE,'','','',$style_all);
		$calculos=$calculos.libre_v1::input2($TYPE,'','','',$style_all);
		$calculos=$calculos.libre_v1::input2($TYPE,'','','',$style_all);
		$calculos=$calculos.libre_v1::input2($TYPE,'','','',$style_all);
		$calculos=$calculos.libre_v1::input2($TYPE,'','','',$style_all);
		$calculos=$calculos."<br>";		
		$calculos=$calculos.libre_v1::input2($TYPE,'','','',$style_all);	
		$calculos=$calculos.libre_v1::input2($TYPE,'','','',$style_all);
		$calculos=$calculos.libre_v1::input2($TYPE,'','','',$style_all);
		$calculos=$calculos.libre_v1::input2($TYPE,'','',ACUMULADO,$style_all);
		$calculos=$calculos.libre_v1::input2($TYPE,'','','',$style_all);	
		$calculos=$calculos.libre_v1::input2($TYPE,'','',ABONOS,$style_all);
		$calculos=$calculos."<br>";		
		$calculos=$calculos.libre_v1::input2($TYPE,'','','Relacion de ',$style_all);	
		$calculos=$calculos.libre_v1::input2($TYPE,'','','Combustible',$style_all);
		$calculos=$calculos.libre_v1::input2($TYPE,'','','ACTUAL',$style_all);
		$calculos=$calculos.libre_v1::input2($TYPE,'','',$DIF_TV,$style_all.'background: yellow;',DIF_TV2,$libre_all);
		$calculos=$calculos.libre_v1::input2($TYPE,'','','TOTAL',$style_all);	
		$calculos=$calculos.libre_v1::input2($TYPE,'','',$TOTALAB,$style_all.'background: yellow;',Totalab,$libre_all);
		$calculos=$calculos."<br>";		
		$calculos=$calculos.libre_v1::input2($TYPE,'','','KM Recoridos',$style_all);		
		$calculos=$calculos.libre_v1::input2($TYPE,'','',$Total_km,$style_all,Total_km);
		$calculos=$calculos.libre_v1::input2($TYPE,'','','ANTERIORES',$style_all);
		$calculos=$calculos.libre_v1::input2($TYPE,'','',$TOTALAC,$style_all.'background: yellow;',Totalac,$libre_all);
		$calculos=$calculos.libre_v1::input2($TYPE,'','','FECHA',$style_all);
		$calculos=$calculos.libre_v1::input2($TYPE,'','','',$style_all,'',$libre_all);
		$calculos=$calculos."<br>";		
		$calculos=$calculos.libre_v1::input2($TYPE,'','','Total De Litros',$style_all);
		$calculos=$calculos.libre_v1::input2($TYPE,'','',$T_L,$style_all,t_l);
		$calculos=$calculos.libre_v1::input2($TYPE,ID_ac1	,'',$_POST[ID_ac1]	,$style_all.'background: #343434; color: #0075ff;','ID_ac1'	,"placeholder='Folio add' onkeyup='actua_arrastra(this,this.id);'onKeyPress='actua_arrastra(this,this.id);'");
		$calculos=$calculos.libre_v1::input2($TYPE,ac1		,'',$_POST[ac1]		,$style_all.'background: #B6B1B1;','ac1'						,"onkeyup='calcula_update();'");
		$calculos=$calculos.libre_v1::input2($TYPE,ab_Com1	,'',$_POST[ab_Com1]	,$style_all.'background: #343434; color: #0075ff;','ab_Com1'	,"placeholder='Fecha'");
		$calculos=$calculos.libre_v1::input2($TYPE,ab1		,'',$_POST[ab1]		,$style_all.'background: #B6B1B1;','ab1'						,"onkeyup='calcula_update();'");
		$calculos=$calculos."<br>";		
		$calculos=$calculos.libre_v1::input2($TYPE,'','','Km * Ls',$style_all);
		$calculos=$calculos.libre_v1::input2($TYPE,'','',$KM_L,$style_all,km_l);
		$calculos=$calculos.libre_v1::input2($TYPE,ID_ac2	,'',$_POST[ID_ac2]	,$style_all.'background: #343434; color: #0075ff;','ID_ac2'	,"placeholder='Folio add' onkeyup='actua_arrastra(this,this.id);'onKeyPress='actua_arrastra(this,this.id);'");
		$calculos=$calculos.libre_v1::input2($TYPE,ac2		,'',$_POST[ac2]		,$style_all.'background: #B6B1B1;','ac2'						,"onkeyup='calcula_update();'");
		$calculos=$calculos.libre_v1::input2($TYPE,ab_Com2	,'',$_POST[ab_Com2]	,$style_all.'background: #343434; color: #0075ff;','ab_Com2'	,"placeholder='Fecha'");
		$calculos=$calculos.libre_v1::input2($TYPE,ab2		,'',$_POST[ab2]		,$style_all.'background: #B6B1B1;','ab2'						,"onkeyup='calcula_update();'");
		$calculos=$calculos."<br>";		
		$calculos=$calculos.libre_v1::input2($TYPE,'','','',$style_all);
		$calculos=$calculos.libre_v1::input2($TYPE,'','','',$style_all);
		$calculos=$calculos.libre_v1::input2($TYPE,ID_ac3	,'',$_POST[ID_ac3]	,$style_all.'background: #343434; color: #0075ff;','ID_ac3'	,"placeholder='Folio add' onkeyup='actua_arrastra(this,this.id);'onKeyPress='actua_arrastra(this,this.id);'");
		$calculos=$calculos.libre_v1::input2($TYPE,ac3		,'',$_POST[ac3]		,$style_all.'background: #B6B1B1;','ac3'						,"onkeyup='calcula_update();'");
		$calculos=$calculos.libre_v1::input2($TYPE,ab_Com3	,'',$_POST[ab_Com3]	,$style_all.'background: #343434; color: #0075ff;','ab_Com3'	,"placeholder='Fecha'");
		$calculos=$calculos.libre_v1::input2($TYPE,ab3		,'',$_POST[ab3]		,$style_all.'background: #B6B1B1;','ab3'						,"onkeyup='calcula_update();'");
		$calculos=$calculos."<br>";		
		$calculos=$calculos.libre_v1::input2($TYPE,'','','',$style_all);
		$calculos=$calculos.libre_v1::input2($TYPE,'','','',$style_all);
		$calculos=$calculos.libre_v1::input2($TYPE,ID_ac4	,'',$_POST[ID_ac4]	,$style_all.'background: #343434; color: #0075ff;','ID_ac4'	,"placeholder='Folio add' onkeyup='actua_arrastra(this,this.id);'onKeyPress='actua_arrastra(this,this.id);'");
		$calculos=$calculos.libre_v1::input2($TYPE,ac4		,'',$_POST[ac4]		,$style_all.'background: #B6B1B1;','ac4'						,"onkeyup='calcula_update();'");
		$calculos=$calculos.libre_v1::input2($TYPE,ab_Com4	,'',$_POST[ab_Com4]	,$style_all.'background: #343434; color: #0075ff;','ab_Com4'	,"placeholder='Fecha'");
		$calculos=$calculos.libre_v1::input2($TYPE,ab4		,'',$_POST[ab4]		,$style_all.'background: #B6B1B1;','ab4'						,"onkeyup='calcula_update();'");
		$calculos=$calculos."<br>";		
		$calculos=$calculos.libre_v1::input2($TYPE,'','','',$style_all);
		$calculos=$calculos.libre_v1::input2($TYPE,'','','',$style_all);
		$calculos=$calculos.libre_v1::input2($TYPE,ID_ac5	,'',$_POST[ID_ac5]	,$style_all.'background: #343434; color: #0075ff;','ID_ac5'	,"placeholder='Folio add' onkeyup='actua_arrastra(this,this.id);'onKeyPress='actua_arrastra(this,this.id);'");
		$calculos=$calculos.libre_v1::input2($TYPE,ac5		,'',$_POST[ac5]		,$style_all.'background: #B6B1B1;','ac5'						,"onkeyup='calcula_update();'");
		$calculos=$calculos.libre_v1::input2($TYPE,ab_Com5	,'',$_POST[ab_Com5]	,$style_all.'background: #343434; color: #0075ff;','ab_Com5'	,"placeholder='Fecha'");
		$calculos=$calculos.libre_v1::input2($TYPE,ab5		,'',$_POST[ab5]		,$style_all.'background: #B6B1B1;','ab5'						,"onkeyup='calcula_update();'");
		$calculos=$calculos."<br>";		
		$calculos=$calculos.libre_v1::input2($TYPE,'','','',$style_all);	
		$calculos=$calculos.libre_v1::input2($TYPE,'','','',$style_all);	
		$calculos=$calculos.libre_v1::input2($TYPE,'','','',$style_all);
		$calculos=$calculos.libre_v1::input2($TYPE,'','',DIFERENCIA,$style_all);
		$calculos=$calculos.libre_v1::input2($TYPE,Total_Total,'',$TOTALTOTAL,$style_all,Total_Total,$libre_all);
		$calculos=$calculos.libre_v1::input2($TYPE,'','','',$style_all);
	if($style1=="")$style1=" ";
	$res="<div style='    position: absolute; top: 440px; background: blue;'>".$calculos."</div>";
	return $res;
}	

function arrastrar		($conexion,$phpv,$cuenta){
	$conte=$conte.libre_v1::input2(button,'','',"Folio 1"	,'width: 70px; box-shadow: 0px 5px 5px black;','');	
	$conte=$conte.libre_v1::input2(button,'','',"Saldo"  	,'width: 70px; box-shadow: 0px 5px 5px black;','');	
	$conte=$conte.libre_v1::input2(button,'','',"Estado"  	,'width: 70px; box-shadow: 0px 5px 5px black;','');	
	$conte=$conte.libre_v1::input2(button,'','',"Añadidos"  ,'width: 70px; box-shadow: 0px 5px 5px black;','');	
	$conte=$conte."<div style='' id	='divArrastrar'></div>";
	//$conte=$conte.libre_v1::input2(button,'','',Carga,'',"onclick='desca_arrasta(this);'");
	$conte=$conte.libre_v1::input2(button,'','',Carga ,'','',"onclick='desca_arrasta(chofer);'");
	$res="<div style='    position: absolute; top: 500px; left: 565px; background: RGBA(49, 114, 177, 0.8); height: 270px;'>$conte</div>";
	return $res;
}

function operadores		(){
	$conte=$conte."<img src='img/nuevo-sistem.png' 				style='width: 60px; position: absolute; margin: 5px;'></img>";
	$conte=$conte."<img src='../img/document-delete-icon.png' 	style='width: 60px; position: absolute; top: 71px;'></img>";
	$conte=$conte."<img src='../img/save.png' 					style='width: 60px; position: absolute; top: 135px;' onclick='guarda();'></img>";
	$conte=$conte."<img src='../img/folder.png' 				style='width: 60px; position: absolute; left: 70px;'></img>";
	$conte=$conte."<img src='../img/consola.png' 				style='width: 60px; position: absolute; left: 70px; top: 71px;' onclick='windows(Consola);'></img>";
	$style="width: 135px; height: 200px; background: #292a2d; position: absolute; left: 845px; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;";
	$res=libre_v1::div($style,'',$conte);
	return $res; 
}

function consola		(){
	$style="position: absolute; width: 70px; height: 200px; background: blue;";
	$res=libre_v1::windows(Consola," ",$style2,$contenido,min);
	return $res;
}

function new_data		(){
	$array=tablas_v1::info(empresa,choferes);	
	$mysql=$array[mysql];
	$name=$array[name];
	$size=$array[size];
	$operador=		libre_v1::input2(text,$mysql[1],'',$_POST[$mysql[1]],'','',"maxlength='$size[1]'".$libre);
	$edad=			libre_v1::input2(text,$mysql[2],'',$_POST[$mysql[2]],'','',"maxlength='$size[2]'".$libre);
	$direcion=		libre_v1::input2(text,$mysql[3],'',$_POST[$mysql[3]],'','',"maxlength='$size[3]'".$libre);
	$celular=		libre_v1::input2(text,$mysql[4],'',$_POST[$mysql[4]],'','',"maxlength='$size[4]'".$libre);
	$conte=$conte.	"<table border='0' ><tr style='background: cornflowerblue;'>";      
	$conte=$conte.	"<tr><td>$name[1]	</td><td>$operador</td></tr>";
	$conte=$conte.	"<tr><td>$name[2]	</td><td>$edad</td></tr>";
	$conte=$conte.	"<tr><td>$name[3]	</td><td>$direcion</td></tr>";
	$conte=$conte.	"<tr><td>$name[4]	</td><td>$celular</td></tr>";
	$conte=$conte.	"</table >";
	$style="background: rgba(5, 72, 108, 0.67); position: absolute; top: 0px; width: 300px; left: 5px; color: white;";  
	echo libre_v1::div($style,'',$conte);
	$style="    width: 300px; background: #142332; top: 150px; position: absolute; bottom: 0px; overflow-x: auto;";  
	echo libre_v1::div($style,'','');
}
	$conte="";
	$conte=$conte.$div_botones=$operadores[botones];
	$conte=$conte.$div_consola=$operadores[consola];
	$conte='';
	$parche1_config="";
	//$parche1_config=$parche1_config."<script type='text/javascript' language='javascript' src='libre_v1.js'></script> ";
	$parche1_config=$parche1_config."<LINK REL='STYLESHEET' HREF='../admin2/parche1.css' TYPE='TEXT/CSS'/> ";
?>