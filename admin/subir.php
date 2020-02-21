<?php
$nombre_img = $_FILES['archivo']['name'];
$tipo 		= $_FILES['archivo']['type'];
$tamano 	= $_FILES['archivo']['size'];
$temp		= $_FILES['archivo']['tmp_name'];
$memo=0;

if (($nombre_img == !NULL) && ($_FILES['imagen']['size'] <= 200000)){
	if (($_FILES["archivo"]["type"] == "image/gif")
		|| ($_FILES["archivo"]["type"] == "image/jpeg")
		|| ($_FILES["archivo"]["type"] == "image/jpg")
		|| ($_FILES["archivo"]["type"] == "image/png"))
	{
		if ($_FILES["archivo"]["type"] == "image/gif")	{$type=".gif";}
		if ($_FILES["archivo"]["type"] == "image/jpeg")	{$type=".jpeg";}
		if ($_FILES["archivo"]["type"] == "image/jpg")	{$type=".jpg";}
		if ($_FILES["archivo"]["type"] == "image/png")	{$type=".png";}
		
		if ($nombre_img<>''){	
			$sub='img/temp'.$type;
			$_POST[img_type]=$type;		
			$_POST[img_memo]=$sub;		
			$directorio = $_SERVER['DOCUMENT_ROOT'].'admin/'.$sub;
			move_uploaded_file($_FILES['archivo']['tmp_name'],$directorio);
			$memo=1;
			//$sub="../".$sub;
		}	
		if (($_POST[accion]==$acc3)and($nombre_img<>'')){	
			$sub='img/'.$_POST[ID_G].$type;
			$_POST[img_type]=$type;		
			$_POST[img_memo]=$sub;		
			$directorio = $_SERVER['DOCUMENT_ROOT'].'admin/'.$sub;
			move_uploaded_file($_FILES['archivo']['tmp_name'],$directorio);
			$memo=1;
			//$sub="../".$sub;
		}		
    }
}
//tranferencia de imagen
if ((($_POST[accion]==$acc3)or($_POST[accion]==$acc10))and($_POST[img_memo]<>'')){
	$directorio1 = $_SERVER['DOCUMENT_ROOT'].'admin/img/temp'			.$_POST[img_type];
	$directorio2 = $_SERVER['DOCUMENT_ROOT'].'admin/img/'.$_POST[ID_G]	.$_POST[img_type];
	rename($directorio1,$directorio2);
	$_POST[img_memo]="img/".$_POST[ID_G]	.$_POST[img_type];
}
db(img,$conexion,$phpv);
//borrar
if ($_POST[accion]==$acc4)dele_pre(img,$_POST[ID_G],$conexion,$phpv);
$consu1_1=consulta(img,$conexion,"","","","",$phpv);
		$tabla=img;
		$n0=ID_G;		$v0=$_POST[ID_G];
		$n1=nombre;		$v1=$_POST[nombre];
		$n2=type;		$v2=$_POST[img_type];
		include("espe_tab_insert.php");
		if ($libre==''){echo"Error de Carga 'espe_tab_insert.php'";}$libre='';
		if ($_POST[accion]==$acc3){ejecuta($conexion,$res,$phpv);}

		$tabla=img;
		$n0=ID_G;		$v0=$_POST[ID_G];
		$n1=nombre;		$v1=$_POST[nombre];
		$n2=type;		$v2=$_POST[img_type];
		include("espe_tab_insert.php");
		if ($libre==''){echo"Error de Carga 'espe_tab_insert.php'";}$libre='';
		if ($_POST[accion]==$acc10)		ejecuta($conexion,$res,$phpv);
		//descarga de la imagen 
		$c1=compro($_POST[ID_G],ID_G,type,$consu1_1,$conexion,$phpv);
		if ($img_descarga<>''){
			descarga3($consu1_1,$img_descarga,$phpv);
		}
		if (($_POST[accion]==$acc4)){unlink($_POST[img_memo]);$_POST[img_memo]="";}
		
echo input2(hidden,img_memo,'',$_POST[img_memo]);
echo input2(hidden,img_type,'',$_POST[img_type]);
$res=$_POST[img_memo];		
$libre=1;
?>