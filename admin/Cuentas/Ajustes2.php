<?php //php5 php7
	$style="width: 100px; height: 200px; background: #000000b3; position: absolute; top: 280px;";
	$name=menu1;
	$v1=Clientes;
	$v2=Choferes;
	$v3=Unidades;
	$v4="";
	$v5="";
	$v6="";
	$v7="";
	if($_POST[$name]=="")$_POST[$name]=$v2;
	echo menu($style,$libre,$name,$v1,$v2,$v3,$v4,$v5,$v6,$v7,$v8,$v9,$v10);
	if($_POST[$name]==$v1){//clietnes
		
		$style="";
		$libre="id='Conte-pri'";
		$title="db: Empresa/Clientes";
		$array=Mysql_tablas::Tabla_info(empresa,clientes2);
		$array_text	=	$array[text];
		$array_mysql=	$array[mysql];
		$array_type	=	$array[type];
		$array_id	=	$array[id];
		$array_class=	$array[clas];
		$array_valida=	$array[valid];
		$base		=	empresa;
		$tabla		=	clientes;
		$conte="";
		$conte=$conte.	Mysql_tablas::Update	($base,$tabla,$array_mysql,$conexion,$phpv);
		$conte=$conte.	Mysql_tablas::Delete	($base,$tabla,$array_mysql,$conexion,$phpv);
		$conte=$conte.	objeto::Conte_Consola	($base,$tabla,$conexion,$phpv										,$array_text,$array_mysql,$array_type,$array_name,$array_title,$array_value,$array_style,$array_id,$array_libre,$array_class,$array_valida);
		$conte=$conte.	objeto::Conte_Info		($base,$tabla,$conexion,$phpv,$size,$style,$title,$id,$libre,$class	,$array_text,$array_mysql,$array_type,$array_name,$array_title,$array_value,$array_style,$array_id,$array_libre,$array_class,$array_valida);
		$conte=$conte.	objeto::Conte_Opera		($base,$tabla,$conexion,$phpv										,$array_text,$array_mysql,$array_type,$array_name,$array_title,$array_value,$array_style,$array_id,$array_libre,$array_class,$array_valida);
		$conte=$conte.	objeto::Conte_Consu		($base,$tabla,$conexion,$phpv										,$array_text,$array_mysql,$array_type,$array_name,$array_title,$array_value,$array_style,$array_id,$array_libre,$array_class,$array_valida);
		$conte=$conte.	Mysql_tablas::Insert 	($base,$tabla,$array_mysql,$conexion,$phpv);

		echo 			objeto::Conte_Centro	($style,$libre,$conte);
		
	}
	if($_POST[$name]==$v2){//choferes			->nuevo kernel<-
		
		$style="";
		$libre="id='Conte-pri'";
		$title="Db: Empresa/Choferes";
		$base		=	empresa;
		$tabla		=	choferes;
		$array=Mysql_tablas::Tabla_info($base,$tabla);
		$array_text	=	$array[text];
		$array_mysql=	$array[mysql];
		$array_type	=	$array[type];
		$array_id	=	$array[id];
		$array_class=	$array[clas];
		$array_valida=	$array[valid];
		$conte="";
		$conte=$conte.	Mysql_tablas::Update	($base,$tabla,$array_mysql,$conexion,$phpv);
		$conte=$conte.	Mysql_tablas::Delete	($base,$tabla,$array_mysql,$conexion,$phpv);
		$conte=$conte.	objeto::Conte_Consola	($base,$tabla,$conexion,$phpv										,$array_text,$array_mysql,$array_type,$array_name,$array_title,$array_value,$array_style,$array_id,$array_libre,$array_class,$array_valida);
		$conte=$conte.	objeto::Conte_Info		($base,$tabla,$conexion,$phpv,$size,$style,$title,$id,$libre,$class	,$array_text,$array_mysql,$array_type,$array_name,$array_title,$array_value,$array_style,$array_id,$array_libre,$array_class,$array_valida);
		$conte=$conte.	objeto::Conte_Opera		($base,$tabla,$conexion,$phpv										,$array_text,$array_mysql,$array_type,$array_name,$array_title,$array_value,$array_style,$array_id,$array_libre,$array_class,$array_valida);
		$conte=$conte.	objeto::Conte_Consu		($base,$tabla,$conexion,$phpv										,$array_text,$array_mysql,$array_type,$array_name,$array_title,$array_value,$array_style,$array_id,$array_libre,$array_class,$array_valida);
		$conte=$conte.	Mysql_tablas::Insert 	($base,$tabla,$array_mysql,$conexion,$phpv);
		$conte=$conte.  objeto::Lista_mysql		($base,$tabla,$conexion,$phpv,$array,1,$style);
		echo 			objeto::Conte_Centro	($style,$libre,$conte);
		
	}
	if($_POST[$name]==$v3){//unidades
		
		$style="";
		$libre="id='Conte-pri'";
		$title1="db: Empresa/Clientes";
		$array=Mysql_tablas::Tabla_info(empresa,placas2);
		$array_text	=	$array[text];
		$array_mysql=	$array[mysql];
		$array_type	=	$array[type];
		$array_id	=	$array[id];
		$array_class=	$array[clas];
		$array_valida=	$array[valid];
		$base		=	empresa;
		$tabla		=	placas;
		$conte="";
		$conte=$conte.	Mysql_tablas::Update	($base,$tabla,$array_mysql,$conexion,$phpv);
		$conte=$conte.	Mysql_tablas::Delete	($base,$tabla,$array_mysql,$conexion,$phpv);
		$conte=$conte.	objeto::Conte_Consola	($base,$tabla,$conexion,$phpv										,$array_text,$array_mysql,$array_type,$array_name,$array_title,$array_value,$array_style,$array_id,$array_libre,$array_class,$array_valida);
		$conte=$conte.	objeto::Conte_Info		($base,$tabla,$conexion,$phpv,$size,$style,$title,$id,$libre,$class	,$array_text,$array_mysql,$array_type,$array_name,$array_title,$array_value,$array_style,$array_id,$array_libre,$array_class,$array_valida);
		$conte=$conte.	objeto::Conte_Opera		($base,$tabla,$conexion,$phpv										,$array_text,$array_mysql,$array_type,$array_name,$array_title,$array_value,$array_style,$array_id,$array_libre,$array_class,$array_valida);
		/**/$conte=$conte.	objeto::Conte_Consu	($base,$tabla,$conexion,$phpv										,$array_text,$array_mysql,$array_type,$array_name,$array_title,$array_value,$array_style,$array_id,$array_libre,$array_class,$array_valida);
		$conte=$conte.	Mysql_tablas::Insert 	($base,$tabla,$array_mysql,$conexion,$phpv);
		echo 			objeto::Conte_Centro	($style,$libre,$conte);
		
	}
	
$Ajustes=true;
?>
