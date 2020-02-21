
<?php //php7
	/*
	------------function requeridas[Libreria/funcion(s)]
	--> "libre_uni.php"
	*/
	/*		
	error_reporting(0);
	ini_set('display_errors',false);
	error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE );
	date_default_timezone_set("Mexico/General");
	*/
	$phpv=php7;//vercion de php con que estara trabajando 
	$uno_para_todos=1;
	//$ruta="../";
	include($ruta."libre_uni.php");
	if ($libre==''){echo"Error de Carga 'libre_uni'";}$libre='';	
	include($ruta."login/login.php");
	if ($libre==''){echo"Error de Carga 'login'";}$libre='';
	
?>