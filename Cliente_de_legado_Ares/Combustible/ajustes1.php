<?php

$consola="";
$consola_open="";
$style='position: absolute;top: 130px;width: 105px;z-index: 1;';
$red="box-shadow: inset 0px 0px 15px red;";
$blue="box-shadow: inset 0px 0px 15px #0066ff;";
$guarda=true;
libre_v1::db($db_combustible,$conexion,$phpv);	
$array=array(Tanques,Vehiculos,Proveedor,Despachador);
echo libre_v1::input2(hidden,'sub1','',$_POST[sub1]					,"width: 100%; background: green",'sub1',"disabled",botone_n);
$style="position: absolute;top: 100px;width: 105px;z-index: 1;";
libre_v2::menu3(submit,$style,'',sub1,id_I,'',botones_submenu,botone_n,$array,'');
$ajustes1=true;
if($_POST[sub1]==Tanques){
	if($_POST[operador]==Guardar){//verifica y guarda los datos nuevos 
		//compueva que los campos		
		if($_POST[ID_G_tanque]=="")		{$guarda=false;$style_ID_G=$red;		$Consola2=$Consola2."<br>ID: Vacio";		}			else{$style_ID_G=$blue;}
		//if($_POST[ID_G]==chofer)	{$guarda=false;$style_chofer=$red;		$Consola2=$Consola2."<br>Nombre: Denagado";		}		
		if($guarda==true){//verifica si exxiste el nombre de chofer 
		
		}
		if($guarda==true){
			$consu=libre_v2::consulta(tanques,$conexion,ID_G,$_POST[ID_G_tanque],ID_G,0,$phpv,'','');
			$datos=libre_v2::mysql_fe_ar($consu,$phpv);
			if($datos[ID_G]==$_POST[ID_G_tanque]){$guarda=false;$style_ID_G=$red;		$Consola2=$Consola2."<br>ID: $datos[ID_G] Denagado YA EXISTE";}
			
		}
		if($_POST[Capacidad]=="")	{$guarda=false;$style_Capacidad=$red;			$Consola2=$Consola2."<br>Capacidad: Vacio";			}		else{$style_Capacidad=$blue;}
		if($_POST[level_actua]=="")	{$guarda=false;$style_level_actual=$red;		$Consola2=$Consola2."<br>Nivel Actual: Vacio  ";	}		else{$style_level_actual=$blue;}
		if($_POST[Capacidad]<$_POST[level_actua]){$guarda=false;$style_level_actual=$red;$style_Capacidad=$red;		$Consola2=$Consola2."<br>Nivel Actual: Fuera de rango";	}		else{$style_level_actual=$blue;}
		if($guarda==false)$Consola2="<br>Datos $_POST[sub1]".$Consola2;
	}
	if($_POST[operador]=="Guardar Cambios"){
		if($_POST[Capacidad]<$_POST[level_actua]){$guarda=false;$style_level_actual=$red;$style_Capacidad=$red;		$Consola2=$Consola2."<br>Nivel Actual: Fuera de rango";	}		else{$style_level_actual=$blue;}
	}
	if(($_POST[operador]=="Guardar")and(($grava==true)or($guarda==true))){//guarda datos nuevos 
		$Consola2=$Consola2.libre_v1::input2(text,'','',"Guardando Datos"					,"width: 100%",'',"disabled",botone_n);
		include("../Guarda.php");
		
		$resc=$resc.libre_v1::input2(text,'','',"Guardado Completado"					,"width: 100%; background: green",'',"disabled",botone_n);
		//$consola="open";
	}
	if($_POST[operador]=="Guardar Cambios"){//guarda cambios 
		$consola=open;	
		include("../Guarda.php");
		$resc=$resc.libre_v1::input2(text,'','',"Datos Guardados "					,"width: 100%; background: green",'',"disabled",botone_n);
	}
	if($_POST[descarga]<>""){//descarga los datos de un chofer
		$consu=libre_v1::consulta(tanques,$conexion,ID_G,$_POST[descarga],'','',$phpv,'','');
		$datos=libre_v1::mysql_fe_ar($consu,$phpv);
		$_POST[ID_G_tanque]		= $datos[ID_G];
		$_POST[Capacidad]		= $datos[max_level];
		$_POST[Direccion]		= $datos[Direccion];
		$_POST[level_actua]		= $datos[act_level];
	}
	if($_POST[operador]==Borrar){
		echo"<div id='consola_ajustes'style='background: #102f41c7;height: 100px;position: absolute;z-index: 1;left: 120px;right: 225px;box-shadow: 0px 0px 40px 10px BLACK;'>";
			echo "<div style='z-index: 1; position: absolute; width: 20px; height: 17px; background: #ada7a7; float: right; right: 5px; text-align: center;'  onclick='cierra(consola_ajustes);'>X</div>";
			echo libre_v1::input2(text,'','',"Eliminar Datos De Tanque","width: 100%",'',"disabled",botone_n);
			echo libre_v1::input2(submit,'operador','',Confirmar,"bottom: 9px;width: 175px;text-align: center;position: absolute;top: 40px;left: 10px;font-size: 23px;",'',"",$class);
			echo libre_v1::input2(submit,'operador','',Cancelar,"bottom: 9px;width: 175px;text-align: center;position: absolute;top: 40px;right: 10px;font-size: 23px;",'',"",$class);
			echo libre_v1::input2(botton,'','',$_POST[ID_G_tanque],"bottom: 9px;width: 500px;text-align: center;position: absolute;top: 40px;left: 203px;font-size: 17px;",'',"",$class);
		echo"</div>";
	}
	if($_POST[operador]==Confirmar){
		if($_POST[ID_G_tanque]<>"")libre_v2::delete(tanques,ID_G,$_POST[ID_G_tanque],$conexion,$phpv);
		include("../Cliente_de_legado_Ares/limpia.php");
		echo"<div id='consola_ajustes' style='background: #102f41c7;height: 100px;position: absolute;z-index: 1;left: 120px;right: 225px;box-shadow: 0px 0px 40px 10px BLACK;'>";
			echo "<div style='z-index: 1; position: absolute; width: 20px; height: 17px; background: #ada7a7; float: right; right: 5px; text-align: center;'  onclick='cierra(consola_ajustes);'>X</div>";
			echo libre_v1::input2(text,'','',"Datos Eliminados","width: 100%",'',"disabled",botone_n);
		echo"</div>";
	}

	echo"<div id='general_info' style='background: #05486cab;width: 220px;right: 0px;top: 12px;bottom: 5px;position: absolute;color: white;'>";
		echo"<div id='datos_info'>";
			echo libre_v1::input2(text,'','','Tanque De Combustible'					,"width: 100%",'',"disabled",botone_n);
			echo libre_v1::input2(text,'','','Identificador'					,"width: 40%",'',"disabled",botone_n);
			echo libre_v1::input2(text,ID_G_tanque,'',$_POST[ID_G_tanque]		,$style_ID_G."width: 60%",'ID_G_tanque',"maxlength='50' placeholder='Nombre Completo' onkeyup='Maysall(this);'",botones_submenu);
			echo libre_v1::input2(text,'','','Capacidad'						,"width: 40%",'',"disabled",botone_n);
			echo libre_v1::input2(text,Capacidad,'',$_POST[Capacidad]			,$style_Capacidad."width: 60%",'',"maxlength='25'placeholder='Maximas(Lts)'onkeypress='return valida_n(event);' onkeyup='Maysall(this);'",botones_submenu);
			echo libre_v1::input2(text,'','','Nivel Actual'						,"width: 40%",'',"disabled",botone_n);
			echo libre_v1::input2(text,level_actua,'',$_POST[level_actua]		,$style_level_actual."width: 60%",'',"maxlength='25'placeholder='Lts'onkeyup='Maysall(this);'",botones_submenu);
		echo"</div>";
		//actuador operadores
		
		$consu=libre_v2::consulta(tanques,$conexion,ID_G,$_POST[ID_G_tanque],ID_G,0,$phpv,'','');
		$datos=libre_v2::mysql_fe_ar($consu,$phpv);
		if(($datos[ID_G]==$_POST[ID_G_tanque])and($_POST[ID_G_tanque]<>"")){
			$style_guarda="display: none;";
			$style_cambios="display: block;";
		}else{
			$style_guarda="display: block;";
			$style_cambios="display: none;";
			
		}			
		//operadores	
		echo libre_v1::input2(submit,'operador','',"Limpiar"		,$style_limpia.'position: absolute;bottom: 5px;right: 110px;width: 110px;'					,'limpia_cuenta'		,'',botones_submenu);
		echo libre_v1::input2(submit,'operador','',"Guardar"		,$style_guarda.'					width: 110px;position: absolute;bottom: 5px;right: 0px;'	,'guarda_cuenta'		,'',botones_submenu);
		echo libre_v1::input2(submit,'operador','',"Guardar Cambios",$style_cambios.'width: 110px;position: absolute;bottom: 5px;right: 0px;'	,'cambio_cuenta'		,'',botones_submenu);
		echo libre_v1::input2(button,'operador','',"Confirmar"		,'display: none;	width: 110px;position: absolute;bottom: 40px;right: 0px;background: yellow;color: black;','confirma_cuenta','',botones_submenu);
	echo"</div>";
	echo"<div style='position: absolute;top: 0px;bottom: 0px;right: 225px;left: 120px;background: #05486cab;box-shadow: inset 0px 0px 1px 1px white;'>";
		echo libre_v1::input2(text,'','',$_POST[sub1]					,"width: 100%",'',"disabled",botone_n);				
		echo"<div id='list' style='overflow-y: auto;position: absolute;top: 51px; width: 240px;bottom: 5px;background: #434343;box-shadow: inset 0px 0px 0px 1px white;'>";
			$consu=libre_v2::consulta(tanques,$conexion,'','','',0,$phpv,'','');
			
			while($datos=libre_v1::mysql_fe_ar	($consu,$phpv)){//lista de operadores (choferes)
				$class=botones_submenu;
				if($_POST[ID_G_tanque]==$datos[ID_G]){$class=botone_n;}
				echo libre_v1::input2(submit,'descarga','',$datos[ID_G],"height: 20px;width: 175px;font-size: 10px;text-align: left;padding: 5px 5px;",'',"",$class);
				if($_POST[ID_G_tanque]==$datos[ID_G])echo libre_v1::input2(submit,operador,'',Borrar,"height: 20px;width: 45px;",'','');
				if($_POST[ID_G_tanque]<>$datos[ID_G])echo libre_v1::input2(button,operador,'',Borrar,"height: 20px;width: 45px;background: #444;color: white;",'','');
				
				echo"<br>";
			}
			
		echo"</div>";
	echo"</div>";
}
//consola----------------------------------------------
$class=Consola2_mini;
if($guarda==false)	 	{$class=Consola2;}
if($consola_open<>'')	{$class=Consola2;}
if($consola<>'')	 	{$class=Consola2;}
echo "<div id='Consola2' class='$class'>";
	echo "<div style='z-index: 1; position: absolute; width: 20px; height: 17px; background: #ada7a7; float: right; right: 5px; text-align: center;'  onclick='ventanas2(Consola2);'>X</div>";
	echo"<div id='Consola' style='position: absolute;top: 2px;bottom: 2px;left: 2px;right: 2px;background: white;'>";
		echo $Consola2;
		echo $resc;
	echo"</div>";
echo "</div>";
 ?>