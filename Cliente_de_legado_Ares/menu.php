
<?php
	$id1='id';
	$id2='id';
	$id3='id';
	$id4='id';
	if(empty($_POST['menu']))$_POST['menu']='';
	if($_POST['menu']==$m1){$id1="id_s";}
	if($_POST['menu']==$m2){$id2="id_s";}
	if((!empty($m3)) and $_POST['menu']==$m3){$id3="id_s";}
	if((!empty($m4)) and $_POST['menu']==$m4){$id4="id_s";}
	$url="http://".$_SERVER['HTTP_HOST'].":".$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI'];
	echo"
		<div id='conte-fijo'>
			<div id='menu'>";
				echo$z=input2('hidden','menu','',$_POST['menu'],'','','');
				if(!empty($m1))echo$z=input2('submit','menu','',$m1,'',$id1,'');
				if(!empty($m2))echo$z=input2('submit','menu','',$m2,'',$id2,'');
				if(!empty($m3))echo$z=input2('submit','menu','',$m3,'',$id3,'');
				if(!empty($m4))echo$z=input2('submit','menu','',$m4,'',$id4,'');
	echo"	</div>
		</div>
	";
?>
