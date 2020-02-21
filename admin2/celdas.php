<?php 
	$celdas=" ";
	$conte="
		<table border='1'>
			<tr><td>Operador</td>	<td></td>	<td>Unidad</td><td></td>	<td>Cliente</td><td></td>	<td>fecha</td><td></td> <td>Flete R.</td><td></td></tr>
		</table>
	";
	$name_menu="menu-list";
	$opti_menu1="Fletes";
	$opti_menu2="Viaticos";
	$opti_menu3="Diesel";
	$opti_menu4="Casetas";
	$opti_menu5="Via Pass";
	$opti_menu6="Factutas";
	$opti_menu7="R y R";
	$opti_menu8="Guias";
	$opti_menu9="Maniobras";
	$sel="";
	if($_POST[$name_menu."_cancel"]<>"")$_POST[$name_menu]="";
	$conte=$conte."<table border='0'><tr>";
	$conte=$conte."<td>".input2(hidden,$name_menu,'',$_POST[$name_menu]);
		if($_POST[$name_menu]==$opti_menu1){$conte=$conte.input2(button,'','',Comentario);$sel="_cancel";}
	$conte=$conte										.input2(submit,$name_menu.$sel,'',$opti_menu1,"box-shadow: 0px 5px 5px black;")	."</td>";
	$conte=$conte."<td>";
		if($_POST[$name_menu]==$opti_menu2){$conte=$conte.input2(button,'','',Comentario);$sel="_cancel";}
	$conte=$conte										.input2(submit,$name_menu.$sel,'',$opti_menu2,"box-shadow: 0px 5px 5px black;")	."</td>";
	$conte=$conte."<td>";
		if($_POST[$name_menu]==$opti_menu3){$conte=$conte.input2(button,'','',Comentario);$sel="_cancel";}
	$conte=$conte										.input2(submit,$name_menu.$sel,'',$opti_menu3,"box-shadow: 0px 5px 5px black;")	."</td>";
	$conte=$conte."<td>";
		if($_POST[$name_menu]==$opti_menu4){$conte=$conte.input2(button,'','',Comentario);$sel="_cancel";}
	$conte=$conte										.input2(submit,$name_menu.$sel,'',$opti_menu4,"box-shadow: 0px 5px 5px black;")	."</td>";
	$conte=$conte."<td>";
		if($_POST[$name_menu]==$opti_menu5){$conte=$conte.input2(button,'','',Comentario);$sel="_cancel";}
	$conte=$conte										.input2(submit,$name_menu.$sel,'',$opti_menu5,"box-shadow: 0px 5px 5px black;")	."</td>";
	$conte=$conte."<td>";
		if($_POST[$name_menu]==$opti_menu6){$conte=$conte.input2(button,'','',Comentario);$sel="_cancel";}
	$conte=$conte										.input2(submit,$name_menu.$sel,'',$opti_menu6,"box-shadow: 0px 5px 5px black;")	."</td>";
	$conte=$conte."<td>";
		if($_POST[$name_menu]==$opti_menu7){$conte=$conte.input2(button,'','',Comentario);$sel="_cancel";}
	$conte=$conte										.input2(submit,$name_menu.$sel,'',$opti_menu7,"box-shadow: 0px 5px 5px black;")	."</td>";
	$conte=$conte."<td>";
		if($_POST[$name_menu]==$opti_menu8){$conte=$conte.input2(button,'','',Comentario);$sel="_cancel";}
	$conte=$conte										.input2(submit,$name_menu.$sel,'',$opti_menu8,"box-shadow: 0px 5px 5px black;")	."</td>";
	$conte=$conte."<td>";
		if($_POST[$name_menu]==$opti_menu9){$conte=$conte.input2(button,'','',Comentario);$sel="_cancel";}
	$conte=$conte										.input2(submit,$name_menu.$sel,'',$opti_menu9,"box-shadow: 0px 5px 5px black;")	."</td>";
	for($x=1; $x<20; $x++){
		$conte=$conte."<tr>";
			$focus=0;
		for($y=1; $y<10; $y++){
			$write=1;
			$type="button";
			$type2="hidden";
			if(($y==1)&&($_POST[$name_menu]==$opti_menu1)){$type=text;$type2=text;}
			if(($y==2)&&($_POST[$name_menu]==$opti_menu2)){$type=text;$type2=text;}
			if(($y==3)&&($_POST[$name_menu]==$opti_menu3)){$type=text;$type2=text;}
			if(($y==4)&&($_POST[$name_menu]==$opti_menu4)){$type=text;$type2=text;}
			if(($y==5)&&($_POST[$name_menu]==$opti_menu5)){$type=text;$type2=text;}
			if(($y==6)&&($_POST[$name_menu]==$opti_menu6)){$type=text;$type2=text;}
			if(($y==7)&&($_POST[$name_menu]==$opti_menu7)){$type=text;$type2=text;}
			if(($y==8)&&($_POST[$name_menu]==$opti_menu8)){$type=text;$type2=text;}
			if(($y==9)&&($_POST[$name_menu]==$opti_menu9)){$type=text;$type2=text;}
			if(($x>5)&&($y==1))	{$write=0;}//limite 1  -> fletes
			if(($x>5)&&($y==2))	{$write=0;}//limite 2  -> casetas
			if(($x>7)&&($y==3))	{$write=0;}//limite 3  -> diesel
			if(($x>20)&&($y==4)){$write=0;}//limite 4  -> casetas
			if(($x>20)&&($y==5)){$write=0;}//limite 5  -> via pass
			if(($x>5)&&($y==6))	{$write=0;}//limite 5  -> facturas
			if(($x>10)&&($y==7)){$write=0;}//limite 5  -> "r y r "
			if(($x>5)&&($y==8))	{$write=0;}//limite 5  -> "Guias "
			if(($x>10)&&($y==9)){$write=0;}//limite 5  -> "Maniobras "
			if($write==1){
				$name=$y."TEXT".$x;
				$name1=$y."TEXT_C".$x;
				if(($type==text)&&($_POST[$name]=='')&&($focus==0)){$libre="autofocus=''";}
				$conte=$conte."<td>";
				$conte=$conte.input2($type2	,$name1,$_POST[$name1]	,$_POST[$name1],'  box-shadow: 0px 5px 5px black;',$name1);
				
				$conte=$conte.input2(hidden	,$name,$_POST[$name]	,$_POST[$name],'     box-shadow: 0px 5px 5px black;',$name);
				$conte=$conte.input2($type	,$name,$_POST[$name1]	,$_POST[$name],'    box-shadow: 0px 5px 5px black;',$name,$libre);
				$conte=$conte."</td>";
			}
			if($write==0){$conte=$conte."<td></td>";}
		}
		$conte=$conte."</tr>";
	}
	$style="background: rgba(2, 17, 25, 0.86); position: absolute; color: white;";
	$conte=$conte.'<div id="control"> </div>';
	$centro=$centro. div				($style,$libre,$conte);
	$conte='';
?>