<?php 
//comprobadores
$guarda=1;
$consu		= libre_v1::consulta			(folio,$conexion	,ID_G,$_POST[Carta1],'',''	,$phpv,'');
$compro		= libre_v1::mysql_fe_ar			($consu,$phpv);
$D=$_POST[D];
$M=$_POST[M];
$A=$_POST[A];
$D_r=$_POST[D_r];
$M_r=$_POST[M_r];
$A_r=$_POST[A_r];
if($_POST[cliente]=="cliente")	{$guarda=0;$presenta=$presenta."<br>Falta selecionar 'Cliente' ";}
if($_POST[chofer]=="chofer")	{$guarda=0;$presenta=$presenta."<br>Falta selecionar 'Operador' ";}
if($_POST[placas]=="placas")	{$guarda=0;$presenta=$presenta."<br>Falta selecionar 'Unidad' ";}
if($_POST[Carta1]=="")			{$guarda=0;$presenta=$presenta."<br>Falta de ingresar 'Folio 1' ";}
if($_POST[km_i]=="")			{$guarda=0;$presenta=$presenta."<br>Falta de ingresar 'Kilometraje Inicial' ";}
if($_POST[km_f]=="")			{$guarda=0;$presenta=$presenta."<br>Falta de ingresar 'Kilometraje Final' ";}
if($D=="")						{$guarda=0;$presenta=$presenta."<br>Falta de ingresar 'Dia de Salida' ";}
if($M=="")						{$guarda=0;$presenta=$presenta."<br>Falta de ingresar 'Mes De Salida' ";}
if($A=="")						{$guarda=0;$presenta=$presenta."<br>Falta de ingresar 'Año De Salida' ";}
if($D_r=="")					{$guarda=0;$presenta=$presenta."<br>Falta de ingresar 'Dia de Llegada' ";}
if($M_r=="")					{$guarda=0;$presenta=$presenta."<br>Falta de ingresar 'Mes De Llegada' ";}
if($A_r=="")					{$guarda=0;$presenta=$presenta."<br>Falta de ingresar 'Año De Llegada' ";}
if($compro[ID_G]<>"")			{$guarda=0;$presenta="<h3>Cuentas existente en el Sistemas 'Folio 1'</h3>".$presenta;}
//Fechas
if(($D<1)	or($D>31))			{$guarda=0;$presenta=$presenta."<br>Error En 'Dia Salida'";}
if(($D_r<1)	or($D_r>31))		{$guarda=0;$presenta=$presenta."<br>Error En 'Dia Llegada'";}
if(($M<1)	or($M>12))			{$guarda=0;$presenta=$presenta."<br>Error En 'Mes Salida'";}
if(($M_r<1)	or($M_r>12))		{$guarda=0;$presenta=$presenta."<br>Error En 'Mes Llegada'";}
if(($A<2015)	or($A>2030))	{$guarda=0;$presenta=$presenta."<br>Error En 'Año Salida'";}
if(($A_r<2015)	or($A_r>2030))	{$guarda=0;$presenta=$presenta."<br>Error En 'Año Llegada'";}

if(($guarda==0)and($_POST[operadores]==Guardar))			{$_POST[operadores]="";$_POST[conso]=Abrir;$presenta="<h3>La Cuenta No Puede Ser Guardada Por Los Siguente Problemas</h3>".$presenta;}

if($_POST[Carta_arr]<>"")	{//arrarstrar cuenta
	$consu24	= 	libre_v1::consulta(abo_acu,$conexion	,ID_G,$_POST[Carta_arr],'',''	,$phpv,'1');
	$dato		= 	libre_v1::mysql_fe_ar	($consu24,$phpv);
	if ($dato[add_en]<>""){$presenta=$presenta.$report_arr="<a>No Es Posible Incluir <br>Esta Cuentas Ya Se Encuentra Incluirada<a>";$_POST[conso]=Abrir;}
	if ($dato[add_en]==""){
		$add_in="";
		$add_ya="";
		for($x=1; $x<6; $x++){
			$name1="ID_ac".$x;
			if(($add_ya=="")&&($_POST[$name1]==$_POST[Carta_arr])){$add_ya=1;}
			if(($_POST[$name1]=="")&&($add_in=="")&&($add_ya=="")){$add_in=$name1;}
		}
		if($add_in<>""){$_POST[$add_in]=$dato[ID_G];$report_arr="Cuentas Incluidad";}
		if($add_in==""){$presenta=$presenta.$report_arr="Cuentas ya Incluida"; $_POST[conso]=Abrir;}
	}
}
if($_POST[Delete_Arr]<>"")	{//eliminar una cuenta arrastrada
	for($x=1; $x<6; $x++){
		$name1="ID_ac".$x;
		$name2="ac".$x;
		if($_POST[$name1]==$_POST[Delete_Arr]){
			$_POST[$name1]="";
			$_POST[$name2]="";
		}
		
	}
}
//consulta numero de cuenta 	
	$consu0		= libre_v1::consulta			(choferes,$conexion	,Nombre_Ch,$_POST[chofer],'',''	,$phpv,'');
	$choferes	= libre_v1::mysql_fe_ar			($consu0,$phpv);
	$n_c		= $choferes[N_fact]+1;
	if(($_POST[operadores]==Guardar)and($guarda==0)){$presenta="<H2>Ingrese Los datos Faltantes</H2>".$presenta;$_POST[conso]=Abrir;}
	if(($_POST[operadores]==Guardar)and($guarda==1)){//Guarda informacion y cambiar a modo bloqueo
		
		$_POST[operadores]='';
		$_POST[conso]=Abrir;
		if($compro[ID_G]==""){
		$db=empresa;
		$tb=folio;
		$array=tablas_v1::info($db,$tb);
		$guarda=$res=mysql_v1::insert($array,$conexion,$phpv);
		//libre_v1::ejecuta			($conexion,$res,$phpv);
		
		$tb=fletes;
		$array=tablas_v1::info($db,$tb);
		$guarda=$guarda."<br>".$res=mysql_v1::insert($array,$conexion,$phpv);
		//libre_v1::ejecuta			($conexion,$res,$phpv);
		
		$tb=viaticos;
		$array=tablas_v1::info($db,$tb);
		$guarda=$guarda."<br>".$res=mysql_v1::insert($array,$conexion,$phpv);
		//libre_v1::ejecuta			($conexion,$res,$phpv);
		
		$tb=disel;
		$array=tablas_v1::info($db,$tb);
		$guarda=$guarda."<br>".$res=mysql_v1::insert($array,$conexion,$phpv);
		//libre_v1::ejecuta			($conexion,$res,$phpv);
		
		$tb=casetas;
		$array=tablas_v1::info($db,$tb);
		$guarda=$guarda."<br>".$res=mysql_v1::insert($array,$conexion,$phpv);
		//libre_v1::ejecuta			($conexion,$res,$phpv);
		
		$tb=facturas;
		$array=tablas_v1::info($db,$tb);
		$guarda=$guarda."<br>".$res=mysql_v1::insert($array,$conexion,$phpv);
		//libre_v1::ejecuta			($conexion,$res,$phpv);
		
		$tb=ryr;
		$array=tablas_v1::info($db,$tb);
		$guarda=$guarda."<br>".$res=mysql_v1::insert($array,$conexion,$phpv);
		//libre_v1::ejecuta			($conexion,$res,$phpv);
		
		$tb=guias;
		$array=tablas_v1::info($db,$tb);
		$guarda=$guarda."<br>".$res=mysql_v1::insert($array,$conexion,$phpv);
		//libre_v1::ejecuta			($conexion,$res,$phpv);
		
		$tb=maniobras;
		$array=tablas_v1::info($db,$tb);
		$guarda=$guarda."<br>".$res=mysql_v1::insert($array,$conexion,$phpv);
		//libre_v1::ejecuta			($conexion,$res,$phpv);
		
		$tb=fletes_c;
		$array=tablas_v1::info($db,$tb);
		$guarda=$guarda."<br>".$res=mysql_v1::insert($array,$conexion,$phpv);
		//libre_v1::ejecuta			($conexion,$res,$phpv);
		
		$tb=viaticos_c;
		$array=tablas_v1::info($db,$tb);
		$guarda=$guarda."<br>".$res=mysql_v1::insert($array,$conexion,$phpv);
		//libre_v1::ejecuta			($conexion,$res,$phpv);
		
		$tb=disel_c;
		$array=tablas_v1::info($db,$tb);
		$guarda=$guarda."<br>".$res=mysql_v1::insert($array,$conexion,$phpv);
		//libre_v1::ejecuta			($conexion,$res,$phpv);
		
		$tb=casetas_c;
		$array=tablas_v1::info($db,$tb);
		$guarda=$guarda."<br>".$res=mysql_v1::insert($array,$conexion,$phpv);
		//libre_v1::ejecuta			($conexion,$res,$phpv);
		
		$tb=facturas_c;
		$array=tablas_v1::info($db,$tb);
		$guarda=$guarda."<br>".$res=mysql_v1::insert($array,$conexion,$phpv);
		//libre_v1::ejecuta			($conexion,$res,$phpv);
		
		$tb=ryr_c;
		$array=tablas_v1::info($db,$tb);
		$guarda=$guarda."<br>".$res=mysql_v1::insert($array,$conexion,$phpv);
		//libre_v1::ejecuta			($conexion,$res,$phpv);
		
		$tb=guias_c;
		$array=tablas_v1::info($db,$tb);
		$guarda=$guarda."<br>".$res=mysql_v1::insert($array,$conexion,$phpv);
		//libre_v1::ejecuta			($conexion,$res,$phpv);
		
		$tb=maniobras_c;
		$array=tablas_v1::info($db,$tb);
		$guarda=$guarda."<br>".$res=mysql_v1::insert($array,$conexion,$phpv);
		//libre_v1::ejecuta			($conexion,$res,$phpv);
		
		$tb=abo_acu;
		$array=tablas_v1::info($db,$tb);
		$guarda=$guarda."<br>".$res=mysql_v1::insert($array,$conexion,$phpv);
		//libre_v1::ejecuta			($conexion,$res,$phpv);
		
		$tb=fechas;
		$array=tablas_v1::info($db,$tb);
		$guarda=$guarda."<br>".$res=mysql_v1::insert($array,$conexion,$phpv);
		//libre_v1::ejecuta			($conexion,$res,$phpv);
		
		$tb=km;
		$array=tablas_v1::info($db,$tb);
		$guarda=$guarda."<br>".$res=mysql_v1::insert($array,$conexion,$phpv);
		//libre_v1::ejecuta			($conexion,$res,$phpv);
		
		$tb=casetas_via;
		$array=tablas_v1::info($db,$tb);
		$presenta=$presenta."<br>".$res=mysql_v1::insert($array,$conexion,$phpv);
		//libre_v1::ejecuta			($conexion,$res,$phpv);
		
		$tb=casetas_c_via;
		$array=tablas_v1::info($db,$tb);
		$presenta=$presenta."<br>".$res=mysql_v1::insert($array,$conexion,$phpv);
		//libre_v1::ejecuta			($conexion,$res,$phpv);
		
		$tb=update1;
		$array=tablas_v1::info($db,$tb);
		$presenta=$presenta."<br>".$res=mysql_v1::insert($array,$conexion,$phpv);
		//libre_v1::ejecuta			($conexion,$res,$phpv);
		
		$presenta=$presenta."<h2>La informacion Fue Guardada </h2>".$guarda;		
		}
	}

	//$db=empresa;
		
	// Botones de operaciones 
	if(($_POST[CambRevi]=="")or($_POST[CambRevi]==0))	{$estatus="Pendiente";	$_POST[CambRevi]=0;}
	if ($_POST[CambRevi]==1)							{$estatus="Revisado";	}
	$opera=$opera.libre_v1::input2(hidden,operadores,'',$_POST[operadores]	,"position: relative; overflow: right;");
	$opera=$opera.libre_v1::input2(hidden,CambRevi	,'',$_POST[CambRevi]	,"position: relative; overflow: right;");
	$opera=$opera.libre_v1::input2(submit,operadores,'',Guardar				,"position: relative; overflow: right;");
	$opera=$opera.libre_v1::input2(submit,operadores,'',Modificar			,"position: relative; overflow: right;");
	$opera=$opera.libre_v1::input2(submit,operadores,'',Eliminar			,"position: relative; overflow: right;");
	$opera=$opera.libre_v1::input2(submit,operadores,'',$estatus			,"position: relative; overflow: right;");
	$style1="width: 405px; height: 45px; background: rgba(5, 72, 108, 0.67); position: relative; float: right;" ;
	$botones=libre_v1::windows			(Opciones,$style1,$style2,$opera);


//Crea la ventana de la consola 
	$conso=$conso.libre_v1::input2(hidden		,conso,'',$_POST[conso],"position: absolute; top: 10px;  right: 120px;");
	if($_POST[conso]==Abrir)							{$conso=$conso.libre_v1::input2(submit	,conso,'',Cerrar," position: absolute;  top: 10px; right: 10px;");}
	if(($_POST[conso]==Cerrar)or($_POST[conso]==""))	{$conso=$conso.libre_v1::input2(submit	,conso,'',Abrir," position: absolute;  top: 10px; right: 10px;");}
	$conso = $conso.	"<label style=' position: absolute; top: 10px; left: 10px; color: white;'>Consola De Registros</label>";
	$style = 			"background: white; position: absolute; top: 40px; bottom: 10px; left: 10px; right: 10px; overflow: auto; color: black; font-size: 12px;";
	$conso = $conso.libre_v1::div($style,'',$presenta);	//Cuadro de informacion
	if($_POST[conso]==Abrir)							{$style="background: rgba(2, 17, 25, 0.86); position: absolute; top: 290px; left: 750px; bottom: 0px; right: 0px;"; }
	if(($_POST[conso]==Cerrar)or($_POST[conso]==""))	{$style="background:  rgba(2, 17, 25, 0.86); position: absolute; bottom: 0px; right: 0px; width: 300px; height: 40px;";}
$consola=$consola.libre_v1::div($style,'',$conso);


$operadores=array(
	"botones" => $botones,
	"consola" => $consola
);

?>