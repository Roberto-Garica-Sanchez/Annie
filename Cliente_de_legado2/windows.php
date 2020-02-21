<?php 

	include("../libre_v1.php");				if($libre_v1=="")		{echo"<script>alert('[libre_v1] no localizado');</script>";}
	
	if($_POST[js]==1){//configuracion para js 
		$conexion= libre_v1::login('localhost',root,root,"",$phpv);//cambia segun cada server
	}
	
	if($_POST[win_carga]==Nuevo1){		//INTERFAZ
		echo"<div id='conte_nuevo' style='position: relative;width: 1080px;height: 600px;background: #1c1d1f;margin-left: auto;margin-right: auto;'>";
			echo"<div id='conte_info' style='position: absolute;right: 5px;top: 5px;bottom: 5px;width: 200px;background: white;box-shadow: inset 0px 0px 10px black;    padding: 5px;'>";
			echo libre_v1::input2(text,'','','Folio 1','','',"",botone_n);
			echo libre_v1::input2(text,Carta1,'',$_POST[Carta1],'','Carta1',$libre."onchange='verificador(this);'",botones_submenu);
			echo libre_v1::input2(text,Carta2,'',$_POST[Carta2],'','Carta2',$libre."onchange='verificador(this);'",botones_submenu);
			echo libre_v1::input2(text,Carta3,'',$_POST[Carta3],'','Carta3',$libre."onchange='verificador(this);'",botones_submenu);
			echo libre_v1::input2(text,Carta4,'',$_POST[Carta4],'','Carta4',$libre."onchange='verificador(this);'",botones_submenu);	
			
				/*
			libre_v1::db								(empresa,$conexion,$phpv);
	$consu1		= libre_v1::consulta			(choferes,$conexion	,'','',Nombre_Ch,''	,$phpv,'');
	$consu2		= libre_v1::consulta			(placas,$conexion	,'','',Placas,''	,$phpv,'');
	$consu3		= libre_v1::consulta			(clientes,$conexion	,'','',Nombre_Cl,''	,$phpv,'');
	$choferes	= libre_v1::despliegre_mysql	(chofer,Chofer		,$consu1,Nombre_Ch	,$phpv,"id='chofer'onclick=' n_cuenta(this);desca_arrasta(this);'");
	$placas 	= libre_v1::despliegre_mysql	(placas,Placas		,$consu2,Placas		,$phpv,"id='placas'");	
	$cliente	= libre_v1::despliegre_mysql	(cliente,Clientes	,$consu3,Nombre_Cl	,$phpv,"id='cliente'");
	$n			= libre_v1::compro($_POST[chofer],Nombre_Ch,ulti_viaje,$consu1,$conexion,$phpv);
	if($_POST[Carta1]<>""){
		$dat=$_POST[Carta1];
		$sql="SELECT * FROM folio WHERE Carta1 = $dat OR Carta2 = $dat OR Carta3 = $dat OR Carta4 = $dat ORDER BY ID_G DESC ";
		$res=libre_v1::ejecuta($conexion,$sql,$phpv);
		$dato=libre_v1::mysql_fe_ar($res,$phpv);
		if($dato[ID_G]<>""){$res=1;}
		if($dato[ID_G]==""){$res=0;}
		$c1=$res;
	}
	if($_POST[Carta2]<>""){
		$dat=$_POST[Carta2];
		$sql="SELECT * FROM folio WHERE Carta1 = $dat OR Carta2 = $dat OR Carta3 = $dat OR Carta4 = $dat ORDER BY ID_G DESC ";
		$res=libre_v1::ejecuta($conexion,$sql,$phpv);
		$dato=libre_v1::mysql_fe_ar($res,$phpv);
		if($dato[ID_G]<>""){$res=1;}
		if($dato[ID_G]==""){$res=0;}
		$c2=$res;
	}
	if($_POST[Carta3]<>""){
		$dat=$_POST[Carta3];
		$sql="SELECT * FROM folio WHERE Carta1 = $dat OR Carta2 = $dat OR Carta3 = $dat OR Carta4 = $dat ORDER BY ID_G DESC ";
		$res=libre_v1::ejecuta($conexion,$sql,$phpv);
		$dato=libre_v1::mysql_fe_ar($res,$phpv);
		if($dato[ID_G]<>""){$res=1;}
		if($dato[ID_G]==""){$res=0;}
		$c3=$res;
	}
	if($_POST[Carta4]<>""){
		$dat=$_POST[Carta4];
		$sql="SELECT * FROM folio WHERE Carta1 = $dat OR Carta2 = $dat OR Carta3 = $dat OR Carta4 = $dat ORDER BY ID_G DESC ";
		$res=libre_v1::ejecuta($conexion,$sql,$phpv);
		$dato=libre_v1::mysql_fe_ar($res,$phpv);
		if($dato[ID_G]<>""){$res=1;}
		if($dato[ID_G]==""){$res=0;}
		$c4=$res;
	}
	$fec_ini	=$_POST[A]	.libre_v1::zero($_POST[M])		.libre_v1::zero($_POST[D]);
	$fec_fin	=$_POST[A_r].libre_v1::zero($_POST[M_r])	.libre_v1::zero($_POST[D_r]);
	$grava=1;
	IF ($_POST[Carta1]<>'')			{if ($c1==1){$grava=0;	$dc1=red;$indc1=red;}	if ($c1==0){	$dc1=green;}}
	IF ($_POST[Carta2]<>'')			{if ($c2==1){$grava=0;	$dc2=red;$indc2=red;}	if ($c2==0){	$dc2=green;}}
	IF ($_POST[Carta3]<>'')			{if ($c3==1){$grava=0;	$dc3=red;$indc3=red;}	if ($c3==0){	$dc3=green;}}
	IF ($_POST[Carta4]<>'')			{if ($c4==1){$grava=0;	$dc4=red;$indc4=red;}	if ($c4==0){	$dc4=green;}}
	IF ($_POST[chofer]<>chofer)		{$dc5=green;}		else{$grava=0;}
	IF ($_POST[placas]<>placas)		{$dc6=green;}		else{$grava=0;}
	IF ($_POST[cliente]<>cliente)	{$dc7=green;}		else{$grava=0;}
	IF ($_POST[flete_r]<>'')		{$dc10=green;}	
	IF ($fec_ini<$fec_fin)			{$dc8=$dc9=green;}
	IF ($fec_ini>$fec_fin)			{$dc8=$dc9=red;$grava=0;}
	IF ((20150101==$fec_fin)and(20150101==$fec_fin))	{$dc8=$dc9=red;$grava=0;}
	IF ($_POST[km_i]<>'')			{$dc11=green;}		else{$grava=0;}
	IF ($_POST[km_f]<>'')			{$dc12=green;}		else{$grava=0;}
	IF ($_POST[km_i]>$_POST[km_f])	{$dc11=$dc12=red;$grava=0;} 
	//----
	
	$estado	= libre_v1::input2(hidden,Revisado,'',$_POST[Revisado],$style,Revisado,$libre);
	if($_POST[Revisado]==0){$estado=$estado.libre_v1::input2(button,CambRevi,'',Pendiente, 'color: white; background: #343434;',CambRevi,'onclick="revi();"');}
	if($_POST[Revisado]==1){$estado=$estado.libre_v1::input2(button,CambRevi,'',Revisado,'color: white; background: #343434;',CambRevi,'onclick="revi();"');}
	$carta1	= libre_v1::input2(text,Carta1,'',$_POST[Carta1],'','Carta1',$libre."onchange='verificador(this);'");
	$carta2	= libre_v1::input2(text,Carta2,'',$_POST[Carta2],'','Carta2',$libre."onchange='verificador(this);'");
	$carta3	= libre_v1::input2(text,Carta3,'',$_POST[Carta3],'','Carta3',$libre."onchange='verificador(this);'");
	$carta4	= libre_v1::input2(text,Carta4,'',$_POST[Carta4],'','Carta4',$libre."onchange='verificador(this);'");	
	$FLETE_R= libre_v1::input2(text,flete_r,'',$_POST[flete_r],'',flete_r	,'onKeyUp="calcula_update();"');
	$n_cuenta=libre_v1::input2(text,n_c	 ,'',$_POST[n_c],'',n_c		,'readonly="readonly"');
	$libre="";
	$km_i	= libre_v1::input2(text,km_i,'',$_POST[km_i],'',km_i,$libre.' onKeyUp="calcula_update();" onchange="verificador(this);"');
	$km_f	= libre_v1::input2(text,km_f,'',$_POST[km_f],'',km_f,$libre.' onKeyUp="calcula_update();" onchange="verificador(this);"');
	
	$style='width: 30px;';	
	
	$fecha_s=			libre_v1::input2(text,D,'',$_POST[D],$style,D,$libre."onchange=' fechero(this)'; maxlength='2'");
	$fecha_s=$fecha_s.	libre_v1::input2(text,M,'',$_POST[M],$style,M,$libre."onchange=' fechero(this)'; maxlength='2'");
	$fecha_s=$fecha_s.	libre_v1::input2(text,A,'',$_POST[A],$style,A,$libre."onchange=' fechero(this)'; maxlength='4'");
	$fecha_s=$fecha_s.	libre_v1::input2(hidden,fecha,'',$_POST[fecha],'',fecha);
	
	$fecha_l=			libre_v1::input2(text,D_r,'',$_POST[D_r],$style,D_r,$libre."onchange=' fechero(this)'; maxlength='2'");
	$fecha_l=$fecha_l.	libre_v1::input2(text,M_r,'',$_POST[M_r],$style,M_r,$libre."onchange=' fechero(this)'; maxlength='2'");
	$fecha_l=$fecha_l.	libre_v1::input2(text,A_r,'',$_POST[A_r],$style,A_r,$libre."onchange=' fechero(this)'; maxlength='4'");
	$fecha_l=$fecha_l.	libre_v1::input2(hidden,fecha_r,'',$_POST[fecha_r],'',fecha_r);
	
	if($_POST[D_c]=="")$_POST[D_c]=date("d");
	if($_POST[M_c]=="")$_POST[M_c]=date("m");
	if($_POST[A_c]=="")$_POST[A_c]=date("Y");
	$libre=libre_v1::focuas_a(2,M_c);		$fecha_r=			libre_v1::input2(text,D_c,'',$_POST[D_c],$style,D_c,$libre.'readonly="readonly"');
	$libre=libre_v1::focuas_a(2,A_c);		$fecha_r=$fecha_r.	libre_v1::input2(text,M_c,'',$_POST[M_c],$style,M_c,$libre.'readonly="readonly"');
	$libre=libre_v1::focuas_a(4,D);			$fecha_r=$fecha_r.	libre_v1::input2(text,A_c,'',$_POST[A_c],$style,A_c,$libre.'readonly="readonly"');
	
	$celdas=" ";
	
	$style="width: 1070px; height: 100px; background: rgba(5, 72, 108, 0.67); color: white;";
	$conte=$conte.	"<table border='0' style='background: rgba(5, 72, 108, 0.67) ;'><tr style='background: cornflowerblue;'>";
	$conte=$conte.	"<tr><td style='background: #1a86ff;' colspan='2'>	<center>Cartas Portes			</center>		</td></tr>";
	$conte=$conte.	"<tr id='conte_Carta1' style='background: $dc1;'><td style='background: #1a86ff;'>1			</td><td>".$carta1."</td></tr>";
	$conte=$conte.	"<tr id='conte_Carta2' style='background: $dc2;'><td style='background: #1a86ff;'>2			</td><td>".$carta2."</td></tr>";
	$conte=$conte.	"<tr id='conte_Carta3' style='background: $dc3;'><td style='background: #1a86ff;'>3			</td><td>".$carta3."</td></tr>";
	$conte=$conte. 	"<tr id='conte_Carta4' style='background: $dc4;'><td style='background: #1a86ff;'>4			</td><td>".$carta4."</td></tr>";      
	$conte=$conte.	"<tr><td>Cliente		</td><td>".$cliente		."</td></tr>";
	$conte=$conte.	"<tr><td>Operador		</td><td>".$choferes	."</td></tr>";
	$conte=$conte.	"<tr><td>Unidad			</td><td>".$placas 		."</td></tr>";
	$conte=$conte.	"<tr><td>Flete R.		</td><td>".$FLETE_R		."</td></tr>";
	$conte=$conte. 	"<tr><td>N° Cuentas		</td><td>".$n_cuenta	."</td></tr>";
	
	
	$conte=$conte.	"<tr><td style='background: #54b3af;'  colspan='2'>	<center>Kilometraje		</center>		</td></tr>";
	$conte=$conte.	"<tr id='conte_km_i' style='background: $dc11;'><td style='background: #54b3af;'>Inicio		</td><td >".$km_i				."</td></tr>";
	$conte=$conte.	"<tr id='conte_km_f' style='background: $dc12;'><td style='background: #54b3af;'>Llegada		</td><td >".$km_f				."</td></tr>";
	
	$conte=$conte.	"<tr><td colspan='2'>	<center>Fechas 			</center> 	</td></tr>";
	$conte=$conte. 	"<tr><td style='background: #57849c;' >Fecha Reg.		</td><td style='background: #57849c;'>".$fecha_r		."</td></tr>";
	$conte=$conte. 	"<tr id='conte_fechai' style='background: $dc8;'><td style='background: #57849c;'>Fecha Salida	</td><td >".$fecha_s			."</td></tr>";
	$conte=$conte. 	"<tr id='conte_fechaf' style='background: $dc9;'><td style='background: #57849c;'>Fecha Legada	</td><td >".$fecha_l			."</td></tr>";
	
	$conte=$conte. 	"<td style='background: #444;' colspan='2'> Comentario</td></tr>";
	$conte=$conte.	"<tr><td>Estado			</td><td>".$estado		."</td></tr>";
	$conte=$conte.	"<tr><td>				</td><td><input type='hidden' name='graba' id='graba'></td></tr>";
	$conte=$conte. 	"<tr><td style='background: #444;' colspan='4' rowspan='2' ><TEXTAREA name='come' id='come'  style='height: 30px; width: 200px;' placeholder='Comentarios' >$_POST[come]</TEXTAREA>	</td></tr>";
	
	$conte=$conte.	"<tr></tr></table>";
	
	if($style1=="")$style1=" ";
	*/
	
			echo"</div>";
		echo"</div>";
	}
	if($_POST[win_carga]==Nuevo){
		/*
		$menu='menu-list';
		$listn1='';
		$listn2=Cuenta;
		$listn3=Flete;
		$listn4=Viaticos;
		$listn5=Diesel;
		$listn6=Casetas;
		$listn7=Facturas;
		$listn8="R Y R";
		$listn9=Guias;
		$listn10=Maniobras;
		$listn11='';
		$style="top: 250px;";
		include('lista.php');*/
		$type=hidden;
		$type2=text;
		include('libre_nue.php');

		//----------------------------------------------------------------[memorias]
		echo input($type,comi,$_POST[comi],'Porcentaje de comicion del chofer con relacion de el flete');
		echo input($type,presio_d,$_POST[presio_d]);
		
		//$total1=	
		presenta2 (hidden_fe	,'1TEXT_C','1TEXT',$type);
		//$total2=	
		presenta2 (hidden_v		,'2TEXT_C','2TEXT',$type);
		//$total3=
		presenta2 (hidden_d		,'3TEXT_C','3TEXT',$type);
		//$total4=	
		presenta2 (hidden_c		,'4TEXT_C','4TEXT',$type);
		//$total4_via=
		presenta2 (hidden_c_via	,'4TEXT_C_VIA','4TEXT_VIA',$type);
		//$total5=	
		presenta2 (hidden_f		,'5TEXT_C','5TEXT',$type);
		//$total6=	
		presenta2 (hidden_r		,'6TEXT_C','6TEXT',$type);
		//$total7=	
		presenta2 (hidden_g		,'7TEXT_C','7TEXT',$type);
		//$total8=	
		presenta2 (hidden_m		,'8TEXT_C','8TEXT',$type);
		//$total9=	
		presenta2 (hidden_ab	,'ab_Com','ab',$type);
		//$total10=	
		presenta2 (hidden_ac	,'ID_ac','ac',$type);
		
		/*echo input($type,hidden_fe,$_POST[hidden_fe]);
		echo input($type,hidden_v,$_POST[hidden_v]);
		echo input($type,hidden_d,$_POST[hidden_d]);
		echo input($type,hidden_c,$_POST[hidden_c]);
		echo input($type,hidden_c_via,$_POST[hidden_c_via]);
		echo input($type,hidden_f,$_POST[hidden_f]);
		echo input($type,hidden_r,$_POST[hidden_r]);
		echo input($type,hidden_g,$_POST[hidden_g]);
		echo input($type,hidden_m,$_POST[hidden_m]);
		echo input($type,hidden_c,$_POST[hidden_c]);
		echo input($type,hidden_ab,$_POST[hidden_ab]);
		echo input($type,hidden_ac,$_POST[hidden_ac]);
		echo input($type,hidden_ac_a,$_POST[hidden_ac_a]);
		*/
			
			//Calculadora
			for($x=1; $x<=9; $x++){
				for($y=1; $y<=20; $y++){
					$name=$x."TEXT".$y;
					
					$total=$total+$_POST[$name];
				}
				$_POST["TOTAL".$x]=$total;
				$total=0;
			}
		$total1=$_POST[TOTAL1];
		$total2=$_POST[TOTAL2];
		$total3=$_POST[TOTAL3];
		$total4=$_POST[TOTAL4];
		$total5=$_POST[TOTAL5];
		$total6=$_POST[TOTAL6];
		$total7=$_POST[TOTAL7];
		$total8=$_POST[TOTAL8];
		$total4_via=$_POST[TOTAL9];
		
		echo input($type,hidden_fe,5);
		echo input($type,hidden_v,5);
		echo input($type,hidden_d,7);
		echo input($type,hidden_c,20);
		echo input($type,hidden_c_via,5);
		echo input($type,hidden_f,10);
		echo input($type,hidden_r,5);
		echo input($type,hidden_g,10);
		echo input($type,hidden_m,5);
		echo input($type,hidden_ab,5);
		echo input($type,hidden_ac,5);
		//echo input($type,hidden_ac_a,$_POST[hidden_ac_a]);
			
		
			
			
			for($y=1; $y<=5; $y++){$name1="ac".$y;$total9=$total9+$_POST[$name1];}
			$TOTALAC=$total9;
	
			for($y=1; $y<=5; $y++){$name1="ab".$y;$total10=$total10+$_POST[$name1];}
			$TOTALAB=$total10;
			
			
		//------------------------------------------------------

		$g_t=$total4+$total5+$total6+$total7+$total8;	//casetas+facturas+ryr+guias+maniobras
		$c=$total1*0.15;   								//comicion pre-definida (para chofer)
		if($_POST[comi]<>'')$c=$total1*($_POST[comi]/100); //comicion variada	(para chofer)
		$rete=($c*7.5)/100;								//Isr
		$t_g=   round($g_t+$c,2);						//gatos_total+comision
		$dif1=  round($total2-$t_g+$rete,2);			//viaticos-total_gastos+retencion
		$dif2=  round($total2-$g_t,2);					//viaticos-gatos_total
		$dif3=$dif1+$total10;							//dif1+ acumulado
		$pre_d=$dif1+$total10;							// ??? esta mal ??? repetido con el anterior
		$dif4=$pre_d+$total9;							//
		$comi=  round($_POST[flete_r]*0.0928,2);		//Flete_Real * 0.0928
		$t_d_g= round($total3+$t_g+$comi+$total4_via,2);//diesel+total_gatos+comision
		$n_c=   round($_POST[flete_r]-$t_d_g,2);
		$re=    round($_POST[flete_r]*0.01,2);
		$re=    round($n_c/$re,2);
		$km_t=	round($_POST[km_f]-$_POST[km_i],2);

		
		/*
		if($_POST['menu-list']==$listn3){
			$style="position: absolute; left: 110px; top: 0px; background: rgba(0, 0, 0, 0.77) none repeat scroll 0% 0%; color: white;";
			$d=input(text,comi,$_POST[comi]);
			$final="
			<tr bgcolor='#000'><td colspan='3'></td></tr>
			<tr><td></td><td>Comicion %</td><td>$d</td><tr>";
			presenta3($type2 ,hidden_fe,'1TEXT_C','1TEXT',$total1,total1,$type,$hidden_fe,$style,Fletes,'#000',Cliente,Valor,$final);
		}
		if($_POST['menu-list']==$listn4){		//Viaticos
			$style="position: absolute; left: 110px; top: 0px; background: rgba(0, 0, 0, 0.77) none repeat scroll 0% 0%; color: white;";
			presenta3($type2 ,hidden_v,'2TEXT_C','2TEXT',$total2,total2,$type,$hidden_v,$style,Viaticos,'#000','',Cantidad);
		}
		if($_POST['menu-list']==$listn5){	//Diesel
			$t_l=round($total3/$_POST[presio_d],2);
			$km_l=round($km_t/$t_l,2);
			$d=input($stype2,presio_d,$_POST[presio_d]);
			$final="
			  <tr bgcolor='#000'>                <td colspan='3'></td></tr><tr>
			  <tr><td></td><td>Recorido      </td><td>$km_t  </td></tr>
			  <tr><td></td><td>Presio Diesel     </td><td>$d     </td></tr>
			  <tr><td></td><td>Total De Litros   </td><td>$t_l   </td></tr>
			  <tr><td></td><td>K * L             </td><td>$km_l  </td></tr>
			";
			$style="position: absolute; left: 110px; top: 0px; background: rgba(0, 0, 0, 0.77) none repeat scroll 0% 0%; color: white;";
			presenta3($type2 ,hidden_d,'3TEXT_C','3TEXT',$total3,total3,$type,$hidden_d,$style,Diesel,'#000',Gasolinera,'Cantidad $',$final);
		}
		if($_POST['menu-list']==$listn6){	//Casetas
			$style="position: absolute; left: 110px; top: 0px; background: rgba(0, 0, 0, 0.77) none repeat scroll 0% 0%; color: white;";
			presenta3($type2,hidden_c,'4TEXT_C','4TEXT',$total4,total4,$type,$hidden_c,$style,Casetas,'#000');
			$style="position: absolute; left: 350px; top: 0px; background: rgba(0, 0, 0, 0.77) none repeat scroll 0% 0%; color: white;";
			presenta3($type2,hidden_c_via,'4TEXT_C_VIA','4TEXT_VIA',$total4_via,total4_VIA,$type,$hidden_c_via,$style,'Via-Pass','#000');
		}
		if($_POST['menu-list']==$listn7){
			$style="position: absolute; left: 110px; top: 0px; background: rgba(0, 0, 0, 0.77) none repeat scroll 0% 0%; color: white;";
			presenta3($type2,hidden_f,'5TEXT_C','5TEXT',$total5,total5,$type,$hidden_f,$style,Facturas,'#000',RFC,Valor);
		}
		if($_POST['menu-list']==$listn8){
			$style="position: absolute; left: 110px; top: 0px; background: rgba(0, 0, 0, 0.77) none repeat scroll 0% 0%; color: white;";
			presenta3($type2,hidden_r,'6TEXT_C','6TEXT',$total6,total6,$type,$hidden_r,$style,Reparaciones,'#000');
		}
		if($_POST['menu-list']==$listn9){
			$style="position: absolute; left: 110px; top: 0px; background: rgba(0, 0, 0, 0.77) none repeat scroll 0% 0%; color: white;";
			presenta3($type2,hidden_g,'7TEXT_C','7TEXT',$total7,total7,$type,$hidden_g,$style,Guias,'#000',Nombre,Costo);
		}
		if($_POST['menu-list']==$listn10){
			$style="position: absolute; left: 110px; top: 0px; background: rgba(0, 0, 0, 0.77) none repeat scroll 0% 0%; color: white;";
			presenta3($type2,hidden_m,'8TEXT_C','8TEXT',$total8,total8,$type,$hidden_m,$style,Maniobras,'#000',Operaciones,Costo);
		}
		*/
		if($dif1<0)		{$sd5='pink'; $ld5='red';}else 		 {$sd5='Greenyellow'; 	 $ld5='green';}
		if($dif2<0)		{$sd9='pink'; $ld9='red';}else 		 {$sd9='Greenyellow'; 	 $ld9='green';}
		if($n_c<10)		{$sd13='pink'; $ld13='red';}else 	 {$sd13='Greenyellow'; 	 $ld13='green';}
		if($re<30)		{$sd14='pink'; $ld14='red';}else 	 {$sd14='Greenyellow'; 	 $ld14='green';}
		if($dif1<0)	    {$indf16='pink'; $indc16='red';}else {$indf16='Greenyellow'; $indc16='green';}
		if($total10<0)	{$indf17='pink'; $indc17='red';}else {$indf17='Greenyellow'; $indc17='green';}
		if($pre_d<0)	{$indf18='pink'; $indc18='red';}else {$indf18='Greenyellow'; $indc18='green';}
		if($total9<0)	{$indf19='pink'; $indc19='red';}else {$indf19='Greenyellow'; $indc19='green';}
		if($dif4<0)	    {$indf20='pink'; $indc20='red';}else {$indf20='Greenyellow'; $indc20='green';}

		/*
		if($_POST['menu-list']==$listn2){//tablas
		$size=0;
		$title1="Gastos sin Chofer";
		$style="position: absolute; left: 387px; top: 0px; color: white;";
		$ts="background: black;";
		$i1=Casetas;		$d1=input(button,'',$total4,'','background: #FDFD96;');
		$i2=Facturas;		$d2=input(button,'',$total5,'','background: #FDFD96;');
		$i3=RyR;			$d3=input(button,'',$total6,'','background: #FDFD96;');
		$i4=Guia;			$d4=input(button,'',$total7,'','background: #FDFD96;');
		$i5=Maniobras;		$d5=input(button,'',$total8,'','background: #FDFD96;');
		$i6='';				$d6='';				$tc6='#989898';
							$d7=input(button,'',$g_t   ,'','background: orangered;');
		$i8=Viaticos;		$d8=input(button,'',$total2,'','background: yellowgreen;');
		$i9='';				$d9='';				$tc9='#989898';
		$i10='';			$d10=input(button,'',$dif2 ,'',"background: $sd9; color: $ld9;");
		$i11='';			$d11='';			$tc11=white;
		$i12=Flete;			$d12=input(button,'',$_POST[flete_r],'','background: aqua;');
		$i13='';			$d13='';			$tc13='#989898';
		$i14=Chofer;		$d14=input(button,'',$c    ,'','background: #FDFD96;');
		$i15=Diesel;		$d15=input(button,'',$total3,'','background: #FDFD96;');
		$i16=Comisiones;	$d16=input(button,'',$comi,'','background: #FDFD96;');
		$i17='Via pass';	$d17=input(button,'',$total4_via	);
		$i18='';			$d18='';			$tc18='#989898';
		$i19='';			$d19=input(button,'',$t_d_g,'','background: orangered;');
		$i20=Neto;			$d20=input(button,'',$n_c  ,'',"background: $sd13; color: $ld13;");
		include("tablero.php");
		//---------------------------------------------------------------
		$size=0;
		$title1='Gastos con Chofer';
		$style="position: absolute; left: 100px; top: 0px; color: white;";
		$ts="background: black;";
		$i1=Casetas;		$d1=input(button,'',$total4,'','background: #FDFD96;');
		$i2=Facturas;		$d2=input(button,'',$total5,'','background: #FDFD96;');
		$i3=RyR;			$d3=input(button,'',$total6,'','background: #FDFD96;');
		$i4=Guia;			$d4=input(button,'',$total7,'','background: #FDFD96;');
		$i5=Maniobras;		$d5=input(button,'',$total8,'','background: #FDFD96;');
		$i6='';				$d6='';				$tc6='#989898';
							$d7=input(button,'',$g_t   ,'','background: orange;');
		$i8=Chofer;			$d8=input(button,'',$c	   ,'','background: orange;');
		$i9='';				$d9='';				$tc9='#989898';
		$i10='';			$d10=input(button,'',$t_g  ,'','background: orangered;');
		$i11=Viaticos;		$d11=input(button,'',$total2,'','background: yellowgreen;');
		$i12='';			$d12='';			$tc12='#989898';
		$i13='';			$d13=input(button,'',$dif1 ,'',"background: $sd5; color: $ld5;");
		include("tablero.php");		
		}
		*/
		
		
		//------------------------------------------------------ [info]
		$c1=compro($_POST[Carta1],ID_G,'',$consu5,$conexion);
		$c2=compro($_POST[Carta2],ID_G,'',$consu5,$conexion);
		$c3=compro($_POST[Carta3],ID_G,'',$consu5,$conexion);
		$c4=compro($_POST[Carta4],ID_G,'',$consu5,$conexion);
		$n=compro($_POST[chofer],Nombre_Ch,ulti_viaje,$consu1_2,$conexion);
		$fec_ini=$_POST[A].zero($_POST[M]).zero($_POST[D]);
		$fec_fin=$_POST[A_r].zero($_POST[M_r]).zero($_POST[D_r]);
		$grava=1;
		IF ($_POST[Carta1]<>'')			{if ($c1==1){$grava=0;	$dc1=pink;$indc1=red;}	if ($c1==0){	$dc1=yellowgreen;}}
		IF ($_POST[Carta2]<>'')			{if ($c2==1){$grava=0;	$dc2=pink;$indc2=red;}	if ($c2==0){	$dc2=yellowgreen;}}
		IF ($_POST[Carta3]<>'')			{if ($c3==1){$grava=0;	$dc3=pink;$indc3=red;}	if ($c3==0){	$dc3=yellowgreen;}}
		IF ($_POST[Carta4]<>'')			{if ($c4==1){$grava=0;	$dc4=pink;$indc4=red;}	if ($c4==0){	$dc4=yellowgreen;}}
		IF ($_POST[chofer]<>chofer)		{$dc5=yellowgreen;}		else{$grava=0;}
		IF ($_POST[placas]<>placas)		{$dc6=yellowgreen;}		else{$grava=0;}
		IF ($_POST[cliente]<>cliente)	{$dc7=yellowgreen;}		else{$grava=0;}
		IF ($_POST[flete_r]<>'')		{$dc10=yellowgreen;}	
		IF ($fec_ini<$fec_fin)			{$dc8=$dc9=yellowgreen;}
		IF ($fec_ini>$fec_fin)			{$dc8=$dc9=pink;			$grava=0;}
		IF ((20150101==$fec_fin)and(20150101==$fec_fin))	{$dc8=$dc9=pink;			$grava=0;}
		IF ($_POST[km_i]<>'')			{$dc11=yellowgreen;}	else{$grava=0;}
		IF ($_POST[km_f]<>'')			{$dc12=yellowgreen;}	else{$grava=0;}
		IF ($_POST[km_i]>$_POST[km_f])	{$dc11=$dc12=pink;$grava=0;} 

		$size=0;
		$style="background: rgba(5, 72, 108, 0.67) none repeat scroll 0% 0%; width: auto; width: 220px; left: -1px; color: white;";
		$title='Nueva Cuenta';
		$libre1=focuas_a(4,D);
		$libre2=focuas_a(2,M);
		$libre3=focuas_a(2,A);
		$libre4=focuas_a(4,D_r);
		$libre5=focuas_a(2,M_r);
		$libre6=focuas_a(2,A_r);
		$libre7=focuas_a(4,"");
		$i1=1;                  $d1=input(text,Carta1,$_POST[Carta1],'',"color: $indc1;",$libre1);
		$i2=2;                  $d2=input(text,Carta2,$_POST[Carta2],'',"color: $indc2;",'maxlength="4"');
		$i3=3;                  $d3=input(text,Carta3,$_POST[Carta3],'',"color: $indc3;",'maxlength="4"');
		$i4=4;                  $d4=input(text,Carta4,$_POST[Carta4],'',"color: $indc4;",'maxlength="4"');
		$i5=Chofer;             $d5=despliegre_mysql(chofer,Chofer,$consu1,Nombre_Ch);
		$i6=Placas;             $d6=despliegre_mysql(placas,Placas,$consu2,Placas);
		$i7=Cliente;            $d7=despliegre_mysql(cliente,Clientes,$consu3,Nombre_Cl);
		$i8=Salida;             $d8=input(text,D,$_POST[D],"","width: 30px;  box-shadow: 0px 5px 5px black;",$libre2)		.input(text,M,$_POST[M],"","width: 30px; box-shadow: 0px 5px 5px black;",$libre3)		.input(text,A,$_POST[A],"","width: 30px; box-shadow: 0px 5px 5px black;",$libre4);//$d8=despieges(D,Dia,1,31).despieges(M,Mes,1,12).despieges(A,Año,2015,2030);
		$i9=Llegada;            $d9=input(text,D_r,$_POST[D_r],"","width: 30px;  box-shadow: 0px 5px 5px black;",$libre5)	.input(text,M_r,$_POST[M_r],"","width: 30px;  box-shadow: 0px 5px 5px black;",$libre6)	.input(text,A_r,$_POST[A_r],"","width: 30px;  box-shadow: 0px 5px 5px black;",$libre7);//$d9=despieges(D_r,Dia,1,31).despieges(M_r,Mes,1,12).despieges(A_r,Año,2015,2030);
		 //input($type,$name,$value,$title,$style,$libre)
		$i10='Flete R.';        $d10=input(text,flete_r,$_POST[flete_r],'',''	,'id="flete_r" maxlength="10"');
		$i11="Kms inicio";      $d11=input(text,km_i,$_POST[km_i],'',''			,'id="km_i"maxlength="10"');
		$i12="Kms fin";         $d12=input(text,km_f,$_POST[km_f],'',''			,'id="km_f"');
		$i13="N° Cuenta";       $d13=input(button,n_c,$_POST[n_c]).input(hidden,n_c,$n+1);
		$i14=Cometa;            $d14="<TEXTAREA class='Medio' id='comenta' maxleght='200' title='comentario general de el viaje' name='come'>$_POST[come]</TEXTAREA>";
		$d15=date("d/m/Y");
		IF ($grava==1)$d16=input(submit,Grava,Guardar,'','','');
		IF ($grava==0)$d16="Verifique <br> marcadas en Rosa";
		$tabla=folio;$n_id=ID_G;$id=$_POST[Carta1];
		$n1=CHOFER;		$v1=$_POST[chofer];	$n2=PLACAS;		$v2=$_POST[placas];	$n3=CLIENTE;	$v3=$_POST[cliente];
		$n4=Revisado;	$v4=0;				$n5=Descripcion;$v5=$_POST[come];	$n6=Difer_1;	$v6=$dif1;
		$n7=Carta1;		$v7=$_POST[Carta1];	$n8=Carta2;		$v8=$_POST[Carta2];	$n9=Carta3;		$v9=$_POST[Carta3];
		$n11=Carta4;	$v11=$_POST[Carta4];$n12=N_Cuenta;	$v12=$n+1; 
		$n13=sueldo;	$v13=$c;			$n14=isr;		$v14=$rete; 
		include('espe_tab.php');
		IF (($grava==1)&&($_POST[Grava]==Guardar)){
			MYSQL_QUERY($res,$conexion)or die("Error <br>$res".mysql_error($conexion));
			modifica(choferes_on);
			$d16='Guardado Con Exito';
		}
		//----------------------------------------------------------[general]
		echo "<div style='position: absolute;left: 120px;background: #444;padding: 5px;'>";
			/*libre_v1::db						(empresa,$conexion,$phpv);
			if($cuenta<>""){
				include("../admin2/descarga_cue2.php");				
				if($descarga_cue2=="")		{echo"<script>alert('[descarga_cue2] no localizado');</script>";}
			}*/
			
			
			$name_menu ="menu-list";
			$opti_menu1="Fletes";
			$opti_menu2="Viaticos";
			$opti_menu3="Diesel";
			$opti_menu4="Casetas";
			$opti_menu5="Facturas";
			$opti_menu6="R y R";
			$opti_menu7="Guias";
			$opti_menu8="Maniobras";
			$opti_menu9="Via Pass";
			$style_all="margin: 0px .5px; width: 60px; text-align: center;";
			$TYPE=text;
			$style_all=$style_all."background: #343434; color: #0075ff;";
			echo libre_v1::input2($TYPE,'','','',$style_all);
			echo libre_v1::input2($TYPE,$name_menu,'',$opti_menu1,$style_all);
			echo libre_v1::input2($TYPE,$name_menu,'',$opti_menu2,$style_all);
			echo libre_v1::input2($TYPE,$name_menu,'',$opti_menu3,$style_all);
			echo libre_v1::input2($TYPE,$name_menu,'',$opti_menu4,$style_all);
			echo libre_v1::input2($TYPE,$name_menu,'',$opti_menu5,$style_all);
			echo libre_v1::input2($TYPE,$name_menu,'',$opti_menu6,$style_all);
			echo libre_v1::input2($TYPE,$name_menu,'',$opti_menu7,$style_all);
			echo libre_v1::input2($TYPE,$name_menu,'',$opti_menu8,$style_all);
			echo libre_v1::input2($TYPE,$name_menu,'',$opti_menu9,$style_all);
			echo libre_v1::input2(hidden,focus_gene,'',$_POST[focus_gene],$style_all);	
			echo "<br>";
			$conta=0;
			for($x=1; $x<=20; $x++){
				$name1="4TEXT_VIA".$x;
				$name2="9TEXT".$x;
				$_POST[$name2]=$_POST[$name1];
			}	
			for($x=1; $x<=20; $x++){
				$text="background: #343434; color: #0075ff;";
				$conta=$conta+1;
				$id=$conta;
				echo libre_v1::input2($TYPE,'',$id,$x,$style_all.$text,'',$id);
				for($y=1; $y<10; $y++){	
					$name=$y."TEXT";
					$name0=$name;
					$name=$y."TEXT".$x;
					$title=$y."TEXT_C".$x;
					$name_c=$y."TEXT_C".$x;
					$style1="";
					$id=$name;
					$style1="background: #D5D2D2; color: black;";
					$libre_all="";
					if(($x>5)&&($y==1))	{$style1="background: #003f47; color: black;";$libre_all='readonly="readonly"';}//limite 1  -> fletes
					if(($x>5)&&($y==2))	{$style1="background: #003f47; color: black;";$libre_all='readonly="readonly"';}//limite 2  -> casetas
					if(($x>7)&&($y==3))	{$style1="background: #003f47; color: black;";$libre_all='readonly="readonly"';}//limite 3  -> diesel
					if(($x>20)&&($y==4)){$style1="background: #003f47; color: black;";$libre_all='readonly="readonly"';}//limite 4  -> casetas
					if(($x>5)&&($y==5))	{$style1="background: #003f47; color: black;";$libre_all='readonly="readonly"';}//limite 5  -> facturas
					if(($x>10)&&($y==6)){$style1="background: #003f47; color: black;";$libre_all='readonly="readonly"';}//limite 6  -> "r y r "
					if(($x>5)&&($y==7))	{$style1="background: #003f47; color: black;";$libre_all='readonly="readonly"';}//limite 7  -> "Guias "
					if(($x>10)&&($y==8)){$style1="background: #003f47; color: black;";$libre_all='readonly="readonly"';}//limite 8  -> "Maniobras "
					if(($x>20)&&($y==9)){$style1="background: #003f47; color: black;";$libre_all='readonly="readonly"';}//limite 9  -> via pass
					/*
					if($name0=="1TEXT"){ $total1=$total1+$_POST[$name];}
					if($name0=="2TEXT"){ $total2=$total2+$_POST[$name];}
					if($name0=="3TEXT"){ $total3=$total3+$_POST[$name];}
					if($name0=="4TEXT"){ $total4=$total4+$_POST[$name];}
					if($name0=="5TEXT"){ $total5=$total5+$_POST[$name];}
					if($name0=="6TEXT"){ $total6=$total6+$_POST[$name];}
					if($name0=="7TEXT"){ $total7=$total7+$_POST[$name];}
					if($name0=="8TEXT"){ $total8=$total8+$_POST[$name];}
					if($name0=="9TEXT"){ $total9=$total9+$_POST[$name];}*/
					$value=$_POST[$name];
					$title=$_POST[$title];		
					$value_c=$_POST[$name_c];		
					//input2							  ($type2,$name,$title	,$value,$style		,$id,$libre,$class)	onkeypress="return pulsar(event)"
					if($y==9){
						$name="4TEXT_VIA".$x;
					}
					echo libre_v1::input2($TYPE,$name,$title,$value,$style_all.$style1,$id,$libre_all
					//.'onKeyUp="mueve_diba_text(event,this); 	calcula_update();" onKeyPress=" mueve_diba_text(event,this); " onfocus="comentariosA(this);"');
					.'onKeyUp="mueve_diba_text(event,this); 	" onKeyPress=" mueve_diba_text(event,this);"	onfocus="comentariosA(this);"');
					echo libre_v1::input2(hidden,$name_c,'',$value_c,'',$name_c);
					
				}
				echo "<br>";	
			}
			echo libre_v1::input2($TYPE,'','',TOTALES,$style_all).libre_v1::input2(hidden,hidden_fe				,'',5	);
			echo libre_v1::input2($TYPE,TOTAL1,'',$total1,$style_all.$text,TOTAL1,"onchange='calculadora();'").libre_v1::input2(hidden,hidden_fe		,'',5	,hidden_fe);
			echo libre_v1::input2($TYPE,TOTAL2,'',$total2,$style_all.$text,TOTAL2,"onchange='calculadora();'").libre_v1::input2(hidden,hidden_v		,'',5	,hidden_v);
			echo libre_v1::input2($TYPE,TOTAL3,'',$total3,$style_all.$text,TOTAL3,"onchange='calculadora();'").libre_v1::input2(hidden,hidden_d		,'',7	,hidden_d);
			echo libre_v1::input2($TYPE,TOTAL4,'',$total4,$style_all.$text,TOTAL4,"onchange='calculadora();'").libre_v1::input2(hidden,hidden_c		,'',20	,hidden_c);
			echo libre_v1::input2($TYPE,TOTAL5,'',$total5,$style_all.$text,TOTAL5,"onchange='calculadora();'").libre_v1::input2(hidden,hidden_c_via	,'',20	,hidden_c_via);
			echo libre_v1::input2($TYPE,TOTAL6,'',$total6,$style_all.$text,TOTAL6,"onchange='calculadora();'").libre_v1::input2(hidden,hidden_f		,'',5	,hidden_f);
			echo libre_v1::input2($TYPE,TOTAL7,'',$total7,$style_all.$text,TOTAL7,"onchange='calculadora();'").libre_v1::input2(hidden,hidden_r		,'',10	,hidden_r);
			echo libre_v1::input2($TYPE,TOTAL8,'',$total8,$style_all.$text,TOTAL8,"onchange='calculadora();'").libre_v1::input2(hidden,hidden_g		,'',5	,hidden_g);
			echo libre_v1::input2($TYPE,TOTAL9,'',$total9,$style_all.$text,TOTAL9,"onchange='calculadora();'").libre_v1::input2(hidden,hidden_m		,'',10	,hidden_m);

		echo "</div>";
		//----------------------------------------------------------[Calulos]
		$size=0;
		$style="background: rgba(0, 0, 0, 0.77) none repeat scroll 0% 0%; width: auto; color: white;";
		$ts="background: black;";
		$title1='Generales';
		$i1="Gastos T.";   	$d1=input(button,'',$t_g,"Casetas[$total4] + Facturas[$total5] + RYR[$total6] + Guias[$total7] + Maniobras[$total8] =$g_t",'background: #FDFD96; color: black;');
		$i2=Chofer;			$d2=input(button,'',$c,"Flete[$total1] * 0.15= $c ",'background: #FDFD96; color: black;');
		$i3=ISR;			$d3=input(button,'',$rete,"(Chofer[$c] * 7.5)/100 = $rete ",'background: orange; color: black;');
		$i4=Viaticos;		$d4=input(button,'',$total2,'','background: greenyellow; color: black;');
		$i5='';				$d5=input(button,'',$dif1,"Viaticos[$total2] + Retencion[$rete] -Gasto T.[$g_t] = $dife1 ","background: $sd5; color: $ld5;");
		$tc6='#989898';			$i6='';			$d6='';
		$i7='Sin. Cho.';	$d7=input(button,'',$t_g,"Casetas[$total4] + Facturas[$total5] + RYR[$total6] + Guias[$total7] + Maniobras[$total8] =$g_t",'background: #FDFD96; color: black; ');
		$i8=Viaticos;		$d8=input(button,'',$total2,'','background: greenyellow; color: black;');
		$i9='';				$d9=input(button,'',$dif2,"Viaticos[$total2] -Gasto T.[$g_t] = $dife2 ","background: $sd9; color: $ld9;");
		$tc10='#989898';			$i10='';		$d10='';
		$i11=Flete;			$d11=input(button,'',$_POST[flete_r],'','background: aqua;');
		$i12='Total G.';	$d12=input(button,'',$t_d_g,"Diesel[$total3] +Gasto T.[$t_g] + Comision[$comi] = $t_d_g ","background: orange; color: black;");
		$i13='Neto Carro';	$d13=input(button,'',$n_c,"Neto Camion[$n_c] / (fletes[$flete_r] * 0.01) = $re ","background: $sd14; color: $ld14;");
		$i14=Rendimiento;	$d14=input(button,'',$re,"Neto Camion[$n_c] / (fletes[$flete_r] * 0.01) = $re ","background: $sd14; color: $ld14;");
		$i15='Cuentas';		$d15='';	$tc15='#000';
		$i16='Actual';		$d16=input(button,'',$dif1,"Viaticos[$total2] + Retencion[$rete] -Gasto T.[$g_t] = $dife1","background: $indf16; color: $indc16;");
		$i17='Arrastado';	$d17=input(button,'',$total10,"Suma de todas las Cuentas Arastradas","background: $indf17; color: $indc17;");
		$i18='';			$d18=input(button,'',$dif3,"Actual[$dif1] + Arrastrada[$dif4]","background: $indf18; color: $indc18;");
		$i19=Abonos;		$d19=input(button,'',$total9,"Suma de los abonos de esta cuenta","background: $indf19; color: $indc19;");
		$i20=Total;			$d20=input(button,'',$dif4,'',"background: $indf20; color: $indc20;");
		include('tablero.php');
		//-----------------------------------------------------------[consola]
			echo"<LINK REL='STYLESHEET' HREF='../admin2/parche1.css' TYPE='TEXT/CSS'/> ";
			
		$id=Consola;
		$min="min";
		if($min<>""){$class=$min;}else{$class=$id;}
		echo "<div id='$id' class='$class'>";
		echo "<div style='position: absolute; width: 20px; height: 20px; background: #ada7a7; float: right; right: 5px; text-align: center;'  onclick='ventanas($id);'>o</div>";
		echo "<div style='position: absolute; top: 20px; left: 5px; right: 5px; bottom: 5px; background: white;overflow-y: auto; overflow-x: auto;' id='res$id'></div>";
		echo "</div>";
		
		//-----------------------------------------------------------[cauldulos]
		echo "<div>";
			/*	
			libre_v1::db						(empresa,$conexion,$phpv);
			if($cuenta<>""){
				include("descarga_cue2.php");		
				if($descarga_cue2=="")		{echo"<script>alert('[descarga_cue2] no localizado');</script>";}
			}
			//Calculadora
			for($x=1; $x<=9; $x++){
				for($y=1; $y<=20; $y++){
					$name=$x."TEXT".$y;
					
					$total=$total+$_POST[$name];
				}
				$_POST["TOTAL".$x]=$total;
				$total=0;
			}*/
			//	$total9=	presenta2 (hidden_ab	,'ab_Com','ab',$type);
			//	$total10=	presenta2 (hidden_ac	,'ID_ac','ac',$type);
			/*
			$total9=0;
			for($y=1; $y<=5; $y++){$name1="ac".$y;$total9=$total9+$_POST[$name1];}
			$TOTALAC=$total9;
			$total10=0;
			for($y=1; $y<=5; $y++){$name1="ab".$y;$total10=$total10+$_POST[$name1];}
			$TOTALAB=$total10;
			*/
			/*
			$FLETES		= $total1=$_POST[TOTAL1];
			$VIATICOS	= $total2=$_POST[TOTAL2];
			$DIESEL		= $total3=$_POST[TOTAL3];
			$CASETAS	= $total4=$_POST[TOTAL4];
			$FACTURAS	= $total5=$_POST[TOTAL5];
			$RYR		= $total6=$_POST[TOTAL6];
			$GUIAS		= $total7=$_POST[TOTAL7];
			$MANIOBRAS	= $total8=$_POST[TOTAL8];
			$VIA_PASS	= $total9=$_POST[TOTAL9];
			$TOTALAC	= $total10=$_POST[Totalac];
			$TOTALAB	= $total11=$_POST[Totalab];*/
			$Flete_R	= $_POST[flete_r];
			$PRECIO_D	= $_POST[presio_d];
			$KM_I		= $_POST[km_i];
			$KM_F		= $_POST[km_f];
			
			
			$iva=(($total3+$comi)/1.15)*0.15;
			if($_POST[comi]=="")$_POST[comi]=15;
			$iva			=libre_v1::forma_num($iva,2);
			$G_T			=libre_v1::forma_num($CASETAS+$FACTURAS+$RYR+$GUIAS+$MANIOBRAS,2);//casetas+facturas+ryr+guias+maniobras
			$CHOFER			=libre_v1::forma_num($FLETES*0.15,2);				
			if($_POST[comi]<>'')$CHOFER=libre_v1::forma_num($total1*($_POST[comi]/100),2);
			$T_G			=libre_v1::forma_num($CHOFER+$G_T,2);
			$COMICIONES		=libre_v1::forma_num($Flete_R*0.0928,2);
			$DIF_VIA_GSC	=libre_v1::forma_num($VIATICOS-$G_T,2);
			$T_G_F			=libre_v1::forma_num($T_G+$DIESEL+$COMICIONES+$VIA_PASS,2);
			$NETO_CARRO		=libre_v1::forma_num($Flete_R-$T_G_F,2);
			$RENDIMIENTO	=libre_v1::forma_num($NETO_CARRO/($Flete_R*0.01),2);
			$ISR			=libre_v1::forma_num((($CHOFER*7.5)/100),2);
			$DIF_TV			=libre_v1::forma_num($VIATICOS+$ISR-$T_G,2);
			$TOTALTOTAL		=libre_v1::forma_num($TOTALAC+$TOTALAB+$DIF_TV,2);
			$Total_km		=libre_v1::forma_num($KM_F-$KM_I);
			$T_L			=libre_v1::forma_num($DIESEL/$PRECIO_D);
			$KM_L			=libre_v1::forma_num($Total_km/$T_L);
			
			
			$TYPE=text;
			$libre_all='readonly="readonly"';
			$style_all="margin: 0px .5px; width: 81px; text-align: center;";
					echo "<div style='position: absolute;top: 410px;background: #444444;padding: 5px; left: 120px;'>";
					echo libre_v1::input2($TYPE,'','',"Actual",'background: #343434; color: #a4c1e3; width: 100%; text-align: center;','',$libre_all);
					echo "<br>";
					echo libre_v1::input2($TYPE,'','',"Comision %",$style_all.'background: #343434; color: #0075ff;','',$libre_all);
					echo libre_v1::input2($TYPE,comi,'',$_POST[comi],$style_all."background: #9E9E9E;",comi,"onkeyup='calcula_update();'");
					echo libre_v1::input2($TYPE,'','','',$style_all,'',$libre_all);
					echo libre_v1::input2($TYPE,'','','',$style_all,'',$libre_all);
					echo libre_v1::input2($TYPE,'','','',$style_all,'',$libre_all);
					echo libre_v1::input2($TYPE,'','','',$style_all,'',$libre_all);
					echo "<br>";
					echo libre_v1::input2($TYPE,'','',"Gastos T.",$style_all,'',$libre_all);
					echo libre_v1::input2($TYPE,'',$TITLE_G_T,$G_T,$style_all,G_T,$libre_all);
					echo libre_v1::input2($TYPE,'','',"Gts.sin Chof.",$style_all,'',$libre_all);
					echo libre_v1::input2($TYPE,'','',$G_T,$style_all."background: orange;",G_T2,$libre_all);	
					echo libre_v1::input2($TYPE,'','',"Fletes R.",$style_all,'',$libre_all);
					echo libre_v1::input2($TYPE,'','',$Flete_R,$style_all."background: #00d2ff;",flete_r2,$libre_all);
					echo "<br>";
					echo libre_v1::input2($TYPE,'','',"Chofer",$style_all,'',$libre_all);
					echo libre_v1::input2($TYPE,'','',$CHOFER,$style_all,"CHOFER",$libre_all);	
					echo libre_v1::input2($TYPE,'','',"viaticos",$style_all,'',$libre_all);
					echo libre_v1::input2($TYPE,'','',$VIATICOS,$style_all."background: #01d501;",VIATICOS,$libre_all);	
					echo libre_v1::input2($TYPE,'','',"Total g.",$style_all,'',$libre_all);
					echo libre_v1::input2($TYPE,'',"Diesel[$total3] + Gasto T.[$T_G] + Comision[$COMICIONES] + Via pass[$VIA_PASS] = $T_G_F ",$T_G_F,$style_all."background: orange;",T_G_F,$libre_all);	
					echo "<br>";
					echo libre_v1::input2($TYPE,'','',"ISR",$style_all);
					echo libre_v1::input2($TYPE,'','',$ISR,$style_all,ISR);
					echo libre_v1::input2($TYPE,'','',"Diferencia",$style_all,'',$libre_all);
					echo libre_v1::input2($TYPE,'','',$DIF_VIA_GSC,$style_all."background: yellow;",DIF_VIA_GSC,$libre_all);
					echo libre_v1::input2($TYPE,'','',"Neto Carro",$style_all,'',$libre_all);
					echo libre_v1::input2($TYPE,'','',$NETO_CARRO,$style_all."background: #01d501;",NETO_CARRO,$libre_all);
					echo "<br>";
					echo libre_v1::input2($TYPE,'','',"VIATICOS",$style_all,'',$libre_all);
					echo libre_v1::input2($TYPE,'','',$VIATICOS,$style_all."background: #01d501;",VIATICOS2,$libre_all);
					echo libre_v1::input2($TYPE,'','','',$style_all);	
					echo libre_v1::input2($TYPE,'','','',$style_all);	
					echo libre_v1::input2($TYPE,'','','',$style_all);	
					echo libre_v1::input2($TYPE,'','','',$style_all);	
					echo "<br>";
					echo libre_v1::input2($TYPE,'','',"DIFERENCIA",$style_all);
					echo libre_v1::input2($TYPE,'','',$DIF_TV,$style_all."background: yellow;",DIF_TV,$libre_all);	
					echo libre_v1::input2($TYPE,'','','',$style_all);	
					echo libre_v1::input2($TYPE,'','','',$style_all);	
					echo libre_v1::input2($TYPE,'','',"rendimiento",$style_all."background: yellow;");
					echo libre_v1::input2($TYPE,'','',$RENDIMIENTO,$style_all."background: yellow;",RENDIMIENTO,$libre_all);			
				echo "</div>";
				echo "<div style='position: absolute;top: 550px;background: #444444;padding: 5px;  left: 120px;'>";
					echo libre_v1::input2($TYPE,'','','Relacion de Combustible ','margin: 0px .5px; width: 100%; text-align: center; background: #343434; color: #a4c1e3;');
					echo "<br>";		
					echo libre_v1::input2($TYPE,'','','Presio Diesel',$style_all.'background: #343434; color: #0075ff;','',$libre_all);
					echo libre_v1::input2($TYPE,presio_d,'',$_POST[presio_d],$style_all."background: #9E9E9E;",presio_d,"onkeyup='calcula_update();'");				
					echo libre_v1::input2($TYPE,'','','',$style_all);	
					echo libre_v1::input2($TYPE,'','','',$style_all);
					echo libre_v1::input2($TYPE,'','','',$style_all);
					echo libre_v1::input2($TYPE,'','','',$style_all);
					echo "<br>";		
					echo libre_v1::input2($TYPE,'','','KM Recoridos',$style_all);		
					echo libre_v1::input2($TYPE,'','',$Total_km,$style_all,Total_km);
					echo libre_v1::input2($TYPE,'','','Total De Litros',$style_all);
					echo libre_v1::input2($TYPE,'','',$T_L,$style_all,t_l);
					echo libre_v1::input2($TYPE,'','','Km * Ls',$style_all);
					echo libre_v1::input2($TYPE,'','',$KM_L,$style_all,km_l);
				echo "</div>";
				echo "<div style='position: absolute;top: 410px;background: #444444;padding: 5px;  left: 630px;'>";		
					echo libre_v1::input2($TYPE,'','',Arrastrado,"width: 50%; text-align: center; background: #343434; color: #a4c1e3;");
					echo libre_v1::input2($TYPE,'','',Abonado," width: 50%; text-align: center; background: #343434; color: #a4c1e3;");
					echo "<br>";		
					echo libre_v1::input2($TYPE,'','','Anteriores',$style_all);
					echo libre_v1::input2($TYPE,'','','',$style_all);
					echo libre_v1::input2($TYPE,'','','Fecha',$style_all);
					echo libre_v1::input2($TYPE,'','','',$style_all,'',$libre_all);
					echo "<br>";		
					echo libre_v1::input2($TYPE,ID_ac1	,'',$_POST[ID_ac1]	,$style_all.'background: #343434; color: #0075ff;','ID_ac1'		,"readonly='readonly' placeholder='Folio add' onclick='elimi_arra(this);'");
					echo libre_v1::input2($TYPE,ac1		,'',$_POST[ac1]		,$style_all.'background: #B6B1B1;','ac1'						,"onkeyup='calcula_update();'readonly='readonly'");
					echo libre_v1::input2($TYPE,ab_Com1	,'',$_POST[ab_Com1]	,$style_all.'background: #343434; color: #0075ff;','ab_Com1'	,"placeholder='Fecha'");
					echo libre_v1::input2($TYPE,ab1		,'',$_POST[ab1]		,$style_all.'background: #B6B1B1;','ab1'						,"onkeyup='calcula_update();'");
					echo "<br>";	
					echo libre_v1::input2($TYPE,ID_ac2	,'',$_POST[ID_ac2]	,$style_all.'background: #343434; color: #0075ff;','ID_ac2'		,"readonly='readonly' placeholder='Folio add' onclick='elimi_arra(this);'");
					echo libre_v1::input2($TYPE,ac2		,'',$_POST[ac2]		,$style_all.'background: #B6B1B1;','ac2'						,"onkeyup='calcula_update();'readonly='readonly'");
					echo libre_v1::input2($TYPE,ab_Com2	,'',$_POST[ab_Com2]	,$style_all.'background: #343434; color: #0075ff;','ab_Com2'	,"placeholder='Fecha'");
					echo libre_v1::input2($TYPE,ab2		,'',$_POST[ab2]		,$style_all.'background: #B6B1B1;','ab2'						,"onkeyup='calcula_update();'");
					echo "<br>";		
					echo libre_v1::input2($TYPE,ID_ac3	,'',$_POST[ID_ac3]	,$style_all.'background: #343434; color: #0075ff;','ID_ac3'		,"readonly='readonly' placeholder='Folio add' onclick='elimi_arra(this);'");
					echo libre_v1::input2($TYPE,ac3		,'',$_POST[ac3]		,$style_all.'background: #B6B1B1;','ac3'						,"onkeyup='calcula_update();'readonly='readonly'");
					echo libre_v1::input2($TYPE,ab_Com3	,'',$_POST[ab_Com3]	,$style_all.'background: #343434; color: #0075ff;','ab_Com3'	,"placeholder='Fecha'");
					echo libre_v1::input2($TYPE,ab3		,'',$_POST[ab3]		,$style_all.'background: #B6B1B1;','ab3'						,"onkeyup='calcula_update();'");
					echo "<br>";		
					echo libre_v1::input2($TYPE,ID_ac4	,'',$_POST[ID_ac4]	,$style_all.'background: #343434; color: #0075ff;','ID_ac4'		,"readonly='readonly' placeholder='Folio add' onclick='elimi_arra(this);'");
					echo libre_v1::input2($TYPE,ac4		,'',$_POST[ac4]		,$style_all.'background: #B6B1B1;','ac4'						,"onkeyup='calcula_update();'readonly='readonly'");
					echo libre_v1::input2($TYPE,ab_Com4	,'',$_POST[ab_Com4]	,$style_all.'background: #343434; color: #0075ff;','ab_Com4'	,"placeholder='Fecha'");
					echo libre_v1::input2($TYPE,ab4		,'',$_POST[ab4]		,$style_all.'background: #B6B1B1;','ab4'						,"onkeyup='calcula_update();'");
					echo "<br>";		
					echo libre_v1::input2($TYPE,ID_ac5	,'',$_POST[ID_ac5]	,$style_all.'background: #343434; color: #0075ff;','ID_ac5'		,"readonly='readonly' placeholder='Folio add' onclick='elimi_arra(this);'");
					echo libre_v1::input2($TYPE,ac5		,'',$_POST[ac5]		,$style_all.'background: #B6B1B1;','ac5'						,"onkeyup='calcula_update();'readonly='readonly'");
					echo libre_v1::input2($TYPE,ab_Com5	,'',$_POST[ab_Com5]	,$style_all.'background: #343434; color: #0075ff;','ab_Com5'	,"placeholder='Fecha'");
					echo libre_v1::input2($TYPE,ab5		,'',$_POST[ab5]		,$style_all.'background: #B6B1B1;','ab5'						,"onkeyup='calcula_update();'");
					echo "<br>";		
					echo libre_v1::input2($TYPE,'','','Anterior',$style_all);
					echo libre_v1::input2($TYPE,'','',$TOTALAC,$style_all.'background: yellow;',Totalac,$libre_all);
					echo libre_v1::input2($TYPE,'','','',$style_all);
					echo libre_v1::input2($TYPE,'','','',$style_all);
					echo "<br>";		
					echo libre_v1::input2($TYPE,'','','Actual	',$style_all);
					echo libre_v1::input2($TYPE,'','',$DIF_TV,$style_all.'background: yellow;',DIF_TV2,$libre_all);
					echo libre_v1::input2($TYPE,'','','',$style_all);	
					echo libre_v1::input2($TYPE,'','',$TOTALAB,$style_all.'background: yellow;',Totalab,$libre_all);
					echo "<br>";		
					echo libre_v1::input2($TYPE,'','','',$style_all);
					echo libre_v1::input2($TYPE,'','',Diferencia,$style_all);
					echo libre_v1::input2($TYPE,Total_Total,'',$TOTALTOTAL,$style_all,Total_Total,$libre_all);
					echo libre_v1::input2($TYPE,'','','',$style_all);
					echo "<br>";		
					echo libre_v1::input2(hidden,Hide_ac		,'',5	,$style_all.'background: #B6B1B1;','Hide_ac');
					echo libre_v1::input2(hidden,Hide_ab		,'',5	,$style_all.'background: #B6B1B1;','Hide_ab');
					echo libre_v1::input2(hidden,add_en		,'',$_POST[add_en]		,$style_all.'background: #B6B1B1;','add_en');
					echo libre_v1::input2(hidden,HIDE1		,'',20	,$style_all.'background: #B6B1B1;','HIDE1');
					echo libre_v1::input2(hidden,HIDE2		,'',20	,$style_all.'background: #B6B1B1;','HIDE2');
					echo libre_v1::input2(hidden,HIDE3		,'',20	,$style_all.'background: #B6B1B1;','HIDE3');
					echo libre_v1::input2(hidden,HIDE4		,'',20	,$style_all.'background: #B6B1B1;','HIDE4');
					echo libre_v1::input2(hidden,HIDE5		,'',20	,$style_all.'background: #B6B1B1;','HIDE5');
					echo libre_v1::input2(hidden,HIDE6		,'',20	,$style_all.'background: #B6B1B1;','HIDE6');
					echo libre_v1::input2(hidden,HIDE7		,'',20	,$style_all.'background: #B6B1B1;','HIDE7');
					echo libre_v1::input2(hidden,HIDE8		,'',20	,$style_all.'background: #B6B1B1;','HIDE8');
					echo libre_v1::input2(hidden,HIDE9		,'',20	,$style_all.'background: #B6B1B1;','HIDE9');
					echo libre_v1::input2(hidden,TIPO		,'',$tipo	,$style_all.'background: #B6B1B1;','TIPO');
			echo "</div>";
		echo "</div>";
		//-----------------------------------------------------------[arrastrado]
		echo "<div style='position: absolute;top: 0px;background: #444;height: 270px;padding: 5px;left: 740px;'>";
			echo libre_v1::input2(button,'','',"Folio 1"	,'width: 50px; height: 15px; box-shadow: 0px 5px 5px black; margin: 0px .5px;','');	
			echo libre_v1::input2(button,'','',"Saldo"  	,'width: 60px; height: 15px; box-shadow: 0px 5px 5px black; margin: 0px .5px;','');	
			echo libre_v1::input2(button,'','',"Estado"  	,'width: 70px; height: 15px; box-shadow: 0px 5px 5px black; margin: 0px .5px;','');	
			echo libre_v1::input2(button,'','',"Añadidos"  ,'width: 70px; height: 15px; box-shadow: 0px 5px 5px black; margin: 0px .5px;','');
			$text="background: #343434; color: #0075ff;";
			echo "<div id	='divArrastrar' style='overflow-x: hidden;overflow-y: auto;height: 240px;position: relative;padding: 5px 0px;background: #248ec1;width: 275px;'>";
					//echo "<div style='overflow-x: hidden; overflow-y: hidden; max-height: 500px; right: 0px; bottom: 0px; position: relative; left: 0px;'>";
					$style_all="margin: 0px .5px; text-align: center;";
					libre_v1::db							(empresa,$conexion,$phpv);
					$consu5	= libre_v1::consulta			(folio,$conexion	,CHOFER,$_POST[chofer],'ID_G','1'	,$phpv,'');
					libre_v1::mysql_da_se	($consu5,0,$phpv);			
					while($datos=libre_v1::mysql_fe_ar	($consu5,$phpv)){
						$consu24	= 	libre_v1::consulta(abo_acu,$conexion	,ID_G,$datos[ID_G],'',''	,$phpv,'1');
						$dato		= 	libre_v1::mysql_fe_ar	($consu24,$phpv);
						$c0='';	$c1='';	$c2='';
						if($datos[Revisado]==0){$c2=white;	$c0=red;			$Revisado="Pendiente";}
						if($datos[Revisado]==1){$c2=white;	$c0=yellowgreen;	$Revisado="Revisada";}
						if($dato[add_en]==''){$c1='#121212';	$Estado="Libre";}
						if($dato[add_en]<>''){$c1='#343434';	$Estado="Arrastrada";}
						
						echo libre_v1::input2(button	,Carta_arr	,'',$datos[ID_G]		,"width: 50px;".$style_all.$text,'','onclick="add_arrastra(this);"');
						echo libre_v1::input2(button	,''			,'',libre_v1::zero($dato[Total_Total]),"background: $c1; color: $c2; width: 60px;".$style_all);
						echo libre_v1::input2(button	,''			,'',$Revisado			,"background: $c1; color:$c0; width: 70px;".$style_all);
						echo libre_v1::input2(button	,''			,'',$Estado				,"background: $c1; color:$c2; width: 70px;".$style_all);
						
						
						echo "<br>";
					}
					//echo "</div>";
			echo "</div>";
		echo "</div>";
		//-----------------------------------------------------------
		
		echo"<TEXTAREA style='
			position: absolute;
			left: 0px;
			top: 220px;
			width: 105px;
			height: 200px;
			color: white;
			background: none 0% 0% repeat scroll rgba(0, 0, 0, 0.77);
			margin: 0px;
			z-index: 1;' >";
			//-----------------------------------------------------------
			$tabla=km;
			$n_id=ID_G;		$id=$_POST[Carta1];
			$n1=KM_S;		$v1=$_POST[km_i];
			$n2=KM_E;		$v2=$_POST[km_f];	  
			include('espe_tab.php');
			IF (($grava==1)&&($_POST[Grava]==Guardar)){MYSQL_QUERY($res,$conexion)or die("Error <br>$res".mysql_error($conexion));}
			//-----------------------------------------------------------
			$tabla=fechas;$n_id=ID_G;$id=$_POST[Carta1];
			$n1=D;		$v1=$_POST[D];	
			$n2=M;		$v2=$_POST[M];	
			$n3=A;		$v3=$_POST[A];
			$n4=D_r;	$v4=$_POST[D_r];
			$n5=M_r;	$v5=$_POST[M_r];
			$n6=A_r;	$v6=$_POST[A_r];
			$n7=D_c;	$v7=date("d");	
			$n8=M_c;	$v8=date("m");
			$n9=A_c;	$v9=date("Y");
			$n10=inicio;	$v10='';
			include('espe_tab.php');
			IF (($grava==1)&&($_POST[Grava]==Guardar)){MYSQL_QUERY($res,$conexion)or die("Error <br>$res".mysql_error($conexion));}
			//-------------------------------------------- ---------------
			$tabla=fletes;
			$na1="1TEXT";	$va1="1TEXT";
			$n_id="ID_G";	$id=Carta1;
			$repit1=5;
			$n1=Flete_R;	$v1=$_POST[flete_r];
			$n2=comi_ass;	$v2=$_POST[comi];
			$n3=HIDE1;		$v3=5;
			$n4=TOTAL1;		$v4=$total1;
			include('auto_tab.php');
			IF (($grava==1)&&($_POST[Grava]==Guardar)){MYSQL_QUERY($res,$conexion)or die("Error <br>$res".mysql_error($conexion));}
			//----------------------------------------------------------
			$tabla=viaticos;
			$na1="2TEXT";
			$va1="2TEXT";
			$n_id="ID_G";
			$id=Carta1;
			$repit1=5;
			$n1=HIDE2;	$v1=5;
			$n2=TOTAL2;	$v2=$total2;
			include('auto_tab.php');
			IF (($grava==1)&&($_POST[Grava]==Guardar)){MYSQL_QUERY($res,$conexion)or die("Error <br>$res".mysql_error($conexion));}
			//----------------------------------------------------------
			$tabla=disel;
			$na1="3TEXT";	$va1="3TEXT";
			$n_id="ID_G";	$id=Carta1;
			$repit1=7;
			$n1=presio_d;	$v1=$_POST[presio_d];
			$n2=HIDE3;		$v2=7;
			$n3=TOTAL3;		$v3=$total3;
			include('auto_tab.php');
			IF (($grava==1)&&($_POST[Grava]==Guardar)){MYSQL_QUERY($res,$conexion)or die("Error <br>$res".mysql_error($conexion));}
			//---------------------------------------------------------
			$tabla=casetas;
			$na1="4TEXT";	$va1="4TEXT";
			$n_id="ID_G";	$id=Carta1;
			$repit1=20;
			$n1=HIDE4;		$v1=20;
			$n2=TOTAL4;		$v2=$total4;
			include('auto_tab.php');
			IF (($grava==1)&&($_POST[Grava]==Guardar)){MYSQL_QUERY($res,$conexion)or die("Error <br>$res".mysql_error($conexion));}
			//---------------------------------------------------------
			$tabla=casetas_via;
			$na1="TEXT";		$va1="4TEXT_VIA";
			$n_id="ID_G";		$id=Carta1;
			$repit1=20;
			$n1=TOTAL;			$v1=20;
			$n2=HIDE;			$v2=$_POST[hidden_c_via];
			include('auto_tab.php');
			IF (($grava==1)&&($_POST[Grava]==Guardar)){MYSQL_QUERY($res,$conexion)or die("Error <br>$res".mysql_error($conexion));}
			//----------------------------------------------------------
			$tabla=facturas;
			$na1="5TEXT";	$va1="5TEXT";
			$n_id="ID_G";	$id=Carta1;
			$repit1=5;
			$n1=HIDE5;		$v1=5;
			$n2=TOTAL5;		$v2=$total5;
			include('auto_tab.php');
			IF (($grava==1)&&($_POST[Grava]==Guardar)){MYSQL_QUERY($res,$conexion)or die("Error <br>$res".mysql_error($conexion));}
			//----------------------------------------------------------
			$tabla=ryr;		
			$na1="6TEXT";	$va1="6TEXT";	
			$n_id="ID_G";	$id=Carta1;
			$repit1=10;
			$n1=HIDE6;		$v1=10;
			$n2=TOTAL6;		$v2=$total6;
			include('auto_tab.php');
			IF (($grava==1)&&($_POST[Grava]==Guardar)){MYSQL_QUERY($res,$conexion)or die("Error <br>$res".mysql_error($conexion));}
			//----------------------------------------------------------
			$tabla=guias;
			$na1="7TEXT";	$va1="7TEXT";
			$n_id="ID_G";	$id=Carta1;
			$repit1=5;
			$n1=HIDE7;		$v1=5;
			$n2=TOTAL7;		$v2=$total7;
			include('auto_tab.php');
			IF (($grava==1)&&($_POST[Grava]==Guardar)){MYSQL_QUERY($res,$conexion)or die("Error <br>$res".mysql_error($conexion));}
			//----------------------------------------------------------
			$tabla=maniobras;
			$na1="8TEXT";	$va1="8TEXT";
			$n_id="ID_G";	$id=Carta1;
			$repit1=6;
			$n1=HIDE8;		$v1=6;
			$n2=TOTAL8;		$v2=$total8;
			include('auto_tab.php');
			IF (($grava==1)&&($_POST[Grava]==Guardar)){MYSQL_QUERY($res,$conexion)or die("Error <br>$res".mysql_error($conexion));}
			//----------------------------------------------------------


			$tabla=fletes_c;	
			$na1="1TEXT";	$va1="1TEXT_C";
			$repit1=5;
			$n_id="ID_G";	$id=Carta1;
			include('auto_tab.php');
			IF (($grava==1)&&($_POST[Grava]==Guardar)){MYSQL_QUERY($res,$conexion)or die("Error <br>$res".mysql_error($conexion));}
			//-----------------------------------------------------------
			$tabla=viaticos_c;
			$na1="2TEXT";	$va1="2TEXT_C";
			$repit1=5;
			$n_id="ID_G";	$id=Carta1;
			include('auto_tab.php');
			IF (($grava==1)&&($_POST[Grava]==Guardar)){MYSQL_QUERY($res,$conexion)or die("Error <br>$res".mysql_error($conexion));}
			//----------------------------------------------------------
			$tabla=disel_c;	
			$repit1=7;	
			$na1="3TEXT";	$va1="3TEXT_C";
			$n_id="ID_G";	$id=Carta1;
			include('auto_tab.php');
			IF (($grava==1)&&($_POST[Grava]==Guardar)){MYSQL_QUERY($res,$conexion)or die("Error <br>$res".mysql_error($conexion));}
			//----------------------------------------------------------
			$tabla=casetas_c_via;
			$repit1=20;
			$na1="TEXT";	$va1="4TEXT_C_VIA";
			$n_id="ID_G";	$id=Carta1;
			include('auto_tab.php');
			IF (($grava==1)&&($_POST[Grava]==Guardar)){MYSQL_QUERY($res,$conexion)or die("Error <br>$res".mysql_error($conexion));}
			//----------------------------------------------------------
			$tabla=casetas_c;	
			$repit1=20;
			$na1="4TEXT";	$va1="4TEXT_C";
			$n_id="ID_G";	$id=Carta1;
			include('auto_tab.php');
			IF (($grava==1)&&($_POST[Grava]==Guardar)){MYSQL_QUERY($res,$conexion)or die("Error <br>$res".mysql_error($conexion));}
			//----------------------------------------------------------
			$tabla=facturas_c;	
			$repit1=5;
			$na1="5TEXT";$va1="5TEXT_C";
			$n_id="ID_G";$id=Carta1;
			include('auto_tab.php');
			IF (($grava==1)&&($_POST[Grava]==Guardar)){MYSQL_QUERY($res,$conexion)or die("Error <br>$res".mysql_error($conexion));}
			//----------------------------------------------------------
			$tabla=ryr_c;		
			$na1="6TEXT";	$va1="6TEXT_C";
			$repit1=10;
			$n_id="ID_G";	$id=Carta1;
			include('auto_tab.php');
			IF (($grava==1)&&($_POST[Grava]==Guardar)){MYSQL_QUERY($res,$conexion)or die("Error <br>$res".mysql_error($conexion));}
			//----------------------------------------------------------
			$tabla=guias_c;		
			$repit1=5;
			$na1="7TEXT";$va1="7TEXT_C";
			$n_id="ID_G";$id=Carta1;
			include('auto_tab.php');
			IF (($grava==1)&&($_POST[Grava]==Guardar)){MYSQL_QUERY($res,$conexion)or die("Error <br>$res".mysql_error($conexion));}
			//----------------------------------------------------------
			$tabla=maniobras_c;
			$repit1=6;
			$na1="8TEXT";$va1="8TEXT_C";
			$n_id="ID_G";$id=Carta1;
			include('auto_tab.php');
			IF (($grava==1)&&($_POST[Grava]==Guardar)){MYSQL_QUERY($res,$conexion)or die("Error <br>$res".mysql_error($conexion));}
			//----------------------------------------------------------
			$tabla=abo_acu;
			$na1=ID_ac;	$va1=ID_ac;	$repit1=$_POST[hidden_ac];
			$na2=ac;	$va2=ac;	$repit2=$_POST[hidden_ac];
			$na3=ab;	$va3=ab;	$repit3=$_POST[hidden_ab];
			$na4=ab_Com;$va4=ab_Com;$repit4=$_POST[hidden_ab];

			$n_id="ID_G";	$id=Carta1;
			$n1=Hide_ac;	$v1=$_POST[hidden_ac];
			$n2=Hide_ab;	$v2=$_POST[hidden_ab];

			$n3=Totalac;	$v3=$total10;
			$n4=Totalab;	$v4=$total9;
			$n5=Total_Total;$v5=$dif4;
			$n6=rete;		$v6=$rete;
			include('auto_tab.php');
			IF (($grava==1)&&($_POST[Grava]==Guardar)){MYSQL_QUERY($res,$conexion)or die("Error <br>$res".mysql_error($conexion));}
			
		echo"</TEXTAREA>";
		//----------------------------------------------------------
	}
?>