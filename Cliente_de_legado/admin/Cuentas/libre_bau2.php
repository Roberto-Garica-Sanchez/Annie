<?php //php7

function lista_chofer($type,$name,$consu,$descarga,$style,$conexion){
echo"<div style='$style'>";
	$style='';
	$b='';
	mysqli_data_seek($consu,0);
	while($datos=mysqli_fetch_array($consu)){
		$color='';
		if ($_POST[$name]==$datos[Nombre_Ch])$style='background: white; color: black;';
		if ($datos[Estatus]<>''){
		$title=$datos[Nombre_Ch];
		$title=$title."\r N° de Cuentas: ".$datos[ulti_viaje];
		$b=input2(submit,chofer,$title,$datos[Nombre_Ch],$style);
		echo "$b<br>";
		}
	}
	if ($b=='') {echo input2(button,'','Todos los choferes estan activos','Todos activos');}
echo"</div >";
	return $b;
}
?>