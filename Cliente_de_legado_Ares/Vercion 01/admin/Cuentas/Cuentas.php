<?php
include($ruta.$ruta1."libre_cue.php");
if ($libre==''){echo" Error de Carga 'libre_cuentas'";}$libre='';
$style="";
$n1=menu2;      $n2=name2set;   $de=Nuevo;
$v1="";         $v2=Nuevo;
$v3=Folder;     $v4='Arc. Mur.';
$v5=Modificar;  $v6=Altas;
$v7=Reporte;

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
$ac1=input2(submit,accion,'Limpiar formulario y crear uno nuevo'		,$acc1);
$ac2=input2(submit,accion,'Activar la edicion de las celdas '			,$acc2);
$ac3=input2(submit,accion,'Guardar la informacion'						,$acc3);
$ac4=input2(submit,accion,'Elminar Esta Cuenta Permanentemente'			,$acc4);
$ac5=input2(submit,accion,'Suspender folder de chofer'					,$acc5);
$ac6=input2(submit,accion,'Desactiva la edicion de las celda'			,$acc6);
$ac7=input2(submit,accion,'Descarga manual de la cuenta '				,$acc7);
$ac8=input2(submit,accion,'Generar un reporte de falla '				,$acc8);
$ac9=input2(submit,accion,'Limpiar formulario'							,$acc9);
/*if ($_POST[$acc0]=='')							{$_POST[$acc0]=button;}
if ( $_POST[cam]==$acc2)							{$_POST[$acc0]=text;}
if (($_POST[cam]==$acc6)or($_POST[$acc3]==$acc3))	{$_POST[$acc0]=button;}
if (($_POST[accion]==$acc1)and($_POST[$acc0]<>text)){$_POST[$n1]=Nuevo;}
if ( $_POST[accion]==$acc3)							{$_POST[$n1]=Modificar;}
if ( $_POST[accion]==$acc9)							{include("limpia.php");}

echo input2(hidden,$acc0,'',$_POST[$acc0]);
$c=compro($_POST[Carta],ID_G,'',$consu5,$conexion);		if(($_POST[Carta]<>'')and($c==1))	{$b2=1;}
$c=compro($_POST[Carta1],ID_G,'',$consu5,$conexion);	if(($_POST[Carta1]<>'')and($c==1))	{$b2=1;}

*/

/*if ($_POST[este]=='')								{$_POST[este]=button;}
if ($_POST[cam]==MODIFICAR)							{$_POST[este]=text;}
if (($_POST[cam]==CERRAR)or($_POST[Grava]==Guardar)){$_POST[este]=button;}
if (($_POST[accion]==NUEVO)and($_POST[este]<>text))	{$_POST[$n1]=Nuevo;}
if ($_POST[accion]==MODIFICAR)						{$_POST[$n1]=Modificar;}
if ($_POST[accion]==LIMPIA)							{include("limpia.php");}

echo input2(hidden,este,'',$_POST[este]);
$c=compro($_POST[Carta],ID_G,'',$consu5,$conexion);		if(($_POST[Carta]<>'')and($c==1))	{$b2=1;}
$c=compro($_POST[Carta1],ID_G,'',$consu5,$conexion);	if(($_POST[Carta1]<>'')and($c==1))	{$b2=1;}

$c=compro($_POST[Carta1],ID_G,'',$consu5,$conexion);
if(($_POST[Carta1]<>'')and($c==0)and($_POST[$n1]==$v2)){$b1=1;$b3=1;$b4=1;$b5=1;$b6=1;$b7=1;$b8=1;$b9=1;$b10=1;$b11=1;}
if(($_POST[Carta1]<>'')and($_POST[$n1]==$v5)and($_POST[este]==text)){$b1=1;$b3=1;$b4=1;$b6=1;$b7=1;$b8=1;$b9=1;$b10=1;$b11=1;}
*/
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
echo input2(hidden,A_i,'',$_POST[A_i]);
echo input2(hidden,M_i,'',$_POST[M_i]);
echo input2(hidden,D_i,'',$_POST[D_i]);
echo input2(hidden,A_f,'',$_POST[A_f]);
echo input2(hidden,M_f,'',$_POST[M_f]);
echo input2(hidden,D_f,'',$_POST[D_f]);
echo"<div id='Conte-pri'>";
	if ($_POST[name2set]==$v2)		{include("Nuevo.php");}
	if ($_POST[name2set]==$v3)		{include("folder.php");}
	if ($_POST[name2set]==$v4)	    {include("baul2.php");}
	if ($_POST[name2set]==$v5)	    {include("Cambio.php");}
	if ($_POST[name2set]==$v6)		{include("ajuste.php");}
    if ($_POST[name2set]==$v7)      {include("reporte.php");}
echo"</div>";
$libre=1;
?>
