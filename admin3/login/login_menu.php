<?php
error_reporting(0);
ini_set( 'display_errors', false );
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE );
date_default_timezone_set("Mexico/General");
if($index<>1)$ruta="../";
include($ruta."libre_uni.php");
if($libre_uni==""){echo"<script>alert('libre_uni no localizado');</script>";}
$login_menu=" ";

if($index<>1)echo div(" ","id='login'",$login_menu);
?>