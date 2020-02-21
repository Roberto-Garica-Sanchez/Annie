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
input2(image,'','','',"",'',"src='img/beta2.gif'");
if ($_POST[apod]<>'')$_POST['menu-list']=Proveedores;
$menu='menu-list';
$listn1='';
$listn2=Buscar;
$listn3=Nuevo;
$listn4=Proveedores;
$listn5=Entradas;
$listn6=Salidas;
$listn7=Rapida;
$listn8="";
$listn9="";
$listn10="";
$listn11="";
$type=hidden;
$type2=text;
$style="top: 250px;";
include('lista.php');

include('libre_nue.php');
if ($libre==''){echo"Error de Carga 'libre_nue.php'";}$libre='';
if ( $_POST[accion]==$acc9) $_POST[memo]='';
//-----------------------Verifica los datos

if ($_POST['menu-list']==$listn3){//nuevo
	$grava=1;
	$c1=compro($_POST[ID_G],ID_G,'',$consu5,$conexion,$phpv);
	if ($_POST[ID_G]<>'')	{
		if ($c1==1){			$dc1="#ff002d33";}//existente color negro 
		if ($c1==0){			$dc1="#21ff0033";}//no existente verde
	}
	if (($_POST[ID_G]<>'')and($_POST[nombre]<>'')and($_POST[provedor]<>provedor)){if ($c1==1)$grava=0;}else{$grava=2;}
	//----------------------Graba los datos
	$tabla=folio;
	$n0=ID_G;		$v0=$_POST[ID_G];
	$n1=nombre;		$v1=$_POST[nombre];	
	$n2=cantida;	$v2=$_POST[cantida];
	$n3=descripcion;$v3=$_POST[come];	
	$n4=marca;		$v4=$_POST[marca];
	$n5=medidas;	$v5=$_POST[medidas];	
	$n6=capacidad;	$v6=$_POST[capacidad];
	$n7=costo;		$v7=$_POST[costo];	
	$n8=provedor;	$v8=$_POST[provedor];
	$n9=come;		$v9=$_POST[come];
	$n10=posicion;	$v10=$_POST[posicion];
	$n11=uni_min;	$v11=$_POST[uni_min];
	include("espe_tab_insert.php");
	if ($libre==''){echo"Error de Carga 'espe_tab_insert.php'";}$libre='';
	if (($grava==1)&&($_POST[accion]==$acc3)){//si el programa da luz verde y el usuario pidio guardar $acc<--almacen.php
		ejecuta($conexion,$res,$phpv);
		$operacion="Guardado";
	}
	//.......................operaciones de datos
	if ($_POST[prod]<>""){descarga1($consu5,$phpv); $img_descarga=$_POST[prod]; }						//descarga Producto
	if ($_POST[accion]==$acc4){	$consola=dele_pre(folio,$_POST[ID_G],$conexion,$phpv);}	//elimina producto selecionado
	
		$tabla=folio;
		$n_id=$n0=ID_G;	$v_id=$v0=$_POST[ID_G];
		$n1=nombre;		$v1=$_POST[nombre];	
		$n2=cantida;	$v2=$_POST[cantida];
		$n3=descripcion;$v3=$_POST[come];	
		$n4=marca;		$v4=$_POST[marca];
		$n5=medidas;	$v5=$_POST[medidas];	
		$n6=capacidad;	$v6=$_POST[capacidad];
		$n7=costo;		$v7=$_POST[costo];	
		$n8=provedor;	$v8=$_POST[provedor];
		$n9=come;		$v9=$_POST[come];
		$n10=posicion;	$v10=$_POST[posicion];
		$n11=uni_min;	$v11=$_POST[uni_min];
		
		include("espe_tab_update.php");
		if ($libre==''){echo"Error de Carga 'espe_tab_update.php'";}$libre='';
	if ($_POST[accion]==$acc10){ejecuta($conexion,$res,$phpv);}
	//-----------------------Actualiza los datos
	$consu5=consulta('folio',$conexion,'','',ID_G,1,$phpv);
	mysql_da_se($consu5,0,$phpv);
	$c1=compro($_POST[ID_G],ID_G,'',$consu5,$conexion,$phpv);
	if ($_POST[ID_G]<>'')	{if ($c1==1){$grava=0;	$dc1="#ff002d33";$indc1=red;}	if ($c1==0){	$dc1="#21ff0033";}}
	//-----------------------Calculos 
	if (($_POST[paquetes]<>'')and($_POST[unixpack]<>'')){$_POST[cantida]=$_POST[paquetes]*$_POST[unixpack];}
	if (($_POST[paquetes]<>'')and($_POST[cosxpack]<>'')){$_POST[costo]=round($_POST[cosxpack]/$_POST[cantida],2);}
	//----------------------
	$res='';
	
	if ($_POST[paquetes]=='')$_POST[paquetes]=1;
	IF ($grava==1)$d20=$ac3;//boton para Guardar
	IF ($grava==0){
		$d21=$ac4;
		$d20=$d20."Verifique <br> marcadas en Rosa";
	}
	if (($grava==0)and($_POST[accion]<>$acc2)){
		$des=" disabled ";
		$type3=hidden;
		$d1=input2($type3,ID_G		,'',$_POST[ID_G]);
		$d2=input2($type3,nombre	,'',$_POST[nombre]);
		$d3=input2($type3,marca		,'',$_POST[marca]);
		$d4=input2($type3,medidas	,'',$_POST[medidas]);
		$d5=input2($type3,capacidad	,'',$_POST[capacidad]);
		$d6=input2($type3,cantida	,'',$_POST[cantida]);
		$d7=input2($type3,costo		,'',$_POST[costo]);
		$d8=input2($type3,posicion	,'',$_POST[posicion]);
		$d9=input2($type3,uni_min	,'',$_POST[uni_min]);
		$d13=input2($type3,provedor	,'',$_POST[provedor]);
		$d15=input2($type3,come		,'',$_POST[come]);
		$d20="";
		$modificar=1;
	}
	if ($modificar==1){$dc1='#343434';$d17=$ac2;}
	if ($consola<>"")$d21=$consola;
	if ($operacion<>'')$d20=$operacion;
	if ($_POST[accion]==$acc2){	
		$foc1=" disabled ";
		$type3=hidden;
		$dc1='#343434';
		$d1=input2($type3,ID_G		,'',$_POST[ID_G]);
		echo input2(hidden	,accion	,'',$_POST[accion]);
		$d20=$ac10;
	}
	include("subir.php");
	if ($libre==''){echo"Error de Carga 'subir.php'";}$libre='';
	db('almacen',$conexion,$phpv);
	$src="img/defaul.jpg";
	if ($res<>"")$src=$res;
	$img="<img src='$src' style='width: 100px; height: 100px;'>";
	
	$size=0;
	$style="background: rgba(5, 72, 108, 0.67) none repeat scroll 0% 0%; width: auto; width: 220px; left: -1px; color: white;";
	$i1="Codigo";			
	$i2="Producto";
	$i3="Marca";
	$i4="Medidas";
	$i5="Capacidad";
	$i6="Existencias";
	$i7="Costo c.u.";
	$i8="Posicion";
	$i9="Minimas";
	$i13="Proveedores";
	$i14=$img;
	$i15="Descripcion";
	$libre=$foc1.$des.focuas_a(10,nombre);								$d1=$d1.input2($type2,ID_G	,'Codigo de Barras'														,$_POST[ID_G]		,'','',$libre);
	$libre=$des."placeholder=''".focuas_a(29,marca);					$d2=$d2.input2($type2,nombre,'Nombre con que se generen las busqueda rapida'						,$_POST[nombre]		,'','',$libre);
	$libre=$des."placeholder=''".focuas_a(34,medidas);					$d3=$d3.input2($type2,marca,'Marca del fabricante del producto'										,$_POST[marca]		,'','',$libre);
	$libre=$des."placeholder='largo*ancho*alto'".focuas_a(14,capacidad);$d4=$d4.input2($type2,medidas,"medidas o dimenciones del producto \rformato [alto x ancho x largo]"	,$_POST[medidas]	,'','',$libre);
	$libre=$des."placeholder='Litros o galosnes'".focuas_a(14,cantida);	$d5=$d5.input2($type2,capacidad,"capacidad de almacenamiento \rformato[0000.00 ml Lt ect.]"			,$_POST[capacidad]	,'','',$libre);
	$libre=$des."placeholder='Solo Numeros'".focuas_a(14,costo);		$d6=$d6.input2($type2,cantida,'Cantidad de producto que sera ingresado al almacen'					,$_POST[cantida]	,'','',$libre);
	$libre=$des."placeholder='$'".focuas_a(14,posicion);				$d7=$d7.input2($type2,costo,"costo de cada uno"														,$_POST[costo]		,'','',$libre);
	$libre=$des."placeholder='En anaquel'".focuas_a(14,uni_min);		$d8=$d8.input2($type2,posicion,"Procicion donde se localiza el producto en el almacen"				,$_POST[posicion]	,'','',$libre);
	$libre=$des."placeholder='Bantida basica'".focuas_a(14,come);		$d9=$d9.input2($type2,uni_min,"Unidades minimas en el almacen "										,$_POST[uni_min]	,'','',$libre);
	$libre="";
	$libre=$des;								$d13=$d13.despliegre_mysql(provedor,Provedores,$consu1,apodo,$phpv,$libre);
	$libre='onchange="carga_imagen();"'.$des;	$d14=$d14.input2(file,archivo,"Añadir una imagen para que sea mas facil de identificar",'','','',$libre)."<br>";
	$libre=$des;								$d15=$d15."<TEXTAREA class='Medio' id='comenta' maxleght='200' title='comentario general' name='come' $libre $libre>$_POST[come]</TEXTAREA>";
	$d16=date("d/m/Y");
	//$d17=$ac2;	//modificar
	$d18=$ac8;		//fallas
	$d19=$ac9;		//liminar
	include("tablero.php");

	$style0="background: rgba(100, 100, 100, 0.77) 	none repeat scroll 0% 0%; overflow: auto; overflow-x:hidden; position: absolute;	left: 115px; height: 28px; width: 664px; top: 0px;";
	$style1="background: rgba(0, 0, 0, 0.77) 		none repeat scroll 0% 0%; overflow: auto; overflow-x: auto; position: absolute;	 	left: 115px; height: 542px; width: 664px; top: 0px;";
	$style2="background: rgba(100, 100, 100, 0.77) 	none repeat scroll 0% 0%; overflow: auto; overflow-x:hidden; position: absolute;	left: 115px; height: 28px; width: 664px; top: 28px;";
	echo" <div style='$style1'>";
		$consu5=consulta('folio',$conexion,'','',ID_G,1,$phpv);
		mysql_da_se($consu5,0,$phpv);
		$x=1;
		db(img,$conexion,$phpv);
		$src="";
		while($datos=mysql_fe_ar($consu5,$phpv)){
			$res="";
			$consu1_1=consulta(img,$conexion,"","","","",$phpv);			
			$res=compro($datos[ID_G],ID_G,type,$consu1_1,$conexion,$phpv);
			$src="img/defaul.jpg";
			if ($res<>"")$src="img/".$datos[ID_G].$res;
			echo"<div id='cont1' style=''>";
				$conte="<img id='imagen' src='$src'style=''/>";
				echo div("color: white;","id='imagens'",$conte);
				if ($datos[cantida]<$datos[uni_min])$color1=red;else$color1=green;
				$conte=			input2(button,'',''						,'C. Barras'	,'position: absolute; width: 105px; background: rgba(50, 50, 50, 0.43); color: white;');
				$conte=$conte.	input2(submit,prod,'Codigo de Barras'	,$datos[ID_G] 	,'position: absolute; top: 25px; left: 3px;');
				echo div("width: 105px; height: 50px; left: 490px; top: 10px; position: absolute; background: blue; border-radius: 5px;",'',$conte);
				
				$conte=			input2(button,'',''						,Producto		,'position: absolute; width: 205px; background: rgba(20, 20, 20, 50.43);  color: white;');
				$conte=$conte.	input2(button,prod,'C. de Barras'		,$datos[nombre] ,'position: absolute; width: 200px; top: 25px; left: 3px;');
				echo div("width: 205px; height: 50px; left: 100px; top: 10px; position: absolute; background: rgba(0, 0, 0, 0.43); border-radius: 5px;",'',$conte);
				
				$conte="<TEXTAREA disabled style='width: 490px; height: 65px; background: rgba(0, 0, 0, 0.43); color: white; border-radius: 5px;'>$datos[come]</TEXTAREA>";
				echo div("width: 495px; height: 70px; left: 100px; top: 60px; position: absolute; background: rgba(0, 0, 0, 0.43);  border-radius: 5px;",'',$conte);
				
				$conte=input2(button,'','','Existencias'			,'position: absolute; top: 5px; left: 5px; ');
				$conte=$conte.input2(button,'','',$datos[cantida]	,"position: absolute; top: 5px; left: 105px; background: $color1; color: white; box-shadow: 1px 1px 1px white;");
				$conte=$conte.input2(button,'','','U. Minimas'		,'position: absolute; top: 30px; left: 5px; ');
				$conte=$conte.input2(button,'','',$datos[uni_min]	,'position: absolute; top: 30px; left: 105px; background: black; color: white; box-shadow: 1px 1px 1px white;');
				$conte=$conte.input2(button,'','','Provedor'		,'position: absolute; top: 55px; left: 5px; ');
				$conte=$conte.input2(button,'','',$datos[provedor]	,'position: absolute; top: 55px; left: 105px; background: black; color: white; box-shadow: 1px 1px 1px white;');
				$conte=$conte.input2(button,'','','Costo c/u.'		,'position: absolute; top: 5px; left: 210px; ');
				$conte=$conte.input2(button,'','',"$".$datos[costo]	,'position: absolute; top: 5px; left: 310px; background: black; color: white; box-shadow: 1px 1px 1px white;');
				$conte=$conte.input2(button,'','','Posicion'		,'position: absolute; top: 30px; left: 210px; ');
				$conte=$conte.input2(button,'','',$datos[posicion]	,'position: absolute; top: 30px; left: 310px; background: black; color: white; box-shadow: 1px 1px 1px white;');
				$conte=$conte.input2(button,'','','Marca'			,'position: absolute; top: 55px; left: 210px; ');
				$conte=$conte.input2(button,'','',$datos[marca]	,'position: absolute; top: 55px; left: 310px; background: black; color: white; box-shadow: 1px 1px 1px white;');
				echo div("width: 490px; height: 110px; left: 100px; top: 140px; position: absolute; background: rgba(0, 0, 0, 0.43);  border-radius: 5px;",'',$conte);
			echo"</div>";
			echo"<div style='position: relative; top: 10px; left: 20px; width: 610px; height: 10px; background: rgba(5, 72, 108, 0.67);'>";echo"</div>";
			$x++;
		}
	echo" </div>";
	
	$b1=input2(button,'',"",N°		,'width: 40px;');
	$b2=input2(button,'',"Codigo de barras del Producto",Codigo);
	$b3=input2(button,'',"",Producto);
	$b4=input2(button,'',"",Marca	);
	$b5=input2(button,'',"",Medidas);
	$b6=input2(button,'',"Unidades disponibles de Producto en el almacen ",Existencias);
	$b7=input2(button,'',"",Costo);
	$b8=input2(button,'',"",Proveedores);
	$b9=input2(button,'',"",Descripcion);
	/*echo" 
	 <div style='$style2'>
		<table><tr><td>$b1</td><td>$b2</td><td>$b3</td><td>$b4</td><td>$b5</td><td>$b6</td><td>$b7</td><td>$b8</td><td>$b9</td></tr></table>
	 </div>
	";*/

}
if ($_POST['menu-list']==$listn4){//Provedor
	if ($_POST[apod]<>''){
		$consu1=consulta('proveedores',$conexion,'','',ID_G,1,$phpv);
		$c= compro($_POST[apodo],apodo,ID_G,$consu1,$conexion,$phpv);
	}
	$grava=1;
	$c1=compro($_POST[ID_G],ID_G,'',$consu1,$conexion,$phpv);
	if ($_POST[ID_G]<>'')	{if ($c1==1){$grava=0;	$dc1="#ff002d33";$indc1=red;}	if ($c1==0){	$dc1="#21ff0033";}}
	//----------------------Graba los datos
	if (($grava==1)&&($_POST[accion]==$acc3)){//si el programa da luz verde y el usuario pidio guardar $acc<--almacen.php
	$tabla=proveedores;
	$n0=ID_G;		$v0=$_POST[ID_G];
	$n1=nombre;		$v1=$_POST[nombre];	
	$n2=apodo;		$v2=$_POST[apodo];
	$n3=direccion;	$v3=$_POST[direccion];	
	$n4=ciudad;		$v4=$_POST[ciudad];
	$n5=colonia;	$v5=$_POST[colonia];	
	$n6=codigo;		$v6=$_POST[codigo];
	$n7=telefono;	$v7=$_POST[telefono];	
	$n8=email;		$v8=$_POST[email];	
	$n9=ID_fot;		$v9='';
	$n10=come;		$v10=$_POST[come];	
	include("espe_tab_insert.php");
	if ($libre==''){echo"Error de Carga 'espe_tab_insert.php'";}$libre='';
	ejecuta($conexion,$res,$phpv);
	$operacion="Guardado";
	}
	//.......................operaciones de datos
	if ($_POST[prov]<>"")		descarga2($consu1,$phpv);  						//descarga Producto
	if ($_POST[accion]==$acc4){	$consola=dele_pre(proveedores,$_POST[ID_G],$conexion,$phpv);}	//elimina producto selecionado
	if ($_POST[accion]==$acc10){
		$tabla=proveedores;
		$n_id=$n0=ID_G;	$v_id=$v0=$_POST[ID_G];
		$n1=nombre;		$v1=$_POST[nombre];	
		$n2=apodo;		$v2=$_POST[apodo];
		$n3=direccion;	$v3=$_POST[direccion];	
		$n4=ciudad;		$v4=$_POST[ciudad];
		$n5=colonia;	$v5=$_POST[colonia];	
		$n6=codigo;		$v6=$_POST[codigo];
		$n7=telefono;	$v7=$_POST[telefono];	
		$n8=email;		$v8=$_POST[email];	
		$n9=ID_fot;		$v9='';
		$n10=come;		$v10=$_POST[come];
		include("espe_tab_update.php");
		if ($libre==''){echo"Error de Carga 'espe_tab_update.php'";}$libre='';
		ejecuta($conexion,$res,$phpv);
		//echo $res;
	}
	//-----------------------Actualiza los datos
	$consu1=consulta(proveedores,$conexion,'','',ID_G,1,$phpv);
	mysql_da_se($consu1,0,$phpv);
	$c1=compro($_POST[ID_G],ID_G,'',$consu1,$conexion,$phpv);
	if ($_POST[ID_G]<>'')	{if ($c1==1){$grava=0;	$dc1="#ff002d33";$indc1=red;}	if ($c1==0){	$dc1="#21ff0033";}}
	
	
	//----------------------------------------------
	$size=0;
	$style="background: rgba(5, 72, 108, 0.67) none repeat scroll 0% 0%; width: auto; width: 220px; left: -1px; color: white;";
	$i1="Codigo";			
	$i2="Nombre";
	$i3="Apodo";
	$i4="Dirección";
	$i5="Ciudad";
	$i6="Colonia";
	$i7="Codigo P.";
	$i8="Telefono";
	$i9="Email";
	$i10="";
	$i11="";
	$i12="";
	$i13="";
	$i14="Imagen";
	$i15="Descripcion";
	if ($_POST[paquetes]=='')$_POST[paquetes]=1;
	IF ($grava==1)$d20=$ac3;//boton para Guardar
	IF ($grava==0){
		$d21=$ac4;
		$d20=$d20."Verifique <br> marcadas en Rosa";
	}
	if (($grava==0)and($_POST[accion]<>$acc2)){
		$des=" disabled ";
		$type3=hidden;
		$d1=input2($type3,ID_G		,'',$_POST[ID_G]);
		$d2=input2($type3,nombre	,'',$_POST[nombre]);
		$d3=input2($type3,apodo		,'',$_POST[apodo]);
		$d4=input2($type3,direccion	,'',$_POST[direccion]);
		$d5=input2($type3,ciudad	,'',$_POST[ciudad]);
		$d6=input2($type3,colonia	,'',$_POST[colonia]);
		$d7=input2($type3,codigo	,'',$_POST[codigo]);
		$d8=input2($type3,telefono	,'',$_POST[telefono]);
		$d9=input2($type3,email		,'',$_POST[email]);
		$d10=input2($type3,codigo	,'',$_POST[codigo]);
		$d15=input2($type3,come		,'',$_POST[come]);
		$d20="";
		$modificar=1;
	}
	if ($modificar==1)	{$dc1='#343434';$d17=$ac2;}
	if ($consola<>"")	$d21=$consola;
	if ($operacion<>'')	$d20=$operacion;
	if ($_POST[accion]==$acc2){	
		$foc1=" disabled ";
		$type3=hidden;
		$dc1='#343434';
		$d1=input2($type3,ID_G		,'',$_POST[ID_G]);
		echo input2(hidden	,accion	,'',$_POST[accion]);
		$d20=$ac10;
	}
	
	$libre=$foc1.$des.focuas_a(10,nombre);
										$d1=$d1.input2($type2,ID_G			,'Frase con la que sea facil de buscar combinacion de num. y letras',$_POST[ID_G]		,'','',$libre);
	$libre=$des.focuas_a(35,apodo);		$d2=$d2.input2($type2,nombre		,'Nombre o Razon social '											,$_POST[nombre]		,'','',$libre);
	$libre=$des.focuas_a(35,direccion);	$d3=$d3.input2($type2,apodo			,'Nombre de pila con que se identifique más fácil al proveedor'		,$_POST[apodo]		,'','',$libre);
	$libre=$des.focuas_a(35,ciudad);	$d4=$d4.input2($type2,direccion		,''																	,$_POST[direccion]	,'','',$libre);
	$libre=$des.focuas_a(35,colonia);	$d5=$d5.input2($type2,ciudad		,''																	,$_POST[ciudad]		,'','',$libre);
	$libre=$des.focuas_a(35,codigo);	$d6=$d6.input2($type2,colonia		,''																	,$_POST[colonia]	,'','',$libre);
	$libre=$des.focuas_a(5,telefono);	$d7=$d7.input2($type2,codigo		,'Codigo Postal'													,$_POST[codigo]		,'','',$libre);
	$libre=$des.focuas_a(30,email);		$d8=$d8.input2($type2,telefono		,'Telefonos para comunicar, mas de un numero separados por comas [000 000 0000,000 000 0000]',$_POST[telefono],'','',$libre);
	$libre=$des.focuas_a(40,come);		$d9=$d9.input2($type2,email			,'correo Electronico para Comunicion'								,$_POST[email]	,'','',$libre);
	//$d14=$d14.input2(file,archivo,"Añadir una imagen para que puedas identificarma facil",$archivo);	
	$d15=$d15."<TEXTAREA class='Medio' id='comenta' maxleght='200' title='comentario general de el viaje' name='come'>$_POST[come]</TEXTAREA>";
	$d16=date("d/m/Y");
	$d17=$ac2;
	$d18=$ac8;
	$d19=$ac9;
	include("tablero.php");	
	$style0="background: rgba(100, 100, 100, 0.77) 	none repeat scroll 0% 0%; overflow: auto; overflow-x:hidden; position: absolute;	 left: 115px; height: 28px; width: 664px; top: 0px;";
	$style1="background: rgba(0, 0, 0, 0.77) 		none repeat scroll 0% 0%; overflow: auto; overflow-x: auto; position: absolute;	 left: 115px; height: 542px; width: 664px; top: 56px;";
	$style2="background: rgba(100, 100, 100, 0.77) 	none repeat scroll 0% 0%; overflow: auto; overflow-x:hidden; position: absolute;	 left: 115px; height: 28px; width: 664px; top: 28px;";
	print "
	 <div style='$style1'>
		<table>
	";
		$consu5=consulta('proveedores',$conexion,'','',ID_G,1,$phpv);
		mysql_da_se($consu5,0,$phpv);
		$x=1;
		while($datos=mysql_fe_ar($consu5,$phpv)){
			$b1=input2(button,"","",$x				,"width: 40px;");
			$b2=input2(submit,prov,$datos[ID_G]		,$datos[ID_G]);
			$b3=input2(button,"",$datos[marca]		,$datos[nombre]);
			$b4=input2(button,"",$datos[medidas]	,$datos[apodo]);
			$b5=input2(button,"",$datos[cantida]	,$datos[direccion]);
			$b6=input2(button,"",$datos[costo]		,$datos[ciudad]);
			$b7=input2(button,"",$datos[provedor]	,$datos[colonia]);
			$b8=input2(button,"",$datos[come]		,$datos[come]);
			echo"<tr><td>$b1</td><td>$b2</td><td>$b3</td><td>$b4</td><td>$b5</td><td>$b6</td><td>$b7</td><td>$b8</td><td>$b9</td></tr>";
			$x++;
		}
	echo"
		</table>
	 </div>";
	$b1=input2(button,'',"",N°		,'width: 40px;');
	$b2=input2(button,'',"Codigo de barras del Producto",Codigo);
	$b3=input2(button,'',"",Marca	);
	$b4=input2(button,'',"",Medidas);
	$b5=input2(button,'',"Unidades disponibles de Producto en el almacen ",Existencias);
	$b6=input2(button,'',"",Costo);
	$b7=input2(button,'',"",Proveedores);
	$b8=input2(button,'',"",Descripcion);
	echo" 
	 <div style='$style2'>
		<table><tr><td>$b1</td><td>$b2</td><td>$b3</td><td>$b4</td><td>$b5</td><td>$b6</td><td>$b7</td><td>$b8</td><td>$b9</td></tr></table>
	 </div>
	";
}
if ($_POST['menu-list']==$listn5){//entradas
	//db('almacen',$conexion,$phpv);
	$grava=1;
	$consu=consulta('entradas',$conexion,'','',ID_G,1,$phpv);
	mysql_da_se($consu,0,$phpv);
	// 					compro($com,$col,$var,$consu,$conexion,$phpv)
	$c1=compro($_POST[ID_G_fat],ID_G,'',$consu,$conexion,$phpv);
	if ($_POST[ID_G_fat]<>'')	{
		if ($c1==1){			echo$dc1="#ff002d33";}//existente. color negro 
		if ($c1==0){			echo$dc1="#21ff0033";}//no existente. verde
	}
	//-------------------------------------
	$tabla=entradas;
	$n0=ID_G;		$v0=$_POST[ID_G_fat];
	$n1=memo;		$v1=$_POST[memo];	
	$n2='';			
	$n3='';
	$na1=memo;		$va1=memo;		$repit1=21;//$_POST[memo];
	$na2=ingreso;	$va2=ingreso;	$repit2=21;//$_POST[memo];
	//$na2,$va2,$repit2,
	include("auto_tab_insert.php");
	if ($_POST[accion]==$acc3){ejecuta($conexion,$res,$phpv);echo"Guardado ";}
//-------------	----------------------------
	
	$style1="background: rgba(0, 0, 0, 0.10) 			none repeat scroll 0% 0%; overflow: auto; overflow-x: auto;	position: absolute;	 left: 100px; 	height: 600px; width: 900px; top: 0px;";
	$style2="background: rgba(5, 72, 108, 0.67)			none repeat scroll 0% 0%; overflow: auto; overflow-x: auto;	position: absolute;	 left: 0px; 	height: 550px; width: 445px; top: 50px;";
	$style3="background: rgba(5, 72, 108, 0.67) 		none repeat scroll 0% 0%; overflow: auto; overflow-x: auto;	position: absolute;	 left: 455px; 	height: 500px; width: 445px; top: 100px;";
	$style4="background: rgba(5, 72, 108, 0.67) 		none repeat scroll 0% 0%; overflow: auto; overflow-x: auto;	position: absolute;	 left: 0px; 	height: 50px;  width: 900px; top: 0px;";
	//div1----------------------------------------
	$consu5=consulta('folio',$conexion,'','',ID_G,1,$phpv);
	$x=1;
	$src="";
	$dat1=input2(button,'','','Cont.'		,'width: 40px; background: rgba(50, 50, 50, 0.76); color: white;');
	$dat2=input2(submit,'','',Clave			,'background: rgba(50, 50, 50, 0.76); color: white;');
	$dat3=input2(button,'','',Producto		,'background: rgba(50, 50, 50, 0.76); color: white;');
	$dat4=input2(button,'','',Existencias	,'background: rgba(50, 50, 50, 0.76); color: white;');
	$div1=$div1."<tr bgcolor='blue'><td>$dat1</td><td>$dat2</td><td>$dat3</td><td>$dat4</td><td>$dat5</td></tr>";	
	mysql_da_se($consu5,0,$phpv);
	while($datos=mysql_fe_ar($consu5,$phpv)){
		if ($datos[cantida]<$datos[uni_min]){$color1='background: rgba(100, 0, 0, 0.76);';$title="Unidades por debajo del minimo(min $datos[uni_min])";}else{$color1='background: rgba(00, 100, 00, 0.76);';$title="Unidades min. $datos[uni_min]";}
		$dat1=input2(button,''	,'',$x					,'width: 40px; background: rgba(50, 50, 50, 0.76); color: white;');
		$dat2=input2(submit,ID_G,'',$datos[ID_G]);
		$dat3=input2(button,''	,'',$datos[nombre]	,'background: rgba(50, 50, 50, 0.76); color: white;');
		$dat4=input2(button,''	,$title,$datos[cantida]		,"$color1 color: white;");
		$div1=$div1."<tr><td bgcolor='blue'>$dat1</td><td>$dat2</td><td>$dat3</td><td>$dat4</td><td>$dat5</td></tr>";
		$x=$x+1;
	}
	//div2------------------------------------
	
	
	$d1=input2(button,'','','Cont.'		,"background: rgba(50, 50, 50, 0.76); color: white; width: 40px;");
	$d2=input2(button,'','','Clave'		,"background: rgba(50, 50, 50, 0.76); color: white;");
	$d3=input2(button,'','','Producto'	,"background: rgba(50, 50, 50, 0.76); color: white;");
	$d4=input2(button,'','','Cantidad'	,"background: rgba(50, 50, 50, 0.76); color: white;");
	$div2="<tr bgcolor='blue'><td>$d1</td><td>$d2</td><td>$d3</td><td>$d4</td></tr>";
	if ($_POST[ID_G]<>'')$_POST[memo]=$_POST[memo]+1;
	$graba=1;
	for($x=1; $x<=$_POST[memo]; $x++){		
		$z=$x+1;
		if ($_POST[memo]==$x){if ($_POST[ID_G]<>'')		$_POST["memo".$x]=$_POST[ID_G];}
		if ($_POST["memo".$x]==$_POST[ID_G2])			$_POST["memo".$x]='';
		if ($_POST["memo".$x]=='')						{$_POST["memo".$x]=$_POST["memo".$z];$_POST["memo".$z]='';$_POST[memo]=$_POST[memo]-1;}
		//if(($_POST["memo".$x]==$_POST[ID_G])and($x==$_POST[memo]))			{$_POST[ID_G]='';$_POST[memo]=$_POST[memo]-1;}
		
		$d1=	input2(button	,'',''				,$x						,"background: rgba(50, 50, 50, 0.76); color: white; width: 40px;");
		$d2=	input2(submit	,ID_G2,''			,$_POST["memo".$x]);
		$d2=$d2.input2(hidden	,"memo".$x,''		,$_POST["memo".$x]);
		$d3=	input2(button	,'',''				,Producto				,"background: rgba(50, 50, 50, 0.76); color: white;");
		if ($_POST[memo]==$x){$libre="autofocus";}else{$libre='';}
		if ($_POST['ingreso'.$x]==''){$background="background: rgba(100, 50, 50, 0.76);";$graba=0;}
		if ($_POST['ingreso'.$x]!=''){$background="background: rgba(50, 50, 100, 0.76);";}
		$d4=	input2(text		,'ingreso'.$x,''	,$_POST['ingreso'.$x]	," $background color: white;",'',"placeholder='Ingresando' $libre");
		$div2=$div2."<tr><td bgcolor='blue'>$d1</td><td>$d2</td><td>$d3</td><td>$d4</td></tr>";
	}
	$div2=$div2.input2(hidden,memo,'',$_POST[memo]);
	//div3---------------------------------
	$d1=despliegre_mysql(provedor,Provedores,$consu1,apodo,$phpv,'');
	$d2=input2(text	,ID_G_fat,'',$_POST[ID_G_fat],"background: $dc1;",'',"placeholder='N. Factura'");
	//disabled=""
	$d3=$ac9;
	if (($graba==1)and($_POST[ID_G_fat]<>'')and($_POST[provedor]<>provedor)and($_POST[memo])>0){$libre='';$style="color: blue;";	}else{ $libre='disabled=""';$style="background: #FFFFFF80; ";}
	$d4=input2(submit,accion,"Guardar la informacion \n Datos Obligatorio \n(N. factura, Provedor, Productos con cantidad asignada)"						,$acc3,$style,'',$libre);
	$div3="<tr><td>Provedor</td><td>$d1</td><td>Factura</td><td>$d2</td><td>$d3</td><td>$d4</td></tr>";
	//Div top derecho 
	$style5="width: 445px; height: 50px; background: #000000b3; top: 50px; left: 455px; position: absolute;";
	$d1=input2(button,'','Ingreso Por Codigo De Barras','Ingresa C. B.');
	$d1=$d1.input2(text,'','Ingreso Por Codigo De Barras','');
	$cont1="<table border='0'><tr><td>$d1</td></tr></table>";
	//divs---------------------------------
	echo" <div style='$style1'>";
		echo"<div name='Isquierda'	style='$style2'><table>$div1</table></div>";
		echo"<div name='Derecha'	style='$style3'><table>$div2</table></div>";
		echo div($style5,'',$cont1);
		echo"<div name='top' 		style='$style4'><table style='background: #798eff80;'>$div3</table></div>";
		
	echo" </div>";
}
if ($_POST['menu-list']==$listn7){
	if ($_POST[ID_G]<>""){	
		db(almacen,$conexion,$phpv);
		$consu=consulta(folio,$conexion,'','','','',$phpv); 
		
		echo$datos=compro($_POST[ID_G],ID_G,'',$consu,$conexion,$phpv,1);
		
		db(img,$conexion,$phpv);
		$consu1_1=consulta(img,$conexion,"","","","",$phpv);			
		$res=compro($datos[ID_G],ID_G,type,$consu1_1,$conexion,$phpv);
		$src="img/".$datos[ID_G].$res;
		$conte="<img id='imagen' src='$src'style=''/>";
		$pre=div("color: white;","id='imagens'",$conte);
		if ($datos[cantida]<$datos[uni_min])$color1=red;else$color1=green;
		$conte=			input2(button,'',''						,'C. Barras'	,'position: absolute; width: 105px; background: rgba(50, 50, 50, 0.43); color: white;');
		$conte=$conte.	input2(submit,prod,'Codigo de Barras'	,$datos[ID_G] 	,'position: absolute; top: 25px; left: 3px;');
		$pre=$pre.div("width: 105px; height: 50px; left: 490px; top: 10px; position: absolute; background: blue; border-radius: 5px;",'',$conte);

		$conte=			input2(button,'',''						,Producto		,'position: absolute; width: 205px; background: rgba(20, 20, 20, 50.43);  color: white;');
		$conte=$conte.	input2(button,prod,'C. de Barras'		,$datos[nombre] ,'position: absolute; width: 200px; top: 25px; left: 3px;');
		$pre=$pre. div("width: 205px; height: 50px; left: 100px; top: 10px; position: absolute; background: rgba(0, 0, 0, 0.43); border-radius: 5px;",'',$conte);

		$conte="<TEXTAREA disabled style='width: 490px; height: 65px; background: rgba(0, 0, 0, 0.43); color: white; border-radius: 5px;'>$datos[come]</TEXTAREA>";
		$pre=$pre. div("width: 495px; height: 70px; left: 100px; top: 60px; position: absolute; background: rgba(0, 0, 0, 0.43);  border-radius: 5px;",'',$conte);

		$conte=input2(button,'','','Existencias'			,'position: absolute; top: 5px; left: 5px; ');
		$conte=$conte.input2(button,'','',$datos[cantida]	,"position: absolute; top: 5px; left: 105px; background: $color1; color: white; box-shadow: 1px 1px 1px white;");
		$conte=$conte.input2(button,'','','U. Minimas'		,'position: absolute; top: 30px; left: 5px; ');
		$conte=$conte.input2(button,'','',$datos[uni_min]	,'position: absolute; top: 30px; left: 105px; background: black; color: white; box-shadow: 1px 1px 1px white;');
		$conte=$conte.input2(button,'','','Provedor'		,'position: absolute; top: 55px; left: 5px; ');
		$conte=$conte.input2(button,'','',$datos[provedor]	,'position: absolute; top: 55px; left: 105px; background: black; color: white; box-shadow: 1px 1px 1px white;');
		$conte=$conte.input2(button,'','','Costo c/u.'		,'position: absolute; top: 5px; left: 210px; ');
		$conte=$conte.input2(button,'','',"$".$datos[costo]	,'position: absolute; top: 5px; left: 310px; background: black; color: white; box-shadow: 1px 1px 1px white;');
		$conte=$conte.input2(button,'','','Posicion'		,'position: absolute; top: 30px; left: 210px; ');
		$conte=$conte.input2(button,'','',$datos[posicion]	,'position: absolute; top: 30px; left: 310px; background: black; color: white; box-shadow: 1px 1px 1px white;');
		$conte=$conte.input2(button,'','','Marca'			,'position: absolute; top: 55px; left: 210px; ');
		$conte=$conte.input2(button,'','',$datos[marca]	,'position: absolute; top: 55px; left: 310px; background: black; color: white; box-shadow: 1px 1px 1px white;');
		$pre=$pre. div("width: 490px; height: 110px; left: 100px; top: 140px; position: absolute; background: rgba(0, 0, 0, 0.43);  border-radius: 5px;",'',$conte);
		$datos=div("left: 30px; top: 80px; width: 600px; height: 290px; background: #00000080; position: absolute; border-radius: 5px;","",$pre);
		$style="";
		$pre=		input2(button,'','','Entra'	,'position: absolute; top: 10px; left: 100px; border-bottom-left-radius: 5px;border-top-left-radius: 5px;');
		$pre=$pre.	input2(text,'','',''		,'position: absolute; top: 10px; left: 200px; background: #fff9;');
		$pre=$pre.	input2(button,'','','Salen'	,'position: absolute; top: 10px; left: 302px; border-bottom-right-radius: 5px;border-top-right-radius: 5px;');
		
		$datos=$datos.div("    width: 600px;
    height: 100px;
    background: #a2a4a3cc;
    border-radius: 5px;
    position: absolute;
    top: 380px;
    left: 30px;"
	,'',$pre);
		
		
	}
	
		$style="width: 500px; height: 50px; background: #00000080; border-radius: 5px; top: 20px; position: absolute; left: 30px;";
		$cont=		input2(button,'','',"Codigo De Barras"	,"left: 10px;  top: 10px; height: 30px; position: absolute; width: auto;	border-bottom-left-radius: 5px; border-top-left-radius: 5px");
		$cont=$cont.input2(text,ID_G,'',$_POST[ID_G]		,"left: 127px; top: 10px; height: 28px; position: absolute; width: 250px; background: #fff9; text-align: center; border-bottom-right-radius: 5px; border-top-right-radius: 5px;");
		$cont=$cont.input2(submit,Busca_pro,'',Buscar		,"left: 390px; top: 10px; height: 30px; position: absolute; border-radius: 5px;");
		$buscador=div($style,'',$cont);
		
	$style="background: rgba(5, 72, 108, 0.67) none repeat scroll 0% 0%; overflow: auto; overflow-x: auto; position: absolute; left: 115px; height: 542px; width: 664px; top: 56px;";
	echo div($style,'',$buscador.$datos);		
	
}
$libre=1;

?>