<?php //php7
	echo input2(hidden,'menu-list','',$_POST['menu-list']);
	include('libre_bau2.php');
	if ($_POST[Carta]<>''){
		$consu5=consulta('folio',$conexion);
		include('descarga_cue.php');
	}
	$type=hidden;
	$size=0;
	$style="background: rgba(5, 72, 108, 0.67) none repeat scroll 0% 0%; width: auto; width: 220px; left: -1px; color: white;";
	$title='Choferes inactivos';
	$i1=1;                  $d1=input2($type,Carta1,'',$_POST[Carta1],"color: $indc1;",'maxlength="4"').input2(button,'',$_POST[Carta1],$_POST[Carta1]);
	$i2=2;                  $d2=input2($type,Carta2,'',$_POST[Carta2],"color: $indc2;",'maxlength="4"').input2(button,'',$_POST[Carta2],$_POST[Carta2]);
	$i3=3;                  $d3=input2($type,Carta3,'',$_POST[Carta3],"color: $indc3;",'maxlength="4"').input2(button,'',$_POST[Carta3],$_POST[Carta3]);
	$i4=4;                  $d4=input2($type,Carta4,'',$_POST[Carta4],"color: $indc4;",'maxlength="4"').input2(button,'',$_POST[Carta4],$_POST[Carta4]);
	$i5=Chofer;             $d5=input2($type,chofer,'',$_POST[chofer],"color: $indc4;",'maxlength="4"').input2(button,'',$_POST[chofer],$_POST[chofer]);
	$i6=Placas;             $d6=input2($type,placas,'',$_POST[placas],"color: $indc4;",'maxlength="4"').input2(button,'',$_POST[placas],$_POST[placas]);
	$i7=Cliente;            $d7=input2($type,cliente,'',$_POST[cliente],"color: $indc4;",'maxlength="4"').input2(button,'',$_POST[cliente],$_POST[cliente]);
	$i8=Salida;             $d8=input2(button,'','',"$_POST[D]-$_POST[M]-$_POST[A]","$_POST[D]-$_POST[M]-$_POST[A]")				.input2($type,D,'',$_POST[D])		.input2($type,M,'',$_POST[M])		.input2($type,A,'',$_POST[A]);
	$i9=Regreso;			$d9=input2(button,'','',"$_POST[D_r]-$_POST[M_r]-$_POST[A_r]","$_POST[D_r]-$_POST[M_r]-$_POST[A_r]")	.input2($type,D_r,'',$_POST[D_r])	.input2($type,M_r,'',$_POST[M_r])	.input2($type,A_r,'',$_POST[A_r]);
	$i10=Flete;        		$d10=input2($type,flete_r,'',$_POST[flete_r])	.input2(button,'',$_POST[flete_r],$_POST[flete_r]);
	$i11="Kms inicio";      $d11=input2($type,km_i,'',$_POST[km_i])			.input2(button,'',$_POST[km_i],$_POST[km_i]);
	$i12="Kms fin";         $d12=input2($type,km_f,'',$_POST[km_f])			.input2(button,'',$_POST[km_f],$_POST[km_f]);
	$i13="N° Cuenta";       $d13=input2($type,n_c,'',$_POST[n_c])			.input2(button,'',$_POST[n_c],$_POST[n_c]);
	$i14=Cometa;            $d14="<TEXTAREA class='Medio'  maxleght='200' title='comentario general de el viaje' name='come'>$_POST[come]</TEXTAREA>";
	$d15=date("d/m/Y");
	include('tablero.php');
	$type=submit;			$name=chofer;
	$consu=$consu1_2;		$descarga='';
	$style="background: rgba(0, 0, 0, 0.77) none repeat scroll 0% 0%; overflow: auto; overflow-x:hidden; width: 110px; height: 368px; top: 230px; position: absolute;";
	$b=lista_chofer($type,$name,$consu,$descarga,$style,$conexion);
	
	$style0="background: rgba(100, 100, 100, 0.77) 	none repeat scroll 0% 0%; overflow: auto; overflow-x:hidden; position: absolute;
	 left: 115px; height: 28px; width: 664px; top: 0px;";
	$style1="background: rgba(0, 0, 0, 0.77) 		none repeat scroll 0% 0%; overflow: auto; overflow-x: auto; position: absolute;
	 left: 115px; height: 542px; width: 664px; top: 56px;";
	$style2="background: rgba(100, 100, 100, 0.77) 	none repeat scroll 0% 0%; overflow: auto; overflow-x:hidden; position: absolute;
	 left: 115px; height: 28px; width: 664px; top: 28px;";
	if ($_POST[chofer]<>Choferes){
		if ($_POST[D_i]==''){$_POST[D_i]=1;}
		if ($_POST[M_i]==''){$_POST[M_i]=date("m");}
		if ($_POST[A_i]==''){$_POST[A_i]=date("Y");}
		if ($_POST[D_f]==''){$_POST[D_f]=31;}
		if ($_POST[M_f]==''){$_POST[M_f]=date("m");}
		if ($_POST[A_f]==''){$_POST[A_f]=date("Y");}
		$n1="";
		$n2="Inicio	".despieges(D_i,Dia,1,31).despieges(M_i,Mes,1,12).despieges(A_i,Año,2015,2030);
		$n3="Fin	".despieges(D_f,Dia,1,31).despieges(M_f,Mes,1,12).despieges(A_f,Año,2015,2030);	
		$fec_ini=$_POST[A_i].zero($_POST[M_i]).zero($_POST[D_i]);
		$fec_fin=$_POST[A_f].zero($_POST[M_f]).zero($_POST[D_f]);
		echo "<div style='$style0'><table><tr><td>$n1</td><td>$n2</td><td>$n3</td><td>$n4</td><td>$n5</td><td>$n6</td></tr></table></div>";
		$b1=input2(button,'','',N°		,'width: 40px;');
		$b2=input2(button,'','',Cuente	,'width: 60px;');
		$b3=input2(button,'','',Saldo	,'width: 70px;');
		$b4=input2(button,'','',sueldo);
		$b5=input2(button,'','',Cliente);
		$b6=input2(button,'','',Fecha);
		$b7=input2(button,'','',Revision,'width: 70px;');
		$b8=input2(button,'','',Estado	,'width: 80px;');
		if ($b<>''){
			echo "
			<div style='$style2'>
				<table><tr><td>$b1</td><td>$b2</td><td>$b3</td><td>$b4</td><td>$b5</td><td>$b6</td><td>$b7</td><td>$b8</td><td>$b9</td></tr></table>
			</div>
			<div style='$style1'>
				<table>
			";
				$x=0;
				$consu5=consulta('folio',$conexion,'','',ID_G,1);
				mysqli_data_seek($consu5,0);
				while($datos=mysqli_fetch_array($consu5)){
					if (($_POST[chofer]==$datos[CHOFER])or($_POST[chofer]==chofer)){
						$x++;
					}
				}			
				$consu5=consulta('folio',$conexion,'','',ID_G,1);
				mysqli_data_seek($consu5,0);
				while($datos=mysqli_fetch_array($consu5)){
					if (($_POST[chofer]==$datos[CHOFER])or($_POST[chofer]==chofer)){
						
						$consu24=consulta('abo_acu',$conexion);
						mysqli_data_seek($consu24,0);
						while($dato=mysqli_fetch_array($consu24)){
							if($dato[ID_G]==$datos[ID_G]){break;}
						}
						$c0='';	$c1='';	$c2='';
						if($datos[Revisado]==0)	{$c2=white;		$c0=red;			$Revisado="Pendiente";}
						if($datos[Revisado]==1)	{$c2=white;		$c0=yellowgreen;	$Revisado="Revisada";}
						if($dato[add_en]=='')	{$c1='#121212';	$Estado="Libre";}
						if($dato[add_en]<>'')	{$c1='#343434';	$Estado="Arrastrada";}
						
						$b1=input2(button,'',''		,$x					,"width: 40px;");
						$b2=input2(submit,Carta,''	,$datos[ID_G]		,"background: $c1; color:$c2; width: 60px;");
						$b3=input2(button,'',''		,$dato[Total_Total]	,"background: $c1; color:$c2; width: 70px;");
						$b4=input2(button,'',''		,$datos[sueldo]		,"background: $c1; color:$c2;");
						$b5=input2(button,''		,$datos[CLIENTE]	,$datos[CLIENTE],"background: $c1; color:$c2;");
					 
						$D=compro($datos[ID_G],ID_G,D,$consu4,$conexion);
						$M=compro($datos[ID_G],ID_G,M,$consu4,$conexion);
						$A=compro($datos[ID_G],ID_G,A,$consu4,$conexion);
						$fecha='';
						$fecha="$D-$M-$A";
						$fec_set=$A.zero($M).zero($D);
						$b6=input2(button,'','',$fecha);
						$b7=input2(button,'','',$Revisado	,"background: $c1; color:$c0; width: 70px;");
						$b8=input2(button,'','',$Estado		,"background: $c1; color:$c2; width: 80px;");
						$b9='';
						IF(($fec_ini<=$fec_set)&&($fec_fin>=$fec_set)){
						print "
							<tr ><td>$b1</td><td>$b2</td><td>$b3</td><td>$b4</td><td>$b5</td><td>$b6</td><td>$b7</td><td>$b8</td><td>$b9</td></tr>
						";
						}
						$x--;
					}
					
				}
			print "
				</table>
			 </div>
			";
		}
	}
?>