<?php 


$style="position: absolute;top: 142px;width: 100px;background: #00174cb3;padding: 2px;";
$style='position: absolute;top: 130px;width: 105px;z-index: 1;';

$red="box-shadow: inset 0px 0px 15px red;";
$blue="box-shadow: inset 0px 0px 15px #0066ff;";

$array=array(Operadores,Vehiculos,Clientes);
libre_v1::db($db,$conexion,$phpv);	
$consu_choferes=libre_v2::consulta(choferes,$conexion,'','',Nombre_Ch,0,$phpv,'','');
if($_POST[operador]==Borrar){
	if($_POST[sub1]==Operadores){
		echo"<div id='consola_ajustes'style='background: #102f41c7;height: 100px;position: absolute;z-index: 1;left: 120px;right: 225px;box-shadow: 0px 0px 40px 10px BLACK;'>";
			echo "<div style='z-index: 1; position: absolute; width: 20px; height: 17px; background: #ada7a7; float: right; right: 5px; text-align: center;'  onclick='cierra(consola_ajustes);'>X</div>";
			echo libre_v1::input2(text,'','',"Eliminar Datos De Operador","width: 100%",'',"disabled",botone_n);
			echo libre_v1::input2(submit,'operador','',Confirmar,"bottom: 9px;width: 175px;text-align: center;position: absolute;top: 40px;left: 10px;font-size: 23px;",'',"",$class);
			echo libre_v1::input2(submit,'operador','',Cancelar,"bottom: 9px;width: 175px;text-align: center;position: absolute;top: 40px;right: 10px;font-size: 23px;",'',"",$class);
			echo libre_v1::input2(botton,'','',$_POST[chofer],"bottom: 9px;width: 500px;text-align: center;position: absolute;top: 40px;left: 203px;font-size: 17px;",'',"",$class);
		echo"</div>";
	}
}
$guarda="NONE";
if($_POST[operador]==Guardar){//Verifica los campo que contengan los datos correctos 
	$guarda=true;
	$Consola2="";
	if($_POST[sub1]==Operadores){
		//compueva que los campos		
		if($_POST[chofer]=="")		{$guarda=false;$style_chofer=$red;		$Consola2=$Consola2."<br>Nombre: Vacio";		}			else{$style_chofer=$blue;}
		if($_POST[chofer]==chofer)	{$guarda=false;$style_chofer=$red;		$Consola2=$Consola2."<br>Nombre: Denagado";		}		
		if($guarda==true){//verifica si exxiste el nombre de chofer 
		
		}
		if($guarda==true){
			$consu=libre_v2::consulta(choferes,$conexion,Nombre_Ch,$_POST[chofer],Nombre_Ch,0,$phpv,'','');
			$datos=libre_v2::mysql_fe_ar($consu,$phpv);
			if($datos[Nombre_Ch]==$_POST[chofer]){$guarda=false;$style_chofer=$red;		$Consola2=$Consola2."<br>Nombre: $datos[Nombre_Ch] Denagado YA EXISTE";}
			
		}
		if($_POST[Edad]=="")		{$guarda=false;$style_Edad=$red;		$Consola2=$Consola2."<br>Edad: Vacio";			}			else{$style_Edad=$blue;}
		if($_POST[Direccion]=="")	{$guarda=false;$style_Direccion=$red;	$Consola2=$Consola2."<br>Direccion: Vacio  ";	}		else{$style_Direccion=$blue;}
		if($_POST[Celular]=="")		{$guarda=false;$style_Celular=$red;		$Consola2=$Consola2."<br>Celular: Vacio  ";		}		else{$style_Celular=$blue;}
		if($guarda==false)$Consola2="<br>Datos Operador".$Consola2;
	}
	if($_POST[sub1]==Vehiculos){
		if($_POST[chofer]=="")		{$guarda=false;$style_chofer=$red;		$Consola2=$Consola2."<br>Nombre: Vacio";		}			else{$style_chofer=$blue;}
		if($_POST[chofer]==chofer)	{$guarda=false;$style_chofer=$red;		$Consola2=$Consola2."<br>Nombre: Denagado";		}		
		
	}
}
	
if($_POST[operador]=="Guardar Cambios"){
	$consola=open;	
	include("../Guarda.php");
	$resc=$resc.libre_v1::input2(text,'','',"Datos Guardados "					,"width: 100%; background: green",'',"disabled",botone_n);
}

if($_POST[name2set]==Altas){
	if(($_POST[operador]=="Guardar")and(($grava==true)or($guarda==true))){
		$Consola2=$Consola2.libre_v1::input2(text,'','',"Guardando Datos"					,"width: 100%",'',"disabled",botone_n);
		include("../Guarda.php");
		
		$resc=$resc.libre_v1::input2(text,'','',"Guardado Completado"					,"width: 100%; background: green",'',"disabled",botone_n);
		//$consola="open";
	}	
}

if($_POST[operador]==Confirmar){
	if($_POST[sub1]==Operadores){
		if($_POST[chofer]<>"")libre_v2::delete(choferes,Nombre_Ch,$_POST[chofer],$conexion,$phpv);
		echo"<div id='consola_ajustes' style='background: #102f41c7;height: 100px;position: absolute;z-index: 1;left: 120px;right: 225px;box-shadow: 0px 0px 40px 10px BLACK;'>";
			echo "<div style='z-index: 1; position: absolute; width: 20px; height: 17px; background: #ada7a7; float: right; right: 5px; text-align: center;'  onclick='cierra(consola_ajustes);'>X</div>";
			echo libre_v1::input2(text,'','',"Datos Eliminados","width: 100%",'',"disabled",botone_n);
		echo"</div>";
	}
	if($_POST[sub1]==Vehiculos){
		if($_POST[chofer]<>"")libre_v2::delete(choferes,Nombre_Ch,$_POST[chofer],$conexion,$phpv);
		/*echo"<div id='consola_ajustes' style='background: #102f41c7;height: 100px;position: absolute;z-index: 1;left: 120px;right: 225px;box-shadow: 0px 0px 40px 10px BLACK;'>";
			echo "<div style='z-index: 1; position: absolute; width: 20px; height: 17px; background: #ada7a7; float: right; right: 5px; text-align: center;'  onclick='cierra(consola_ajustes);'>X</div>";
			echo libre_v1::input2(text,'','',"Datos Eliminados","width: 100%",'',"disabled",botone_n);
		echo"</div>";
		*/
	}
}

if($_POST[descarga_chofer]<>""){
	$consu=libre_v1::consulta(choferes,$conexion,Nombre_Ch,$_POST[descarga_chofer],'','',$phpv,'','');
	$datos=libre_v1::mysql_fe_ar($consu,$phpv);
	$_POST[chofer]		= $datos[Nombre_Ch];
	$_POST[Edad]		= $datos[Edad];
	$_POST[Direccion]	= $datos[Direccion];
	$_POST[Celular]		= $datos[Celular];
}
if($_POST[descarga_placas]<>""){
	$consu=libre_v1::consulta(placas,$conexion,Placas,$_POST[descarga_placas],'','',$phpv,'','');
	$datos=libre_v1::mysql_fe_ar($consu,$phpv);
	$_POST[placas]		= $datos[Placas];
	$_POST[Marca]		= $datos[Marca];
	$_POST[Modelo]		= $datos[Modelo];
	$_POST[N_eco]		= $datos[N_eco];
	$_POST[Color]		= $datos[Color];
}
//consola----------------------------------------------
$class=Consola2_mini;
if($guarda==false){$class=Consola2;}
if($consola_open<>''){$class=Consola2;}
if($consola<>'')	 {$class=Consola2;}
echo "<div id='Consola2' class='$class'>";
	echo "<div style='z-index: 1; position: absolute; width: 20px; height: 17px; background: #ada7a7; float: right; right: 5px; text-align: center;'  onclick='ventanas2(Consola2);'>X</div>";
	echo"<div id='Consola' style='position: absolute;top: 2px;bottom: 2px;left: 2px;right: 2px;background: white;'>";
		echo $Consola2;
		echo $resc;
	echo"</div>";
echo "</div>";




libre_v2::menu3(submit,$style,'',sub1,id_I,'',botones_submenu,botone_n,$array,'');
echo"<div id='general_info' style='background: #05486cab;width: 220px;right: 0px;top: 12px;bottom: 5px;position: absolute;color: white;'>";
	echo"<div id='datos_info'>";
		if($_POST[sub1]==Operadores){
			echo libre_v1::input2(text,'','','Operador'					,"width: 40%",'',"disabled",botone_n);
			echo libre_v1::input2(text,chofer,'',$_POST[chofer]			,$style_chofer."width: 60%",'chofer',"maxlength='50' placeholder='Nombre Completo' onkeyup='Maysall(this);'",botones_submenu);
			echo libre_v1::input2(text,'','','Edad'						,"width: 40%",'',"disabled",botone_n);
			echo libre_v1::input2(text,Edad,'',$_POST[Edad]				,$style_Edad."width: 60%",'',"maxlength='2'onkeypress='return valida_n(event);' onkeyup='Maysall(this);'",botones_submenu);
			echo libre_v1::input2(text,'','','Direccion'				,"width: 40%",'',"disabled",botone_n);
			echo libre_v1::input2(text,Direccion,'',$_POST[Direccion]	,$style_Direccion."width: 60%",'',"maxlength='25'onkeyup='Maysall(this);'",botones_submenu);
			echo libre_v1::input2(text,'','','Celular'					,"width: 40%",'',"disabled",botone_n);
			echo libre_v1::input2(text,Celular,'',$_POST[Celular]		,$style_Celular."width: 60%",'',"maxlength='10'onkeypress='return valida_n(event)'",botones_submenu);
	
		}
		if($_POST[sub1]==Vehiculos){
			echo libre_v1::input2(text,'','',Placas					,"width: 40%",'',"disabled",botone_n);
			echo libre_v1::input2(text,placas,'',$_POST[placas]		,$style_Placas."width: 60%",'',"",botones_submenu);
			echo libre_v1::input2(text,'','',Marca					,"width: 40%",'',"disabled",botone_n);
			echo libre_v1::input2(text,Marca,'',$_POST[Marca]		,$style_Marca."width: 60%",'',"",botones_submenu);
			echo libre_v1::input2(text,'','',Modelo					,"width: 40%",'',"disabled",botone_n);
			echo libre_v1::input2(text,Modelo,'',$_POST[Modelo]		,$style_Modelo."width: 60%",'',"",botones_submenu);
			echo libre_v1::input2(text,'','',"N° Economico"			,"width: 40%",'',"disabled",botone_n);
			echo libre_v1::input2(text,N_eco,'',$_POST[N_eco]		,$style_N_eco."width: 60%",'',"",botones_submenu);
			echo libre_v1::input2(text,'','',Color 					,"width: 40%",'',"disabled",botone_n);
			echo libre_v1::input2(text,Color,'',$_POST[Color]		,$style_Color."width: 60%",'',"",botones_submenu);
		}
		if($_POST[sub1]==Clientes){
			echo libre_v1::input2(text,'','',Nombre 					,"width: 40%",'',"disabled",botone_n);
			echo libre_v1::input2(text,Nombre_Cl,'',$_POST[Nombre_Cl]	,$style_Nombre_Cl."width: 60%",'',"placeholder='Alias'",botones_submenu);
			echo libre_v1::input2(text,'','',RFC 						,"width: 40%",'',"disabled",botone_n);
			echo libre_v1::input2(text,RFC_Cl,'',$_POST[RFC_Cl]			,$style_RFC_Cl."width: 60%",'',"",botones_submenu);
			echo libre_v1::input2(text,'','',Destino 					,"width: 40%",'',"disabled",botone_n);
			echo libre_v1::input2(text,Destino,'',$_POST[Destino]		,$style_Destino."width: 60%",'',"",botones_submenu);
		}
	echo"</div>";
	if($_POST[sub1]==Operadores){
		$consu=libre_v2::consulta(choferes,$conexion,Nombre_Ch,$_POST[chofer],Nombre_Ch,0,$phpv,'','');
		$datos=libre_v2::mysql_fe_ar($consu,$phpv);
		if($datos[Nombre_Ch]==$_POST[chofer]){
			$style_guarda="display: none;";
			$style_cambios="display: block;";
		}else{
			$style_guarda="display: block;";
			$style_cambios="display: none;";
			
		}
	}
	if($_POST[sub1]==Vehiculos){
		if(($datos[Placas]==$_POST[placas])and($_POST[placas]<>"")){
			$style_guarda="display: none;";
			$style_cambios="display: block;";
		}else{
			$style_guarda="display: block;";
			$style_cambios="display: none;";
			
		}
	}
	echo libre_v1::input2(submit,'operador','',"Limpiar"		,$style_limpia.'position: absolute;bottom: 5px;right: 110px;width: 110px;'					,'limpia_cuenta'		,'',botones_submenu);
	echo libre_v1::input2(submit,'operador','',"Guardar"		,$style_guarda.'					width: 110px;position: absolute;bottom: 5px;right: 0px;'	,'guarda_cuenta'		,'',botones_submenu);
	echo libre_v1::input2(submit,'operador','',"Guardar Cambios",$style_cambios.'width: 110px;position: absolute;bottom: 5px;right: 0px;'	,'cambio_cuenta'		,'',botones_submenu);
	echo libre_v1::input2(button,'operador','',"Confirmar"		,'display: none;	width: 110px;position: absolute;bottom: 40px;right: 0px;background: yellow;color: black;','confirma_cuenta','',botones_submenu);
echo"</div>";
echo"<div style='position: absolute;top: 0px;bottom: 0px;right: 225px;left: 120px;background: #05486cab;box-shadow: inset 0px 0px 1px 1px white;'>";
	echo libre_v1::input2(text,'','',$_POST[sub1]					,"width: 100%",'',"disabled",botone_n);
	if($_POST[sub1]==Operadores){
		//lista de choferes
		echo libre_v1::input2(text,busca,'',$_POST[busca],'width: 165px;padding: 2px 5px;','chofer_busca',"placeholder='Buscador'onkeyup='Maysall(this);'");
		//echo libre_v1::input2(button,'','',Buscar,'width: 65px;padding: 2px;background: #102f41;color: white;','',"onclick='busca_en_choferes();'");
		echo libre_v1::input2(button,'','',Buscar,'width: 65px;padding: 2px;background: #102f41;color: white;','',"");
		echo"<div id='list_choferes' style='overflow-y: auto;position: absolute;top: 51px; width: 240px;bottom: 5px;background: #434343;box-shadow: inset 0px 0px 0px 1px white;'>";
			$consu=libre_v2::consulta(choferes,$conexion,'','',Nombre_Ch,0,$phpv,'','');
			while($datos=libre_v1::mysql_fe_ar	($consu,$phpv)){
				$class=botones_submenu;
				if($_POST[chofer]==$datos[Nombre_Ch]){$class=botone_n;}
				echo libre_v1::input2(submit,'descarga_chofer','',$datos[Nombre_Ch],"height: 20px;width: 175px;font-size: 10px;text-align: left;padding: 5px 5px;",'',"",$class);
				if($_POST[chofer]==$datos[Nombre_Ch])echo libre_v1::input2(submit,operador,'',Borrar,"height: 20px;width: 45px;",'','');
				if($_POST[chofer]<>$datos[Nombre_Ch])echo libre_v1::input2(button,operador,'',Borrar,"height: 20px;width: 45px;background: #444;color: white;",'','');
				
				echo"<br>";
			}				
		echo"</div>";
		//datos de chofere selecionado 
		echo"<div id='datos_vinculo' style='position: absolute;background: #0000007a;bottom: 0px;left: 240px;right: 0px;top: 35px;'>";
			echo"<div style='position: absolute;left: 0px;right: 0px;height: 116px;'>";
				echo libre_v1::input2(text,'','',"Datos Vinculados","width: 100%",'',"disabled",botone_n);
				echo libre_v1::input2(button,'','',"N° Viajes","width: 100px; height: 17px;",'',"",botone_n);;
				echo libre_v1::input2(text,'','','',"",'',"");
				echo libre_v1::input2(button,'','',"Rendimiento","width: 100px; height: 17px;",'',"",botone_n);
				echo libre_v1::input2(text,'','','',"",'',"");
				echo libre_v1::input2(button,'','',"Total ISR ","width: 100px; height: 17px;",'',"",botone_n);
				echo libre_v1::input2(text,'','','',"",'',"");
				echo libre_v1::input2(button,'','',"Total Sueldos","width: 100px; height: 17px;",'',"",botone_n);
				echo libre_v1::input2(text,'','','',"",'',"");
				echo libre_v1::input2(button,'','',"Tiempo Servicio ","width: 100px; height: 17px;",'',"",botone_n);
				echo libre_v1::input2(text,'','','',"",'',"");
				//echo libre_v1::input2(text,'','',"Datos Vinculados","width: 100%",'',"disabled",botone_n);
				
			echo"</div>";		
			echo"<div id='dato_unidad' style='position: absolute;left: 0px;right: 0px;bottom: 300px;height: 150px;'>";
				echo libre_v1::input2(text,'','',"Unidad"					,"width: 100%",'',"disabled",botone_n);
				echo "<img src='../img/defaul.jpg'style='position: absolute;top: 35px;left: 5px;width: 100px;height: 100px;overflow: hidden;padding: 5px 5px 5px 5px;'></img>";
				echo libre_v1::input2(button,'','',Placas,'width: 100px;top: 40px;left: 125px;position: absolute;','','',botone_n);
				echo libre_v1::input2(button,'','','N° Economico' ,'width: 100px;top: 75px;left: 125px;position: absolute;','','',botone_n);
				echo libre_v1::input2(button,'','','Otros' ,'width: 200px;top: 35px;right: 0px;position: absolute;font-size: 12px;height: 20px;','','',botone_n);
				echo "<div style='position: absolute;bottom: 5px;right: 0px;top: 56px;width: 200px;background: white;overflow-x: hidden;overflow-y: auto;'>";
				echo "</div>";
			echo"</div>";
			echo"<div style='position: absolute;left: 0px;right: 0px;bottom: 0px;height: 300px;'>";
				echo libre_v1::input2(text,'','',"Viajes"					,"width: 100%",'',"disabled",botone_n);
				echo"<div id='list_viajes' style='position: absolute;background: #ffffff;left: 5px;right: 5px;bottom: 5px;top: 31px;overflow-y: auto;overflow-x: hidden;'>";
				echo"</div>";
			echo"</div>";
		echo"</div>";
		
		
	}
	if($_POST[sub1]==Vehiculos){
		echo"<div id='list_choferes' style='overflow-y: auto;position: absolute;top: 51px; width: 240px;bottom: 5px;background: #434343;box-shadow: inset 0px 0px 0px 1px white;'>";
			$consu=libre_v2::consulta(placas,$conexion,'','',Placas,0,$phpv,'','');
			while($datos=libre_v1::mysql_fe_ar	($consu,$phpv)){
				$class=botones_submenu;
				if($_POST[placas]==$datos[Placas]){$class=botone_n;}
				echo libre_v1::input2(submit,'descarga_placas','',$datos[Placas],"height: 20px;width: 175px;font-size: 10px;text-align: left;padding: 5px 5px;",'',"",$class);
				if($_POST[placas]==$datos[Placas])echo libre_v1::input2(submit,operador,'',Borrar,"height: 20px;width: 45px;",'','');
				if($_POST[placas]<>$datos[Placas])echo libre_v1::input2(button,operador,'',Borrar,"height: 20px;width: 45px;background: #444;color: white;",'','');
				
				echo"<br>";
			}				
		echo"</div>";
		//datos de chof
	}
echo"</div>";




?>