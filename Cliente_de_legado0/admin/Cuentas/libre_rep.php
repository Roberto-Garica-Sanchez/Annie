<?php
$consu1_2=consulta('choferes_on'   	,$conexion,"","","","",$phpv);
/*
$consu1=consulta('choferes'	           	,$conexion);
$consu1_1=consulta('choferes_off'  	,$conexion);
$consu2=consulta('placas'              	,$conexion);
$consu3=consulta('clientes'            	,$conexion);
$consu4=consulta('fechas'	           	,$conexion);
$consu5=consulta('folio'	           	,$conexion);
$consu6=consulta('fletes'	           	,$conexion);
$consu7=consulta('viaticos'	           	,$conexion);
$consu8=consulta('disel'	           	,$conexion);
$consu9=consulta('casetas'				,$conexion);
$consu9_1=consulta('casetas_via'	,$conexion);
$consu10=consulta('facturas'	       	,$conexion);
$consu11=consulta('ryr'		           	,$conexion);
$consu12=consulta('guias'	           	,$conexion);
$consu13=consulta('maniobras'	       	,$conexion);
$consu14=consulta('km'		           	,$conexion);

$consu16=consulta('fletes_c'	       	,$conexion);
$consu17=consulta('viaticos_c'	       	,$conexion);
$consu18=consulta('disel_c'	           	,$conexion);
$consu19=consulta('casetas_c'	       	,$conexion);
$consu20=consulta('facturas_c'	       	,$conexion);
$consu21=consulta('ryr_c'	           	,$conexion);
$consu22=consulta('guias_c'	           	,$conexion);
$consu23=consulta('maniobras_c'	       	,$conexion);
$consu24=consulta('abo_acu' 	       	,$conexion);
*/
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
?>