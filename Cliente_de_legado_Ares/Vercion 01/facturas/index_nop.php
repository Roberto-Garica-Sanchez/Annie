<!DOCTYPE html>
<html lang="mx" xml:lang="mx">
        <head>
			    <TITLE>Deposito De Facturas</TITLE>
                <META CHARSET="UTF-8"/>
		<LINK REL="STYLESHEET" HREF="estilo.css"        TYPE="TEXT/CSS"/>
        </head>
	<body>
		<?php
		  include("estru.php");
		?>
		<form action="" method="post" entype="multipart/form-data">
			<input type="file" name="Car_Arch">
		<?php
			echo$z=input(submit,'',Guardar);
		?>
		</form>
	</body>
</html>
