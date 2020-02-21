<?php
include("libre_cue.php");
$style="";
$n1=menu2;      $n2=name2set;   $de=Nuevo;
$v1="";         $v2=Nuevo;
$v3=Folder;     $v4='Arc. Mur.';
$v5=Modificar;  $v6=Altas;
$v7=Reporte;

if ($_POST[este]=='')                                   {$_POST[este]=button;}
if ($_POST[cam]==MODIFICAR)                             {$_POST[este]=text;}
if (($_POST[cam]==CERRAR)or($_POST[Grava]==Guardar))    {$_POST[este]=button;}
if (($_POST[accion]==NUEVO)and($_POST[este]<>text))     {$_POST[$n1]=Nuevo;}
if ($_POST[accion]==MODIFICAR)                          {$_POST[$n1]=Modificar;}
if ($_POST[accion]==LIMPIA)                             {include("limpia.php");}
    echo input(hidden,este,$_POST[este]);
    $c=compro($_POST[Carta],ID_G,'',$consu5,$conexion);
if(($_POST[Carta]<>'')and($c==1))                       {$b2=1;}
    $c=compro($_POST[Carta1],ID_G,'',$consu5,$conexion);
if(($_POST[Carta1]<>'')and($c==1))                      {$b2=1;}

    $c=compro($_POST[Carta1],ID_G,'',$consu5,$conexion);
if(($_POST[Carta1]<>'')and($c==0)and($_POST[$n1]==$v2))
    {$b1=1;$b3=1;$b4=1;$b5=1;$b6=1;$b7=1;$b8=1;$b9=1;$b10=1;$b11=1;}

if(($_POST[Carta1]<>'')and($_POST[$n1]==$v5)and($_POST[este]==text))
    {$b1=1;$b3=1;$b4=1;$b6=1;$b7=1;$b8=1;$b9=1;$b10=1;$b11=1;}

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
echo input(hidden,A_i,$_POST[A_i]);
echo input(hidden,M_i,$_POST[M_i]);
echo input(hidden,D_i,$_POST[D_i]);
echo input(hidden,A_f,$_POST[A_f]);
echo input(hidden,M_f,$_POST[M_f]);
echo input(hidden,D_f,$_POST[D_f]);

echo"<div id='Conte-pri'>";
	if ($_POST[name2set]==$v2)		{include("Nuevo.php");}
	if ($_POST[name2set]==$v3)		{include("folder.php");}
	if ($_POST[name2set]==$v4)	    {echo"En Mantenimiento";}
	if ($_POST[name2set]==$v5)	    {include("Cambio.php");}
	if ($_POST[name2set]==$v6)		{include("ajuste.php");}
    if ($_POST[name2set]==$v7)      {include("reporte.php");}
echo"</div>";
?>
