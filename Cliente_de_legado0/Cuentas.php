<?php
//echo'<input type="hidden" name="menu" value="'.$_POST[menu].'">';
if ($_POST[name2set]=='')$_POST[name2set]=Nuevo;
sub_menu('',menu2,name2set,'',Nuevo,Folder,'Arc. Mur.',Modificar,Altas,Reporte,'+','+','+','+','+','+');
echo"<div id='Conte-pri'>";
	if ($_POST[name2set]==Nuevo)		{include("Nuevo.php");}
	if ($_POST[name2set]==Folder)		{include("folder.php");}
	if ($_POST[name2set]=='Arc. Mur.')	{include("Baul.php");}
	//if ($_POST[name2set]==Consulta)		{include("consulta.php");}
	if ($_POST[name2set]==Modificar)	{include("Cambio.php");}
	if ($_POST[name2set]==Altas)		{include("ajuste.php");}
	//if ($_POST[name2set]==Reporte)	    {include("Estadisticas.php");}
    if ($_POST[name2set]==Reporte)     {include("reporte.php");}
    if ($_POST[name2set]==m)      	    {include("memoria.php");}
echo"</div>";


function liinputli($type,$name,$id,$value){
	echo"<li ><input type='submit' name='".$name."' id='".$id."' value='".$value."'> </li>";
}
function sub_menu($style,$name,$name2,$var1,$var2,$var3,$var4,$var5,$var6,$var7,$var8,$var9,$var10,$var11,$var12,$var13)
{
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
echo"
<div id='conte-isqu' style='".$style."'>
	<div id='sub_menu'>
	<input type='hidden' class='Medio' name='".$name2."' value='".$_POST[$name2]."'>
		<ul id='smenu-botones'>";
			liinputli(submit,$name,$id1,$var1);
			liinputli(submit,$name,$id2,$var2);
                        liinputli(submit,$name,$id3,$var3);
                        liinputli(submit,$name,$id4,$var4);
                        liinputli(submit,$name,$id5,$var5);
                        liinputli(submit,$name,$id6,$var6);
                        liinputli(submit,$name,$id7,$var7);
                        liinputli(submit,$name,$id8,$var8);
                        liinputli(submit,$name,$id9,$var9);
                        liinputli(submit,$name,$id10,$var10);
                        liinputli(submit,$name,$id11,$var11);

echo"		</ul >
	</div >
</div >
";
}
?>
