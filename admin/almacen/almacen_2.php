<?php //php5 php7
	$style="width: 120px; height: 300px; background: #000000b3; position: absolute; top: 50px;";
	$name=menu1;
	$v1=Productos;
	$v2=Proveedores;
	$v3=Index;
	$v4="clientes empre";
	echo menu($style,$libre,$name,$v1,$v2,$v3,$v4,$v5,$v6,$v7,$v8,$v9,$v10);
	
	if($_POST[$name]==$v1){
		$style="";
		$libre="id='Conte-pri'";
		$title1="db: almacen/folio";
		$array=Mysql_tablas::Tabla_info(almacen,folio);
		$array_text	=	$array[text];
		$array_mysql=	$array[mysql];
		$array_type	=	$array[type];
		$array_id	=	$array[id];
		$array_class=	$array[clas];
		$array_valida=	$array[valid];
		$base		=	almacen;
		$tabla		=	folio;
		$conte="";
		$conte=$conte.	Mysql_tablas::Update	($base,$tabla,$array_mysql,$conexion,$phpv);
		$conte=$conte.	Mysql_tablas::Delete	($base,$tabla,$array_mysql,$conexion,$phpv);
		$conte=$conte.	objeto::Conte_Consola	($base,$tabla,$conexion,$phpv										,$array_text,$array_mysql,$array_type,$array_name,$array_title,$array_value,$array_style,$array_id,$array_libre,$array_class,$array_valida);
		$conte=$conte.	objeto::Conte_Info		($base,$tabla,$conexion,$phpv,$size,$style,$title,$id,$libre,$class	,$array_text,$array_mysql,$array_type,$array_name,$array_title,$array_value,$array_style,$array_id,$array_libre,$array_class,$array_valida);
		$conte=$conte.	objeto::Conte_Opera		($base,$tabla,$conexion,$phpv										,$array_text,$array_mysql,$array_type,$array_name,$array_title,$array_value,$array_style,$array_id,$array_libre,$array_class,$array_valida);
		/**/$conte=$conte.	objeto::Conte_Consu		($base,$tabla,$conexion,$phpv										,$array_text,$array_mysql,$array_type,$array_name,$array_title,$array_value,$array_style,$array_id,$array_libre,$array_class,$array_valida);
		$conte=$conte.	Mysql_tablas::Insert 	($base,$tabla,$array_mysql,$conexion,$phpv);
		echo 			objeto::Conte_Centro	($style,$libre,$conte);
	}
	if($_POST[$name]==$v2){
		$style="";
		$libre="id='Conte-pri'";
		$title1="db: almacen/folio";
		$array=Mysql_tablas::Tabla_info(almacen,proveedores);
		$array_text	=	$array[text];
		$array_mysql=	$array[mysql];
		$array_type	=	$array[type];
		$array_id	=	$array[id];
		$array_class=	$array[clas];
		$array_valida=	$array[valid];
		$base		=	almacen;
		$tabla		=	proveedores;
		$conte="";
		$conte=$conte.	Mysql_tablas::Update	($base,$tabla,$array_mysql,$conexion,$phpv);
		$conte=$conte.	Mysql_tablas::Insert 	($base,$tabla,$array_mysql,$conexion,$phpv);
		$conte=$conte.	Mysql_tablas::Delete	($base,$tabla,$array_mysql,$conexion,$phpv);
		$conte=$conte.	objeto::Conte_Consola	($base,$tabla,$conexion,$phpv										,$array_text,$array_mysql,$array_type,$array_name,$array_title,$array_value,$array_style,$array_id,$array_libre,$array_class,$array_valida);
		$conte=$conte.	objeto::Conte_Info		($base,$tabla,$conexion,$phpv,$size,$style,$title,$id,$libre,$class	,$array_text,$array_mysql,$array_type,$array_name,$array_title,$array_value,$array_style,$array_id,$array_libre,$array_class,$array_valida);
		$conte=$conte.	objeto::Conte_Opera		($base,$tabla,$conexion,$phpv										,$array_text,$array_mysql,$array_type,$array_name,$array_title,$array_value,$array_style,$array_id,$array_libre,$array_class,$array_valida);
		$conte=$conte.	objeto::Conte_Consu		($base,$tabla,$conexion,$phpv										,$array_text,$array_mysql,$array_type,$array_name,$array_title,$array_value,$array_style,$array_id,$array_libre,$array_class,$array_valida);
		echo 			objeto::Conte_Centro	($style,$libre,$conte);
		//echo 			objeto::Despliege		();
	}
	if($_POST[$name]==$v3){
		$style="";
		$libre="id='Conte-pri'";
		$title1="db: empresa/folio";
		$array=Mysql_tablas::Tabla_info(empresa,folio);
		$array_text	=	$array[text];
		$array_mysql=	$array[mysql];
		$array_type	=	$array[type];
		$array_id	=	$array[id];
		$array_class=	$array[clas];
		$array_valida=	$array[valid];
		$base		=	empresa;
		$tabla		=	folio;
		$conte="";
		$conte=$conte.	Mysql_tablas::Update	($base,$tabla,$array_mysql,$conexion,$phpv);
		$conte=$conte.	Mysql_tablas::Insert 	($base,$tabla,$array_mysql,$conexion,$phpv);
		$conte=$conte.	Mysql_tablas::Delete	($base,$tabla,$array_mysql,$conexion,$phpv);
		$conte=$conte.	objeto::Conte_Consola	($base,$tabla,$conexion,$phpv										,$array_text,$array_mysql,$array_type,$array_name,$array_title,$array_value,$array_style,$array_id,$array_libre,$array_class,$array_valida);
		$conte=$conte.	objeto::Conte_Info		($base,$tabla,$conexion,$phpv,$size,$style,$title,$id,$libre,$class	,$array_text,$array_mysql,$array_type,$array_name,$array_title,$array_value,$array_style,$array_id,$array_libre,$array_class,$array_valida);
		$conte=$conte.	objeto::Conte_Opera		($base,$tabla,$conexion,$phpv										,$array_text,$array_mysql,$array_type,$array_name,$array_title,$array_value,$array_style,$array_id,$array_libre,$array_class,$array_valida);
		$conte=$conte.	objeto::Conte_Consu		($base,$tabla,$conexion,$phpv										,$array_text,$array_mysql,$array_type,$array_name,$array_title,$array_value,$array_style,$array_id,$array_libre,$array_class,$array_valida);
		echo 			objeto::Conte_Centro	($style,$libre,$conte);
		//echo 			objeto::Despliege		();
	}
	if($_POST[$name]==$v4){
		
		$style="";
		$libre="id='Conte-pri'";
		$title1="db: Empresa/Clientes";
		$array=Mysql_tablas::Tabla_info(empresa,clientes2);
		$array_text	=	$array[text];
		$array_mysql=	$array[mysql];
		$array_type	=	$array[type];
		$array_id	=	$array[id];
		$array_class=	$array[clas];
		$array_valida=	$array[valid];
		$base		=	empresa;
		$tabla		=	clientes2;
		$conte="";
		$conte=$conte.	Mysql_tablas::Update	($base,$tabla,$array_mysql,$conexion,$phpv);
		$conte=$conte.	Mysql_tablas::Delete	($base,$tabla,$array_mysql,$conexion,$phpv);
		$conte=$conte.	objeto::Conte_Consola	($base,$tabla,$conexion,$phpv										,$array_text,$array_mysql,$array_type,$array_name,$array_title,$array_value,$array_style,$array_id,$array_libre,$array_class,$array_valida);
		$conte=$conte.	objeto::Conte_Info		($base,$tabla,$conexion,$phpv,$size,$style,$title,$id,$libre,$class	,$array_text,$array_mysql,$array_type,$array_name,$array_title,$array_value,$array_style,$array_id,$array_libre,$array_class,$array_valida);
		$conte=$conte.	objeto::Conte_Opera		($base,$tabla,$conexion,$phpv										,$array_text,$array_mysql,$array_type,$array_name,$array_title,$array_value,$array_style,$array_id,$array_libre,$array_class,$array_valida);
		/**/$conte=$conte.	objeto::Conte_Consu	($base,$tabla,$conexion,$phpv										,$array_text,$array_mysql,$array_type,$array_name,$array_title,$array_value,$array_style,$array_id,$array_libre,$array_class,$array_valida);
		//$conte=$conte.	Mysql_tablas::Insert 	($base,$tabla,$array_mysql,$conexion,$phpv);
		echo 			objeto::Conte_Centro	($style,$libre,$conte);
	}

	$libre_almacen=true;

?>