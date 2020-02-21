<?php
/*    
session_start();

if (!isset($_SESSION['count'])) {
  $_SESSION['count'] = 0;
} else {
  $_SESSION['count']++;
}
echo $_SESSION['count'];
*/

$styleRed="box-shadow: inset 0px 0px 20px red;";
if(!empty($_POST['operacion']) and $_POST['operacion']=='Registra'){//registra nuevo usuario con dependencia de autorizacion

    $proceso_reg=true;
    if(empty($_POST['tag_new']))    {$proceso_reg=false;$style_new_tag=$styleRed;}
    if(empty($_POST['user_new']))   {$proceso_reg=false;$style_new_user=$styleRed;}
    if(empty($_POST['pass_new']))   {$proceso_reg=false;$style_new_pass=$styleRed;}
    if(empty($_POST['passconfi']))  {$proceso_reg=false;$style_new_passconfi=$styleRed;}
    if(empty($_POST['usergere']))   {$proceso_reg=false;$style_usergere=$styleRed;}
    if(empty($_POST['passgere']))   {$proceso_reg=false;$style_passgere=$styleRed;}
    if((!empty($_POST['pass_new']) and !empty($_POST['passconfi'])) and $_POST['pass_new']!=$_POST['passconfi']){
        $proceso_reg=false;
        $style_new_pass=$styleRed;
        $style_new_passconfi=$styleRed;
        if(empty($consola_regis))$consola_regis='';
        $consola_regis=$consola_regis."Los Contraseñas no coinciden";
    }
    if($proceso_reg==true){
        
        $login_conexcion=$libre_v2->login("localhost",'invitado','rFWRPsmmy9jjRNuY','',$phpv);
        $libre_v2->db('login',$login_conexcion,$phpv);
            $tabla="usuarios";
			$getColumnas        = array('ID_G','pribi') ;
			$BuscaColumnas      = array('nombre','clave') ;
			$BuscaDatos         = array($_POST['usergere'],$_POST['passgere']);
			
			$array=array(
				"tabla"=>$tabla,
				"Operacion"=>
				array(  'INSERT'=>array(
						"Activar"    =>'false'
					),      'SELECT'=>array(
						"Activar"	=>'true',//'false'
						"LIKE"		=>'false',//'false'
						"getColumnas"    =>$getColumnas,//array()
						"BuscaColumnas"  =>$BuscaColumnas,//array()
						"BuscaDatos"     =>$BuscaDatos//array()

					),      'UPDATE'=>array(
						"Activar"	=>'false'
					),      'DELETE'=>array(
						"Activar"	=>'false'
					)
				)
            );
        $Ares_v1-> GeneraSql($array);
        echo $sql=$Ares_v1-> getSql();
        $consu=$libre_v2->ejecuta($login_conexcion,$sql,$phpv);
        $res=$libre_v2->mysql_nu_ro($consu,$phpv);
        if($res>0){
            
        }else{
            echo"Acceso denegado al gerente ";
        }


    }
    /*
        if(empty($_POST['usergere']) or empty($_POST['passgere'])){//falta usuario y contraseña ele administrador
            
            $consola_regis='Se Requiere autorizacion de un administrador';			
            $acceso_registro=false;
        }else{//verifica permisos de el administra

            $login_conexcion=$libre_v2->login("localhost",'invitado','rFWRPsmmy9jjRNuY','',$phpv);
            $libre_v2->db('login',$login_conexcion,$phpv);
            $consu_usergere_existe=$libre_v2->consulta('usuarios',$login_conexcion,'nombre',$_POST['usergere'],'','',$phpv,'',true);
            echo $libre_v2->mysql_nu_ro($consu_usergere_existe,$phpv);

            //$dato=$libre_v2->mysql_fe_ar($consu_usergere_existe,$phpv,'');
            //$libre_v2->mysql_fe_ar($consu_usergere_existe,$phpv,'');
            
            $acceso_registro=true;
            *
            if($_POST['usergere']==$dato['nombre']){//
                if($_POST['passgere']==$dato['clave']){
                    $_POST[tag]=$dato[tag];
                    
                    //$consola_regis="Accesso Consedido ";
                    $consola_regis="";
                }else{
                    $acceso_registro=false;
                    $consola_regis="Accesso Denegado";
                }
            }else{
                $acceso_registro=false;
                $consola_regis=$consola_regis."El Gerente no Existe";
            }
            *
        }		
    */
}	
//-------------memoria
echo"<div style='display: none;position: absolute;width: 120px;overflow-y: auto;max-height: 600px; top: 50px;'>";
echo $libre_v2->input2('hidden','tag','',$_POST['tag'],'',"tag",'','');
                    //($type2,$name,$title,$value,$style,$id,$libre,$class)
echo $libre_v2->input2('hidden','usuario','',$_POST['usuario'],'',"usuario",'','');
echo $libre_v2->input2('hidden','menu_login','',$_POST['menu_login'],'','menu_login','','');

echo"</div>";
if(empty($_POST['tag'])){$win_carga="login_user";}
if(!empty($_POST['menu_login']) and $_POST['menu_login']=='Login'){$win_carga="login_user";}
if(!empty($_POST['menu_login']) and $_POST['menu_login']=='Registrarse'){$win_carga="registra_user";}
if(!empty($_POST['tag'])){$win_carga="";}
if($win_carga=="login_user"){
	echo"<div style='position: relative; width: 400px; height: 400px; background: #06f9; margin-left: auto; margin-right: auto;	margin-top: auto; margin-bottom: auto; box-shadow: 0px 10px 10px 1px #0009;'>";
		echo"<div style='position: absolute; width: 400px; height: 40px; background: #565656; font-size: 30px; text-align: center;'>";
			echo"Inicio de Seccio";
		echo"</div>";
		if(empty($style_user)){$style_user="";}
		if(empty($style_pass)){$style_pass="";}
		echo $libre_v2->input2('image','','',''							,"position: absolute; top: 160px;  left: 55px; width: 50px; height 50px;",'',"src='../img/user-sistem.png'disabled",'');
		echo $libre_v2->input2('image','','',''							,"position: absolute; top: 230px; left: 55px; width: 50px; height 50px;",'',"src='../img/candado-sistem.png'disabled",'');
		echo $libre_v2->input2('text','user','',''						,$style_user."position: absolute; top: 160px;  left: 125px; font-size: 20px; text-align: center; height: 50px; width: 200px; ",'',"placeholder='Usuario'",'');
		echo $libre_v2->input2('password','pass','',''					,$style_pass."position: absolute; top: 230px; left: 125px; font-size: 20px; text-align: center;height: 50px; width: 200px; ",'',"placeholder='Contraseña'",'');
		echo $libre_v2->input2('submit','operacion','','Conectar'		,"position: absolute; top: 300px; left: 175px; font-size: 20px; height: 50px; width: 150px; color: white; background: #565656; ",'','','');
		echo $libre_v2->input2('submit','menu_login','','Registrarse'	,"position: absolute; top: 300px; left: 55px;  					 			  				color: white; background: #565656; ",'','','');
		echo $libre_v2->input2('image','logo','',''						,"position: absolute;top: 50px;left: 150px;width: 100px;",'','src="../img/logo.jpg"disabled','');
		echo"<div style='position: absolute;width: 400px;height: 17px;background: #ffffff;text-align: center;bottom: 0px;box-shadow: inset 0px 0px 20px #0066ff;'>";
		if(!empty($consola_login))echo $consola_login;
		echo"</div>";
	echo"</div>";
}
if($win_carga=="registra_user"){
	echo"<div style='position: relative; width: 400px; height: 590px; background: #06f9; margin-left: auto; margin-right: auto;	margin-top: auto; margin-bottom: auto; box-shadow: 0px 10px 10px 1px #0009;'>";

		echo"<div style='display: none;position: absolute; width: 400px; height: 40px; background: #565656; font-size: 30px; text-align: center;'>";
			echo"Registro De Usuario";
		echo"</div>";
		if(empty($style_new_tag))$style_new_tag="";
		if(empty($style_new_user))$style_new_user="";
		if(empty($style_new_pass))$style_new_pass="";
		if(empty($style_new_passconfi))$style_new_passconfi="";
		if(empty($style_usergere))$style_usergere="";
		if(empty($style_passgere))$style_passgere="";
		echo $libre_v2->input2('text','tag_new','',''			,$style_new_tag."position: absolute; top: 60px;  left: 125px; font-size: 20px; height: 30px; width: 200px; text-align: center;",'',"placeholder='Alias'",'');
		echo $libre_v2->input2('text','user_new','',''			,$style_new_user."position: absolute; top: 120px;  left: 125px; font-size: 20px; height: 30px; width: 200px; text-align: center;",'',"placeholder='Usuario'",'');
		echo $libre_v2->input2('password','pass_new','',''		,$style_new_pass."position: absolute; top: 180px; left: 125px; font-size: 20px; height: 30px; width: 200px; text-align: center;",'',"placeholder='Contraseña'",'');
		echo $libre_v2->input2('password','passconfi','',''		,$style_new_passconfi."position: absolute; top: 240px; left: 125px; font-size: 20px; height: 30px; width: 200px; text-align: center;",'',"placeholder='Confirmacion'",'');
		echo $libre_v2->input2('text','usergere','',''			,$style_usergere."position: absolute; top: 420px; left: 125px; font-size: 20px; height: 30px; width: 200px; text-align: center;",'',"placeholder='Usuario Admin'",'');
		echo $libre_v2->input2('password','passgere','',''		,$style_passgere."position: absolute; top: 480px; left: 125px; font-size: 20px; height: 30px; width: 200px; text-align: center;",'',"placeholder='Contraseña'",'');
		
		echo $libre_v2->input2('image','','',''				,"position: absolute; top: 60px;  left: 55px; width: 30px; height 50px;",'',"src='../img/user-sistem.png' disabled",'');
		echo $libre_v2->input2('image','','',''				,"position: absolute; top: 180px; left: 55px; width: 30px; height 50px;",'',"src='../img/candado-sistem.png'disabled",'');
		echo $libre_v2->input2('image','','',''				,"position: absolute; top: 240px; left: 55px; width: 30px; height 50px;",'',"src='../img/candado-sistem.png'disabled",'');
		echo $libre_v2->input2('image','','',''				,"position: absolute; top: 480px; left: 55px; width: 30px; height 50px;",'',"src='../img/candado-sistem.png'disabled",'');
		echo $libre_v2->input2('image','','',''				,"position: absolute; top: 300px; left: 55px; width: 30px; height 50px;",'',"src='../img/llave-sistem.png'disabled",'');
		echo $libre_v2->input2('image','','',''				,"position: absolute; top: 420px; left: 55px; width: 40px; height 50px;",'',"src='../img/admin-sistem.png'disabled",'');
		
		echo"<div style='position: absolute; width: 400px; height: 40px; background: #565656; font-size: 30px; text-align: center; top: 360px;'>";
			echo"Autorizacion";
		echo"</div>";		
		
		echo $libre_v2->input2('submit','operacion','','Registra'	,"position: absolute; top: 530px; left: 175px; font-size: 20px; height: 30px; width: 150px; color: white; background: #565656;text-align: center;",'','','');
		echo $libre_v2->input2('submit','menu_login','','Login'		,"position: absolute; top: 530px; left: 55px;  					 			  				color: white; background: #565656;text-align: center;",'','','');
		
		//echo input2(image,'logo','','','','','src="../img/logo.jpg"');
			$sel_name='pribi';
			$sel_style="position: absolute; top: 300px;  left: 125px; font-size: 20px; height: 30px; width: 200px; text-align: center; padding: 0px 10px;";
			$sel_libre='';
			$sel_conta=3;
			$sel_value 	= array(1,2,3,5);
			$sel_visual = array("Invitado","Empleado","Administrador","Gerente");
			$sel_title	= array("Consultas","Altas/Consultas","Altas/Consultas/Cambios","Altas/Consultas/Cambios/borrar");
			$sel_libre2 = array("","","","");
		echo $libre_v2->select($sel_name,$sel_style,$sel_libre,$sel_conta,$sel_value,$sel_visual,$sel_title,$sel_libre2);
		echo"<div style='position: absolute;width: 400px;height: 17px;background: #000000;text-align: center;bottom: 0px;box-shadow: inset 0px 0px 20px #0066ff;'>";
			if(!empty($consola_regis))echo $consola_regis;
		echo"</div>";
	echo"</div>";
}
?>