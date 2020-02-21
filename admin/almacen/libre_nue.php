<?php
//if ($_POST[prod]<>""){

function descarga1($consu,$phpv){//descarga de los productos de almacen
	mysql_da_se($consu,0,$phpv);
	$_POST[ID_G]		="";
	$_POST[nombre]		="";
	$_POST[marca]		="";
	$_POST[medidas]		="";
	$_POST[capacidad]	="";
	$_POST[cantida]		="";
	$_POST[cliente]		="";
	$_POST[costo]		="";
	$_POST[Revisado]	="";
	$_POST[come]		="";
	$_POST[provedor]	="";
	$_POST[uni_min]		="";
	$_POST[posicion]	="";
	while($dato5=mysql_fe_ar($consu,$phpv)){
		if($dato5[ID_G]==$_POST[prod]){
	
			$_POST[ID_G]		=$dato5[ID_G];
			$_POST[nombre]		=$dato5[nombre];
			$_POST[marca]		=$dato5[marca];
			$_POST[medidas]		=$dato5[medidas];
			$_POST[capacidad]	=$dato5[capacidad];
			$_POST[cantida]		=$dato5[cantida];
			$_POST[cliente]		=$dato5[cliente];
			$_POST[costo]		=$dato5[costo];
			$_POST[Revisado]	=$dato5[Revisado];
			$_POST[come]		=$dato5[come];
			$_POST[provedor]	=$dato5[provedor];
			$_POST[uni_min]		=$dato5[uni_min];
			$_POST[posicion]	=$dato5[posicion];
			break;
		}
	}
}
function descarga2($consu,$phpv){//descarga de los productos de almacen
	mysql_da_se($consu,0,$phpv);
	$_POST[ID_G]		="";
	$_POST[nombre]		="";
	$_POST[apodo]		="";
	$_POST[direccion]	="";
	$_POST[ciudad]		="";
	$_POST[colonia]		="";
	$_POST[codigo]		="";
	$_POST[telefono]	="";
	$_POST[email]		="";
	$_POST[ID_fot]		="";
	$_POST[come]		="";
	while($dato5=mysql_fe_ar($consu,$phpv)){
		if($dato5[ID_G]==$_POST[prov]){
	
			$_POST[ID_G]		=$dato5[ID_G];
			$_POST[nombre]		=$dato5[nombre];
			$_POST[apodo]		=$dato5[apodo];
			$_POST[direccion]	=$dato5[direccion];
			$_POST[ciudad]		=$dato5[ciudad];
			$_POST[colonia]		=$dato5[colonia];
			$_POST[codigo]		=$dato5[codigo];
			$_POST[telefono]	=$dato5[telefono];
			$_POST[email]		=$dato5[email];
			$_POST[ID_fot]		=$dato5[ID_fot];
			$_POST[come]		=$dato5[come];
			break;
		}
	}
}
function descarga3($consu,$compara,$phpv){//descarga de los productos de almacen
	mysql_da_se($consu,0,$phpv);
	$_POST[img_memo]	="";
	$_POST[img_type]	="";
	while($dato=mysql_fe_ar($consu,$phpv)){
		if($dato[ID_G]==$compara){
	
			$_POST[img_memo]	="img/".$dato[ID_G].$dato[type];;
			$_POST[img_type]	=$dato[type];
			break;
		}
	}
}
function dele_pre($tabla,$ID_G,$conexion,$phpv){
	$delete="DELETE FROM $tabla  WHERE ID_G='$ID_G'";
	$res=$delete;
	ejecuta($conexion,$res,$phpv);
	$res="Elemento Eliminado";
	return $res;
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
$libre=1;
?>