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
function div				($style,$libre,$conte)																			{
	if (($style=='')&&($libre=='')){$style="width: 100px; height: 100px; background: yellowgreen;";}
	$res="<div style='$style' $libre>$conte</div>";
	return $res;
}
function select				($sel_name,$sel_style,$sel_libre,$sel_conta,$sel_value,$sel_visual,$sel_title,$sel_libre2)	{
	$res="<select name='$sel_name' class='Medio' style='$sel_style' $sel_libre>";
		for($x=0; $x<=$sel_conta; $x++){
			if($_POST[$sel_name]==$sel_value[$x])$sel_libre2[$x]=" selected";
			$res=$res."<option value='$sel_value[$x]'  title='$sel_title[$x]' $sel_libre2[$x]>$sel_visual[$x]</option>";
		}
	$res=$res."</select>";
	return $res;
}
function focuas_a			($limite,$to)																				{	
	$if='if (this.value.length == this.getAttribute("maxlength")) '. $to.'.focus()';
	$libre="maxlength='$limite' onkeyup='$if'";
	return $libre;
}
function db					($base,$conexion,$phpv)																		{
	//$base  	°base de datos que se decea conectar
	//$conexion °que entrega la funcion "login"
	//$php 		°Vesion de php que Ejecuta El Servidor 
	if ($conexion=="") 	{echo"[db] Conecion no existente";}		
	if ($phpv=="")  	{echo"[db]Version de php no Definidad";$conexion="";}
	if ($phpv==php5)	{$res=mysql_select_db($base,$conexion)  or die ("[db]Error para Selecionar -$base");}
	if ($phpv==php7)	{$res=mysqli_select_db ($conexion,$base)or die ("[db]Error para Selecionar -$base");}
	return $res;
}
function login				($host,$user,$pass,$db,$phpv)																{
	//$user		°usuario con que Se Realica login en la bd
	//$host		°Como "localhost" o "192.168.1.x"
	//$conexion °que entrega la funcion "login"
	//$php 		°Vesion de php que Ejecuta El Servidor 	
	if ($phpv=="")  	{echo"[lg]version de php no Definidad";}
	if ($phpv==php5)	{$conexion=mysql_connect($host,$user,$pass)  or die("[lg]Problema Para Iniciar Secion \r"."$host- $user- $pass -$db -$version");		}
	if ($phpv==php7)	{$conexion=mysqli_connect($host,$user,$pass,$db) or die("[lg]Problema Para Iniciar Secion \r"."$host- $user- $pass -$db -$version");}
	return $conexion;
}
function ejecuta			($conexion,$res,$phpv)																		{
	if ($res=="")		{echo"[ejecuta]Sin Res para Ejecutar";	exit;}
	if ($conexion=="") 	{echo"[ejecuta]Sin Conexion".$res;		exit;}
	if ($phpv=="")		{echo"[ejecuta]Sin Version".$res;		exit;}
	if ($phpv==php5) 	{$resu=mysql_query($res,$conexion) or die("\r<br>Error De Query php=$phpv\r<br>$res<br>".mysql_error($conexion));}
	if ($phpv==php7) 	{$resu=mysqli_query($conexion,$res)or die("\r<br>Error De Query php=$phpv\r<br>$res<br>".mysqli_error($conexion));}
	return $resu;
}
function mysql_da_se		($res,$posicion,$phpv)																		{
	if ($posicion=="")	{$posicion=0;}
	if ($res=="")		{echo"[da_se]Sin 'Res' para mysql_da_se";exit;} 
	if ($phpv=="")  	{echo"[da_se]version de php no Definidad";}
	if ($phpv==php5)	{mysql_data_seek($res,$posicion);}
	if ($phpv==php7)	{mysqli_data_seek($res,$posicion);}	
}
function mysql_fe_ar		($res,$phpv)																				{
	if ($res=="")		{echo"[fe_ar]Sin 'Res' para mysql_fe_ar";exit;}
	if ($phpv=="")  	{echo"[fe_ar]version de php no Definidad";}
	if ($phpv==php5) 	{$res=mysql_fetch_array($res);}
	if ($phpv==php7)	{$res=mysqli_fetch_array($res);}
	return $res;
}
function mysql_cl			($conexion,$phpv)																			{	
	if ($conexion=="") 	{echo"[cl] Conecion no existente";}
	if ($phpv=="")  	{echo"[cl]version de php no Definidad";}
	if ($phpv==php5)	{mysql_close($conexion);}
	if ($phpv==php7)	{mysqli_close($conexion);}
}
function input2				($type2,$name,$title,$value,$style,$id,$libre,$class)										{
	if ($class=='')		$class=Medio;
	$d="<input type='$type2' style='$style' id='$id' class='$class' name='$name' value='$value' title='$title' $libre >";
	return $d;
}
function consulta			($tabla,$conexion,$col_espe,$espe,$orde,$dire,$phpv,$buscar)								{ 
    $consulta="SELECT * FROM ".$tabla;
	if (($espe<>'') and ($col_espe<>''))					{ $consulta="SELECT * FROM $tabla WHERE $col_espe='$espe'";}
	if (($espe<>'') and ($col_espe<>'') and ($buscar<>''))	{ $consulta="SELECT * FROM $tabla WHERE $col_espe LIKE  '$espe'";}
	if ($dire<>'')		$dire=DESC;
	if ($dire=='')		$dire=ASC;
	if ($orde<>'')		{$consulta=$consulta." ORDER BY $orde $dire";}
	$res=$consulta;
	$consu=ejecuta($conexion,$res,$phpv);
    return $consu;
}
function compro				($com,$col,$var,$consu,$conexion,$phpv,$todos)												{//Genera lentitud
	$d=false;
	$res=$consu;
	mysql_da_se($res,$posicion,$phpv);
    while($dato=mysql_fe_ar($res,$phpv)){
		if ($dato[$col]==$com){$d=true; break;}
	}
	if($var<>'')$d=$dato[$var];
	if ($todos<>''){$d=$dato;}
	return $d;
}
function despliegre_mysql	($name,$name2,$consu,$descarga,$phpv,$libre)												{
	$res=$consu;
	$d=$d."<select class='Medio' name='$name' $libre>";
	if($name2<>'')$d=$d."<OPTION value='$name'>$name2</OPTION>";
		mysql_da_se($res,0,$phpv);
        while($datos= mysql_fe_ar($res,$phpv)){$set='';		
			if($datos[$descarga]==$_POST[$name]){$set='selected';}
			$d=$d."<option value='$datos[$descarga]' $set>$datos[$descarga]</option>";
        }
	$d=$d."</select>";
	return $d;
}
function delete				($tabla,$col_espe,$espe,$conexion,$phpv)													{
	if($tabla=='')		echo"[Fuincion delete](faltante Tabla)";
	if($col_espe=='')	echo"[Fuincion delete](faltante columna)";
	if($espe=='')		echo"[Fuincion delete](faltante dato especifico)";
	$res="DELETE FROM $tabla  WHERE $col_espe='$espe'";
	ejecuta($conexion,$res,$phpv);
}
function zero				($valor)																					{
 $res=str_pad($valor,2, '0', STR_PAD_LEFT);
 return $res;
}
function forma_num			($numero,$decimal)																			{
	if($decimal=="")$decimal=2;
	$res =round($numero,$decimal);
	return $res;
}
function auto_tab_insert	($tabla,$n0,$v0,$n1,$v1,$n2,$v2,$n3,$v3,$n4,$v4,$n5,$v5,$n6,$v6,$n7,$v7,$n8,$v8,$n9,$v9,$n10,$v10,$na1,$va1,$repit1,$na2,$va2,$repit2,$na3,$va3,$repit3,$na4,$va4,$repit4){
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
function espe_tab_insert	($tabla,$v0,$v1,$v2,$v3,$v4,$v5,$v6,$v7,$v8,$v9,$n0,$n1,$n2,$n3,$n4,$n5,$n6,$n7,$n8,$n9,$n10,$n11,$n12,$n13,$n14,$n15,$n16,$n17,$n18,$n19,$v10,$v11,$v12,$v13,$v14,$v15,$v16,$v17,$v18,$v19,$n20,$n21,$n22,$n23,$n24,$n25,$n26,$n27,$n28,$n29,$v20,$v21,$v22,$v23,$v24,$v25,$v26,$v27,$v28,$v29){
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
function espe_tab_update	($tabla,$n_id,$v_id,$n0,$v0,$n1,$v1,$n2,$v2,$n3,$v3,$n4,$v4,$n5,$v5,$n6,$v6,$n7,$v7,$n8,$v8,$n9,$v9,$n10,$v10,$n11,$v11,$n12,$v12,$n13,$v13,$n14,$v14,$n15,$v15,$n16,$v16,$n17,$v17,$n18,$v18,$n19,$v19,$n20,$v20,$n21,$v21,$n22,$v22,$n23,$v23,$n24,$v24,$n25,$v25,$n26,$v26,$n27,$v27,$n28,$v28,$n29,$v29){
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
function menu				($style,$libre,$name,$v1,$v2,$v3,$v4,$v5,$v6,$v7,$v8,$v9,$v10)								{	
	if($style=="")$style="width: 120px; height: 300px; background: #002681b3; position: absolute; top: 55px;";
	$d1='idI';
	$d2='idI';
	$d3='idI';
	$d4='idI';
	$d5='idI';
	$d6='idI';
	$d7='idI';
	$d8='idI';
	$d9='idI';
	$d10='idI';
	$d11='idI';
	if($_POST[$name]==$v1){$d1="id_I";}
	if($_POST[$name]==$v2){$d2="id_I";}
	if($_POST[$name]==$v3){$d3="id_I";}
	if($_POST[$name]==$v4){$d4="id_I";}
	if($_POST[$name]==$v5){$d5="id_I";}
	if($_POST[$name]==$v6){$d6="id_I";}
	if($_POST[$name]==$v7){$d7="id_I";}
	if($_POST[$name]==$v8){$d8="id_I";}
	if($_POST[$name]==$v9){$d9="id_I";}
	if($_POST[$name]==$v10){$d10="id_I";}
	$conte=input2(hidden,$name,'',$_POST[$name]);
	if($v1<>'')$conte=$conte.input2(submit,$name,'',$v1,'',$d1);
	if($v2<>'')$conte=$conte.input2(submit,$name,'',$v2,'',$d2);
	if($v3<>'')$conte=$conte.input2(submit,$name,'',$v3,'',$d3);
	if($v4<>'')$conte=$conte.input2(submit,$name,'',$v4,'',$d4);
	if($v5<>'')$conte=$conte.input2(submit,$name,'',$v5,'',$d5);
	if($v6<>'')$conte=$conte.input2(submit,$name,'',$v6,'',$d6);
	if($v7<>'')$conte=$conte.input2(submit,$name,'',$v7,'',$d7);
	if($v8<>'')$conte=$conte.input2(submit,$name,'',$v8,'',$d8);
	if($v9<>'')$conte=$conte.input2(submit,$name,'',$v9,'',$d9);
	if($v10<>'')$conte=$conte.input2(submit,$name,'',$v10,'',$d10);
	$res=div($style,$libre,$conte);
	return $res;
}
function despieges			($name,$title,$inicio,$fin,$libre,$id)														{
	$d=$d."<select name='$name' class='Medio' style='width: auto;' title='$title' $libre id='$id'>";
	for($x=$inicio; $x<=$fin; $x++){
        $set='';
		$x=zero($x);
		if($_POST[$name]==$x){$set='selected';}
		$d=$d."<option value='$x' $set>$x</option>";
	}
	$d=$d.'</select>';
	return $d;
}
function tablero			($size,$style,$title1,$ts,$i1,$d1,$tc1,$ic1,$dc1,$if1,$df1,$i2,$d2,$tc2,$ic2,$dc2,$if2,$df2,$i3,$d3,$tc3,$ic3,$dc3,$if3,$df3,$i4,$d4,$tc4,$ic4,$dc4,$if4,$df4,$i5,$d5,$tc5,$ic5,$dc5,$if5,$df5,$i6,$d6,$tc6,$ic6,$dc6,$if6,$df6,$i7,$d7,$tc7,$ic7,$dc7,$if7,$df7,$i8,$d8,$tc8,$ic8,$dc8,$if8,$df8,$i9,$d9,$tc9,$ic9,$dc9,$if9,$df9,$i10,$d10,$tc10,$ic10,$dc10,$if10,$df10,$i11,$d11,$tc11,$ic11,$dc11,$if11,$df11,$i12,$d12,$tc12,$ic12,$dc12,$if12,$df12,$i13,$d13,$tc13,$ic13,$dc13,$if13,$df13,$i14,$d14,$tc14,$ic14,$dc14,$if14,$df14,$i15,$d15,$tc15,$ic15,$dc15,$if15,$df15,$i16,$d16,$tc16,$ic16,$dc16,$if16,$df16,$i17,$d17,$tc17,$ic17,$dc17,$if17,$df17,$i18,$d18,$tc18,$ic18,$dc18,$if18,$df18,$i19,$d19,$tc19,$ic19,$dc19,$if19,$df19,$i20,$d20,$tc20,$ic20,$dc20,$if20,$df20,$i21,$d21,$tc21,$ic21,$dc21,$if21,$df21,$class){
echo'
<table border="'.$size.'" id="conte-dere" style="'.$style.'" class="'.$class.'">
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
function tablero_2			($size,$style,$title1,$id,$libre,$class,$array,$array1,$i1,$d1,$i2,$d2,$i3,$d3,$i4,$d4,$i5,$d5,$i6,$d6,$i7,$d7,$i8,$d8,$i9,$d9,$i10,$d10){	
	if($size=="")	$size=0;
	if($style=="")	{$style="position: absolute; height: 100px; width: 100px; background: yellowgreen;";}
	$res=$res."<table border='$size' style='$style' id='$id' $libre class='$class'>";
			$res=$res."<tr><td colspan='2'>$title1</td></tr>";		
		if($array<>""){
			$conta=count($array);
			for($x=0; $x<$conta; $x++){
				$i=$array1[$x];
				$d=input2(text,$array[$x],"",$_POST[$array[$x]]);
				$res=$res."<tr><td>$i</td><td>$d</td></tr>";
			}
		}
		if($array==""){
				$res=$res."<tr><td>$i1</td><td>$d1</td></tr>";		
				$res=$res."<tr><td>$i2</td><td>$d2</td></tr>";		
				$res=$res."<tr><td>$i3</td><td>$d3</td></tr>";		
				$res=$res."<tr><td>$i4</td><td>$d4</td></tr>";		
				$res=$res."<tr><td>$i5</td><td>$d5</td></tr>";		
				$res=$res."<tr><td>$i6</td><td>$d6</td></tr>";		
				$res=$res."<tr><td>$i7</td><td>$d7</td></tr>";		
				$res=$res."<tr><td>$i8</td><td>$d8</td></tr>";		
				$res=$res."<tr><td>$i9</td><td>$d9</td></tr>";		
				$res=$res."<tr><td>$i10</td><td>$d10</td></tr>";		
		}
	$res=$res."</table>";
	return $res;

}
function tablero_array		($size,$style,$title,$id,$libre,$class,$array_text,$array_mysql,$array_type,$array_name,$array_title,$array_value,$array_style,$array_id,$array_libre,$array_class){	
	
	if($size=="")	$size=0;
	if($style=="")	{$style="position: absolute; height: 100px; width: 100px; background: yellowgreen;";}
	$res=$res."<table border='$size' style='$style' id='$id' $libre class='$class'>";
	$res=$res."<tr><td colspan='2'>$title</td></tr>";		
									$conta=count($array_name);
		if($array_mysql<>"")		$conta=count($array_mysql);
		for($x=0; $x<$conta; $x++){
			$i =$array_text[$x];
			if ($array_type[$x]=="")	$array_type[$x]="text";
			if ($array_mysql[$x]<>"")	$array_name[$x]=$array_mysql[$x];
			if ($array_value[$x]=="")	$array_value[$x]=$_POST[$array_name[$x]];
			
			if (($array_type[$x]==text)||($array_type[$x]==hidden)||($array_type[$x]==button)){	$d=input2(hidden,$array_name[$x],$array_title[$x],$array_value[$x],$array_style[$x],$array_id[$x],$array_libre[$x],$array_class[$x]).input2($array_type[$x],$array_name[$x],$array_title[$x],$array_value[$x],$array_style[$x],$array_id[$x],$array_libre[$x],$array_class[$x]);	}
			if ($array_type[$x]==textarea)	{														$d="<textarea name='$array_name[$x]' title='$array_title[$x]' style='$array_style[$x]' id='$array_id[$x]' class='$array_class[$x]' $array_libre[$x]>$array_value[$x]</textarea>";	}
			if ($array_type[$x]==Estatus)	{				$d=objeto::Estatus('',ver);}
			if ($array_type[$x]==Fecha_re)	{				$d=objeto::Fecha_re();}
			if ($array_type[$x]==N_Fact)	{				$d=objeto::N_Fact();}
			
			$res=$res."<tr><td>$i</td><td>$d</td></tr>";
		}
	$res=$res."</table>";
	return $res;

}
class Mysql_tablas		{
	function Tabla_info		($db,$tabla){
		$db0=login;
		$db1=empresa;
		$db2=almacen;
		if($db==$db1){
			$tabla1=folio;
			$tabla2=clientes2;
			$tabla3=choferes2;
			$tabla4=placas2;		
			if($tabla==$tabla1)		{//folio
				$array_mysql 	= array(ID_G		,CLIENTE	,PLACAS		,Descripcion	,Revisado	,Difer_1	,Carta1		,Carta2		,Carta3		,Carta4		,N_Cuenta	,sueldo	,isr);
				$array_text 	= array("Codigo G"	,Cliente	,Unidad		,Descripcion	,Estado		,Diferencia	,"Carta 1"	,"Carta 2"	,"Carta 3"	,"Carta 4"	,"Nuemro"	,Sueldo	,Retencion);
				$array_type 	= array(""			,""			,""			,textarea		,""			,""			,""			,""			,""			,""			,""			,""		,"");
				$array_id 		= array(""			,""			,""			,comenta		,""			,""			,""			,""			,""			,""			,""			,""		,"");
				$array_class	= array(""			,""			,""			,Medio			,""			,""			,""			,""			,""			,""			,""			,""		,"");
				$array_valida	= array(1			,1			,1			,2				,2			,2			,1			,2			,2			,2			,2			,2		,"");
			
			}
			if($tabla==$tabla2)		{//Clientes2
				$array_mysql 	= array(ID_G		,Nombre_Cl	,Fecha_re	,Destino		,N_fact		);
				$array_text 	= array(Clave		,Cliente	,Fecha 		,Destino		,"N° Facturas");
				$array_type 	= array(""			,""			,Fecha_re			,""		,N_Fact);
				$array_id 		= array(""			,""			,""			,""				,"");
				$array_class	= array(""			,""			,""			,""				,"");
				$array_valida	= array(1			,1			,2			,1				,2);
			
			}
			if($tabla==$tabla3)		{//choferes2
				$array_config 	= array("Estatus" => 6, "Index"=>1 );
				$array_mysql 	= array(ID_G		,Nombre_Ch	,Edad		,Direccion		,Celular 		,ulti_viaje 	,Estatus	,N_fact);
				$array_text 	= array(Clave		,Chofer		,Edad 		,Domicilio		,"N° Celular"	,"Total Viajes"	,Estatus	,"Facturas ASG."	);
				$array_type 	= array(""			,""			,""			,""				,""				,hidden			,Estatus	,hidden		);
				$array_id 		= array(""			,""			,""			,""				,""				,""				,""			,""		);
				$array_class	= array(""			,""			,""			,""				,""				,""				,""			,""		);
				$array_valida	= array(1			,1			,1			,1				,2				,2				,2			,2);
			
			}
			if($tabla==$tabla4)		{//
				$array_mysql 	= array(ID_G		,Placas		,Marca		,Modelo			,N_eco			,Color			,N_fact);
				$array_text 	= array(Clave		,Placas		,Marca 		,Modelo			,"N° Economico"	,Color			,"Facturas ASG.");
				$array_type 	= array(""			,""			,""			,""				,""				,""				,"");
				$array_id 		= array(""			,""			,""			,""				,""				,""				,"");
				$array_class	= array(""			,""			,""			,""				,""				,""				,"");
				$array_valida	= array(1			,1			,1			,1				,2				,1				,2);
			
			}
		}			
		if($db==$db2){
			$tabla1=folio;	
			$tabla2=proveedores;
			if($tabla==$tabla1)		{
				$array_mysql 	= array(ID_G		,nombre	,cantidad	,descripcion,marca	,medidas,capacidad,costo	,provedor	,come		,posicion	,uni_min);
				$array_text 	= array("Codigo G"	,Nombre	,Cantidad	,Descripcion,Marca	,Medidas,Capasidad,Costo	,Proveedor	,Comentario	,Posicion	,"Uni. Min.");
				$array_type 	= array(""			,""		,""			,textarea	,""		,""		,""		,""		,""			,textarea	,""			,"");
				$array_id 		= array(""			,""		,""			,comenta	,""		,""		,""		,""		,""			,comenta	,""			,"");
				$array_class	= array(""			,""		,""			,Medio		,""		,""		,""		,""		,""			,Medio		,""			,"");
				$array_valida	= array(1			,1		,2			,2			,2		,2		,2		,1		,1			,2			,1			,2);
			}
			if($tabla==$tabla2)		{
				$array_mysql 	= array(ID_G		,nombre		,apodo				,direccion	,cuidad	,colonia	,codigo	,telefono	,email	,ID_fot		,come		);
				$array_text 	= array("Codigo G"	,Proveedor	,Apodo				,Direccion	,Cuidad	,Colonia	,Codigo ,Telefono	,Correo ,Imagen		,Comentario	);
				$array_type 	= array(""			,""			,""					,""			,""		,""			,""		,""			,""		,hidden		,textarea	);
				$array_id 		= array(""			,""			,""					,""			,""		,""			,""		,""			,""		,""			,comenta	);
				$array_class	= array(""			,""			,""					,""			,""		,""			,""		,""			,""		,""			,Medio		);
				$array_valida	= array(1			,1			,2					,2			,2		,2			,2		,2			,2		,2			,2			);
			}
		}
			$res=	array(
				"config"=> $array_config,
				"mysql"	=> $array_mysql,
				"text"	=> $array_text,
				"type"	=> $array_type,
				"id"	=> $array_id,
				"clas"	=> $array_class,
				"valid"	=> $array_valida
				
			);
			return $res;
			
	}
	function Insert			($base,$tabla,$array_mysql,$conexion,$phpv){
								$conta=count($array_name);
		if($array_mysql<>"")	$conta=count($array_mysql);
		for($x=0; $x<$conta; $x++){
			if($array_mysql[$x]<>"")	$array_name[$x]=$array_mysql[$x];
			if($array_value[$x]=="")	$array_value[$x]=$_POST[$array_name[$x]];
			if(($array_valida[$x]<>"")&&($array_value[$x]==""))$valida=false;
			
		}
		db($base,$conexion,$phpv);
			$col_espe	=	$array_mysql[0];
			$espe		=	$_POST[$array_name[0]];	
			$orde		=	"";
			$dire		=	1;
			$buscar		=	1;
			$consu=consulta($tabla,$conexion,$col_espe,$espe,$orde,$dire,$phpv,$buscar);
			$dato=mysql_fe_ar($consu,$phpv);
		
		$res="INSERT INTO $tabla ($array_mysql[0]";
			for($x=1; $x<$conta; $x++){$res=$res.",$array_mysql[$x]";}
		$res=$res.") VALUE ('$array_value[0]'";
			for($x=1; $x<$conta; $x++){$res=$res.",'$array_value[$x]'";}
		$res=$res.")";
		//echo$_POST[operador].$dato[ID_G];
		if(($_POST[operador]=="Guardar")&&($array_mysql[0]<>$dato[ID_G])){ejecuta($conexion,$res,$phpv);
		
		}
		
	}
	function Update			($base,$tabla,$array_mysql,$conexion,$phpv){
								$conta=count($array_name);
		if($array_mysql<>"")	$conta=count($array_mysql);
		for($x=0; $x<$conta; $x++){
			if($array_mysql[$x]<>"")	$array_name[$x]=$array_mysql[$x];
			if($array_value[$x]=="")	$array_value[$x]=$_POST[$array_name[$x]];
			if(($array_valida[$x]<>"")&&($array_value[$x]==""))$valida=false;
			
		}
		db($base,$conexion,$phpv);
			$col_espe	=	$array_mysql[0];
			$espe		=	$_POST[$array_name[0]];	
			$orde		=	"";
			$dire		=	1;
			$buscar		=	1;
			$consu=consulta($tabla,$conexion,$col_espe,$espe,$orde,$dire,$phpv,$buscar);
			$dato=mysql_fe_ar($consu,$phpv);
			
			$res="UPDATE $tabla SET $array_mysql[0]='".$_POST[$array_name[0]]."'";
			for($x=1; $x<$conta; $x++){$res=$res.",$array_mysql[$x]='".$_POST[$array_name[$x]]."'";}
			$res=$res." WHERE $array_mysql[0]='".$_POST[$array_name[0]]."'";
			if(($_POST[operador]=="Guardar")&&($_POST[$array_name[0]]==$dato[ID_G])){ejecuta($conexion,$res,$phpv); //echo$res;
				$_POST[operador]="Modificar";
				
			}
	}
	function Delete			($base,$tabla,$array_mysql,$conexion,$phpv){
								$conta=count($array_name);
		if($array_mysql<>"")	$conta=count($array_mysql);
		for($x=0; $x<$conta; $x++){
			if($array_mysql[$x]<>"")	$array_name[$x]=$array_mysql[$x];
			if($array_value[$x]=="")	$array_value[$x]=$_POST[$array_name[$x]];
			if(($array_valida[$x]<>"")&&($array_value[$x]==""))$valida=false;
			
		}
		db($base,$conexion,$phpv);
			$col_espe	=	$array_mysql[0];
			$espe		=	$_POST[$array_name[0]];	
			$orde		=	"";
			$dire		=	1;
			$buscar		=	1;
			$consu		=	consulta($tabla,$conexion,$col_espe,$espe,$orde,$dire,$phpv,$buscar);
			$dato		=	mysql_fe_ar($consu,$phpv);
			$col_espe	=	$array_mysql[0];
			$espe		=	$_POST[$array_name[0]];
			 $res="DELETE FROM $tabla  WHERE $col_espe='$espe'";
			if(($_POST[operador]=="Eliminar")&&($_POST[$array_name[0]]==$dato[ID_G])){ejecuta($conexion,$res,$phpv);//Echo$res;
				$_POST[operador]="Limpia";
			}
	} 
}
class objeto			{
	function Despliege		($base,$tabla,$conexion,$phpv,$coluna,$array_mysql,$array_name){
		db($base,$conexion,$phpv);
			$col_espe	=	"";//$array_mysql[0];
			$espe		=	"";//$_POST[$array_name[0]];	
			$orde		=	"";
			$dire		=	1;
			$buscar		=	1;
			$consu		=	consulta($tabla,$conexion,$col_espe,$espe,$orde,$dire,$phpv,$buscar);
							mysql_da_se($consu,0,$phpv);
		
		$res=$res."<select class='Medio' name='$name' $libre>";
		if($name2<>'')$res=$res."<OPTION value='$name'>$name2</OPTION>";
			while($datos= mysql_fe_ar($consu,$phpv)){$set='';		
				if($datos[$descarga]==$_POST[$name]){$set='selected';}
				$res=$res."<option value='$datos[$descarga]' $set>$datos[$descarga]</option>";
			}
		$res=$res."</select>";
		return $res;
	}
	function Conte_Centro	($style,$libre,$conte){
		if($libre==""){$libre="id='Conte-pri'";}
		$res=div($style,$libre,$conte);
		return $res;
	}
	function Conte_Info		($base,$tabla,$conexion,$phpv,$size,$style,$title,$id,$libre,$class,$array_text,$array_mysql,$array_type,$array_name,$array_title,$array_value,$array_style,$array_id,$array_libre,$array_class,$array_valida){
		$style_red="border-right-width: 5px;border-right-color: red;	border-bottom-right-radius: 5px;border-top-right-radius: 5px;box-shadow: 1px 1px 1px red;";
		$style_gre="border-right-width: 5px;border-right-color: green;	border-bottom-right-radius: 5px;border-top-right-radius: 5px;box-shadow: 1px 1px 1px green;";
		$style_ora="border-right-width: 5px;border-right-color: orange;	border-bottom-right-radius: 5px;/*border-top-right-radius: 5px;*/box-shadow: 1px 1px 1px orange;";
		if($size==""){$style="background: rgba(5, 72, 108, 0.67) none repeat scroll 0% 0%; width: 220px; left: 780px; color: white; position: absolute;";}
								$conta=count($array_name);
		if($array_mysql<>"")	$conta=count($array_mysql);
		$array_name=$array_mysql;
		for($x=0; $x<$conta; $x++){if($array_valida[$x]==1)$array_style[$x]=$array_style[$x].$style_ora;}
		if($_POST[$array_name[0]]<>""){//verifica que no existente 	
			db($base,$conexion,$phpv);
			$col_espe	=	$array_mysql[0];
			$espe		=	$_POST[$array_name[0]];	
			$orde		=	"";
			$dire		=	1;
			$buscar		=	1;
			$consu=consulta($tabla,$conexion,$col_espe,$espe,$orde,$dire,$phpv,$buscar);
			$dato=mysql_fe_ar($consu,$phpv);
			if(($dato[$array_mysql[0]]<>"")and($_POST[operador]==Actualizar))$array_type[0]=button;
			if(($dato[$array_mysql[0]]<>"")and($_POST[operador]<>Actualizar)){
				for($x=0; $x<$conta; $x++){
					$_POST[$array_name[$x]]=$dato[$array_mysql[$x]];
					$array_type[$x]=button;
				}
			}
		}
		$res=tablero_array	($size,$style,$title,$id,$libre,$class,$array_text,$array_mysql,$array_type,$array_name,$array_title,$array_value,$array_style,$array_id,$array_libre,$array_class);
		return $res;
	}
	function Conte_Opera	($base,$tabla,$conexion,$phpv,$array_text,$array_mysql,$array_type,$array_name,$array_title,$array_value,$array_style,$array_id,$array_libre,$array_class,$array_valida){
		if($size==""){$style="background: rgba(5, 72, 108, 0.67) none repeat scroll 0% 0%; width: 220px; left: 780px; top: 400px; color: white; position: absolute;";}
								$conta=count($array_name);
		if($array_mysql<>"")	$conta=count($array_mysql);
		$valida=true;
		for($x=0; $x<$conta; $x++){
			if($array_mysql[$x]<>"")	$array_name[$x]=$array_mysql[$x];
			if($array_value[$x]=="")	$array_value[$x]=$_POST[$array_name[$x]];
			if(($array_valida[$x]=="1")&&($array_value[$x]==""))$valida=false;
		}
		if($_POST[$array_name[0]]<>""){//verifica que no existente 	
			db($base,$conexion,$phpv);
			$col_espe	=	$array_mysql[0];
			$espe		=	$_POST[$array_name[0]];	
			$orde		=	"";
			$dire		=	1;
			$buscar		=	1;
			$consu=consulta($tabla,$conexion,$col_espe,$espe,$orde,$dire,$phpv,$buscar);
			$dato=mysql_fe_ar($consu,$phpv);
		}
		$name=operador;
		$v1=Nuevo;
		if ($dato[ID_G]==$_POST[$array_name[0]])	$v2=Modificar;
		if ($dato[ID_G]==$_POST[$array_name[0]])	$v3=Eliminar;
		if ($dato[ID_G]==$_POST[$array_name[0]])	$v4=Actualizar;
													$v5=Guardar;
													$v6=Vaciar;
		if ($_POST[$array_name[0]]==""){$_POST[$name]=$v1;$v2="";$v3="";$v4="";$v6="";}
		if ($valida==false){$v5="";}
		if (($dato[ID_G]==$_POST[$array_name[0]])and($_POST[operador]<>Actualizar))$v5="";	
		$res=menu($style,$libre,$name,$v1,$v2,$v3,$v4,$v5,$v6,$v7,$v8,$v9,$v10);
		return $res;
		
	}
	function Conte_Consu	($base,$tabla,$conexion,$phpv,$array_text,$array_mysql,$array_type,$array_name,$array_title,$array_value,$array_style,$array_id,$array_libre,$array_class,$array_valida){	
		$style0="background: rgba(5, 72, 108, 0.67) 				none repeat scroll 0% 0%; overflow: auto; overflow-x:hidden; position: absolute; left: 115px; height: 28px; width: 664px; top: 0px;";
								$conta=count($array_name);
		if($array_mysql<>"")	$conta=count($array_mysql);
		if ($_POST[D_i]==''){$_POST[D_i]=1;}
		if ($_POST[M_i]==''){$_POST[M_i]=date("m");}
		if ($_POST[A_i]==''){$_POST[A_i]=date("Y");}
		if ($_POST[D_f]==''){$_POST[D_f]=31;}
		if ($_POST[M_f]==''){$_POST[M_f]=date("m");}
		if ($_POST[A_f]==''){$_POST[A_f]=date("Y");}
		
		$libre=' onLoad=consulta(); onChange=consulta();';
		$n1="Inicio	".input2(hidden,D_i,'',$_POST[D_i]).despieges(D_i,Dia,1,31,$libre,D_i_des).input2(hidden,M_i,'',$_POST[M_i]).despieges(M_i,Mes,1,12,$libre,M_i_des).input2(hidden,A_i,'',$_POST[A_i]).despieges(A_i,Año,2015,2030,$libre,A_i_des);
		$n2="Fin	".input2(hidden,D_f,'',$_POST[D_f]).despieges(D_f,Dia,1,31,$libre,D_f_des).input2(hidden,M_f,'',$_POST[M_f]).despieges(M_f,Mes,1,12,$libre,M_f_des).input2(hidden,A_f,'',$_POST[A_fs]).despieges(A_f,Año,2015,2030,$libre,A_f_des);
		for($x=1; $x<$conta; $x++){
			if($array_type[$x]==Estatus)		$n3=objeto::Estatus('',Select);
		}
		$title="<table><tr><td>$n1</td><td>$n2</td><td>$n3</td><td>$n4</td></tr></table>";
		$res= div($style0,$libre,$title);
		//------------------------------------------------------
		$style1="background: rgba(5, 72, 108, 0.67) 				none repeat scroll 0% 0%; overflow: auto; overflow-x:hidden; position: absolute; left: 115px; height: 28px; width: 664px; top: 28px;";
		
		//----------------------------------------------------
		db($base,$conexion,$phpv);
		$consu=consulta($tabla,$conexion,'','','',1,$phpv);
		mysql_da_se($consu,0,$phpv);
		$conte="<table><tr>";
		for($x=0; $x<$conta; $x++){
			$d=input2(button,$array_text[$x],"",$array_text[$x]);				
			$conte=$conte."<td>$d</td>";
		}
		$conte=$conte."</tr>";
		while($dato=mysql_fe_ar($consu,$phpv)){	
			$c="";
			$Est=1;
			for($x=1; $x<$conta; $x++){
				if($array_type[$x]==Estatus)	{
					$Est=objeto::Estatus		($dato[$array_mysql[$x]],Identi);
				}

				$d=input2(button,$array_mysql[$x],"",$dato[$array_mysql[$x]]);
				if($array_type[$x]==textarea){$d="<textarea name='$array_name[$x]' title='$array_title[$x]' style='$array_style[$x]' id='$array_id[$x]' class='$array_class[$x]' $array_libre[$x]>$array_value[$x]</textarea>";}
				
				$c=$c."<td>$d</td>";
			}
			$r="<tr>";
			if($Est==3)$r="<tr bgcolor='#343434'>";
			$d=input2(submit,ID_G,"",$dato[ID_G]);
			$r=$r."<td>$d</td>".$c;
			$r=$r."</tr>";
			if($Est==2){$r="";}
			$conte=$conte.$r;
		}
		$conte=$conte."</table>";
		if($style=="")$style="color: white; background: rgba(5, 72, 108, 0.67)	none repeat scroll 0% 0%; overflow: auto; overflow-x: auto; position: absolute; left: 115px; height: 542px; width: 664px; top: 56px;";
		$libre='id="resultado"';
		$res=$res.div($style,$libre,$conte);
		return $res;
	}
	function Conte_Consola	($base,$tabla,$conexion,$phpv,$array_text,$array_mysql,$array_type,$array_name,$array_title,$array_value,$array_style,$array_id,$array_libre,$array_class,$array_valida){
								$conta=count($array_name);
		if($array_mysql<>"")	$conta=count($array_mysql);
		$valida=true;
		for($x=0; $x<$conta; $x++){
			if($array_mysql[$x]<>"")	$array_name[$x]=$array_mysql[$x];
			if($array_value[$x]=="")	$array_value[$x]=$_POST[$array_name[$x]];
			if(($array_valida[$x]<>"")&&($array_value[$x]==""))$valida=false;
		}
		if($_POST[$array_name[0]]<>""){//verifica que no existente 	
			db($base,$conexion,$phpv);
			$col_espe	=	$array_mysql[0];
			$espe		=	$_POST[$array_name[0]];	
			$orde		=	"";
			$dire		=	1;
			$buscar		=	1;
			$consu=consulta($tabla,$conexion,$col_espe,$espe,$orde,$dire,$phpv,$buscar);
			$dato=mysql_fe_ar($consu,$phpv);
		}
		if ($_POST[operador]==Vaciar){
			for($x=0; $x<$conta; $x++){
				$_POST[$array_name[$x]]="";
			}
		}
		if (($dato[ID_G]==$_POST[$array_name[0]])and($_POST[operador]<>Actualizar)and($_POST[operador]<>Guardar))$_POST[operador]=Modificar;
		
	}
	function Estatus		($dato,$menu){
		$Estatus1=Activo;
		$Estatus2=Inactivo;
		$name=menu_Estatus;
		$name2=Estatus;
		if($menu==ver){
			$res=input2(hidden,$name2,"",$_POST[$name2]);
			$sel_visual[0]=$Estatus1;	$sel_value[0]=$Estatus1;
			$sel_visual[1]=$Estatus2;	$sel_value[1]=$Estatus2;
			$res=$res.select($name2,$sel_style,"title=''",1,$sel_value,$sel_visual,$sel_title,$sel_libre2);
		}
		/*
		if(($dato=="")&&($menu=="")){
			
			if ($_POST[Estatus]=="")				$_POST[Estatus]=$Estatus1;
			if ($_POST[Estatus]==Activar)			$_POST[Estatus]=$Estatus1;
			if ($_POST[Estatus]==Desactivar)		$_POST[Estatus]=$Estatus2;
			$res=		input2(hidden,Estatus,"",	$_POST[Estatus]);
			$res=$res.	input2(button,Estatus,"",	$_POST[Estatus]);
			if ($_POST[Estatus]=="Inactivo"){	$res=$res."<br>".input2(submit,Estatus,"Cambiar a Inactivo",Activar);	}else
			if ($_POST[Estatus]=="Activo"){		$res=$res."<br>".input2(submit,Estatus,"Cambiar a Activo",Desactivar);	}
		}*/
		if ($dato<>""){
			$res=1;																//elemento activo por antiguedad
			if ($dato==$Estatus1){$res=1;}										//elemento activo por ajuste
			if (($dato==$Estatus2)and($_POST[$name]==Ocultar)){$res=2;}			//elemento oculto 
			if (($dato==$Estatus2)and($_POST[$name]==Mostrar)){$res=3;}			//elemento visible
			
		}
		if ($menu=="Identi"){
			$res=1;
			if ($dato==$Estatus1){$res=1;}
			if (($dato==$Estatus2)and($_POST[$name]==Ocultar)){$res=2;}	
			if (($dato==$Estatus2)and($_POST[$name]==Mostrar)){$res=3;}	
			
		}
		if ($menu=="Select"){
			$res=input2(hidden,$name,"",$_POST[$name]);
			$sel_visual[0]=$sel_value[0]=Ocultar;
			$sel_visual[1]=$sel_value[1]=Mostrar;
			$res=select($name,$sel_style,"title='Elemento Inactivos'",1,$sel_value,$sel_visual,$sel_title,$sel_libre2);
		}
		return $res;
	}	
	function Fecha_re		(){
		if($_POST[Fecha_re]=="")$_POST[Fecha_re]=date("d/m/Y");
		$res=		input2(hidden,Fecha_re,"",$_POST[Fecha_re]);
		$res=$res.	input2(button,Fecha_re,"",$_POST[Fecha_re]);
		return $res;
	}
	function N_Fact			(){
		if($_POST[N_Fact]=="")$_POST[N_Fact]=0;
		$res=		input2(hidden,N_Fact,"",$_POST[N_Fact]);
		$res=$res.	input2(button,N_Fact,"",$_POST[N_Fact]);
		return $res;
	}
	function Lista_mysql	($base,$tabla,$conexion,$phpv,$array,$col,$style){
			//recive datos de la tabla 
			$array_config	=	$array[config];
			$array_text		=	$array[text];
			$array_mysql	=	$array[mysql];
			$array_type		=	$array[type];
			$array_id		=	$array[id];
			$array_class	=	$array[clas];
			$array_valida	=	$array[valid];
			$conta=count($array_mysql);
			$array_name=$array_mysql;
			//Descarga datos 
			db($base,$conexion,$phpv);
			$col_espe	=	'';
			$espe		=	'';
			$orde		=	$array_mysql[$col];
			$dire		=	'';
			$buscar		=	'';
			$consu=consulta($tabla,$conexion,$col_espe,$espe,$orde,$dire,$phpv,$buscar);
			//extructura
			$name=$array_mysql[$col];
			$style="width: 114px;";
			$conte=$conte.	objeto::Select_array_mysql($name,$style,$libre,$col,$consu,$phpv,$array);	
			$style="width: 115px; height: 270px; background: black; top: 25px; position: absolute; /*box-shadow: 2px 2px 2px white;*/ overflow-y: auto; overflow-x: hidden;";
			mysql_da_se		($consu,0,$phpv);
			while($dato=mysql_fe_ar($consu,$phpv)){	
				$Est=1;
				$Est=objeto::Estatus		($dato[$array_config[Estatus]],Identi);
				
				$libre="";
				if($Est==3)										{$libre="background: #343434; color: white;";}
				if($_POST[$name]==$dato[$col])					{$libre='background: black; color: green; box-shadow: 2px 2px green;';}
				if(($Est==3)&&($_POST[$name]==$dato[$col]))		{$libre="background: black; color: red; box-shadow: 2px 2px red;";}
				if(($Est==3)or($Est==1))$res=$res.input2(submit,$name,'',$dato[$col],$libre.' width: 95px;')."<br>";
				
			}
			$conte=$conte.	div($style,$libre,$res);		
			$style="posicion: absolute; width: 115px; height: 300px; background: RGBA(0, 0, 0, 0.76);";
			$res=div($style,$libre,$conte);
		return $res;
	}
	function Select_array($name,$style,$libre,$array_value,$array_title,$array_visua,$array_libre){
		$res=		"<select name='$name' class='Medio' style='$style' $libre>";
		$conta=count($array_name);
		for($x=0; $x<$conta; $x++){
			if($_POST[$name]==$array_value[$x]){$array_libre[$x]=$array_libre[$x]." selected=''";}
			$res=$res."<option value='$array_value[$x]'  title='$array_title[$x]' $array_libre[$x]>$array_visual[$x]</option>";
		}
		$res=$res.	"</select>";	
		return $res;
	}
	function Select_array_mysql($name,$style,$libre,$col,$consu,$phpv,$array){
		
			$array_config	=	$array[config];
			$array_text		=	$array[text];
			$array_mysql	=	$array[mysql];
			$array_type		=	$array[type];
			$array_id		=	$array[id];
			$array_class	=	$array[clas];
			$array_valida	=	$array[valid];
		
		$res=$res.		"<select name='$name' id='$name' title='$_POST[$name]' value='$_POST[$name]' class='Medio' style='$style' $libre>";
		mysql_da_se		($consu,0,$phpv);
		while($dato=mysql_fe_ar($consu,$phpv)){	
		$libre_set="";
			if($_POST[$name]==$dato[$col]){$libre_set="  style='background: #343434; color: white;' selected";}
			$Est=1;
			$Est=objeto::Estatus		($dato[$array_config[Estatus]],Identi);
			
			
			if($Est==3)										{$libre_set="style='background: #343434; color: white;'";}
			if($_POST[$name]==$dato[$col])					{$libre_set="style='background: black; color: green; box-shadow: 2px 2px green;'";}
			if(($Est==3)&&($_POST[$name]==$dato[$col]))		{$libre_set="style='background: black; color: red; box-shadow: 2px 2px red;'";}
			if(($Est==3)or($Est==1))
				$res=$res."<option value='$dato[$col]'  title='$dato[$col]' $array_libre[$x] $libre_set>$dato[$col]</option>";
		}
		$res=$res.	"</select>";	
		return $res;
	}
} 	
?>