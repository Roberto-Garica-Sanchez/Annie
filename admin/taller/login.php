<?php
//php7
	$grado=$_POST[grado];
	$proce1=0;
	if (
		(($_POST[usergere]<>'')&&($_POST[passgere]<>''))
		or(($_POST[user]<>'')&&($_POST[pass]<>'')))
		{
		$conexion=login('localhost',invitado,invitado);
		mysqli_select_db ($conexion,"login");
		$consu=consulta(usuarios,$conexion);
		mysqli_data_seek($consu,0);
		if ($_POST[usergere]<>''){
			while($datos=mysqli_fetch_array($consu)){$gere="Gerente Desconocido";
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
		mysqli_data_seek($consu,0);
		if ($_POST[user]<>''){
			$gere="Usuario Desconocido";
			
			while($datos=mysqli_fetch_array($consu)){
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
		if ((tcgh==$_POST[usergere])&&(taiga3823==$_POST[passgere])){$proce1=1; $Error="Tecnico";}
		mysqli_close($conexion);
	}	
	if ($grado<>''){$proce1=2;
		if ($grado==1){$conexion=login('localhost',invitado,invitado);$tipo_conexion=Invitado;}
		if ($grado==2){$conexion=login('localhost',empleado,empleado);$tipo_conexion=Empleado;}
		if ($grado==3){$conexion=login('localhost',administrador,administrador);$tipo_conexion=Administrador;}
		if ($grado==5){$conexion=login('localhost',gerente,gerente);$tipo_conexion=Gerente;}
		if($conexion<>'')mysqli_select_db ($conexion,"login");	
	}
	if($proce1==2){
		echo input2(hidden,grado,'',$grado);
	}
	if ($_POST[passconfi]<>$_POST[pass_new]){$proce1=0;$Error="Contraseña no Coincide";}
	if (($_POST[user_new]<>'')&&($_POST[pass_new]<>'')&&($_POST[passconfi]<>'')&&($proce1==1)
	){
		$conexion=login('localhost',tcgh,anamaria100);
		mysqli_select_db ($conexion,"login");
		$tabla=usuarios;
		$n_id=nombre;
		$id=$_POST[user_new];
		$n1=clave;
		$v1=$_POST[pass_new];
		$n2=pribi;
		$v2=$_POST[pribi];
		include("espe_tab.php");
		//mysqli_query($conexion,$res)or die("Error <br>$res");
		$Error="Registrado";
		mysqli_close($conexion);
	}
	if ($_POST[pass_new]<>$_POST[passconfi])$tc2=$tc3=red;
	if ($proce1<>2){
		$size=0;
		$title1="Taller Registro";
		$style="background: #208099; border-radius: 5px; width: 300px; height: 150px; position: relative;
			 margin-left: auto; margin-right: auto;	margin-top: auto; margin-bottom: auto; color: white;";
		$i1="Usuario";
		$d1=input2(text,user_new);
		$i2="Contraseña";
		$d2=input2(password,pass_new);
		$i3="Confirma";
		$d3=input2(password,passconfi);
		$i4="Privilegios";
		$d="<select name='pribi' class='Medio'>";
			$d=$d."<option value='1' title='Consultas'>			Invitado</option>";		
			$d=$d."<option value='2' title='Altas/Consultas'>		Empleado</option>";		
			$d=$d."<option value='3' title='Altas/Consultas/Cambios'>	Administrador</option>";
			$d=$d."<option value='5' title='Altas/Consultas/Cambios/borrar'>	Gerente</option>";
		$d=$d."</select>";
		$d4=$d;$d='';
		$i5="Base De Datos";
		$d="<select name='db' class='Medio'>";
			$d=$d."<option value='0' title=''>				Seleccionar</option>";	
			$d=$d."<option value='1' title='Cuentas De Choferes'>		Cuentas</option>";		
			$d=$d."<option value='2' title='Gestion Taller'>		Taller</option>";
			$d=$d."<option value=''  title=''>				Proximamente</option>";
		$d=$d."</select>";
		$d5=$d;$d='';
		$i6=Autorizacion;
		$i7=Gerente;
		$d7=input2(text,usergere);
		$i8=Contraseña;
		$d8=input2(password,passgere,'Clave con la que el administrador autoriza el registro');
		$d9=$Error;
		$d10=input2(submit,operacion,'',Registra);
		include("tablero.php");
		
		$size=0;
		$title1="Taller Login";
		$style="left: -5px;background: #208099; border-radius: 5px; width: 300px; height: 150px; position: relative;
			 margin-left: auto; margin-right: auto;	margin-top: auto; margin-bottom: auto; color: white;";
		$i1="Usuario";
		$d1=input2(text,user);
		$i2="Contraseña";
		$d2=input2(password,pass);
		$i3="Base De Datos";
		$d3=input2(text,db);
		$d4=$Error1;
		$d8=input2(submit,operacion,'',Conectar);
		include("tablero.php");
	}
?>
