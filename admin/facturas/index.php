<html>
	<head>
		<title>Carga de archivos</title>
		<META CHARSET="UTF-8"/>
		<LINK REL="STYLESHEET" HREF="estilo.css"        TYPE="TEXT/CSS"/>
	</head>
	<body>
	<?php
	/*
		error_reporting(0);
		ini_set( 'display_errors', false );
		error_reporting(E_ERROR | E_WARNING | E_PARSE );
		date_default_timezone_set("Mexico/General");
		*/
		include('libre_fact.php');
	?>
	<form action="" method="post" enctype="multipart/form-data">
	<?php
		  echo$me1=input(hidden,user,$_POST[user]);
		  echo$me2=input(hidden,pass,$_POST[pass]);
		  if(($_POST[user]<>'') and($_POST[pass]<>'')){
  		    echo$me1;
  		    echo$me2; 
		    $conexion=login('localhost',$_POST[user],$_POST[pass]);
         }
            
		if ($conexion=='')include("login.php");
        if ($conexion<>''){
            include("cargador.php");
        }
	?>
	</form>
	</body>
</html>
<?php
function login($host,$user,$pass){
        $conexion=mysql_connect($host,$user,$pass)or die("Problema Para Iniciar Secion");
        return $conexion;
}
?>