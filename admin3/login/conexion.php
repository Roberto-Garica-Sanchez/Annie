<?php
error_reporting(0);
ini_set( 'display_errors', false );
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE );
date_default_timezone_set("Mexico/General");
if($index<>1)$ruta="../";
include($ruta."libre_uni.php");
if($libre_uni==""){echo"<script>alert('libre_uni no localizado');</script>";}
$user=$_POST[usuario];
$pass=$_POST[contra];
$conexion=login				(localhost,root,root,'',$phpv);
$operacion=$_POST[operacion];
if($operacion==login){
	db(login,$conexion,$phpv);
	$consu=consulta			(usuarios,$conexion,'','','','',$phpv);
	mysql_da_se				($consu,0,$phpv);
	while($dato=mysql_fe_ar	($consu,$phpv)			){
		if(($dato[nombre]==$_POST[user])and($dato[clave]==$_POST[pass])){
			
		}
	}
	mysql_cl				($conexion,$phpv);
}
?>