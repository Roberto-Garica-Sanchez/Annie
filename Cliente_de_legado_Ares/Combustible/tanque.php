<?php
	libre_v2::db($db,$conexion,$phpv);
	$consu_choferes	= 	libre_v1::consulta	(choferes,$conexion	,'','','Nombre_Ch',''	,$phpv,'');
	$consu_placas	= 	libre_v1::consulta	(placas	,$conexion	,'','','Placas',''	,$phpv,'');
	$consu_clientes	= 	libre_v1::consulta	(clientes,$conexion	,'','','Nombre_Cl',''	,$phpv,'');
	libre_v2::db($db_combustible,$conexion,$phpv);
	$box_defaul="box-shadow: inset 0px 0px 2px 2px white;";
	$red="box-shadow: inset 0px 0px 2px 2px red;";
	$blue="box-shadow: inset 0px 0px 2px 2px #0066ff;";
	$guarda=true;
	$inicio=$_POST[medidor_inicio];
	$final=$_POST[medidor_final];
	$_POST[total_despachado]=$final-$inicio;
	$total=libre_v2::formato_num($_POST[total_despachado]);
	$_POST[ID_G]=libre_v2::formato_num($inicio).":".libre_v2::formato_num($final)."_".$_POST[D].":".$_POST[M].$_POST[A].":"."_".date("d").":".date("m").":".date("Y");//genera ID
	$_POST[fecha]=$_POST[A].":".$_POST[M].":".$_POST[D];
	
	if($_POST[operador]==Guardar){//verifica y guarda los datos nuevos 
		//compueva que los campos		
		$fec_ini=$_POST[A]	.libre_v2::zero($_POST[M])	.libre_v2::zero($_POST[D]);
		$fec_fin=$_POST[A_r].libre_v2::zero($_POST[M_r]).libre_v2::zero($_POST[D_r]);
		
		$style_chofer=$blue;
		$style_placas=$blue;
		$style_D=$blue;
		$style_M=$blue;
		$style_A=$blue;
		$style_medidor_inicio=$blue;
		$style_medidor_final=$blue;
		$style_nombre=$blue;
		if($_POST[chofer]==chofer)	{$guarda=false;$style_chofer=$red;			$Consola2=$Consola2."<br>Nombre: Denagado";		}		
		if($_POST[placas]==placas)	{$guarda=false;$style_placas=$red;			$Consola2=$Consola2."<br>Unidad: Denagado";		}		
		if($_POST[D]=='')			{$guarda=false;$style_D=$red;				$Consola2=$Consola2."<br>Dia: Vacio";		}		
		if($_POST[M]=='')			{$guarda=false;$style_M=$red;				$Consola2=$Consola2."<br>Mes: Vacio";		}		
		if($_POST[A]=='')			{$guarda=false;$style_A=$red;				$Consola2=$Consola2."<br>Año: Vacio";		}		
		if(($_POST[D]<1)or($_POST[D]>31)){$guarda=false;$style_D=$red;			$Consola2=$Consola2."<br>Dato: Denagado";}
		if(($_POST[M]<1)or($_POST[M]>12)){$guarda=false;$style_M=$red;			$Consola2=$Consola2."<br>Dato: Denagado";}
		if(($_POST[A]<2015)or($_POST[A]>2031)){$guarda=false;$style_A=$red;		$Consola2=$Consola2."<br>Dato: Denagado";}
		if($guarda==true){
			$consu=libre_v2::consulta(despacho,$conexion,ID_G,$_POST[ID_G],ID_G,0,$phpv,'','');
			$datos=libre_v2::mysql_fe_ar($consu,$phpv);
			if($datos[ID_G]==$_POST[ID_G]){$guarda=false;$style_ID_G=$red;		$Consola2=$Consola2."<br>ID: $datos[ID_G] Denagado YA EXISTE";}
			
		}
		
		if($_POST[nombre]=="")		{$guarda=false;$style_nombre=$red;			$Consola2=$Consola2."<br>Nombre Despachador: vacio";		}		else{$style_level_actual=$blue;}
		
		if($_POST[medidor_inicio]=="")	{$guarda=false;$style_medidor_inicio=$red;			$Consola2=$Consola2."<br>Medidor Inicio: Vacio";			}		else{$style_Capacidad=$blue;}
		if($_POST[medidor_final]=="")	{$guarda=false;$style_medidor_final=$red;			$Consola2=$Consola2."<br>Medidor final: Vacio  ";			}		else{$style_level_actual=$blue;}
		if($_POST[total_despachado]<=0)	{$guarda=false;$style_medidor_final=$style_medidor_inicio=$red;}
		if($guarda==false)$Consola2="<br>Datos $_POST[sub1]".$Consola2;
	}
	if(($_POST[operador]=="Guardar")and(($grava==true)or($guarda==true))){//guarda datos nuevos 
		$Consola2=$Consola2.libre_v1::input2(text,'','',"Guardando Datos"					,"width: 100%",'',"disabled",botone_n);
		include("../Guarda.php");
		
		$resc=$resc.libre_v1::input2(text,'','',"Guardado Completado"					,"width: 100%; background: green",'',"disabled",botone_n);
		//$consola="open";
	}
	
	
	echo"<div style='position: absolute;top: 0px;bottom: 0px;right: 225px;left: 120px;background: #05486cab;box-shadow: inset 0px 0px 1px 1px white;'>";
		echo"<div style='position: absolute;width: 200px; top: 5px; left: 5px;'>";
		
			$consu=libre_v2::consulta(tanques,$conexion,'','',ID_G,'',$phpv,'','');
			echo libre_v1::input2(text,'','','Tanque'						,"width: 40%",'',"disabled ",botone_n);
			echo libre_v2:: despliegre_mysql	(tanque,Tanques,$consu,ID_G,$phpv,'style="width: 60%;"onchange="envia_formulario();"',botones_submenu,'','');
		echo"</div>";
		$res2=0;
		$res="000.00";
		if($_POST[tanque]<>tanque){
			$consu=libre_v2::consulta(tanques,$conexion,ID_G,$_POST[tanque],ID_G,'',$phpv,'','');
			libre_v2::mysql_da_se		($consu,0,$phpv);
			$dato=libre_v2::mysql_fe_ar	($consu,$phpv);		
			$res=($dato[act_level]*100)/$dato[max_level];
			$res2=(151*$res)/100;
			$res=libre_v2::forma_num($res,2);
		}
		echo"<div style='position: absolute;width: 200px;height: 200px;background: white;left: 5px;top: 40px;box-shadow: inset 0px 0px 4px 2px black; text-align: center;overflow: hidden;'>";
			echo"<div id='level' style='position: absolute;bottom: 17px;left: 16px;right: 17px;background: #0066ff9c;height: ".$res2."px;'>";
				
			echo"</div>";
			
			echo"<div id='porsentaje'style='position: absolute;top: 44%;left: 10%;font-size: 30px;'>";			
				echo $res;echo"%";
			echo"</div>";
			echo "<img src='../img/tanque_systm.png' style='width: 200px;'>";
		echo"</div>";
		
		echo"<div style='position: absolute;top: 5px;left: 210px;right: 5px;height: 235px;box-shadow: inset 0px 0px 0px 1px white;overflow-y: auto;overflow-x: hidden; background: #ffffff5c;'>";
			
		echo"</div>";
		
		
		
	echo"</div>";
	echo"<div id='general_info' style='background: #05486cab;width: 220px;right: 0px;top: 12px;bottom: 5px;position: absolute;color: white;'>";
		echo"<div id='datos_info'>";
			if($style_D==""){$style_D=$box_defaul;}
			if($style_M==""){$style_M=$box_defaul;}
			if($style_A==""){$style_A=$box_defaul;}
			echo libre_v1::input2(text,'','','Repostage'				,"width: 100%",'',"disabled",botone_n);
			echo libre_v1::input2(text,'','','ID'						,"width: 40%",'',"disabled",botone_n);
			echo libre_v1::input2(text,ID_G,'',$_POST[ID_G]				,$style_ID_G."width: 60%;  ",'',"disabled",botones_submenu);
			echo libre_v1::input2(text,'','','Fecha'					,"width: 40%",'',"disabled",botone_n);
			echo libre_v1::input2(text,D,'',$_POST[D]					,$style_D."width: 20%;  ",'',"placeholder='01-31' 		maxlength='2' onkeypress='return valida_n(event)'",botones_submenu);
			echo libre_v1::input2(text,M,'',$_POST[M]					,$style_M."width: 20%;  ",'',"placeholder='01-12'		maxlength='2' onkeypress='return valida_n(event)'",botones_submenu);
			echo libre_v1::input2(text,A,'',$_POST[A]					,$style_A."width: 20%;  ",'',"placeholder='2015-2030'	maxlength='4' onkeypress='return valida_n(event)'",botones_submenu);
			
			echo libre_v1::input2(text,'','','Operador'					,"width: 40%",'',"disabled",botone_n);
			echo libre_v1::despliegre_mysql	(chofer,Operador,$consu_choferes,Nombre_Ch,$phpv,"style='width: 60%; $style_chofer' id='chofer' onchange='carga_arrastrados();'",botones_submenu,'Nombre_Ch',$_POST[chofer]);
				
			echo libre_v1::input2(text,'','','Unidad'					,"width: 40%",'',"disabled",botone_n);
			echo libre_v1::despliegre_mysql	(placas,Unidad,$consu_placas,Placas,$phpv,"style='width: 60%; $style_placas' id='placas'",botones_submenu,'Placas',$_POST[placas]);
				
			echo libre_v1::input2(text,'','','Medidor'					,"width: 100%",'',"disabled",botone_n);
			echo libre_v1::input2(text,'','','Inicio'					,"width: 40%",'',"disabled",botone_n);
			echo libre_v1::input2(text,medidor_inicio					,'',$_POST[medidor_inicio]			,$style_medidor_inicio."width: 60%",'',"maxlength='25'placeholder='Lts'onkeyup='Maysall(this);'",botones_submenu);
			echo libre_v1::input2(text,'','','Final'					,"width: 40%",'',"disabled",botone_n);
			echo libre_v1::input2(text,medidor_final					,'',$_POST[medidor_final]			,$style_medidor_final."width: 60%",'',"maxlength='25'placeholder='Lts'onkeyup='Maysall(this);'",botones_submenu);
			echo libre_v1::input2(text,'','','Total '					,"width: 40%",'',"disabled",botone_n);
			echo libre_v1::input2(text,''								,'',$_POST[total_despachado]		,$style_medidor_final."width: 60%",'',"maxlength='25'placeholder='Lts'onkeyup='Maysall(this);'",botones_submenu);
			
			echo libre_v1::input2(text,'','','Despachador'					,"width: 100%",'',"disabled",botone_n);
		echo"</div>";
			echo libre_v1::input2(text,'','','Nombre'					,"width: 40%",'',"disabled",botone_n);
			echo libre_v1::input2(text,nombre,'',$_POST[nombre]			,$style_nombre."width: 60%",'',"maxlength='25' onkeyup='Maysall(this);'",botones_submenu);
		
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
//consola----------------------------------------------
$class=Consola2_mini;
if($Consola[open]==true){$class=Consola2;}
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