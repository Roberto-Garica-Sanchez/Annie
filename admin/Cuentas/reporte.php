<?php //php5 php7 

$menu='menu-list';
$listn1="Ingresos Fletes";
$listn2="Reporte";
$style="top: 250px; width: 300px; height: 100px; ";
include('lista.php');



//Operadores 
	$style="background: rgba(5, 72, 108, 0.67) 				none repeat scroll 0% 0%; overflow: auto; overflow-x:hidden; position: absolute; left: 115px; height: 28px; width: 664px; top: 0px;";
	$libre="";$conte="";
	//---------
		
	if ($_POST[D_i]==''){$_POST[D_i]=1;}
	if ($_POST[M_i]==''){$_POST[M_i]=date("m");}
	if ($_POST[A_i]==''){$_POST[A_i]=date("Y");}
	if ($_POST[D_f]==''){$_POST[D_f]=31;}
	if ($_POST[M_f]==''){$_POST[M_f]=date("m");}
	if ($_POST[A_f]==''){$_POST[A_f]=date("Y");}
	$n1="Inicio	".despieges(D_i,Dia,1,31,$libre,D_i_des).despieges(M_i,Mes,1,12,$libre,M_i_des).despieges(A_i,Año,2015,2030,$libre,A_i_des);
	$n2="Fin	".despieges(D_f,Dia,1,31,$libre,D_f_des).despieges(M_f,Mes,1,12,$libre,M_f_des).despieges(A_f,Año,2015,2030,$libre,A_f_des);
	$n3="Chofer ".despliegre_mysql(chofer,Todos,$consu1,Nombre_Ch,$phpv,"title='$_POST[chofer]'");	
	$n4="Cliente".despliegre_mysql(cliente,Todos,$consu3,Nombre_Cl,$phpv,"title='$_POST[cliente]'");	
	
	if($_POST[$menu]==$listn1){
		
	}	
	$conte=$conte."<table><tr><td>$n1</td><td>$n2</td><td>$n3</td><td>$n4</td></tr></table>";
	echo div($style,$libre,$conte);
	$style="";$libre="";$conte="";$n1=$n2=$n3=$n4=$n5=$n6;

//contenedor principal 
	$style="color: white; background: rgba(5, 72, 108, 0.67)	none repeat scroll 0% 0%; overflow: auto; overflow-x: auto; position: absolute; left: 115px; height: 542px; width: 664px; top: 56px;";
	$libre="";$conte="";
	//---------
	if($_POST[$menu]==$listn1){ 
		$x=0;$conte="";$INGRE_FL=0;
		$consu5=consulta('folio',$conexion,'','',ID_G,1,$phpv);
		mysql_da_se($consu5,0,$phpv);
		while($datos=mysql_fe_ar($consu5,$phpv)){	
			$consu=consulta(fechas,$conexion,ID_G,$datos[ID_G],ID_G,1,$phpv);$dato2=mysql_fe_ar($consu,$phpv);
			$A=$dato2[A];$M=$dato2[M];$D=$dato2[D];
			$fec_set =$A.$M.$D;
			$fecha	= "$D-$M-$A";
			if(	
				(($_POST[cliente]==$datos[CLIENTE])	or($_POST[cliente]==cliente))&&
				(($_POST[chofer]==$datos[CHOFER])	or($_POST[chofer]==chofer))&&
				($fec_ini<=$fec_set)&&($fec_fin>=$fec_set)
			){
				$consu=consulta(fletes,$conexion,ID_G,$datos[ID_G],ID_G,1,$phpv);$dato1=mysql_fe_ar($consu,$phpv);
				$i1=input2(button,'','',$datos[ID_G]);
				$i2=input2(button,'','',$datos[CLIENTE]);
				$i3=input2(button,'','',$datos[CHOFER]);
				$i4=input2(button,'','',$dato1[Flete_R]);
				$i5=input2(button,'','',$fecha );
				$i6=input2(button,'','',$dato1[TOTAL1]);
				$INGRE_FL=$INGRE_FL+$dato1[TOTAL1];
				$conte=$conte."<tr><td>$i1</td><td>$i2</td><td>$i3</td><td>$i4</td><td>$i5</td><td>$i6</td><tr/>";	
			}
		}

	$conte="<table border='0'>$conte</table>";	
	}
	if($_POST[$menu]==$listn2){ 
		$x=0;$conte="";$INGRE_FL=0;
		$consu5=consulta('folio',$conexion,'','',ID_G,1,$phpv);
		mysql_da_se($consu5,0,$phpv);
		$flete="";
		while($datos=mysql_fe_ar($consu5,$phpv)){	
			$consu=consulta(fechas,$conexion,ID_G,$datos[ID_G],ID_G,1,$phpv);$dato2=mysql_fe_ar($consu,$phpv);
			$A=$dato2[A];$M=$dato2[M];$D=$dato2[D];
			$fec_set =$A.$M.$D;
			$fecha	= "$D-$M-$A";
			if(	
				(($_POST[cliente]==$datos[CLIENTE])	or($_POST[cliente]==cliente))&&
				(($_POST[chofer]==$datos[CHOFER])	or($_POST[chofer]==chofer))&&
				($fec_ini<=$fec_set)&&($fec_fin>=$fec_set)
			){
				$consu=	consulta(fletes		,$conexion,ID_G,$datos[ID_G],ID_G,1,$phpv);	$dato1=mysql_fe_ar($consu,$phpv);
				$consu= consulta(viaticos	,$conexion,ID_G,$datos[ID_G],ID_G,1,$phpv); $dato2=mysql_fe_ar($consu,$phpv);
				$consu= consulta(disel		,$conexion,ID_G,$datos[ID_G],ID_G,1,$phpv); $dato3=mysql_fe_ar($consu,$phpv);
				$consu= consulta(casetas	,$conexion,ID_G,$datos[ID_G],ID_G,1,$phpv); $dato4=mysql_fe_ar($consu,$phpv);
				$consu= consulta(casetas_via,$conexion,ID_G,$datos[ID_G],ID_G,1,$phpv); $dato4_1=mysql_fe_ar($consu,$phpv);
				$consu= consulta(facturas	,$conexion,ID_G,$datos[ID_G],ID_G,1,$phpv); $dato5=mysql_fe_ar($consu,$phpv);
				$consu= consulta(ryr		,$conexion,ID_G,$datos[ID_G],ID_G,1,$phpv); $dato6=mysql_fe_ar($consu,$phpv);
				$consu= consulta(guias		,$conexion,ID_G,$datos[ID_G],ID_G,1,$phpv); $dato7=mysql_fe_ar($consu,$phpv);
				$consu= consulta(maniobras	,$conexion,ID_G,$datos[ID_G],ID_G,1,$phpv); $dato8=mysql_fe_ar($consu,$phpv);
				$consu= consulta(abo_acu	,$conexion,ID_G,$datos[ID_G],ID_G,1,$phpv); $dato9=mysql_fe_ar($consu,$phpv);
				$fletes		=$fletes	+$dato1[TOTAL1];
				$viaticos	=$viaticos	+$dato2[TOTAL2];
				$diesel		=$diesel	+$dato3[TOTAL3];
				$casetas	=$casetas	+$dato4[TOTAL4];
				$facturas	=$facturas	+$dato5[TOTAL5];
				$casetas_via=$casetas_via+$dato4_1[TOTAL];
				$ryr		=$ryr		+$dato6[TOTAL6];
				$guias		=$guias		+$dato7[TOTAL7];
				$maniobras	=$maniobras	+$dato8[TOTAL8];
				$isr		=$isr		+$datos[isr];
				$acu		=$acu		+$dato9[Totalac];
				$abo		=$abo		+$dato9[Totalab];
				
				$i1=input2(button,'','',$datos[ID_G]);
				$i2=input2(button,'','',$datos[CLIENTE]);
				$i3=input2(button,'','',$datos[CHOFER]);
				$i4=input2(button,'','',$dato1[Flete_R]);
				$i5=input2(button,'','',$fecha );
				$i6=input2(button,'','',$dato1[TOTAL1]);
				
				$conte=$conte."<tr><td>$i1</td><td>$i2</td><td>$i3</td><td>$i4</td><td>$i5</td><td>$i6</td><tr/>";	
			}
		}
	$conte="<table border='0'>$conte</table>";	
		$_POST[fletes]		=forma_num($fletes		,2);
		$_POST[viaticos]	=forma_num($viaticos	,2);
		$_POST[Diesel]		=forma_num($diesel		,2);
		$_POST[Casetas]		=forma_num($casetas		,2);
		$_POST[Via_pass]	=forma_num($casetas_via	,2);
		$_POST[Facturas]	=forma_num($facturas	,2);
		$_POST[R_Y_R]		=forma_num($ryr			,2);
		$_POST[Guias]		=forma_num($guias		,2);
		$_POST[Maniobras]	=forma_num($maniobras	,2);
		$_POST[ISR]			=forma_num($isr	,2);
		$_POST[Arrastrados]	=forma_num($acu	,2);
		$_POST[Abonos]		=forma_num($abo	,2);
	}
	
	echo div($style,$libre,$conte);
	$style="";$libre="";$conte="";
	
	$size=0;			
	$i1=Fletes;			$d1=input2(hidden,'Fletes'		,'',$_POST[fletes])		.input2(text,'fletes'		,'',$_POST[fletes]);
	$i2=Viaticos;		$d2=input2(hidden,'Viaticos'	,'',$_POST[viaticos])	.input2(text,'viaticos'		,'',$_POST[viaticos]);
	$i3=Diesel;			$d3=input2(hidden,'Diesel'		,'',$_POST[Diesel])		.input2(text,'Diesel'		,'',$_POST[Diesel]);
	$i4=Casetas;		$d4=input2(hidden,'Casetas'		,'',$_POST[Casetas])	.input2(text,'Casetas'		,'',$_POST[Casetas]);
	$i5="Via Pass";		$d5=input2(hidden,'Via_pass'	,'',$_POST[Via_pass])	.input2(text,'Via_pass'		,'',$_POST[Via_pass]);
	$i6=Facturas;		$d6=input2(hidden,'Facturas'	,'',$_POST[Facturas])	.input2(text,'Facturas'		,'',$_POST[Facturas]);
	$i7="R Y R";		$d7=input2(hidden,'R_Y_R'		,'',$_POST[R_Y_R])		.input2(text,'R_Y_R'		,'',$_POST[R_Y_R]);
	$i8=Guias;			$d8=input2(hidden,'Guias'		,'',$_POST[Guias])		.input2(text,'Guias'		,'',$_POST[Guias]);
	$i9=Maniobras;		$d9=input2(hidden,'Maniobras'	,'',$_POST[Maniobras])	.input2(text,'Maniobras'	,'',$_POST[Maniobras]);
	$i10=Saldos;		$d10=input2(hidden,'Saldo'		,'',$_POST[Saldo])		.input2(text,'Saldo'		,'',$_POST[Saldo]);
	$i11=Sueldos;		$d11=input2(hidden,'Sueldos'	,'',$_POST[Sueldos])	.input2(text,'Sueldos'		,'',$_POST[Sueldos]);	
	$i12=ISR;			$d12=input2(hidden,'ISR'		,'',$_POST[ISR])		.input2(text,'ISR'			,'',$_POST[ISR]);
	$i13=Abonos;		$d13=input2(hidden,'Abonos'		,'',$_POST[Abonos])		.input2(text,'Abonos'		,'',$_POST[Abonos]);
	$i14=Arrastrados;	$d14=input2(hidden,'Arrastrados','',$_POST[Arrastrados]).input2(text,'Arrastrados'	,'',$_POST[Arrastrados]);
	
	$style=" background: rgba(5, 72, 108, 0.67) none repeat scroll 0% 0%; width: auto; width: 220px; left: -1px; color: white;";
	include("tablero.php");
//titulos 
	$style="background: rgba(5, 72, 108, 0.67) 				none repeat scroll 0% 0%; overflow: auto; overflow-x:hidden; position: absolute; left: 115px; height: 28px; width: 664px; top: 28px;";
	$libre="";$conte="";
	//---------
	if($_POST[$menu]==$listn1){ 
		$INGRE_FL=forma_num($INGRE_FL,2);
		$n1=input2(button,'','',Cuenta);
		$n2=input2(button,'','',Cliente);
		$n3=input2(button,'','',Chofer);
		$n4=input2(button,'','',Flete_r);
		$n5=input2(button,'','',Fecha);	
		//$n6=input2(button,'','',Flete_n);	
		$fec_ini_pre=$_POST[A_i]."/".zero($_POST[M_i])."/".zero($_POST[D_i]);
		$fec_fin_pre=$_POST[A_f]."/".zero($_POST[M_f])."/".zero($_POST[D_f]);
		$title="Ingresos Totales De Fletes: $INGRE_FL\r Entre: $fec_ini_pre  Hasta $fec_fin_pre";
		$n6=input2(button,'',$title,"Total: $".$INGRE_FL,"width: 140px;");
	}
	$conte=$conte."<table><tr><td>$n1</td><td>$n2</td><td>$n3</td><td>$n4</td><td>$n5</td><td>$n6</td></tr></table>";
	echo div($style,$libre,$conte);
	$style="";$libre="";$conte="";
	
?>