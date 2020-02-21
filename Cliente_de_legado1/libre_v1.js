//console.log(focus_a);
var indexado="";
function mueve_diba			(e,input){
	var divres=document.getElementById("Calculos"); 
	tecla = (document.all) ? e.keyCode : e.which;
	var event = window.event ? window.event : e;
	var focus_in=input.id;
	if(event.keyCode==37){
		focus_a=focus_in-1;	
		document.getElementById(focus_a).focus()
	}
	if(event.keyCode==38){
		focus_a=focus_in-10;	
		document.getElementById(focus_a).focus(); 
	}
	if(event.keyCode==39){
		focus_a=parseFloat(focus_in)+1;
		document.getElementById(focus_a).focus(); 
	}
	if(event.keyCode==40){
		focus_a=parseFloat(focus_in)+10;
		document.getElementById(focus_a).focus(); 
	}; 

}
function mueve_diba_text	(e,input){
	var divres=document.getElementById("Calculos"); 
	tecla = (document.all) ? e.keyCode : e.which;
	var event = window.event ? window.event : e;
	var focus_in=input.id;
	var focus_to;
	var focus_id= String(focus_in);
	var largo=focus_id.length;
	var col=focus_id[0];
	var reg=focus_id[5];
	if (largo==7)var reg=focus_id[5]+focus_id[6];
	
	if(event.keyCode==37){
		col=parseFloat(col)-1;
		focus_to=col+"TEXT"+reg;
		document.getElementById(focus_to).focus();
	}
	if(event.keyCode==38){
		reg=parseFloat(reg)-1;
		focus_to=col+"TEXT"+reg;
		document.getElementById(focus_to).focus();
	}
	if(event.keyCode==39){
		col=parseFloat(col)+1;
		focus_to=col+"TEXT"+reg;
		document.getElementById(focus_to).focus();
	}
	if(event.keyCode==40){
		reg=parseFloat(reg)+1;
		focus_to=col+"TEXT"+reg;
		document.getElementById(focus_to).focus();
	}; 
	
}
function calcula_update		(){
	var x,y;
	for(x=1;x<=9; x++){
	var total;
	var	name1=0,input,canti=0,t_name;
	total=0;
	t_name="TOTAL"+x;
	var total_conte=document.getElementById(t_name);
		for(y=1; y<=20; y++){
			name1=x+"TEXT"+y;			
			input=document.getElementById(name1);
			//if(x+"TEXT1"==name1)input=document.getElementById(name1);
			//console.log(input);
			canti=parseFloat(input.value);
			if(canti>=0)total=total+canti;
		}
	//console.log(total_conte);
	total_conte.value=total.toFixed(2);
	}
	for(y=1; y<=5; y++){
		name1="ac"+y;
		canti=0;
		input=document.getElementById(name1);
		if(input.value==''){}else{canti=parseFloat(input.value);}
		if(input.value==''){}else{total=total+canti;}
	}	
	document.getElementById("Totalac").value=total.toFixed(2);
	document.getElementById("Totalac2").value=total.toFixed(2);
	total=0;
	for(y=1; y<=5; y++){
		name1="ab"+y;			
		canti=0;
		input=document.getElementById(name1);
		if(input.value==''){}else{canti=parseFloat(input.value);}
		if(input.value==''){}else{total=total+canti;}
	}	
	document.getElementById("Totalab").value=total.toFixed(2);
	document.getElementById("Totalab2").value=total.toFixed(2);
	calculadora();
}
function windows			(input,div){
	if (input.value=="x"){input.value="-";div.className="min";}else
	if (input.value=="-"){input.value="x";div.className="div"+div.id;}
}
function crearAjax			(){
   var objetoAjax=false;
   if(navigator.appName=="Microsoft Internet Explorer")
     objetoAjax = new ActiveXObject("Microsoft.XMLHTTP");
   else
     objetoAjax = new XMLHttpRequest();
   return(objetoAjax);
}
function cambia_co_centro	(button){
	var ajax=crearAjax();
	var carga=button.value;
	if(ajax){
		ajax.onreadystatechange = function(){
		  var divres=document.getElementById("style_co_centro");
		  if(((ajax.readyState==3)||(ajax.readyState==4))&& (ajax.status == 200)){
			var respuesta = document.createTextNode(ajax.responseText);
			divres.innerHTML = this.responseText;
			//div.appendChild(respuesta);
		  }else{
			//divres.innerHTML="<img src='espera2.gif' style='position: absolute; width: 25px; left: 330px; '></img >";
			divres.innerHTML="Cargando ...";
		  }
		}
		ajax.open("POST","/admin2/windows.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		ajax.send("win_carga="+carga+"&js=1");
  }
}
function calculadora		(){
	var COMI		=parseFloat(document.getElementById("comi").value);
	var FLETES		=parseFloat(document.getElementById("TOTAL1").value);
	var VIATICOS	=parseFloat(document.getElementById("TOTAL2").value);
	var DIESEL		=parseFloat(document.getElementById("TOTAL3").value);
	var CASETAS		=parseFloat(document.getElementById("TOTAL4").value);
	var FACTURAS	=parseFloat(document.getElementById("TOTAL5").value);
	var RYR			=parseFloat(document.getElementById("TOTAL6").value);
	var GUIAS		=parseFloat(document.getElementById("TOTAL7").value);
	var MANIOBRAS	=parseFloat(document.getElementById("TOTAL8").value);
	var VIA_PASS	=parseFloat(document.getElementById("TOTAL9").value);
	var ARRASTRADO	=parseFloat(document.getElementById("Totalac").value);
	var ABONOS		=parseFloat(document.getElementById("Totalab").value);
	var Flete_R		=parseFloat(document.getElementById("flete_r").value);
	
	var G_T			=CASETAS+FACTURAS+RYR+GUIAS+MANIOBRAS;	
	//var CHOFER		=FLETES*0.15;
	if(COMI==''){var CHOFER		=FLETES*0.15;}else{ var CHOFER		=FLETES*(COMI/100);}
	//if(input.value==''){}else{$total1*($_POST[comi]/100)
	var T_G			=CHOFER+G_T;
	var COMICIONES	=Flete_R*0.0928;
	var DIF_VIA_GSC	=VIATICOS-G_T;
	var T_G_F		=T_G+DIESEL+COMICIONES;
	var NETO_CARRO	=Flete_R-T_G_F;
	var RENDIMIENTO	=NETO_CARRO/(Flete_R*0.01);
	var ISR			=((CHOFER*7.5)/100);
	var DIF_TV		=VIATICOS+ISR-T_G;
	var TOTALTOTAL	=ARRASTRADO+ABONOS+DIF_TV;
	
	document.getElementById("G_T").value		=G_T.toFixed(2);
	document.getElementById("G_T2").value		=G_T.toFixed(2);
	document.getElementById("CHOFER").value		=CHOFER.toFixed(2);
	document.getElementById("T_G").value		=T_G.toFixed(2);
	document.getElementById("flete_r2").value	=Flete_R.toFixed(2);
	document.getElementById("VIATICOS").value	=VIATICOS.toFixed(2);
	document.getElementById("VIATICOS2").value	=VIATICOS.toFixed(2);
	document.getElementById("DIF_VIA_GSC").value=DIF_VIA_GSC.toFixed(2);
	document.getElementById("T_G_F").value		=T_G_F.toFixed(2);
	document.getElementById("NETO_CARRO").value	=NETO_CARRO.toFixed(2);
	document.getElementById("RENDIMIENTO").value=RENDIMIENTO.toFixed(2);
	document.getElementById("ISR").value		=ISR.toFixed(2);
	document.getElementById("DIF_TV").value		=DIF_TV.toFixed(2);
	document.getElementById("DIF_TV2").value	=DIF_TV.toFixed(2);
	document.getElementById("Total_Total").value=TOTALTOTAL.toFixed(2);
	
	/*
	//Calculadora
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
	$TOTALAB	= $total11=$_POST[Totalab];
	$Flete_R=$_POST[flete_r];

	%$iva=(($total3+$comi)/1.15)*0.15;
	%$iva			=libre_v1::forma_num($iva,2);
	>$G_T			=libre_v1::forma_num($CASETAS+$FACTURAS+$RYR+$GUIAS+$MANIOBRAS,2);//casetas+facturas+ryr+guias+maniobras
	>$CHOFER		=libre_v1::forma_num($FLETES*0.15,2);				
	<if($_POST[comi]<>'')$CHOFER=libre_v1::forma_num($total1*($_POST[comi]/100),2);
	>$T_G			=libre_v1::forma_num($CHOFER+$G_T,2);
	>$COMICIONES		=libre_v1::forma_num($Flete_R*0.0928,2);
	>$DIF_VIA_GSC	=libre_v1::forma_num($VIATICOS-$G_T,2);
	>$T_G_F			=libre_v1::forma_num($T_G+$DIESEL+$COMICIONES,2);
	>$NETO_CARRO		=libre_v1::forma_num($Flete_R-$T_G_F,2);
	$RENDIMIENTO	=libre_v1::forma_num($NETO_CARRO/($Flete_R*0.01),2);
	$ISR			=libre_v1::forma_num((($CHOFER*7.5)/100),2);
	$DIF_TV			=libre_v1::forma_num($VIATICOS+$ISR-$T_G,2);
	$TOTALTOTAL		=libre_v1::forma_num($TOTALAC+$TOTALAB+$DIF_TV,2);
	*/
}
function desca_arrasta		(elemento){
	var ajax=crearAjax();
	if(ajax){
		ajax.onreadystatechange = function(){
			var div=document.getElementById("Arrastrar");
			div.className="divArrastrar";
			var divres=document.getElementById("resArrastrar");
			if(((ajax.readyState==3)||(ajax.readyState==4))&& (ajax.status == 200)){
				var respuesta = document.createTextNode(ajax.responseText);
				divres.innerHTML = this.responseText;
			}else{
				divres.innerHTML="Cargando ...";
			}
		}
		ajax.open("POST","/admin2/windows.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		ajax.send("win_carga=arrastrar&js=1&chofer="+elemento.value);
	}
}
function add_arrastra		(elemento){
	var ajax=crearAjax();
	if(ajax){
		ajax.onreadystatechange = function(){
			var div=document.getElementById("Arrastrar");
			div.className="divArrastrar";
			var divres=document.getElementById("flete_r");
			if(((ajax.readyState==3)||(ajax.readyState==4))&& (ajax.status == 200)){
				var respuesta = document.createTextNode(ajax.responseText);
				divres.value = this.responseText;
			}else{
				divres.value="Cargando ...";
			}
		}
		ajax.open("POST","/admin2/windows.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		ajax.send("win_carga=add_arras&js=1&Carta_arr="+elemento.value);
	}

}
function inser_arrastra		(new_valor){
	
	for(y=1; y<=5; y++){
		name1="ac"+y;
		canti=0;
		input=document.getElementById(name1);
		if(input.value==''){}else{canti=parseFloat(input.value);}
		if(input.value==''){}else{total=total+canti;}
	}	
	
}
function reportes			(){
	var peticion=true;
	var c=document.getElementById("chofer");
	var p=document.getElementById("placas");
	var cl=document.getElementById("cliente");
	var d=document.getElementById("D");
	var m=document.getElementById("M");
	var a=document.getElementById("A");
	var d_r=document.getElementById("D_r");
	var m_r=document.getElementById("M_r");
	var a_r=document.getElementById("A_r");
	var C=c.value;
	var P=p.value;
	var CL=cl.value;
	var D=d.value;
	var M=m.value;
	var A=a.value;
	var D_r=d_r.value;
	var M_r=m_r.value;
	var A_r=a_r.value;
	if ((D>=1)&&(D<=31))			{d.className="Medio";}else{peticion=false;d.className="error";}
	if ((M>=1)&&(M<=12))			{m.className="Medio";}else{peticion=false;m.className="error";}
	if ((A>=2015)&&(A<=2030))		{a.className="Medio";}else{peticion=false;a.className="error";}
	if ((D_r>=1)&&(D_r<=31))		{d_r.className="Medio";}else{peticion=false;d_r.className="error";}
	if ((M_r>=1)&&(M_r<=12))		{m_r.className="Medio";}else{peticion=false;m_r.className="error";}
	if ((A_r>=2015)&&(A_r<=2030))	{a_r.className="Medio";}else{peticion=false;a_r.className="error";}
	
	var ajax=crearAjax();
	if((ajax)&&(peticion==true)){
		ajax.onreadystatechange = function(){
			var divres=document.getElementById("reportes");
			if(((ajax.readyState==3)||(ajax.readyState==4))&& (ajax.status == 200)){
			var respuesta = document.createTextNode(ajax.responseText);
				divres.innerHTML = this.responseText;
			}else{
				divres.innerHTML="Cargando ...";
			}
		}
		ajax.open("POST","/admin2/windows.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		ajax.send("win_carga=reportes&js=1&C="+C+"&P="+P+"&CL="+CL+"&D="+D+"&M="+M+"&A="+A+"&D_r="+D_r+"&M_r="+M_r+"&A_r="+A_r,true);
	}
}
function menu_left			(elemento){
	var ajax=crearAjax();
	var actuador=false;
	if (elemento.name=="choferes"){actuador=true;}
	if (elemento.name=="cuentas"){actuador=true;}
	
	if((ajax)&&(actuador)){
		ajax.onreadystatechange = function(){
			var divres=document.getElementById("style_co_left");
			if(((ajax.readyState==3)||(ajax.readyState==4))&& (ajax.status == 200)){
			var respuesta = document.createTextNode(ajax.responseText);
				divres.innerHTML = this.responseText;
			}else{
				divres.innerHTML="Cargando ...";
			}
		}
		ajax.open("POST","/admin2/windows.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		if(elemento.name=="choferes")		ajax.send("win_carga=menu_left&js=1&operador=choferes",true);
		if(elemento.name=="cuentas")	ajax.send("win_carga=menu_left&js=1&operador=cuentas&chofer="+elemento.value,true);
	}
}

// y 
/*
//Si el navegador del cliente es Mozilla la variable siguiente valdrá true
var moz = document.getElementById && !document.all;
//Flag que indica si estamos o no en proceso de arrastrar el ratón
var estoyArrastrando = false;
//Variable para almacenar un puntero al objeto que estamos moviendo
var dobj;
function presionarBoton(e) {
  //Obtenemos el elemento sobre el que se ha presionado el botón del ratón
  var fobj = moz ? e.target : event.srcElement;

  // Buscamos el primer elemento en la que esté contenido aquel sobre el que se ha pulsado
  // que pertenezca a la clase objMovible. Esto es necesario por si hemos pinchando sobre
  // un elemento contenido dentro de otro pero este último es el que pertenece a la clase
  // objmovible
  while (fobj.tagName.toLowerCase() != "html" && fobj.className != "objMovible") {
    fobj = moz ? fobj.parentNode : fobj.parentElement;
  }

  // Si hemos obtenido un objeto movible...			
  if (fobj.className == "objMovible") {
    // Activamos el flag para indicar que se empieza a arrastrar
    estoyArrastrando = true;
    // Guardamos un puntero al objeto que se está moviendo en la variable global
    dobj = fobj;
    // Devolvemos false para no realizar ninguna acción posterior
    return false;
  }
}
//Asociamos la función al evento onmousedown
document.onmousedown = presionarBoton;
*/