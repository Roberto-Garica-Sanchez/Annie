<?php
$user=root;
$pass=root;
$empresa=empresa;
	include("../libre_v2.php");				if($libre_v1=="")		{echo"<script>alert('[libre_v1] no localizado');</script>";}
	if($_POST[js]==1){//configuracion para js 
		$conexion= libre_v1::login('localhost',$user,$pass,"",$phpv);//cambia segun cada server
	}
	//if($_POST[win_carga]==""){}
	if($_POST[win_carga]=="Nuevo"){//INTERFACE NUEVA CUETA
		echo"<div id='info_nuevo' style='padding: 3px;position: absolute;right: 5px;width: 220px;background: #ffffff8c;height: 400px;box-shadow: inset 0px 0px 10px black;top: 15px;	'>";
			echo libre_v1::input2(button,'','',"Folio"		,'height: 20px; width: 100px; background: black;'	,'','',botones_submenu);
			echo libre_v1::input2(text	,'','',''			,'height: 20px; width: 120px;'						,'cuenta1','placeholder="Folio 1" maxlength="10"	"',botones_submenu);
			echo libre_v1::input2(button,'','',"Sub Folio"	,'height: 20px; width: 100px; background: black;'	,'','',botones_submenu);
			echo libre_v1::input2(text	,'','',''			,'height: 20px; width: 120px;'						,'cuenta2','placeholder="Folio 2" maxlength="10"	"',botones_submenu);
			echo libre_v1::input2(button,'','',"Sub Folio"	,'height: 20px; width: 100px; background: black;'	,'','',botones_submenu);
			echo libre_v1::input2(text	,'','',''			,'height: 20px; width: 120px;'						,'cuenta3','placeholder="Folio 3" maxlength="10"	"',botones_submenu);
			echo libre_v1::input2(button,'','',"Sub Folio"	,'height: 20px; width: 100px; background: black;'	,'','',botones_submenu);
			echo libre_v1::input2(text	,'','',''			,'height: 20px; width: 120px;'						,'cuenta4','placeholder="Folio 4" maxlength="10"	"',botones_submenu);
			
			echo libre_v1::input2(button,'','',"Operador"	,'height: 20px; width: 100px;background: black;'	,'','',botones_submenu);
						libre_v1::db		($empresa,$conexion,$phpv);
			$consu	= 	libre_v1::consulta	(choferes,$conexion	,'','','','1'	,$phpv,'');
			echo libre_v1::despliegre_mysql	(chofer,Choferes,$consu,Nombre_Ch,$phpv	,"style='height: 20px;width: 120px;' id='chofer_nuevo'",botones_submenu);
			echo libre_v1::input2(button,'','',"Unicad"	,'height: 20px; width: 100px;background: black;','','',botones_submenu);
						libre_v1::db		($empresa,$conexion,$phpv);
			$consu	= 	libre_v1::consulta	(placas,$conexion	,'','','','1'	,$phpv,'');
			echo libre_v1::despliegre_mysql	(placas,Placas,$consu,Placas,$phpv		,"style='height: 20px;width: 120px;' id='placas_nuevo'",botones_submenu);
			echo libre_v1::input2(button,'','',"Cliente"	,'height: 20px; width: 100px;background: black;','','',botones_submenu);
						libre_v1::db		($empresa,$conexion,$phpv);
			$consu	= 	libre_v1::consulta	(clientes,$conexion	,'','','','1'	,$phpv,'');
			echo libre_v1::despliegre_mysql	(cliente,Clientes,$consu,Nombre_Cl,$phpv,"style='height: 20px;width: 120px;' id='cliente_nuevo'",botones_submenu);
			echo libre_v1::input2(button,'','',"Fecha Inicio"	,'height: 20px; width: 100px; background: black;','','',botones_submenu);
			echo libre_v1::input2(text,D,'',date("d")			,$style."height: 20px;width: 40px;",'D'	,"maxlength='2'onkeypress='return valida_n(event)'",botones_submenu);
			echo libre_v1::input2(text,M,'',date("m")			,$style."height: 20px;width: 40px;",'M'	,"maxlength='2'onkeypress='return valida_n(event)'",botones_submenu);
			echo libre_v1::input2(text,A,'',date("Y")			,$style."height: 20px;width: 40px;",'A'	,"maxlength='4'onkeypress='return valida_n(event)'",botones_submenu);
			echo libre_v1::input2(button,'','',"Fecha Final"	,'height: 20px; width: 100px; background: black;','','',botones_submenu);
			echo libre_v1::input2(text,D_r,'',date("d")			,$style."height: 20px;width: 40px;",'D_r',"maxlength='2'onkeypress='return valida_n(event)'",botones_submenu);
			echo libre_v1::input2(text,M_r,'',date("m")			,$style."height: 20px;width: 40px;",'M_r',"maxlength='2'onkeypress='return valida_n(event)'",botones_submenu);
			echo libre_v1::input2(text,A_r,'',date("Y")			,$style."height: 20px;width: 40px;",'A_r',"maxlength='4'onkeypress='return valida_n(event)'",botones_submenu);
			
			echo libre_v1::input2(button,'','',"Flete R"	,'height: 20px; width: 100px; background: black;'	,'','',botones_submenu);
			echo libre_v1::input2(text	,'','',''			,'height: 20px; width: 120px;'						,'flete_r_nuevo','placeholder="Flete real" maxlength="15"	"',botones_submenu);
			echo libre_v1::input2(button,'','',"KM Inicio"	,'height: 20px; width: 100px; background: black;'	,'','',botones_submenu);
			echo libre_v1::input2(text	,'','',''			,'height: 20px; width: 120px;'						,'km_i_nuevo','placeholder="Kilometraje" maxlength="15"	"',botones_submenu);
			echo libre_v1::input2(button,'','',"KM Final"	,'height: 20px; width: 100px; background: black;'	,'','',botones_submenu);
			echo libre_v1::input2(text	,'','',''			,'height: 20px; width: 120px;'						,'km_f_nuevo','placeholder="Kilometraje" maxlength="15"	"',botones_submenu);
			echo libre_v1::input2(button,'','',"N° Cuenta"	,'height: 20px; width: 100px; background: black;'	,'','',botones_submenu);
			echo libre_v1::input2(text	,'','',''			,'height: 20px; width: 120px;'						,'n_c_nuevo','placeholder="Nuemro de Cuenta" maxlength="15" disabled',botones_submenu);
			echo libre_v1::input2(button,'','',"Comentario"	,'height: 20px;  background: black;'				,'','',botones_submenu);
			echo libre_v1::input2(tarea	,'','',''			,''													,'come_nuevo','placeholder="Comentario" maxlength="200" ',botones_submenu);
			
			
		echo"</div>";
		echo"<div id='gen_nuevo' style='padding: 3px;position: absolute;left: 5px;top: 5px;width: 600px;height: 450px;background: #ffffff8c;box-shadow: inset 0px 0px 5px black;'>";
		echo"</div>";
		echo"<div id='con_nuevo' style='padding: 3px;position: absolute;bottom: 0px;left: 20px;right: 20px;background:#ffffff8c;height: 30px;box-shadow: inset 0px 0px 5px 1px black;'>";
		echo"</div>";
	}
	 $windows=1;
?>