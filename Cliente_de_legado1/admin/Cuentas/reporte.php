<?php
$type=hidden;
include("libre_rep.php");
echo "<input type='hidden' name='menu-list' value='".$_POST['menu-list']."'>";
if ($_POST[Carta]<>''){
$consu5=consulta('folio',$conexion,"","","","",$phpv);
include('descarga_cue.php');
}
//----------------------------------
$total1=	presenta2 (hidden_fe	,'1TEXT_C','1TEXT',$type);
$total2=	presenta2 (hidden_v		,'2TEXT_C','2TEXT',$type);
$total3=	presenta2 (hidden_d		,'3TEXT_C','3TEXT',$type);
$total4=	presenta2 (hidden_c		,'4TEXT_C','4TEXT',$type);
$total4_via=presenta2 (hidden_c_via	,'4TEXT_C_VIA','4TEXT_VIA',$type);
$total5=	presenta2 (hidden_f		,'5TEXT_C','5TEXT',$type);
$total6=	presenta2 (hidden_r		,'6TEXT_C','6TEXT',$type);
$total7=	presenta2 (hidden_g		,'7TEXT_C','7TEXT',$type);
$total8=	presenta2 (hidden_m		,'8TEXT_C','8TEXT',$type);
$total9=	presenta2 (hidden_ab	,'ab_Com','ab',$type);
$total10=	presenta2 (hidden_ac	,'ID_ac','ac',$type,'',$_POST[Delete_Arr],$consu24);

echo input2(hidden,t_d,'',$_POST[t_d]);
echo input2(hidden,t_s,'',$_POST[t_s]);
echo input2(hidden,t_1,'',$_POST[t_1]);
echo input2(hidden,t_2,'',$_POST[t_2]);
echo input2(hidden,t_3,'',$_POST[t_3]);
echo input2(hidden,t_4,'',$_POST[t_4]);
echo input2(hidden,t_5,'',$_POST[t_5]);
echo input2(hidden,t_6,'',$_POST[t_6]);
echo input2(hidden,t_7,'',$_POST[t_7]);
echo input2(hidden,t_8,'',$_POST[t_8]);
echo input2(hidden,t_9,'',$_POST[t_9]);
echo input2(hidden,t_ab,'',$_POST[t_ab]);
echo input2(hidden,t_ac,'',$_POST[t_ac]);
echo input2(hidden,A_i,'',$_POST[A_i]);
echo input2(hidden,M_i,'',$_POST[M_i]);
echo input2(hidden,D_i,'',$_POST[D_i]);
echo input2(hidden,A_f,'',$_POST[A_f]);
echo input2(hidden,M_f,'',$_POST[M_f]);
echo input2(hidden,D_f,'',$_POST[D_f]);
$g_t=$total4+$total5+$total6+$total7+$total8;
$c=$total1*0.15;    if($_POST[comi]<>'')$c=$total1*($_POST[comi]/100);
$rete=($c*7.5)/100;
$t_g=   round($g_t+$c,2);
$dif1=  round($total2-$t_g+$rete,2);
$dif2=  round($total2-$g_t,2);
$dif3=$dif1+$total10;
$pre_d=$dif1+$total10;
$dif4=$pre_d+$total9;
$comi=  round($_POST[flete_r]*0.0928,2);
$t_d_g= round($total3+$t_g+$comi,2);
$n_c=   round($_POST[flete_r]-$t_d_g,2);
$re=    round($_POST[flete_r]*0.01,2);
$re=    round($n_c/$re,2);
$km_t=round($_POST[km_f]-$_POST[km_i],2);
//----------------------------------
$size=0;
$style="background: rgba(5, 72, 108, 0.67) none repeat scroll 0% 0%; width: auto; width: 220px; left: -1px; color: white;";
$title='Nueva Cuenta';
$i1=1;                  $d1=input2($type,Carta1,'',$_POST[Carta1],"color: $indc1;",'','maxlength="4"').$_POST[Carta1];
$i2=2;                  $d2=input2($type,Carta2,'',$_POST[Carta2],"color: $indc2;",'','maxlength="4"').$_POST[Carta2];
$i3=3;                  $d3=input2($type,Carta3,'',$_POST[Carta3],"color: $indc3;",'','maxlength="4"').$_POST[Carta3];
$i4=4;                  $d4=input2($type,Carta4,'',$_POST[Carta4],"color: $indc4;",'','maxlength="4"').$_POST[Carta4];
$i5=Chofer;             $d5=input2($type,chofer,'',$_POST[chofer],"color: $indc4;",'','maxlength="4"').$_POST[chofer];
$i6=Placas;             $d6=input2($type,placas,'',$_POST[placas],"color: $indc4;",'','maxlength="4"').$_POST[placas];
$i7=Cliente;            $d7=input2($type,cliente,'',$_POST[cliente],"color: $indc4;",'','maxlength="4"').$_POST[cliente];

$i8=Salida;             $d8="$_POST[D]-$_POST[M]-$_POST[A]"			.input2($type,D,'',$_POST[D]).input2($type,M,'',$_POST[M]).input2($type,A,'',$_POST[A]);
$i9=Regreso;			$d9="$_POST[D_r]-$_POST[M_r]-$_POST[A_r]"	.input2($type,D_r,'',$_POST[D_r]).input2($type,M_r,'',$_POST[M_r]).input2($type,A_r,'',$_POST[A_r]);

//$i10=Flete;        		$d10=input($type,flete_r,$_POST[flete_r]).$_POST[flete_r];
$i11="Kms inicio";      $d11=input2($type,km_i,'',$_POST[km_i]).$_POST[km_i];
$i12="Kms fin";         $d12=input2($type,km_f,'',$_POST[km_f]).$_POST[km_f];
$i13="N° Cuenta";       $d13=input2($type,n_c,'',$_POST[n_c]).$_POST[n_c];
$i14=Cometa;            $d14="<TEXTAREA class='Medio'  maxleght='200' title='comentario general de el viaje' name='come'>$_POST[come]</TEXTAREA>";
include("tablero.php");
//------------------------------
print"
<div style='background: rgba(0, 0, 0, 0.77) none repeat scroll 0% 0%;
overflow: auto; overflow-x:hidden;
width: 110px; height: 368px; top: 230px; position: absolute;'>
	<table>
";
		IF($_POST[chofer]==Todos){$_POST[chofer]=chofer;}
		IF($_POST[chofer]==chofer){$color=yellowgreen;}
		echo input2(submit,chofer,'',Todos,"background: $color;")."<br>";

		//$consu1=consulta('choferes',$conexion,"","",Nombre_Ch,"",$phpv);
		mysql_da_se($consu1,0,$phpv);
		while($datos=mysql_fe_ar($consu1,$phpv)){
			$color='';
			if ($_POST[chofer]==$datos[Nombre_Ch])$color=yellowgreen;
			$b1=input2(submit,chofer,$datos[Nombre_Ch],$datos[Nombre_Ch],"background: $color;");
			print "$b1<br>";
		}
		$b1='';
print "
	</table>
</div>
";

$style0="background: rgba(100, 100, 100, 0.77) 	none repeat scroll 0% 0%; overflow: auto; overflow-x:hidden; position: absolute;
 left: 115px; height: 28px; width: 664px; top: 0px;";
$style1="background: rgba(100, 100, 100, 0.77) 	none repeat scroll 0% 0%; overflow: auto; overflow-x:hidden; position: absolute;
 left: 115px; height: 28px; width: 664px; top: 28px;";
$style2="background: rgba(0, 0, 0, 0.77) 		none repeat scroll 0% 0%; overflow: auto; overflow-x: auto; position: absolute;
 left: 115px; height: 542px; width: 664px; top: 56px;";
 IF ($_POST['menu-list']==''){$_POST['menu-list']=Lista;}
IF($_POST['menu-list']==Lista)$color=yellowgreen;
$n1=input2(submit,'menu-list','',Lista		,"background: $color;");$color='';
IF($_POST['menu-list']==Tablas)$color=yellowgreen;
$n2=input2(submit,'menu-list','',Tablas		,"background: $color;");$color='';
IF($_POST['menu-list']==Formulario)$color=yellowgreen;
$n3=input2(submit,'menu-list','',Formulario	,"background: $color;");$color='';
IF($_POST['menu-list']==Reporte)$color=yellowgreen;
$n4=input2(submit,'menu-list','',Reporte	,"background: $color;");$color='';
$n5=input2(submit,'menu-list');
$n6=input2(submit,'menu-list');
$n7=input2(submit,'menu-list');
print "
 <div style='$style0'>
	<table><tr><td>$n1</td><td>$n2</td><td>$n3</td><td>$n4</td><td>$n5</td><td>$n6</td></tr></table>
 </div>
 <div style='$style1'>
	<tr><td>$t1</td><td>$t2</td><td>$t3</td><td>$t4</td><td>$t5</td><td>$t6</td></tr>
 </div>
";
print "<div style='$style2'>";
IF ($_POST['menu-list']==Lista){echo"lista";
	$t1=input2(button,'','','',N°,'width: 30px;');
	$t2=input2(button,'','',Cuente);
	$t3=input2(button,'','',Cliente);
	$t4=input2(button,'','',Saldo);
	$t5=input2(button,'','',sueldo);
	$t6=input2(button,'','',Fecha);
	$consu5=consulta('folio',$conexion,"","",ID_G,2,$phpv);
	echo"<table>";
	mysql_da_se($consu5,0,$phpv);
	while($datos=mysql_fe_ar($consu5,$phpv)){
		if (($_POST[chofer]==$datos[CHOFER])or($_POST[chofer]==chofer)){
			$c1='';
			if($datos[Revisado]==0)$c1=pink;
			if($datos[Revisado]==1)$c1=yellowgreen;
			$b1=input2(button,'','',$datos[N_Cuenta],'width: 30px;');
			$b2=input2(submit,Carta,'',$datos[ID_G]	,"background: $c1; color:$c2;");
			$b3=input2(button,'','',$datos[CLIENTE]	,"background: $c1; color:$c2;");
			$b4=input2(button,'','',$datos[Difer_1]	,"background: $c1; color:$c2;");
			$b5=input2(button,'','',$datos[sueldo]	,"background: $c1; color:$c2;");
			$consu4=consulta(fechas,$conexion,"","","","",$phpv);
			mysql_da_se($consu4,0,$phpv);
			while($dato=mysql_fe_ar($consu4,$phpv)){
				$fecha='';
				if($dato[ID_G]==$datos[ID_G]) {$fecha="$dato[D]-$dato[M]-$dato[A]";break;}
			}
			$b6=input2(button,'','',$fecha);
			$conte=$conte."
				<tr >
					<td >$b1</td><td>$b2</td><td>$b3</td><td>$b4</td><td>$b5</td><td style='width: auto;'>$b6</td><br>
				</tr>
			";
		}
	}
$conte=$conte."</table>";
}
IF ($_POST['menu-list']==Tablas){echo"tabla";
	$size=0;
	$style="background: rgba(0, 0, 0, 0.77) none repeat scroll 0% 0%; width: auto; color: white;";
	$ts="background: black;";
	$title1='Generales';
	$i1="Gastos T.";   	$d1=input2(button,'',"Casetas[$total4] + Facturas[$total5] + RYR[$total6] + Guias[$total7] + Maniobras[$total8] =$g_t",$t_g,'background: #FDFD96; color: black;');
	$i2=Chofer;			$d2=input2(button,'',"Flete[$total1] * 0.15= $c "									,$c,'background: #FDFD96; color: black;');
	$i3=ISR;			$d3=input2(button,'',"(Chofer[$c] * 7.5)/100 = $rete "								,$rete,'background: orange; color: black;');
	$i4=Viaticos;		$d4=input2(button,'',''																,$total2,'background: greenyellow; color: black;');
	$i5='';				$d5=input2(button,'',"Viaticos[$total2] + Retencion[$rete] -Gasto T.[$g_t] = $dife1",$dif1,"background: $sd5; color: $ld5;");
	$tc6='#989898';			$i6='';			$d6='';
	$i7='Sin. Cho.';	$d7=input2(button,'',"Casetas[$total4] + Facturas[$total5] + RYR[$total6] + Guias[$total7] + Maniobras[$total8] =$g_t",$t_g,'background: #FDFD96; color: black; ');
	$i8=Viaticos;		$d8=input2(button,'','',$total2,'background: greenyellow; color: black;');
	$i9='';				$d9=input2(button,'',"Viaticos[$total2] -Gasto T.[$g_t] = $dife2 "					,$dif2,"background: $sd9; color: $ld9;");
	$tc10='#989898';			$i10='';		$d10='';
	$i12='Total G.';	$d12=input2(button,'',"Diesel[$total3] +Gasto T.[$g_t] + Comision[$comi] = $t_d_g "	,$t_d_g,"background: orange; color: black;");
	$i13='Neto Carro';	$d13=input2(button,'',"Neto Camion[$n_c] / (fletes[$flete_r] * 0.01) = $re "		,$n_c,"background: $sd14; color: $ld14;");
	$i14=Rendimiento;	$d14=input2(button,'',"Neto Camion[$n_c] / (fletes[$flete_r] * 0.01) = $re "		,$re,"background: $sd14; color: $ld14;");
	$i15='Cuentas';		$d15='';	$tc15='#000';
	$i16='Actual';		$d16=input2(button,'',"Viaticos[$total2] + Retencion[$rete] -Gasto T.[$g_t] = $dife1",$dif1,"background: $indf16; color: $indc16;");
	$i17='Arrastado';	$d17=input2(button,'',"Suma de todas las Cuentas Arastradas"						,$total10,"background: $indf17; color: $indc17;");
	$i18='';			$d18=input2(button,'',"Actual[$dif1] + Arrastrada[$dif4]"							,$dif3,"background: $indf18; color: $indc18;");
	$i19=Abonos;		$d19=input2(button,'',"Suma de los abonos de esta cuenta"							,$total9,"background: $indf19; color: $indc19;");
	$i20=Total;			$d20=input2(button,'',''															,$dif4,"background: $indf20; color: $indc20;");
	include('tablero.php');
	//-----------------------------------------------------------	
	$size=0;
	$title1="Gastos sin Chofer";
	$style="position: absolute; left: 267px; top: 0px; color: white;";
	$ts="background: black;";
	$i1=Casetas;		$d1=input2(button,'','',$total4,'background: #FDFD96;');
	$i2=Facturas;		$d2=input2(button,'','',$total5,'background: #FDFD96;');
	$i3=RyR;			$d3=input2(button,'','',$total6,'background: #FDFD96;');
	$i4=Guia;			$d4=input2(button,'','',$total7,'background: #FDFD96;');
	$i5=Maniobras;		$d5=input2(button,'','',$total8,'background: #FDFD96;');
	$i6='';				$d6='';					$tc6='#989898';
						$d7=input2(button,'','',$g_t   ,'background: orangered;');
	$i8=Viaticos;		$d8=input2(button,'','',$total2,'background: yellowgreen;');
	$i9='';				$d9='';					$tc9='#989898';
	$i10='';			$d10=input2(button,'','',$dif2 ,"background: $sd9; color: $ld9;");
	$i11='';			$d11='';				$tc11=white;
	$i13='';			$d13='';				$tc13='#989898';
	$i14=Chofer;		$d14=input2(button,'','',$c    ,'background: #FDFD96;');
	$i15=Diesel;		$d15=input2(button,'','',$total3,'background: #FDFD96;');
	$i16=Comisiones;	$d16=input2(button,'','',$comi,'','background: #FDFD96;');
	$i17='';			$d17='';				$tc17='#989898';
	$i18='';			$d18=input2(button,'','',$t_d_g,'','background: orangered;');
	$i19=Neto;			$d19=input2(button,'','',$n_c  ,'',"background: $sd13; color: $ld13;");
	include("tablero.php");
	//---------------------------------------------------------------
	$size=0;
	$title1='Gastos con Chofer';
	$style="position: absolute;  top: 0px; color: white;";
	$ts="background: black;";
	$i1=Casetas;		$d1=input2(button,'','',$total4,'background: #FDFD96;');
	$i2=Facturas;		$d2=input2(button,'','',$total5,'background: #FDFD96;');
	$i3=RyR;			$d3=input2(button,'','',$total6,'background: #FDFD96;');
	$i4=Guia;			$d4=input2(button,'','',$total7,'background: #FDFD96;');
	$i5=Maniobras;		$d5=input2(button,'','',$total8,'background: #FDFD96;');
	$i6='';				$d6='';				$tc6='#989898';
						$d7=input2(button,'','',$g_t   ,'background: orange;');
	$i8=Chofer;			$d8=input2(button,'','',$c	   	,'background: orange;');
	$i9='';				$d9='';				$tc9='#989898';
	$i10='';			$d10=input2(button,'','',$t_g  ,'','background: orangered;');
	$i11=Viaticos;		$d11=input2(button,'','',$total2,'','background: yellowgreen;');
	$i12='';			$d12='';			$tc12='#989898';
	$i13='';			$d13=input2(button,'','',$dif1 ,'',"background: $sd5; color: $ld5;");
	include("tablero.php");		
}
IF ($_POST['menu-list']==Formulario){echo"Fumulario";
	$t1=input2(submit,'',Crear,'Crear Informe ');
	$t2="Inicio	".despieges(D_i,Dia,1,31).despieges(M_i,Mes,1,12).despieges(A_i,Año,2015,2030);
	$t3="Fin	".despieges(D_f,Dia,1,31).despieges(M_f,Mes,1,12).despieges(A_f,Año,2015,2030);	
	$fec_ini=$_POST[A_i].zero($_POST[M_i]).zero($_POST[D_i]);
	$fec_fin=$_POST[A_f].zero($_POST[M_f]).zero($_POST[D_f]);
	$consu5=consulta(folio,$conexion,"","","","",$phpv);
	$b1=input2(submit,'','',Carta		,"background: $c1; color:$c2;");
	$b2=input2(button,'','',Fecha		);
	$b3=input2(button,'','',Saldo		,"background: $c1; color:$c2;");
	$b4=input2(button,'','',Sueldo		,"background: $c1; color:$c2;");
	$b5=input2(button,'','',ISR	 		,"background: $c1; color:$c2;");
	$b6=input2(button,'','',Flete		,"background: $c1; color:$c2;");
	$b7=input2(button,'','',Viaticos	,"background: $c0; color:$c2;");
	$b8=input2(button,'','',Diesel		,"background: $c1; color:$c2;");
	$b9=input2(button,'','',Casetas		,"background: $c1; color:$c2;");
	$b10=input2(button,'','',Via		,"background: $c1; color:$c2;");
	$b11=input2(button,'','',Facturas	,"background: $c1; color:$c2;");
	$b12=input2(button,'','',RyR		,"background: $c1; color:$c2;");
	$b13=input2(button,'','',Guias		,"background: $c1; color:$c2;");
	$b14=input2(button,'','',Maniobras	,"background: $c1; color:$c2;");
	$b15=input2(button,'','',Abonos		,"background: $c1; color:$c2;");
	$b16=input2(button,'','',Arastrados	,"background: $c1; color:$c2;");
	$conte=$conte."<table>
		<tr >
			<td >$b1</td><td>$b2</td><td>$b3</td><td>$b4</td><td>$b5</td><td>$b6</td><td>$b7</td><td>$b8</td><td>$b9</td><td>$b10</td><td >$b11</td><td>$b12</td><td>$b13</td><td>$b14</td><td>$b15</td><td>$b16</td>
		</tr>
	";
	$total_d=0;$total_s=0;$totalab=0;$totalac=0;$x=0;
	$total1=0;$total2=0;$total3=0;$total4=0;$total_v=0;
	$total5=0;$total6=0;$total7=0;$total8=0;$total9=0;
		mysql_da_se($consu5,0,$phpv);
		while($datos=mysql_fe_ar($consu5,$phpv)){
			if (($_POST[chofer]==$datos[CHOFER])or($_POST[chofer]==chofer)){
				
				$c1='';
				$dato5[ID_G]=$datos[ID_G];
				include('sincro.php');
				$fec_set=$dato4[A].zero($dato4[M]).zero($dato4[D]);
				IF(($fec_ini<=$fec_set)&&($fec_fin>=$fec_set)){$c0='#898989'; 	$c2=white;}
				IF(($fec_ini>$fec_set)||($fec_fin<$fec_set)){$c0='black'; 	$c2=white;}
				if($datos[Revisado]==0)$c1=pink;
				if($datos[Revisado]==1)$c1=yellowgreen;
				$fecha="$dato4[D]-$dato4[M]-$dato4[A]";
				$b1=input2(submit,Carta	,'',$datos[ID_G]		,"background: $c1; color:$c2;");
				$b2=input2(button,''	,'',$fecha				,"background: $c0; color:$c2;");
				$b3=input2(button,''	,'',$dato24[Difer_1]	,"background: $c0; color:$c2;");
				$b4=input2(button,''	,'',$datos[sueldo]		,"background: $c0; color:$c2;");
				$b5=input2(button,''	,'',$datos[isr]			,"background: $c0; color:$c2;");
				$b6=input2(button,''	,'',$dato6[TOTAL1]		,"background: $c0; color:$c2;");
				$b7=input2(button,''	,'',$dato7[TOTAL2]		,"background: $c0; color:$c2;");
				$b8=input2(button,''	,'',$dato8[TOTAL3]		,"background: $c0; color:$c2;");
				$b9=input2(button,''	,'',$dato9[TOTAL4]		,"background: $c0; color:$c2;");
				$b10=input2(button,''	,'',$dato9_1[TOTAL]		,"background: $c0; color:$c2;");
				$b11=input2(button,''	,'',$dato10[TOTAL5]		,"background: $c0; color:$c2;");
				$b12=input2(button,''	,'',$dato11[TOTAL6]		,"background: $c0; color:$c2;");
				$b13=input2(button,''	,'',$dato12[TOTAL7]		,"background: $c0; color:$c2;");
				$b14=input2(button,''	,'',$dato13[TOTAL8]		,"background: $c0; color:$c2;");
				$b15=input2(button,''	,'',$dato24[Totalab]	,"background: $c0; color:$c2;");
				$b16=input2(button,''	,'',$dato24[Totalac]	,"background: $c0; color:$c2;");
				IF(($fec_ini<=$fec_set)&&($fec_fin>=$fec_set)){
				$x++;
				$conte=$conte."
					<tr >
						<td >$b1</td><td>$b2</td><td>$b3</td><td>$b4</td><td>$b5</td><td>$b6</td><td>$b7</td><td>$b8</td><td>$b9</td><td>$b10</td><td >$b11</td><td>$b12</td><td>$b13</td><td>$b14</td><td>$b15</td><td>$b16</td>
					</tr>
				";
				}
				IF(($fec_ini<=$fec_set)&&($fec_fin>=$fec_set)){
					$total_d=$total_d+$datos[Difer_1];
					$total_s=$total_s+$datos[sueldo];
					$total_i=$total_i+$datos[isr];
					$totalab=$totalab+$dato24[Totalab];
					$totalac=$totalac+$dato24[Totalac];
					$total1=$total1+$dato6[TOTAL1];
					$total2=$total2+$dato7[TOTAL2];
					$total3=$total3+$dato8[TOTAL3];
					$total4=$total4+$dato9[TOTAL4];
					$total_v=$total_v+$dato9_1[TOTAL];
					$total5=$total5+$dato10[TOTAL5];
					$total6=$total6+$dato11[TOTAL6];
					$total7=$total7+$dato12[TOTAL7];
					$total8=$total8+$dato13[TOTAL8];
					$total9=$total9+$dato14[TOTAL9];
				}
			}
		}
		$b1=input2(button,'',$x);
		$b2=input2(button,'');
		$b3=input2(button,'','',$total_d	,"background: #343434; color: white;").input2(hidden,t_d,'',$total_d);
		$b4=input2(button,'','',$total_s	,"background: #343434; color: white;").input2(hidden,t_s,'',$total_s);
		$b5=input2(button,'','',$total_i	,"background: #343434; color: white;").input2(hidden,t_i,'',$total_i);
		$b6=input2(button,'','',$total1		,"background: #343434; color: white;").input2(hidden,t_1,'',$total1);
		$b7=input2(button,'','',$total2		,"background: #343434; color: white;").input2(hidden,t_2,'',$total2);
		$b8=input2(button,'','',$total3		,"background: #343434; color: white;").input2(hidden,t_3,'',$total3);
		$b9=input2(button,'','',$total4		,"background: #343434; color: white;").input2(hidden,t_4,'',$total4);
		$b10=input2(button,'','',$total_v	,"background: #343434; color: white;").input2(hidden,t_v,'',$total_v);
		$b11=input2(button,'','',$total5	,"background: #343434; color: white;").input2(hidden,t_5,'',$total5);
		$b12=input2(button,'','',$total6	,"background: #343434; color: white;").input2(hidden,t_6,'',$total6);
		$b13=input2(button,'','',$total7	,"background: #343434; color: white;").input2(hidden,t_7,'',$total7);
		$b14=input2(button,'','',$total8	,"background: #343434; color: white;").input2(hidden,t_8,'',$total8);
		$b15=input2(button,'','',$totalab	,"background: #343434; color: white;").input2(hidden,t_ab,'',$totalab);
		$b16=input2(button,'','',$totalac	,"background: #343434; color: white;").input2(hidden,t_ac,'',$totalac);
		$conte=$conte."<table>
			<tr >
				<td >$b1</td><td>$b2</td><td>$b3</td><td>$b4</td><td>$b5</td><td>$b6</td><td>$b7</td><td>$b8</td><td>$b9</td><td>$b10</td><td >$b11</td><td>$b12</td><td>$b13</td><td>$b14</td><td>$b15</td><td>$b16</td>
			</tr>
		";
}
IF($_POST['menu-list']==Reporte){echo"reporte";
	$t2="Inicio	".despieges(D_i,Dia,1,31).despieges(M_i,Mes,1,12).despieges(A_i,Año,2015,2030);
	$t3="Fin	".despieges(D_f,Dia,1,31).despieges(M_f,Mes,1,12).despieges(A_f,Año,2015,2030);	
	$fec_ini="($_POST[A_i]-$_POST[M_i]-$_POST[D_i])";
	$fec_fin="($_POST[A_f]-$_POST[M_f]-$_POST[D_f])";
	$size=0;
	$title1='Reportes ';
	$style="position: absolute;  top: 0px; color: white;";
	$ts="background: black;";
	$i1=Fletes;			$d1=input2(button,'','',$_POST[t_1],'background: #FDFD96;');
	$i2=Viaticos;		$d2=input2(button,'','',$_POST[t_2],'background: #FDFD96;');
	$i3=Diesel;			$d3=input2(button,'','',$_POST[t_3],'background: #FDFD96;');
	$i4=Casetas;		$d4=input2(button,'','',$_POST[t_4],'background: #FDFD96;');
	$i5='Via pass';		$d5=input2(button,'','',$_POST[t_v],'background: #FDFD96;');
	$i6=Facturas;		$d6=input2(button,'','',$_POST[t_5],'background: #FDFD96;');
	$i7='R y R';		$d7=input2(button,'','',$_POST[t_6],'background: #FDFD96;');
	$i8=Guias;			$d8=input2(button,'','',$_POST[t_7],'background: #FDFD96;');
	$i9=Maniobras;		$d9=input2(button,'','',$_POST[t_8],'background: #FDFD96;');
	$i10='';			$d10='';
	$i11=Saldos;		$d11=input2(button,'','',$_POST[t_d],'background: #FDFD96;');
	$i12=sueldos;		$d12=input2(button,'','',$_POST[t_s],'background: #FDFD96;');
	$i13=ISR;			$d13=input2(button,'','',$_POST[t_i],'background: #FDFD96;');
	$i14=Abonos;		$d14=input2(button,'','',$_POST[t_ab],'background: #FDFD96;');
	$i15=Arrastrado;	$d15=input2(button,'','',$_POST[t_ac],'background: #FDFD96;');
	include("tablero.php");	
}
print "$conte </table>
</div>";

//-------------------------------------------------------------
$total1=	presenta2 (hidden_fe	,'1TEXT_C','1TEXT',$type);
$total2=	presenta2 (hidden_v		,'2TEXT_C','2TEXT',$type);
$total3=	presenta2 (hidden_d		,'3TEXT_C','3TEXT',$type);
$total4=	presenta2 (hidden_c		,'4TEXT_C','4TEXT',$type);
$total4_via=presenta2 (hidden_c_via	,'4TEXT_C_VIA','4TEXT_VIA',$type);
$total5=	presenta2 (hidden_f		,'5TEXT_C','5TEXT',$type);
$total6=	presenta2 (hidden_r		,'6TEXT_C','6TEXT',$type);
$total7=	presenta2 (hidden_g		,'7TEXT_C','7TEXT',$type);
$total8=	presenta2 (hidden_m		,'8TEXT_C','8TEXT',$type);
$total9=	presenta2 (hidden_ab	,'ab_Com','ab',$type);
$total10=	presenta2 (hidden_ac	,'ID_ac','ac',$type);
//-------------------------------------------------------------
print input2($type,comi,'',$_POST[comi]);
print input2($type,presio_d,'',$_POST[presio_d]);
print input2($type,hidden_fe,'',$_POST[hidden_fe]);
print input2($type,hidden_v,'',$_POST[hidden_v]);
print input2($type,hidden_d,'',$_POST[hidden_d]);
print input2($type,hidden_c,'',$_POST[hidden_c]);
print input2($type,hidden_c_viav,$_POST[hidden_c_via]);
print input2($type,hidden_f,'',$_POST[hidden_f]);
print input2($type,hidden_r,'',$_POST[hidden_r]);
print input2($type,hidden_g,'',$_POST[hidden_g]);
print input2($type,hidden_m,'',$_POST[hidden_m]);
print input2($type,hidden_c,'',$_POST[hidden_c]);
print input2($type,hidden_ab,'',$_POST[hidden_ab]);
print input2($type,hidden_ac,'',$_POST[hidden_ac]);
print input2($type,hidden_ac_a,'',$_POST[hidden_ac_a]);
?>