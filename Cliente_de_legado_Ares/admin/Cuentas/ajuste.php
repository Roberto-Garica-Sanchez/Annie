<?php
$menu='menu-list';
$listn1=Choferes;
$listn2=Placas;
$listn3=Clientes;
$listn4='';
$listn5='';
$listn6='';
$listn7='';
$listn8='';
$listn9='';
$listn10='';
$listn11='';
$style='top: 250px;';
include('lista.php');
include('libre_aju.php');

if ($_POST['menu-list']=='')$_POST['menu-list']=$listn1;
if ($_POST['menu-list']==$listn1){
    if ($_POST[opcion1]==Nuevo)$_POST[opciones1]='';
	if ($_POST[opciones1]==''){
        $title='Nuevo Registro';
        $i1=Nombre;
        $i2=Edad;
        $i3=Direccion;
        $i4=Celular;
        $d1=input2(text,Nombre			,'',strtoupper($_POST[Nombre]));
        $d2=input2(text,edad			,'',strtoupper($_POST[edad]));
        $d3=input2(text,direcciones		,'',strtoupper($_POST[direcciones]));
        $d4=input2(text,Celular			,'',strtoupper($_POST[Celular]));
        $d5=input2(submit,agregar		,'',Agregar);
        $com=$_POST[Nombre];
		$col=Nombre_Ch;
		$consu=$consu1;
        $com1=compro($_POST[Nombre],choferes,'',$consu,$conexion,$phpv);
        if ($com1=='1'){$title='Ya Existe Este Registro';$dc1=red;}
        if (($_POST[Nombre]<>'')and($_POST[agregar]==Agregar)and($com1<>1)){
			Escribe($conexion,choferes,"",$phpv);
			$consu1=consulta('choferes',$conexion,"","",Nombre_Ch,"",$phpv);
		}
	}else{
        $i1=Selecionado;
        $d1=$_POST[opciones1].input2(hidden,opciones1,'',$_POST[opciones1]);
        $d2=input2(submit,Eliminar,'Eliminar de forma permanente Este Cliente',Eliminar);
        $d3=input2(submit,opcion1,'',Nuevo);
        if (($_POST[Eliminar]==Eliminar)and($_POST[opciones1]<>'')){
            $i2=Eliminar;$dc1=orange;$tc2=red;
            $d2=input2(submit,Eliminar,'Este Proceso Es Imposible De Rebertir Una Ves Echo',Confirmar);
		}
        if ($_POST[Eliminar]==Confirmar){

			delete(choferes,$conexion,$phpv); 
			$consu1=consulta('choferes',$conexion,"","",Nombre_Ch,"",$phpv); 
			$title='Registro Eliminado';$i1=$d1=$d2=$d4='';
		}
	}
}
if ($_POST['menu-list']==$listn2){
        if ($_POST[opcion2]==Nuevo)$_POST[opciones2]='';
        if ($_POST[opciones2]==''){
            $title='Nuevo Registro';
            $i1=Placas;
            $i2=Marca;
            $i3=Modelo;
            $i4=N°E;
            $i5=Color;
            $d1=input2(text,placas		,'',strtoupper($_POST[placas]),'','',6);
            $d2=input2(text,marca		,'',strtoupper($_POST[marca]));
            $d3=input2(text,modelo		,'',strtoupper($_POST[modelo]));
            $d4=input2(text,n_e			,'',strtoupper($_POST[n_e]));
            $d5=input2(text,color		,'',strtoupper($_POST[color]));
            $d6=input2(submit,agregar	,'',Agregar);
            $com=$_POST[placas];
			$col=Placas;
			$consu=$consu2;
            $com1=compro($com,$col,$var,$consu,$conexion,$phpv);
            if ($com1=='1'){$title='Ya Existe Este Registro';$dc1=red;}
            if (($_POST[placas]<>'')and($_POST[agregar]==Agregar)and($com1<>1)){
				Escribe($conexion,placas,"",$phpv);
				$consu2=consulta('placas',$conexion,"","",1,"",$phpv); 
				$d6='';$title='Registro Gravado';
			}
        }else{
            $i1=Selecionado;
            $d1=$_POST[opciones2].input2(hidden,opciones2,'',$_POST[opciones2]);
            $d2=input2(submit,Eliminar,'Eliminar de forma permanente Estas placas',Eliminar);
            $d3=input2(submit,opcion2,'',Nuevo);
            if (($_POST[Eliminar]==Eliminar)and($_POST[opciones2]<>'')){
                 $i2=Eliminar;$dc1=orange;$tc2=red;
                 $d2=input2(submit,Eliminar,'Este Proceso Es Imposible De Rebertir Una Ves Echo',Confirmar);
            }
            if ($_POST[Eliminar]==Confirmar){
				delete(placas,$conexion,$phpv); 
				$consu2=consulta('placas',$conexion,"","",1,"",$phpv);
				$title='Registro Eliminado';$i1=$d1=$d2=$d3=$d4='';
			}
        }
}
if ($_POST['menu-list']==$listn3){
	if ($_POST[opcion3]==Nuevo)$_POST[opciones3]='';
	if ($_POST[opciones3]==''){
        
        $title='Nuevo Registro';
        $i1=Nombre;
        $i2='Fecha Origen';
        $i3=Destino;
        $d1=input2(text,Nombre,'',strtoupper($_POST[Nombre]));
        $d2=input2(text,Registro,'',strtoupper($_POST[Registro]));
        $d3=input2(text,Destino,'',strtoupper($_POST[Destino]));
        $d4=input2(submit,agregar,'',Agregar);
        $com=$_POST[Nombre];$col=Nombre_Cl;$consu=$consu3;
        $com1=compro($com,$col,$var,$consu,$conexion,$phpv);
        if ($com1=='1'){$title='Ya Existe Este Registro';$dc1=red;}
        if (($_POST[Nombre]<>'')and($_POST[agregar]==Agregar)and($com1<>1)){
			Escribe($conexion,clientes,"",$phpv);
			$consu3=consulta('clientes',$conexion,"","",1,"",$phpv);
		}
	}else{
        $i1=Selecionado;
        $d1=$_POST[opciones3].input2(hidden,opciones3,'',$_POST[opciones3]);
        $d2=input2(submit,Eliminar,'Eliminar de forma permanente Este Cliente',Eliminar);
        $d3=input2(submit,opcion3,'',Nuevo);
        if (($_POST[Eliminar]==Eliminar)and($_POST[opciones3]<>'')){
            $i2=Eliminar;$dc1=orange;$tc2=red;
            $d2=input2(submit,Eliminar,'Este Proceso Es Imposible De Rebertir Una Ves Echo',Confirmar);
		}
        if ($_POST[Eliminar]==Confirmar){
			delete(clientes,$conexion,$phpv);
			$consu3=consulta('clientes',$conexion,"","",1,"",$phpv); 
			$title='Registro Eliminado';$i1=$d1=$d2=$d3=$d4='';
		}
	}
}
$size=0;
$style="background: rgba(5, 72, 108, 0.67) none repeat scroll 0% 0%; width: auto; width: 220px; left: -1px; color: white;";
include('tablero.php');
if($_POST['menu-list']==$listn1){
	echo'<div style="overflow: auto; overflow-x:auto; position: absolute; left: 105px; height: 599px; width: 664px; background: #0009;">
		<table border="0">';
	echo'
	<tr bgcolor="#343434">
		<td >Nombre	</td >
		<td >Edad	</td >
		<td >Direccion	</td >
	</tr >';
	mysql_da_se($consu1,0,$phpv);
	while($dato=mysql_fe_ar($consu1,$phpv)){	
                echo'<tr bgcolor="#676767">';
                echo'<td >'.$d=input2(submit,opciones1,'Ver Mas Opciones '.$dato[Nombre_Ch],$dato[Nombre_Ch],'width: 250px; text-align: left;').'</td >';
                echo'<td >'.$d=input2(button,'','',$dato[Edad]).'</td >';
                echo'<td >'.$d=input2(button,'','',$dato[Direccion]).'</td >';
                echo'</tr >';
	}
	echo'</table >';
	echo"</div>";
}
if($_POST['menu-list']==$listn2){
	echo'<div style="overflow: auto; overflow-x:auto; position: absolute; left: 105px; height: 599px; width: 664px; background: #0009;">
		<table border="0">';
			echo'
			<tr bgcolor="#343434">
			<td >Placas     </td >
			<td >Marca	</td >
			<td >Modelo	</td >
			<td >N° E.	</td >
			<td >Color	</td >
	</tr >';
	mysql_da_se($consu2,0,$phpv);
	while($dato=mysql_fe_ar($consu2,$phpv)){
			echo'<tr bgcolor="#676767">';
			echo'<td >'.$d=input2(submit,opciones2,'Ver Mas Opciones '.$dato[Placas],$dato[Placas],''),'</td >';
			echo'<td >'.$d=input2(button,'','',$dato[Marca],' width: 150px; text-align: left;').'</td >';
			echo'<td >'.$d=input2(button,'','',$dato[Modelo]).'</td >';
			echo'<td >'.$d=input2(button,'','',$dato[N_eco]).'</td >';
			echo'<td >'.$d=input2(button,'','',$dato[Color]).'</td >';
	echo'</tr >';
	}
	echo'</table >';
	echo"</div>";
}
if($_POST['menu-list']==$listn3){
	echo'<div style="overflow: auto; overflow-x:auto; position: absolute; left: 105px; height: 599px; width: 664px; background: #0009;">
	<table border="0">';
	echo'
	<tr bgcolor="#343434">
	<td >Nombre      	</td >
	<td >Fecha Origen	</td >
	<td >Destino		</td >
	</tr >';
	mysql_da_se($consu3,0,$phpv);
	while($dato=mysql_fe_ar($consu3,$phpv)){
			echo'<tr bgcolor="#676767">';
			echo'<td >'.$d=input2(submit,opciones3,'Ver Mas Opciones '.$dato[Nombre_Cl],$dato[Nombre_Cl],'width: 250px; text-align: left;').'</td >';
			echo'<td >'.$d=input2(button,'','',$dato[Fecha_re]).'</td >';
			echo'<td >'.$d=input2(button,'','',$dato[Destino]).'</td >';
			echo'</tr >';
	}
	echo'</table >';
	echo'</div >';
}
?>
