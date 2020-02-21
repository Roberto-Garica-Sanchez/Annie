<?php

include("../libre_v1.php");	
include("../libre_v2.php");	
if($libre_v1=="")		{echo"<script>alert('[libre_v1] no localizado');</script>";}
if($libre_v2=="")		{echo"<script>alert('[libre_v2] no localizado');</script>";}

echo"<div id='Conte-pri'>";
	echo"<div style='    background: black;width: 225px;padding: 5px;'>";
		$style_all="text-align: center; margin: 0px .5px;";
		echo libre_v1::input2(text,'','','','width: 20px;'.$style_all,'',disabled);
		echo libre_v1::input2(text,'','',X,''.$style_all,'',disabled);
		echo libre_v1::input2(text,'','','F[X]',''.$style_all,'',disabled);
		echo "<br>";
		echo libre_v1::input2(text,'','','x',' width: 20px;'.$style_all,'',disabled);
		echo libre_v1::input2(text,'x',''	,$_POST[x],''.$style_all,'x','onkeypress="return valida_n(event,x0)"');
		echo libre_v1::input2(text,'fx',''	,'',''.$style_all,'fx','disabled');
		echo "<br>";
		echo libre_v1::input2(text,'','','x0',' width: 20px;'.$style_all,'',disabled);
		echo libre_v1::input2(text,'x0',''	,$_POST[x0],''.$style_all,'x0','onkeypress="return valida_n(event,fx0)"');
		echo libre_v1::input2(text,'fx0',''	,$_POST[fx0],''.$style_all,'fx0','onkeypress="return valida_n(event,x1)"');
		echo "<br>";
		echo libre_v1::input2(text,'','','x1',' width: 20px;'.$style_all,'',disabled);
		echo libre_v1::input2(text,'x1',''	,$_POST[x1],''.$style_all,'x1','onkeypress="return valida_n(event,fx1)"');
		echo libre_v1::input2(text,'fx1',''	,$_POST[fx1],''.$style_all,'fx1','onkeypress="return valida_n(event,x2)"');
		echo "<br>";
		echo libre_v1::input2(text,'','','x2',' width: 20px;'.$style_all,'',disabled);
		echo libre_v1::input2(text,'x2',''	,$_POST[x2],''.$style_all,'x2','onkeypress="return valida_n(event,fx2)"');
		echo libre_v1::input2(text,'fx2',''	,$_POST[fx2],''.$style_all,'fx2','onkeypress="return valida_n(event,x3)"');
		echo "<br>";
		echo libre_v1::input2(text,'','','x3',' width: 20px;'.$style_all,'',disabled);
		echo libre_v1::input2(text,'x3',''	,$_POST[x3],''.$style_all,'x3','onkeypress="return valida_n(event,fx3)"');
		echo libre_v1::input2(text,'fx3',''	,$_POST[fx3],''.$style_all,'fx3','onkeypress="return valida_n(event,x4)"');
		echo "<br>";
		echo libre_v1::input2(text,'','','x4',' width: 20px;'.$style_all,'',disabled);
		echo libre_v1::input2(text,'x4',''	,$_POST[x4],''.$style_all,'x4','onkeypress="return valida_n(event,fx4)"');
		echo libre_v1::input2(text,'fx4',''	,$_POST[fx4],''.$style_all,'fx4','onkeypress="return valida_n(event)"');
		echo "<br>";
	echo"</div>";
	echo"<br>";
	echo"<div style='background: black; color: white;'>";	
		$d1=($_POST[x]-$_POST[x1])/($_POST[x0]-$_POST[x1]);
		$d2=($_POST[x]-$_POST[x0])/($_POST[x1]-$_POST[x0]);
		
		echo "F[X1]=".$f1=($d1*$_POST[fx0])+($d2*$_POST[fx1]);		
	echo"</div>";
	echo"<div style='background: black; color: white;'>";	
		$d1=(($_POST[x]-$_POST[x1])*($_POST[x]-$_POST[x2]))
		/(($_POST[x0]-$_POST[x1])*($_POST[x0]-$_POST[x2]));
		
		$d2=(($_POST[x]-$_POST[x0])*($_POST[x]-$_POST[x2]))
		/(($_POST[x1]-$_POST[x0])*($_POST[x1]-$_POST[x2]));
		
		$d3=(($_POST[x]-$_POST[x0])*($_POST[x]-$_POST[x1]))
		/(($_POST[x2]-$_POST[x0])*($_POST[x2]-$_POST[x1]));
		
		echo "F[X3]=".$f2=($d1*$_POST[fx0])+($d2*$_POST[fx1])+($d3*$_POST[fx2]);		
	echo"</div>";
	
	
	
	echo"<div style='background: black; color: white;'>";	
		$d1=
		((
				($_POST[x]-$_POST[x1])*
				($_POST[x]-$_POST[x2])*
				($_POST[x]-$_POST[x3])
		)/(
				($_POST[x0]-$_POST[x1])*
				($_POST[x0]-$_POST[x2])*
				($_POST[x0]-$_POST[x3])
		) );
		
		$d2=
		((
				($_POST[x]-$_POST[x0])*
				($_POST[x]-$_POST[x2])*
				($_POST[x]-$_POST[x3])
		)/(
				($_POST[x1]-$_POST[x0])*
				($_POST[x1]-$_POST[x2])*
				($_POST[x1]-$_POST[x3])
		));
		
		$d3=
		((
				($_POST[x]-$_POST[x0])*
				($_POST[x]-$_POST[x1])*
				($_POST[x]-$_POST[x3])
		)/(
				($_POST[x2]-$_POST[x0])	*
				($_POST[x2]-$_POST[x1])*
				($_POST[x2]-$_POST[x3])
		));
		
		$d4=
		((
				($_POST[x]-$_POST[x0])*
				($_POST[x]-$_POST[x1])*
				($_POST[x]-$_POST[x2])
		)/(
				($_POST[x3]-$_POST[x0])*
				($_POST[x3]-$_POST[x1])*
				($_POST[x3]-$_POST[x2])
		));
		
		echo "F[X3]=".$f3=
		($d1*$_POST[fx0])+
		($d2*$_POST[fx1])+
		($d3*$_POST[fx2])+
		($d4*$_POST[fx3]);		
	echo"</div>";
	
	
	echo"<div style='background: black; color: white;'>";/*
		$d1=("
			(
					($_POST[x]-$_POST[x1])*
					($_POST[x]-$_POST[x2])*
					($_POST[x]-$_POST[x3])*
					($_POST[x]-$_POST[x4])
			)<br>/<br>(
					($_POST[x0]-$_POST[x1])*
					($_POST[x0]-$_POST[x2])*
					($_POST[x0]-$_POST[x3])*
					($_POST[x0]-$_POST[x4])
			)"
		);
			
		
		$d5="
		(<br>
			(
					($_POST[x]-$_POST[x0])*
					($_POST[x]-$_POST[x1])*
					($_POST[x]-$_POST[x2])*
					($_POST[x]-$_POST[x3])
			)<br>/<br>(
					($_POST[x4]-$_POST[x0])*
					($_POST[x4]-$_POST[x1])*
					($_POST[x4]-$_POST[x2])*
					($_POST[x4]-$_POST[x3])
			)
			<br>
		)";
		echo
		$f4="(
		($d1*$_POST[fx0])+
		($d2*$_POST[fx1])+
		($d3*$_POST[fx2])+
		($d4*$_POST[fx3])+
		($d5*$_POST[fx4]))=";
		echo*/
		
		//-----
		$d1=(
			(
					($_POST[x]-$_POST[x1])*
					($_POST[x]-$_POST[x2])*
					($_POST[x]-$_POST[x3])*
					($_POST[x]-$_POST[x4])
			)/(
					($_POST[x0]-$_POST[x1])*
					($_POST[x0]-$_POST[x2])*
					($_POST[x0]-$_POST[x3])*
					($_POST[x0]-$_POST[x4])
			)
		);
		
		$d2=
		(
			(
					($_POST[x]-$_POST[x0])*
					($_POST[x]-$_POST[x2])*
					($_POST[x]-$_POST[x3])*
					($_POST[x]-$_POST[x4])
			)/(
					($_POST[x1]-$_POST[x0])*
					($_POST[x1]-$_POST[x2])*
					($_POST[x1]-$_POST[x3])*
					($_POST[x1]-$_POST[x4])
			)
		);
		
		$d3=
		(
			(
					($_POST[x]-$_POST[x0])*
					($_POST[x]-$_POST[x1])*
					($_POST[x]-$_POST[x3])*
					($_POST[x]-$_POST[x4])
			)/(
					($_POST[x2]-$_POST[x0])*
					($_POST[x2]-$_POST[x1])*
					($_POST[x2]-$_POST[x3])*
					($_POST[x2]-$_POST[x4])
			
			)
		);
		
		$d4=
		(
			(
					($_POST[x]-$_POST[x0])*
					($_POST[x]-$_POST[x1])*
					($_POST[x]-$_POST[x2])*
					($_POST[x]-$_POST[x4])
			)/(
					($_POST[x3]-$_POST[x0])*
					($_POST[x3]-$_POST[x1])*
					($_POST[x3]-$_POST[x2])*
					($_POST[x3]-$_POST[x4])
			)
		);
		$d5=
		(
			(
					($_POST[x]-$_POST[x0])*
					($_POST[x]-$_POST[x1])*
					($_POST[x]-$_POST[x2])*
					($_POST[x]-$_POST[x3])
			)/(
					($_POST[x4]-$_POST[x0])*
					($_POST[x4]-$_POST[x1])*
					($_POST[x4]-$_POST[x2])*
					($_POST[x4]-$_POST[x3])
			)
		);
		
		echo "F[X4]=".$f4=(
			($d1*$_POST[fx0])+
			($d2*$_POST[fx1])+
			($d3*$_POST[fx2])+
			($d4*$_POST[fx3])+
			($d5*$_POST[fx4])
		);		
	echo"</div>";
	
echo "</div>";

?>



x=input('x: ');
x0=input('x0: ');
fx0=input('fx0: ');
x1=input('x1: ');
fx1=input('fx1: ');
x2=input('x2: ');
fx2=input('fx2: ');
x3=input('x3: ');
fx3=input('fx3: ');
x4=input('x4: ');
fx4=input('fx4: ');