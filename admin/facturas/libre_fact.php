<?php
function input($type,$name,$value,$title,$style,$libre){
  $z="<input type='$type' name='$name' value='$value' style='$style' class='Medio' title='$title' $libre>";
  return $z;	
}
function db($base,$conexion){
        mysql_select_db($base,$conexion)or die ('Probleamas Para Estableser Comunicasion Con La Base De Datos');
}
function consu($tabla,$conexion,$col_espe,$espe,$bloque){
    $consulta="SELECT * FROM ".$tabla;
	/*if(($espe<>'') and ($col_espe<>'') and ($bloque<>$_POST[$espe])){
	$consulta="SELECT * FROM ".$tabla." WHERE $col_espe='$_POST[$espe]'";
	}*/
	$consu=mysql_query($consulta,$conexion)	
    or Die ("<font color='red'>Error Al Estableser Comunicasion Con La Tabla '".$tabla."'<br>formurio: ".$consulta."<br> consu </font>");
    return $consu;
}
function consulta($tabla,$conexion,$col_espe,$espe,$bloque){
    $consulta="SELECT * FROM ".$tabla;
    //linea obsoleta por los $_POST[];
	//if(($espe<>'') and ($col_espe<>'') and ($bloque<>$_POST[$espe])) $consulta="SELECT * FROM ".$tabla." WHERE $col_espe='$_POST[$espe]'";
    if(($col_espe<>'')&&($espe<>''))$consulta="SELECT * FROM ".$tabla." WHERE $col_espe='$espe'";
	$consu=mysql_query($consulta,$conexion)	or Die	("Error Al Estableser Comunicasion Con La Tabla '".$tabla."'<br> formu ".$consulta."<br>consu");
    return $consu;
}
function des_mysql($name,$defaul,$select,$col,$consu,$conexion,$title){
	$d=$d."<select name='$name' class='Medio' title='$title'>";
	if(($select=='')or($select==$defaul))$d=$d."<OPTION VALUE='$defaul' >$defaul</OPTION>";
    if(($select<>'')and($select<>$defaul))$d=$d."<OPTION VALUE='$select' >$select</OPTION>";
        mysql_data_seek($consu,0);
        while($datos=mysql_fetch_array($consu))
        {$set="";
		//if ($name==chofer)$com=compro($datos[$descarga],choferes_off,Nombre,$conexion);
        //if ($datos[$descarga]==$_POST[$name]){$set="selected";}
        //if (($name==chofer)and($com==1))$d5=$d5.'<option value="'.$datos[$descarga].'" '.$set.'>'.$datos[$descarga].'</option>';
        $d=$d."<OPTION value='$datos[$col]'>$datos[$col]</OPTION>";
		//if ($name<>chofer)$d5=$d5.'<option value="'.$datos[$descarga].'" '.$set.'>'.$datos[$descarga].'</option>';
        }
	$d=$d.'</select>';
	return $d;
}
function compro($compro,$consu,$col,$conexion,$var2){
	$c=1;
	//$consu=consulta($tabla,$conexion);
	mysql_data_seek($consu,0);
    while($datos=mysql_fetch_array($consu))	{
        //echo"<br>".$datos[$col];
        if(($datos[$col]==$compro) and($compro<>'')){$c=0;break;}
	}
	if($var2<>'')$c=$datos[$var2];
	return $c;
}
function tipo_tamano($bytes){
    if($bytes<1024){
        $numero=number_format($bytes,0,'.',',');
        return array($numero,"B");
    }
    if($bytes<1048576){
        $numero=number_format($bytes/1024,2,'.',',');
        return array($numero,"KBs");
    }
    if($bytes>=1048576){
        $numero=number_format($bytes/1048576,2,'.',',');
        return array($numero,'MB');
    }
}
function insert($tabla,$var0,$var1,$var2,$var3,$var4,$var5,$var6,$var7,$var8){
    $x="INSERT  INTO $tabla (titulo,id,cliente,nombre_archivo,descripcion,contenido,tamano,tamano_unidad,tipo) 
    VALUES ('". ucfirst($var0)."','$var1','$var2','$var3','". ucfirst($var4)."','$var5','$var6','$var7','$var8')";
    return $x;
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
function tablero(
$size,$style,$title1
,$i1,$i2,$i3,$i4,$i5,$i6,$i7,$i8,$i9,$i10,$i11,$i12,$i13,$i14,$i15,$i16,$i17,$i18//texto derecho
,$d1,$d2,$d3,$d4,$d5,$d6,$d7,$d8,$d9,$d10,$d11,$d12,$d13,$d14,$d15,$d16,$d17,$d18//color fondo dual
,$tc1,$tc2,$tc3,$tc4,$tc5,$tc6,$tc7,$tc8,$tc9,$tc10,$tc11,$tc12,$tc13,$tc14,$tc15,$tc16,$tc17,$tc18//color fondo dual
,$ic1,$ic2,$ic3,$ic4,$ic5,$ic6,$ic7,$ic8,$ic9,$ic10,$ic11,$ic12,$ic13,$ic14,$ic15,$ic16,$ic17,$ic18//color simple fondo isquierdo
,$dc1,$dc2,$dc3,$dc4,$dc5,$dc6,$dc7,$dc8,$dc9,$dc10,$dc11,$dc12,$dc13,$dc14,$dc15,$dc16,$dc17,$dc18//color simple fondo derecha
,$if1,$if2,$if3,$if4,$if5,$if6,$if7,$if8,$if9,$if10,$if11,$if12,$if13,$if14,$if15,$if16,$if17,$if18//color letras isquierda
,$df1,$df2,$df3,$df4,$df5,$df6,$df7,$df8,$df9,$df10,$df11,$df12,$df13,$df14,$df15,$df16,$df17,$df18//color letras derecha
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
</table >';
}
$libre_fact=true;
?>
