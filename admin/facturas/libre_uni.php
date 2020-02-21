<?php //php7
//nombre de libreria libre_uni
$libre=1;
/*
------------function en esta librerria
-->focuas_a						($limite,$to);
-->login			($host,$user,$pass,$db);
-->ejecuta($conexion,$res);
-->input2			($type2,$name,$title,$value,$style,$id,$libre);
-->consulta			($tabla,$conexion,$col_espe,$espe,$orde,$dire);
-->auto_tab_insert	(.. formato ..);
-->tablero			(.. formato ..);
-->espe_tab_insert	(.. formato ..);
-->db				($base,$conexion);
-->compro			($com,$col,$var,$consu,$conexion);
zero				($valor);
*/

function focuas_a($limite,$to){	
	$if='if (this.value.length == this.getAttribute("maxlength")) '. $to.'.focus()';
	$libre="maxlength='$limite' onkeyup='$if'";
	return $libre;
}
function db($base,$conexion,$phpv){
	if ($conexion=="") 	{echo"[db] Conecion no existente";}
	if ($phpv=="")  	{echo"[db]Version de php no Definidad";$conexion="";}
	if ($phpv==php5)	{$res=mysql_select_db($base,$conexion)  or die ("[db]Error para Selecionar -$base");}
	if ($phpv==php7)	{$res=mysqli_select_db ($conexion,$base)or die ("[db]Error para Selecionar -$base");}
	return $res;
}
function login($host,$user,$pass,$db,$phpv){
	if ($phpv=="")  	{echo"[lg]version de php no Definidad";}
	if ($phpv==php5)	{$conexion=mysql_connect($host,$user,$pass)  or die("[lg]Problema Para Iniciar Secion \r"."$host- $user- $pass -$db -$version");		}
	if ($phpv==php7)	{$conexion=mysqli_connect($host,$user,$pass,$db) or die("[lg]Problema Para Iniciar Secion \r"."$host- $user- $pass -$db -$version");}
	return $conexion;
}
function ejecuta($conexion,$res,$phpv){
	if ($res=="")		{echo"[ej]Sin Res para Ejecutar";	exit;}
	if ($conexion=="") 	{echo"[ej]Sin Conexion".$res;		exit;}
	if ($phpv=="")		{echo"[ej]Sin Version".$res;		exit;}
	if ($phpv==php5) 	{$resu=mysql_query($res,$conexion) or die("\r<br>Error De Query php=$phpv\r<br>$res");}
	if ($phpv==php7) 	{$resu=mysqli_query($conexion,$res)or die("\r<br>Error De Query php=$phpv\r<br>$res");}
	return $resu;
}
function mysql_da_se($res,$posicion,$phpv){
	if ($posicion=="")	{$posicion=0;}
	if ($res=="")		{echo"[da_se]Sin 'Res' para mysql_da_se";exit;} 
	if ($phpv=="")  	{echo"[da_se]version de php no Definidad";}
	if ($phpv==php5)	{mysql_data_seek($res,$posicion);}
	if ($phpv==php7)	{mysqli_data_seek($res,$posicion);}	
}
function mysql_fe_ar($res,$phpv){
	if ($res=="")		{echo"[fe_ar]Sin 'Res' para mysql_fe_ar";exit;}
	if ($phpv=="")  	{echo"[fe_ar]version de php no Definidad";}
	if ($phpv==php5) 	{$res=mysql_fetch_array($res);}
	if ($phpv==php7)	{$res=mysqli_fetch_array($res);}
	return $res;
}
function mysql_cl($conexion,$phpv){	
	if ($conexion=="") 	{echo"[cl] Conecion no existente";}
	if ($phpv=="")  	{echo"[cl]version de php no Definidad";}
	if ($phpv==php5)	{mysql_close($conexion);}
	if ($phpv==php7)	{mysqli_close($conexion);}
}
function input2($type2,$name,$title,$value,$style,$id,$libre,$class){
	if ($class=='')		$class=Medio;
	$d="<input type='$type2' style='$style' id='$id' class='$class' name='$name' value='$value' title='$title' $libre >";
	return $d;
}
function consulta($tabla,$conexion,$col_espe,$espe,$orde,$dire,$phpv){ 
    $consulta="SELECT * FROM ".$tabla;
	if (($espe<>'') and ($col_espe<>'')){$consulta="SELECT * FROM $tabla WHERE $col_espe='$espe'";}
	if ($dire<>'')		$dire=DESC;
	if ($dire=='')		$dire=ASC;
	if ($orde<>'')		{	$consulta=$consulta." ORDER BY $orde $dire";}
	$res=$consulta;
	$consu=ejecuta($conexion,$res,$phpv);
    return $consu;
}
function compro($com,$col,$var,$consu,$conexion,$phpv){//Genera lentitud
	$d=false;
	$res=$consu;
	mysql_da_se($res,$posicion,$phpv);
    while($dato=mysql_fe_ar($res,$phpv)){
		if ($dato[$col]==$com){$d=true; break;}
	}
	if($var<>'')$d=$dato[$var];
	return $d;
}
function despliegre_mysql($name,$name2,$consu,$descarga,$phpv){
	$res=$consu;
	$d=$d."<select class='Medio' name='$name'>";
	if($name2<>'')$d=$d."<OPTION value='$name'>$name2</OPTION>";
		mysql_da_se($res,0,$phpv);
        while($datos= mysql_fe_ar($res,$phpv)){$set='';		
			if($datos[$descarga]==$_POST[$name]){$set='selected';}
			$d=$d."<option value='$datos[$descarga]' $set>$datos[$descarga]</option>";
        }
	$d=$d."</select>";
	return $d;
}
function zero($valor){
 $res=str_pad($valor,2, '0', STR_PAD_LEFT);
 return $res;
}
function auto_tab_insert($tabla,
$n0,$v0,
$n1,$v1,
$n2,$v2,
$n3,$v3,
$n4,$v4,
$n5,$v5,
$n6,$v6,
$n7,$v7,
$n8,$v8,
$n9,$v9,
$n10,$v10,
$na1,$va1,$repit1,
$na2,$va2,$repit2,
$na3,$va3,$repit3,
$na4,$va4,$repit4){
	$d="INSERT INTO $tabla ($n0";
	IF ($n1<>'')$d=$d.",$n1";
	IF ($n2<>'')$d=$d.",$n2";
	IF ($n3<>'')$d=$d.",$n3";
	IF ($n4<>'')$d=$d.",$n4";
	IF ($n5<>'')$d=$d.",$n5";
	IF ($n6<>'')$d=$d.",$n6";
	IF ($n7<>'')$d=$d.",$n7";
	IF ($n8<>'')$d=$d.",$n8";
	IF ($n9<>'')$d=$d.",$n9";
	IF ($n10<>'')$d=$d.",$n10";
	for($x=1; $x<=$repit1; $x++){
		IF ($repit1>=$x)$d=$d.",";
		$Name1=$na1.$x;
		$d=$d.$Name1;
	}
	IF ($na2<>''){
		for($x=1; $x<=$repit2; $x++){
			IF ($repit2>=$x)$d=$d.",";
			$Name1=$na2.$x;
			$d=$d.$Name1;
		}
	}
	IF ($na3<>''){
		for($x=1; $x<=$repit3; $x++){
			IF ($repit3>=$x)$d=$d.",";
			$Name1=$na3.$x;
			$d=$d.$Name1;
		}
	}
	IF ($na4<>''){
		for($x=1; $x<=$repit4; $x++){
			IF ($repit4>=$x)$d=$d.",";
			$Name1=$na4.$x;
			$d=$d.$Name1;
		}
	}
	$d=$d.") VALUE ('$v0'";
	IF ($n1<>'')$d=$d.",'$v1'";
	IF ($n2<>'')$d=$d.",'$v2'";
	IF ($n3<>'')$d=$d.",'$v3'";
	IF ($n4<>'')$d=$d.",'$v4'";
	IF ($n5<>'')$d=$d.",'$v5'";
	IF ($n6<>'')$d=$d.",'$v6'";
	IF ($n7<>'')$d=$d.",'$v7'";
	IF ($n8<>'')$d=$d.",'$v8'";
	IF ($n9<>'')$d=$d.",'$v9'";
	IF ($n10<>'')$d=$d.",'$v10'";
	for($x=1; $x<=$repit1; $x++){
		IF ($repit1>=$x)$d=$d.",";
		$Name1=$va1.$x;
		$d=$d."'$_POST[$Name1]'";
	}
	IF ($va2<>''){
		for($x=1; $x<=$repit2; $x++){
			IF ($repit2>=$x)$d=$d.",";
			$Name1=$va2.$x;
			$d=$d."'$_POST[$Name1]'";
		}
	}
	IF ($va3<>''){
		for($x=1; $x<=$repit3; $x++){
			IF ($repit3>=$x)$d=$d.",";
			$Name1=$va3.$x;
			$d=$d."'$_POST[$Name1]'";
		}
	}
		IF ($va4<>''){
		for($x=1; $x<=$repit4; $x++){
			IF ($repit4>=$x)$d=$d.",";
			$Name1=$va4.$x;
			$d=$d."'$_POST[$Name1]'";
		}
	}
	$d=$d.")";
	return $d;
}
function espe_tab_insert($tabla
,$v0,$v1,$v2,$v3,$v4,$v5,$v6,$v7,$v8,$v9
,$n0,$n1,$n2,$n3,$n4,$n5,$n6,$n7,$n8,$n9
,$n10,$n11,$n12,$n13,$n14,$n15,$n16,$n17,$n18,$n19
,$v10,$v11,$v12,$v13,$v14,$v15,$v16,$v17,$v18,$v19
,$n20,$n21,$n22,$n23,$n24,$n25,$n26,$n27,$n28,$n29
,$v20,$v21,$v22,$v23,$v24,$v25,$v26,$v27,$v28,$v29
){
	$d="INSERT INTO $tabla ($n0";
	IF ($n1<>'')	$d=$d.",$n1";	IF ($n2<>'')	$d=$d.",$n2";	IF ($n3<>'')	$d=$d.",$n3";	IF ($n4<>'')	$d=$d.",$n4";	IF ($n5<>'')	$d=$d.",$n5";
	IF ($n6<>'')	$d=$d.",$n6";	IF ($n7<>'')	$d=$d.",$n7";	IF ($n8<>'')	$d=$d.",$n8";	IF ($n9<>'')	$d=$d.",$n9";	IF ($n10<>'')	$d=$d.",$n10";
	IF ($n11<>'')	$d=$d.",$n11";	IF ($n12<>'')	$d=$d.",$n12";	IF ($n13<>'')	$d=$d.",$n13";	IF ($n14<>'')	$d=$d.",$n14";	IF ($n15<>'')	$d=$d.",$n15";
	IF ($n16<>'')	$d=$d.",$n16";	IF ($n17<>'')	$d=$d.",$n17";	IF ($n18<>'')	$d=$d.",$n18";	IF ($n19<>'')	$d=$d.",$n19";	IF ($n20<>'')	$d=$d.",$n20";
	IF ($n21<>'')	$d=$d.",$n21";	IF ($n22<>'')	$d=$d.",$n22";	IF ($n23<>'')	$d=$d.",$n23";	IF ($n24<>'')	$d=$d.",$n24";	IF ($n25<>'')	$d=$d.",$n25";
	IF ($n26<>'')	$d=$d.",$n26";	IF ($n27<>'')	$d=$d.",$n27";	IF ($n28<>'')	$d=$d.",$n28";	IF ($n29<>'')	$d=$d.",$n29";	IF ($n30<>'')	$d=$d.",$n30";
	$d=$d.") VALUE ('$v0'";
	IF ($n1<>'')	$d=$d.",'$v1'";	IF ($n2<>'')	$d=$d.",'$v2'";	IF ($n3<>'')	$d=$d.",'$v3'";	IF ($n4<>'')	$d=$d.",'$v4'";	IF ($n5<>'')	$d=$d.",'$v5'";
	IF ($n6<>'')	$d=$d.",'$v6'";	IF ($n7<>'')	$d=$d.",'$v7'";	IF ($n8<>'')	$d=$d.",'$v8'";	IF ($n9<>'')	$d=$d.",'$v9'";	IF ($n10<>'')	$d=$d.",'$v10'";
	IF ($n11<>'')	$d=$d.",'$v11'";IF ($n12<>'')	$d=$d.",'$v12'";IF ($n13<>'')	$d=$d.",'$v13'";IF ($n14<>'')	$d=$d.",'$v14'";IF ($n15<>'')	$d=$d.",'$v15'";
	IF ($n16<>'')	$d=$d.",'$v16'";IF ($n17<>'')	$d=$d.",'$v17'";IF ($n18<>'')	$d=$d.",'$v18'";IF ($n19<>'')	$d=$d.",'$v19'";IF ($n20<>'')	$d=$d.",'$v20'";
	IF ($n21<>'')	$d=$d.",'$v21'";IF ($n22<>'')	$d=$d.",'$v22'";IF ($n23<>'')	$d=$d.",'$v23'";IF ($n24<>'')	$d=$d.",'$v24'";IF ($n25<>'')	$d=$d.",'$v25'";
	IF ($n26<>'')	$d=$d.",'$v26'";IF ($n27<>'')	$d=$d.",'$v27'";IF ($n28<>'')	$d=$d.",'$v28'";IF ($n29<>'')	$d=$d.",'$v29'";IF ($n30<>'')	$d=$d.",'$v30'";
	$d=$d.")";
	return $d;
}
function espe_tab_update($tabla,$n_id,$v_id
,$n0,$v0,$n1,$v1,$n2,$v2,$n3,$v3,$n4,$v4,$n5,$v5,$n6,$v6,$n7,$v7,$n8,$v8,$n9,$v9
,$n10,$v10,$n11,$v11,$n12,$v12,$n13,$v13,$n14,$v14,$n15,$v15,$n16,$v16,$n17,$v17,$n18,$v18,$n19,$v19
,$n20,$v20,$n21,$v21,$n22,$v22,$n23,$v23,$n24,$v24,$n25,$v25,$n26,$v26,$n27,$v27,$n28,$v28,$n29,$v29
){
	$d="UPDATE $tabla SET ";
	IF ($n0<>'')$d=$d."$n0='$v0'";	IF ($n1<>'')$d=$d.",$n1='$v1'";
	IF ($n2<>'')$d=$d.",$n2='$v2'";	IF ($n3<>'')$d=$d.",$n3='$v3'";
	IF ($n4<>'')$d=$d.",$n4='$v4'";	IF ($n5<>'')$d=$d.",$n5='$v5'";
	IF ($n6<>'')$d=$d.",$n6='$v6'";	IF ($n7<>'')$d=$d.",$n7='$v7'";	
	IF ($n8<>'')$d=$d.",$n8='$v8'";	IF ($n9<>'')$d=$d.",$n9='$v9'";	
	
	IF ($n10<>'')$d=$d.",$n10='$v10'";	IF ($n11<>'')$d=$d.",$n11='$v11'";	
	IF ($n12<>'')$d=$d.",$n12='$v12'";	IF ($n13<>'')$d=$d.",$n13='$v13'";	
	IF ($n14<>'')$d=$d.",$n14='$v14'";	IF ($n15<>'')$d=$d.",$n15='$v15'";	
	IF ($n16<>'')$d=$d.",$n16='$v16'";	IF ($n17<>'')$d=$d.",$n17='$v17'";	
	IF ($n18<>'')$d=$d.",$n18='$v18'";	IF ($n19<>'')$d=$d.",$n19='$v19'";	
	IF ($n20<>'')$d=$d.",$n20='$v20'";	IF ($n21<>'')$d=$d.",$n21='$v21'";	
	IF ($n22<>'')$d=$d.",$n22='$v22'";	IF ($n23<>'')$d=$d.",$n23='$v23'";	
	IF ($n24<>'')$d=$d.",$n24='$v24'";	IF ($n25<>'')$d=$d.",$n25='$v25'";	
	IF ($n26<>'')$d=$d.",$n26='$v26'";	IF ($n27<>'')$d=$d.",$n27='$v27'";	
	IF ($n28<>'')$d=$d.",$n28='$v28'";	IF ($n29<>'')$d=$d.",$n29='$v29'";	
	IF ($n30<>'')$d=$d.",$n30='$v30'";
	IF ($v_id<>'')$d=$d." WHERE $n_id='$v_id'";
	return $d;
}
function tablero(
    $size,$style,$title1,$ts
    ,$i1,$d1,$tc1,$ic1,$dc1,$if1,$df1
    ,$i2,$d2,$tc2,$ic2,$dc2,$if2,$df2
    ,$i3,$d3,$tc3,$ic3,$dc3,$if3,$df3
    ,$i4,$d4,$tc4,$ic4,$dc4,$if4,$df4
    ,$i5,$d5,$tc5,$ic5,$dc5,$if5,$df5
    ,$i6,$d6,$tc6,$ic6,$dc6,$if6,$df6
    ,$i7,$d7,$tc7,$ic7,$dc7,$if7,$df7
    ,$i8,$d8,$tc8,$ic8,$dc8,$if8,$df8
    ,$i9,$d9,$tc9,$ic9,$dc9,$if9,$df9
    
    ,$i10,$d10,$tc10,$ic10,$dc10,$if10,$df10
    ,$i11,$d11,$tc11,$ic11,$dc11,$if11,$df11
    ,$i12,$d12,$tc12,$ic12,$dc12,$if12,$df12
    ,$i13,$d13,$tc13,$ic13,$dc13,$if13,$df13
    ,$i14,$d14,$tc14,$ic14,$dc14,$if14,$df14
    ,$i15,$d15,$tc15,$ic15,$dc15,$if15,$df15
    ,$i16,$d16,$tc16,$ic16,$dc16,$if16,$df16
    ,$i17,$d17,$tc17,$ic17,$dc17,$if17,$df17
    ,$i18,$d18,$tc18,$ic18,$dc18,$if18,$df18
    ,$i19,$d19,$tc19,$ic19,$dc19,$if19,$df19
    ,$i20,$d20,$tc20,$ic20,$dc20,$if20,$df20
    ,$i21,$d21,$tc21,$ic21,$dc21,$if21,$df21
){
echo'
<table border="'.$size.'" id="conte-dere" style="'.$style.'">
    <tr  ><td colspan="2" align="center" style="'.$ts.'"><font color="'.$tf.'">'.$title1.'</font ></td ></tr >
    <tr  bgcolor="'.$tc1.'">
        <td bgcolor="'.$ic1.'"><font color="'.$if1.'"> '.$i1.'</font ></td >
        <td bgcolor="'.$dc1.'"><font color="'.$df1.'"> '.$d1.'</font ></td >
    </tr >
    <tr  bgcolor="'.$tc2.'">
        <td bgcolor="'.$ic2.'"><font color="'.$if2.'">	'.$i2.'</font ></td >
        <td bgcolor="'.$dc2.'"><font color="'.$df2.'">	'.$d2.'</font ></td >
    </tr >
    <tr  bgcolor="'.$tc3.'">
        <td bgcolor="'.$ic3.'"><font color="'.$if3.'">	'.$i3.'</font ></td >
        <td bgcolor="'.$dc3.'"><font color="'.$df3.'">	'.$d3.'</font ></td >
    </tr >
    <tr  bgcolor="'.$tc4.'">
        <td bgcolor="'.$ic4.'"><font color="'.$if4.'">	'.$i4.'</font ></td >
        <td bgcolor="'.$dc4.'"><font color="'.$df4.'">	'.$d4.'</font ></td >
    </tr >
    <tr  bgcolor="'.$tc5.'">
        <td bgcolor="'.$ic5.'"><font color="'.$if5.'">	'.$i5.'</font ></td >
        <td bgcolor="'.$dc5.'"><font color="'.$df5.'">	'.$d5.'</font ></td >
    </tr >
    <tr  bgcolor="'.$tc6.'">
        <td bgcolor="'.$ic6.'"><font color="'.$if6.'">	'.$i6.'</font ></td >
        <td bgcolor="'.$dc6.'"><font color="'.$df6.'">	'.$d6.'</font ></td >
    </tr >
    <tr  bgcolor="'.$tc7.'">
        <td bgcolor="'.$ic7.'"><font color="'.$if7.'">	'.$i7.'</font ></td >
        <td bgcolor="'.$dc7.'"><font color="'.$df7.'">	'.$d7.'</font ></td >
    </tr >
    <tr  bgcolor="'.$tc8.'">
        <td bgcolor="'.$ic8.'"><font color="'.$if8.'">	'.$i8.'</font ></td >
        <td bgcolor="'.$dc8.'"><font color="'.$df8.'">	'.$d8.'</font ></td >
    </tr >
    <tr  bgcolor="'.$tc9.'">
        <td bgcolor="'.$ic9.'"><font color="'.$if9.'">	'.$i9.'</font ></td >
        <td bgcolor="'.$dc9.'"><font color="'.$df9.'">	'.$d9.'</font ></td >
    </tr >
    <tr  bgcolor="'.$tc10.'">
        <td bgcolor="'.$ic10.'"><font color="'.$if10.'">	'.$i10.'</font ></td >
        <td bgcolor="'.$dc10.'"><font color="'.$df10.'">	'.$d10.'</font ></td >
    </tr >
    <tr  bgcolor="'.$tc11.'">
        <td bgcolor="'.$ic11.'"><font color="'.$if11.'">	'.$i11.'</font ></td >
        <td bgcolor="'.$dc11.'"><font color="'.$df11.'">	'.$d11.'</font ></td >
    </tr >
    <tr  bgcolor="'.$tc12.'">
        <td bgcolor="'.$ic12.'"><font color="'.$if12.'">	'.$i12.'</font ></td >
        <td bgcolor="'.$dc12.'"><font color="'.$df12.'">	'.$d12.'</font ></td >
    </tr >
    <tr  bgcolor="'.$tc13.'">
        <td bgcolor="'.$ic13.'"><font color="'.$if13.'">	'.$i13.'</font ></td >
        <td bgcolor="'.$dc13.'"><font color="'.$df13.'">	'.$d13.'</font ></td >
    </tr >
    <tr  bgcolor="'.$tc14.'">
        <td bgcolor="'.$ic14.'"><font color="'.$if14.'">	'.$i14.'</font ></td >
        <td bgcolor="'.$dc14.'"><font color="'.$df14.'">	'.$d14.'</font ></td >
    </tr >
    <tr  bgcolor="'.$tc15.'">
        <td bgcolor="'.$ic15.'"><font color="'.$if15.'">	'.$i15.'</font ></td >
        <td bgcolor="'.$dc15.'"><font color="'.$df15.'">	'.$d15.'</font ></td >
    </tr >
    <tr  bgcolor="'.$tc16.'">
        <td bgcolor="'.$ic16.'"><font color="'.$if16.'">    '.$i16.'</font ></td >
        <td bgcolor="'.$dc16.'"><font color="'.$df16.'">    '.$d16.'</font ></td >
    </tr >
    <tr  bgcolor="'.$tc17.'">
        <td bgcolor="'.$ic17.'"><font color="'.$if17.'">    '.$i17.'</font ></td >
        <td bgcolor="'.$dc17.'"><font color="'.$df17.'">    '.$d17.'</font ></td >
    </tr >
    <tr  bgcolor="'.$tc18.'">
        <td bgcolor="'.$ic18.'"><font color="'.$if18.'">    '.$i18.'</font ></td >
        <td bgcolor="'.$dc18.'"><font color="'.$df18.'">    '.$d18.'</font ></td >
    </tr >
    <tr  bgcolor="'.$tc19.'">
        <td bgcolor="'.$ic19.'"><font color="'.$if19.'">    '.$i19.'</font ></td >
        <td bgcolor="'.$dc19.'"><font color="'.$df19.'">    '.$d19.'</font ></td >
    </tr >
    <tr  bgcolor="'.$tc20.'">
        <td bgcolor="'.$ic20.'"><font color="'.$if20.'">    '.$i20.'</font ></td >
        <td bgcolor="'.$dc20.'"><font color="'.$df20.'">    '.$d20.'</font ></td >
    </tr >
    <tr  bgcolor="'.$tc21.'">
        <td bgcolor="'.$ic21.'"><font color="'.$if21.'">    '.$i21.'</font ></td >
        <td bgcolor="'.$dc21.'"><font color="'.$df21.'">    '.$d21.'</font ></td >
    </tr >
</table >';
}
?>