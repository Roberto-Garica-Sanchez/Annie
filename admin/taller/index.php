<!DOCTYPE html>
<html lang="mx" xml:lang="mx">
        <head>
			    <TITLE>Taller </TITLE>
                <META CHARSET="UTF-8"/>
				<LINK REL="STYLESHEET" HREF="estilo.css"        TYPE="TEXT/CSS"/>
        </head>
	<body>
		<?php
		//php7
			error_reporting(0);
			ini_set( 'display_errors', false );
			error_reporting(E_ERROR | E_WARNING | E_PARSE );
			date_default_timezone_set("Mexico/General");
            echo'<form action="" method="POST" enctype="multipart/form-data">';
			include("libre_ind.php");
			$id="";
			include("login.php");
			 if ($proce1==2){
				$m1=Cuentas;
				$m2=Taller;
				include("menu.php");
                if ($_POST[menu]=='')$_POST[menu]=$m2;
			    if ($_POST[menu]==$m1){include('Cuentas.php');}
				if ($_POST[menu]==$m2){include('Taller.php');}
			}
			echo'</form>';
function login($host,$user,$pass,$db){
        $conexion=mysqli_connect($host,$user,$pass)or die("Problema Para Iniciar Secion");
        return $conexion;
}
function input2($type2,$name,$title,$value,$style,$id,$libre){
        $d='<input type="'.$type2.'" style="'.$style.'" id="'.$id.'" class="Medio" name="'.$name.'" value="'.$value.'" title="'.$title.'" '.$libre.' >';
        return $d;
}
		?>
	</body>
</html>
