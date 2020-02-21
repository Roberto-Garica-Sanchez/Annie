que honda<?php
$nombre_img = $_FILES['archivo']['name'];
$tipo 		= $_FILES['archivo']['type'];
$tamano 	= $_FILES['archivo']['size'];
 /*
if (($nombre_img == !NULL) && ($_FILES['imagen']['size'] <= 200000)){
	if (($_FILES["archivo"]["type"] == "image/gif")
		|| ($_FILES["archivo"]["type"] == "image/jpeg")
		|| ($_FILES["archivo"]["type"] == "image/jpg")
		|| ($_FILES["archivo"]["type"] == "image/png"))
	{
		if ($_FILES["archivo"]["type"] == "image/gif")	$nombre=$_POST[titulo].".gif";
		if ($_FILES["archivo"]["type"] == "image/jpeg")	$nombre=$_POST[titulo].".jpeg";
		if ($_FILES["archivo"]["type"] == "image/jpg")	$nombre=$_POST[titulo].".jpg";
		if ($_FILES["archivo"]["type"] == "image/png")	$nombre=$_POST[titulo].".png";
		$sub='img/'.$nombre;
		$directorio = $_SERVER['DOCUMENT_ROOT'].'admin/'.$sub;
		//move_uploaded_file($_FILES['archivo']['tmp_name'],$directorio);
		$sub="../".$sub;
    } 
    else{
		echo "No se puede subir una imagen con ese formato ";
	}
}
else {
   if($nombre_img == !NULL) echo "La imagen es demasiado grande "; 
}
/*
db(img,$conexion,$phpv);
//$consu1=consulta(img,$conexion,"","","","",$phpv);
		$tabla=img;
		$n0=ID_fot;		$v0=$_POST[n_factu];
		$n1=nombre;		$v1=$nombre;
		include("espe_tab_insert.php");
		if ($libre==''){echo"Error de Carga 'espe_tab_insert.php'";}$libre='';
		ejecuta($conexion,$res,$phpv);
		*/
$libre=1;
?>