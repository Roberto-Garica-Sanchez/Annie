<?php //php7
$progra_login2=1;
error_reporting(0);
ini_set( 'display_errors', false );
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE );
date_default_timezone_set("Mexico/General");
include("../libre_uni.php");
if($libre_uni==""){echo"<script>alert('libre_uni no localizado');</script>";}

if (($_POST[regis]==Login)or($_POST[regis]=='')){}
			$title=div("position: absolute; width: 400px; height: 40px; background: #565656; font-size: 30px; text-align: center;",'',"Inicio de Seccio");
			$style="position: relative; width: 400px; height: 400px; background: #06f9; margin-left: auto; margin-right: auto;	margin-top: auto; margin-bottom: auto; box-shadow: 0px 10px 10px 1px #0009;";
			$img=	input2(image,'','',''				,"position: absolute; top: 160px;  left: 55px; width: 50px; height 50px;",'',"src='img/user-sistem.png'");
			$can=	input2(image,'','',''				,"position: absolute; top: 230px; left: 55px; width: 50px; height 50px;",'',"src='img/candado-sistem.png'");
			$us=	input2(text,user,'',''				,"position: absolute; top: 160px;  left: 125px; font-size: 20px; height: 50px; width: 200px; ",'',"placeholder='Usuario'");
			$pa=	input2(password,pass,'',''			,"position: absolute; top: 230px; left: 125px; font-size: 20px; height: 50px; width: 200px; ",'',"placeholder='Contraseña'");
			$env=	input2(submit,operacion,'',Conectar	,"position: absolute; top: 300px; left: 175px; font-size: 20px; height: 50px; width: 150px; color: white; background: #565656; ");
			$reg=	input2(submit,regis,'',Registrarse	,"position: absolute; top: 300px; left: 55px;  					 			  				color: white; background: #565656; ");
			$log=	input2(image,'logo','',''			,"position: absolute; top: 50px;  left: 150px; width: 100px;",'','src="img/logo.jpg"');
			$login= div($style,'',$title.$img.$us.$can.$pa.$env.$reg.$log);
/*		
		if ($_POST[regis]==Registrarse){
			$title=	div("position: absolute; width: 400px; height: 40px; background: #565656; font-size: 30px; text-align: center;"				,'',"Registro De Usuario");
			$title2=div("position: absolute; width: 400px; height: 40px; background: #565656; font-size: 30px; text-align: center; top: 300px;"	,'',"Autorizacion");
			$style="position: relative; width: 400px; height: 550px; background: #06f9; margin-left: auto; margin-right: auto;	margin-top: auto; margin-bottom: auto; box-shadow: 0px 10px 10px 1px #0009;";
			$img=	input2(image,'','',''				,"position: absolute; top: 60px;  left: 55px; width: 30px; height 50px;",'',"src='img/user-sistem.png'");
			$can=	input2(image,'','',''				,"position: absolute; top: 120px; left: 55px; width: 30px; height 50px;",'',"src='img/candado-sistem.png'");
			$can2=	input2(image,'','',''				,"position: absolute; top: 180px; left: 55px; width: 30px; height 50px;",'',"src='img/candado-sistem.png'");
			$can3=	input2(image,'','',''				,"position: absolute; top: 420px; left: 55px; width: 30px; height 50px;",'',"src='img/candado-sistem.png'");
			$lla=	input2(image,'','',''				,"position: absolute; top: 240px; left: 55px; width: 30px; height 50px;",'',"src='img/llave-sistem.png'");
			$adm=	input2(image,'','',''				,"position: absolute; top: 360px; left: 55px; width: 40px; height 50px;",'',"src='img/admin-sistem.png'");
			
			$us=	input2(text,user_new,'',''			,"position: absolute; top: 60px;  left: 125px; font-size: 20px; height: 30px; width: 200px; ",'',"placeholder='Usuario'");
			$pa=	input2(password,pass_new,'',''		,"position: absolute; top: 120px; left: 125px; font-size: 20px; height: 30px; width: 200px; ",'',"placeholder='Contraseña'");
			$pa2=	input2(password,passconfi,'',''		,"position: absolute; top: 180px; left: 125px; font-size: 20px; height: 30px; width: 200px; ",'',"placeholder='Confirmacion'");
			$us2=	input2(text,usergere,'',''			,"position: absolute; top: 360px; left: 125px; font-size: 20px; height: 30px; width: 200px; ",'',"placeholder='Usuario Admin'");
			$pa3=	input2(password,passgere,'',''		,"position: absolute; top: 420px; left: 125px; font-size: 20px; height: 30px; width: 200px; ",'',"placeholder='Contraseña'");
			
			$env=	input2(submit,operacion,'',Registra	,"position: absolute; top: 480px; left: 175px; font-size: 20px; height: 30px; width: 150px; color: white; background: #565656; ");
			$reg=	input2(submit,regis,'',Login		,"position: absolute; top: 480px; left: 55px;  					 			  				color: white; background: #565656; ");
			$log=	input2(image,'logo','','','','','src="img/logo.jpg"');
				$sel_name=pribi;
				$sel_style="position: absolute; top: 240px;  left: 125px; font-size: 20px; height: 30px; width: 200px;";
				$sel_libre='';
				$sel_conta=3;
				$sel_value 	= array(1,2,3,5);
				$sel_visual = array("Invitado","Empleado","Administrador","Gerente");
				$sel_title	= array("Consultas","Altas/Consultas","Altas/Consultas/Cambios","Altas/Consultas/Cambios/borrar");
				$sel_libre2 = array("","","","");
			$pri=select($sel_name,$sel_style,$sel_libre,$sel_conta,$sel_value,$sel_visual,$sel_title,$sel_libre2);

			echo div($style,'',$title.$img.$us.$can.$pa.$pa2.$can2.$lla.$pri.$title2.$adm.$us2.$can3.$pa3.$reg.$env);
		}
		*/
?>
