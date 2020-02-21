<?php
/*
------------Include  requeridos[Nombre]
-->"lista.php"
-->"libre_nue.php"
-->"tablero.php"
-->"libre_uni.php"
------------function requeridas[Libreria/funcion(s)]
--> "libre_uni.php"
-->input2			($type2,$name,$title,$value,$style,$id,$libre);
-->auto_tab_insert	(.. formato ..);
-->tablero			(.. formato ..);
-->compro			($com,$col,$var,$consu,$conexion);
-->ejecuta			($conexion,$res);
*/
$menu='menu-list';
$listn1='';
$listn2=Cuenta;
$listn3=Flete;
$listn4=Viaticos;
$listn5=Diesel;
$listn6=Casetas;
$listn7=Facturas;
$listn8="R Y R";
$listn9=Guias;
$listn10=Maniobras;
$listn11='';
$type=hidden;
$type2=text;
$style="top: 250px;";
//include('lista.php');
include('libre_nue.php');
if ($libre==''){echo"Error de Carga 'libre_bue.php'";}$libre='';
//-----------------------Verifica los datos 
$grava=1;
$c1=compro($_POST[ID_G],ID_G,'',$consu5,$conexion);
if ($_POST[ID_G]<>'')	{if ($c1==1){$grava=0;	$dc1="#ff002d33";$indc1=red;}	if ($c1==0){	$dc1="#21ff0033";}}
//----------------------Graba los datos
if (($grava==1)&&($_POST[accion]==$acc3)){//si el programa da luz verde y el usuario pidio guardar $acc<--almacen.php
$tabla=folio;
$n0=ID_G;		$v0=$_POST[ID_G];
$n1=nombre;		$v1=$_POST[nombre];	
$n2=cantida;	$v2=$_POST[cantida];	
$n3=marca;		$v3=$_POST[marca];
$n4=medidas;	$v4=$_POST[medidas];	
$n5=capacidad;	$v5=$_POST[capacidad];	
$n6=descripcion;$v6=$_POST[come];
include("espe_tab_insert.php");
if ($libre==''){echo"Error de Carga 'espe_tab_insert.php'";}$libre='';
ejecuta($conexion,$res);
$operacion="Guardado";
}
//-----------------------Actualiza los datos
$consu5=consulta('folio',$conexion,'','',ID_G,1);
$c1=compro($_POST[ID_G],ID_G,'',$consu5,$conexion);
if ($_POST[ID_G]<>'')	{if ($c1==1){$grava=0;	$dc1="#ff002d33";$indc1=red;}	if ($c1==0){	$dc1="#21ff0033";}}

//-----------------------
if (($_POST[paquetes]<>'')and($_POST[unixpack]<>'')){
	$_POST[cantida]=$_POST[paquetes]*$_POST[unixpack];
}
if (($_POST[paquetes]<>'')and($_POST[cosxpack]<>'')){
	$_POST[costo]=round($_POST[cosxpack]/$_POST[cantida],2);
}
//----------------------
$size=0;
$style="background: rgba(5, 72, 108, 0.67) none repeat scroll 0% 0%; width: auto; width: 220px; left: -1px; color: white;";
$i1="Codigo";			
$i2="Producto";
$i3="Marca";
$i4="Medidas";
$i5="Capacidad";
$i6="Cantida";
$i7="Costo c.u.";
$i13="Provedor";
$i14="Imagen";
$i15="Descripcion";
if ($_POST[paquetes]=='')$_POST[paquetes]=1;
$d1=$d1.input2($type2,ID_G,'Codigo de Barras'													,$_POST[ID_G]);
$d2=$d2.input2($type2,nombre,'Nombre con que se generen las busqueda rapida'					,$_POST[nombre]);
$d3=$d3.input2($type2,marca,'Marca del fabricante del producto'									,$_POST[marca]);
$d4=$d4.input2($type2,medidas,"medidas o dimenciones del producto \rformato [altoxanchoxlargo]"	,$_POST[medidas]);
$d5=$d5.input2($type2,capacidad,"capacidad de almacenamiento \rformato[0000.00]"				,$_POST[capacidad]);
$d6=$d6.input2($type2,cantida,'Cantidad de producto que sera ingresado al almacen'				,$_POST[cantida]);
$d7=$d7.input2($type2,costo,"costo de cada uno"													,$_POST[costo]);
//$d14=$d14.input2(file,archivo,"Añadir una imagen para que puedas identificarma facil",$archivo);

    
$d15=$d15."<TEXTAREA class='Medio' id='comenta' maxleght='200' title='comentario general de el viaje' name='come'>$_POST[come]</TEXTAREA>";
$d16=date("d/m/Y");
$d17=$ac2;
$d18=$ac8;
$d19=$ac9;
IF ($grava==1)$d20=$ac3;//boton para Guardar
IF ($grava==0)$d20="Verifique <br> marcadas en Rosa";
if ($operacion<>'')$d20=$operacion;
include("tablero.php");

$style0="background: rgba(100, 100, 100, 0.77) 	none repeat scroll 0% 0%; overflow: auto; overflow-x:hidden; position: absolute;
 left: 115px; height: 28px; width: 664px; top: 0px;";
$style1="background: rgba(0, 0, 0, 0.77) 		none repeat scroll 0% 0%; overflow: auto; overflow-x: auto; position: absolute;
 left: 115px; height: 542px; width: 664px; top: 56px;";
$style2="background: rgba(100, 100, 100, 0.77) 	none repeat scroll 0% 0%; overflow: auto; overflow-x:hidden; position: absolute;
 left: 115px; height: 28px; width: 664px; top: 28px;";
print "
 <div style='$style1'>
	<table>
";
/*
		$x=0;
		$consu5=consulta('folio',$conexion,'','',ID_G,1);
		mysqli_data_seek($consu5,0);
		while($datos=mysqli_fetch_array($consu5)){	
			if (($_POST[chofer]==$datos[CHOFER])or($_POST[chofer]==chofer)){
				$x++;
			}
		}	*/	
		$consu5=consulta('folio',$conexion,'','',ID_G,1);
		mysqli_data_seek($consu5,0);
		$x=1;
		while($datos=mysqli_fetch_array($consu5)){
			$b1=input2(button,"","",$x				,"width: 40px;");
			$b2=input2(button,"","",$datos[ID_G]);
			$b3=input2(button,"","",$datos[marca]);
			$b4=input2(button,"","",$datos[medidas]);
			$b5=input2(button,"","",$datos[cantida]);
			$b6=input2(button,"","",$datos[costo]);
			$b7=input2(button,"","",$datos[provedor]);
			echo"<tr><td>$b1</td><td>$b2</td><td>$b3</td><td>$b4</td><td>$b5</td><td>$b6</td><td>$b7</td><td>$b8</td><td>$b9</td></tr>";
			$x++;
		}
echo"
	</table>
 </div>";
$b1=input2(button,'',"",N°		,'width: 40px;');
$b2=input2(button,'',"",Codigo	);
$b3=input2(button,'',"",Marca	);
$b4=input2(button,'',"",Medidas);
$b5=input2(button,'',"",Cantidad);
$b6=input2(button,'',"",Costo);
$b7=input2(button,'',"",Provedor);
echo" 
 <div style='$style2'>
	<table><tr><td>$b1</td><td>$b2</td><td>$b3</td><td>$b4</td><td>$b5</td><td>$b6</td><td>$b7</td><td>$b8</td><td>$b9</td></tr></table>
 </div>
";
$libre=1;
?>