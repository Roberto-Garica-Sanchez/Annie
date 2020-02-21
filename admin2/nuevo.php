<?php 
$nuevo=" ";
$id="";
$caption="";
$style="";
$contenido="";


$name=nuevo;
$libre='';
$style="height: auto; background: rgba(5, 72, 108, 0.67); top: 0px; position: absolute; width: 120px;";
$v1="V. Previa";
$v2=Flete;
$v3=Viaticos;
$v4=Diesel;
$v5=Casetas;
$v6="Via Pass";
$v7=Facturas;
$v8="R Y R ";
$v9=Guias;
$v10=Maniobras;
$v11=Abonos;
$nuevo=$nuevo.menu				($style,$libre,$name,$v1,$v2,$v3,$v4,$v5,$v6,$v7,$v8,$v9,$v10);
include("sub_nuevo.php");
if($sub_nuevo=="")			{echo"<script>alert('sub_nuevo no localizado');</script>";}
$nuevo=$nuevo.$sub_nuevo;
$id="Nueva Cuentas";
$caption="";
$style="width: 250px; height: 130px; background: rgba(5, 72, 108, 0.67); right: 0px;";
	$libre=focuas_a(4,Carta2);	$d1=input2(text,Carta1,'',$_POST[Carta1],'','',$libre);
	$libre=focuas_a(4,Carta3);	$d2=input2(text,Carta2,'',$_POST[Carta2],'','',$libre);
	$libre=focuas_a(4,Carta4);	$d3=input2(text,Carta3,'',$_POST[Carta3],'','',$libre);
	$libre=focuas_a(4,D);		$d4=input2(text,Carta4,'',$_POST[Carta4],'','',$libre);
$contenido="
<table border='0' style='color: white;'>
	<tr><td>Folio 1</td>	<td>$d1</td></tr>
	<tr><td>Folio 2</td>	<td>$d2</td></tr>
	<tr><td>Folio 3</td>	<td>$d3</td></tr>
	<tr><td>Folio 4</td>	<td>$d4</td></tr>
</table>
";
$nuevo=$nuevo.contenedor($id,$caption,$style,$contenido);



$id="Datos";
$caption="";
$style="width: 250px; height: 130px; background: rgba(5, 72, 108, 0.67); right: 0px; top: 130px;";
	db					(empresa,$conexion,$phpv);
	$consu1=consulta			('choferes',$conexion,'','','',''	,$phpv,'');
	$consu2=consulta			('placas',$conexion,'','','',''	,$phpv,'');
	$consu3=consulta			('clientes',$conexion,'','','',''	,$phpv,'');
								$d2=despliegre_mysql(chofer,Chofer		,$consu1,Nombre_Ch	,$phpv);
								$d3=despliegre_mysql(placas,Placas		,$consu2,Placas		,$phpv);	
								$d3=despliegre_mysql(cliente,Clientes	,$consu3,Nombre_Cl	,$phpv);
								$d4=input2(text,flete_r,'',$_POST[flete_r]);
$contenido="
<table border='0' style='color: white;'>
	<tr><td>Chofer	</td>	<td>$d2</td></tr>
	<tr><td>Unidad	</td>	<td>$d3</td></tr>
	<tr><td>Cliente	</td>	<td>$d3</td></tr>
	<tr><td>Flete R.</td>	<td>$d4</td></tr>
</table>
";
$nuevo=$nuevo. contenedor($id,$caption,$style,$contenido);
$id="Fechas [D-M-A]";
$caption="";
$style='width: 40px; box-shadow: 0px 5px 5px black;';
								//$d15=date("d/m/Y");
	
	$libre=focuas_a(2,M);		$d1=		input2(text,D,'',$_POST[D],$style,'',$libre);
	$libre=focuas_a(2,A);		$d1=$d1."-".input2(text,M,'',$_POST[M],$style,'',$libre);
	$libre=focuas_a(4,D_r);		$d1=$d1."-".input2(text,A,'',$_POST[A],$style,'',$libre);
	
	$libre=focuas_a(2,M_r);		$d2=		input2(text,D_r,'',$_POST[D_r],$style,'',$libre);
	$libre=focuas_a(2,A_r);		$d2=$d2."-".input2(text,M_r,'',$_POST[M_r],$style,'',$libre);
	$libre=focuas_a(4,flete_r);	$d2=$d2."-".input2(text,A_r,'',$_POST[A_r],$style,'',$libre);
	
	$libre=focuas_a(2,M_c);		$d3=		input2(text,D_c,'',date("d"),$style,'',$libre.'readonly="readonly"');
	$libre=focuas_a(2,A_c);		$d3=$d3."-".input2(text,M_c,'',date("m"),$style,'',$libre.'readonly="readonly"');
	$libre=focuas_a(4,D);		$d3=$d3."-".input2(text,A_c,'',date("Y"),$style,'',$libre.'readonly="readonly"');

$style="width: 250px; height: 110px; background: rgba(5, 72, 108, 0.67); right: 0px; top: 260px;";
$contenido="
<table border='0' style='color: white;'>
	<tr><td>Salida	</td>	<td>$d1</td></tr>
	<tr><td>Llegada	</td>	<td>$d2</td></tr>
	<tr><td>Registro</td>	<td>$d3</td></tr>
</table>
";
$nuevo=$nuevo. contenedor($id,$caption,$style,$contenido);

	$libre=focuas_a(10,km_f);	$d1=input2(text,km_i		,'',$_POST[km_i],'','',$libre);
	$libre=focuas_a(10,come);	$d2=input2(text,km_f		,'',$_POST[km_f],'','',$libre);
$contenido="
<table border='0' style='color: white;'>
	<tr><td>Inicial	</td>	<td>$d1</td></tr>
	<tr><td>Final	</td>	<td>$d2</td></tr>
</table>
";
$id="Kilometraje";
$caption="";
$style="width: 250px; height: 80px; background: rgba(5, 72, 108, 0.67); right: 0px; top: 370px;";
$nuevo=$nuevo. contenedor($id,$caption,$style,$contenido);

	$libre=focuas_a(10,km_f);	$d1=input2(text	,n_c		,'',$n_c,'','','readonly="readonly"');
	$libre=focuas_a(10,come);	$d2="<TEXTAREA class='Medio'  maxleght='200' title='comentario general de el viaje' name='come' style='width: 190px; '>$_POST[come]</TEXTAREA>";
$contenido="
<table border='0' style='color: white;'>
	<tr><td>N° Cuentas	</td>	<td>$d1</td></tr>
	<tr><td>Comentarios	</td>	</tr>
	<tr ><td colspan='2'>$d2</td></tr>
</table>
";
$id="Otros";
$caption="";
$style="";
$style="width: 250px; height: 135px; background: rgba(5, 72, 108, 0.67); right: 0px; top: 450px;";
$nuevo=$nuevo. contenedor($id,$caption,$style,$contenido);
$centro=$nuevo;
?>