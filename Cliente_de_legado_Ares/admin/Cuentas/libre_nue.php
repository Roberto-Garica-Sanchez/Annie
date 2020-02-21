<?php //php7
function cambia($tabla,$var1,$var2,$var3){
	if($tabla==choferes)	{$cambia="UPDATE $tabla 	SET  ulti_viaje='$_POST[n_c]' WHERE Nombre_Ch='$_POST[chofer]'";}
	if($tabla==choferes_on)	{$cambia="UPDATE $tabla 	SET  (ulti_viaje='$_POST[n_c]') WHERE Nombre_Ch='$_POST[chofer]'";}
	return $cambia;
}
function modifica($tabla,$var1,$conexion,$phpv){
	$res=cambia($tabla,$var1);
	ejecuta($conexion,$res,$phpv);
	return $res;
}
function espe_tab(
	$tabla,$n_id,$id,$n_modificando,$v_modificando
	,$n1,$v1,$n2,$v2,$n3,$v3,$n4,$v4,$n5,$v5,$n6,$v6,$n7,$v7,$n8,$v8,$n9,$v9
	,$n10,$v10,$n11,$v11,$n12,$v12,$n13,$v13,$n14,$v14,$n15,$v15,$n16,$v16,$n17,$v17,$n18,$v18,$n19,$v19
	,$n20,$v20,$n21,$v21,$n22,$v22,$n23,$v23,$n24,$v24,$n25,$v25,$n26,$v26,$n27,$v27,$n28,$v28,$n29,$v29
){
	$d="INSERT INTO $tabla ($n_id";
	if  ($n1<>'')$d=$d.",$n1";		if ($n2<>'')$d=$d.",$n2";		if ($n3<>'')$d=$d.",$n3";		if ($n4<>'')$d=$d.",$n4";		if ($n5<>'')$d=$d.",$n5";
	if ($n6<>'')$d=$d.",$n6";		if ($n7<>'')$d=$d.",$n7";		if ($n8<>'')$d=$d.",$n8";		if ($n9<>'')$d=$d.",$n9";		if ($n10<>'')$d=$d.",$n10";
	if ($n11<>'')$d=$d.",$n11";		if ($n12<>'')$d=$d.",$n12";		if ($n13<>'')$d=$d.",$n13";		if ($n14<>'')$d=$d.",$n14";		if ($n15<>'')$d=$d.",$n15";
	if ($n16<>'')$d=$d.",$n16";		if ($n17<>'')$d=$d.",$n17";		if ($n18<>'')$d=$d.",$n18";		if ($n19<>'')$d=$d.",$n19";		if ($n20<>'')$d=$d.",$n20";
	if ($n21<>'')$d=$d.",$n21";		if ($n22<>'')$d=$d.",$n22";		if ($n23<>'')$d=$d.",$n23";		if ($n24<>'')$d=$d.",$n24";		if ($n25<>'')$d=$d.",$n25";
	if ($n26<>'')$d=$d.",$n26";		if ($n27<>'')$d=$d.",$n27";		if ($n28<>'')$d=$d.",$n28";		if ($n29<>'')$d=$d.",$n29";		if ($n30<>'')$d=$d.",$n30";
	$d=$d.") VALUE ('$id'";
	if ($n1<>'')$d=$d.",'$v1'";		if ($n2<>'')$d=$d.",'$v2'";		if ($n3<>'')$d=$d.",'$v3'";		if ($n4<>'')$d=$d.",'$v4'";		if ($n5<>'')$d=$d.",'$v5'";
	if ($n6<>'')$d=$d.",'$v6'";		if ($n7<>'')$d=$d.",'$v7'";		if ($n8<>'')$d=$d.",'$v8'";		if ($n9<>'')$d=$d.",'$v9'";		if ($n10<>'')$d=$d.",'$v10'";
	if ($n11<>'')$d=$d.",'$v11'";	if ($n12<>'')$d=$d.",'$v12'";	if ($n13<>'')$d=$d.",'$v13'";	if ($n14<>'')$d=$d.",'$v14'";	if ($n15<>'')$d=$d.",'$v15'";
	if ($n16<>'')$d=$d.",'$v16'";	if ($n17<>'')$d=$d.",'$v17'";	if ($n18<>'')$d=$d.",'$v18'";	if ($n19<>'')$d=$d.",'$v19'";	if ($n20<>'')$d=$d.",'$v20'";
	if ($n21<>'')$d=$d.",'$v21'";	if ($n22<>'')$d=$d.",'$v22'";	if ($n23<>'')$d=$d.",'$v23'";	if ($n24<>'')$d=$d.",'$v24'";	if ($n25<>'')$d=$d.",'$v25'";
	if ($n26<>'')$d=$d.",'$v26'";	if ($n27<>'')$d=$d.",'$v27'";	if ($n28<>'')$d=$d.",'$v28'";	if ($n29<>'')$d=$d.",'$v29'";	if ($n30<>'')$d=$d.",'$v30'";
	$d=$d.")";
	return $d;
}
function auto_tab($tabla,$na1,$va1,$repit1,$na2,$va2,$repit2,$na3,$va3,$repit3,$na4,$va4,$repit4,$n_id,$id,$n1,$v1,$n2,$v2,$n3,$v3,$n4,$v4,$n5,$v5,$n6,$v6,$n7,$v7,$n8,$v8,$n9,$v9,$n10,$v10){
	$d="INSERT INTO $tabla ($n_id";
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