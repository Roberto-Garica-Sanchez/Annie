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
$ac4=input2(submit,accion,'Elminar Esta Elemento Permanentemente'			,$acc4);
$ac5=input2(submit,accion,'Suspender folder de chofer'					,$acc5);
$ac6=input2(submit,accion,'Desactiva la edicion de las celda'			,$acc6);
$ac7=input2(submit,accion,'Descarga manual de la cuenta '				,$acc7);
$ac8=input2(submit,accion,'Generar un reporte de falla '				,$acc8);
$ac9=input2(submit,accion,'Limpiar formulario'							,$acc9);
if ($_POST[chofer]==''){$_POST[chofer]=chofer;}
if ( $_POST[$acc0]=='')								{$_POST[$acc0]=button;}
if ( $_POST[accion]==$acc2)							{$_POST[$acc0]=text;}
if (($_POST[accion]==$acc6)or($_POST[$acc3]==$acc3)){$_POST[$acc0]=button;}
if (($_POST[accion]==$acc1)and($_POST[$acc0]<>text)){$_POST[$n1]=Nuevo;}
if ( $_POST[accion]==$acc3)							{$_POST[$n1]=Modificar;}
if ( $_POST[accion]==$acc9)							{include("limpia.php");}

echo input2(hidden,$acc0,'',$_POST[$acc0]);
$c=compro($_POST[Carta1],ID_G,'',$consu5,$conexion,$phpv);	if(($_POST[Carta1]<>'')and($c==1))	{$b2=1;}

$id=idI;
$li_b="border-color: blue;";
$li_r="border-color: red;";
$li_v="border-color: yellowgreen;";
$type1=submit;
$type2=submit;
$type3=submit;
$type4=submit;
$type5=submit;
$type6=submit;
$type7=submit;
$dis1=0;
$dis2=0;
$dis3=0;
$dis4=0;
$dis5=0;
$dis6=0;
$dis7=0;
if (($_POST[Carta1]<>'')or($_POST[Carta]<>'')){$dis1=1;$dis2=1;$dis4=1;$dis6=1;$dis7=1;}
$res=consulta(abo_acu,$conexion,ID_G,$_POST[Carta1],'','',$phpv);
mysql_da_se($res,0,$phpv);
$dato=mysql_fe_ar($res,$phpv);
if ($_POST[dif4]<>$dato[Total_Total]){$consola="Cambios Sin Guardar<br>";}
if ($_POST[$n2]==$v1){$id1=id_I;$li1=$li_v;}else{$id1=$id;    if ($dis1==1){$li1=$li_r;$type1=button;}else{$li1=$li_b;}}
if ($_POST[$n2]==$v2){$id2=id_I;$li1=$li_v;}else{$id2=$id;    if ($dis2==1){$li2=$li_r;$type2=button;}else{$li2=$li_b;}}
if ($_POST[$n2]==$v3){$id3=id_I;$li1=$li_v;}else{$id3=$id;    if ($dis3==1){$li3=$li_r;$type3=button;}else{$li3=$li_b;}}
if ($_POST[$n2]==$v4){$id4=id_I;$li1=$li_v;}else{$id4=$id;    if ($dis4==1){$li4=$li_r;$type4=button;}else{$li4=$li_b;}}
if ($_POST[$n2]==$v5){$id5=id_I;$li1=$li_v;}else{$id5=$id;    if ($dis5==1){$li5=$li_r;$type5=button;}else{$li5=$li_b;}}
if ($_POST[$n2]==$v6){$id6=id_I;$li1=$li_v;}else{$id6=$id;    if ($dis6==1){$li6=$li_r;$type6=button;}else{$li6=$li_b;}}
if ($_POST[$n2]==$v7){$id7=id_I;$li1=$li_v;}else{$id7=$id;    if ($dis7==1){$li7=$li_r;$type7=button;}else{$li7=$li_b;}}

$size=0;
$style="position: absolute; top: 53px; z-index: 1;";
//input2($type2,$name,$title,$value,$style,$id,$libre,$class)
$i1=input2(hidden,$n2,'',$_POST[$n2]);
$i2=input2($type2,$n2,$v2,$v2,$li2,$id2);
$i3=input2($type3,$n2,$v3,$v3,$li3,$id3);
$i4=input2($type4,$n2,$v4,$v4,$li4,$id4);
$i5=input2($type5,$n2,$n5,$v5,$li5,$id5);
$i6=input2($type6,$n2,$v6,$v6,$li6,$id6);
$i7=input2($type7,$n2,$v7,$v7,$li7,$id7);
include("tablero.php");
echo input2(hidden,A_i,'',$_POST[A_i]);
echo input2(hidden,M_i,'',$_POST[M_i]);
echo input2(hidden,D_i,'',$_POST[D_i]);
echo input2(hidden,A_f,'',$_POST[A_f]);
echo input2(hidden,M_f,'',$_POST[M_f]);
echo input2(hidden,D_f,'',$_POST[D_f]);
$fec_ini=$_POST[A_i].zero($_POST[M_i]).zero($_POST[D_i]);
$fec_fin=$_POST[A_f].zero($_POST[M_f]).zero($_POST[D_f]);
echo input2(hidden,fec_ini,'',$fec_ini,'',fec_ini);
echo input2(hidden,fec_fin,'',$fec_fin,'',fec_fin);
if ($_POST[name2set]==""){$_POST[name2set]=$v2;}
	if ($_POST[name2set]==$v6)		{include("Ajustes2.php");if($Ajustes==false)echo" <script> alert('Error Bloque no localizado'); </script>";} 

	if ($_POST[name2set]==$v2)		{echo"<div id='Conte-pri'>";include("Nuevo.php");		echo"</div>";}
	if ($_POST[name2set]==$v3)		{echo"<div id='Conte-pri'>";include("folder.php");		echo"</div>";}
	if ($_POST[name2set]==$v4)	    {echo"<div id='Conte-pri'>";include("baul2.php");		echo"</div>";}
	if ($_POST[name2set]==$v5)	    {echo"<div id='Conte-pri'>";include("Cambio.php");		echo"</div>";}
    if ($_POST[name2set]==$v7)      {echo"<div id='Conte-pri'>";include("reporte_2.php");	echo"</div>";}

$libre=1;
?>
