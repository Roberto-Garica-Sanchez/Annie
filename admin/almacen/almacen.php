<?php //php7
/*
------------Include  requeridos[Nombre]
-->"libre_alm.php"
------------function requeridas[Libreria/funcion(s)]
--> "libre_uni.php"
-->sub_menu			(... formato ...);
*/
include("libre_alm.php");
if ($libre_alm==''){echo"Error de Carga 'libre_alm.php'";}$libre='';

$acc0=este;
$acc1=Nuevo;
$acc2=Modificar;
$acc3=Guardar;
$acc4=Eliminar;
$acc5=Suspender;
$acc6=Cerrar;
$acc7=Descarga;
$acc8=Falla;
$acc9=Limpia;
$acc10="Guardar Cambios";
$ac1=input2(submit,accion,'Limpiar formulario y crear uno nuevo'		,$acc1,"color: blue;");
$ac2=input2(submit,accion,'Activar la edicion de las celdas '			,$acc2,"color: blue;");
$ac3=input2(submit,accion,'Guardar la informacion'						,$acc3,"color: blue;");
$ac4=input2(submit,accion,'Elminar Esta Elemeto Permanentemente'		,$acc4,"color: blue;");
//$ac5=input2(submit,accion,'Suspender folder de chofer'				,$acc5);
$ac6=input2(submit,accion,'Desactiva la edicion de las celda'			,$acc6,"color: blue;");
$ac7=input2(submit,accion,'Descarga manual de la cuenta '				,$acc7,"color: blue;");
$ac8=input2(submit,accion,'Generar un reporte de falla '				,$acc8,"color: blue;");
$ac9=input2(submit,accion,'Limpiar formulario'							,$acc9,"color: blue;");
$ac10=input2(submit,accion,'Guardar cambios echos'						,$acc10,"color: blue;");
if ($_POST[chofer]==''){$_POST[chofer]=chofer;}
if ( $_POST[$acc0]=='')								{$_POST[$acc0]=button;}
if ( $_POST[accion]==$acc2)							{$_POST[$acc0]=text;}
if (($_POST[accion]==$acc6)or($_POST[$acc3]==$acc3)){$_POST[$acc0]=button;}
if (($_POST[accion]==$acc1)and($_POST[$acc0]<>text)){$_POST[$n1]=Nuevo;}
if ( $_POST[accion]==$acc3)							{$_POST[$n1]=Modificar;}
if ( $_POST[accion]==$acc9)							{include("limpia.php");}
echo input2(hidden,$acc0,'',$_POST[$acc0]);

$style="";
$n1=menu2;      $n2=name2set;   $de=Nuevo;
$v1="";         $v2=Productos;
$v3=Provedores; $v4=Facturas;
$v5='';  		$v6='';
//$v7=Reporte;
sub_menu(
    $style
    ,$n1,$n2    ,$de
    ,$v1,$b1    ,$v2,$b2
    ,$v3,$b3    ,$v4,$b4
    ,$v5,$b5    ,$v6,$b6
    ,$v7,$b7    ,$v8,$b8
    ,$v9,$b9    ,$v10,$b10
    ,$v11,$b11    ,$v12,$b12
    ,$v13,$b13
);
echo"<div id='Conte-pri'>";
	if ($_POST[name2set]==$v2)		{include("Nuevo.php");
		if ($libre=='')				{echo"Error de Carga 'Nuevo.php'";}$libre='';
	}
	if ($_POST[name2set]==$v6)		{include("ajuste.php");	
		if ($libre=='')				{echo"Error de Carga 'ajustes.php'";}$libre='';
	}
echo"</div>";
$almacen=1;
?>