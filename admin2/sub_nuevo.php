<?php 
$sub_nuevo=" ";
function presenta4($id,$caption,$style,$limite,$name1,$name2,$name3,$title1,$title2){
	$x=1;
	$dato=array();
	$conte=2;
	for($x=1; $x<$limite; $x++){
		$y=$x+1;
		if($_POST[$name2.$x]==""){
			$_POST[$name1.$x]=$_POST[$name1.$y];
			$_POST[$name2.$x]=$_POST[$name2.$y];
			$_POST[$name1.$y]="";
			$_POST[$name2.$y]="";
		}
		if($_POST[$name2.$x]<>"")$conte++;
	}
	$total=0;
	for($x=1; $x<$conte; $x++){
		if($_POST[$name2.$x]=="")$libre="autofocus=''";
		$i=input2(text,$name1.$x,'',$_POST[$name1.$x],'','',"maxlength='50'");
		$d=input2(text,$name2.$x,'',$_POST[$name2.$x],'','',$libre.' maxlength="10"');
		$dato[]="<tr><td>$x</td><td>$i</td><td>$d</td></tr>";
		$total=$total+$_POST[$name2.$x];
		$tot=$total.input2(hidden,$name3,'',$total);
	}
	$tamaño=count($dato);
	$contenido="
	<table border='0' style='color: white;'>
		<tr><td>#</td><td>$title1		</td>	<td>$title2	</td></tr>";
		for($x=0; $x<=$tamaño; $x++){$contenido=$contenido.$dato[$x];}
		$contenido=$contenido."
		<tr><td></td><td>Total			</td>	<td>$tot	</td></tr>
	</table>
	";
	$res=contenedor($id,$caption,$style,$contenido);
	return $res;
}
function presenta5($caption,$style,$limite,$name1,$name2,$name3,$title1,$title2){
	$conte=2;
	for($x=1; $x<$limite; $x++){
		$y=$x+1;
		if($_POST[$name2.$x]==""){
			$_POST[$name1.$x]=$_POST[$name1.$y];
			$_POST[$name2.$x]=$_POST[$name2.$y];
			$_POST[$name1.$y]="";
			$_POST[$name2.$y]="";
		}
		if($_POST[$name2.$x]<>"")$conte++;
		
	}
	$total=0;
	for($x=1; $x<$conte; $x++){
		if($_POST[$name2.$x]=="")$libre="autofocus=''";
		$i=$_POST[$name1.$x].	input2(hidden,$name1.$x,'',$_POST[$name1.$x],'','',"maxlength='50'");
		$d=$_POST[$name2.$x].	input2(hidden,$name2.$x,'',$_POST[$name2.$x],'','',$libre.' maxlength="10"');
		$dato[]="<tr><td>$x</td><td>$i</td><td>$d</td></tr>";
		$total=$total+$_POST[$name2.$x];
		$tot=$total.input2(hidden,$name3,'',$total);
	}
	$tamaño=count($dato);
	$contenido="
	<table border='0' style='color: white;'>
		<tr><td colspan='2'>$caption</td></tr>
		<tr><td>#</td><td>$title1		</td>	<td>$title2	</td></tr>";
			for($x=0; $x<=$tamaño; $x++){$contenido=$contenido.$dato[$x];}
			$contenido=$contenido."
		<tr><td></td><td>Total			</td>	<td>$tot	</td></tr>
	</table>
	";
	$res=div($style,$libre,$contenido);
	return $res;
}

$name1="1TEXT_C";
$name2="1TEXT";
$name3="TOTAL1";
$title1=Clientes;
$title2=Valor;
$limite=5;
$caption="Fletes";
$style="font-size: 12px; bottom: 0px; position: absolute; background: rgba(2, 17, 25, 0.86); width: 130px;    box-shadow: 3px 0px 0px #3b75b0;";
$sub_nuevo=$sub_nuevo.presenta5($caption,$style,$limite,$name1,$name2,$name3,$title1,$title2);

												$caption="Viaticos";
$name1="2TEXT_C";
$name2="2TEXT";
$name3="TOTAL2";
$title1=Descripcion;
$title2=Canidad;
$limite=5;
$style="font-size: 12px; bottom: 0px; position: absolute; background: rgba(2, 17, 25, 0.86); width: 151px; left: 133px;    box-shadow: 3px 0px 0px #3b75b0;";
$sub_nuevo=$sub_nuevo.presenta5($caption,$style,$limite,$name1,$name2,$name3,$title1,$title2);

												$caption="Diesel";
$name1="3TEXT_C";
$name2="3TEXT";
$name3="TOTAL3";
$title1=Gasolinara;
$title2=Monto;
$limite=7;
$style="font-size: 12px; bottom: 0px; position: absolute; background: rgba(2, 17, 25, 0.86); left: 287px;    box-shadow: 3px 0px 0px #3b75b0; max-height: 146px; overflow: auto;  width: 164px;";
$sub_nuevo=$sub_nuevo.presenta5($caption,$style,$limite,$name1,$name2,$name3,$title1,$title2);

												$caption="Casetas";
$name1="4TEXT_C";
$name2="4TEXT";
$name3="TOTAL4";
$title1="Caseta";
$title2=Costo;
$limite=20;
$style="font-size: 12px; bottom: 0px; position: absolute; background: rgba(2, 17, 25, 0.86); left: 454px;  box-shadow: 3px 0px 0px #3b75b0; max-height: 146px; overflow: auto; width: 164px;";
$sub_nuevo=$sub_nuevo.presenta5($caption,$style,$limite,$name1,$name2,$name3,$title1,$title2);

												$caption="Facturas";
$name1="5TEXT_C";
$name2="5TEXT";
$name3="TOTAL5";
$title1="RFC";
$title2="Costo";
$limite=5;
$style="font-size: 12px; bottom: 0px; position: absolute; background: rgba(2, 17, 25, 0.86); left: 620px;  box-shadow: 3px 0px 0px #3b75b0; max-height: 146px; overflow: auto; width: 164px;";
$sub_nuevo=$sub_nuevo.presenta5($caption,$style,$limite,$name1,$name2,$name3,$title1,$title2);

												$caption="Reparaciones y Facturas";
$name1="5TEXT_C";
$name2="5TEXT";
$name3="TOTAL5";
$title1="RFC";
$title2="Costo";
$limite=5;
$style="font-size: 12px; bottom: 0px; position: absolute; background: rgba(2, 17, 25, 0.86); left: 620px;  box-shadow: 3px 0px 0px #3b75b0; max-height: 146px; overflow: auto; width: 164px;";
$sub_nuevo=$sub_nuevo.presenta5($caption,$style,$limite,$name1,$name2,$name3,$title1,$title2);




if($_POST[$name]==$v1){
	$id="V_previa";
	$caption="Vista Previa";
	$style="width: 250px; height: 130px; background: rgb(8, 8, 8); left: 120px;	top: 0px;";
	$sub_nuevo=$sub_nuevo.presenta4($id,$caption,$style,$limite,$name1,$name2,$name3,$title1,$title2);
}
if($_POST[$name]==$v2){//flete
	$id=$v2;
	$name1="1TEXT_C";
	$name2="1TEXT";
	$name3="TOTAL1";
	$title1=Clientes;
	$title2=Valor;
	$limite=5;
	$caption="";
	$style="width: 250px; height: 130px; background: rgb(8, 8, 8); left: 120px;	top: 0px;";
	$sub_nuevo=$sub_nuevo.presenta4($id,$caption,$style,$limite,$name1,$name2,$name3,$title1,$title2);
	$id=Comicion;
	$caption="";
	$style="width: 250px; height: 130px; background: rgb(8, 8, 8); left: 380px;	top: 0px;";
	$d=input2(text,comi,'',$_POST[comi]);
	$contenido="
		<table style='color: white;'>
			<tr><td>%</td><td>$d<td></tr>
		</table>
	";
	$sub_nuevo=$sub_nuevo.contenedor($id,$caption,$style,$contenido);
}
if($_POST[$name]==$v3){//viaticos
	$id=$v3;
	$name1="2TEXT_C";
	$name2="2TEXT";
	$name3="TOTAL2";
	$title1=Descripcion;
	$title2=Canidad;
	$limite=5;
	$caption="";
	$style="width: 250px; height: 130px; background: rgb(8, 8, 8); left: 120px;	top: 0px;";
	$sub_nuevo=$sub_nuevo.presenta4($id,$caption,$style,$limite,$name1,$name2,$name3,$title1,$title2);
}
if($_POST[$name]==$v4){//diesel
	$id=$v4;
	$name1="3TEXT_C";
	$name2="3TEXT";
	$name3="TOTAL3";
	$title1=Gasolinara;
	$title2=Monto;
	$limite=7;
	$caption="";
	$style="width: 250px; height: 130px; background: rgb(8, 8, 8); left: 120px;	top: 0px;";
	$sub_nuevo=$sub_nuevo.presenta4($id,$caption,$style,$limite,$name1,$name2,$name3,$title1,$title2);
	$id=Add;
	$caption="";
	$style="width: 250px; height: 130px; background: rgb(8, 8, 8); left: 380px;	top: 0px;";
	$d2=input2(text,presio_d,'',$_POST[presio_d]);
	$contenido="
		<table style='color: white;'>
			<tr><td>Km. Recoridos	</td><td>$d1<td></tr>
			<tr><td>Precio Diesel	</td><td>$d2<td></tr>
			<tr><td>Total Litros	</td><td>$d3<td></tr>
			<tr><td>Km. X Lt.		</td><td>$d4<td></tr>
		</table>
	";
	$sub_nuevo=$sub_nuevo.contenedor($id,$caption,$style,$contenido);
}
if($_POST[$name]==$v5){//casetas
	$id=$v5;
	$name1="4TEXT_C";
	$name2="4TEXT";
	$name3="TOTAL4";
	$title1="C. De barras";
	$title2=Costo;
	$limite=20;
	$caption="";
	$style="width: 250px; height: 130px; background: rgb(8, 8, 8); left: 120px;	top: 0px;";
	$sub_nuevo=$sub_nuevo.presenta4($id,$caption,$style,$limite,$name1,$name2,$name3,$title1,$title2);
}
if($_POST[$name]==$v6){//via pass
	$id=$v6;
	$name1="TEXT_C";
	$name2="TEXT";
	$name3="TOTAL";
	$title1="Caseta";
	$title2="Costo";
	$limite=20;
	$caption="";
	$style="width: 250px; height: 130px; background: rgb(8, 8, 8); left: 120px;	top: 0px;";
	$sub_nuevo=$sub_nuevo.presenta4($id,$caption,$style,$limite,$name1,$name2,$name3,$title1,$title2);
}
if($_POST[$name]==$v7){//facturas
	$id=$v7;
	$name1="5TEXT_C";
	$name2="5TEXT";
	$name3="TOTAL5";
	$title1="RFC";
	$title2="Costo";
	$limite=5;
	$caption="";
	$style="width: 250px; height: 130px; background: rgb(8, 8, 8); left: 120px;	top: 0px;";
	$sub_nuevo=$sub_nuevo.presenta4($id,$caption,$style,$limite,$name1,$name2,$name3,$title1,$title2);
}
if($_POST[$name]==$v8){//r y r 
	$id=$v8;
	$name1="6TEXT_C";
	$name2="6TEXT";
	$name3="TOTAL6";
	$title1="Descripcione";
	$title2="Costo";
	$limite=10;
	$caption="";
	$style="width: 250px; height: 130px; background: rgb(8, 8, 8); left: 120px;	top: 0px;";
	$sub_nuevo=$sub_nuevo.presenta4($id,$caption,$style,$limite,$name1,$name2,$name3,$title1,$title2);
}
if($_POST[$name]==$v9){//Guias
	$id=$v9;
	$name1="7TEXT_C";
	$name2="7TEXT";
	$name3="TOTAL7";
	$title1="Nombre";
	$title2="Costo";
	$limite=5;
	$caption="";
	$style="width: 250px; height: 130px; background: rgb(8, 8, 8); left: 120px;	top: 0px;";
	$sub_nuevo=$sub_nuevo.presenta4($id,$caption,$style,$limite,$name1,$name2,$name3,$title1,$title2);
}
if($_POST[$name]==$v10){//maniobras 
	$id=$v10;
	$name1="8TEXT_C";
	$name2="8TEXT";
	$name3="TOTAL8";
	$title1="Descripcione";
	$title2="Costo";
	$limite=10;
	$caption="";
	$style="width: 250px; height: 130px; background: rgb(8, 8, 8); left: 120px;	top: 0px;";
	$sub_nuevo=$sub_nuevo.presenta4($id,$caption,$style,$limite,$name1,$name2,$name3,$title1,$title2);
}
?>