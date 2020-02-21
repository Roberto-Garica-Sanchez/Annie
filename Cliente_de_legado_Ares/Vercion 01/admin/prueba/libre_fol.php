<?php
/*
$consu1=consulta('choferes'	           ,$conexion,'','',Nombre_Ch);
$consu1_1=consulta('choferes_off'  ,$conexion);
$consu1_2=consulta('choferes_on'   ,$conexion);
$consu2=consulta('placas'              ,$conexion);
$consu3=consulta('clientes'            ,$conexion);
$consu4=consulta('fechas'	           ,$conexion);
$consu5=consulta('folio'	           ,$conexion);
$consu6=consulta('fletes'	           ,$conexion);
$consu7=consulta('viaticos'	           ,$conexion);
$consu9_1=consulta('casetas_via'	,$conexion);
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

function dele_pre($tabla){
$delete="DELETE FROM ".$tabla."  WHERE ID_G='$_POST[Carta1]'";
MYSQL_QUERY($delete);
}
function delete(){
       	dele_pre(fechas);
        dele_pre(folio);
        dele_pre(fletes);
        dele_pre(viaticos);
        dele_pre(disel);
        dele_pre(casetas);
        dele_pre(facturas);
        dele_pre(ryr);
        dele_pre(guias);
        dele_pre(maniobras);
        dele_pre(km);
        dele_pre(fletes_c);
        dele_pre(viaticos_c);
        dele_pre(casetas_via);
        dele_pre(disel_c);
        dele_pre(casetas_c);
        dele_pre(facturas_c);
        dele_pre(ryr_c);
        dele_pre(guias_c);
        dele_pre(maniobras_c);
		dele_pre(abo_acu.php);
}
?>