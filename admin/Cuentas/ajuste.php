<?php 

$menu='menu-list';
$listn1=Choferes;
$listn2=Placas;
$listn3=Clientes;
$listn4='';
$listn5='';
$listn6='';
$listn7='';
$listn8='';
$listn9='';
$listn10='';
$listn11='';
$style='top: 250px;';
include('lista.php');
include('libre_aju.php');
if ($_POST['menu-list']=='')$_POST['menu-list']=$listn1;
if ($_POST['menu-list']==$listn1){//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	$_POST[Nombre]=strtoupper($_POST[Nombre]);
	if (($_POST[opcion1]==Guardar)&&($_POST[ID_Ch]==''))			{$_POST[opcion1]="Modificar";	//guarda nuevo dato
		$tabla	= choferes;
		$n0		= Nombre_Ch;	$v0=$_POST[Nombre];
		$n1		= Edad;			$v1=$_POST[Edad];
		$n2		= Direccion;	$v2=$_POST[Direccion];
		$n3		= Celular;		$v3=$_POST[Celular];
		$n4		= ulti_viaje;	$v4=0;
		$n5		= Estatus;		$v5=1;
		$n6		= N_fact;		$v6=0;
		include("espe_tab_insert.php");
		ejecuta($conexion,$res,$phpv);
	}
	if (($_POST[opcion1]==Guardar)&&($_POST[ID_Ch]<>''))			{$_POST[opcion1]="";	//guarda cambios de dato
		$tabla	= choferes;
		$n_id	= ID_Ch;
		$v_id	= $_POST[ID_Ch];
		$n0		= Nombre_Ch;	$v0=$_POST[Nombre];
		$n1		= Edad;			$v1=$_POST[Edad];
		$n2		= Direccion;	$v2=$_POST[Direccion];
		$n3		= Celular;		$v3=$_POST[Celular];
		include("espe_tab_update.php");
		ejecuta($conexion,$res,$phpv);
	}	
	if (($_POST[opcion1]==Actualizar)&&($_POST[ID_Ch]<>''))			{$_POST[opcion1]="Modificar";	//actualizar numero de cuentas 
		$tabla	= choferes;
		$n_id	= ID_Ch;
		$v_id	= $_POST[ID_Ch];
		$n0		= N_fact;	$v0=$_POST[N_fact];
		$n1		= "";	$v1="";
		$n2		= "";	$v2="";
		include("espe_tab_update.php");
		//echo$res;
		ejecuta($conexion,$res,$phpv);
	}
	if ( $_POST[Nombre]=="")										{$type=text;					//Habilita Ingreso de datos 
		$_POST[opcion1]="ingreso";					
	}
	if ( $_POST[Nombre]<>"")/*&&($_POST[opcion1]<>Modificar))		*/								{								//revisa si existe algun datos igual
		$consu3=consulta	  (choferes,$conexion,"Nombre_Ch",$_POST[Nombre],1,"",$phpv);	
		$dato=mysql_fe_ar	  ($consu3,$phpv);
		if($_POST[Nombre]==$dato[Nombre_Ch]){
			$_POST[ID_Ch]		= $dato[ID_Ch];
			$_POST[Nombre]		= $dato[Nombre_Ch];
			$_POST[Edad]		= $dato[Edad];
			$_POST[Direccion]	= $dato[Direccion];
			$_POST[Celular]		= $dato[Celular];
		}
	}
	if ( $_POST[opciones1]<>'')										{$_POST[opcion1]="Modificar";	//Selecion de un Elemento descarga informacion adicional
		$_POST[Nombre]		= $_POST[opciones1];
		$consu3=consulta	  (choferes,$conexion,"Nombre_Ch",$_POST[Nombre],1,"",$phpv);		
		$dato=mysql_fe_ar	  ($consu3,$phpv);
			$_POST[ID_Ch]		= $dato[ID_Ch];
			$_POST[Nombre]		= $dato[Nombre_Ch];
			$_POST[Edad]		= $dato[Edad];
			$_POST[Direccion]	= $dato[Direccion];
			$_POST[Celular]		= $dato[Celular];
	}	
	if (($_POST[opcion1]==Eliminar)&&($_POST[ID_Ch]<>''))			{$_POST[opcion1]="Nuevo";		//Elimina los datos
		$tabla		= choferes;
		$col_espe	= ID_Ch;
		$espe 		=$_POST[ID_Ch];
		delete($tabla,$col_espe,$espe,$conexion,$phpv);
	}
	if ( $_POST[opcion1]==Nuevo)									{$type=text;					//limpia Los Campos para nuevos datos 
		if($_POST[opcion1]==Nuevo)$_POST[Nombre]		= "";
		$_POST[ID_Ch]		= "";
		$_POST[Registro]	= date("d/m/Y");
		$_POST[Edad]		= "";
		$_POST[Direccion]	= "";
		$_POST[Celular]		= "";
		$_POST[opcion1]		= "ingreso";
	}
	if ( $_POST[ID_Ch]<>"")											{$type=button;					//bloquea casillas para presentar datos 
        $d6=input2(submit,opcion1,"Eliminar de forma permanente Este Cliente",Eliminar);
        $d7=input2(submit,opcion1,'',Modificar);
        $d8=input2(submit,opcion1,'',Nuevo);
        $d9=input2(submit,opcion1,"Actualizar numero de cuentas de este cliente",Actualizar);
		$consu5=consulta('folio',$conexion,"","",ID_G,1,$phpv);
		mysql_da_se($consu5,0,$phpv);$conte="";$x=0;
		$conte="<table>";
		while($datos=mysql_fe_ar($consu5,$phpv)){
			if($datos[CHOFER]==$_POST[Nombre]){$x++;
				$b1=input2(text,'','',$datos[ID_G]);
				$conte=$conte."<tr ><td>$b1</td></tr>";
			}
		}
		$conte=$conte."</table>";
		$i7=input2(hidden,N_fact,'',$x).input2(button,'','',$x);
	}
	if((($_POST[opcion1]==Modificar)&&($_POST[ID_Ch]<>''))or($_POST[opcion1]==ingreso))	{$type=text;//Habilita para modificar y nuevo
		$d5=input2(submit,opcion1,'',Guardar);
	}
		$title1='Nuevo Registro'.input2(hidden,opcion1,'',$_POST[opcion1]);
        $i1=Nombre;
        $i2=Edad;
        $i3=Direccion;
        $i4=Celular;
        $d1=input2(hidden,Nombre		,'',strtoupper($_POST[Nombre]))		.input2($type,Nombre,''		,strtoupper($_POST[Nombre])).input2(hidden,ID_Ch,'',$_POST[ID_Ch]) ;
        $d2=input2(hidden,Edad			,'',strtoupper($_POST[Edad]))		.input2($type,Edad,''		,strtoupper($_POST[Edad]))	;
        $d3=input2(hidden,Direccion		,'',strtoupper($_POST[Direccion]))	.input2($type,Direccion,''	,strtoupper($_POST[Direccion]))	;
        $d4=input2(hidden,Celular		,'',strtoupper($_POST[Celular]))	.input2($type,Celular,''	,strtoupper($_POST[Celular]));
	$style="width: 230px; height: 300px; background: rgba(5, 72, 108, 0.67) none repeat scroll 0% 0%; position: absolute; top: 300px; left: 770px; overflow: auto; overflow-x: auto;";
	echo div($style,$libre,$conte); //sistema de presentacion del los 
}
if ($_POST['menu-list']==$listn2){//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	if ( $_POST[placas]=="")										{$type=text;					//Habilita Ingreso de datos 
		$_POST[opcion2]="ingreso";	
	}	
	if ( $_POST[placas]<>"")										{								//Habilita Ingreso de datos 
		$consu2=consulta	  (placas,$conexion,"Placas",$_POST[placas],1,"",$phpv);	
		$dato=mysql_fe_ar	  ($consu2,$phpv);
		if($_POST[placas]==$dato[Placas]){
			$_POST[ID_Pl]		= $dato[ID_Pl];
			$_POST[placas]		= $dato[Placas];
			$_POST[marca]		= $dato[Marca];
			$_POST[modelo]		= $dato[Modelo];
			$_POST[n_e]			= $dato[N_eco];
			$_POST[color]		= $dato[Color];
		}
	}	
	if ( $_POST[opciones2]<>'')										{$_POST[opcion2]="Modificar";	//Selecion de un Elemento descarga informacion adicional
		$_POST[placas]		= $_POST[opciones2];
		$consu2=consulta	  (placas,$conexion,"Placas",$_POST[placas],1,"",$phpv);	
		$dato=mysql_fe_ar	  ($consu2,$phpv);
		$_POST[ID_Pl]		= $dato[ID_Pl];
		$_POST[marca]		= $dato[Marca];
		$_POST[modelo]		= $dato[Modelo];
		$_POST[n_e]			= $dato[N_eco];
		$_POST[color]		= $dato[Color];
		$_POST[opciones2]	= "";
	}	
	if (($_POST[opcion2]==Eliminar)&&($_POST[ID_Pl]<>''))			{$_POST[opcion2]="Nuevo";		//Elimina los datos
		$tabla	= placas;
		$col_espe =ID_Pl;
		$espe =	$_POST[ID_Pl];
		delete($tabla,$col_espe,$espe,$conexion,$phpv);
	}
	if ( $_POST[opcion2]==Nuevo)									{$type=text;					//limpia Los Campos para nuevos datos 
		if ( $_POST[opcion2]==Nuevo)$_POST[placas]		= "";
		$_POST[ID_Pl]		= "";
		$_POST[marca]		= date("d/m/Y");
		$_POST[modelo]		= "";
		$_POST[n_e]			= "";
		$_POST[color]		= "";
		$_POST[opcion2]		= "ingreso";
	}
	if ( $_POST[ID_Pl]<>"")											{$type=button;					//bloquea casillas para presentar datos 
        $d6=input2(submit,opcion2,"Eliminar de forma permanente Este Cliente",Eliminar);
        $d7=input2(submit,opcion2,'',Modificar);
        $d8=input2(submit,opcion2,'',Nuevo);
        $d9=input2(submit,opcion2,"Actualizar numero de cuentas de este cliente",Actualizar);
		$consu5=consulta('folio',$conexion,"","",ID_G,1,$phpv);
		mysql_da_se($consu5,0,$phpv);$conte="";$x=0;
		$conte="<table>";
		while($datos=mysql_fe_ar($consu5,$phpv)){
			if($datos[PLACAS]==$_POST[placas]){$x++;
				$b1=input2(text,'','',$datos[ID_G]);
				$conte=$conte."<tr ><td>$b1</td></tr>";
			}
		}
		$conte=$conte."</table>";
		$i7=input2(hidden,N_fact,'',$x).input2(button,'','',$x);
	}
	if((($_POST[opcion2]==Modificar)&&($_POST[ID_Pl]<>''))or($_POST[opcion2]==ingreso))	{$type=text;//Habilita para modificar y nuevo
		$d7=input2(submit,opcion2,'',Guardar);
	}
	if (($_POST[opcion2]==Guardar)&&($_POST[ID_Pl]==''))			{$_POST[opcion2]="Modificar";	//guarda nuevo dato
		$tabla	= placas;
		$n0		= Placas;		$v0=$_POST[placas];
		$n1		= Marca;		$v1=$_POST[marca];
		$n2		= Modelo;		$v2=$_POST[modelo];
		$n3		= N_eco;		$v3=$_POST[n_e];
		$n4		= Color;		$v4=$_POST[color];
		$n5		= N_fact;		$v5=0;
		include("espe_tab_insert.php");
		ejecuta($conexion,$res,$phpv);
	}
	if (($_POST[opcion2]==Guardar)&&($_POST[ID_Pl]<>''))			{$_POST[opcion2]="Modificar";	//guarda cambios de dato
		$tabla	= placas;
		$n_id	= ID_Pl;
		$v_id	= $_POST[ID_Pl];
		$n0		= Placas;		$v0=$_POST[placas];
		$n1		= Marca;		$v1=$_POST[marca];
		$n2		= Modelo;		$v2=$_POST[modelo];
		$n2		= N_eco;		$v2=$_POST[n_e];
		$n2		= Color;		$v2=$_POST[color];
		include("espe_tab_update.php");
		ejecuta($conexion,$res,$phpv);
	}	
	if (($_POST[opcion2]==Actualizar)&&($_POST[ID_Pl]<>''))			{$_POST[opcion2]="Modificar";	//actualizar numero de cuentas 
		$tabla	= placas;
		$n_id	= ID_Pl;
		$v_id	= $_POST[ID_Pl];
		$n0		= N_fact;	$v0=$_POST[N_fact];
		$n1		= "";	$v1="";
		$n2		= "";	$v2="";
		include("espe_tab_update.php");
		ejecuta($conexion,$res,$phpv);
	}
        $title1='Nuevo Registro'.input2(hidden,opcion2,'',$_POST[opcion2]);
        $i1=Placas;
        $i2=Marca;
        $i3=Modelo;
        $i4=N°E;
        $i5=Color;
        $d1=input2(hidden,placas	,'',strtoupper($_POST[placas]))	.input2($type,placas,''	,strtoupper($_POST[placas]))		.input2(hidden,ID_Pl,'',$_POST[ID_Pl]) ;
        $d2=input2(hidden,marca		,'',strtoupper($_POST[marca]))	.input2($type,marca,''	,strtoupper($_POST[marca]))	;
        $d3=input2(hidden,modelo	,'',strtoupper($_POST[modelo]))	.input2($type,modelo,''	,strtoupper($_POST[modelo]))	;
        $d4=input2(hidden,n_e		,'',strtoupper($_POST[n_e]))	.input2($type,n_e,''	,strtoupper($_POST[n_e]))	;
        $d5=input2(hidden,color		,'',strtoupper($_POST[color]))	.input2($type,color,''	,strtoupper($_POST[color]))	;
	$style="width: 230px; height: 300px; background: rgba(5, 72, 108, 0.67) none repeat scroll 0% 0%; position: absolute; top: 300px; left: 770px; overflow: auto; overflow-x: auto;";
	echo div($style,$libre,$conte); //sistema de presentacion de a informacion
}
if ($_POST['menu-list']==$listn3){//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	if ( $_POST[Nombre]=="")										{$type=text;					//Habilita Ingreso de datos 
		$_POST[opcion3]="ingreso";					
	}
	if ( $_POST[Nombre]<>"")										{								//revisa si existe algun datos igual
		$consu3=consulta	  (clientes,$conexion,"Nombre_Cl",$_POST[Nombre],1,"",$phpv);	
		$dato=mysql_fe_ar	  ($consu3,$phpv);
		if($_POST[Nombre]==$dato[Nombre_Cl]){
			$_POST[ID_Cl]		= $dato[ID_Cl];
			$_POST[Nombre]		= $dato[Nombre_Cl];
			$_POST[Registro]	= $dato[Fecha_re];
			$_POST[Destino]		= $dato[Destino];
		}
	}
	if ( $_POST[opciones3]<>'')										{$_POST[opcion3]="Modificar";	//Selecion de un Elemento descarga informacion adicional
		$_POST[Nombre]		= $_POST[opciones3];
		$consu3=consulta	  (clientes,$conexion,"Nombre_Cl",$_POST[Nombre],1,"",$phpv);	
		$dato=mysql_fe_ar	  ($consu3,$phpv);
		$_POST[ID_Cl]		= $dato[ID_Cl];
		$_POST[Registro]	= $dato[Fecha_re];
		$_POST[Destino]		= $dato[Destino];
		$_POST[opciones3]	= "";
	}	
	if (($_POST[opcion3]==Eliminar)&&($_POST[ID_Cl]<>''))			{$_POST[opcion3]="Nuevo";		//Elimina los datos
		$tabla	= clientes;
		$col_espe =ID_Cl;
		$espe =	$_POST[ID_Cl];
		delete($tabla,$col_espe,$espe,$conexion,$phpv);
	}
	if ( $_POST[opcion3]==Nuevo)									{$type=text;					//limpia Los Campos para nuevos datos 
		if($_POST[opcion3]==Nuevo)$_POST[Nombre]		= "";
		$_POST[ID_Cl]		= "";
		$_POST[Registro]	= date("d/m/Y");
		$_POST[Destino]		= "";
		$_POST[opcion3]		= "ingreso";
	}
	if ( $_POST[ID_Cl]<>"")											{$type=button;					//bloquea casillas para presentar datos 
        $d4=input2(submit,opcion3,"Eliminar de forma permanente Este Cliente",Eliminar);
        $d5=input2(submit,opcion3,'',Modificar);
        $d6=input2(submit,opcion3,'',Nuevo);
        $d7=input2(submit,opcion3,"Actualizar numero de cuentas de este cliente",Actualizar);
		$consu5=consulta('folio',$conexion,"","",ID_G,1,$phpv);
		mysql_da_se($consu5,0,$phpv);$conte="";$x=0;
		$conte="<table>";
		while($datos=mysql_fe_ar($consu5,$phpv)){
			if($datos[CLIENTE]==$_POST[Nombre]){$x++;
				$b1=input2(text,'','',$datos[ID_G]);
				$conte=$conte."<tr ><td>$b1</td></tr>";
			}
		}
		$conte=$conte."</table>";
		$i7=input2(hidden,N_fact,'',$x).input2(button,'','',$x);
	}
	if((($_POST[opcion3]==Modificar)&&($_POST[ID_Cl]<>''))or($_POST[opcion3]==ingreso))	{$type=text;//Habilita para modificar y nuevo
		$d5=input2(submit,opcion3,'',Guardar);
	}
	if (($_POST[opcion3]==Guardar)&&($_POST[ID_Cl]==''))			{$_POST[opcion3]="Modificar";	//guarda nuevo dato
		$tabla	= clientes;
		$n0		= Nombre_Cl;	$v0=$_POST[Nombre];
		$n1		= Fecha_re;		$v1=$_POST[Registro];
		$n2		= Destino;		$v2=$_POST[Destino];
		$n3		= N_fact;		$v3=0;
		include("espe_tab_insert.php");
		ejecuta($conexion,$res,$phpv);
	}
	if (($_POST[opcion3]==Guardar)&&($_POST[ID_Cl]<>''))			{$_POST[opcion3]="Modificar";	//guarda cambios de dato
		$tabla	= clientes;
		$n_id	= ID_Cl;
		$v_id	= $_POST[ID_Cl];
		$n0		= Nombre_Cl;	$v0=$_POST[Nombre];
		$n1		= Fecha_re;		$v1=$_POST[Registro];
		$n2		= Destino;		$v2=$_POST[Destino];
		include("espe_tab_update.php");
		ejecuta($conexion,$res,$phpv);
	}	
	if (($_POST[opcion3]==Actualizar)&&($_POST[ID_Cl]<>''))			{$_POST[opcion3]="Modificar";	//actualizar numero de cuentas 
		$tabla	= clientes;
		$n_id	= ID_Cl;
		$v_id	= $_POST[ID_Cl];
		$n0		= N_fact;	$v0=$_POST[N_fact];
		$n1		= "";	$v1="";
		$n2		= "";	$v2="";
		include("espe_tab_update.php");
		ejecuta($conexion,$res,$phpv);
	}
      $title1='Nuevo Registro'.input2(hidden,opcion3,'',$_POST[opcion3]);
        $i1=Nombre;
        $i2='Fecha Origen';
        $i3=Destino;
        $d1=input2(hidden,Nombre		,'',strtoupper($_POST[Nombre]))	.input2($type,Nombre,''		,strtoupper($_POST[Nombre])).input2(hidden,ID_Cl,'',$_POST[ID_Cl]) ;
        $d2=input2(hidden,Registro	,'',strtoupper($_POST[Registro]))	.input2($type,Registro,''	,strtoupper($_POST[Registro]))	;
        $d3=input2(hidden,Destino	,'',strtoupper($_POST[Destino]))	.input2($type,Destino,''	,strtoupper($_POST[Destino]))	;
	$style="width: 230px; height: 300px; background: rgba(5, 72, 108, 0.67) none repeat scroll 0% 0%; position: absolute; top: 300px; left: 770px; overflow: auto; overflow-x: auto;";
	echo div($style,$libre,$conte); //sistema de presentacion del los 
}
$size=0;
$style="background: rgba(5, 72, 108, 0.67) none repeat scroll 0% 0%; width: auto; width: 220px; left: -1px; color: white;";
include('tablero.php');
if($_POST['menu-list']==$listn1){//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	echo"<div style='overflow: auto; overflow-x:auto; position: absolute; left: 105px; height: 599px; width: 664px; background: #0009;'>
		<table border='0'>";
	$i1=input2(button,"","",Nombre,"width: 250px;");
	$i2=input2(button,"","",Edad);
	$i3=input2(button,"","",Celular);
	$i4=input2(button,"","",Direccion);
	$i5=input2(submit,actua1,"Actualiza todas","N° Facturas");
	echo"<tr bgcolor='#343434'><td >$i1</td ><td >$i2</td ><td >$i3</td ><td >$i4</td ><td >$i5</td ></tr >";
	$consu1=consulta	  (choferes,$conexion,"Nombre_Ch",$_POST[Nombre],1,"",$phpv);	
	mysql_da_se($consu1,0,$phpv);
	if($_POST[actua1]=="N° Facturas"){		
		while($dato=mysql_fe_ar($consu1,$phpv)){				//actualiza el numero de cuentas de cada uno 
			$consu=consulta	  (folio,$conexion,"CHOFER",$dato[Nombre_Ch],1,"",$phpv,busca);	
			mysql_da_se($consu,0,$phpv);$conta=0;
			while($busca=mysql_fe_ar($consu,$phpv)){$conta++;}
			$tabla	= choferes;
			$n_id	= ID_Ch;
			$v_id	= $dato[ID_Ch];
			$n0		= N_fact;	$v0=$conta;
			$n1		= "";	$v1="";
			$n2		= "";	$v2="";
			include("espe_tab_update.php");
			ejecuta($conexion,$res,$phpv);	
			
		}
	}
	$consu1=consulta	  (choferes,$conexion,"Nombre_Ch",$_POST[Nombre],1,"",$phpv);	
	mysql_da_se($consu1,0,$phpv);
	while($dato=mysql_fe_ar($consu1,$phpv)){	
		$i1=input2(submit,opciones1,'Ver Mas Opciones '.$dato[Nombre_Ch],$dato[Nombre_Ch],'width: 250px; text-align: left;');
		$i2=input2(button,'','',$dato[Edad]);
		$i3=input2(button,'','',$dato[Celular]);	
		$i4=input2(button,'','',$dato[Direccion]);	
		$i5=input2(button,'','',$dato[N_fact]);	
		echo"<tr><td>$i1</td><td>$i2</td><td>$i3</td><td>$i4</td><td>$i5</td></tr>";
	}
	echo'</table >';
	echo"</div>";
}
if($_POST['menu-list']==$listn2){//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	echo'<div style="overflow: auto; overflow-x:auto; position: absolute; left: 105px; height: 599px; width: 664px; background: #0009;">
		<table border="0">';
			echo'
			<tr bgcolor="#343434">
			<td >Placas     </td >
			<td >Marca	</td >
			<td >Modelo	</td >
			<td >N° E.	</td >
			<td >Color	</td >
			<td >N° Facturas	</td >
	</tr >';
	
	$consu2=consulta(placas,$conexion,"","",Placas,"",$phpv);
	mysql_da_se($consu2,0,$phpv);
	while($dato=mysql_fe_ar($consu2,$phpv)){
			echo'<tr bgcolor="#676767">';
			echo'<td >'.$d=input2(submit,opciones2,'Ver Mas Opciones '.$dato[Placas],$dato[Placas],''),'</td >';
			echo'<td >'.$d=input2(button,'','',$dato[Marca],' width: 150px; text-align: left;').'</td >';
			echo'<td >'.$d=input2(button,'','',$dato[Modelo]).'</td >';
			echo'<td >'.$d=input2(button,'','',$dato[N_eco]).'</td >';
			echo'<td >'.$d=input2(button,'','',$dato[Color]).'</td >';
			echo'<td >'.$d=input2(button,'','',$dato[N_fact]).'</td >';
	echo'</tr >';
	}
	echo'</table >';
	echo"</div>";
}
if($_POST['menu-list']==$listn3){//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	echo'<div style="overflow: auto; overflow-x:auto; position: absolute; left: 105px; height: 599px; width: 664px; background: #0009;">
	<table border="0">';
	$i1=input2(button,"","",Nombre,"width: 250px;");
	$i2=input2(button,"","",Registrado);
	$i3=input2(button,"","",Destino);
	$i4=input2(submit,actua1,"Actualiza todas","N° Facturas");
	echo"<tr bgcolor='#343434'><td >$i1</td ><td >$i2</td ><td >$i3</td ><td >$i4</td ><td >$i5</td ></tr >";
	
	$consu3=consulta(clientes,$conexion,"","",Nombre_Cl,1,$phpv);
	mysql_da_se($consu3,0,$phpv);
	while($dato=mysql_fe_ar($consu3,$phpv)){
			echo'<tr bgcolor="#676767">';
			echo'<td >'.$d=input2(submit,opciones3,'Ver Mas Opciones '.$dato[Nombre_Cl],$dato[Nombre_Cl],'width: 250px; text-align: left;').'</td >';
			echo'<td >'.$d=input2(button,'',''				,$dato[Fecha_re]).'</td >';
			echo'<td >'.$d=input2(button,'',$dato[Destino]	,$dato[Destino]).'</td >';
			echo'<td >'.$d=input2(button,'',''				,$dato[N_fact]).'</td >';
			echo'</tr >';
	}
	echo'</table >';
	echo'</div >';
}
?>
