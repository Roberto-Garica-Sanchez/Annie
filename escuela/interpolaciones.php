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
		echo libre_v1::input2(text,'fx2',''	,$_POST[fx2],''.$style_all,'fx2','onkeypress="return valida_n(event)"');
		echo "<br>";
	echo"</div>";
	echo"<div style='background: #247994;position: absolute;top: 0px;left: 273px;padding: 5px;'>";
		echo libre_v1::input2(text,'','','F1(X)'				,''.$style_all,'',disabled);
		echo libre_v1::input2(text,'','','='					,'width: 20px;'.$style_all,'',disabled);
		echo libre_v1::input2(text,'','','F(x0)'				,''.$style_all,'',disabled);
		echo libre_v1::input2(text,'','','+'					,'width: 20px;'.$style_all,'',disabled);
		echo libre_v1::input2(text,'','','F(x1)-F(x0)'			,''.$style_all,'',disabled);
		echo libre_v1::input2(text,'','','*'					,'width: 20px;'.$style_all,'',disabled);
		echo libre_v1::input2(text,'','','(x-x0)'			,''.$style_all,'',disabled);
		echo"<br>";
		echo libre_v1::input2(text,'','',''						,''.$style_all,'',disabled);
		echo libre_v1::input2(text,'','',''						,'width: 20px;'.$style_all,'',disabled);
		echo libre_v1::input2(text,'','',''						,''.$style_all,'',disabled);
		echo libre_v1::input2(text,'','',''						,'width: 20px;'.$style_all,'',disabled);
		echo libre_v1::input2(text,'','','x1-x0',''.$style_all	,'',disabled);
		echo libre_v1::input2(text,'','',''						,'width: 20px;'.$style_all,'',disabled);
		echo libre_v1::input2(text,'','',''						,''.$style_all,'',disabled);
		echo "<br>";
		echo "<br>";
		//-------------------
		echo libre_v1::input2(text,'','','F1(X)'					,''.$style_all,'',disabled);
		echo libre_v1::input2(text,'','','='						,'width: 20px;'.$style_all,'',disabled);
		echo libre_v1::input2(text,'','',$_POST[fx0]				,''.$style_all,'',disabled);
		echo libre_v1::input2(text,'','','+'						,'width: 20px;'.$style_all,'',disabled);
		echo libre_v1::input2(text,'','',"$_POST[fx1]-$_POST[fx0]"	,''.$style_all,'',disabled);
		echo libre_v1::input2(text,'','','*'						,'width: 20px;'.$style_all,'',disabled);
		echo libre_v1::input2(text,'','',"$_POST[x]-$_POST[x0]"		,''.$style_all,'',disabled);
		echo"<br>";
		echo libre_v1::input2(text,'','',''							,''.$style_all,'',disabled);
		echo libre_v1::input2(text,'','',''							,'width: 20px;'.$style_all,'',disabled);
		echo libre_v1::input2(text,'','',''							,''.$style_all,'',disabled);
		echo libre_v1::input2(text,'','',''							,'width: 20px;'.$style_all,'',disabled);
		echo libre_v1::input2(text,'','',"$_POST[x1]-$_POST[x0]"	,''.$style_all	,'',disabled);
		echo libre_v1::input2(text,'','',''							,'width: 20px;'.$style_all,'',disabled);
		echo libre_v1::input2(text,'','',''							,''.$style_all,'',disabled);
		echo "<br>";
		echo "<br>";
		//-------------------
		echo libre_v1::input2(text,'','','F1(X)'					,''.$style_all,'',disabled);
		echo libre_v1::input2(text,'','','='						,'width: 20px;'.$style_all,'',disabled);
		echo libre_v1::input2(text,'','',$_POST[fx0]				,''.$style_all,'',disabled);
		echo libre_v1::input2(text,'','','+'						,'width: 20px;'.$style_all,'',disabled);
		echo libre_v1::input2(text,'','',$_POST[fx1]-$_POST[fx0]	,''.$style_all,'',disabled);
		echo libre_v1::input2(text,'','','*'						,'width: 20px;'.$style_all,'',disabled);
		echo libre_v1::input2(text,'','',$_POST[x]-$_POST[x0]		,''.$style_all,'',disabled);
		
		echo"<br>";
		echo libre_v1::input2(text,'','',''							,''.$style_all,'',disabled);
		echo libre_v1::input2(text,'','',''							,'width: 20px;'.$style_all,'',disabled);
		echo libre_v1::input2(text,'','',''							,''.$style_all,'',disabled);
		echo libre_v1::input2(text,'','',''							,'width: 20px;'.$style_all,'',disabled);
		echo libre_v1::input2(text,'','',$_POST[x1]-$_POST[x0]		,''.$style_all	,'',disabled);
		echo libre_v1::input2(text,'','',''							,'width: 20px;'.$style_all,'',disabled);
		echo libre_v1::input2(text,'','',''							,''.$style_all,'',disabled);
		echo "<br>";
		echo "<br>";
		//-------------------
		echo libre_v1::input2(text,'','','F1(X)'					,''.$style_all,'',disabled);
		echo libre_v1::input2(text,'','','='						,'width: 20px;'.$style_all,'',disabled);
		echo libre_v1::input2(text,'','',$_POST[fx0]				,''.$style_all,'',disabled);
		echo libre_v1::input2(text,'','','+'						,'width: 20px;'.$style_all,'',disabled);
		echo libre_v1::input2(text,'','',($_POST[fx1]-$_POST[fx0])/($_POST[x1]-$_POST[x0])	,''.$style_all,'',disabled);
		echo libre_v1::input2(text,'','','*'						,'width: 20px;'.$style_all,'',disabled);
		echo libre_v1::input2(text,'','',$_POST[x]-$_POST[x0]		,''.$style_all,'',disabled);
		echo "<br>";
		echo "<br>";
		//-------------------
		echo libre_v1::input2(text,'','','F1(X)'					,''.$style_all,'',disabled);
		echo libre_v1::input2(text,'','','='						,'width: 20px;'.$style_all,'',disabled);
		echo libre_v1::input2(text,'','',$_POST[fx0]				,''.$style_all,'',disabled);
		echo libre_v1::input2(text,'','','+'						,'width: 20px;'.$style_all,'',disabled);
		echo libre_v1::input2(text,'','',(($_POST[fx1]-$_POST[fx0])/($_POST[x1]-$_POST[x0]))*($_POST[x]-$_POST[x0])	,''.$style_all,'',disabled);
		echo "<br>";
		echo "<br>";
		//-------------------
		echo libre_v1::input2(text,'','','F1(X)'					,''.$style_all,'',disabled);
		echo libre_v1::input2(text,'','','='						,'width: 20px;'.$style_all,'',disabled);
		echo libre_v1::input2(text,'','',$_POST[fx0]+(($_POST[fx1]-$_POST[fx0])/($_POST[x1]-$_POST[x0])*($_POST[x]-$_POST[x0]))	,'background: green;color: white;'.$style_all,'',disabled);
	echo"</div>";
	echo"<div style='    background: dodgerblue;width: 490px;overflow-x: hidden;overflow-y: auto;height: 600px;padding: 5px;position: absolute;top: 0px;right: 0px;'>";
	
		echo libre_v1::input2(text,'','','F1(X)'				,''.$style_all,'',disabled);
		echo libre_v1::input2(text,'','','='					,'width: 20px;'.$style_all,'',disabled);
		echo libre_v1::input2(text,'','','b0'					,''.$style_all,'',disabled);
		echo libre_v1::input2(text,'','','+'					,'width: 20px;'.$style_all,'',disabled);
		echo libre_v1::input2(text,'','','b1(x1-x0)'			,''.$style_all,'',disabled);
		echo libre_v1::input2(text,'','','+'					,'width: 20px;'.$style_all,'',disabled);
		echo libre_v1::input2(text,'','','b2(x-x0)(x-x1)'		,''.$style_all,'',disabled);
		echo "<br>";
		echo "<br>";
		//-------------------
		echo libre_v1::input2(text,'','','b0'					,''.$style_all,'',disabled);
		echo libre_v1::input2(text,'','','='					,'width: 20px;'.$style_all,'',disabled);
		echo libre_v1::input2(text,'','','F(x0)'					,''.$style_all,'',disabled);
		echo "<br>";
		echo "<br>";
		//-------------------
		echo libre_v1::input2(text,'','','b1'					,''.$style_all,'',disabled);
		echo libre_v1::input2(text,'','','='					,'width: 20px;'.$style_all,'',disabled);
		echo libre_v1::input2(text,'','','F(x1)-F(x0)'			,''.$style_all,'',disabled);
		echo "<br>";
		echo libre_v1::input2(text,'','',''						,''.$style_all,'',disabled);
		echo libre_v1::input2(text,'','',''						,'width: 20px;'.$style_all,'',disabled);
		echo libre_v1::input2(text,'','','x1-x0'				,''.$style_all,'',disabled);
		echo "<br>";
		echo "<br>";
		//-------------------
		echo libre_v1::input2(text,'','','b2'					,''.$style_all,'',disabled);
		echo libre_v1::input2(text,'','','='					,'width: 20px;'.$style_all,'',disabled);
		echo libre_v1::input2(text,'','','F(x2)-F(x1)'			,''.$style_all,'',disabled);
		echo libre_v1::input2(text,'','',''						,'width: 20px;'.$style_all,'',disabled);
		echo libre_v1::input2(text,'','','F(x1)-F(x0)'			,''.$style_all,'',disabled);
		echo "<br>";
		echo libre_v1::input2(text,'','',''						,''.$style_all,'',disabled);
		echo libre_v1::input2(text,'','',''						,'width: 20px;'.$style_all,'',disabled);
		echo libre_v1::input2(text,'','','/'					,''.$style_all,'',disabled);
		echo libre_v1::input2(text,'','','-'						,'width: 20px;'.$style_all,'',disabled);
		echo libre_v1::input2(text,'','','/'					,''.$style_all,'',disabled);
		echo "<br>";
		echo libre_v1::input2(text,'','',''						,''.$style_all,'',disabled);
		echo libre_v1::input2(text,'','',''						,'width: 20px;'.$style_all,'',disabled);
		echo libre_v1::input2(text,'','','x2-x1'				,''.$style_all,'',disabled);
		echo libre_v1::input2(text,'','',''						,'width: 20px;'.$style_all,'',disabled);
		echo libre_v1::input2(text,'','','x1-x0'				,''.$style_all,'',disabled);
		echo "<br>";
		echo libre_v1::input2(text,'','',''						,''.$style_all,'',disabled);
		echo libre_v1::input2(text,'','',''						,'width: 20px;'.$style_all,'',disabled);
		echo libre_v1::input2(text,'','','/'					,'width: 222px;'.$style_all,'',disabled);
		echo "<br>";
		echo libre_v1::input2(text,'','',''						,''.$style_all,'',disabled);
		echo libre_v1::input2(text,'','',''						,'width: 20px;'.$style_all,'',disabled);
		echo libre_v1::input2(text,'','','x2-x0'				,'width: 222px;'.$style_all,'',disabled);
		echo "<br>";
		echo "<br>";
		
		//-------------------
		echo libre_v1::input2(text,'','','b0'					,''.$style_all,'',disabled);
		echo libre_v1::input2(text,'','','='					,'width: 20px;'.$style_all,'',disabled);
		echo libre_v1::input2(text,'','',$_POST[fx0]					,''.$style_all,'',disabled);
		echo "<br>";
		echo "<br>";
		//-------------------
		echo libre_v1::input2(text,'','','b1'								,''.$style_all,'',disabled);
		echo libre_v1::input2(text,'','','='								,'width: 20px;'.$style_all,'',disabled);
		echo libre_v1::input2(text,'','',"$_POST[fx1]-$_POST[fx0]"			,''.$style_all,'',disabled);
		echo "<br>";
		echo libre_v1::input2(text,'','',''									,''.$style_all,'',disabled);
		echo libre_v1::input2(text,'','',''									,'width: 20px;'.$style_all,'',disabled);
		echo libre_v1::input2(text,'','',"$_POST[x1]-$_POST[x0]"			,''.$style_all,'',disabled);
		echo "<br>";
		echo "<br>";
		//-------------------
		echo libre_v1::input2(text,'','','b2'					,''.$style_all,'',disabled);
		echo libre_v1::input2(text,'','','='					,'width: 20px;'.$style_all,'',disabled);
		echo libre_v1::input2(text,'','',"$_POST[fx2]-$_POST[fx1]"			,''.$style_all,'',disabled);
		echo libre_v1::input2(text,'','',''						,'width: 20px;'.$style_all,'',disabled);
		echo libre_v1::input2(text,'','',"$_POST[fx1]-$_POST[fx0]"			,''.$style_all,'',disabled);
		echo "<br>";
		echo libre_v1::input2(text,'','',''						,''.$style_all,'',disabled);
		echo libre_v1::input2(text,'','',''						,'width: 20px;'.$style_all,'',disabled);
		echo libre_v1::input2(text,'','','/'					,''.$style_all,'',disabled);
		echo libre_v1::input2(text,'','','-'						,'width: 20px;'.$style_all,'',disabled);
		echo libre_v1::input2(text,'','','/'					,''.$style_all,'',disabled);
		echo "<br>";
		echo libre_v1::input2(text,'','',''						,''.$style_all,'',disabled);
		echo libre_v1::input2(text,'','',''						,'width: 20px;'.$style_all,'',disabled);
		echo libre_v1::input2(text,'','',"$_POST[x2]-$_POST[x1]"				,''.$style_all,'',disabled);
		echo libre_v1::input2(text,'','',''						,'width: 20px;'.$style_all,'',disabled);
		echo libre_v1::input2(text,'','',"$_POST[x1]-$_POST[x0]"				,''.$style_all,'',disabled);
		echo "<br>";
		echo libre_v1::input2(text,'','',''						,''.$style_all,'',disabled);
		echo libre_v1::input2(text,'','',''						,'width: 20px;'.$style_all,'',disabled);
		echo libre_v1::input2(text,'','','/'					,'width: 222px;'.$style_all,'',disabled);
		echo "<br>";
		echo libre_v1::input2(text,'','',''						,''.$style_all,'',disabled);
		echo libre_v1::input2(text,'','',''						,'width: 20px;'.$style_all,'',disabled);
		echo libre_v1::input2(text,'','',"$_POST[x2]-$_POST[x0]"				,'width: 222px;'.$style_all,'',disabled);
		echo "<br>";
		echo "<br>";
		//-------------------
		echo libre_v1::input2(text,'','','b0'					,''.$style_all,'',disabled);
		echo libre_v1::input2(text,'','','='					,'width: 20px;'.$style_all,'',disabled);
		echo libre_v1::input2(text,'','',$_POST[fx0]					,''.$style_all,'',disabled);
		echo "<br>";
		echo "<br>";
		//-------------------
		echo libre_v1::input2(text,'','','b1'								,''.$style_all,'',disabled);
		echo libre_v1::input2(text,'','','='								,'width: 20px;'.$style_all,'',disabled);
		echo libre_v1::input2(text,'','',($_POST[fx1]-$_POST[fx0])/($_POST[x1]-$_POST[x0])			,''.$style_all,'',disabled);
		echo "<br>";
		echo "<br>";
		//-------------------
		echo libre_v1::input2(text,'','','b2'					,''.$style_all,'',disabled);
		echo libre_v1::input2(text,'','','='					,'width: 20px;'.$style_all,'',disabled);
		echo libre_v1::input2(text,'','',((($_POST[fx2]-$_POST[fx1])/($_POST[x2]-$_POST[x1])-($_POST[fx1]-$_POST[fx0])/($_POST[x1]-$_POST[x0]))/($_POST[x2]-$_POST[x0]))			,''.$style_all,'',disabled);
		echo "<br>";
		echo "<br>";
		$b0=$_POST[fx0];
		$b1=($_POST[fx1]-$_POST[fx0])/($_POST[x1]-$_POST[x0]);
		$b2=((($_POST[fx2]-$_POST[fx1])/($_POST[x2]-$_POST[x1])-($_POST[fx1]-$_POST[fx0])/($_POST[x1]-$_POST[x0]))/($_POST[x2]-$_POST[x0]));
		$t0=($_POST[x]-$_POST[x0]);
		$t1=($_POST[x]-$_POST[x0])*($_POST[x]-$_POST[x1]);
		$A1=$b0+($b1*($_POST[x]-$_POST[x0]))+($b2*$t1);
		//-------------------
		echo libre_v1::input2(text,'','','F1(X)'				,''.$style_all,'',disabled);
		echo libre_v1::input2(text,'','','='					,'width: 20px;'.$style_all,'',disabled);
		echo libre_v1::input2(text,'','',$b0					,''.$style_all,'',disabled);
		echo libre_v1::input2(text,'','','+'					,'width: 20px;'.$style_all,'',disabled);
		echo libre_v1::input2(text,'','',"$b1($t0)"			,''.$style_all,'',disabled);
		echo libre_v1::input2(text,'','','+'					,'width: 20px;'.$style_all,'',disabled);
		echo libre_v1::input2(text,'','',"$b2($t1)"		,''.$style_all,'',disabled);
		echo "<br>";
		echo "<br>";
		//-------------------
		echo libre_v1::input2(text,'','','F1(X)'				,''.$style_all,'',disabled);
		echo libre_v1::input2(text,'','','='					,'width: 20px;'.$style_all,'',disabled);
		echo libre_v1::input2(text,'','',$A1					,'background: orange; color black;'.$style_all,'',disabled);
		//-------------------
	echo"</div>";
echo "</div>";

?>