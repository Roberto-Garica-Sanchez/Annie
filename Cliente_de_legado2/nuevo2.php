<?php

include("../admin2/libre_v1.php");			 if($libre_v1=="")		{echo"<script>alert('[libre_v1] no localizado');</script>";}
include("../admin2/parche1.php");				if($parche1=="")	{echo"<script>alert('[parche1] no localizado');</script>";}

echo $parche1_config;
echo info		('',$conexion,$phpv);
echo general	('left: 110px;',$conexion,$phpv,$cuenta);
echo calculadora($conexion,$phpv,$cuenta);
echo arrastrados('left: 740px; ',$conexion,$phpv,$cuenta);
echo ventana	(Consola,min);	
echo operadores('left: 740px; ');
?>