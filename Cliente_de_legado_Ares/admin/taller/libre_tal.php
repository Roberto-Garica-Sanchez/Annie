<?php //php7
$libre=1;
/*
------------Include  requeridos[Nombre]
-->"tablero.php"
------------function en esta librerria
-->imagen			($name,$value,$src,$style,$title);
-->sub_menu			(.. formato ..);
-->tablero			(.. formato ..);
*/
function imagen($name,$value,$src,$style,$title){
	$res="<img name='$name' value='$value' src='$src' style='$style' title='$title' >";
	return $res;
}
function sub_menu($style,$name,$name2,$var1,$var2,$var3,$var4,$var5,$var6,$var7,$var8,$var9,$var10,$var11,$var12,$var13){
$id=idI;
if($_POST[$name]<>''){$_POST[$name2]=$_POST[$name];}
if($_POST[$name2]==$var1){$id1=id_I;}else{$id1=$id;}
if($_POST[$name2]==$var2){$id2=id_I;}else{$id2=$id;}
if($_POST[$name2]==$var3){$id3=id_I;}else{$id3=$id;}
if($_POST[$name2]==$var4){$id4=id_I;}else{$id4=$id;}
if($_POST[$name2]==$var5){$id5=id_I;}else{$id5=$id;}
if($_POST[$name2]==$var6){$id6=id_I;}else{$id6=$id;}
if($_POST[$name2]==$var7){$id7=id_I;}else{$id7=$id;}
if($_POST[$name2]==$var8){$id8=id_I;}else{$id8=$id;}
if($_POST[$name2]==$var9){$id9=id_I;}else{$id9=$id;}
if($_POST[$name2]==$var10){$id10=id_I;}else{$id10=$id;}
if($_POST[$name2]==$var11){$id11=id_I;}else{$id11=$id;}
if($_POST[$name2]==$var12){$id12=id_I;}else{$id12=$id;}
if($_POST[$name2]==$var13){$id13=id_I;}else{$id13=$id;}
echo"
<div id='conte-isqu' style='".$style."'>
	<div id='sub_menu'>";
	$size=0;
	$style="";
	$i1=input2(hidden,$name2,'',$_POST[$name2]);
	$i2=input2(submit,$name2,'',$var1,'',$id1);
	$i3=input2(submit,$name2,'',$var2,'',$id2);
	$i4=input2(submit,$name2,'',$var3,'',$id3);
	$i5=input2(submit,$name2,'',$var4,'',$id4);
	$i6=input2(submit,$name2,'',$var5,'',$id5);
	$i7=input2(submit,$name2,'',$var6,'',$id6);
	$i8=input2(submit,$name2,'',$var7,'',$id7);
	$i9=input2(submit,$name2,'',$var8,'',$id8);
	$i10=input2(submit,$name2,'',$var9,'',$id9);
	$i11=input2(submit,$name2,'',$var10,'',$id10);
	$i12=input2(submit,$name2,'',$var11,'',$id11);
	$i13=input2(submit,$name2,'',$var12,'',$id12);
	$i14=input2(submit,$name2,'',$var13,'',$id13);
	
	include("tablero.php");
echo"</div >
</div >
";
}
?>