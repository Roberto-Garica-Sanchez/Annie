<?php 
/*
$hidden_fe=5;
$hidden_v=5;
$hidden_d=7;
$hidden_c=20;
$hidden_c_via=20;
$hidden_f=5;
$hidden_r=10;
$hidden_g=5;
$hidden_m=6;
$hidden_ab=5;
$hidden_ac=5;
*/
/*
if ($_POST[hidden_fe]==0)   {$_POST[hidden_fe]=1;}
if ($_POST[hidden_v]==0)    {$_POST[hidden_v]=1;}
if ($_POST[hidden_d]==0)    {$_POST[hidden_d]=1;}
if ($_POST[hidden_c]==0)    {$_POST[hidden_c]=1;}
if ($_POST[hidden_f]==0)    {$_POST[hidden_f]=1;}
if ($_POST[hidden_c_via]==0){$_POST[hidden_c_via]=1;}
if ($_POST[hidden_r]==0)    {$_POST[hidden_r]=1;}
if ($_POST[hidden_g]==0)    {$_POST[hidden_g]=1;}
if ($_POST[hidden_m]==0)    {$_POST[hidden_m]=1;}
if ($_POST[hidden_ab]==0)   {$_POST[hidden_ab]=1;}
if ($_POST[hidden_ac]==0)   {$_POST[hidden_ac]=1;}
*/
/*
$consu1=consulta('choferes'	           ,$conexion,'','',Nombre_Ch,1);
$consu1_1=consulta('choferes_off'  ,$conexion);
$consu1_2=consulta('choferes_on'   ,$conexion);
$consu2=consulta('placas'              ,$conexion);
$consu3=consulta('clientes'            ,$conexion);
$consu4=consulta('fechas'	           ,$conexion);
$consu5=consulta('folio'	           ,$conexion);
$consu6=consulta('fletes'	           ,$conexion);
$consu7=consulta('viaticos'	           ,$conexion);
$consu8=consulta('disel'	           ,$conexion);
$consu9=consulta('casetas'	           ,$conexion);
$consu10=consulta('facturas'	       ,$conexion);
$consu11=consulta('ryr'		           ,$conexion);
$consu12=consulta('guias'	           ,$conexion);
$consu13=consulta('maniobras'	       ,$conexion);
$consu14=consulta('km'		           ,$conexion);

$consu16=consulta('fletes_c'	       ,$conexion);
$consu17=consulta('viaticos_c'	       ,$conexion);
$consu18=consulta('disel_c'	           ,$conexion);
$consu19=consulta('casetas_c'	       ,$conexion);
$consu20=consulta('facturas_c'	       ,$conexion);
$consu21=consulta('ryr_c'	           ,$conexion);
$consu22=consulta('guias_c'	           ,$conexion);
$consu23=consulta('maniobras_c'	       ,$conexion);
$consu24=consulta('abo_acu' 	       ,$conexion);*/
/*
function despliegre_mysql($name,$name2,$consu,$descarga){
	$d=$d."<select class='Medio' name='$name'>";
	if($name2<>'')$d=$d."<OPTION value='$name'>$name2</OPTION>";
        mysql_data_seek($consu,0);
        while($datos=mysql_fetch_array($consu))
        {       $set='';
                if($datos[$descarga]==$_POST[$name]){$set='selected';}
                $d=$d."<option value='$datos[$descarga]' $set>$datos[$descarga]</option>";
        }
	$d=$d."</select>";
	return $d;
}
*//*
function despieges($name,$title,$inicio,$fin){
	$d=$d."<select name='$name' class='Medio' style='width: auto;' title='$title'>";
	for($x=$inicio; $x<=$fin; $x++){
        $set='';
		$x=zero($x);
		if($_POST[$name]==$x){$set='selected';}
		$d=$d."<option value='$x' $set>$x</option>";
	}
	$d=$d.'</select>';
	return $d;
}
function zero($valor){
 $res=str_pad($valor,2, '0', STR_PAD_LEFT);
 return $res;
}*/
function Presenta1($type,$type1,$type2,$x,$n1,$n2,$v1,$v2,$n_r1,$n_r2,$title1,$title2,$focus1,$focus2,$max1,$max2,$style1,$style2){
	if($type<>hidden){
	echo"
		<tr >
			<td >$x</td >
			<td ><input type='$type1' name='$n1' value='$v1' title='$title1' Class='Medio' $focus1 maxlength='$max1' style='$style1'>	</td >
			<td ><input type='$type2' name='$n2' value='$v2' title='$title2' Class='Medio' $focus2 maxlength='$max2' style='$style2'>	</td >
		</tr >";
	}
	if($type==hidden){
		echo"
		<tr >   
			<td>$x</td>
			<td >$name1</td >
			<td >$name2</td >
		</tr >";
   }
}/*
function presenta2($hidden,$name1,$name2,$type,$style,$borra,$consu){
    for($x=1; $x<=$_POST[$hidden]; $x++){
            $Name1=$name1.$x;
            $Name2=$name2.$x;
            if(($_POST[$Name1]=='')and($_POST[$Name2]=='')and($_POST[$hidden]>1)){$_POST[$hidden]=$_POST[$hidden]-1;}
    }
	for($x=1; $x<=$_POST[$hidden]; $x++){
		$y=$x+1;
		$Name1=$name1.$x;
        $Name2=$name2.$x;
		$Name3=$name1.$y;
		$Name4=$name2.$y;
		if(($borra<>'')and($_POST[$Name1]==$borra))	{$_POST[$Name1]='';$_POST[$Name2]='';}
		if((($_POST[$Name1]=='')or($_POST[$Name1]=='0'))and($_POST[$Name2]=='')){$_POST[$Name1]=$_POST[$Name3];$_POST[$Name2]=$_POST[$Name4];$_POST[$Name3]='';$_POST[$Name4]='';}
		echo"
            <input type='$type' class='Medio' name='$Name1' value='$_POST[$Name1]' style='$style'>
			<input type='$type' class='Medio' name='$Name2' value='$_POST[$Name2]' style='$style'>";
		$total=$total+$_POST[$Name2];
	}
	return round($total,2);
}*/
function Presenta3(
$id,$style,$style_t,$title,$col1,$col2
,$t0,$t1,$t2
,$repite,$limite
,$name1,$name2,$name3
,$n_r1,$n_r2
,$title1,$title2
,$max1,$max2
,$style1,$style2
,$final
){
	if ($col1==''){$col1=Comentarios;}
	if ($col2==''){$col2=Importe;}
	echo"<table id='$id' style='$style'>";
	print"
		<tr style='$style_t'>
			<td colspan='3'><center>$title</center></td>
		</tr>
		<tr>
			<td></td><td>$col1</td><td>$col2</td>
		</tr>
	";
	$t=0;
	for($x=1; $x<=$repite; $x++){
		$n1=$name1.$x;
		$v1=$_POST[$n1];
		$n2=$name2.$x;
		$v2=$_POST[$n2];
		IF ($n_r1<>'')$n1=$n_r1;
		IF ($n_r2<>'')$n2=$n_r2;
		IF (($_POST[$n2]<>'')and($repite==$x)and($repite<$limite)){$repite=$repite+1;}
		IF (($_POST[$n1]=='')and($repite==$x)){$libre1="autofocus";}
		IF (($_POST[$n2]=='')and($repite==$x)){$libre2="autofocus";}
		$c1=input($t1,$n1,$v1,$title1,$style1,$libre1);
		$c2=input($t2,$n2,$v2,$title2,$style2,$libre2);
		if ($t0=='')$t0=hidden;
		IF (($t0==hidden)and($t1==hidden)){$c1=$c1.input(button,'',$v1,'','text-align: left;');}
		IF (($t0==hidden)and($t2==hidden)){	$c2=$c2.input(button,'',$v2,'','text-align: left;');}
		$t=$t+$_POST[$n2];
		print"
			<tr>
				<td>$x</td><td>$c1</td><td>$c2</td>
			</tr>
		";
	}
	echo"	<tr>
				<td></td><td>Total</td><td>$t</td>
			</tr>
			$final
		</table>
	";
	return $repite;
}
function resetea($consu,$posi){
    if ($posi==''){$posi=0;}
    if ($consu==''){echo"resetea sin consu";}
    mysql_data_seek($consu,$posi);
}
function certi($cuenta,$conexion){
    $consu4=consulta('fechas',$conexion);
    $consu5=consulta('folio',$conexion);
    $consu6=consulta('fletes',$conexion);
    $consu7=consulta('viaticos',$conexion);
    $consu8=consulta('disel',$conexion);
    $consu9=consulta('casetas',$conexion);
    $consu10=consulta('facturas',$conexion);
    $consu11=consulta('ryr',$conexion);
    $consu12=consulta('guias',$conexion);
    $consu13=consulta('maniobras',$conexion);
    $consu14=consulta('km',$conexion);
    
    $consu16=consulta('fletes_c',$conexion);
    $consu17=consulta('viaticos_c',$conexion);
    $consu18=consulta('disel_c',$conexion);
    $consu19=consulta('casetas_c',$conexion);
    $consu20=consulta('facturas_c',$conexion);
    $consu21=consulta('ryr_c',$conexion);
    $consu22=consulta('guias_c',$conexion);
    $consu23=consulta('maniobras_c',$conexion);
    $consu24=consulta('abo_acu',$conexion);
    resetea($consu4);
    echo"------------\r";
    echo "Certificado";
    $com=$cuenta;$col=ID_G;$var=ID_G;$consu=$consu4;
    echo "\rFechas--:".$res=compro($com,$col,$var,$consu,$conexion);
    if ($res==''){echo"---- >Celda Faltante<";}             
    $res='';
    $com=$cuenta;$col=ID_G;$var=ID_G;$consu=$consu5;
    echo "\rFolios--:".$res=compro($com,$col,$var,$consu,$conexion);
    if ($res==''){echo"---- >Celda Faltante<";}
    $res='';
    
    $com=$cuenta;$col=ID_G;$var=ID_G;$consu=$consu6;
    echo "\rFletas--:".$res=compro($com,$col,$var,$consu,$conexion);
    if ($res==''){echo"---- >Celda Faltante<";}
    $res='';
    $com=$cuenta;$col=ID_G;$var=ID_G;$consu=$consu16;
    echo "\rFletas_c:".$res=compro($com,$col,$var,$consu,$conexion);
    if ($res==''){echo"---- >Celda Faltante<";}
    $res='';
    
    $com=$cuenta;$col=ID_G;$var=ID_G;$consu=$consu7;
    echo "\rViatic--:".$res=compro($com,$col,$var,$consu,$conexion);
    if ($res==''){echo"---- >Celda Faltante<";}
    $res='';
    $com=$cuenta;$col=ID_G;$var=ID_G;$consu=$consu17;
    echo "\rViatic_c:".$res=compro($com,$col,$var,$consu,$conexion);
    if ($res==''){echo"---- >Celda Faltante<";}
    $res='';
    
    $com=$cuenta;$col=ID_G;$var=ID_G;$consu=$consu8;
    echo "\rDiesel--:".$res=compro($com,$col,$var,$consu,$conexion);
    if ($res==''){echo"---- >Celda Faltante<";}
    $res='';
    $com=$cuenta;$col=ID_G;$var=ID_G;$consu=$consu18;
    echo "\rDiesel_c:".$res=compro($com,$col,$var,$consu,$conexion);
    if ($res==''){echo"---- >Celda Faltante<";}
    $res='';
    
    $com=$cuenta;$col=ID_G;$var=ID_G;$consu=$consu9;
    echo "\rCaseta--:".$res=compro($com,$col,$var,$consu,$conexion);
    if ($res==''){echo"---- >Celda Faltante<";}
    $res='';
    $com=$cuenta;$col=ID_G;$var=ID_G;$consu=$consu19;
    echo "\rCaseta_c:".$res=compro($com,$col,$var,$consu,$conexion);
    if ($res==''){echo"---- >Celda Faltante<";}
    $res='';
    $com=$cuenta;$col=ID_G;$var=ID_G;$consu=$consu10;
    echo "\rFactur--:".$res=compro($com,$col,$var,$consu,$conexion);
    if ($res==''){echo"---- >Celda Faltante<";}
    $res='';
    $com=$cuenta;$col=ID_G;$var=ID_G;$consu=$consu20;
    echo "\rFactur_c:".$res=compro($com,$col,$var,$consu,$conexion);
    if ($res==''){echo"---- >Celda Faltante<";}
    $res='';
    $com=$cuenta;$col=ID_G;$var=ID_G;$consu=$consu11;
    echo "\rR y R --:".$res=compro($com,$col,$var,$consu,$conexion);
    if ($res==''){echo"---- >Celda Faltante<";}
    $res='';
    $com=$cuenta;$col=ID_G;$var=ID_G;$consu=$consu21;
    echo "\rR y R _c:".$res=compro($com,$col,$var,$consu,$conexion);
    if ($res==''){echo"---- >Celda Faltante<";}
    $res='';
    
    $com=$cuenta;$col=ID_G;$var=ID_G;$consu=$consu12;
    echo "\rGuias --:".$res=compro($com,$col,$var,$consu,$conexion);
    if ($res==''){echo"---- >Celda Faltante<";}
    $res='';
    $com=$cuenta;$col=ID_G;$var=ID_G;$consu=$consu22;
    echo "\rGuias _c:".$res=compro($com,$col,$var,$consu,$conexion);
    if ($res==''){echo"---- >Celda Faltante<";}
    $res='';
    
    $com=$cuenta;$col=ID_G;$var=ID_G;$consu=$consu13;
    echo "\rManiob--:".$res=compro($com,$col,$var,$consu,$conexion);
    if ($res==''){echo"---- >Celda Faltante<";}
    $res='';
    $com=$cuenta;$col=ID_G;$var=ID_G;$consu=$consu23;
    echo "\rManiob_c:".$res=compro($com,$col,$var,$consu,$conexion);
    if ($res==''){echo"---- >Celda Faltante<";}
    $res='';
    
    $com=$cuenta;$col=ID_G;$var=ID_G;$consu=$consu14;
    echo "\rKm    --:".$res=compro($com,$col,$var,$consu,$conexion);
    if ($res==''){echo"---- >Celda Faltante<";}
    $res='';
    echo"\r";
}

function espe_tab($tabla,$n_id,$id,$n_modificando,$v_modificando
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