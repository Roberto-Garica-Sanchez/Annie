<!DOCTYPE html>
<html lang="mx" xml:lang="mx">
        <head>
			    <TITLE>Admin </TITLE>
                <META CHARSET="UTF-8"/>
				<LINK REL="STYLESHEET" HREF="estilo.css"        TYPE="TEXT/CSS"/>
        </head>
	<body style='color: white;'>
		<?php
		/*
			error_reporting(0);
			ini_set( 'display_errors', false );
			error_reporting(E_ERROR | E_WARNING | E_PARSE );
			date_default_timezone_set("Mexico/General");*/
			error_reporting(E_ALL);
			ini_set('display_errors', 1);
			date_default_timezone_set("Mexico/General");
            echo'<form action="" method="POST" enctype="multipart/form-data">'; 
//login
			  if(!empty($_POST['user']))echo$me1=input2('hidden','user','',$_POST['user'],'','','');
			  if(!empty($_POST['pass']))echo$me2=input2('hidden','pass','',$_POST['pass'],'','','');
			  if(!empty($_POST['user']) and $_POST['user']<>'') {
                  echo$me1;
                  echo$me2; 
                  $conexion=login('localhost',$_POST['user'],$_POST['pass']);
              }
			  if (empty($conexion))include("login.php");
//login fin
			  if (!empty($conexion)){
			      $m1='Cuentas';
				  
				  $m4='Cerrar Sesion';
                  	include("menu.php");
                    echo$me1;
	            	echo$me2;
			    	$conexion=login('localhost',$_POST['user'],$_POST['pass']);
					if ($_POST['menu']=='')$_POST['menu']=$m1;
			    	if($_POST['menu']==$m1){include('Cuentas.php');}
					//if($_POST[menu]==$m3){include('facturas/cargador.php');}
			}
			echo'</form>';
function login($host,$user,$pass){
        $conexion=mysqli_connect($host,$user,$pass)or die("Problema Para Iniciar Secion". mysqli_connect_error());
        return $conexion;
}
function input2($type2,$name,$title,$value,$style,$id,$libre)
{
        $d='<input type="'.$type2.'" style="'.$style.'" id="'.$id.'" class="Medio" name="'.$name.'" value="'.$value.'" title="'.$title.'" '.$libre.' >';
        return $d;
}
		?>
	</body>
</html>
