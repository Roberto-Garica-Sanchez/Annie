<?php //php7

	$caso=$_POST[caso];
	$size=0;
	$style="background: rgba(5, 72, 108, 0.67) none repeat scroll 0% 0%; width: 220px; left: -1px; color: white;";
	$i1="Operacion";
	$d="<select name='caso' class='Medio'>";
			if ($caso<>'')$d=$d."<option value='$_POST[caso]' title=''>Cambiar</option>";	
			$d=$d."<option value='' title=''>	Seleccionar				</option>";	
			$d=$d."<option value='0' title=''>	Registro de Reparacion	</option>";	
			$d=$d."<option value='1' title=''>	Agregar Componente		</option>";	
		$d=$d."</select>";
	$d1=$d;$d='';
	$d2=input2(submit,'','',Actualizar);
	include("tablero.php");
	
	
	if ($caso==0){
		//echo"registro de reparacion";
	}
	if ($caso=1){
		//echo"agregar componente";
		$value="";
		$name="operacion";
		$value="ejes";
		$src="/admin/taller/imagenes/ejes.jpg";
		$style="position: absolute; 							width: 200px; height: 157px; box-shadow: 3px 3px 9px #000000";
		echo imagen($name,$value,$src,$style,$title);
		$value="sus_ari";
		$src="/admin/taller/imagenes/sus_ari.jpg";
		$style="position: absolute; left: 205px; 				width: 200px; height: 157px; box-shadow: 3px 3px 9px #000000";
		echo imagen($name,$value,$src,$style,$title);
		$value="mot";
		$src="/admin/taller/imagenes/mot.jpg";
		$style="position: absolute; left: 410px; 				width: 200px; height: 157px; box-shadow: 3px 3px 9px #000000";
		echo imagen($name,$value,$src,$style,$title);
		$value="yan";
		$src="/admin/taller/imagenes/yan.jpg";
		$style="position: absolute; top: 165px; 				width: 200px; height: 157px; box-shadow: 3px 3px 9px #000000";
		echo imagen($name,$value,$src,$style,$title);
		$value="sus_muy";
		$src="/admin/taller/imagenes/sus_muy.jpg";
		$style="position: absolute; top: 165px; left: 205px; 	width: 200px; height: 157px; box-shadow: 3px 3px 9px #000000";
		echo imagen($name,$value,$src,$style,$title);
		$value="caj";
		$src="/admin/taller/imagenes/caj.jpg";
		$style="position: absolute; top: 165px; left: 410px; 	width: 200px; height: 157px; box-shadow: 3px 3px 9px #000000";
		echo imagen($name,$value,$src,$style,$title);
		
	}
	if ($caso==externo){
		$width="";
		$height="";
		$src="/taller/imagenes/del_der.jpg";
		$style="position: absolute; 							width: 200px; height: 157px; box-shadow: 3px 3px 9px #000000";
		echo imagen($src,$style);
		$src="/taller/imagenes/fre.jpg";
		$style="position: absolute; left: 205px; 				width: 200px; height: 157px; box-shadow: 3px 3px 9px #000000";
		echo imagen($src,$style);
		$src="/taller/imagenes/del_isq.jpg";
		$style="position: absolute; left: 410px; 				width: 200px; height: 157px; box-shadow: 3px 3px 9px #000000";
		echo imagen($src,$style);
		
		$src="/taller/imagenes/lat_der.jpg";
		$style="position: absolute; top: 165px; 				width: 200px; height: 157px; box-shadow: 3px 3px 9px #000000";
		echo imagen($src,$style);
		$src="/taller/imagenes/mot.jpg";
		$style="position: absolute; top: 165px; left: 205px; 	width: 200px; height: 157px; box-shadow: 3px 3px 9px #000000";
		echo imagen($src,$style);
		$src="/taller/imagenes/lat_isq.jpg";
		$style="position: absolute; top: 165px; left: 410px; 	width: 200px; height: 157px; box-shadow: 3px 3px 9px #000000";
		echo imagen($src,$style);
		
		$src="/taller/imagenes/tra_der.jpg";
		$style="position: absolute; top: 330px; 				width: 200px; height: 157px; box-shadow: 3px 3px 9px #000000";
		echo imagen($src,$style);		
		$src="/taller/imagenes/tra.jpg";
		$style="position: absolute; top: 330px; left: 205px; 	width: 200px; height: 157px; box-shadow: 3px 3px 9px #000000";
		echo imagen($src,$style);		
		$src="/taller/imagenes/tra_isq.jpg";
		$style="position: absolute; top: 330px; left: 410px; 	width: 200px; height: 157px; box-shadow: 3px 3px 9px #000000";
		echo imagen($src,$style);
	}
?>