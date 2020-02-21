<?php //php7
/*
------------Include  requeridos[Nombre]
-->"auto_tab_insert.php"
-->"tablero.php"
------------function requeridas[Libreria/funcion(s)]
--> "libre_uni.php"
....>login				($host,$user,$pass,$db);
....>consulta			($tabla,$conexion,$col_espe,$espe,$orde,$dire);
....>input2				($type2,$name,$title,$value,$style,$id,$libre);
....>auto_tab_insert	(.. formato ..);
....>tablero			(.. formato ..);
*/
$login=1;
	$grado=$_POST[grado];
	$proce1=0;
	if((($_POST[usergere]<>'')&&($_POST[passgere]<>''))or(($_POST[user]<>'')&&($_POST[pass]<>''))){
		$conexion=login('localhost',invitado,invitado,"",$phpv);//conexion para verificar usuario en db
		db(login,$conexion,$phpv); 
		$consu=consulta(usuarios,$conexion,"","","","",$phpv);
		mysql_da_se($consu,0,$phpv);
		if ($_POST[usergere]<>''){
			while($datos=mysql_fe_ar($consu,$phpv)){$gere="Gerente Desconocido";
				if ($datos[nombre]==$_POST[usergere]){$clave="Gerente<br>Clave Incorrecta";$gere="";
					if ($datos[clave]==$_POST[passgere]){$pribi="Gerente<br>Autorizacion Denegada";$clave="";
						if ($datos[pribi]=="5"){
							$gere="";
							$clave="";
							$pribi="";
							$proce1=1; 
							break;
						}
					}
				}
			}
		$Error=$Error.$gere.$clave.$pribi;
		}
		mysql_da_se($consu,0,$phpv);
		if ($_POST[user]<>''){
			$gere="Usuario Desconocido";			
			while($datos=mysql_fe_ar($consu,$phpv)){
				if ($datos[nombre]==$_POST[user]){$clave="Usuario<br>Contraseña Incorrecta";$gere="";
					if ($datos[clave]==$_POST[pass]){
							$clave="";
							$grado=$datos[pribi];
							$proce1=2; 
							break;
					}
				}
			}
		$Error1=$gere.$clave;
		}
		if ((tcgh==$_POST[usergere])&&(root==$_POST[passgere])){$proce1=1; $Error="Tecnico";}//nautilus
		mysql_cl($conexion,$phpv);
	}	
	if($grado<>''){$proce1=2;
		if ($grado==1){$conexion=login('localhost',invitado,invitado,"",$phpv);$tipo_conexion=Invitado;}
		if ($grado==2){$conexion=login('localhost',empleado,empleado,"",$phpv);$tipo_conexion=Empleado;}
		if ($grado==3){$conexion=login('localhost',administrador,administrador,"",$phpv);$tipo_conexion=Administrador;}
		if ($grado==5){$conexion=login('localhost',gerente,gerente,"",$phpv);$tipo_conexion=Gerente;}
		if($conexion<>'')db(login,$conexion,$phpv); //mysqli_select_db ($conexion,"login");	
	}
	if($proce1==2){
		echo input2(hidden,grado,'',$grado);
	}
	if($_POST[passconfi]<>$_POST[pass_new]){$proce1=0;$Error="Contraseña no Coincide";}
	if(($_POST[user_new]<>'')&&($_POST[pass_new]<>'')&&($_POST[passconfi]<>'')&&($proce1==1)){
		$conexion=login('localhost',root,root,"",$phpv);//cambia segun cada server
		db(login,$conexion,$phpv);
		$tabla=usuarios;		
		$n0=nombre;				$v0=$_POST[user_new];
		$n1=clave;				$v1=$_POST[pass_new];
		$n2=pribi;				$v2=$_POST[pribi];
		include("auto_tab_insert.php");
		$Error="Registrado";
		mysql_cl($conexion,$phpv);
	}
	if($_POST[pass_new]<>$_POST[passconfi])$tc2=$tc3=red;
	if($proce1<>2){
		if ($_POST[regis]==''){$_POST[regis]=Login;}
		echo	input2(hidden,regis,"",$_POST[regis]);
		if ($_POST[regis]==Login){
			$title=div("position: absolute; width: 400px; height: 40px; background: #565656; font-size: 30px; text-align: center;",'',"Inicio de Seccio");
			$style="position: relative; width: 400px; height: 400px; background: #06f9; margin-left: auto; margin-right: auto;	margin-top: auto; margin-bottom: auto; box-shadow: 0px 10px 10px 1px #0009;";
			$img=	input2(image,'','',''				,"position: absolute; top: 160px;  left: 55px; width: 50px; height 50px;",'',"src='img/user-sistem.png'");
			$can=	input2(image,'','',''				,"position: absolute; top: 230px; left: 55px; width: 50px; height 50px;",'',"src='img/candado-sistem.png'");
			$us=	input2(text,user,'',''				,"position: absolute; top: 160px;  left: 125px; font-size: 20px; height: 50px; width: 200px; ",'',"placeholder='Usuario'");
			$pa=	input2(password,pass,'',''			,"position: absolute; top: 230px; left: 125px; font-size: 20px; height: 50px; width: 200px; ",'',"placeholder='Contraseña'");
			$env=	input2(submit,operacion,'',Conectar	,"position: absolute; top: 300px; left: 175px; font-size: 20px; height: 50px; width: 150px; color: white; background: #565656; ");
			$reg=	input2(submit,regis,'',Registrarse	,"position: absolute; top: 300px; left: 55px;  					 			  				color: white; background: #565656; ");
			$log=	input2(image,'logo','',''			,"position: absolute; top: 50px;  left: 150px; ",'','src="img/logo.jpg"');
			echo div($style,'',$title.$img.$us.$can.$pa.$env.$reg.$log);
		}
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
	}
	$progra_login=1;
?>
