<?php/*
$consu1=consulta('choferes'	,$conexion);
$consu2=consulta('placas'	,$conexion);
$consu3=consulta('clientes'	,$conexion);*/
function Escribe($conexion,$tabla,$var1){
		$gra=Grava($tabla,$var1);
		MYSQL_QUERY($gra,$conexion)or die('La tabla '.$tabla.' A tenido Problamas Para Gravar'.$gra);
}
function Grava($tabla,$var1){
	$tabla1="choferes";
	$tabla2="placas";
	$tabla3="clientes";
	$tabla4="choferes_on";
	if ($tabla==$tabla1)$grava="INSERT INTO ".$tabla1." (Nombre_Ch,Edad,Direccion) 		
    VALUE	('". ucfirst($_POST[Nombre])."','$_POST[edad]','$_POST[direcciones]')";
	if ($tabla==$tabla2)$grava="INSERT INTO ".$tabla2." (Placas,Marca,Modelo,N_eco,Color) 	
    VALUE	('". ucfirst($_POST[placas])."','$_POST[marca]','$_POST[modelo]','$_POST[n_e]','$_POST[color]')";
	if ($tabla==$tabla3)$grava="INSERT INTO ".$tabla3." (Nombre_Cl,Fecha_re,Destino) 	
    VALUE	('". ucfirst($_POST[Nombre])."','$_POST[Registro]','$_POST[Destino]')";
	if ($tabla==$tabla4)$grava="INSERT INTO ".$tabla4." (Nombre_Ch)          		
    VALUE   ('". ucfirst($_POST[Nombre])."')";
return $grava;
}
function delete($tabla){
	if ($tabla==choferes)	{$delete="DELETE FROM ".$tabla."  WHERE Nombre_Ch='$_POST[opciones1]'";}
	if ($tabla==placas)	{$delete="DELETE FROM ".$tabla."  WHERE Placas='$_POST[opciones2]'";}
    if ($tabla==clientes)	{$delete="DELETE FROM ".$tabla."  WHERE Nombre_Cl='$_POST[opciones3]'";}
	MYSQL_QUERY($delete);
}/*
f
?>
