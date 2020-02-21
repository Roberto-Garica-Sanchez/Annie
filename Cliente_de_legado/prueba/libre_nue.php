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
$hidden_ac=5;*/
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
if ($_POST[hidden_ac]==0)   {$_POST[hidden_ac]=1;}*/
/*
$consu1=consulta('choferes'	           ,$conexion);
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
}*/
function Presenta1($type2,$Name1,$Name2,$x,$hidden,$title1,$title2,$name_sub1,$name_sub2,$final){
	   if(($_POST[$Name1]=='')and($_POST[$hidden]==$x)){$focus1="autofocus";}
	   if(($_POST[$Name1]<>'')and($_POST[$hidden]==$x)){$focus1='';$focus2="autofocus";}
	   if(($_POST[$Name2]<>'')and($_POST[$hidden]==$x)){$focus2='';$focus1="autofocus";} 
	$value1=$_POST[$Name1];
	$value2=$_POST[$Name2];
	$name1=$Name1;
	$name2=$Name2;
	if(($name_sub1<>'')and($type2==submit)){$name1=$name_sub1;}
    if(($name_sub2<>'')and($type2==submit)){$name2=$name_sub2;}
	if(($type2==text)or($type2<>hidden)){
        echo"
            <tr >
                <td >$x</td >
                <td ><input type='$type2' title='$title1' Class='Medio' $focus1 name='$name1' value='$value1' maxlength='50'>	</td >
                <td ><input type='$type2' title='$title2' Class='Medio' $focus2 name='$name2' value='$value2' maxlength='10'>	</td >
            </tr >";
       	}
        if($type2==hidden){
            echo"
            <tr >   
                <td>$x</td>
                <td >$_POST[$Name1] </td >
                <td >$_POST[$Name2] </td >
            </tr >";
	   }
}
/*
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
function presenta3($type2,$hidden,$name1,$name2,$total,$name3,$type,$limite,$style,$title,$color,$col1,$col2,$final,$title1,$title2,$name_sub1,$name_sub2){
        echo"<table id='' style=' $style'>";
        echo"<tr ><td colspan='3' bgcolor='$color'><center>".$title."</center></td ></tr >";
        echo"<tr ><td ></td >";
        if ($col1<>''){echo"<td >$col1</td >";}else{echo"<td >Descripcion  </td >";}
        if ($col2<>''){echo"<td >$col2</td >";}else{echo"<td >Importe      </td >";}
        echo"</tr >";
                for($x=1; $x<=$_POST[$hidden]; $x++){
            $Name1=$name1.$x;
            $Name2=$name2.$x;
            if($_POST[$Name2]==0)$_POST[$Name2]='';
            $acti_focus=false;
        	if(($_POST[$Name2]<>'')and($_POST[$hidden]==$x)and($_POST[$hidden]<$limite)){$_POST[$hidden]=$_POST[$hidden]+1;}
            Presenta1($type2,$Name1,$Name2,$x,$hidden,$title1,$title2,$name_sub1,$name_sub2);
        }
        $d=input($type,$name3,'',$total);
        echo"<tr>
                <td ></td >
                <td >Total     </td >
                <td >$total    </td >
            </tr>";
        if ($final<>'')echo $final;
        echo"</table>";
}
function cambia($tabla,$var1,$var2,$var3)
{
	if($tabla==choferes_on){$cambia="UPDATE $tabla 	SET  ulti_viaje='$_POST[n_c]' WHERE Nombre_Ch='$_POST[chofer]'";}
	return $cambia;
}
function modifica($tabla,$var1)
{
		$cam=cambia($tabla,$var1);
		MYSQL_QUERY($cam)OR DIE ('ERROR AL Modificar '.$cam);
}
function espe_tab($tabla,$n_id,$id,$n_modificando,$v_modificando
,$n1,$v1,$n2,$v2,$n3,$v3,$n4,$v4,$n5,$v5,$n6,$v6,$n7,$v7,$n8,$v8,$n9,$v9
,$n10,$v10,$n11,$v11,$n12,$v12,$n13,$v13,$n14,$v14,$n15,$v15,$n16,$v16,$n17,$v17,$n18,$v18,$n19,$v19
,$n20,$v20,$n21,$v21,$n22,$v22,$n23,$v23,$n24,$v24,$n25,$v25,$n26,$v26,$n27,$v27,$n28,$v28,$n29,$v29
){
	$d="INSERT INTO $tabla ($n_id";
	IF ($n1<>'')$d=$d.",$n1";IF ($n2<>'')$d=$d.",$n2";IF ($n3<>'')$d=$d.",$n3";IF ($n4<>'')$d=$d.",$n4";IF ($n5<>'')$d=$d.",$n5";
	IF ($n6<>'')$d=$d.",$n6";IF ($n7<>'')$d=$d.",$n7";IF ($n8<>'')$d=$d.",$n8";IF ($n9<>'')$d=$d.",$n9";IF ($n10<>'')$d=$d.",$n10";
	IF ($n11<>'')$d=$d.",$n11";IF ($n12<>'')$d=$d.",$n12";IF ($n13<>'')$d=$d.",$n13";IF ($n14<>'')$d=$d.",$n14";IF ($n15<>'')$d=$d.",$n15";
	IF ($n16<>'')$d=$d.",$n16";IF ($n17<>'')$d=$d.",$n17";IF ($n18<>'')$d=$d.",$n18";IF ($n19<>'')$d=$d.",$n19";IF ($n20<>'')$d=$d.",$n20";
	IF ($n21<>'')$d=$d.",$n21";IF ($n22<>'')$d=$d.",$n22";IF ($n23<>'')$d=$d.",$n23";IF ($n24<>'')$d=$d.",$n24";IF ($n25<>'')$d=$d.",$n25";
	IF ($n26<>'')$d=$d.",$n26";IF ($n27<>'')$d=$d.",$n27";IF ($n28<>'')$d=$d.",$n28";IF ($n29<>'')$d=$d.",$n29";IF ($n30<>'')$d=$d.",$n30";
	$d=$d.") VALUE ('$id'";
	IF ($n1<>'')$d=$d.",'$v1'";IF ($n2<>'')$d=$d.",'$v2'";IF ($n3<>'')$d=$d.",'$v3'";IF ($n4<>'')$d=$d.",'$v4'";IF ($n5<>'')$d=$d.",'$v5'";
	IF ($n6<>'')$d=$d.",'$v6'";IF ($n7<>'')$d=$d.",'$v7'";IF ($n8<>'')$d=$d.",'$v8'";IF ($n9<>'')$d=$d.",'$v9'";IF ($n10<>'')$d=$d.",'$v10'";
	IF ($n11<>'')$d=$d.",'$v11'";IF ($n12<>'')$d=$d.",'$v12'";IF ($n13<>'')$d=$d.",'$v13'";IF ($n14<>'')$d=$d.",'$v14'";IF ($n15<>'')$d=$d.",'$v15'";
	IF ($n16<>'')$d=$d.",'$v16'";IF ($n17<>'')$d=$d.",'$v17'";IF ($n18<>'')$d=$d.",'$v18'";IF ($n19<>'')$d=$d.",'$v19'";IF ($n20<>'')$d=$d.",'$v20'";
	IF ($n21<>'')$d=$d.",'$v21'";IF ($n22<>'')$d=$d.",'$v22'";IF ($n23<>'')$d=$d.",'$v23'";IF ($n24<>'')$d=$d.",'$v24'";IF ($n25<>'')$d=$d.",'$v25'";
	IF ($n26<>'')$d=$d.",'$v26'";IF ($n27<>'')$d=$d.",'$v27'";IF ($n28<>'')$d=$d.",'$v28'";IF ($n29<>'')$d=$d.",'$v29'";IF ($n30<>'')$d=$d.",'$v30'";
	$d=$d.")";
	return $d;
}
function auto_tab($tabla,$na1,$va1,$repit1,$na2,$va2,$repit2,$na3,$va3,$repit3,$na4,$va4,$repit4,$n_id,$id,$n1,$v1,$n2,$v2,$n3,$v3,$n4,$v4,$n5,$v5,$n6,$v6,$n7,$v7,$n8,$v8,$n9,$v9,$n10,$v10){
	$d="INSERT INTO $tabla ($n_id";
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
	$d=$d.") VALUE ('$_POST[$id]'";
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
?>