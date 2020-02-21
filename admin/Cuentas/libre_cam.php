<?php //php7

function cambia($tabla,$var1,$var2,$var3){
	if($tabla==choferes)	{$cambia="UPDATE $tabla 	SET  ulti_viaje='$_POST[n_c]' WHERE Nombre_Ch='$_POST[chofer]'";}
	if($tabla==choferes_on)	{$cambia="UPDATE $tabla 	SET  ulti_viaje='$_POST[n_c]' WHERE Nombre_Ch='$_POST[chofer]'";}
	return $cambia;
}
function modifica($tabla,$var1,$conexion,$phpv){
	$res=cambia($tabla,$var1);
	ejecuta($conexion,$res,$phpv);
	return $res;
}
function resetea($consu,$posi,$phpv){
    if ($posi=='')	{$posi=0;}
    if ($consu=='')	{echo"resetea sin consu";}
	mysql_da_se($consu,$posi,$phpv);
}
function certi($cuenta,$conexion,$phpv){
    $consu4=consulta('fechas'		,$conexion,"","","","",$phpv);
    $consu5=consulta('folio'		,$conexion,"","","","",$phpv);
    $consu6=consulta('fletes'		,$conexion,"","","","",$phpv);
    $consu7=consulta('viaticos'		,$conexion,"","","","",$phpv);
    $consu8=consulta('disel'		,$conexion,"","","","",$phpv);
    $consu9=consulta('casetas'		,$conexion,"","","","",$phpv);
    $consu10=consulta('facturas'	,$conexion,"","","","",$phpv);
    $consu11=consulta('ryr'			,$conexion,"","","","",$phpv);
    $consu12=consulta('guias'		,$conexion,"","","","",$phpv);
    $consu13=consulta('maniobras'	,$conexion,"","","","",$phpv);
    $consu14=consulta('km'			,$conexion,"","","","",$phpv);
    
    $consu16=consulta('fletes_c'	,$conexion,"","","","",$phpv);
    $consu17=consulta('viaticos_c'	,$conexion,"","","","",$phpv);
    $consu18=consulta('disel_c'		,$conexion,"","","","",$phpv);
    $consu19=consulta('casetas_c'	,$conexion,"","","","",$phpv);
    $consu20=consulta('facturas_c'	,$conexion,"","","","",$phpv);
    $consu21=consulta('ryr_c'		,$conexion,"","","","",$phpv);
    $consu22=consulta('guias_c'		,$conexion,"","","","",$phpv);
    $consu23=consulta('maniobras_c'	,$conexion,"","","","",$phpv);
    $consu24=consulta('abo_acu'		,$conexion,"","","","",$phpv);
    resetea($consu4,"",$phpv);
	//if ($_POST[Carta1]==''){echo"Certificado \rCarta: Vacia";}
	if($_POST[Carta1]<>''){
		//echo"------------\r";
		//echo "Certificado";
		$com=$cuenta;$col=ID_G;$var=ID_G;$consu=$consu4;
		/*echo "\rFechas--:".*/$res=compro($com,$col,$var,$consu,$conexion,$phpv);
		//if ($res==''){echo"---- >Celda Faltante<";}             
		include("auto_tab_inser.php");
		$res='';
		$com=$cuenta;$col=ID_G;$var=ID_G;$consu=$consu5;
		/*echo "\rFolios--:".*/$res=compro($com,$col,$var,$consu,$conexion,$phpv);
		if ($res==''){//echo"---- >Celda Faltante<";
			$tabla=folio;
			$n1=CHOFER;		$v1=$_POST[chofer];	$n2=PLACAS;		$v2=$_POST[placas];	$n3=CLIENTE;	$v3=$_POST[cliente];
			$n4=Revisado;	$v4=0;				$n5=Descripcion;$v5=$_POST[come];	$n6=Difer_1;	$v6=$dif1;
			$n7=Carta1;		$v7=$_POST[Carta1];	$n8=Carta2;		$v8=$_POST[Carta2];	$n9=Carta3;		$v9=$_POST[Carta3];
			$n11=Carta4;	$v11=$_POST[Carta4];$n12=N_Cuenta;	$v12=$n+1; 
			$n13=sueldo;	$v13=$c;			$n14=isr;		$v14=$rete; 
			include("auto_tab_insert.php");
			ejecuta($conexion,$res,$phpv);
			//echo"|--->Corregido";
		}
		$res='';    
		$com=$cuenta;$col=ID_G;$var=ID_G;$consu=$consu6;
		/*echo "\rFletes--:".*/$res=compro($com,$col,$var,$consu,$conexion,$phpv);
		if ($res==''){
			//echo"---- >Celda Faltante<";
			$tabla=fletes;
			$n0="ID_G";		$v0=$_POST[Carta1];
			$na1="1TEXT";	$va1="1TEXT";	$repit1=5;
			$n1=Flete_R;	$v1=$_POST[flete_r];
			$n2=comi_ass;	$v2=$_POST[comi];
			$n3=HIDE1;		$v3=$_POST[hidden_fe];
			$n4=TOTAL1;		$v4=$total1;
			include("auto_tab_insert.php");
			ejecuta($conexion,$res,$phpv);
			//echo"|--->Corregido";
		}
		$res='';
		$com=$cuenta;$col=ID_G;$var=ID_G;$consu=$consu16;
	 /*	echo "\rFletes_c:".*/$res=compro($com,$col,$var,$consu,$conexion,$phpv);
		if ($res==''){
		//	echo"---- >Celda Faltante<";
			$tabla=fletes_c;
			$n0="ID_G";		$v0=$_POST[Carta1];
			$na1="1TEXT";	$va1="1TEXT_C";	$repit1=5;
			include("auto_tab_insert.php");
			ejecuta($conexion,$res,$phpv);
			//echo"|--->Corregido";
		}
		$res='';  
		$com=$cuenta;$col=ID_G;$var=ID_G;$consu=$consu7;
		/*echo "\rViatic--:".*/$res=compro($com,$col,$var,$consu,$conexion,$phpv);
		if ($res==''){
			//echo"---- >Celda Faltante<";
			$tabla=viaticos;
			$n0="ID_G";		$v0=$_POST[Carta1];	
			$n1=HIDE2;		$v1=$_POST[hidden_v];
			$n2=TOTAL2;		$v2=$total2;
			$na1="2TEXT";	$va1="2TEXT";	$repit1=5;
			include("auto_tab_insert.php");
			ejecuta($conexion,$res,$phpv);
			//echo"|--->Corregido";
		 }
		$res='';
		$com=$cuenta;$col=ID_G;$var=ID_G;$consu=$consu17;
		//echo "\rViatic_c:".
		$res=compro($com,$col,$var,$consu,$conexion,$phpv);
		if ($res==''){
			//echo"---- >Celda Faltante<";
			$tabla=viaticos_c;
			$n0="ID_G";		$v0=$_POST[Carta1];
			$na1="2TEXT";	$va1="2TEXT_C";	$repit1=5;
			include("auto_tab_insert.php");
			ejecuta($conexion,$res,$phpv);
		//	echo"|--->Corregido";
		}
		$res='';
		$com=$cuenta;$col=ID_G;$var=ID_G;$consu=$consu8;
		//echo "\rDiesel--:".
		$res=compro($com,$col,$var,$consu,$conexion,$phpv);
		if ($res==''){
		//	echo"---- >Celda Faltante<";
			$tabla=disel;
			$n0="ID_G";		$v0=$_POST[Carta1];
			$n1=presio_d;	$v1=$_POST[presio_d];
			$n2=HIDE3;		$v2=$_POST[hidden_d];
			$n3=TOTAL3;		$v3=$total3;
			$na1="3TEXT";	$va1="3TEXT";	$repit1=7;
			include("auto_tab_insert.php");
			ejecuta($conexion,$res,$phpv);
			//echo"|--->Corregido";
		}
		$res='';
		$com=$cuenta;$col=ID_G;$var=ID_G;$consu=$consu18;
		//echo "\rDiesel_c:".
		$res=compro($com,$col,$var,$consu,$conexion,$phpv);
		if ($res==''){
			//echo"---- >Celda Faltante<";
			$tabla=disel_c;
			$n0="ID_G";		$v0=$_POST[Carta1];
			$na1="3TEXT";	$va1="3TEXT_C";	$repit1=7;
			include("auto_tab_insert.php");
			ejecuta($conexion,$res,$phpv);
			//echo"|--->Corregido";
		}
		$res='';    
		$com=$cuenta;$col=ID_G;$var=ID_G;$consu=$consu9;
		//echo "\rCaseta--:".
		$res=compro($com,$col,$var,$consu,$conexion,$phpv);
		if ($res==''){
			//echo"---- >Celda Faltante<";
			$tabla=casetas;
			$n0="ID_G";		$v0=$_POST[Carta1];
			$n1=HIDE4;		$v1=$_POST[hidden_c];
			$n2=TOTAL4;		$v2=$total4;
			$na1="4TEXT";	$va1="4TEXT";	$repit1=20;
			include("auto_tab_insert.php");
			ejecuta($conexion,$res,$phpv);
			//echo"|--->Corregido";
		}
		$res='';
		$com=$cuenta;$col=ID_G;$var=ID_G;$consu=$consu19;
		//echo "\rCaseta_c:".
		$res=compro($com,$col,$var,$consu,$conexion,$phpv);
		if ($res==''){
			//echo"---- >Celda Faltante<";
			$tabla=casetas_c;
			$n0="ID_G";
			$v0=$_POST[Carta1];
			$na1="4TEXT";	$va1="4TEXT_C";	$repit1=20;
			include("auto_tab_insert.php");
			ejecuta($conexion,$res,$phpv);
			//echo"|--->Corregido";
		}
		$res='';
		$com=$cuenta;$col=ID_G;$var=ID_G;$consu=$consu10;
		//echo "\rFactur--:".
		$res=compro($com,$col,$var,$consu,$conexion,$phpv);
		if ($res==''){
		//	echo"---- >Celda Faltante<";
			$tabla=facturas;
			$n0="ID_G";		$v0=$_POST[Carta1];
			$n1=HIDE5;		$v1=$_POST[hidden_f];
			$n2=TOTAL5;		$v2=$total5;
			$na1="5TEXT";	$va1="5TEXT";	$repit1=5;
			include("auto_tab_insert.php");
			ejecuta($conexion,$res,$phpv);
			//echo"|--->Corregido";
		}
		$res='';
		$com=$cuenta;$col=ID_G;$var=ID_G;$consu=$consu20;
		//echo "\rFactur_c:".
		$res=compro($com,$col,$var,$consu,$conexion,$phpv);
		if ($res==''){
		//	echo"---- >Celda Faltante<";
			$tabla=facturas_c;
			$n0="ID_G";		$v0=$_POST[Carta1];
			$na1="5TEXT";	$va1="5TEXT_C";	$repit1=5;
			include("auto_tab_insert.php");
			ejecuta($conexion,$res,$phpv);
			//echo"|--->Corregido";
		}
		$res='';
		$com=$cuenta;$col=ID_G;$var=ID_G;$consu=$consu11;
		//echo "\rR y R --:".
		$res=compro($com,$col,$var,$consu,$conexion,$phpv);
		if ($res==''){
		//	echo"---- >Celda Faltante<";
			$tabla=ryr;
			$n0="ID_G";		$v0=$_POST[Carta1];
			$n1=HIDE6;		$v1=$_POST[hidden_r];
			$n2=TOTAL6;		$v2=$total6;
			$na1="6TEXT";	$va1="6TEXT";	$repit1=10;
			include("auto_tab_insert.php");
			ejecuta($conexion,$res,$phpv);
			//echo"|--->Corregido";
		}
		$res='';
		$com=$cuenta;$col=ID_G;$var=ID_G;$consu=$consu21;
		//echo "\rR y R _c:".
		$res=compro($com,$col,$var,$consu,$conexion,$phpv);
		if ($res==''){
			//echo"---- >Celda Faltante<";
			$tabla=ryr_c;
			$n0="ID_G";		$v0=$_POST[Carta1];
			$na1="6TEXT";	$va1="6TEXT_C";	$repit1=10;
			include("auto_tab_insert.php");
			ejecuta($conexion,$res,$phpv);
			//echo"|--->Corregido";		
		}
		$res='';
		
		$com=$cuenta;$col=ID_G;$var=ID_G;$consu=$consu12;
		//echo "\rGuias --:".
		$res=compro($com,$col,$var,$consu,$conexion,$phpv);
		if ($res==''){
			//echo"---- >Celda Faltante<";
			$tabla=guias;
			$n0="ID_G";		$v0=$_POST[Carta1];
			$n1=HIDE7;		$v1=$_POST[hidden_g];
			$n2=TOTAL7;		$v2=$total7;
			$na1="7TEXT";	$va1="7TEXT";	$repit1=5;
			include("auto_tab_insert.php");
			ejecuta($conexion,$res,$phpv);
		//	echo"|--->Corregido";		
		}
		$res='';
		$com=$cuenta;$col=ID_G;$var=ID_G;$consu=$consu22;
		//echo "\rGuias _c:".
		$res=compro($com,$col,$var,$consu,$conexion,$phpv);
		if ($res==''){
		//	echo"---- >Celda Faltante<";
			$tabla=guias_c;
			$n0="ID_G";		$v0=$_POST[Carta1];
			$na1="7TEXT";	$va1="7TEXT_C";	$repit1=5;		
			include("auto_tab_insert.php");
			ejecuta($conexion,$res,$phpv);
			//echo"|--->Corregido";		
		}
		$res='';		
		$com=$cuenta;$col=ID_G;$var=ID_G;$consu=$consu13;
	//	echo "\rManiob--:".
	$res=compro($com,$col,$var,$consu,$conexion,$phpv);
		if ($res==''){
	//		echo"---- >Celda Faltante<";
			$tabla=maniobras;
			$n0="ID_G";		$v0=$_POST[Carta1];
			$n1=HIDE8;		$v1=$_POST[hidden_m];
			$n2=TOTAL8;		$v2=$total8;
			$na1="8TEXT";	$va1="8TEXT";	$repit1=6;
			include("auto_tab_insert.php");
			ejecuta($conexion,$res,$phpv);
	//		echo"|--->Corregido";		
		}
		$res='';
		$com=$cuenta;$col=ID_G;$var=ID_G;$consu=$consu23;
	//	echo "\rManiob_c:".
		$res=compro($com,$col,$var,$consu,$conexion,$phpv);
		if ($res==''){
			//echo"---- >Celda Faltante<";
			$tabla=maniobras_c;
			$n0="ID_G";		$v0=$_POST[Carta1];
			$na1="8TEXT";	$va1="8TEXT_C";	$repit1=6;
			include("auto_tab_insert.php");
			ejecuta($conexion,$res,$phpv);
			//echo"|--->Corregido";		
		}
		$res='';
	  
		$com=$cuenta;$col=ID_G;$var=ID_G;$consu=$consu14;
		//echo "\rKm    --:".
		$res=compro($com,$col,$var,$consu,$conexion,$phpv);
		if ($res==''){
		//	echo"---- >Celda Faltante<";
			$tabla=km;
			$n0=ID_G;		$v0=$_POST[Carta1];
			$n1=KM_S;		$v1=$_POST[km_i];
			$n2=KM_E;		$v2=$_POST[km_f];	
			include("auto_tab_insert.php");
			ejecuta($conexion,$res,$phpv);
			//echo"|--->Corregido";		
		}
		$res='';
	}
}

function espe_tab(
	$tabla,$n_id,$id,$n_modificando,$v_modificando
	,$n1,$v1,$n2,$v2,$n3,$v3,$n4,$v4,$n5,$v5,$n6,$v6,$n7,$v7,$n8,$v8,$n9,$v9
	,$n10,$v10,$n11,$v11,$n12,$v12,$n13,$v13,$n14,$v14,$n15,$v15,$n16,$v16,$n17,$v17,$n18,$v18,$n19,$v19
	,$n20,$v20,$n21,$v21,$n22,$v22,$n23,$v23,$n24,$v24,$n25,$v25,$n26,$v26,$n27,$v27,$n28,$v28,$n29,$v29
){
	$d="UPDATE $tabla SET ";
	IF ($n_id<>'')$d=$d."$n_id='$id'";
	IF ($n1<>'')$d=$d.",$n1='$v1'";	IF ($n2<>'')$d=$d.",$n2='$v2'";
	IF ($n3<>'')$d=$d.",$n3='$v3'";	IF ($n4<>'')$d=$d.",$n4='$v4'";
	IF ($n5<>'')$d=$d.",$n5='$v5'";	IF ($n6<>'')$d=$d.",$n6='$v6'";
	IF ($n7<>'')$d=$d.",$n7='$v7'";	IF ($n8<>'')$d=$d.",$n8='$v8'";
	IF ($n9<>'')$d=$d.",$n9='$v9'";	IF ($n10<>'')$d=$d.",$n10='$v10'";
	
	IF ($n11<>'')$d=$d.",$n11='$v11'";	IF ($n12<>'')$d=$d.",$n12='$v12'";
	IF ($n13<>'')$d=$d.",$n13='$v13'";	IF ($n14<>'')$d=$d.",$n14='$v14'";
	IF ($n15<>'')$d=$d.",$n15='$v15'";	IF ($n16<>'')$d=$d.",$n16='$v16'";
	IF ($n17<>'')$d=$d.",$n17='$v17'";	IF ($n18<>'')$d=$d.",$n18='$v18'";
	IF ($n19<>'')$d=$d.",$n19='$v19'";	IF ($n20<>'')$d=$d.",$n20='$v20'";
	
	IF ($n21<>'')$d=$d.",$n21='$v21'";	IF ($n22<>'')$d=$d.",$n22='$v22'";
	IF ($n23<>'')$d=$d.",$n23='$v23'";	IF ($n24<>'')$d=$d.",$n24='$v24'";
	IF ($n25<>'')$d=$d.",$n25='$v25'";	IF ($n26<>'')$d=$d.",$n26='$v26'";
	IF ($n27<>'')$d=$d.",$n27='$v27'";	IF ($n28<>'')$d=$d.",$n28='$v28'";
	IF ($n29<>'')$d=$d.",$n29='$v29'";	IF ($n30<>'')$d=$d.",$n30='$v30'";
	IF ($n_modificando=='')$d=$d." WHERE ID_G='$_POST[Carta1]'";
	IF ($n_modificando<>'')$d=$d." WHERE $n_modificando='$v_modificando'";
	return $d;
}

function auto_tab($tabla,$na1,$va1,$repit1,$na2,$va2,$repit2,$na3,$va3,$repit3,$na4,$va4,$repit4,$n_id,$id,$n1,$v1,$n2,$v2,$n3,$v3,$n4,$v4,$n5,$v5,$n6,$v6,$n7,$v7,$n8,$v8,$n9,$v9,$n10,$v10){
	$d="UPDATE $tabla  SET	$n_id='$_POST[$id]'";
	IF ($n1<>'')$d=$d.",$n1='$v1'";
	IF ($n2<>'')$d=$d.",$n2='$v2'";
	IF ($n3<>'')$d=$d.",$n3='$v3'";
	IF ($n4<>'')$d=$d.",$n4='$v4'";
	IF ($n5<>'')$d=$d.",$n5='$v5'";
	IF ($n6<>'')$d=$d.",$n6='$v6'";
	IF ($n7<>'')$d=$d.",$n7='$v7'";
	IF ($n8<>'')$d=$d.",$n8='$v8'";
	IF ($n9<>'')$d=$d.",$n9='$v9'";
	IF ($n10<>'')$d=$d.",$n10='$v10'";
	
	IF ($na1<>''){
		for($x=1; $x<=$repit1; $x++){
			IF ($repit1>=$x)$d=$d.",";
			$Name1=$na1.$x;
			$Name2=$va1.$x;
			$d=$d."$Name1='$_POST[$Name2]'";
		}
	}
	IF ($na2<>''){
		for($x=1; $x<=$repit2; $x++){
			IF ($repit2>=$x)$d=$d.",";
			$Name1=$na2.$x;
			$Name2=$va2.$x;
			$d=$d."$Name1='$_POST[$Name2]'";
		}
	}
	IF ($na3<>''){
		for($x=1; $x<=$repit3; $x++){
			IF ($repit3>=$x)$d=$d.",";
			$Name1=$na3.$x;
			$Name2=$va3.$x;
			$d=$d."$Name1='$_POST[$Name2]'";
		}
	}
	IF ($na4<>''){
		for($x=1; $x<=$repit4; $x++){
			IF ($repit4>=$x)$d=$d.",";
			$Name1=$na4.$x;
			$Name2=$va4.$x;
			$d=$d."$Name1='$_POST[$Name2]'";
		}
	}
	$d=$d."WHERE ID_G='$_POST[Carta1]'";
	return $d;
}
?>