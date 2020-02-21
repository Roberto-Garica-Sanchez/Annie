<?php //php7
	/*
	------------function requeridas[Libreria/funcion(s)]
	--> "libre_uni.php"
	*/		
	/*
	error_reporting(0);
	ini_set('display_errors',false);
	error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE );
	*/
	date_default_timezone_set("Mexico/General");
	$phpv=php7;//vercion de php con que estara trabajando 
	$uno_para_todos=1;
	$ruta="../";
	include($ruta."libre_uni.php");
	if ($libre==''){echo"Error de Carga 'libre_uni'";}$libre='';	
	include($ruta."login/login.php");
	if ($libre==''){echo"Error de Carga 'login'";}$libre='';
	db('empresa',$conexion,$phpv);
	$chofer=$_POST[nombre];
	$fec_ini=$_POST[fec_ini];
	$fec_fin=$_POST[fec_fin];
	if($chofer<>chofer)$consu5=consulta('folio',$conexion,CHOFER,$chofer,ID_G	,1,$phpv);
	if($chofer==chofer)$consu5=consulta('folio',$conexion,''	,''		,ID_G	,1,$phpv);
	mysql_da_se($consu5,0,$phpv);
	echo"<table>";
	$x=0;
	while($datos=mysql_fe_ar($consu5,$phpv)){	
		$res1=consulta(fechas	,$conexion,ID_G,$datos[ID_G],'','',$phpv);
		$res2=consulta(abo_acu	,$conexion,ID_G,$datos[ID_G],'','',$phpv);
		mysql_da_se($res1,0,$phpv);
		mysql_da_se($res2,0,$phpv);
		$dato1=mysql_fe_ar($res1,$phpv);
		$dato2=mysql_fe_ar($res2,$phpv);
		$D=$dato1[D];$A=$dato1[A];$M=$dato1[M];
		$D_c=$dato1[D_c];$A_c=$dato1[A_c];$M_c=$dato1[M_c];
		$fec_set=$A.zero($M).zero($D);
		$fec_reg="$D_c-$M_c-$A_c";
		$fecha="$D-$M-$A";
		if ((($chofer==$datos[CHOFER])or($chofer==chofer))&&(($fec_ini<=$fec_set)	&&($fec_fin>=$fec_set))){
			$x=$x+1;
			$c0='';	$c1='';	$c2='';
			if($datos[Revisado]==0)	{$c2=white;		$c0=red;			$Revisado="Pendiente";	}
			if($datos[Revisado]==1)	{$c2=white;		$c0=yellowgreen;	$Revisado="Revisada";	}
			if($dato2[add_en]=='')	{$c1='#121212';	$Estado="Libre";}
			if($dato2[add_en]<>'')	{$c1='#343434';	$Estado="Arrastrada";}
			$b1=input2(button,''	,''				,$datos[N_Cuenta]			,"width: 40px;");
			$b2=input2(submit,Carta	,''				,$datos[ID_G]				,"background: $c1; color:$c2; width: 60px;");
			$b3=input2(button,''	,''				,round($dato2[Total_Total])	,"background: $c1; color:$c2; width: 70px;");
			$b4=input2(button,''	,''				,round($datos[sueldo])		,"background: $c1; color:$c2;");
			$b5=input2(button,''	,$datos[CLIENTE],$datos[CLIENTE]			,"background: $c1; color:$c2;");
			$b6=input2(button,'',"Registrada: $fec_reg\rModificado",$fecha);
			$b7=input2(button,'','',$Revisado	,"background: $c1; color:$c0; width: 70px;");
			$add_en="Arrastrada En: ".$dato2[add_en]."\rArrastrando \r1°-".$dato2[ID_ac1]."\r2°-".$dato2[ID_ac2]."\r3°-".$dato2[ID_ac3]."\r4°-".$dato2[ID_ac4]."\r5°-".$dato2[ID_ac5];
			$b8=input2(button,'',$add_en,$Estado		,"background: $c1; color:$c2; width: 80px;");
			print "
					<tr ><td>$b1</td><td>$b2</td><td>$b3</td><td>$b4</td><td>$b5</td><td>$b6</td><td>$b7</td><td>$b8</td><td>$b9</td></tr>
			";
		}
	}
	if ($x==0){echo"<tr><td><img src='img/vacio-sistem.png' style='width: 300px; height: 300px;'></td></tr>";}
	echo"</table>";
	
?>
