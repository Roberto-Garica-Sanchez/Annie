
<?php //php7
$libre=1;
/*
------------Include  requeridos[Nombre]
-->
------------function requeridas[Libreria/funcion(s)]
--> "libre_uni.php"
....>input2				($type2,$name,$title,$value,$style,$id,$libre);

*/
	$id0='id';
	$id1='id';
	$id2='id';
	$id3='id';
	$id4='id';
	$id5='id';
	$id6='id';
	$id7='id';
	
	if(($_POST[menu]==$m1)or($_POST[menu]=="")){$id1="id_s";}
	if($_POST[menu]==$m2){$id2="id_s";}
	if($_POST[menu]==$m3){$id3="id_s";}
	if($_POST[menu]==$m4){$id4="id_s";}
	if($_POST[menu]==$m5){$id5="id_s";}
	if($_POST[menu]==$m6){$id6="id_s";}
	if($_POST[menu]==$m7){$id7="id_s";}
	$url="http://".$_SERVER['HTTP_HOST'].":".$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI'];
	echo"
		<div id='conte-fijo'>
			<div id='menu'>";
				echo$z=input2(hidden,menu,'',$_POST[menu]);
				echo$z=input2(submit,menu,'',$m0,'',$id0);
				echo$z=input2(submit,menu,'',$m1,'',$id1);
				echo$z=input2(submit,menu,'',$m2,'',$id2);
				echo$z=input2(submit,menu,'',$m3,'',$id3);
				echo$z=input2(submit,menu,'',$m4,'',$id4);
				echo$z=input2(submit,menu,'',$m5,'',$id5);
				echo$z=input2(submit,menu,'',$m6,'',$id6);
				
	echo"	</div>
		</div>
	";
?>
