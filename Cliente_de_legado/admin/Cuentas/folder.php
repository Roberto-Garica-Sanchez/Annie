<?php
$type=hidden;
include('libre_fol.php');
echo input2(hidden,'menu-list','',$_POST['menu-list']);
if ($_POST[Carta]<>''){
$consu5=consulta(folio,$conexion,"","","","",$phpv);
include('descarga_cue.php');
}

if ($_POST[confi_dele]==Confirmar){delete($conexion,$phpv);}
	$tabla=folio;
	$n_modificando=ID_G;
	$v_modificando=$_POST[Carta1];
	$n_id=Revisado;$id=1;
include('espe_tab.php');
IF ($_POST[CambRevi]==Pendiente){ejecuta($conexion,$res,$phpv);}
	$tabla=folio;
	$n_modificando=ID_G;
	$v_modificando=$_POST[Carta1];
	$n_id=Revisado;$id=0;
include('espe_tab.php');
IF ($_POST[CambRevi]==Revisado){ejecuta($conexion,$res,$phpv);}
	$tabla=choferes_on;
	$n_modificando=Nombre_Ch;
	$v_modificando=$_POST[chofer];
	$n_id=Estatus;$id=0;
include('espe_tab.php');
IF ($_POST[accion]==Suspender){ejecuta($conexion,$res,$phpv);}
//-------------------------------------------------------------
$size=0;
$style="background: rgba(5, 72, 108, 0.67) none repeat scroll 0% 0%; width: auto; width: 220px; left: -1px; color: white;";
$title1=input2(button,'',$_POST[chofer],'Folder de ');
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
$i14=Cometa;            $d14="<TEXTAREA class='Medio' id='comenta' maxleght='200' title='comentario general de el viaje' name='come'>$_POST[come]</TEXTAREA>";
$consu5=consulta(folio,$conexion,"","","","",$phpv);
$revi=compro($_POST[Carta1],ID_G,Revisado,$consu5,$conexion,$phpv);

if(($revi==0)and($_POST[Carta1]<>'')){	$d15=input2(submit,CambRevi,Pendiente,'','color: red; background: #343434;');}
if(($revi==1)and($_POST[Carta1]<>'')){	$d15=input2(submit,CambRevi,Revisado,'','color: yellowgreen; background: #343434;');}
if($_POST[Carta1]<>''){					$i15=input2(submit,dele_cue,'',Eliminar,'Eliminar Permanentemente La cuenta');}
if($_POST[dele_cue]==Eliminar){			$i15=input2(submit,confi_dele,'',Confirmar,'Este Proseso Es Ireversible Eliminando la Cuenta','color: red; background: #343434;');}
$i17=input2(submit,accion,'',Suspender);$d17=input2(submit,accion,'',LIMPIA);
include('tablero.php');
//---------------------------------------------------------------
print"
<div style='color: white; background: rgba(0, 0, 0, 0.77) none repeat scroll 0% 0%; overflow: auto; overflow-x:hidden; width: 110px; height: 368px; top: 230px; position: absolute;'>
	<table>
";
		$consu1=consulta('choferes',$conexion,"","",Nombre_Ch,'',$phpv);
		mysql_da_se($consu1,0,$phpv);
		while($datos=mysql_fe_ar($consu1,$phpv)){
			$style='';
			$title=$datos[Nombre_Ch];
			$title=$title."\r N° de Cuentas: ".$datos[ulti_viaje];
			if ($_POST[chofer]==$datos[Nombre_Ch])$style='background: white; color: black;';
			
			if ($datos[Estatus]=='')$b1=input2(submit,chofer,$title,$datos[Nombre_Ch],$style);
			print "$b1<br>";
		}
print "
	</table>
</div>
";
//---------------------------------------------------------------

$style0="background: rgba(100, 100, 100, 0.77) 	none repeat scroll 0% 0%; overflow: auto; overflow-x:hidden; position: absolute;
 left: 115px; height: 28px; width: 664px; top: 0px;";
$style1="color: white; background: rgba(0, 0, 0, 0.77) 		none repeat scroll 0% 0%; overflow: auto; overflow-x: auto; position: absolute;
 left: 115px; height: 542px; width: 664px; top: 56px;";
$style2="background: rgba(100, 100, 100, 0.77) 	none repeat scroll 0% 0%; overflow: auto; overflow-x:hidden; position: absolute;
 left: 115px; height: 28px; width: 664px; top: 28px;";
if ($_POST[chofer]==Choferes){
$b1=input2(button,'','',Nombre);
$b2=input2(button,'','','N° Cuentas');
$b6=input2(submit,chofer,'',chofer,'Todos los Choferes');
print "
 <div style='$style2'>
	<table>
		<tr>
			<td>$b1</td><td>$b2</td><td>$b3</td><td>$b4</td><td>$b5</td><td>$b6</td><td>$b7</td>
		</tr>
	</table>
 </div>
 <div style='$style1'>
	<table>
";
		$consu1=consulta('choferes_on',$conexion,"","","","",$phpv);
		mysql_da_se($consu1,0,$phpv);
		while($datos=mysql_fe_ar($consu1,$phpv)){
			$b1=input2(submit,chofer	,'',$datos[Nombre_Ch]);
			$b2=input2(submit,''		,'',$datos[ulti_viaje]);
			print"<tr><td>$b1</td><td>$b2</td><td>$b3</td><td>$b4</td><td>$b5</td><td>$b6</td><td>$b7</td></tr>
			";
		}	
print"
	</table>
 </div>
"; 
}
//--------------------------------------------------------
if ($_POST[chofer]<>Choferes){
if ($_POST[D_i]==''){$_POST[D_i]=1;}
if ($_POST[M_i]==''){$_POST[M_i]=date("m");}
if ($_POST[A_i]==''){$_POST[A_i]=date("Y");}
if ($_POST[D_f]==''){$_POST[D_f]=31;}
if ($_POST[M_f]==''){$_POST[M_f]=date("m");}
if ($_POST[A_f]==''){$_POST[A_f]=date("Y");}
$n2="Inicio	".despieges(D_i,Dia,1,31).despieges(M_i,Mes,1,12).despieges(A_i,Año,2015,2030);
$n3="Fin	".despieges(D_f,Dia,1,31).despieges(M_f,Mes,1,12).despieges(A_f,Año,2015,2030);	
$fec_ini=$_POST[A_i].zero($_POST[M_i]).zero($_POST[D_i]);
$fec_fin=$_POST[A_f].zero($_POST[M_f]).zero($_POST[D_f]);
print "<div style='$style0'><table><tr><td>$n1</td><td>$n2</td><td>$n3</td><td>$n4</td><td>$n5</td><td>$n6</td></tr></table></div>";
print "
 <div style='$style1'>
	<table>
";
		$x=0;
		$consu5=consulta('folio',$conexion,'','',ID_G,1,$phpv);
		mysql_da_se($consu5,0,$phpv);
		while($datos=mysql_fe_ar($consu5,$phpv)){	
			if (($_POST[chofer]==$datos[CHOFER])or($_POST[chofer]==chofer)){
				$x++;
			}
		}			
		$consu5=consulta('folio',$conexion,'','',ID_G,1,$phpv);
		$re=0;		$pe=0;	$n_cuen=0;
		$suldo=0;
		mysql_da_se($consu5,0,$phpv);
		while($datos=mysql_fe_ar($consu5,$phpv)){
			if (($_POST[chofer]==$datos[CHOFER])or($_POST[chofer]==chofer)){
                
				$consu24=consulta(abo_acu,$conexion,'','','','',$phpv);
				mysql_da_se($consu24,0,$phpv);
				while($dato=mysql_fe_ar($consu24,$phpv)){
					if($dato[ID_G]==$datos[ID_G]){break;}
				}
				$c0='';	$c1='';	$c2='';
				if($datos[Revisado]==0)	{$c2=white;		$c0=red;			$Revisado="Pendiente";	}
				if($datos[Revisado]==1)	{$c2=white;		$c0=yellowgreen;	$Revisado="Revisada";	}
				if($dato[add_en]=='')	{$c1='#121212';	$Estado="Libre";}
				if($dato[add_en]<>'')	{$c1='#343434';	$Estado="Arrastrada";}
				
				$b1=input2(button,'',''		,$x					,"width: 40px;");
				$b2=input2(submit,Carta,''	,$datos[ID_G]		,"background: $c1; color:$c2; width: 60px;");
				$b3=input2(button,'',''		,round($dato[Total_Total])	,"background: $c1; color:$c2; width: 70px;");
				$b4=input2(button,'',''		,round($datos[sueldo])		,"background: $c1; color:$c2;");
				$b5=input2(button,''		,$datos[CLIENTE]	,$datos[CLIENTE],"background: $c1; color:$c2;");
				
                $D=compro($datos[ID_G],ID_G,D,$consu4,$conexion,$phpv);
                $M=compro($datos[ID_G],ID_G,M,$consu4,$conexion,$phpv);
                $A=compro($datos[ID_G],ID_G,A,$consu4,$conexion,$phpv);
                $fecha='';
                $fecha="$D-$M-$A";
                $fec_set=$A.zero($M).zero($D);				
				$add_en="Arrastrada En: ".$dato[add_en]."\rArrastrando \r1°-".$dato[ID_ac1]."\r2°-".$dato[ID_ac2]."\r3°-".$dato[ID_ac3]."\r4°-".$dato[ID_ac4]."\r5°-".$dato[ID_ac5];
				$b6=input2(button,'','',$fecha);
				$b7=input2(button,'','',$Revisado	,"background: $c1; color:$c0; width: 70px;");
				$b8=input2(button,'',$add_en,$Estado		,"background: $c1; color:$c2; width: 80px;");
				$b9='';
                IF(($fec_ini<=$fec_set)&&($fec_fin>=$fec_set)){	
				$n_cuen=$n_cuen+1;
				$sueldo=$sueldo+$datos[sueldo];						
				if($datos[Revisado]==0)	{$pe=$pe+1;}
				if($datos[Revisado]==1)	{$re=$re+1;}
				print "
					<tr ><td>$b1</td><td>$b2</td><td>$b3</td><td>$b4</td><td>$b5</td><td>$b6</td><td>$b7</td><td>$b8</td><td>$b9</td></tr>
				";
                }
				$x--;
			}
			
		}
echo"
	</table>
 </div>";
$suld_pro=round($sueldo/$n_cuen,2);
$b1=input2(button,'',"Total de Cuentas Visibles:".$n_cuen,N°		,'width: 40px;');
$b2=input2(button,'','',Cuente	,'width: 60px;');
$b3=input2(button,'',"",Saldo	,'width: 70px;');
$b4=input2(button,'',"Sueldo \rTotal: ".$sueldo."\rPromedio: ".$suld_pro,Sueldo);
$b5=input2(button,'','',Cliente);
$b6=input2(button,'',"",Fecha);
$b7=input2(button,'',"Cuentas \rRevisada: ".$re."\rPendientes: ".$pe,Revision,'width: 70px;');
$b8=input2(button,'','',Estado	,'width: 80px;');
echo" 
 <div style='$style2'>
	<table><tr><td>$b1</td><td>$b2</td><td>$b3</td><td>$b4</td><td>$b5</td><td>$b6</td><td>$b7</td><td>$b8</td><td>$b9</td></tr></table>
 </div>
";
}
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
			presenta2 (memoria_ac	,'ID_ac_m','ac_m',$type);
//-------------------------------------------------------------
echo input2($type,comi		,'',$_POST[comi]);
echo input2($type,presio_d	,'',$_POST[presio_d]);
print input2($type,hidden_fe,'',$_POST[hidden_fe]);
print input2($type,hidden_v	,'',$_POST[hidden_v]);
print input2($type,hidden_d	,'',$_POST[hidden_d]);
print input2($type,hidden_c	,'',$_POST[hidden_c]);
print input2($type,hidden_c_viav,$_POST[hidden_c_via]);
print input2($type,hidden_f	,'',$_POST[hidden_f]);
print input2($type,hidden_r	,'',$_POST[hidden_r]);
print input2($type,hidden_g	,'',$_POST[hidden_g]);
print input2($type,hidden_m	,'',$_POST[hidden_m]);
print input2($type,hidden_c	,'',$_POST[hidden_c]);
print input2($type,hidden_ab,'',$_POST[hidden_ab]);
print input2($type,hidden_ac,'',$_POST[hidden_ac]);
print input2($type,memoria_ac,'',$_POST[memoria_ac]);
print input2($type,hidden_ac_a,'',$_POST[hidden_ac_a]);
echo"<div style='width: 100px; height: 220px; color: white; background: rgba(0, 0, 0, 0.77) none repeat scroll 0% 0%;'>";
echo"</div>";

?>