<?php
echo"banco para el serial ";
//include "php_serial.class.php";

//exec("mode COM9 BAUD=9600 PARITY=N data=8 stop=1 xon=off");
$datos ='1';
$port =fopen("COM9", "w");// com7 Seria el Puerto USB

fwrite($port, $datos);
sleep(3); 
//fclose($port);
?>