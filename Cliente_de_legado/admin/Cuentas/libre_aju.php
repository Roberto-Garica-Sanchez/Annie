<?php
$consu1=consulta('choferes'	           ,$conexion,'','',Nombre_Ch,1,$phpv);
$consu2=consulta('placas'              ,$conexion,"","",Placas,"",$phpv);
$consu3=consulta('clientes'            ,$conexion,"","",Nombre_Cl,"",$phpv);
function Escribe($conexion,$tabla,$var1,$phpv){
		$res=Grava($tabla,$var1);
		ejecuta($conexion,$res,$phpv);
}
function Grava($tabla,$var1){
	$tabla1="choferes";
	$tabla2="placas";
	$tabla3="clientes";
	if ($tabla==$tabla1)$grava="INSERT INTO $tabla1 (ID_Ch,Nombre_Ch,Edad,Direccion,Celular,ulti_viaje,Estatus)		VALUE	(NULL,'". ucfirst($_POST[Nombre])."','$_POST[edad]','$_POST[direcciones]','$_POST[Celular]','0','1')";
	if ($tabla==$tabla2)$grava="INSERT INTO $tabla2 (ID_Pl,Placas,Marca,Modelo,N_eco,Color)							VALUE	(NULL,'". ucfirst($_POST[placas])."','$_POST[marca]','$_POST[modelo]','$_POST[n_e]','$_POST[color]')";
	if ($tabla==$tabla3)$grava="INSERT INTO $tabla3 (ID_Cl,Nombre_Cl,Fecha_re,Destino)								VALUE	(NULL,'". ucfirst($_POST[Nombre])."','$_POST[Registro]','$_POST[Destino]')";
return $grava;
}
function delete($tabla,$conexion,$phpv){
	if ($tabla==choferes)	{$res="DELETE FROM $tabla  WHERE Nombre_Ch='$_POST[opciones1]'";}
	if ($tabla==choferes_on){$res="DELETE FROM $tabla  WHERE Nombre_Ch='$_POST[opciones1]'";}
	if ($tabla==placas)		{$res="DELETE FROM $tabla  WHERE Placas='$_POST[opciones2]'";}
    if ($tabla==clientes)	{$res="DELETE FROM $tabla  WHERE Nombre_Cl='$_POST[opciones3]'";}
	ejecuta($conexion,$res,$phpv);
}
?>