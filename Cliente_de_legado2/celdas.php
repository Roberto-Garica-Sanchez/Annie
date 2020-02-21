<?php 
	
	
	libre_v1::db					(empresa,$conexion,$phpv);
	//include("operadores.php");				if($operadores=="")		{echo"<script>alert('operadores no localizado');</script>";}	
	
	$consu1		= libre_v1::consulta			(choferes,$conexion	,'','','',''	,$phpv,'');
	$consu2		= libre_v1::consulta			(placas,$conexion	,'','','',''	,$phpv,'');
	$consu3		= libre_v1::consulta			(clientes,$conexion	,'','','',''	,$phpv,'');
	$choferes	= libre_v1::despliegre_mysql	(chofer,Chofer		,$consu1,Nombre_Ch	,$phpv);
	$placas 	= libre_v1::despliegre_mysql	(placas,Placas		,$consu2,Placas		,$phpv);	
	$cliente	= libre_v1::despliegre_mysql	(cliente,Clientes	,$consu3,Nombre_Cl	,$phpv);
	
	$libre=libre_v1::focuas_a(4,Carta2);	$carta1=				libre_v1::input2(text,Carta1,'',$_POST[Carta1],'','',$libre);
	$libre=libre_v1::focuas_a(4,Carta3);	$carta2=				libre_v1::input2(text,Carta2,'',$_POST[Carta2],'','',$libre);
	$libre=libre_v1::focuas_a(4,Carta4);	$carta3=				libre_v1::input2(text,Carta3,'',$_POST[Carta3],'','',$libre);
	$libre=libre_v1::focuas_a(4,D);			$carta4=				libre_v1::input2(text,Carta4,'',$_POST[Carta4],'','',$libre);	

											$flete_r=				libre_v1::input2(text,flete_r,'',$_POST[flete_r]);
	$libre=libre_v1::focuas_a(10,km_f);		$n_cuenta=				libre_v1::input2(text,n_c	 ,'',$n_c,'','','readonly="readonly"');
	
	$libre=libre_v1::focuas_a(10,km_f);		$km_i=					libre_v1::input2(text,km_i		,'',$_POST[km_i],'','',$libre);
	$libre=libre_v1::focuas_a(10,come);		$km_f=					libre_v1::input2(text,km_f		,'',$_POST[km_f],'','',$libre);
	
	$style='width: 30px; box-shadow: 0px 5px 5px black;';	
	
	$libre=libre_v1::focuas_a(2,M);			$fecha_s=			libre_v1::input2(text,D,'',libre_v1::zero			($_POST[D]),$style,'',$libre);
	$libre=libre_v1::focuas_a(2,A);			$fecha_s=$fecha_s.	libre_v1::input2(text,M,'',libre_v1::zero			($_POST[M]),$style,'',$libre);
	$libre=libre_v1::focuas_a(4,D_r);		$fecha_s=$fecha_s.	libre_v1::input2(text,A,'',libre_v1::zero			($_POST[A]),$style,'',$libre);
	
	$libre=libre_v1::focuas_a(2,M_r);		$fecha_l=			libre_v1::input2(text,D_r,'',libre_v1::zero			($_POST[D_r]),$style,'',$libre);
	$libre=libre_v1::focuas_a(2,A_r);		$fecha_l=$fecha_l.	libre_v1::input2(text,M_r,'',libre_v1::zero			($_POST[M_r]),$style,'',$libre);
	$libre=libre_v1::focuas_a(4,flete_r);	$fecha_l=$fecha_l.	libre_v1::input2(text,A_r,'',libre_v1::zero			($_POST[A_r]),$style,'',$libre);
	
	$libre=libre_v1::focuas_a(2,M_c);		$fecha_r=			libre_v1::input2(text,D_c,'',date("d"),$style,'',$libre.'readonly="readonly"');
	$libre=libre_v1::focuas_a(2,A_c);		$fecha_r=$fecha_r.	libre_v1::input2(text,M_c,'',date("m"),$style,'',$libre.'readonly="readonly"');
	$libre=libre_v1::focuas_a(4,D);			$fecha_r=$fecha_r.	libre_v1::input2(text,A_c,'',date("Y"),$style,'',$libre.'readonly="readonly"');

	$celdas=" ";
	
	$style="width: 1070px; height: 100px; background: rgba(5, 72, 108, 0.67); color: white;";
	$conte=$conte.	"<table border='0' style='background: rgba(5, 72, 108, 0.67) ;'><tr style='background: cornflowerblue;'>";      
	$conte=$conte.	"<tr><td>Cliente		</td><td>".$cliente		."</td></tr>";
	$conte=$conte.	"<tr><td>Operador		</td><td>".$choferes	."</td></tr>";
	$conte=$conte.	"<tr><td>Unidad			</td><td>".$placas 		."</td></tr>";
	$conte=$conte.	"<tr><td>Flete R.		</td><td>".$flete_r		."</td></tr>";
	$conte=$conte. 	"<tr><td>N° Cuentas		</td><td>".$n_cuenta	."</td></tr>";
	
	$conte=$conte.	"<tr><td style='background: #1a86ff;' colspan='2'>	<center>Folios			</center>		</td></tr>";
	$conte=$conte.	"<tr><td style='background: #1a86ff;'>1			</td><td>".$carta1."</td></tr>";
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
	$style1="width: 225px; height: 505px; background: rgba(5, 72, 108, 0.67); position: relative; float: right; ";
echo$div_info=libre_v1::windows			("Informacion",$style1,$style2,$conte);
	
	
	$conte="";
	
	$name_menu ="menu-list";
	$opti_menu1="Fletes";
	$opti_menu2="Viaticos";
	$opti_menu3="Diesel";
	$opti_menu4="Casetas";
	$opti_menu5="Factutas";
	$opti_menu6="R y R";
	$opti_menu7="Guias";
	$opti_menu8="Maniobras";
	$opti_menu9="Via Pass";
	$TYPE=submit;
	$style_all="margin: 0px .5px; width: 70px; text-align: center;";
	$TYPE=text;
	for($x=1; $x<=20; $x++){
		$text="background: #343434; color: #0075ff;";
		$general=$general.libre_v1::input2($TYPE,'','',$x,$style_all.$text);
		for($y=1; $y<10; $y++){	
			$name=$y."TEXT";
			$name0=$name;
			$name=$y."TEXT".$x;
			$style1="";
			if(($x>5)&&($y==1))	{$style1="background: #9E9E9E; color: #0075ff;";}//limite 1  -> fletes
			if(($x>5)&&($y==2))	{$style1="background: #9E9E9E; color: #0075ff;";}//limite 2  -> casetas
			if(($x>7)&&($y==3))	{$style1="background: #9E9E9E; color: #0075ff;";}//limite 3  -> diesel
			if(($x>20)&&($y==4)){$style1="background: #9E9E9E; color: #0075ff;";}//limite 4  -> casetas
			if(($x>5)&&($y==5))	{$style1="background: #9E9E9E; color: #0075ff;";}//limite 5  -> facturas
			if(($x>10)&&($y==6)){$style1="background: #9E9E9E; color: #0075ff;";}//limite 6  -> "r y r "
			if(($x>5)&&($y==7))	{$style1="background: #9E9E9E; color: #0075ff;";}//limite 7  -> "Guias "
			if(($x>10)&&($y==8)){$style1="background: #9E9E9E; color: #0075ff;";}//limite 8  -> "Maniobras "
			if(($x>20)&&($y==9)){$style1="background: #9E9E9E; color: #0075ff;";}//limite 9  -> via pass/**/
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
			$general=$general.libre_v1::input2($TYPE,$name,$title,$value,$style_all.$style1);
		}
		$general=$general."<br>";	
	}
	$gene=$general;
	$general="";
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
	$general=$general."<br>";
	$general=$general.libre_v1::input2($TYPE,'','',TOTALES,$style_all).libre_v1::input2(hidden,hidden_fe				,'',5	);
	$general=$general.libre_v1::input2($TYPE,TOTAL1,'',$total1,$style_all.$text).libre_v1::input2(hidden,hidden_fe		,'',5	);
	$general=$general.libre_v1::input2($TYPE,TOTAL2,'',$total2,$style_all.$text).libre_v1::input2(hidden,hidden_v		,'',5	);
	$general=$general.libre_v1::input2($TYPE,TOTAL3,'',$total3,$style_all.$text).libre_v1::input2(hidden,hidden_d		,'',7	);
	$general=$general.libre_v1::input2($TYPE,TOTAL4,'',$total4,$style_all.$text).libre_v1::input2(hidden,hidden_c		,'',20	);
	$general=$general.libre_v1::input2($TYPE,TOTAL5,'',$total5,$style_all.$text).libre_v1::input2(hidden,hidden_c_via	,'',20	);
	$general=$general.libre_v1::input2($TYPE,TOTAL6,'',$total6,$style_all.$text).libre_v1::input2(hidden,hidden_f		,'',5	);
	$general=$general.libre_v1::input2($TYPE,TOTAL7,'',$total7,$style_all.$text).libre_v1::input2(hidden,hidden_r		,'',10	);
	$general=$general.libre_v1::input2($TYPE,TOTAL8,'',$total8,$style_all.$text).libre_v1::input2(hidden,hidden_g		,'',5	);
	$general=$general.libre_v1::input2($TYPE,TOTAL9,'',$total9,$style_all.$text).libre_v1::input2(hidden,hidden_m		,'',10	)."<br>".$gene;
		
//windows 2
	$style1="width: 760px; height: 510px; background: rgba(5, 72, 108, 0.67); position: absolute; bottom: 0px; left: 0px;";
echo$div_celda=libre_v1::windows			(General,$style1,$style2,$general);
	
	
	
	$conte="";
	$conte=$conte."<table border='0' style='color: white;'><tr>";
	$conte=$conte."<tr>";
	$conte=$conte."<td colspan='2'>Saldo Arrastrado</td><td colspan='2'>Abonos</td>";
	$conte=$conte."</tr>";
	$conte=$conte."<tr>";
	$conte=$conte."<td>N° Folio</td><td>Monto</td><td>Fecha</td><td>Monto</td>";
	$conte=$conte."</tr>";
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
		$conte=$conte."<tr>";
		$conte=$conte."<td>".libre_v1::input2(hidden	,$name1,'',$_POST[$name1]).libre_v1::input2(submit	,Delete_Arr,'',$_POST[$name1],'width: 70px; height: 15px; box-shadow: 0px 5px 5px black;')."</td>";	
		$conte=$conte."<td>".libre_v1::input2(text		,$name2,'',$dato[Total_Total],'width: 70px; height: 15px; box-shadow: 0px 5px 5px black;','')."</td>";	
		$conte=$conte."<td>".libre_v1::input2(text		,$name3,'',$_POST[$name3],'width: 70px; height: 15px; box-shadow: 0px 5px 5px black;','')."</td>";	
		$conte=$conte."<td>".libre_v1::input2(text		,$name4,'',$_POST[$name4],'width: 70px; height: 15px; box-shadow: 0px 5px 5px black;','')."</td>";	
		$conte=$conte."</tr>";	
		$totalac=$totalac+$_POST[$name2];
		$totalab=$totalab+$_POST[$name4];
	}
		$conte=$conte."<tr>";
		$conte=$conte."<td></td>";	
		$conte=$conte."<td>".libre_v1::input2(text		,Totalac,'',$totalac,'width: 70px; height: 15px; box-shadow: 0px 5px 5px black;','','readonly="readonly"')."</td>";	
		$conte=$conte."<td></td>";	
		$conte=$conte."<td>".libre_v1::input2(text		,Totalab,'',$totalab,'width: 70px; height: 15px; box-shadow: 0px 5px 5px black;','','readonly="readonly"')."</td>";	
		$conte=$conte."</tr>";			
	$conte=$conte."</table>";
	
	
	
//windows 3
	$style1="width: 324px; height: 205px; background: rgba(5, 72, 108, 0.67); position: absolute; bottom: 0px; left: 310px;";
echo$div_abonos=libre_v1::windows			(Abonos,$style1,$style2,$conte,min);
	$conte="";	
		
		
		$conte=$conte."<table border='0' style=''>";
			$conte=$conte."<tr>";
			$conte=$conte."<td>".libre_v1::input2(button,'','',"Folio 1"	,'width: 50px; height: 15px; box-shadow: 0px 5px 5px black;','')."</td>";	
			$conte=$conte."<td>".libre_v1::input2(button,'','',"Saldo"  	,'width: 60px; height: 15px; box-shadow: 0px 5px 5px black;','')."</td>";	
			$conte=$conte."<td>".libre_v1::input2(button,'','',"Estado"  	,'width: 70px; height: 15px; box-shadow: 0px 5px 5px black;','')."</td>";	
			$conte=$conte."<td>".libre_v1::input2(button,'','',"Añadidos"  	,'width: 70px; height: 15px; box-shadow: 0px 5px 5px black;','')."</td>";	
			//$conte=$conte."<td>".libre_v1::input2(button,'','',"Comentarios"  	,'			   height: 15px; box-shadow: 0px 5px 5px black;','')."</td>";
			$conte=$conte."</tr>";	
		$conte=$conte."</table>";
		
		$conte=$conte."<div style='overflow-x: hidden; overflow-y: auto; max-height: 150px; right: 0px; bottom: 0px; position: relative; left: 0px;'>";
			if($_POST[Arrastrar]<>"x"){
			$conte=$conte."<table border='0'>";
				$consu5		= libre_v1::consulta			(folio,$conexion	,CHOFER,$_POST[chofer],'',''	,$phpv,'');
				libre_v1::mysql_da_se	($consu5,0,$phpv);
				while($datos=libre_v1::mysql_fe_ar	($consu5,$phpv)){
					$consu24	= 	libre_v1::consulta(abo_acu,$conexion	,ID_G,$datos[ID_G],'',''	,$phpv,'1');
					$dato		= 	libre_v1::mysql_fe_ar	($consu24,$phpv);
					$c0='';	$c1='';	$c2='';
					if($datos[Revisado]==0){$c2=white;	$c0=red;			$Revisado="Pendiente";}
					if($datos[Revisado]==1){$c2=white;	$c0=yellowgreen;	$Revisado="Revisada";}
					if($dato[add_en]==''){$c1='#121212';	$Estado="Libre";}
					if($dato[add_en]<>''){$c1='#343434';	$Estado="Arrastrada";}
					
					$b1=libre_v1::input2(submit	,Carta_arr	,'',$datos[ID_G]		,"width: 50px;");
					$b2=libre_v1::input2(button	,''			,'',libre_v1::zero($dato[Total_Total]),"background: $c1; color: $c2; width: 60px;");
					
					$b3=libre_v1::input2(button	,''			,'',$Revisado			,"background: $c1; color:$c0; width: 70px;");
					$b4=libre_v1::input2(button	,''			,'',$Estado				,"background: $c1; color:$c2; width: 70px;");
					//$b5=libre_v1::input2(text	,''			,'',$datos[Descripcion]	,"background: $c1; color:$c2;");
					$b5="";
					$conte=$conte."
						<tr >
							<td >$b1</td><td>$b2</td><td>$b3</td><td>$b4</td><td>$b5</td><td style='width: auto;'>$b6</td>
						</tr>
					";
				}	
			$conte=$conte."</table>";
			}	
		
		$conte=$conte."</div>";
	$style1="";	
	$style1="width: 300px; height: 205px; background: rgba(5, 72, 108, 0.67); position: absolute; left: 0px; bottom: 0px;";
echo$div_arrastrar=libre_v1::windows			(Arrastrar,$style1,$style2,$conte,min);
	$conte="";
		
	//Calculadora
	$FLETES		= $total1=$_POST[TOTAL1];
	$VIATICOS	= $total2=$_POST[TOTAL2];
	$DIESEL		= $total3=$_POST[TOTAL3];
	$CASETAS	= $total4=$_POST[TOTAL4];
	$FACTURAS	= $total5=$_POST[TOTAL5];
	$RYR		= $total6=$_POST[TOTAL6];
	$GUIAS		= $total7=$_POST[TOTAL7];
	$MANIOBRAS	= $total8=$_POST[TOTAL8];
	$VIA_PASS	= $total9=$_POST[TOTAL9];
	$TOTALAC	= $total9=$_POST[Totalac];
	$TOTALAB	= $total9=$_POST[Totalab];
	$Flete_R=$_POST[flete_r];


	$iva=(($total3+$comi)/1.15)*0.15;
	$iva			=libre_v1::forma_num($iva,2);
	$G_T			=libre_v1::forma_num($CASETAS+$FACTURAS+$RYR+$GUIAS+$MANIOBRAS,2);//casetas+facturas+ryr+guias+maniobras
	$CHOFER			=libre_v1::forma_num($FLETES*0.15,2);				
	if($_POST[comi]<>'')$c=libre_v1::forma_num($total1*($_POST[comi]/100),2);
	$T_G			=libre_v1::forma_num($CHOFER+$G_T,2);
	$COMICIONES		=libre_v1::forma_num($Flete_R*0.0928,2);
	$DIF_VIA_GSC	=libre_v1::forma_num($VIATICOS-$G_T,2);
	$T_G_F			=libre_v1::forma_num($T_G+$DIESEL+$COMICIONES,2);
	$NETO_CARRO		=libre_v1::forma_num($Flete_R-$T_G_F,2);
	$RENDIMIENTO	=libre_v1::forma_num($NETO_CARRO/($Flete_R*0.01),2);
	$ISR			=libre_v1::forma_num((($CHOFER*7.5)/100),2);
	$DIF_TV			=libre_v1::forma_num($VIATICOS+$ISR-$T_G,2);
	$TOTALTOTAL		=$TOTALAC+$TOTALAB+$DIF_TV;
	
	$TYPE=text;
	$style_all="margin: 0px .5px;";
		$calculos=$calculos.libre_v1::input2($TYPE,'','','',$style_all);
		$calculos=$calculos.libre_v1::input2($TYPE,'','',Diesel,$style_all);
		$calculos=$calculos.libre_v1::input2($TYPE,'','',Casetas,$style_all);
		$calculos=$calculos.libre_v1::input2($TYPE,'','Reparaciones y Refaciones ',RYR,$style_all);
		$calculos=$calculos.libre_v1::input2($TYPE,'','',Guias,$style_all);
		$calculos=$calculos.libre_v1::input2($TYPE,'','',Maniobras,$style_all);
		$calculos=$calculos."<br>";
		$calculos=$calculos.libre_v1::input2($TYPE,'','',TOTALES,$style_all."background: #d4b14f;");
		$calculos=$calculos.libre_v1::input2($TYPE,'','',$DIESEL,$style_all."background: #d4b14f;");
		$calculos=$calculos.libre_v1::input2($TYPE,'','',$CASETAS,$style_all."background: #d4b14f;");
		$calculos=$calculos.libre_v1::input2($TYPE,'','',$RYR,$style_all."background: #d4b14f;");
		$calculos=$calculos.libre_v1::input2($TYPE,'','',$GUIAS,$style_all."background: #d4b14f;");
		$calculos=$calculos.libre_v1::input2($TYPE,'','',$MANIOBRAS,$style_all."background: #d4b14f;");
		$calculos=$calculos."<br>";
		$calculos=$calculos.libre_v1::input2($TYPE,'','',"GASTOS T.",$style_all);
		$calculos=$calculos.libre_v1::input2($TYPE,'',$TITLE_G_T,$G_T,$style_all);
		$calculos=$calculos.libre_v1::input2($TYPE,'','',"GTS.SIN CHOF.",$style_all);
		$calculos=$calculos.libre_v1::input2($TYPE,'','',$G_T,$style_all."background: orange;");	
		$calculos=$calculos.libre_v1::input2($TYPE,'','',"FLETE R.",$style_all);
		$calculos=$calculos.libre_v1::input2($TYPE,'','',$Flete_R,$style_all."background: #00d2ff;");
		$calculos=$calculos."<br>";
		$calculos=$calculos.libre_v1::input2($TYPE,'','',"CHOFER",$style_all);
		$calculos=$calculos.libre_v1::input2($TYPE,'','',$CHOFER,$style_all);	
		$calculos=$calculos.libre_v1::input2($TYPE,'','',"VIATICOS",$style_all);
		$calculos=$calculos.libre_v1::input2($TYPE,'','',$VIATICOS,$style_all."background: #01d501;");	
		$calculos=$calculos.libre_v1::input2($TYPE,'','',"TOTAL G.",$style_all);
		$calculos=$calculos.libre_v1::input2($TYPE,'','',$T_G_F,$style_all."background: orange;");	
		$calculos=$calculos."<br>";
		$calculos=$calculos.libre_v1::input2($TYPE,'','',"TOTAL G.",$style_all);
		$calculos=$calculos.libre_v1::input2($TYPE,'','',$T_G,$style_all."background: orange;");
		$calculos=$calculos.libre_v1::input2($TYPE,'','',"DIFERENCIA",$style_all);
		$calculos=$calculos.libre_v1::input2($TYPE,'','',$DIF_VIA_GSC,$style_all."background: yellow;");
		$calculos=$calculos.libre_v1::input2($TYPE,'','',"NETO CARRO",$style_all);
		$calculos=$calculos.libre_v1::input2($TYPE,'','',$NETO_CARRO,$style_all."background: #01d501;");
		$calculos=$calculos."<br>";
		$calculos=$calculos.libre_v1::input2($TYPE,'','',"VIATICOS",$style_all);
		$calculos=$calculos.libre_v1::input2($TYPE,'','',$VIATICOS,$style_all."background: #01d501;");	
		$calculos=$calculos.libre_v1::input2($TYPE,'','','',$style_all);	
		$calculos=$calculos.libre_v1::input2($TYPE,'','','',$style_all);	
		$calculos=$calculos.libre_v1::input2($TYPE,'','','',$style_all);	
		$calculos=$calculos.libre_v1::input2($TYPE,'','','',$style_all);	
		$calculos=$calculos."<br>";
		$calculos=$calculos.libre_v1::input2($TYPE,'','',"ISR",$style_all);
		$calculos=$calculos.libre_v1::input2($TYPE,'','',$ISR,$style_all."background: orange;");
		$calculos=$calculos.libre_v1::input2($TYPE,'','','',$style_all);	
		$calculos=$calculos.libre_v1::input2($TYPE,'','','',$style_all);	
		$calculos=$calculos.libre_v1::input2($TYPE,'','',"RENDIMIENTO",$style_all."background: yellow;");
		$calculos=$calculos.libre_v1::input2($TYPE,'','',$RENDIMIENTO,$style_all."background: yellow;");
		$calculos=$calculos."<br>";		
		$calculos=$calculos.libre_v1::input2($TYPE,'','',"DIFERENCIA",$style_all);
		$calculos=$calculos.libre_v1::input2($TYPE,'','',$DIF_TV,$style_all."background: yellow;");	
		$calculos=$calculos.libre_v1::input2($TYPE,'','','',$style_all);	
		$calculos=$calculos.libre_v1::input2($TYPE,'','','',$style_all);	
		$calculos=$calculos.libre_v1::input2($TYPE,'','','',$style_all);	
		$calculos=$calculos.libre_v1::input2($TYPE,'','','',$style_all);
		$calculos=$calculos."<br>";		
		$calculos=$calculos.libre_v1::input2($TYPE,'','','',$style_all);	
		$calculos=$calculos.libre_v1::input2($TYPE,'','','',$style_all);
		$calculos=$calculos.libre_v1::input2($TYPE,'','',ACUMULADO,$style_all);
		$calculos=$calculos.libre_v1::input2($TYPE,'','','',$style_all);	
		$calculos=$calculos.libre_v1::input2($TYPE,'','',ABONOS,$style_all);
		$calculos=$calculos.libre_v1::input2($TYPE,'','','',$style_all);
		$calculos=$calculos."<br>";		
		$calculos=$calculos.libre_v1::input2($TYPE,'','','',$style_all);	
		$calculos=$calculos.libre_v1::input2($TYPE,'','','ANTERIORES',$style_all);
		$calculos=$calculos.libre_v1::input2($TYPE,'','',$TOTALAC,$style_all);
		$calculos=$calculos.libre_v1::input2($TYPE,'','','',$style_all);	
		$calculos=$calculos.libre_v1::input2($TYPE,'','',$TOTALAB,$style_all);
		$calculos=$calculos.libre_v1::input2($TYPE,'','','',$style_all);
		$calculos=$calculos."<br>";		
		$calculos=$calculos.libre_v1::input2($TYPE,'','','',$style_all);	
		$calculos=$calculos.libre_v1::input2($TYPE,'','','ACTUAL',$style_all);
		$calculos=$calculos.libre_v1::input2($TYPE,'','',$DIF_TV,$style_all);
		$calculos=$calculos.libre_v1::input2($TYPE,'','','',$style_all);
		$calculos=$calculos.libre_v1::input2($TYPE,'','','',$style_all);	
		$calculos=$calculos.libre_v1::input2($TYPE,'','','',$style_all);
		$calculos=$calculos."<br>";		
		$calculos=$calculos.libre_v1::input2($TYPE,'','','',$style_all);	
		$calculos=$calculos.libre_v1::input2($TYPE,'','','',$style_all);
		$calculos=$calculos.libre_v1::input2($TYPE,'','',DIFERENCIA,$style_all);
		$calculos=$calculos.libre_v1::input2($TYPE,'','',$TOTALTOTAL,$style_all);
		$calculos=$calculos.libre_v1::input2($TYPE,'','','',$style_all);	
		$calculos=$calculos.libre_v1::input2($TYPE,'','','',$style_all);
	$style1="width: 640px; height: 260px; background: rgba(5, 72, 108, 0.67); position: relative;";
echo$div_calculos=libre_v1::windows			(Calculos,$style1,$style2,$calculos);
	$js="
		<script type='text/javascript'>
            function min_win() {
                
            }
			function max_win(){
				
			}
        </script>

	";
	$conte="";
	$conte=$conte.$div_botones=$operadores[botones];
	$conte=$conte.$div_consola=$operadores[consola];
	
//	echo$conte;
	$conte='';
?>