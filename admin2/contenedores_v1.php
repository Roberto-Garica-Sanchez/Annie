<?php 
$contenedores_v1=1;
include("libre_v1.php");				if($libre_v1=="")		{echo"<script>alert('[libre_v1] no localizado');</script>";}
echo"<LINK REL='STYLESHEET' HREF='contenedores_v1.css' />";

echo libre_v1::div("","id='style_co_top'"	,$style_co_top);
echo libre_v1::div("","id='style_co_centro'",$style_co_centro);
//echo libre_v1::div("","id='style_co_left'"	,$menu_left);
?>