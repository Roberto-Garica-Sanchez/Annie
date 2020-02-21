<?php
$menu='menu-list';
$listn1='';
$listn2=Cuenta;
$listn3=Flete;
$listn4=Viaticos;
$listn5=Diesel;
$listn6=Casetas;
$listn7=Facturas;
$listn8="R Y R";
$listn9=Guias;
$listn10=Maniobras;
$listn11='';
$type=hidden;
$type2=text;
$style="top: 250px;";
include('lista.php');
include('libre_nue.php');

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

//Fletes
echo input($type,comi,$_POST[comi],'Porcentaje de comicion del chofer con relacion de el flete');
if($_POST['menu-list']==$listn3){
    $style="position: absolute; left: 110px; top: 0px; background: rgba(0, 0, 0, 0.77) none repeat scroll 0% 0%; color: white;";
    $d=input(text,comi,$_POST[comi]);
    $final="
    <tr bgcolor='#000'><td colspan='3'></td></tr>
    <tr><td></td><td>Comicion %</td><td>$d</td><tr>";
    presenta3($type2 ,hidden_fe,'1TEXT_C','1TEXT',$total1,total1,$type,$hidden_fe,$style,Fletes,'#000',Cliente,Valor,$final);
}
//Viaticos
if($_POST['menu-list']==$listn4){
    $style="position: absolute; left: 110px; top: 0px; background: rgba(0, 0, 0, 0.77) none repeat scroll 0% 0%; color: white;";
    presenta3($type2 ,hidden_v,'2TEXT_C','2TEXT',$total2,total2,$type,$hidden_v,$style,Viaticos,'#000','',Cantidad);
}

//Diesel
echo input($type,presio_d,$_POST[presio_d]);
if($_POST['menu-list']==$listn5){
    $t_l=round($total3/$_POST[presio_d],2);
	$km_l=round($km_t/$t_l,2);
	$d=input($stype2,presio_d,$_POST[presio_d]);
    $final="
      <tr bgcolor='#000'>                <td colspan='3'></td></tr><tr>
      <tr><td></td><td>Recorido      </td><td>$km_t  </td></tr>
      <tr><td></td><td>Presio Diesel     </td><td>$d     </td></tr>
      <tr><td></td><td>Total De Litros   </td><td>$t_l   </td></tr>
      <tr><td></td><td>K * L             </td><td>$km_l  </td></tr>
    ";
    $style="position: absolute; left: 110px; top: 0px; background: rgba(0, 0, 0, 0.77) none repeat scroll 0% 0%; color: white;";
    presenta3($type2 ,hidden_d,'3TEXT_C','3TEXT',$total3,total3,$type,$hidden_d,$style,Diesel,'#000',Gasolinera,'Cantidad $',$final);
}
//Casetas
if($_POST['menu-list']==$listn6){
    $style="position: absolute; left: 110px; top: 0px; background: rgba(0, 0, 0, 0.77) none repeat scroll 0% 0%; color: white;";
    presenta3($type2,hidden_c,'4TEXT_C','4TEXT',$total4,total4,$type,$hidden_c,$style,Casetas,'#000');
    $style="position: absolute; left: 350px; top: 0px; background: rgba(0, 0, 0, 0.77) none repeat scroll 0% 0%; color: white;";
    presenta3($type2,hidden_c_via,'4TEXT_C_VIA','4TEXT_VIA',$total4_via,total4_VIA,$type,$hidden_c_via,$style,'Via-Pass','#000');
}
if($_POST['menu-list']==$listn7){
    $style="position: absolute; left: 110px; top: 0px; background: rgba(0, 0, 0, 0.77) none repeat scroll 0% 0%; color: white;";
    presenta3($type2,hidden_f,'5TEXT_C','5TEXT',$total5,total5,$type,$hidden_f,$style,Facturas,'#000',RFC,Valor);
}
if($_POST['menu-list']==$listn8){
    $style="position: absolute; left: 110px; top: 0px; background: rgba(0, 0, 0, 0.77) none repeat scroll 0% 0%; color: white;";
    presenta3($type2,hidden_r,'6TEXT_C','6TEXT',$total6,total6,$type,$hidden_r,$style,Reparaciones,'#000');
}
if($_POST['menu-list']==$listn9){
    $style="position: absolute; left: 110px; top: 0px; background: rgba(0, 0, 0, 0.77) none repeat scroll 0% 0%; color: white;";
    presenta3($type2,hidden_g,'7TEXT_C','7TEXT',$total7,total7,$type,$hidden_g,$style,Guias,'#000',Nombre,Costo);
}
if($_POST['menu-list']==$listn10){
    $style="position: absolute; left: 110px; top: 0px; background: rgba(0, 0, 0, 0.77) none repeat scroll 0% 0%; color: white;";
    presenta3($type2,hidden_m,'8TEXT_C','8TEXT',$total8,total8,$type,$hidden_m,$style,Maniobras,'#000',Operaciones,Costo);
}
if($dif1<0)		{$sd5='pink'; $ld5='red';}else 		 {$sd5='Greenyellow'; 	 $ld5='green';}
if($dif2<0)		{$sd9='pink'; $ld9='red';}else 		 {$sd9='Greenyellow'; 	 $ld9='green';}
if($n_c<10)		{$sd13='pink'; $ld13='red';}else 	 {$sd13='Greenyellow'; 	 $ld13='green';}
if($re<30)		{$sd14='pink'; $ld14='red';}else 	 {$sd14='Greenyellow'; 	 $ld14='green';}
if($dif1<0)	    {$indf16='pink'; $indc16='red';}else {$indf16='Greenyellow'; $indc16='green';}
if($total10<0)	{$indf17='pink'; $indc17='red';}else {$indf17='Greenyellow'; $indc17='green';}
if($pre_d<0)	{$indf18='pink'; $indc18='red';}else {$indf18='Greenyellow'; $indc18='green';}
if($total9<0)	{$indf19='pink'; $indc19='red';}else {$indf19='Greenyellow'; $indc19='green';}
if($dif4<0)	    {$indf20='pink'; $indc20='red';}else {$indf20='Greenyellow'; $indc20='green';}

if($_POST['menu-list']==$listn2){
$size=0;
$title1="Gastos sin Chofer";
$style="position: absolute; left: 387px; top: 0px; color: white;";
$ts="background: black;";
$i1=Casetas;		$d1=input(button,'',$total4,'','background: #FDFD96;');
$i2=Facturas;		$d2=input(button,'',$total5,'','background: #FDFD96;');
$i3=RyR;			$d3=input(button,'',$total6,'','background: #FDFD96;');
$i4=Guia;			$d4=input(button,'',$total7,'','background: #FDFD96;');
$i5=Maniobras;		$d5=input(button,'',$total8,'','background: #FDFD96;');
$i6='';				$d6='';				$tc6='#989898';
/*$i7='Sin. Cho.';*/$d7=input(button,'',$g_t   ,'','background: orangered;');
$i8=Viaticos;		$d8=input(button,'',$total2,'','background: yellowgreen;');
$i9='';				$d9='';				$tc9='#989898';
$i10='';			$d10=input(button,'',$dif2 ,'',"background: $sd9; color: $ld9;");
$i11='';			$d11='';			$tc11=white;
$i12=Flete;			$d12=input(button,'',$_POST[flete_r],'','background: aqua;');
$i13='';			$d13='';			$tc13='#989898';
$i14=Chofer;		$d14=input(button,'',$c    ,'','background: #FDFD96;');
$i15=Diesel;		$d15=input(button,'',$total3,'','background: #FDFD96;');
$i16=Comisiones;	$d16=input(button,'',$comi,'','background: #FDFD96;');
$i17='';			$d17='';			$tc17='#989898';
$i18='';			$d18=input(button,'',$t_d_g,'','background: orangered;');
$i19=Neto;			$d19=input(button,'',$n_c  ,'',"background: $sd13; color: $ld13;");
include("tablero.php");
//---------------------------------------------------------------
$size=0;
$title1='Gastos con Chofer';
$style="position: absolute; left: 100px; top: 0px; color: white;";
$ts="background: black;";
$i1=Casetas;		$d1=input(button,'',$total4,'','background: #FDFD96;');
$i2=Facturas;		$d2=input(button,'',$total5,'','background: #FDFD96;');
$i3=RyR;			$d3=input(button,'',$total6,'','background: #FDFD96;');
$i4=Guia;			$d4=input(button,'',$total7,'','background: #FDFD96;');
$i5=Maniobras;		$d5=input(button,'',$total8,'','background: #FDFD96;');
$i6='';				$d6='';				$tc6='#989898';
/*$i7='Gastos T.';*/$d7=input(button,'',$g_t   ,'','background: orange;');
$i8=Chofer;			$d8=input(button,'',$c	   ,'','background: orange;');
$i9='';				$d9='';				$tc9='#989898';
$i10='';			$d10=input(button,'',$t_g  ,'','background: orangered;');
$i11=Viaticos;		$d11=input(button,'',$total2,'','background: yellowgreen;');
$i12='';			$d12='';			$tc12='#989898';
$i13='';			$d13=input(button,'',$dif1 ,'',"background: $sd5; color: $ld5;");
include("tablero.php");		
}
//----------------------------------------------------------------
print input($type,hidden_fe,$_POST[hidden_fe]);
print input($type,hidden_v,$_POST[hidden_v]);
print input($type,hidden_d,$_POST[hidden_d]);
print input($type,hidden_c,$_POST[hidden_c]);
print input($type,hidden_c_via,$_POST[hidden_c_via]);
print input($type,hidden_f,$_POST[hidden_f]);
print input($type,hidden_r,$_POST[hidden_r]);
print input($type,hidden_g,$_POST[hidden_g]);
print input($type,hidden_m,$_POST[hidden_m]);
print input($type,hidden_c,$_POST[hidden_c]);
print input($type,hidden_ab,$_POST[hidden_ab]);
print input($type,hidden_ac,$_POST[hidden_ac]);
print input($type,hidden_ac_a,$_POST[hidden_ac_a]);
//------------------------------------------------------
$c1=compro($_POST[Carta1],ID_G,'',$consu5,$conexion);
$c2=compro($_POST[Carta2],ID_G,'',$consu5,$conexion);
$c3=compro($_POST[Carta3],ID_G,'',$consu5,$conexion);
$c4=compro($_POST[Carta4],ID_G,'',$consu5,$conexion);
$n=compro($_POST[chofer],Nombre_Ch,ulti_viaje,$consu1_2,$conexion);
$fec_ini=$_POST[A].zero($_POST[M]).zero($_POST[D]);
$fec_fin=$_POST[A_r].zero($_POST[M_r]).zero($_POST[D_r]);
$grava=1;
IF ($_POST[Carta1]<>'')			{if ($c1==1){$grava=0;	$dc1=pink;$indc1=red;}	if ($c1==0){	$dc1=yellowgreen;}}
IF ($_POST[Carta2]<>'')			{if ($c2==1){$grava=0;	$dc2=pink;$indc2=red;}	if ($c2==0){	$dc2=yellowgreen;}}
IF ($_POST[Carta3]<>'')			{if ($c3==1){$grava=0;	$dc3=pink;$indc3=red;}	if ($c3==0){	$dc3=yellowgreen;}}
IF ($_POST[Carta4]<>'')			{if ($c4==1){$grava=0;	$dc4=pink;$indc4=red;}	if ($c4==0){	$dc4=yellowgreen;}}
IF ($_POST[chofer]<>chofer)		{$dc5=yellowgreen;}		else{$grava=0;}
IF ($_POST[placas]<>placas)		{$dc6=yellowgreen;}		else{$grava=0;}
IF ($_POST[cliente]<>cliente)	{$dc7=yellowgreen;}		else{$grava=0;}
IF ($_POST[flete_r]<>'')		{$dc10=yellowgreen;}	
IF ($fec_ini<$fec_fin)			{$dc8=$dc9=yellowgreen;}
IF ($fec_ini>$fec_fin)			{$dc8=$dc9=pink;			$grava=0;}
IF ((20150101==$fec_fin)and(20150101==$fec_fin))	{$dc8=$dc9=pink;			$grava=0;}
IF ($_POST[km_i]<>'')			{$dc11=yellowgreen;}	else{$grava=0;}
IF ($_POST[km_f]<>'')			{$dc12=yellowgreen;}	else{$grava=0;}
IF ($_POST[km_i]>$_POST[km_f])	{$dc11=$dc12=pink;$grava=0;} 

$size=0;
$style="background: rgba(5, 72, 108, 0.67) none repeat scroll 0% 0%; width: auto; width: 220px; left: -1px; color: white;";
$title='Nueva Cuenta';
$i1=1;                  $d1=input(text,Carta1,$_POST[Carta1],'',"color: $indc1;",'maxlength="4"');
$i2=2;                  $d2=input(text,Carta2,$_POST[Carta2],'',"color: $indc2;",'maxlength="4"');
$i3=3;                  $d3=input(text,Carta3,$_POST[Carta3],'',"color: $indc3;",'maxlength="4"');
$i4=4;                  $d4=input(text,Carta4,$_POST[Carta4],'',"color: $indc4;",'maxlength="4"');
$i5=Chofer;             $d5=despliegre_mysql(chofer,Chofer,$consu1,Nombre_Ch);
$i6=Placas;             $d6=despliegre_mysql(placas,Placas,$consu2,Placas);
$i7=Cliente;            $d7=despliegre_mysql(cliente,Clientes,$consu3,Nombre_Cl);
$i8=Salida;             $d8=despieges(D,Dia,1,31).despieges(M,Mes,1,12).despieges(A,Año,2015,2030);
$i9=Llegada;            $d9=despieges(D_r,Dia,1,31).despieges(M_r,Mes,1,12).despieges(A_r,Año,2015,2030);
$i10='Flete R.';        $d10=input(text,flete_r,$_POST[flete_r],'','','maxlength="10"');
$i11="Kms inicio";      $d11=input(text,km_i,$_POST[km_i],'','','maxlength="10"');
$i12="Kms fin";         $d12=input(text,km_f,$_POST[km_f],'','','');
$i13="N° Cuenta";       $d13=input(button,n_c,$_POST[n_c]).input(hidden,n_c,$n+1);
$i14=Cometa;            $d14="<TEXTAREA class='Medio' id='comenta' maxleght='200' title='comentario general de el viaje' name='come'>$_POST[come]</TEXTAREA>";
$d15=date("d/m/Y");
if($c1==1)$d16=input(submit,accion,MODIFICAR);
$d17=input(submit,accion,LIMPIA);
IF ($grava==1)$d20=input(submit,Grava,Guardar,'','','');
IF ($grava==0)$d20="Verifique <br> marcadas en Rosa";
$tabla=folio;$n_id=ID_G;$id=$_POST[Carta1];
$n1=CHOFER;		$v1=$_POST[chofer];	$n2=PLACAS;		$v2=$_POST[placas];	$n3=CLIENTE;	$v3=$_POST[cliente];
$n4=Revisado;	$v4=0;				$n5=Descripcion;$v5=$_POST[come];	$n6=Difer_1;	$v6=$dif1;
$n7=Carta1;		$v7=$_POST[Carta1];	$n8=Carta2;		$v8=$_POST[Carta2];	$n9=Carta3;		$v9=$_POST[Carta3];
$n11=Carta4;	$v11=$_POST[Carta4];$n12=N_Cuenta;	$v12=$n+1; 
$n13=sueldo;	$v13=$c;			$n14=isr;		$v14=$rete; 
include('espe_tab.php');
IF (($grava==1)&&($_POST[Grava]==Guardar)){
	MYSQL_QUERY($res,$conexion)or die("Error <br>$res");
	modifica(choferes_on);
	$d20='Guardado Con Exito';
}
include("tablero.php");
//----------------------------------------------------------
$size=0;
$style="background: rgba(0, 0, 0, 0.77) none repeat scroll 0% 0%; width: auto; color: white;";
$ts="background: black;";
$title1='Generales';
$i1="Gastos T.";   	$d1=input(button,'',$t_g,"Casetas[$total4] + Facturas[$total5] + RYR[$total6] + Guias[$total7] + Maniobras[$total8] =$g_t",'background: #FDFD96; color: black;');
$i2=Chofer;			$d2=input(button,'',$c,"Flete[$total1] * 0.15= $c ",'background: #FDFD96; color: black;');
$i3=ISR;			$d3=input(button,'',$rete,"(Chofer[$c] * 7.5)/100 = $rete ",'background: orange; color: black;');
$i4=Viaticos;		$d4=input(button,'',$total2,'','background: greenyellow; color: black;');
$i5='';				$d5=input(button,'',$dif1,"Viaticos[$total2] + Retencion[$rete] -Gasto T.[$g_t] = $dife1 ","background: $sd5; color: $ld5;");
$tc6='#989898';			$i6='';			$d6='';
$i7='Sin. Cho.';	$d7=input(button,'',$t_g,"Casetas[$total4] + Facturas[$total5] + RYR[$total6] + Guias[$total7] + Maniobras[$total8] =$g_t",'background: #FDFD96; color: black; ');
$i8=Viaticos;		$d8=input(button,'',$total2,'','background: greenyellow; color: black;');
$i9='';				$d9=input(button,'',$dif2,"Viaticos[$total2] -Gasto T.[$g_t] = $dife2 ","background: $sd9; color: $ld9;");
$tc10='#989898';			$i10='';		$d10='';
$i11=Flete;			$d11=input(button,'',$_POST[flete_r],'','background: aqua;');
$i12='Total G.';	$d12=input(button,'',$t_d_g,"Diesel[$total3] +Gasto T.[$t_g] + Comision[$comi] = $t_d_g ","background: orange; color: black;");
$i13='Neto Carro';	$d13=input(button,'',$n_c,"Neto Camion[$n_c] / (fletes[$flete_r] * 0.01) = $re ","background: $sd14; color: $ld14;");
$i14=Rendimiento;	$d14=input(button,'',$re,"Neto Camion[$n_c] / (fletes[$flete_r] * 0.01) = $re ","background: $sd14; color: $ld14;");
$i15='Cuentas';		$d15='';	$tc15='#000';
$i16='Actual';		$d16=input(button,'',$dif1,"Viaticos[$total2] + Retencion[$rete] -Gasto T.[$g_t] = $dife1","background: $indf16; color: $indc16;");
$i17='Arrastado';	$d17=input(button,'',$total10,"Suma de todas las Cuentas Arastradas","background: $indf17; color: $indc17;");
$i18='';			$d18=input(button,'',$dif3,"Actual[$dif1] + Arrastrada[$dif4]","background: $indf18; color: $indc18;");
$i19=Abonos;		$d19=input (button,'',$total9,"Suma de los abonos de esta cuenta","background: $indf19; color: $indc19;");
$i20=Total;			$d20=input(button,'',$dif4,'',"background: $indf20; color: $indc20;");
include('tablero.php');
echo"<div style='top: 0px; position: absolute;width: 100px; height: 220px; color: white; background: rgba(34, 34, 34, 0.77) none repeat scroll 0% 0%; overflow: auto; overflow-x: auto;'>";
	//-----------------------------------------------------------
	$tabla=km;$n_id=ID_G;$id=$_POST[Carta1];
	$n1=KM_S;		$v1=$_POST[km_i];	$n2=KM_E;		$v2=$_POST[km_f];	  
	include('espe_tab.php');
	IF (($grava==1)&&($_POST[Grava]==Guardar)){MYSQL_QUERY($res,$conexion)or die("Error <br>$res");}
	//-----------------------------------------------------------
	$tabla=fechas;$n_id=ID_G;$id=$_POST[Carta1];
	$n1=D;	$v1=$_POST[D];	$n2=M;	$v2=$_POST[M];	$n3=A;	$v3=$_POST[A];
	$n4=D_r;$v4=$_POST[D_r];$n5=M_r;$v5=$_POST[M_r];$n6=A_r;$v6=$_POST[A_r];
	$n7=D_c;$v7=date("d");	$n8=M_c;$v8=date("m");	$n9=A_c;$v9=date("Y");
	include('espe_tab.php');
	IF (($grava==1)&&($_POST[Grava]==Guardar)){MYSQL_QUERY($res,$conexion)or die("Error <br>$res");}
	//-------------------------------------------- ---------------
	$tabla=fletes;$na1="1TEXT";$va1="1TEXT";$n_id="ID_G";$id=Carta1;$repit1=$_POST[hidden_fe];$n1=Flete_R;$v1=$_POST[flete_r];$n2=comi_ass;$v2=$_POST[comi];$n3=HIDE1;$v3=$_POST[hidden_fe];$n4=TOTAL1;$v4=$total1;
	include('auto_tab.php');
	IF (($grava==1)&&($_POST[Grava]==Guardar)){MYSQL_QUERY($res,$conexion)or die("Error <br>$res");}
	//----------------------------------------------------------
	$tabla=viaticos;$na1="2TEXT";$va1="2TEXT";$n_id="ID_G";$id=Carta1;$repit1=$_POST[hidden_v];$n1=HIDE2;$v1=$_POST[hidden_v];$n2=TOTAL2;$v2=$total2;
	include('auto_tab.php');
	IF (($grava==1)&&($_POST[Grava]==Guardar)){MYSQL_QUERY($res,$conexion)or die("Error <br>$res");}
	//----------------------------------------------------------
	$tabla=disel;	$na1="3TEXT";$va1="3TEXT";$n_id="ID_G";$id=Carta1;$repit1=$_POST[hidden_d];$n1=presio_d;$v1=$_POST[presio_d];$n2=HIDE3;$v2=$_POST[hidden_d];$n3=TOTAL3;$v3=$total3;
	include('auto_tab.php');
	IF (($grava==1)&&($_POST[Grava]==Guardar)){MYSQL_QUERY($res,$conexion)or die("Error <br>$res");}
	//---------------------------------------------------------
	$tabla=casetas;	$na1="4TEXT";$va1="4TEXT";$n_id="ID_G";$id=Carta1;$repit1=$_POST[hidden_c];$n1=HIDE4;$v1=$_POST[hidden_c];$n2=TOTAL4;$v2=$total4;
	include('auto_tab.php');
	IF (($grava==1)&&($_POST[Grava]==Guardar)){MYSQL_QUERY($res,$conexion)or die("Error <br>$res");}
	//---------------------------------------------------------
	$tabla=casetas_via;$na1="TEXT";$va1="4TEXT_VIA";
	$n_id="ID_G";$id=Carta1;$repit1=$_POST[hidden_c_via];$n1=TOTAL;$v1=$total4_via; $n2=HIDE;	$v2=$_POST[hidden_c_via];
	include('auto_tab.php');
	IF (($grava==1)&&($_POST[Grava]==Guardar)){MYSQL_QUERY($res,$conexion)or die("Error <br>$res");}
	//----------------------------------------------------------
	$tabla=facturas;$na1="5TEXT";$va1="5TEXT";$n_id="ID_G";$id=Carta1;$repit1=$_POST[hidden_f];$n1=HIDE5;$v1=$_POST[hidden_f];$n2=TOTAL5;$v2=$total5;
	include('auto_tab.php');
	IF (($grava==1)&&($_POST[Grava]==Guardar)){MYSQL_QUERY($res,$conexion)or die("Error <br>$res");}
	//----------------------------------------------------------
	$tabla=ryr;	$na1="6TEXT";$va1="6TEXT";$n_id="ID_G";$id=Carta1;$repit1=$_POST[hidden_r];$n1=HIDE6;$v1=$_POST[hidden_r];$n2=TOTAL6;$v2=$total6;
	include('auto_tab.php');
	IF (($grava==1)&&($_POST[Grava]==Guardar)){MYSQL_QUERY($res,$conexion)or die("Error <br>$res");}
	//----------------------------------------------------------
	$tabla=guias;$na1="7TEXT";$va1="7TEXT";$n_id="ID_G";$id=Carta1;$repit1=$_POST[hidden_g];$n1=HIDE7;$v1=$_POST[hidden_g];$n2=TOTAL7;$v2=$total7;
	include('auto_tab.php');
	IF (($grava==1)&&($_POST[Grava]==Guardar)){MYSQL_QUERY($res,$conexion)or die("Error <br>$res");}
	//----------------------------------------------------------
	$tabla=maniobras;$na1="8TEXT";$va1="8TEXT";$n_id="ID_G";$id=Carta1;$repit1=$_POST[hidden_m];$n1=HIDE8;$v1=$_POST[hidden_m];$n2=TOTAL8;$v2=$total8;
	include('auto_tab.php');
	IF (($grava==1)&&($_POST[Grava]==Guardar)){MYSQL_QUERY($res,$conexion)or die("Error <br>$res");}
	//----------------------------------------------------------


	$tabla=fletes_c;	$na1="1TEXT";$va1="1TEXT_C";$repit1=$_POST[hidden_fe];$n_id="ID_G";$id=Carta1;
	include('auto_tab.php');
	IF (($grava==1)&&($_POST[Grava]==Guardar)){MYSQL_QUERY($res,$conexion)or die("Error <br>$res");}
	//-----------------------------------------------------------
	$tabla=viaticos_c;	$na1="2TEXT";$va1="2TEXT_C";$repit1=$_POST[hidden_v];$n_id="ID_G";$id=Carta1;
	include('auto_tab.php');
	IF (($grava==1)&&($_POST[Grava]==Guardar)){MYSQL_QUERY($res,$conexion)or die("Error <br>$res");}
	//----------------------------------------------------------
	$tabla=disel_c;		$na1="3TEXT";$va1="3TEXT_C";$repit1=$_POST[hidden_d];$n_id="ID_G";$id=Carta1;
	include('auto_tab.php');
	IF (($grava==1)&&($_POST[Grava]==Guardar)){MYSQL_QUERY($res,$conexion)or die("Error <br>$res");}
	//----------------------------------------------------------
	$tabla=casetas_c_via;$na1="TEXT";$va1="4TEXT_C_VIA";
	$n_id="ID_G";$id=Carta1;$repit1=$_POST[hidden_c_via];
	include('auto_tab.php');
	IF (($grava==1)&&($_POST[Grava]==Guardar)){MYSQL_QUERY($res,$conexion)or die("Error <br>$res");}
	//----------------------------------------------------------
	$tabla=casetas_c;	$na1="4TEXT";$va1="4TEXT_C";$repit1=$_POST[hidden_c];$n_id="ID_G";$id=Carta1;
	include('auto_tab.php');
	IF (($grava==1)&&($_POST[Grava]==Guardar)){MYSQL_QUERY($res,$conexion)or die("Error <br>$res");}
	//----------------------------------------------------------
	$tabla=facturas_c;	$na1="5TEXT";$va1="5TEXT_C";$repit1=$_POST[hidden_f];$n_id="ID_G";$id=Carta1;
	include('auto_tab.php');
	IF (($grava==1)&&($_POST[Grava]==Guardar)){MYSQL_QUERY($res,$conexion)or die("Error <br>$res");}
	//----------------------------------------------------------
	$tabla=ryr_c;		$na1="6TEXT";$va1="6TEXT_C";$repit1=$_POST[hidden_r];$n_id="ID_G";$id=Carta1;
	include('auto_tab.php');
	IF (($grava==1)&&($_POST[Grava]==Guardar)){MYSQL_QUERY($res,$conexion)or die("Error <br>$res");}
	//----------------------------------------------------------
	$tabla=guias_c;		$na1="7TEXT";$va1="7TEXT_C";$repit1=$_POST[hidden_g];$n_id="ID_G";$id=Carta1;
	include('auto_tab.php');
	IF (($grava==1)&&($_POST[Grava]==Guardar)){MYSQL_QUERY($res,$conexion)or die("Error <br>$res");}
	//----------------------------------------------------------
	$tabla=maniobras_c;	$na1="8TEXT";$va1="8TEXT_C";$repit1=$_POST[hidden_m];$n_id="ID_G";$id=Carta1;
	include('auto_tab.php');
	IF (($grava==1)&&($_POST[Grava]==Guardar)){MYSQL_QUERY($res,$conexion)or die("Error <br>$res");}
	//----------------------------------------------------------
	$tabla=abo_acu;
	$na1=ID_ac;	$va1=ID_ac;	$repit1=$_POST[hidden_ac];
	$na2=ac;	$va2=ac;	$repit2=$_POST[hidden_ac];
	$na3=ab;	$va3=ab;	$repit3=$_POST[hidden_ab];
	$na4=ab_Com;$va4=ab_Com;$repit4=$_POST[hidden_ab];

	$n_id="ID_G";	$id=Carta1;
	$n1=Hide_ac;	$v1=$_POST[hidden_ac];
	$n2=Hide_ab;	$v2=$_POST[hidden_ab];

	$n3=Totalac;	$v3=$total10;
	$n4=Totalab;	$v4=$total9;
	$n5=Total_Total;$v5=$dif4;
	$n6=rete;		$v6=$rete;
	include('auto_tab.php');
	IF (($grava==1)&&($_POST[Grava]==Guardar)){MYSQL_QUERY($res,$conexion)or die("Error <br>$res");}
echo"</div>";
//----------------------------------------------------------
?>
   