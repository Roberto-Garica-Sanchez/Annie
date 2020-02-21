<?php
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
db('empresa',$conexion);
function db($base,$conexion){
        mysql_select_db($base,$conexion)or die ('<font color="red">Error DB</font>');
}
function input($type,$name,$value,$title,$style,$libre){
  $z="<input type='$type' name='$name' value='$value' style='$style' class='Medio' title='$title' $libre>";
  return $z;	
}
function consulta($tabla,$conexion,$col_espe,$espe,$orde,$dire){
    $consulta="SELECT * FROM ".$tabla;
	if(($espe<>'') and ($col_espe<>'')){
        $consulta="SELECT * FROM $tabla WHERE $col_espe='$espe'";
    }
	IF($dire<>'')$dire=DESC;
	IF($dire=='')$dire=ASC;
	if ($orde<>''){$consulta=$consulta." ORDER BY $orde $dire";}
    $consu=mysql_query($consulta,$conexion)	or Die	("Error Extracion  Tabla: $tabla <br>------Consulta: ------<br>  $consulta <br>---T");
    return $consu;
}
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
$consu1=consulta('choferes'	           ,$conexion,'','',Nombre_Ch,1);
$consu1_1=consulta('choferes_off'      ,$conexion);
$consu1_2=consulta('choferes_on'       ,$conexion);
$consu2=consulta('placas'              ,$conexion);
$consu3=consulta('clientes'            ,$conexion);
$consu4=consulta('fechas'	           ,$conexion);
$consu5=consulta('folio'	           ,$conexion,'','',ID_G,1);
$consu6=consulta('fletes'	           ,$conexion);
$consu7=consulta('viaticos'	           ,$conexion);
$consu8=consulta('disel'	           ,$conexion);
$consu9=consulta('casetas'	           ,$conexion);
$consu9_1=consulta('casetas_via'	,$conexion);
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
$consu24=consulta('abo_acu' 	       ,$conexion);
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
}
function compro($com,$col,$var,$consu,$conexion){
	$d=false;
	mysql_data_seek($consu,0);
        while($dato=mysql_fetch_array($consu)){
		if ($dato[$col]==$com){$d=true; break;}
	}
	if($var<>'')$d=$dato[$var];
	return $d;
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
function zero($valor){
 $res=str_pad($valor,2, '0', STR_PAD_LEFT);
 return $res;
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
    if($_POST[$n1]==''){$_POST[$n2]=$de;$_POST[$n1]=$de;}
    if($_POST[$n1]<>''){$_POST[$n2]=$_POST[$n1];}
    if($_POST[$n1]==$v1){$id1=id_I;}else{$id1=$id;    if($b1<>''){$li1=$li_r;$type1=button;}else{$li1=$li_b;}}
    if($_POST[$n1]==$v2){$id2=id_I;}else{$id2=$id;    if($b2<>''){$li2=$li_r;$type2=button;}else{$li2=$li_b;}}
    if($_POST[$n1]==$v3){$id3=id_I;}else{$id3=$id;    if($b3<>''){$li3=$li_r;$type3=button;}else{$li3=$li_b;}}
    if($_POST[$n1]==$v4){$id4=id_I;}else{$id4=$id;    if($b4<>''){$li4=$li_r;$type4=button;}else{$li4=$li_b;}}
    if($_POST[$n1]==$v5){$id5=id_I;}else{$id5=$id;    if($b5<>''){$li5=$li_r;$type5=button;}else{$li5=$li_b;}}
    if($_POST[$n1]==$v6){$id6=id_I;}else{$id6=$id;    if($b6<>''){$li6=$li_r;$type6=button;}else{$li6=$li_b;}}
    if($_POST[$n1]==$v7){$id7=id_I;}else{$id7=$id;    if($b7<>''){$li7=$li_r;$type7=button;}else{$li7=$li_b;}}
    if($_POST[$n1]==$v8){$id8=id_I;}else{$id8=$id;    if($b8<>''){$li8=$li_r;$type8=button;}else{$li8=$li_b;}}
    if($_POST[$n1]==$v9){$id9=id_I;}else{$id9=$id;    if($b9<>''){$li9=$li_r;$type9=button;}else{$li9=$li_b;}}
    if($_POST[$n1]==$v10){$id10=id_I;}else{$id10=$id; if($b10<>''){$li10=$li_r;$type10=button;}else{$li10=$li_b;}}
    if($_POST[$n1]==$v11){$id11=id_I;}else{$id11=$id; if($b11<>''){$li11=$li_r;$type11=button;}else{$li11=$li_b;}}
    
    echo"
    <div id='conte-isqu' style='".$style."'>
        <div id='sub_menu'>
        <input type='hidden' class='Medio' name='".$n1."' value='".$_POST[$n1]."'>
        <input type='hidden' class='Medio' name='".$n2."' value='".$_POST[$n2]."'>
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
}
?>