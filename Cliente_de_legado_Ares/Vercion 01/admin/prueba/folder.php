<?php
$type=hidden;
include('libre_fol.php');
echo "<input type='hidden' name='menu-list' value='".$_POST['menu-list']."'>";
if ($_POST[Carta]<>''){
$consu5=consulta('folio',$conexion);
include('descarga_cue.php');
}
if ($_POST[confi_dele]==Confirmar){delete();}
$tabla=folio;
$n_modificando=ID_G;$v_modificando=$_POST[Carta1];
$n_id=Revisado;$id=1;
include('espe_tab.php');
IF ($_POST[CambRevi]==Pendiente){MYSQL_QUERY($res,$conexion)or die("Error <br>$res");}
$tabla=folio;
$n_modificando=ID_G;$v_modificando=$_POST[Carta1];
$n_id=Revisado;$id=0;
include('espe_tab.php');
IF ($_POST[CambRevi]==Revisado){MYSQL_QUERY($res,$conexion)or die("Error <br>$res");}
//-------------------------------------------------------------
$size=0;
$style="background: rgba(5, 72, 108, 0.67) none repeat scroll 0% 0%; width: auto; width: 220px; left: -1px; color: white;";
$title='Nueva Cuenta';
$i1=1;                  $d1=input($type,Carta1,$_POST[Carta1],'',"color: $indc1;",'maxlength="4"').input(button,'',$_POST[Carta1],$_POST[Carta1]);
$i2=2;                  $d2=input($type,Carta2,$_POST[Carta2],'',"color: $indc2;",'maxlength="4"').input(button,'',$_POST[Carta2],$_POST[Carta2]);
$i3=3;                  $d3=input($type,Carta3,$_POST[Carta3],'',"color: $indc3;",'maxlength="4"').input(button,'',$_POST[Carta3],$_POST[Carta3]);
$i4=4;                  $d4=input($type,Carta4,$_POST[Carta4],'',"color: $indc4;",'maxlength="4"').input(button,'',$_POST[Carta4],$_POST[Carta4]);
$i5=Chofer;             $d5=input($type,chofer,$_POST[chofer],'',"color: $indc4;",'maxlength="4"').input(button,'',$_POST[chofer],$_POST[chofer]);
$i6=Placas;             $d6=input($type,placas,$_POST[placas],'',"color: $indc4;",'maxlength="4"').input(button,'',$_POST[placas],$_POST[placas]);
$i7=Cliente;            $d7=input($type,cliente,$_POST[cliente],'',"color: $indc4;",'maxlength="4"').input(button,'',$_POST[cliente],$_POST[cliente]);

$i8=Salida;             $d8=input(button,'',"$_POST[D]-$_POST[M]-$_POST[A]","$_POST[D]-$_POST[M]-$_POST[A]")				.input($type,D,$_POST[D]).input($type,M,$_POST[M]).input($type,A,$_POST[A]);
$i9=Regreso;			$d9=input(button,'',"$_POST[D_r]-$_POST[M_r]-$_POST[A_r]","$_POST[D_r]-$_POST[M_r]-$_POST[A_r]")	.input($type,D_r,$_POST[D_r]).input($type,M_r,$_POST[M_r]).input($type,A_r,$_POST[A_r]);

$i10=Flete;        		$d10=input($type,flete_r,$_POST[flete_r]).input(button,'',$_POST[flete_r],$_POST[flete_r]);
$i11="Kms inicio";      $d11=input($type,km_i,$_POST[km_i]).input(button,'',$_POST[km_i],$_POST[km_i]);
$i12="Kms fin";         $d12=input($type,km_f,$_POST[km_f]).input(button,'',$_POST[km_f],$_POST[km_f]);
$i13="N° Cuenta";       $d13=input($type,n_c,$_POST[n_c]).input(button,'',$_POST[n_c],$_POST[n_c]);
$i14=Cometa;            $d14="<TEXTAREA class='Medio'  maxleght='200' title='comentario general de el viaje' name='come'>$_POST[come]</TEXTAREA>";
$consu5=consulta('folio',$conexion);
$revi=compro($_POST[Carta1],ID_G,Revisado,$consu5,$conexion);

if(($revi==0)and($_POST[Carta1]<>'')){$d15=input(submit,CambRevi,Pendiente,'','color: red; background: #343434;');}
if(($revi==1)and($_POST[Carta1]<>'')){$d15=input(submit,CambRevi,Revisado,'','color: yellowgreen; background: #343434;');}
if($_POST[Carta1]<>'')$i15=input(submit,dele_cue,Eliminar,'Eliminar Permanentemente La cuenta');
if($_POST[dele_cue]==Eliminar){
	$i15=input(submit,confi_dele,Confirmar,'Este Proseso Es Ireversible Eliminando la Cuenta','color: red; background: #343434;');
}
$d17=input(submit,accion,LIMPIA);
include('tablero.php');
//---------------------------------------------------------------
print"
<div style='background: rgba(0, 0, 0, 0.77) none repeat scroll 0% 0%;
overflow: auto; overflow-x:hidden;
width: 110px; height: 368px; top: 230px; position: absolute;'>
	<table>
";
		$consu1=consulta('choferes_on',$conexion);
		mysql_data_seek($consu1,0);
		while($datos=mysql_fetch_array($consu1)){
			$color='';
			if ($_POST[chofer]==$datos[Nombre_Ch])$color=yellowgreen;
			$b1=input(submit,chofer	,$datos[Nombre_Ch],$datos[Nombre_Ch],"background: $color;");
			//print"<tr><td>$b1</td></tr>	";
			print "$b1<br>";
		}
print "
	</table>
</div>
";
//---------------------------------------------------------------
$style1="background: rgba(0, 0, 0, 0.77) none repeat scroll 0% 0%; overflow: auto; overflow-x: auto; position: absolute;
 left: 115px; height: 570px; width: 664px; top: 28px;";
$style2="background: rgba(100, 100, 100, 0.77) none repeat scroll 0% 0%; overflow: auto; overflow-x:hidden; position: absolute;
 left: 115px; height: 28px; width: 664px; top: 0px;";

$style0="background: rgba(100, 100, 100, 0.77) 	none repeat scroll 0% 0%; overflow: auto; overflow-x:hidden; position: absolute;
 left: 115px; height: 28px; width: 664px; top: 0px;";
$style1="background: rgba(0, 0, 0, 0.77) 		none repeat scroll 0% 0%; overflow: auto; overflow-x: auto; position: absolute;
 left: 115px; height: 542px; width: 664px; top: 56px;";
$style2="background: rgba(100, 100, 100, 0.77) 	none repeat scroll 0% 0%; overflow: auto; overflow-x:hidden; position: absolute;
 left: 115px; height: 28px; width: 664px; top: 28px;";
if ($_POST[chofer]==Choferes){
$b1=input(button,'',Nombre);
$b2=input(button,'','N° Cuentas');
$b6=input(submit,chofer,chofer,'Todos los Choferes');
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
		$consu1=consulta('choferes_on',$conexion);
		mysql_data_seek($consu1,0);
		while($datos=mysql_fetch_array($consu1)){
			$b1=input(submit,chofer	,$datos[Nombre_Ch]);
			$b2=input(submit,''		,$datos[ulti_viaje]);
			print"
				<tr>
					<td>$b1</td><td>$b2</td><td>$b3</td><td>$b4</td><td>$b5</td><td>$b6</td><td>$b7</td>
				</tr>
			";
		}	
print"
	</table>
 </div>
"; 
}
//--------------------------------------------------------
$n2="Inicio	".despieges(D_i,Dia,1,31).despieges(M_i,Mes,1,12).despieges(A_i,Año,2015,2030);
$n3="Fin	".despieges(D_f,Dia,1,31).despieges(M_f,Mes,1,12).despieges(A_f,Año,2015,2030);	
$fec_ini=$_POST[A_i].zero($_POST[M_i]).zero($_POST[D_i]);
$fec_fin=$_POST[A_f].zero($_POST[M_f]).zero($_POST[D_f]);
if ($_POST[chofer]<>Choferes){
print "
 <div style='$style0'>
	<table><tr><td>$n1</td><td>$n2</td><td>$n3</td><td>$n4</td><td>$n5</td><td>$n6</td></tr></table>
 </div>
";
$b1=input(button,'',N°		,'','width: 40px;');
$b2=input(button,'',Cuente	,'','width: 60px;');
$b3=input(button,'',Saldo	,'','width: 70px;');
$b4=input(button,'',sueldo);
$b5=input(button,'',Cliente);
$b6=input(button,'',Fecha);
$b7=input(button,'',Revision,'','width: 70px;');
$b8=input(button,'',Estado	,'','width: 80px;');
print "
 <div style='$style2'>
	<table>
		<tr>
			<td>$b1</td><td>$b2</td><td>$b3</td><td>$b4</td><td>$b5</td><td>$b6</td><td>$b7</td><td>$b8</td><td>$b9</td>
		</tr>
	</table>
 </div>
 <div style='$style1'>
	<table>
		
";
		$x=0;
		$consu5=consulta('folio',$conexion,'','',ID_G,1);
		mysql_data_seek($consu5,0);
		while($datos=mysql_fetch_array($consu5)){
			if (($_POST[chofer]==$datos[CHOFER])or($_POST[chofer]==chofer)){
				$x++;
			}
		}			
		$consu5=consulta('folio',$conexion,'','',ID_G,1);
		mysql_data_seek($consu5,0);
		while($datos=mysql_fetch_array($consu5)){
			if (($_POST[chofer]==$datos[CHOFER])or($_POST[chofer]==chofer)){
                
				$consu24=consulta('abo_acu',$conexion);
				mysql_data_seek($consu24,0);
				while($dato=mysql_fetch_array($consu24)){
					if($dato[ID_G]==$datos[ID_G]){break;}
				}
				$c0='';	$c1='';	$c2='';
				if($datos[Revisado]==0){$c2=white;	$c0=red;			$Revisado="Pendiente";}
				if($datos[Revisado]==1){$c2=white;	$c0=yellowgreen;	$Revisado="Revisada";}
				if($dato[add_en]==''){$c1='#121212';	$Estado="Libre";}
				if($dato[add_en]<>''){$c1='#343434';	$Estado="Arrastrada";}
				
				$b1=input(button,'',$x	,''				,"width: 40px;");
				$b2=input(submit,Carta,$datos[ID_G]		,''				,"background: $c1; color:$c2; width: 60px;");
				$b3=input(button,'',$dato[Total_Total]	,''				,"background: $c1; color:$c2; width: 70px;");
				$b4=input(button,'',$datos[sueldo]		,''				,"background: $c1; color:$c2;");
				$b5=input(button,'',$datos[CLIENTE]		,$datos[CLIENTE],"background: $c1; color:$c2;");
             
                $D=compro($datos[ID_G],ID_G,D,$consu4,$conexion);
                $M=compro($datos[ID_G],ID_G,M,$consu4,$conexion);
                $A=compro($datos[ID_G],ID_G,A,$consu4,$conexion);
                $fecha='';
                $fecha="$D-$M-$A";
                $fec_set=$A.zero($M).zero($D);
				$b6=input(button,'',$fecha);
				$b7=input(button,'',$Revisado			,'',"background: $c1; color:$c0; width: 70px;");
				$b8=input(button,'',$Estado				,'',"background: $c1; color:$c2; width: 80px;");
				$b9='';
                IF(($fec_ini<=$fec_set)&&($fec_fin>=$fec_set)){
				print "
					<tr >
						<td>$b1</td><td>$b2</td><td>$b3</td><td>$b4</td><td>$b5</td><td>$b6</td><td>$b7</td><td>$b8</td><td>$b9</td>
					</tr>
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
echo input($type,comi,$_POST[comi]);
echo input($type,presio_d,$_POST[presio_d]);
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
echo"<div style='width: 100px; height: 220px; color: white; background: rgba(0, 0, 0, 0.77) none repeat scroll 0% 0%;'>";
echo"</div>";

?>