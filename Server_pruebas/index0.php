<!DOCTYPE html>
<html lang="mx" xml:lang="mx">
	<head>
		<title>Administrador</title>
		<META CHARSET='UTF-8'/>
		<meta http-equiv='Content-type' content='text/html; charset=utf-8' />
		<script language="Javascript">
			function cambia(elemento) {
				if(elemento.name=='Cliente_de_legado')			{setTimeout("location.href='Cliente_de_legado0'", 80);}
				if(elemento.name=='Cliente_de_legado/admin')	{setTimeout("location.href='Cliente_de_legado/admin'", 80);}
				if(elemento.name=='admin')						{setTimeout("location.href='admin'", 80);}
				if(elemento.name=='admin2')						{setTimeout("location.href='admin2'", 80);}
				if(elemento.name=='mysql')						{setTimeout("location.href='mysql'", 80);}
			}
		</script>
	</head>
	<body style='background: #e4e4e4;'>
		<div>
			<!--<img src='img/Clientedelegado.png' 		name='Cliente_de_legado'		onclick='cambia(this);' style='    width: 300px; border-radius: 10px;  box-shadow: 0px 5px 5px 1px #000096b3;'></img>
			<img src='img/Clientedelegadoadmin.png' name='Cliente_de_legado/admin'	onclick='cambia(this);' style='    width: 300px; border-radius: 10px;  box-shadow: 0px 5px 5px 1px #000096b3;'></img>
			<img src='img/UPTadmin.png' 			name='admin'					onclick='cambia(this);'	style='    width: 300px; border-radius: 10px;  box-shadow: 0px 5px 5px 1px #000096b3;'></img>
			<img src='img/admin2.png' 				name='admin2'					onclick='cambia(this);' style='    width: 300px; border-radius: 10px;  box-shadow: 0px 5px 5px 1px #000096b3;'></img>
			<img src='img/phpmyadmin.png' 			name='mysql'					onclick='cambia(this);' style='    width: 300px; border-radius: 10px;  box-shadow: 0px 5px 5px 1px #000096b3;'></img>
			--><?php
				$directorio = opendir("."); //ruta actual
				while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
				{
					if (is_dir($archivo))//verificamos si es o no un directorio
					{
						//echo "[".$archivo . "]<br>"; //de ser un directorio lo envolvemos entre corchetes
						echo"<img src='../img/".$archivo.".png' 			name='$archivo'					onclick='cambia(this);' style='    width: 300px; border-radius: 10px;  box-shadow: 0px 5px 5px 1px #000096b3;'></img>";
					}
					else
					{
						//echo $archivo . "<br />";
					}
				}
			?>	
		</div>
	</body>
</html>