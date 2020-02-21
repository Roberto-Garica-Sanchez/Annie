<?php 

include("../libre_v1.php");	if($libre_v1=="")		{echo"<script>alert('[libre_v1] no localizado');</script>";}
include("../libre_v2.php");	if($libre_v2=="")		{echo"<script>alert('[libre_v2] no localizado');</script>";}



echo"<div style='position: relative;overflow: hidden;top: 45px;min-width: 1045px;width: 1250px;height: 600px;background: #3b5b8c;margin-right: auto;margin-left: auto;'>";

echo libre_v2::input2(button,'',$title,X,'','','','','disabled');
echo libre_v2::input2(text,x,$title,$_POST[x],'',x,'onkeypress="return valida_n(event)"','');
echo"<br>";
echo libre_v2::input2(button,'',$title,N,'','','','','disabled');
echo libre_v2::input2(text,n,$title,$_POST[n],'',n,'onkeypress="return valida_n(event)"','');
if($_POST[n]<>''){
	echo"<br>";
	for($x=0; $x<=$_POST[n]; $x++){
		
		echo libre_v2::input2(button,'',$title,"N".$x,'','','','');
		echo libre_v2::input2(text,"x".$x,$title,$_POST["x".$x],'',"n".$x,'onkeypress="return valida_n(event)"','');
		echo"<br>";
	}
	//for($y=0; $y<$_POST[n]; $y++){
	echo"(";
		$total="";
		echo"(";
		for($x=0; $x<$_POST[n]; $x++){
			$z=$x+1;
			$c=$x-1;
			$namea="x".$z;
			$total=$total."(x-$namea)";
			//$total=($_POST[x]-$_POST[$namea]);
			if(($c<=0)&&($x<$_POST[n])){$total=$total."*";}
		}
		echo$total;
		echo")";
		//---------------
		$total="";
		echo"/";
		echo"(";
		for($x=0; $x<$_POST[n]; $x++){
			$z=$x+1;
			$c=$x-1;
			$namea="x".$z;
			$total=$total."($c-$namea)";
			//$total=($_POST[x]-$_POST[$namea]);
			if(($c<=0)&&($x<$_POST[n])){$total=$total."*";}
		}
		echo$total;
		echo")";
	echo")";
	//}
	/*
	for($x=0; $x<$_POST[n]; $x++){
		$c=$x-1;
		//$name="L"+$x;
		$name="x".$x;
		$nameb="x".$c;
		//$x_auto=$_POST[]
		
		for($y=0; $y<$_POST[n]; $y++){
			$z=$y+1;
			$namea="x".$z;
			if($c<>$_POST[n]){
				//echo"((x-$namea)/($nameb-$namea))";
				//echo"<br>";				
			}
		}	
		echo"<br>";
		
	}*/
}
echo"</div>";
?>