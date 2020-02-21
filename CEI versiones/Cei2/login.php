<?php

	$cei="cei";
	$school="school";
	$user="gerente";
	//$cei="id4258000_cei";
	//$user="id4258000_gerente";
//	include("libre_v1.php");				if($libre_v1=="")		{echo"<script>alert('[libre_v1] no localizado');</script>";}
		$conexion= libre_v1::login('localhost',$user,gerente,"",$phpv);//cambia segun cada server
	echo"<div style='position: relative;width: 400px;height: 600px;background: #06f9;margin-left: auto;margin-right: auto;margin-top: auto;margin-bottom: auto;box-shadow: 0px 10px 10px 1px #0009; color: white;'>";	
		echo"<div style='position: absolute;width: 400px;height: 40px;background: #565656;font-size: 30px;text-align: center;'>";
			echo"Regístrate en CEI";
		echo"</div>";
		echo"<div style='position: absolute;top: 50px;right: 20px;left: 20px;bottom: 50px;'>";
		$style=" width: 50%;font-size: 20px; height: 40px;margin: 6px 0px;";
			echo libre_v1::input2(button,'','','Nombre'	,$style."background: black;"	,''	,"",botone_n);
			echo libre_v1::input2(text	,'','',''		,$style,'nombre'					,"placeholder='Mario Alberto'			maxlength ='50'	onkeyup='ElemMaysPrim(this)'",botones_submenu);

			echo libre_v1::input2(button,'','','Apellidos'	,$style."background: black;"	,''	,"",botone_n);
			echo libre_v1::input2(hidden,'','',' '		,$style,'firt'						,"placeholder='Sánchez Farias'	maxlength ='50'	onkeyup='ElemMaysPrim(this)'",botones_submenu);
			echo libre_v1::input2(text	,'','',''		,$style,'last'						,"placeholder='Sánchez Farias'		maxlength ='50'	onkeyup='ElemMaysPrim(this)'",botones_submenu);
			echo libre_v1::input2(button,'','','Correo '	,$style."background: black;"	,''	,"",botone_n);
			echo libre_v1::input2(text	,'','',''		,$style.'font-size: 15px;','mail'						,"placeholder='Email(@ucol.mx)' maxlength ='50'								   ",botones_submenu);
			echo libre_v1::input2(button,'','',' N° Cuenta'	,$style."background: black;"	,''	,"",botone_n);
			echo libre_v1::input2(text	,'','',''		,$style,'cuenta'					,"placeholder='20122000' 	maxlength ='8'	onchange='ver_cuenta()' onkeypress='return valida_n(event)' ",botones_submenu);
			echo libre_v1::input2(button,'','','Nivel Ingles'	,$style."background: black;"	,''	,"",botone_n);
			//echo libre_v1::input2(text	,'','',''		,$style,'level'						,"placeholder='B+' 	  	maxlength ='10' onkeyup='ElemMaysPrim(this)''",botones_submenu);
						libre_v1::db		($cei,$conexion,$phpv);
			$consu	= 	libre_v1::consulta	(nivel,$conexion	,'','','','1'	,$phpv,'');
			echo libre_v1::despliegre_mysql	(nivel,Nivel,$consu,nivel,$phpv,"style='$style' id='level'",botones_submenu);
			echo libre_v1::input2(button,'','','Escuela'	,$style."background: black;"	,''	,"",botone_n);
			
						
			$consu	= 	libre_v1::consulta	($school,$conexion	,'','','','1'	,$phpv,'');
			echo libre_v1::despliegre_mysql	(school,School,$consu,tag,$phpv,"style='$style' id='school'",botones_submenu);
			echo libre_v1::input2(button,'','',Regístrarse,$style."position: absolute;bottom: 0px;right: 0px;",''," onclick='reg_alum()'",botones_submenu);
			echo"<div style='    position: absolute;bottom: 50px;left: 0px;right: 0px;height: 120px;font-size: 20px;text-align: center;'>";
				echo"Registrate para Asistir a Cursos y Actividades en el Centro Estudio de Idiomas";
			echo"</div>";
		echo"</div>";
	/*
		echo "<img src='../img/user-sistem.png' 	style='position: absolute; width: 80px; top: 41px; left: 30px;' />";
		echo "<img src='../img/school-sistem.png' 	style='position: absolute; width: 80px; top: 417px; left: 30px;' />";
		*/
		echo"<div id='Respuesta' style='text-align: center;padding-top: 10px;position: absolute;bottom: 0px;left: 10px;right: 10px;height: 35px;background: black;'>";
		echo"</div>";
	
	echo"</div>";
	
	
	$login=" ";
?>