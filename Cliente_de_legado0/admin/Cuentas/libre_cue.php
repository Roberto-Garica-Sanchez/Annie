<?php //php7
/*
------------function en esta librerria
-->db							('empresa',$conexion);
-->ejecuta						($conexion,$res);
-->consulta						($tabla,$conexion,$col_espe,$espe,$orde,$dire);
-->despliegre_mysql				($name,$name2,$consu,$descarga);
-->Presenta1					(.. formato ..);
-->presenta2					($hidden,$name1,$name2,$type,$style,$borra,$consu);
-->Presenta3					(.. formato ..);
-->compro						($com,$col,$var,$consu,$conexion);
-->liinputli					($type,$name,$id,$value,$libre);
-->despieges					($name,$title,$inicio,$fin);
-->focuas_a						($limite,$to);
-->zero							($valor);
-->function auto_tab_insert		(.. formato ..);
-->sub_menu						(.. formato ..);
-->tablero						(.. formato ..);
*/

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
if ($uno_para_todos<>1){
	function db($base,$conexion,$phpv){
		if ($conexion=="") 	{echo"[db] Conecion no existente";}
		if ($phpv=="")  	{echo"[db]Version de php no Definidad";$conexion="";}
		if ($phpv==php5)	{$res=mysql_select_db($base,$conexion)  or die ("[db]Error para Selecionar -$base");}
		if ($phpv==php7)	{$res=mysqli_select_db ($conexion,$base)or die ("[db]Error para Selecionar -$base");}
		return $res;
	}
	function ejecuta($conexion,$res,$phpv){
		if ($conexion=="") 	{echo"[ej] Conecion no existente";}
		if ($phpv=="")		{echo"[ej]Sin Conexion para Ejecutar";exit;}
		if ($res=="")		{echo"[ej]Sin 'Res' para Ejecutar";exit;}
		if ($phpv==php5) 	{$res=mysql_query($res,$conexion) or die("\r<br>Error De Query \r<br>$res");}
		if ($phpv==php7) 	{$res=mysqli_query($conexion,$res)or die("\r<br>Error De Query \r<br>$res");}
		return $res;
	}
	function consulta($tabla,$conexion,$col_espe,$espe,$orde,$dire,$phpv){
		$consulta="SELECT * FROM ".$tabla;
		if (($espe<>'') and ($col_espe<>'')){$consulta="SELECT * FROM $tabla WHERE $col_espe='$espe'";}
		if ($dire<>'')		$dire=DESC;
		if ($dire=='')		$dire=ASC;
		if ($orde<>'')		{$consulta=$consulta." ORDER BY $orde $dire";}
		$res=$consulta;
		$consu=ejecuta($conexion,$res,$phpv);
		return $consu;
	}		
	function compro($com,$col,$var,$consu,$conexion,$phpv){
		$d=false;
		$res=$consu;
		mysql_da_se($res,$posicion,$phpv);
		while($dato=mysql_fe_ar($res,$phpv)){
			if ($dato[$col]==$com){$d=true; break;}
		}
		if($var<>'')$d=$dato[$var];
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
		$na4,$va4,$repit4
	){
		$d="INSERT INTO $tabla ($n0";
		if ($n1<>'')$d=$d.",$n1";
		if ($n2<>'')$d=$d.",$n2";
		if ($n3<>'')$d=$d.",$n3";
		if ($n4<>'')$d=$d.",$n4";
		if ($n5<>'')$d=$d.",$n5";
		if ($n6<>'')$d=$d.",$n6";
		if ($n7<>'')$d=$d.",$n7";
		if ($n8<>'')$d=$d.",$n8";
		if ($n9<>'')$d=$d.",$n9";
		if ($n10<>'')$d=$d.",$n10";
		for($x=1; $x<=$repit1; $x++){
			if ($repit1>=$x)$d=$d.",";
			$Name1=$na1.$x;
			$d=$d.$Name1;
		}
		if ($na2<>''){
			for($x=1; $x<=$repit2; $x++){
				if ($repit2>=$x)$d=$d.",";
				$Name1=$na2.$x;
				$d=$d.$Name1;
			}
		}
		if ($na3<>''){
			for($x=1; $x<=$repit3; $x++){
				if ($repit3>=$x)$d=$d.",";
				$Name1=$na3.$x;
				$d=$d.$Name1;
			}
		}
		if ($na4<>''){
			for($x=1; $x<=$repit4; $x++){
				if ($repit4>=$x)$d=$d.",";
				$Name1=$na4.$x;
				$d=$d.$Name1;
			}
		}
		$d=$d.") VALUE ('$v0'";
		if ($n1<>'')$d=$d.",'$v1'";
		if ($n2<>'')$d=$d.",'$v2'";
		if ($n3<>'')$d=$d.",'$v3'";
		if ($n4<>'')$d=$d.",'$v4'";
		if ($n5<>'')$d=$d.",'$v5'";
		if ($n6<>'')$d=$d.",'$v6'";
		if ($n7<>'')$d=$d.",'$v7'";
		if ($n8<>'')$d=$d.",'$v8'";
		if ($n9<>'')$d=$d.",'$v9'";
		if ($n10<>'')$d=$d.",'$v10'";
		for($x=1; $x<=$repit1; $x++){
			if ($repit1>=$x)$d=$d.",";
			$Name1=$va1.$x;
			$d=$d."'$_POST[$Name1]'";
		}
		if ($va2<>''){
			for($x=1; $x<=$repit2; $x++){
				if ($repit2>=$x)$d=$d.",";
				$Name1=$va2.$x;
				$d=$d."'$_POST[$Name1]'";
			}
		}
		if ($va3<>''){
			for($x=1; $x<=$repit3; $x++){
				if ($repit3>=$x)$d=$d.",";
				$Name1=$va3.$x;
				$d=$d."'$_POST[$Name1]'";
			}
		}
			if ($va4<>''){
			for($x=1; $x<=$repit4; $x++){
				if ($repit4>=$x)$d=$d.",";
				$Name1=$va4.$x;
				$d=$d."'$_POST[$Name1]'";
			}
		}
		$d=$d.")";
		return $d;
	}
}
db('empresa',$conexion,$phpv);
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
$consu1=consulta('choferes'	           ,$conexion,'','',Nombre_Ch,"",$phpv);
$consu1_1=consulta('choferes_off'      ,$conexion,"","","","",$phpv);
$consu1_2=consulta('choferes_on'       ,$conexion,"","","","",$phpv);
$consu2=consulta('placas'              ,$conexion,"","","","",$phpv);
$consu3=consulta('clientes'            ,$conexion,"","","","",$phpv);
$consu4=consulta('fechas'	           ,$conexion,"","","","",$phpv);
$consu5=consulta('folio'	           ,$conexion,'','',ID_G,1,$phpv);
$consu6=consulta('fletes'	           ,$conexion,"","","","",$phpv);
$consu7=consulta('viaticos'	           ,$conexion,"","","","",$phpv);
$consu8=consulta('disel'	           ,$conexion,"","","","",$phpv);
$consu9=consulta('casetas'	           ,$conexion,"","","","",$phpv);
$consu9_1=consulta('casetas_via'	   ,$conexion,"","","","",$phpv);
$consu10=consulta('facturas'	       ,$conexion,"","","","",$phpv);
$consu11=consulta('ryr'		           ,$conexion,"","","","",$phpv);
$consu12=consulta('guias'	           ,$conexion,"","","","",$phpv);
$consu13=consulta('maniobras'	       ,$conexion,"","","","",$phpv);
$consu14=consulta('km'		           ,$conexion,"","","","",$phpv);

$consu16=consulta('fletes_c'	       ,$conexion,"","","","",$phpv);
$consu17=consulta('viaticos_c'	       ,$conexion,"","","","",$phpv);
$consu18=consulta('disel_c'	           ,$conexion,"","","","",$phpv);
$consu19=consulta('casetas_c'	       ,$conexion,"","","","",$phpv);
$consu20=consulta('facturas_c'	       ,$conexion,"","","","",$phpv);
$consu21=consulta('ryr_c'	           ,$conexion,"","","","",$phpv);
$consu22=consulta('guias_c'	           ,$conexion,"","","","",$phpv);
$consu23=consulta('maniobras_c'	       ,$conexion,"","","","",$phpv);
$consu24=consulta('abo_acu' 	       ,$conexion,"","","","",$phpv);
function Presenta1($type,$type1,$type2,$x,$n1,$n2,$v1,$v2,$n_r1,$n_r2,$title1,$title2,$focus1,$focus2,$max1,$max2,$style1,$style2){
	if($type<>hidden){
	echo"
		<tr >
			<td >$x</td >
			<td ><input type='$type1' name='$n1' value='$v1' title='$title1' Class='Medio' $focus1 maxlength='$max1' style='$style1'>	</td >
			<td ><input type='$type2' name='$n2' value='$v2' title='$title2' Class='Medio' $focus2 maxlength='$max2' style='$style2'>	</td >
		</tr >";
	}
	if($type==hidden){echo"<tr ><td>$x</td><td >$name1</td ><td >$name2</td ></tr >";}
}
function presenta2($hidden,$name1,$name2,$type,$style,$borra,$consu){
    for($x=1; $x<=$_POST[$hidden]; $x++){
		$Name1=$name1.$x;
		$Name2=$name2.$x;
		if (($_POST[$Name1]=='')and($_POST[$Name2]=='')and($_POST[$hidden]>1)){$_POST[$hidden]=$_POST[$hidden]-1;}
    }
	for($x=1; $x<=$_POST[$hidden]; $x++){
		$y=$x+1;
		$Name1=$name1.$x;
        $Name2=$name2.$x;
		$Name3=$name1.$y;
		$Name4=$name2.$y;
		if (($borra<>'')and($_POST[$Name1]==$borra))	{$_POST[$Name1]='';$_POST[$Name2]='';}
		if ((($_POST[$Name1]=='')or($_POST[$Name1]=='0'))and($_POST[$Name2]=='')){$_POST[$Name1]=$_POST[$Name3];$_POST[$Name2]=$_POST[$Name4];$_POST[$Name3]='';$_POST[$Name4]='';}
		echo"<input type='$type' class='Medio' name='$Name1' value='$_POST[$Name1]' style='$style'>
			 <input type='$type' class='Medio' name='$Name2' value='$_POST[$Name2]' style='$style'>";
		$total=$total+$_POST[$Name2];
	}
	return round($total,2);
}
function Presenta3(
	$id,$style,$style_t,$title,$col1,$col2
	,$t0,$t1,$t2
	,$repite,$limite
	,$name1,$name2,$name3
	,$n_r1,$n_r2
	,$title1,$title2
	,$max1,$max2
	,$style1,$style2
	,$d1,$d2
	,$final
){
	if ($col1==''){$col1=Comentarios;}
	if ($col2==''){$col2=Importe;}
	echo"<table id='$id' style='$style'>";
	echo"
		<tr style='$style_t'><td colspan='3'><center>$title</center></td></tr>
		<tr><td></td><td>$col1</td><td>$col2</td></tr>
	";
	$t=0;
	for($x=1; $x<=$repite; $x++){
		$n1=$name1.$x;
		$v1=$_POST[$n1];
		$n2=$name2.$x;
		$v2=$_POST[$n2];
		if ($n_r1<>'')$n1=$n_r1;
		if ($n_r2<>'')$n2=$n_r2;
		if (($_POST[$n2]<>'')and($repite==$x)and($repite<$limite))	{$repite=$repite+1;}
		if (($_POST[$n1]=='')and($repite==$x))						{$libre1="autofocus";}
		if (($_POST[$n2]=='')and($repite==$x))						{$libre2="autofocus";}
		$c1=input2($t1,$n1,$title1,$v1,$style1,$d1,$libre1);
		$c2=input2($t2,$n2,$title2,$v2,$style2,$d2,$libre2);
		if ($t0=='')$t0=hidden;
		if (($t0==hidden)and($t1==hidden))	{$c1=$c1.input2(button,'','',$v1,'text-align: left;');}
		if (($t0==hidden)and($t2==hidden))	{$c2=$c2.input2(button,'','',$v2,'text-align: left;');}
		$t=$t+$_POST[$n2];
		print"<tr><td>$x</td><td>$c1</td><td>$c2</td></tr>";
	}
	echo"<tr><td></td><td>Total</td><td>$t</td></tr>$final
	</table>";
	return $repite;
}
function liinputli($type,$name,$id,$value,$libre){
    if ($type=='')$type=submit;
    echo"<li><input type='$type' name='$name' value='$value' id='$id' $libre></li>";
}
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
function focuas_a($limite,$to){	
	$if='if (this.value.length == this.getAttribute("maxlength")) '. $to.'.focus()';
	$libre="maxlength='$limite' onkeyup='$if'";
	return $libre;
}
function sub_menu(
    $style
    ,$n1,$n2    ,$de
    ,$v1,$b1    ,$v2,$b2
    ,$v3,$b3    ,$v4,$b4
    ,$v5,$b5    ,$v6,$b6
    ,$v7,$b7    ,$v8,$b8
    ,$v9,$b9    ,$v10,$b10
    ,$v11,$b11    ,$v12,$b12
    ,$v13,$b13
){
    $id=idI;
    $li_b="style=' border-color: blue;'";
    $li_r="style=' border-color: red;'";
    if ($_POST[$n1]==''){$_POST[$n2]=$de;$_POST[$n1]=$de;}
    if ($_POST[$n1]<>''){$_POST[$n2]=$_POST[$n1];}
    if ($_POST[$n1]==$v1){$id1=id_I;}else{$id1=$id;    if ($b1<>''){$li1=$li_r;$type1=button;}else{$li1=$li_b;}}
    if ($_POST[$n1]==$v2){$id2=id_I;}else{$id2=$id;    if ($b2<>''){$li2=$li_r;$type2=button;}else{$li2=$li_b;}}
    if ($_POST[$n1]==$v3){$id3=id_I;}else{$id3=$id;    if ($b3<>''){$li3=$li_r;$type3=button;}else{$li3=$li_b;}}
    if ($_POST[$n1]==$v4){$id4=id_I;}else{$id4=$id;    if ($b4<>''){$li4=$li_r;$type4=button;}else{$li4=$li_b;}}
    if ($_POST[$n1]==$v5){$id5=id_I;}else{$id5=$id;    if ($b5<>''){$li5=$li_r;$type5=button;}else{$li5=$li_b;}}
    if ($_POST[$n1]==$v6){$id6=id_I;}else{$id6=$id;    if ($b6<>''){$li6=$li_r;$type6=button;}else{$li6=$li_b;}}
    if ($_POST[$n1]==$v7){$id7=id_I;}else{$id7=$id;    if ($b7<>''){$li7=$li_r;$type7=button;}else{$li7=$li_b;}}
    if ($_POST[$n1]==$v8){$id8=id_I;}else{$id8=$id;    if ($b8<>''){$li8=$li_r;$type8=button;}else{$li8=$li_b;}}
    if ($_POST[$n1]==$v9){$id9=id_I;}else{$id9=$id;    if ($b9<>''){$li9=$li_r;$type9=button;}else{$li9=$li_b;}}
    if ($_POST[$n1]==$v10){$id10=id_I;}else{$id10=$id; if ($b10<>''){$li10=$li_r;$type10=button;}else{$li10=$li_b;}}
    if ($_POST[$n1]==$v11){$id11=id_I;}else{$id11=$id; if ($b11<>''){$li11=$li_r;$type11=button;}else{$li11=$li_b;}}
    echo"
    <div id='conte-isqu' style='$style'>
        <div id='sub_menu'>
        <input type='hidden' class='Medio' name='$n1' value='$_POST[$n1]'>
        <input type='hidden' class='Medio' name='$n2' value='$_POST[$n2]'>
            <ul id='smenu-botones'>";
                liinputli($type1,$n1,$id1,$v1,$li1);
                liinputli($type2,$n1,$id2,$v2,$li2);
                liinputli($type3,$n1,$id3,$v3,$li3);
                liinputli($type4,$n1,$id4,$v4,$li4);
                liinputli($type5,$n1,$id5,$v5,$li5);
                liinputli($type6,$n1,$id6,$v6,$li6);
                liinputli($type7,$n1,$id7,$v7,$li7);
                liinputli($type8,$n1,$id8,$v8,$li8);
                liinputli($type9,$n1,$id9,$v9,$li9);
                liinputli($type10,$n1,$id10,$v10,$li10);
                liinputli($type11,$n1,$id11,$v11,$li11);

    echo"		</ul >
        </div >
    </div >
    ";
}
if ($uno_para_todos<>1){
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
		<tr  ><td colspan="2" align="center"><font color="'.$tf.'">'.$title1.'</font ></td ></tr >
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
}}
$libre=1;
?>