<?php //php7 y php5

function espe_tab(
	$tabla,$n_id,$id,$n_modificando,$v_modificando
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

function dele_pre($tabla,$conexion,$phpv){
$delete="DELETE FROM ".$tabla."  WHERE ID_G='$_POST[Carta1]'";
$res=$delete;
ejecuta($conexion,$res,$phpv);
//MYSQLI_QUERY($delete);
}
function delete($conexion,$phpv){
       	dele_pre(fechas		,$conexion,$phpv);
        dele_pre(folio		,$conexion,$phpv);
        dele_pre(fletes		,$conexion,$phpv);
        dele_pre(viaticos	,$conexion,$phpv);
        dele_pre(disel		,$conexion,$phpv);
        dele_pre(casetas	,$conexion,$phpv);
        dele_pre(facturas	,$conexion,$phpv);
        dele_pre(ryr		,$conexion,$phpv);
        dele_pre(guias		,$conexion,$phpv);
        dele_pre(maniobras	,$conexion,$phpv);
        dele_pre(km			,$conexion,$phpv);
        dele_pre(fletes_c	,$conexion,$phpv);
        dele_pre(viaticos_c	,$conexion,$phpv);
        dele_pre(casetas_via,$conexion,$phpv);
        dele_pre(disel_c	,$conexion,$phpv);
        dele_pre(casetas_c	,$conexion,$phpv);
        dele_pre(facturas_c	,$conexion,$phpv);
        dele_pre(ryr_c		,$conexion,$phpv);
        dele_pre(guias_c	,$conexion,$phpv);
        dele_pre(maniobras_c,$conexion,$phpv);
		dele_pre(abo_acu.php,$conexion,$phpv);
}
?>