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
$style="top: 250px; width: 300px; height: 100px; ";
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
if ($type2==button){
$d=$d.input2(hidden,Carta1	,'',$_POST[Carta1]);
$d=$d.input2(hidden,Carta2	,'',$_POST[Carta2]);
$d=$d.input2(hidden,Carta3	,'',$_POST[Carta3]);
$d=$d.input2(hidden,Carta4	,'',$_POST[Carta3]);
$d=$d.input2(hidden,chofer	,'',$_POST[chofer]);
$d=$d.input2(hidden,placas	,'',$_POST[placas]);
$d=$d.input2(hidden,cliente	,'',$_POST[cliente]);
$d=$d.input2(hidden,D		,'',$_POST[D]);
$d=$d.input2(hidden,M		,'',$_POST[M]);
$d=$d.input2(hidden,A		,'',$_POST[A]);
$d=$d.input2(hidden,D_r		,'',$_POST[D_r]);
$d=$d.input2(hidden,M_r		,'',$_POST[M_r]);
$d=$d.input2(hidden,A_r		,'',$_POST[A_r]);
$d=$d.input2(hidden,flete_r	,'',$_POST[flete_r]);
$d=$d.input2(hidden,km_i	,'',$_POST[km_i]);
$d=$d.input2(hidden,km_f	,'',$_POST[km_f]);
$d=$d.input2(hidden,n_c		,'',$_POST[n_c]);
echo$d;
}

$g_t=$total4+$total5+$total6+$total7+$total8;	//casetas+facturas+ryr+guias+maniobras
$c=$total1*0.15;   								//comicion pre-definida (para chofer)
if($_POST[comi]<>'')$c=$total1*($_POST[comi]/100); //comicion variada	(para chofer)
$rete=($c*7.5)/100;								//Isr
$t_g=   round($g_t+$c,2);						//gatos_total+comision
$dif1=  round($total2-$t_g+$rete,2);			//viaticos-total_gastos+retencion
$dif2=  round($total2-$g_t,2);					//viaticos-gatos_total
$dif3=$dif1+$total10;							//dif1+ acumulado
$pre_d=$dif1+$total10;							// ??? esta mal ??? repetido con el anterior
$dif4=$pre_d+$total9;							//
$comi=  round($_POST[flete_r]*0.0928,2);		//Flete_Real * 0.0928
$t_d_g= round($total3+$t_g+$comi+$total4_via,2);//diesel+total_gatos+comision
$n_c=   round($_POST[flete_r]-$t_d_g,2);
$re=    round($_POST[flete_r]*0.01,2);
$re=    round($n_c/$re,2);
$km_t=	round($_POST[km_f]-$_POST[km_i],2);
//--------------------------------


echo input2($type,'Porcentaje de comicion del chofer con relacion de el flete',comi,$_POST[comi]);
if($_POST['menu-list']==$listn3){//Fletes
    $d=input2(text,'',comi,$_POST[comi]);
    $final="
    <tr bgcolor='#000'><td colspan='3'></td></tr>
    <tr><td></td><td>Comicion %</td><td>$d</td><tr>";
    $id='';							$style="position: absolute; left: 100px; top: 0px; background: rgba(0, 0, 0, 0.77) none repeat scroll 0% 0%; color: white;";
	$style_t="background: black";	$title=Fletes;
	$col1=Fecha;					$col2=Valor;
	$repite=$_POST[hidden_fe];		$limite=$hidden_fe;
	$t1=$type2;						$t2=$type2;
	$name1='1TEXT_C';				$name2='1TEXT';			$name3=total2;
	$max1=200;		$max2=10;
	include("presenta3.php");
	$_POST[hidden_fe]=$res;
}
if($_POST['menu-list']==$listn4){//Viaticos
    $id='';							$style="position: absolute; left: 100px; top: 0px; background: rgba(0, 0, 0, 0.77) none repeat scroll 0% 0%; color: white;";
	$style_t="background: black";	$title=Viaticos;
	$col1=Fecha;					$col2=Cantida;
	$repite=$_POST[hidden_v];		$limite=$hidden_v;
	$t1=$type2;						$t2=$type2;
	$name1='2TEXT_C';				$name2='2TEXT';			$name3=total2;
	$max1=200;		$max2=10;
	include("presenta3.php");
	$_POST[hidden_v]=$res;
}
echo input2($type,'',presio_d,$_POST[presio_d]);
if($_POST['menu-list']==$listn5){//Diesel
    $t_l=round($total3/$_POST[presio_d],2);
	$km_l=round($km_t/$t_l,2);
	$d=input2(hidden,presio_d,'',$_POST[presio_d]).input2($type2,presio_d,'',$_POST[presio_d]);
    $final="
      <tr bgcolor='#000'>                <td colspan='3'></td></tr><tr>
      <tr><td></td><td>Recorido      </td><td>$km_t  </td></tr>
      <tr><td></td><td>Presio Diesel     </td><td>$d     </td></tr>
      <tr><td></td><td>Total De Litros   </td><td>$t_l   </td></tr>
      <tr><td></td><td>K * L             </td><td>$km_l  </td></tr>
    ";
	$id='';							$style="position: absolute; left: 100px; top: 0px; background: rgba(0, 0, 0, 0.77) none repeat scroll 0% 0%; color: white;";
	$style_t="background: black";	$title=Diesel;
	$col1=RFC;						$col2=Costo;
	$repite=$_POST[hidden_d];		$limite=$hidden_d;
	$t1=$type2;						$t2=$type2;
	$name1='3TEXT_C';				$name2='3TEXT';			$name3=total3;
	$max1=200;		$max2=10;
	include("presenta3.php");
	$_POST[hidden_d]=$res;
}

IF ($_POST[select]=='')$_POST[select]=Casetas;
echo input2(hidden,select,'',$_POST[select]);
if($_POST['menu-list']==$listn6){//Casetas
	$id='';							$style="position: absolute; left: 100px; top: 0px; background: rgba(0, 0, 0, 0.77) none repeat scroll 0% 0%; color: white;";
	$style_t="background: black";	$title=Casetas;
	$col1=Nombre;					$col2=Costo;
	$repite=$_POST[hidden_c];		$limite=$hidden_c;
	$t1=$type2;						$t2=$type2;
	$d1=casetas;					$d2=casetas_via;
	$name1='4TEXT_C';				$name2='4TEXT';			$name3=total4;
	$max1=200;		$max2=10;
	if ($_POST[select]=='Via Pass'){
		$title=input2(submit,select,'',Casetas,'','width: 70px;');
		$t0=hidden;		$t1=hidden;	$t2=hidden;
	}
	include("presenta3.php");
	$_POST[hidden_c]=$res;
	//-----------------------	
	$id='';							$style="position: absolute; left: 346px; top: 0px; background: rgba(0, 0, 0, 0.77) none repeat scroll 0% 0%; color: white;";
	$style_t="background: black";	$title='Casetas Via Pass';
	$col1=Nombre;					$col2=Costo;
	$repite=$_POST[hidden_c_via];	$limite=$hidden_c_via;
	$t1=$type2;						$t2=$type2;
	$name1='4TEXT_C_VIA';			$name2='4TEXT_VIA';			$name3=total4_VIA;
	$max1=200;		$max2=10;
	if ($_POST[select]==Casetas){
		$title=input2(submit,select,'','Via Pass','','width: 250px;');
		$t0=hidden;		$t1=hidden;	$t2=hidden;
	}
	include("presenta3.php");
	$_POST[hidden_c_via]=$res;
}
if($_POST['menu-list']==$listn7){//facturas
    $id='';							$style="position: absolute; left: 110px; top: 0px; background: rgba(0, 0, 0, 0.77) none repeat scroll 0% 0%; color: white;";
	$style_t="background: black";	$title=Facturas;
	$col1=RFC;						$col2=Importe;
	$repite=$_POST[hidden_f];		$limite=$hidden_f;
	$t1=$type2;						$t2=$type2;
	$name1='5TEXT_C';				$name2='5TEXT';			$name3=total5;
	$max1=200;		$max2=10;
	include("presenta3.php");
	$_POST[hidden_f]=$res;
}
if($_POST['menu-list']==$listn8){//r y r
    $id='';							$style="position: absolute; left: 110px; top: 0px; background: rgba(0, 0, 0, 0.77) none repeat scroll 0% 0%; color: white;";
	$style_t="background: black";	$title='R y R';
	$col1=Producto;					$col2=Costo;
	$repite=$_POST[hidden_r];		$limite=$hidden_r;
	$t1=$type2;						$t2=$type2;
	$name1='6TEXT_C';				$name2='6TEXT';			$name3=total6;
	$max1=200;		$max2=10;
	include("presenta3.php");
	$_POST[hidden_r]=$res;
}
if($_POST['menu-list']==$listn9){//guias
    $id='';							$style="position: absolute; left: 110px; top: 0px; background: rgba(0, 0, 0, 0.77) none repeat scroll 0% 0%; color: white;";
	$style_t="background: black";	$title=Guais;
	$col1=Nombre;					$col2=Cobro;
	$repite=$_POST[hidden_g];		$limite=$hidden_g;
	$t1=$type2;						$t2=$type2;
	$name1='7TEXT_C';				$name2='7TEXT';			$name3=total7;
	$max1=200;		$max2=10;
	include("presenta3.php");
	$_POST[hidden_g]=$res;
}
if($_POST['menu-list']==$listn10){//maniobras
   	$id='';							$style="position: absolute; left: 110px; top: 0px; background: rgba(0, 0, 0, 0.77) none repeat scroll 0% 0%; color: white;";
	$style_t="background: black";	$title=Maniobras;
	$col1='';						$col2=Costo;
	$repite=$_POST[hidden_m];		$limite=$hidden_m;
	$t1=$type2;						$t2=$type2;
	$name1='8TEXT_C';				$name2='8TEXT';			$name3=total8;
	$max1=200;		$max2=10;
	include("presenta3.php");
	$_POST[hidden_m]=$res;
}

//----------------------------------------------------------------------------------
if($dif1<0)		{$sd5="pink"; $ld5='red';}			else{$sd5="greenyellow"; 	$ld5='green';}
if($dif2<0)		{$sd9="pink"; $ld9='red';}			else{$sd9="greenyellow"; 	$ld9='green';}
if($n_c<10)		{$sd13="pink"; $ld13='red';}		else{$sd13="greenyellow";  	$ld13='green';}
if($re<30)		{$sd14="pink"; $ld14='red';}		else{$sd14="greenyellow";  	$ld14='green';}
if($dif1<0)	    {$indf16="pink"; $indc16='red';}	else{$indf16="greenyellow"; $indc16='green';}
if($total10<0)	{$indf17="pink"; $indc17='red';}	else{$indf17="greenyellow"; $indc17='green';}
if($pre_d<0)	{$indf18="pink"; $indc18='red';}	else{$indf18="greenyellow"; $indc18='green';}
if($total9<0)	{$indf19="pink"; $indc19='red';}	else{$indf19="greenyellow"; $indc19='green';}
if($dif4<0)	    {$indf20="pink"; $indc20='red';}	else{$indf20="greenyellow"; $indc20='green';}

if($_POST['menu-list']==$listn2){
$size=0;
$title1="Gastos sin Chofer";
$style="position: absolute; left: 384px; top: 0px; color: white;";
$ts="background: black;";
$i1=Casetas;		$d1=input2(button,'','',$total4							,"background: #F9F970;");
$i2=Facturas;		$d2=input2(button,'','',$total5							,"background: #F9F970;");
$i3=RyR;			$d3=input2(button,'','',$total6							,"background: #F9F970;");
$i4=Guia;			$d4=input2(button,'','',$total7							,"background: #F9F970;");
$i5=Maniobras;		$d5=input2(button,'','',$total8							,"background: #F9F970;");
$i6='';				$d6='';									$tc6='#989898';
					$d7=input2(button,'','Gastos T.',$g_t					,"background: orangered;");
$i8=Viaticos;		$d8=input2(button,'','',$total2							,"background: greenyellow;");
$i9='';				$d9='';									$tc9='#989898';
$i10='';			$d10=input2(button,'','',$dif2 							,"background: $sd9; color: $ld9;");
$i11='';			$d11='';								$tc11=white;
$i12=Flete;			$d12=input2(button,'','',$_POST[flete_r]				,"background: aqua;");
$i13='';			$d13='';								$tc13='#989898';
$i14=Chofer;		$d14=input2(button,'','',$c								,"background: #F9F970;");
$i15=Diesel;		$d15=input2(button,'','',$total3						,"background: #F9F970;");
$i16=Comisiones;	$d16=input2(button,'','',$comi							,"background: #F9F970;;");
$i17='Via pass';	$d17=input2(button,'','',$total4_via					,"background: purple;");
$i18='';			$d18='';				$tc18='#989898';
$i19='';			$d19=input2(button,'',"+[$total4_via]Via Pass \n +[$total3]Diesel\n +[$t_g]Gasto T.\n +[$comi]Comision\n----------------\n =$t_d_g ",$t_d_g,"background: orangered;");
$i20=Neto;			$d20=input2(button,'','',$n_c  	,"background: $sd13; color: $ld13;");
include("tablero.php");
//---------------------------------------------------------------
$size=0;
$title1='Gastos con Chofer';
$style="position: absolute; left: 100px; top: 0px; color: white;";
$ts="background: black;";
$i1=Casetas;		$d1=input2(button,'','',$total4			,"background: #F9F970;");
$i2=Facturas;		$d2=input2(button,'','',$total5			,"background: #F9F970;");
$i3=RyR;			$d3=input2(button,'','',$total6			,"background: #F9F970;");
$i4=Guia;			$d4=input2(button,'','',$total7			,"background: #F9F970;");
$i5=Maniobras;		$d5=input2(button,'','',$total8			,"background: #F9F970;");
$i6='';				$d6='';									$tc6='#989898';
					$d7=input2(button,'','Gastos T.',$g_t   ,'background: orange;');
$i8=Chofer;			$d8=input2(button,'','',$c				,'background: orange;');
$i9='';				$d9='';									$tc9='#989898';
$i10='';			$d10=input2(button,'','',$t_g			,"background: orangered;");
$i11=Viaticos;		$d11=input2(button,'','',$total2		,"background:  greenyellow;");
$i12='';			$d12='';								$tc12='#989898';
$i13='';			$d13=input2(button,'','',$dif1 			,"background: $sd5; color: $ld5;");
include("tablero.php");			
}
//----------------------------------------------------------------
print input2($type,hidden_fe,'',$_POST[hidden_fe]);
print input2($type,hidden_v,'',$_POST[hidden_v]);
print input2($type,hidden_d,'',$_POST[hidden_d]);
print input2($type,hidden_c,'',$_POST[hidden_c]);
print input2($type,hidden_c_via,'',$_POST[hidden_c_via]);
print input2($type,hidden_f,'',$_POST[hidden_f]);
print input2($type,hidden_r,'',$_POST[hidden_r]);
print input2($type,hidden_g,'',$_POST[hidden_g]);
print input2($type,hidden_m,'',$_POST[hidden_m]);
print input2($type,hidden_c,'',$_POST[hidden_c]);
print input2($type,hidden_ab,'',$_POST[hidden_ab]);
print input2($type,hidden_ac,'',$_POST[hidden_ac]);
print input2($type,hidden_ac_a,'',$_POST[hidden_ac_a]);
//------------------------------------------------------
/*
$c1=compro($_POST[Carta1],ID_G,'',$consu5,$conexion,$phpv);
$c2=compro($_POST[Carta2],ID_G,'',$consu5,$conexion,$phpv);
$c3=compro($_POST[Carta3],ID_G,'',$consu5,$conexion,$phpv);
$c4=compro($_POST[Carta4],ID_G,'',$consu5,$conexion,$phpv);
$n=compro($_POST[chofer],Nombre_Ch,ulti_viaje,$consu1_2,$conexion,$phpv);*/
$fec_ini=$_POST[A].zero($_POST[M]).zero($_POST[D]);
$fec_fin=$_POST[A_r].zero($_POST[M_r]).zero($_POST[D_r]);
$grava=1;
IF ($_POST[Carta1]<>'')			{if ($c1==1){$grava=0;	$dc1="#ff002d33";$indc1=red;}	if ($c1==0){	$dc1="#21ff0033";}}
IF ($_POST[Carta2]<>'')			{if ($c2==1){$grava=0;	$dc2="#ff002d33";$indc2=red;}	if ($c2==0){	$dc2="#21ff0033";}}
IF ($_POST[Carta3]<>'')			{if ($c3==1){$grava=0;	$dc3="#ff002d33";$indc3=red;}	if ($c3==0){	$dc3="#21ff0033";}}
IF ($_POST[Carta4]<>'')			{if ($c4==1){$grava=0;	$dc4="#ff002d33";$indc4=red;}	if ($c4==0){	$dc4="#21ff0033";}}
IF ($_POST[chofer]<>chofer)		{$dc5="#21ff0033";}		else{$grava=0;}
IF ($_POST[placas]<>placas)		{$dc6="#21ff0033";}		else{$grava=0;}
IF ($_POST[cliente]<>cliente)	{$dc7="#21ff0033";}		else{$grava=0;}
IF ($_POST[flete_r]<>'')		{$dc10="#21ff0033";}	
IF ($fec_ini<$fec_fin)			{$dc8=$dc9="#21ff0033";}
IF ($fec_ini>$fec_fin)			{$dc8=$dc9="#ff002d33";			$grava=0;}
IF ((20150101==$fec_fin)and(20150101==$fec_fin)){$dc8=$dc9="#ff002d33";			$grava=0;}
IF ($_POST[km_i]<>'')			{$dc11="#21ff0033";}	else{$grava=0;}
IF ($_POST[km_f]<>'')			{$dc12="#21ff0033";}	else{$grava=0;}
IF ($_POST[km_i]>$_POST[km_f])	{$dc11=$dc12="#ff002d33";$grava=0;} 

$size=0;
$style="background: rgba(5, 72, 108, 0.67) none repeat scroll 0% 0%; width: auto; width: 220px; left: -1px; color: white;";
$title1='Nueva Cuenta';
$i1=1;
$i2=2;
$i3=3;
$i4=4;             
$i5=Chofer;
$i6=Placas;
$i7=Cliente;
$i8=Salida;             
$i9=Llegada;       
$i10='Flete R.';    
$i11="Kms inicio";
$i12="Kms fin";
$i13="N° Cuenta";
$i14=Cometa; 

$libre=focuas_a(4,Carta2);	$d1=$d1.input2($type2,Carta1,'',$_POST[Carta1],"color: $indc1;",'',$libre);
$libre=focuas_a(4,Carta3);	$d2=$d2.input2($type2,Carta2,'',$_POST[Carta2],"color: $indc2;",'',$libre);
$libre=focuas_a(4,Carta4);	$d3=$d3.input2($type2,Carta3,'',$_POST[Carta3],"color: $indc3;",'',$libre);
$libre=focuas_a(4,D); 		$d4=$d4.input2($type2,Carta4,'',$_POST[Carta4],"color: $indc4;",'',$libre);
							$d5=$d5.despliegre_mysql(chofer,Chofer,$consu1,Nombre_Ch,$phpv);
							$d6=$d6.despliegre_mysql(placas,Placas,$consu2,Placas,$phpv);
							$d7=$d7.despliegre_mysql(cliente,Clientes,$consu3,Nombre_Cl,$phpv);
$style1=$style;
$style='width: 40px; box-shadow: 0px 5px 5px black;';
$libre=focuas_a(2,M);		$d8=$d8.input2($type2,D,'',$_POST[D],$style,'',$libre);
$libre=focuas_a(2,A);		$d8=$d8.input2($type2,M,'',$_POST[M],$style,'',$libre);
$libre=focuas_a(4,D_r);		$d8=$d8.input2($type2,A,'',$_POST[A],$style,'',$libre);
$libre=focuas_a(2,M_r);		$d9=$d9.input2($type2,D_r,'',$_POST[D_r],$style,'',$libre);
$libre=focuas_a(2,A_r);		$d9=$d9.input2($type2,M_r,'',$_POST[M_r],$style,'',$libre);
$libre=focuas_a(4,flete_r);	$d9=$d9.input2($type2,A_r,'',$_POST[A_r],$style,'',$libre);
$style=$style1;
$libre=focuas_a(10,km_i);	$d10=$d10.input2($type2,flete_r	,'',$_POST[flete_r],'','',$libre);
$libre=focuas_a(10,km_f);	$d11=$d11.input2($type2,km_i		,'',$_POST[km_i],'','',$libre);
$libre=focuas_a(10,come);	$d12=$d12.input2($type2,km_f		,'',$_POST[km_f],'','',$libre);
							$d13=$d13.input2(button,n_c		,'',$_POST[n_c]).input2(hidden,n_c,'',$n+1);
							$d14=$d14."<TEXTAREA class='Medio' id='comenta' maxleght='200' title='comentario general de el viaje' name='come'>$_POST[come]</TEXTAREA>";
							$d15=date("d/m/Y");


if($c1==1)		$d17=$ac2;
				$d18=$ac8;
				$d19=$ac9;
IF ($grava==1)$d20=input2(submit,Grava,'',Guardar);
IF ($grava==0)$d20="Verifique <br> marcadas en Rosa";
$tabla=folio;$n_id=ID_G;$id=$_POST[Carta1];
$n1=CHOFER;		$v1=$_POST[chofer];	$n2=PLACAS;		$v2=$_POST[placas];	$n3=CLIENTE;	$v3=$_POST[cliente];
$n4=Revisado;	$v4=0;				$n5=Descripcion;$v5=$_POST[come];	$n6=Difer_1;	$v6=$dif1;
$n7=Carta1;		$v7=$_POST[Carta1];	$n8=Carta2;		$v8=$_POST[Carta2];	$n9=Carta3;		$v9=$_POST[Carta3];
$n11=Carta4;	$v11=$_POST[Carta4];$n12=N_Cuenta;	$v12=$n+1; 
$n13=sueldo;	$v13=$c;			$n14=isr;		$v14=$rete; 
include('espe_tab.php');
IF (($grava==1)&&($_POST[Grava]==Guardar)){
	ejecuta($conexion,$res,$phpv);
	modifica(choferes_on,'',$conexion,$phpv);
	modifica(choferes,'',$conexion,$phpv);
	$d20='Guardado <br>Con Exito';
}
include("tablero.php");
//if(($_POST[chofer]<>Chofer)and($_POST[chofer]<>''))modifica(choferes,'',$conexion,$phpv);
//----------------------------------------------------------
$size=0;
$style="background: rgba(0, 0, 0, 0.77) none repeat scroll 0% 0%; width: auto; color: white;";
$ts="background: black;";
$title1='Generales';
$i1=Chofer;			$d1=input2(button,'',"Flete[$total1] * 0.15= $c "								,$c			,"background: #FDFD96;");
$i2=ISR;			$d2=input2(button,'',"(Chofer[$c] * 7.5)/100 = $rete "							,$rete		,"background: orange;");
$i3='';				$d3=input2(button,'',""															,$c-$rete	);
$i4="Gastos T.";   	$d4=input2(button,'',"Casetas[$total4] + Facturas[$total5] + RYR[$total6] + Guias[$total7] + Maniobras[$total8] =$g_t"	,$g_t,"background: #FDFD96;");
$i5=Viaticos;		$d5=input2(button,'',''															,$total2,"background: greenyellow;");
$i6='';				$d6=input2(button,'',"+[$total2]Viaticos\r+[$rete]Retencion\r -[$g_t]Gasto T.\r -[$c]chofer\r----------------\r[$dif1] Total ",$dif1,"background: $sd5; color: $ld5;");
$tc7='#989898';		$i7='';				$d7='';
$i8='Sin. Cho.';	$d8=input2(button,'',"Casetas[$total4] + Facturas[$total5] + RYR[$total6] + Guias[$total7] + Maniobras[$total8] =$g_t",$g_t,"background: #FDFD96; ");
$i9=Viaticos;		$d9=input2(button,'',''															,$total2,"background: greenyellow;");
$i10='';			$d10=input2(button,'',"+Viaticos[$total2] -Gasto T.[$g_t] = $dif2 "				,$dif2,"background: $sd9; color: $ld9;");
$tc11='#989898';	$i11='';			$d11='';
$i12=Flete;			$d12=input2(button,'',''														,$_POST[flete_r],"background: aqua;");
$i13='Total G.';	$d13=input2(button,'',"Via Pass [$total4_via] +Diesel[$total3] +Gasto T.[$t_g] + Comision[$comi] = $t_d_g ",$t_d_g,"background: orange;");
$i14='Neto Carro';	$d14=input2(button,'',"Neto Camion[$n_c] / (fletes[$flete_r] * 0.01) = $re "	,$n_c,"background: $sd13; color: $ld13;");
$i15=Rendimiento;	$d15=input2(button,'',"Neto Camion[$n_c] / (fletes[$flete_r] * 0.01) = $re "	,$re,"background: $sd14; color: $ld14;");
$i16='Cuentas';		$d16='';			$tc16='#000';
$i17='Actual';		$d17=input2(button,'',"+[$total2]Viaticos\r -[$rete]Retencion\r -[$g_t]Gasto T.\r -[$c]chofer\r----------------\r[$dif1] Total ",$dif1,"background: $indf16; color: $indc16;");
$i18='Arrastado';	$d18=input2(button,'',"Suma de todas las Cuentas Arastradas"					,$total10,"background: $indf17; color: $indc17;");
$i19='';			$d19=input2(button,'',"Actual[$dif1] + Arrastrada[$total10]= $dif3"				,$dif3,"background: $indf18; color: $indc18;");
$i20=Abonos;		$d20=input2(button,'',"Suma de los abonos de esta cuenta "						,$total9,"background: $indf19; color: $indc19;");
$i21=Total;			$d21=input2(button,'',"Arrastrado[$total10]-Abonos[$total9]=$dif4"				,$dif4,"background: $indf20; color: $indc20;");
include('tablero.php');

echo"<TEXTAREA style='width: 100px; height: 220px; color: white; background: rgba(0, 0, 0, 0.77) none repeat scroll 0% 0%;'>";
if($_POST[Grava]==Guardar){
	//-----------------------------------------------------------
	$tabla=km;
	$n_id=ID_G;
	$id=$_POST[Carta1];
	$n1=KM_S;
	$v1=$_POST[km_i];
	$n2=KM_E;		
	$v2=$_POST[km_f];	  
	include('espe_tab.php');
	IF (($grava==1)&&($_POST[Grava]==Guardar)){ejecuta($conexion,$res,$phpv); echo"\r Killometraje";}
	//-----------------------------------------------------------
	$tabla=fechas;
	$n_id=ID_G;
	$id=$_POST[Carta1];
	$n1=D;	$v1=$_POST[D];
	$n2=M;	$v2=$_POST[M];
	$n3=A;	$v3=$_POST[A];
	$n4=D_r;$v4=$_POST[D_r];
	$n5=M_r;$v5=$_POST[M_r];
	$n6=A_r;$v6=$_POST[A_r];
	$n7=D_c;$v7=date("d");
	$n8=M_c;$v8=date("m");
	$n9=A_c;$v9=date("Y");
	$n10=inicio;$v10=$fec_ini;
	include('espe_tab.php');
	IF (($grava==1)&&($_POST[Grava]==Guardar)){ejecuta($conexion,$res,$phpv);echo"\r Fecha";}
	//-------------------------------------------- ---------------
	$tabla=fletes;
	$na1="1TEXT";
	$va1="1TEXT";
	$n_id="ID_G";
	$id=Carta1;
	$repit1=5;
	$n1=Flete_R;
	$v1=$_POST[flete_r];
	$n2=comi_ass;
	$v2=$_POST[comi];
	$n3=HIDE1;
	$v3=$_POST[hidden_fe];
	$n4=TOTAL1;
	$v4=$total1;
	include('auto_tab.php');
	IF (($grava==1)&&($_POST[Grava]==Guardar)){ejecuta($conexion,$res,$phpv);echo"\r Fletes";}
	//----------------------------------------------------------
	$tabla=viaticos;
	$na1="2TEXT";
	$va1="2TEXT";
	$n_id="ID_G";
	$id=Carta1;
	$repit1=5;
	$n1=HIDE2;
	$v1=$_POST[hidden_v];
	$n2=TOTAL2;
	$v2=$total2;
	include('auto_tab.php');
	IF (($grava==1)&&($_POST[Grava]==Guardar)){ejecuta($conexion,$res,$phpv);echo"\r Viaticos";}
	//----------------------------------------------------------
	$tabla=disel;
	$na1="3TEXT";
	$va1="3TEXT";
	$n_id="ID_G";
	$id=Carta1;
	$repit1=7;
	$n1=presio_d;
	$v1=$_POST[presio_d];
	$n2=HIDE3;
	$v2=$_POST[hidden_d];
	$n3=TOTAL3;
	$v3=$total3;
	include('auto_tab.php');
	IF (($grava==1)&&($_POST[Grava]==Guardar)){ejecuta($conexion,$res,$phpv);echo"\r Diesel";}
	//---------------------------------------------------------
	$tabla=casetas;
	$na1="4TEXT";
	$va1="4TEXT";
	$n_id="ID_G";
	$id=Carta1;
	$repit1=20;
	$n1=HIDE4;
	$v1=$_POST[hidden_c];
	$n2=TOTAL4;
	$v2=$total4;
	include('auto_tab.php');
	IF (($grava==1)&&($_POST[Grava]==Guardar)){ejecuta($conexion,$res,$phpv);echo"\r Casetas";}
	//---------------------------------------------------------
	$tabla=casetas_via;
	$na1="TEXT";
	$va1="4TEXT_VIA";
	$n_id="ID_G";
	$id=Carta1;
	$repit1=20;
	$n1=TOTAL;
	$v1=$total4_via;
	$n2=HIDE;
	$v2=$_POST[hidden_c_via];
	include('auto_tab.php');
	IF (($grava==1)&&($_POST[Grava]==Guardar)){ejecuta($conexion,$res,$phpv);echo"\r Via";}
	//----------------------------------------------------------
	$tabla=facturas;
	$na1="5TEXT";
	$va1="5TEXT";
	$n_id="ID_G";
	$id=Carta1;
	$repit1=5;
	$n1=HIDE5;
	$v1=$_POST[hidden_f];
	$n2=TOTAL5;
	$v2=$total5;
	include('auto_tab.php');
	IF (($grava==1)&&($_POST[Grava]==Guardar)){ejecuta($conexion,$res,$phpv);echo"\r Facturas";}
	//----------------------------------------------------------
	$tabla=ryr;
	$na1="6TEXT";
	$va1="6TEXT";
	$n_id="ID_G";
	$id=Carta1;
	$repit1=10;
	$n1=HIDE6;
	$v1=$_POST[hidden_r];
	$n2=TOTAL6;
	$v2=$total6;
	include('auto_tab.php');
	IF (($grava==1)&&($_POST[Grava]==Guardar)){ejecuta($conexion,$res,$phpv);echo"\r ryr";}
	//----------------------------------------------------------
	$tabla=guias;
	$na1="7TEXT";
	$va1="7TEXT";
	$n_id="ID_G";
	$id=Carta1;
	$repit1=5;
	$n1=HIDE7;
	$v1=$_POST[hidden_g];
	$n2=TOTAL7;
	$v2=$total7;
	include('auto_tab.php');
	IF (($grava==1)&&($_POST[Grava]==Guardar)){ejecuta($conexion,$res,$phpv);echo"\r Guias";}
	//----------------------------------------------------------
	$tabla=maniobras;
	$na1="8TEXT";
	$va1="8TEXT";
	$n_id="ID_G";
	$id=Carta1;
	$repit1=6;
	$n1=HIDE8;
	$v1=$_POST[hidden_m];
	$n2=TOTAL8;
	$v2=$total8;
	include('auto_tab.php');
	IF (($grava==1)&&($_POST[Grava]==Guardar)){ejecuta($conexion,$res,$phpv);echo"\r Maniobras";}
	//----------------------------------------------------------
	$tabla=fletes_c;
	$na1="1TEXT";
	$va1="1TEXT_C";
	$repit1=5;
	$n_id="ID_G";
	$id=Carta1;
	include('auto_tab.php');
	IF (($grava==1)&&($_POST[Grava]==Guardar)){ejecuta($conexion,$res,$phpv);echo"\r Fletes_c";}
	//-----------------------------------------------------------
	$tabla=viaticos_c;
	$na1="2TEXT";
	$va1="2TEXT_C";
	$repit1=5;
	$n_id="ID_G";
	$id=Carta1;
	include('auto_tab.php');
	IF (($grava==1)&&($_POST[Grava]==Guardar)){ejecuta($conexion,$res,$phpv);echo"\r Viaticos_c";}
	//----------------------------------------------------------
	$tabla=disel_c;
	$na1="3TEXT";
	$va1="3TEXT_C";
	$repit1=7;
	$n_id="ID_G";
	$id=Carta1;
	include('auto_tab.php');
	IF (($grava==1)&&($_POST[Grava]==Guardar)){ejecuta($conexion,$res,$phpv);echo"\r Diesel_c";}
	//----------------------------------------------------------
	$tabla=casetas_c_via;
	$na1="TEXT";
	$va1="4TEXT_C_VIA";
	$n_id="ID_G";
	$id=Carta1;
	$repit1=20;
	include('auto_tab.php');
	IF (($grava==1)&&($_POST[Grava]==Guardar)){ejecuta($conexion,$res,$phpv);echo"\r Via_c";}
	//----------------------------------------------------------
	$tabla=casetas_c;
	$na1="4TEXT";
	$va1="4TEXT_C";
	$repit1=20;
	$n_id="ID_G";
	$id=Carta1;
	include('auto_tab.php');
	IF (($grava==1)&&($_POST[Grava]==Guardar)){ejecuta($conexion,$res,$phpv);echo"\r casetas_c";}
	//----------------------------------------------------------
	$tabla=facturas_c;
	$na1="5TEXT";
	$va1="5TEXT_C";
	$repit1=5;
	$n_id="ID_G";
	$id=Carta1;
	include('auto_tab.php');
	IF (($grava==1)&&($_POST[Grava]==Guardar)){ejecuta($conexion,$res,$phpv);echo"\r Facturas_c";}
	//----------------------------------------------------------
	$tabla=ryr_c;
	$na1="6TEXT";
	$va1="6TEXT_C";
	$repit1=10;
	$n_id="ID_G";
	$id=Carta1;
	include('auto_tab.php');
	IF (($grava==1)&&($_POST[Grava]==Guardar)){ejecuta($conexion,$res,$phpv);echo"\r RYR_c";}
	//----------------------------------------------------------
	$tabla=guias_c;
	$na1="7TEXT";
	$va1="7TEXT_C";
	$repit1=5;
	$n_id="ID_G";
	$id=Carta1;
	include('auto_tab.php');
	IF (($grava==1)&&($_POST[Grava]==Guardar)){ejecuta($conexion,$res,$phpv);echo"\r Guias_c";}
	//----------------------------------------------------------
	$tabla=maniobras_c;
	$na1="8TEXT";
	$va1="8TEXT_C";
	$repit1=6;
	$n_id="ID_G";
	$id=Carta1;
	include('auto_tab.php');
	IF (($grava==1)&&($_POST[Grava]==Guardar)){ejecuta($conexion,$res,$phpv);echo"\r Maniobras_c";}
	//----------------------------------------------------------
	$tabla=abo_acu;
	$na1=ID_ac;	$va1=ID_ac;	$repit1=5;
	$na2=ac;	$va2=ac;	$repit2=5;
	$na3=ab;	$va3=ab;	$repit3=5;
	$na4=ab_Com;$va4=ab_Com;$repit4=5;
	$n_id="ID_G";	$id=Carta1;
	$n1=Hide_ac;	$v1=$_POST[hidden_ac];
	$n2=Hide_ab;	$v2=$_POST[hidden_ab];
	$n3=Totalac;	$v3=$total10;
	$n4=Totalab;	$v4=$total9;
	$n5=Total_Total;$v5=$dif4;
	$n6=rete;		$v6=$rete;
	$n7=add_en;		$v7='';
	$n8=dif1;		$v8='';
	include('auto_tab.php');
	IF (($grava==1)&&($_POST[Grava]==Guardar)){ejecuta($conexion,$res,$phpv);echo"\r abo_acu";}
}
echo"</TEXTAREA>";
//----------------------------------------------------------
?>