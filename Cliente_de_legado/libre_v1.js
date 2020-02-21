//console.log(focus_a);
var indexado="";
function mueve_diba			(e,input){
	var divres=document.getElementById("Calculos"); 
	//tecla = (document.all) ? e.keyCode : e.which;
	var event = window.event ? window.event : e;
	console.log(event);
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
	//if((event.keyCode==40)||(tecla==13)){
	if(event.keyCode==40){
		focus_a=parseFloat(focus_in)+10;
		document.getElementById(focus_a).focus(); 
	}
	if(event.keyCode==13){
		focus_a=parseFloat(focus_in)+10;
		document.getElementById(focus_a).focus(); 
	}

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
			canti=parseFloat(input.value);
			if(canti>=0)total=total+canti;
		}
		total_conte.value=total.toFixed(2);
		total=0;
	}
	for(y=1; y<=5; y++){name1="ac"+y;
		canti=0;
		input=document.getElementById(name1);
		if(input.value==''){}else{canti=parseFloat(input.value);}
		if(input.value==''){}else{total=total+canti;}
	}	
	document.getElementById("Totalac").value=total.toFixed(2);
	total=0;
	for(y=1; y<=5; y++){name1="ab"+y;			
		canti=0;
		input=document.getElementById(name1);
		if(input.value==''){}else{canti=parseFloat(input.value);}
		if(input.value==''){}else{total=total+canti;}
	}	
	document.getElementById("Totalab").value=total.toFixed(2);
	calculadora();
}
function windows			(div){
	var name=div.id;
	var actname="act"+name;
	var divname="div"+name;
	var input=document.getElementById(actname); 
	if (input.value=="x"){input.value="-";div.className="min";}else
	if (input.value=="-"){input.value="x";div.className="div"+name;}
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
	var KM_I		=parseFloat(document.getElementById("km_i").value);
	var KM_F		=parseFloat(document.getElementById("km_f").value);
	var PRECIO_D	=parseFloat(document.getElementById("presio_d").value);
	var G_T			=CASETAS+FACTURAS+RYR+GUIAS+MANIOBRAS;	
	if(COMI==''){var CHOFER		=FLETES*0.15;}else{ var CHOFER		=FLETES*(COMI/100);}
	var T_G			=CHOFER+G_T;
	var COMICIONES	=Flete_R*0.0928;
	var DIF_VIA_GSC	=VIATICOS-G_T;
	var T_G_F		=T_G+DIESEL+COMICIONES+VIA_PASS;
	var NETO_CARRO	=Flete_R-T_G_F;
	var RENDIMIENTO	=NETO_CARRO/(Flete_R*0.01);
	var ISR			=((CHOFER*7.5)/100);
	var DIF_TV		=VIATICOS+ISR-T_G;
	var TOTALTOTAL	=ARRASTRADO+ABONOS+DIF_TV;
	var Total_km	=KM_F-KM_I;
	var T_L			=(DIESEL/PRECIO_D)
	var KM_L		=(Total_km/T_L);
	
	document.getElementById("G_T").value		=G_T.toFixed(2);
	document.getElementById("G_T2").value		=G_T.toFixed(2);
	document.getElementById("CHOFER").value		=CHOFER.toFixed(2);
	//document.getElementById("T_G").value		=T_G.toFixed(2);
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
	document.getElementById("Total_km").value	=Total_km.toFixed(2);
	document.getElementById("t_l").value		=T_L.toFixed(2);
	document.getElementById("km_l").value		=KM_L.toFixed(2);
	
	
}
function desca_arrasta		(elemento){
	var ajax=crearAjax();
	if(ajax){
		ajax.onreadystatechange = function(){
			//var div=document.getElementById("divArrastrar");
			var divres=document.getElementById("divArrastrar");
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
	var name="ID_ac";
	var res;
	var x;
	for(x=1; x<=5; x++){
		res=document.getElementById(name+x);
		if(res.value==""){
			res.value=elemento.value;
			actua_arrastra(elemento,res.id); 
			break;
		}
		if(res.value==elemento.value){break;}
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
	if (elemento.name=="choferes")	{actuador=true;}
	if (elemento.name=="cuentas")	{actuador=true;}
	
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
function actua_arrastra		(elemento,name){
	var y=name[5];
	var name2="ac"+y;
	var ajax=crearAjax();
	if((ajax)&&(elemento.value)){
		ajax.onreadystatechange = function(){
			var divres=document.getElementById(name2);
			//console.log(divres);
			if((ajax.readyState==4)&& (ajax.status == 200)){
				var respuesta = document.createTextNode(ajax.responseText);
				divres.value=this.responseText;
				calcula_update();
			}else{
				
				divres.value="Cargando...";	
			}
			
		}
		ajax.open("POST","/admin2/windows.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		ajax.send("win_carga=des_arras&js=1&ID_G="+elemento.value);
	}
	
}
function descarga_cuenta	(elemento){
	var ajax=crearAjax();
	if((ajax)&&(elemento.value)){
		ajax.onreadystatechange = function(){
			var divres=document.getElementById("style_co_centro");
			if((ajax.readyState==4)&& (ajax.status == 200)){
				var respuesta = document.createTextNode(ajax.responseText);
				divres.innerHTML=this.responseText;
				//if(ajax.sta){}
			}else{
				
				divres.innerHTML="Cargando...";	
			}			
		}
		ajax.open("POST","/admin2/windows.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		ajax.send("win_carga=Nuevo&js=1&ID_G="+elemento.value);
	}
}
function menu				(){
	var sub=document.getElementById("submenu");
	if(sub.className=='submenu')		{sub.className="submenuhidden";}else
	if(sub.className=='submenuhidden'){sub.className="submenu";}
}
function cambia				(elemento)  {
	if(elemento.name=='Cliente_de_legado')			{setTimeout("location.href='Cliente_de_legado0'", 80);}
	if(elemento.name=='Cliente_de_legado/admin')	{setTimeout("location.href='Cliente_de_legado/admin'", 80);}
	if(elemento.name=='admin')						{setTimeout("location.href='admin'", 80);}
	if(elemento.name=='admin2')						{setTimeout("location.href='admin2'", 80);}
	if(elemento.name=='mysql')						{setTimeout("location.href='mysql'", 80);}
}
function revi				(){
	var cam=document.getElementById("Revisado");Revisado
	var rev=document.getElementById("CambRevi");
	if(rev.value=='Pendiente')	{rev.value="Revisado"; }else
	if(rev.value=='Revisado')	{rev.value="Pendiente";}
	if(cam.value=='1')	{cam.value="0";}else
	if((cam.value=='0')||(cam.value==""))	{cam.value="1";}
}
function guarda				(){
	
}
function folder				(){
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
			var divres=document.getElementById("folder");
			if(((ajax.readyState==3)||(ajax.readyState==4))&& (ajax.status == 200)){
			var respuesta = document.createTextNode(ajax.responseText);
				divres.innerHTML = this.responseText;
			}else{
				divres.innerHTML="Cargando ...";
			}
		}
		ajax.open("POST","/admin2/windows.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		ajax.send("win_carga=folder&js=1&C="+C+"&P="+P+"&CL="+CL+"&D="+D+"&M="+M+"&A="+A+"&D_r="+D_r+"&M_r="+M_r+"&A_r="+A_r,true);
	}
}
function grafico			(){
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
		ajax.send("win_carga=graficos&js=1&C="+C+"&P="+P+"&CL="+CL+"&D="+D+"&M="+M+"&A="+A+"&D_r="+D_r+"&M_r="+M_r+"&A_r="+A_r,true);
	}
}
function anti_enter			(e) {
  tecla = (document.all) ? e.keyCode :e.which;
  return (tecla!=13);
} 
