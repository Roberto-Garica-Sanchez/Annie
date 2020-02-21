//console.log(focus_a);
var indexado="";
function crearAjax			(){
   var objetoAjax=false;
   if(navigator.appName=="Microsoft Internet Explorer")
     objetoAjax = new ActiveXObject("Microsoft.XMLHTTP");
   else
     objetoAjax = new XMLHttpRequest();
   return(objetoAjax);
}
function menu				(){
	var sub=document.getElementById("submenu");
	if(sub.className=='submenu')		{sub.className="submenuhidden";}else
	if(sub.className=='submenuhidden')	{sub.className="submenu";}
}
function automenu			(elemento){
	res=true;
	if(document.getElementById("noselet")){//elementos normales
		deselect	=document.getElementById("noselect");
	}
	else{
		console.log("automenu no encontro a noselect");
		res=false
	}
	if(document.getElementById("selet")){//mentos selecionados 
		select	=document.getElementById("selet");
	}
	else{
		console.log("automenu no encontro a select");
		res=false
	}
	if(res==true){
		select.id="noselet";
		elemento.id="selet";
		
	}
}
function menureporte(elemento){
	if(elemento.value=="General"){
		if(document.getElementById("general"))general.style.display="block";
		if(document.getElementById("list"))	list.style.display="none";
	}
	if(elemento.value=="Listado"){
		if(document.getElementById("general"))general.style.display="none";
		if(document.getElementById("list"))list.style.display="block";
	}	
}
function menuajuste(elemento){
	if(elemento.value=="Estudiantes"){
		if(document.getElementById("res_studen"))res_studen.style.display="block"; 
		if(document.getElementById("res_school"))	res_school.style.display="none";
	}
	if(elemento.value=="Escuelas"){
		if(document.getElementById("res_studen"))res_studen.style.display="none";
		if(document.getElementById("res_school"))res_school.style.display="block";
	}
}

function cambia_co_centro	(button){
	var ajax=crearAjax();
	var carga=button.value;
	if(document.getElementById( "id_I"))
	{id_I.id="idI";}
	button.id="id_I";
	
	if(ajax){
		ajax.onreadystatechange = function(){
		  var divres=document.getElementById("style_co_centro");
		  if(((ajax.readyState==3)||(ajax.readyState==4))&& (ajax.status == 200)){
			var respuesta = document.createTextNode(ajax.responseText);
			divres.innerHTML = this.responseText;
			
		  }else{
			divres.innerHTML="Cargando ...";
		  }
		}
		ajax.open("POST","windows.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		ajax.send("win_carga="+carga+"&js=1");
  }
}
function reg_alum(){
	send=
	"&cuenta="+cuenta.value+
	"&name="+nombre.value+
	"&firt="+firt.value+
	"&last="+last.value+
	"&mail="+mail.value+
	"&level="+level.value+
	"&school="+school.value;
	var ajax=crearAjax();
	save=verificador();
	if(save==true){	consulta('reg_alum',send,Respuesta,Respuesta,"inn","inn",windows,"online");}
}

function Maysall(elemento){
	elemento.value=elemento.value.slice(0).toUpperCase();//+ elemento.value.slice(1);
}
function MaysPrimera(string){
  return string.charAt(0).toUpperCase() + string.slice(1);
}
function ElemMaysPrim(elemento){
	elemento.value=elemento.value.charAt(0).toUpperCase()+ elemento.value.slice(1);
	
}
function valida_n(e,Callback){
    tecla = (document.all) ? e.keyCode : e.which;
	if (tecla==13){
		//console.log("enter");
		if(Callback)Callback();
	}
    if (tecla==8){
        return true;
    }
    patron =/[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}
function verificador(){
	var save=true;
	if(!nombre.value)	{// nombre faltante
		nombre.style.background="pink";
		nombre.style.color="black";
	//	Respuesta.innerHTML="Incomplete Data";		
		save=false;
	}
	if(nombre.value)	{// nombre completo 
		nombre.style.background="";
		nombre.style.color="";
		nombre.value=MaysPrimera(nombre.value);		
		//Respuesta.innerHTML="";
	}
	if(!firt.value)		{//primer apellido faltate
		firt.style.background="pink";	
		firt.style.color="black";	
	//	Respuesta.innerHTML="Incomplete Data";
		save=false;
		
	}
	if(firt.value)		{//primer apellido completo 
		firt.style.background="";
		firt.style.color="";
		firt.value=MaysPrimera(firt.value);	
	//	Respuesta.innerHTML="";
	}
	if(!last.value)		{//segundo apellido faltante
		last.style.background="pink";
		last.style.color="black";
		//Respuesta.innerHTML="Incomplete Data";
		save=false;
		
	}
	if(last.value)		{//segundo apelido completo 
		last.style.background="";
		last.style.color="";
		last.value=MaysPrimera(last.value);	
		//Respuesta.innerHTML="";
	}
	
	if(!mail.value)		{//correo faltante
		mail.style.background="pink";
		mail.style.color="black";
		//Respuesta.innerHTML="Incomplete Data";
		save=false;
		
	}
	if(mail.value)		{//correo completo 
		mail.style.background="";
		mail.style.color="";
		//Respuesta.innerHTML="";
	}
	if(level.value=="nivel")	{//level faltante
		level.style.background="pink";
		level.style.color="black";
		//Respuesta.innerHTML="Incomplete Data";
		save=false;
		
	}
	if(level.value!="nivel")		{//level completo 
		level.style.background="";
		level.style.color="";
		//Respuesta.innerHTML="";
	}
	
	
	if(!cuenta.value)	{// cuenta faltante
		cuenta.style.background="pink";
		cuenta.style.color="black";
	//	Respuesta.innerHTML="Incomplete Data";
		save=false;
		
	}
	if(cuenta.value)	{// Cuenta completa
		cuenta.style.background="";
		cuenta.style.color="";
		//Respuesta.innerHTML="";
	}
	/*if(cuenta.style.color=='red')	{//cuenta no aprobada
		save=false;
	}*/
	if(school.value=="school")		{//escuela no selecionada
		school.style.background="pink";
		//Respuesta.innerHTML="Incomplete Data";
		save=false;
		
	}
	if(school.value!="school")		{//escuela selecionada
		school.style.background="";
		//Respuesta.innerHTML="";
	}
	
	if(save==false)		{//verificasion 		
		Respuesta.innerHTML="Incomplete Data";
	}
	if(save==true)		{//verificasion correcta 
		Respuesta.innerHTML="Datos Correctos";
	}
	return save;
}
function ver_cuenta(elemento){
	var send;
	if(!elemento){
		send="&cuenta="+cuenta.value;	
	consulta('Existe_alumno',send,Respuesta,Respuesta,'inn','inn', windows,"ver_cuenta");
	}
	else
	if(elemento){
		send="&cuenta="+elemento.id;	
		consulta('Existe_alumno',send,con_studen,con_studen,'inn','inn', windows,"ver_cuenta",elemento);
		
	}
	
}

function mueveReloj(){ 
	
	var fecha	=document.getElementById("fecha");	
	var idia	=document.getElementById("idia");	
	var imes	=document.getElementById("imes");	
	var iano	=document.getElementById("iano");
	
	var reloj	=document.getElementById("reloj");	
	var ihora	=document.getElementById("ihora");	
	var imin	=document.getElementById("iminuto");	
	
	
   	var momentoActual = new Date();
   	var hora 	=('0' + momentoActual.getHours()).slice(-2);
   	var minuto 	=('0' + momentoActual.getMinutes()).slice(-2); 
   	var segundo =('0' + momentoActual.getSeconds()).slice(-2);
	
   	var dia = momentoActual.getDate(); 
   	var mes = ('0' + (momentoActual.getMonth()+1)).slice(-2); 
   	var ano = momentoActual.getFullYear(); 


   	FechaImprimible = dia + " / " + mes + " / " + ano; 
   	horaImprimible = hora + " : " + minuto + " : " + segundo; 
	
	fecha.value = FechaImprimible; 
	idia.value=dia;
	imes.value=mes;
	iano.value=ano;
	ihora.value=hora;
	imin.value=minuto;
	reloj.value = horaImprimible; 

   	setTimeout("mueveReloj()",1000); 
} 
function cambia(elemento) {
	if(!elemento){setTimeout("location.href='entradas.php'", 80);}
	if(elemento){
		setTimeout("location.href='"+elemento+"'", 80);
	}
	
}
function reportes			(){
	var peticion=true;
	send=
	"&D="+D.value+
	"&M="+M.value+
	"&A="+A.value+
	"&D_r="+D_r.value+
	"&M_r="+M_r.value+
	"&A_r="+A_r.value+
	"&selet="+selet.value
	;
	
	consulta('reportes',send,list_agen,list_agen,"inn","inn",windows);
	/*
	var c=document.getElementById("alumnos");
	var d=document.getElementById("D");
	var m=document.getElementById("M");
	var a=document.getElementById("A");
	var d_r=document.getElementById("D_r");
	var m_r=document.getElementById("M_r");
	var a_r=document.getElementById("A_r");
	var Alumnos=alumnos.value;
	//if (deta){deta=1;}else{deta=0;}
	//if (list){list=1;}else{list=0;}
	if ((D>=1)&&(D<=31))			{d.className="Medio";}else{peticion=false;d.className="error";}
	if ((M>=1)&&(M<=12))			{m.className="Medio";}else{peticion=false;m.className="error";}
	if ((A>=2015)&&(A<=2030))		{a.className="Medio";}else{peticion=false;a.className="error";}
	if ((D_r>=1)&&(D_r<=31))		{d_r.className="Medio";}else{peticion=false;d_r.className="error";}
	if ((M_r>=1)&&(M_r<=12))		{m_r.className="Medio";}else{peticion=false;m_r.className="error";}
	if ((A_r>=2015)&&(A_r<=2030))	{a_r.className="Medio";}else{peticion=false;a_r.className="error";}

	var ajax=crearAjax();
	if((ajax)&&(peticion==true)){
		ajax.onreadystatechange = function(){
			var divres=document.getElementById("list_agen");
			if(((ajax.readyState==3)||(ajax.readyState==4))&& (ajax.status == 200)){
			var respuesta = document.createTextNode(ajax.responseText);
				divres.innerHTML = this.responseText;
			}else{
				divres.innerHTML="Cargando ...";
			}
		}
		ajax.open("POST","windows.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		//ajax.send("win_carga=reportes&js=1&C="+C+"&P="+P+"&CL="+CL+"&D="+D+"&M="+M+"&A="+A+"&D_r="+D_r+"&M_r="+M_r+"&A_r="+A_r+"&Deta="+deta+"&List="+list,true);
		ajax.send("win_carga=reportes&js=1&alumnos="+Alumnos+"&D="+D+"&M="+M+"&A="+A+"&D_r="+D_r+"&M_r="+M_r+"&A_r="+A_r,true);
	}*/
}
function login(){
	var send;
		send=
			"&usuario="+usuario.value
			+"&pass="+pass.value
			;
	var ajax=crearAjax();
	if(ajax){
		ajax.onreadystatechange = function(){
			res_log.value="...";
		  if((ajax.readyState==4)&& (ajax.status == 200)){
			var respuesta = document.createTextNode(ajax.responseText);
			var res=this.responseText;
			if(res=="1"){res_log.value=""; conectar();		}
			if(res=="2"){res_log.value="El Usuario No Existe";	user.value ="";}
			if(res=="3"){res_log.value="Contraseña Incorrecta";	user.value ="";}
		  }
		}
		ajax.open("POST","windows.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		ajax.send("win_carga=login&js=1"+send);
  }	
	
}

function conectar(){
	var send;
		send=
			"&usuario="+usuario.value
			+"&pass="+pass.value
			;
	var ajax=crearAjax();
	if(ajax){
		ajax.onreadystatechange = function(){
		  if((ajax.readyState==4)&& (ajax.status == 200)){
			var res=this.responseText
			user	.value = this.responseText;	
			exi		.style.display='block';			
			usuario	.style.display='none';
			pass	.style.display='none';
			logi	.style.display='none';
			lateral	.style.display='block';
			submenu.className="submenuhidden";
			style_co_centro	.style.display='block';
		  }
		}
		ajax.open("POST","windows.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		ajax.send("win_carga=conectar&js=1"+send);
  }	
	
}
function desconectar(){
			user	.value = "";	
			usuario	.value='';
			pass	.value='';
			exi		.style.display='none';			
			usuario	.style.display='block';
			pass	.style.display='block';
			logi	.style.display='block';
			lateral	.style.display='none';
			style_co_centro	.style.display='none';
}
function reg_agen(){
	var send;
	if(cuenta.value!="cuenta")	{
		send=
			"&cuenta="+cuenta.value
			+"&reloj="+reloj.value
			+"&fecha="+fecha.value
			+"&dia="+idia.value
			+"&mes="+imes.value
			+"&ano="+iano.value
			+"&hora="+ihora.value
			+"&minuto="+iminuto.value
			;
	}
	entra_ckeck.disabled=true;
	entra_ckeck.style.background="#989898";
	entra_ckeck.style.color="black";
	cuenta.value='';
	consulta('reg_agen',send,con_entrada,con_entrada,"inn","inn",windows);
}
function reg_getout(elemento){
	var send;
	send=
		"&cuenta="+cuenta.value
		//+"&entrada_hora="+elemento.id
		+"&reloj="+reloj.value
		+"&fecha="+fecha.value
		+"&dia="+idia.value
		+"&mes="+imes.value
		+"&ano="+iano.value
		+"&hora="+ihora.value
		+"&minuto="+iminuto.value
		;
	salida_ckeck.disabled=true;
	salida_ckeck.style.background="#989898";
	salida_ckeck.style.color="black";
	var res=consulta('reg_getout',send,con_salida,con_salida,'inn','inn', windows,"salida");
}

function consulta(destino,send,conso,res,tipo_conso,tipo_res,Callback,opcion,elemento,carga){	//sistema para cominicar con cualquier terminal 
	if(tipo_conso)
	if(!conso)		{console.log("Sin Consola");return;}
	if(tipo_conso=="inn"){
		if(!destino)	{conso.innerHTML="Sin Destino";		return;}
		if(!send)		{conso.innerHTML="Sin Send";		return;}
		if(!res)		{conso.innerHTML="Sin Destino";		return;}
	}
	if(tipo_conso=="value"){
		if(!destino)	{conso.value="Sin Destino";		return;}
		if(!send)		{conso.value="Sin Send";		return;}
		if(!res)		{conso.value="Sin Destino";		return;}
	}
	
	var ajax=crearAjax();
	if(ajax){
		ajax.onreadystatechange = function(){
		  if((ajax.readyState==3)&& (ajax.status == 200)){
			  if(tipo_conso=="inn"){
				  conso.innerHTML="<img src='../img/carga.gif'>";
				  
			  }
		  }
		  if((ajax.readyState==4)&& (ajax.status == 200)){
			var respuesta = document.createTextNode(ajax.responseText);
			var contesta=this.responseText;
			if(tipo_conso=="inn"){
				if((contesta!="0")&&(contesta!="1")){res.innerHTML=contesta; }
				if(Callback)Callback(destino,contesta,opcion,conso,res,elemento,carga);
			}	
			if(tipo_conso=="value"){
				if((contesta!="0")&&(contesta!="1")){res.value=contesta;}
				if(Callback)Callback(destino,contesta,opcion,conso,res,elemento,carga);
			}
		  }
		}
		ajax.open("POST","windows.php",true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		ajax.send("win_carga="+destino+"&js=1"+send);
  }	
	
}
function entrada(){
	if(!cuenta.value){cuenta.style.boxShadow="0px 0px 1px 4px red";}
	if(cuenta.value){
		cuenta.style.boxShadow="";
		var  send=
			"&cuenta="+cuenta.value
			//+"&pass="+pass.value
			;
		var res=consulta('Existe_alumno',send,con_entrada,res_entrada,'inn','inn', windows,"entradas");
	}	
}
function salida(){
	if(!cuenta.value){cuenta.style.boxShadow="0px 0px 1px 4px red";}
	if(cuenta.value){
		cuenta.style.boxShadow="";
		var  send=
			"&cuenta="+cuenta.value
			//+"&pass="+pass.value
			;
		var res=consulta('Existe_alumno',send,con_salida,res_salida,'inn','inn', windows,'salida');
	
	}
	
}

function windows(carga,respuesta,opcion,consola,res,elemento,carga_aux){
	//if(carga_aux!="")carga=carga_aux;
	if(carga=="Existe_alumno"){
		if((opcion=="entradas")||(opcion=="salida")){
			if(respuesta=="0"){
				if(opcion=="entradas"){con_entrada.innerHTML="Student does not Exist";}
				if(opcion=="salida"){con_salida.innerHTML="Student does not Exist";}
			}
			if(respuesta=="1"){
				var  send=
					"&cuenta="+cuenta.value
					//+"&opcion="+opcion
					;
				if(opcion=="entradas"){
					consulta("des_data_alum",send,con_entrada,res_entrada,"inn","inn");
					consulta("ver_cierres",send,con_entrada,con_entrada,"inn","inn",windows,opcion);
				}
				if(opcion=="salida"){
					consulta("des_data_alum",send,con_salida,res_salida,"inn","inn");
					consulta("ver_cierres",send,con_salida,con_salida,"inn","inn",windows,opcion);
				}
			}
		}
		if(opcion=="ver_cuenta"){
			if(!elemento){
				if(respuesta=="0"){//Cuenta disponible para guardar 
					consola.innerHTML="Cuenta Valida";
					cuenta.style.background="";
					cuenta.style.color="";
					
				}
				if(respuesta=="1"){//el numero de cuenta ya existe 
					consola.innerHTML="La Cuenta ya  Existe";
					cuenta.style.background="pink";
					cuenta.style.color="black";
					
				}
			}
			if(elemento){
				if(respuesta=="0"){//Cuenta disponible para guardar 
					consola.innerHTML="Cuenta Valida";
					elemento.style.background="";
					elemento.style.color="";
					elemento.style.boxShadow="";
				}
				if(respuesta=="1"){//el numero de cuenta ya existe 
					consola.innerHTML="La Cuenta ya  Existe";
					elemento.style.boxShadow="inset red 0px 0px 5px 3px";
					
				}
			}
		}
		if(opcion=="account_studen"){			//manda peticion para gurdar los daros 
			if(respuesta=="0"){//Cuenta disponible para guardar 
				consola.innerHTML="Cuenta Valida";
				if(elemento)elemento.style.background="";
				if(elemento)elemento.style.color="";
				if(elemento)elemento.style.boxShadow="";
				send=
				"&cuenta="+account_studen.value+
				"&name="+name_studen.value+
				"&firt="+firt_studen.value+
				"&last="+last_studen.value+
				"&mail="+mail_studen.value+
				"&level="+level_studen.value+
				"&school="+school_studen.value;
				consulta("reg_alum",send,con_studen,con_studen,'inn','inn',windows,'account_studen');
				
			}
			if(respuesta=="1"){//el numero de cuenta ya existe 
				consola.innerHTML="La Cuenta ya  Existe";
				if(elemento)elemento.style.boxShadow="inset red 0px 0px 5px 3px";
				
				
			}
		}
		
	}
	if(carga=="ver_cierres"){
		if(opcion=="entradas"){
			if(respuesta=="0"){
				con_entrada.innerHTML="Este Alumno Tiene Entrada(s) Pendiente De terminar";
				entra_ckeck.disabled=true;
				entra_ckeck.style.background="#989898";
				entra_ckeck.style.color="black";
			}
			if(respuesta=="1"){
				entra_ckeck.disabled=false;
				entra_ckeck.style.background="#025d96";
				entra_ckeck.style.color="white";
				con_entrada.innerHTML="Disponible";
			}
		}
		if(opcion=="salida"){
			if(respuesta=="0"){
				con_salida.innerHTML="Disponible";
				salida_ckeck.disabled=false;
				salida_ckeck.style.background="#025d96";
				salida_ckeck.style.color="white";
			}
			if(respuesta=="1"){
				con_salida.innerHTML="Este Alumno No Tiene Entrada Registrada";
				salida_ckeck.disabled=true;
				salida_ckeck.style.background="#989898";
				salida_ckeck.style.color="black";
			}
				
		}
	}
	if(carga=="reg_agen"){
			if(respuesta=="0"){
				con_entrada.innerHTML="Error De Gravado";				
				entra_ckeck.disabled=false;
				entra_ckeck.style.background="#025d96";
				entra_ckeck.style.color="white";
			}
			if(respuesta=="1"){
				con_entrada.innerHTML="Entrada Registrada";
				cuenta.value="";
				res_entrada.innerHTML="";
				entra_ckeck.disabled=true;
				entra_ckeck.style.background="#989898";
				entra_ckeck.style.color="black";
			}
	}
	if(carga=="reg_getout"){
			if(respuesta=="0"){
				con_salida.innerHTML="Error De Gravado";				
				salida_ckeck.disabled=false;
				salida_ckeck.style.background="#025d96";
				salida_ckeck.style.color="white";
			}
			if(respuesta=="1"){
				con_salida.innerHTML="Salida Registrada";
				cuenta.value="";
				res_salida.innerHTML="";
				salida_ckeck.disabled=true;
				salida_ckeck.style.background="#989898";
				salida_ckeck.style.color="black";
			}
	}
	if(carga=="reg_alum"){				//resive la respuesta de guardar alumnos
		if(opcion=="online"){
			if(respuesta=="0"){
				consola.innerHTML="Error Al Guardar";
			}	
			if(respuesta=="1"){			
				cuenta.value="";
				nombre.value="";
				firt.value="";
				last.value="";
				mail.value="";
				level.value="";
				school.value="school";				
				consola.innerHTML="Estudiante Registrado";	
				
			}
		}	
		if(opcion=="account_studen"){
			if(respuesta=="0"){
				consola.innerHTML="Error Al Guardar";
			}	
			if(respuesta=="1"){						
				name_studen.value="";
				firt_studen.value="";
				last_studen.value="";
				account_studen.value="";
				mail_studen.value="";
				level_studen.value="";
				school_studen.value="school"
				consola.innerHTML="Estudiante Registradot";	
				
			}
			
		}
	}
	if(carga=="reportes"){
	}
	if(carga=="elimina_school")	{
		if(respuesta=="1"){
			consola.innerHTML="Delete School";
			tag_school.value='';
			tag_school.style.background="";
			tag_school.disabled=false;
			name_school.value='';
			confirma_school.style.display="none";
			actua_school();
		}
	}
	//if(carga=="descarga_school")	{}
	if(carga=="modifi_school")	{
	}
	if(carga=="ver_tag")		{
		if(opcion=='save_school'){
			res=true;
			if(respuesta==0){
				consola.innerHTML="The Tag Exist";
				tag_school.style.boxShadow="0px 0px 5px 3px red";
				res=false;
			}
			if(respuesta==1){
				consola.innerHTML="OK Tag";
				
			}
			if(res==true){
				
				send="&tag="+tag_school.value+"&name="+name_school.value;
				consulta("save_school",send,con_school,con_school,'inn','inn',windows,'EXE');
			}
		}
	}
	if(carga=="save_school")	{
		
			if(opcion=='EXE'){
				if(respuesta=="0"){
					consola.innerHTML="Error";
				}
				if(respuesta=="1"){
					tag_school.value="";
					name_school.value="";
					consola.innerHTML="Data Save";
					actua_studen();
				}
			}
	}
	if(carga=="cambios_school")	{
		if(respuesta==0){}
		if(respuesta==1){
			
			consola.innerHTML="Update Ending";
			actua_school();
		}
	}
	if(carga=="cambios_studen")	{
		if(respuesta==0){
			consola.innerHTML="Error de guardado";			
		}
		if(respuesta==1){
			consola.innerHTML="Cambios Guardados";
			actua_studen();
		}
	}
	if(carga=="elimina_studen")	{
		
		if(respuesta=="1"){
			consola.innerHTML="Registro Eliminado";	
			name_studen.value="";
			name_studen.style.boxShadow="";
			firt_studen.value="";
			firt_studen.style.boxShadow="";
			last_studen.value="";
			last_studen.style.boxShadow="";
			account_studen.value="";
			account_studen.style.boxShadow="";
			mail_studen.value="";
			mail_studen.style.boxShadow="";
			level_studen.value="";
			level_studen.style.boxShadow="";
			school_studen.value="school"
			school_studen.style.boxShadow=""
			cambios_studen.style.display="none";
			save_studen.style.display="block";
			account_studen.style.background="";
			account_studen.style.color="";
			account_studen.disabled=false;
			confirma_studen.style.display="none";
			actua_studen();
		}
	}
}
function actua_school(){
	send=" ";
	consulta("actua_school",send,list_school,list_school,'inn','inn');
}
function actua_studen(){
	send=" ";
	consulta("actua_studen",send,list_studen,list_studen,'inn','inn');
}
function ver_tag(){
	send="&tag="+tag_school.value;
	consulta("ver_tag",send,con_school,con_school,'inn','inn',windows);
	
}
function operadores(elemento){
	if(elemento.id=="save_school")		{
		var res=true;
		if(name_school.value==""){
				name_school.style.boxShadow="0px 0px 5px 3px red";
				res=false;
		}else{	name_school.style.boxShadow="";}
		actua=verifica(tag_school,"value","school","box");if(actua==false){res=false;}
		if(res==true){
			send="&tag="+tag_school.value;
			consulta("ver_tag",send,con_school,con_school,'inn','inn',windows,'save_school');
		}
		
	}
	if(elemento.id=="clear_school")		{
		tag_school.value='';
		tag_school.style.background="";
		tag_school.disabled=false;
		name_school.value='';
		confirma_school.style.display="none";
		cambios_school.style.display="none";
		save_school.style.display="block";
		con_school.innerHTML="";
	}
	if(elemento.id=="cambios_school")	{
		var res=true;
		if(name_school.value==""){
				name_school.style.boxShadow="0px 0px 5px 3px red";
				res=false;
		}else{	name_school.style.boxShadow="";}
		if(tag_school.value==""){
				tag_school.style.boxShadow="0px 0px 5px 3px red";
				res=false;
		}else{	tag_school.style.boxShadow="";}
		if(res==true){
			send="&tag="+tag_school.value+"&name="+name_school.value;
			consulta("cambios_school",send,con_school,con_school,'inn','inn',windows,'cambios_school');
		}
		
	}
	if(elemento.id=="modifi_school")	{
		save_school.style.display="none";
		confirma_school.style.display="none";
		cambios_school.style.display="block";
		send="&tag="+elemento.name;
		consulta("descarga_school",send,datos_school,datos_school,'inn','inn',windows);
		
	}
	if(elemento.id=="delect_school")	{
		send="&tag="+elemento.name;
		consulta("descarga_school",send,datos_school,datos_school,'inn','inn',windows,"descarga_school");
		confirma_school.style.display="block";
		//consulta("elimina_school",send,datos_school,datos_school,'inn','inn',windows,"delect_school");
	}
	if(elemento.id=="confirma_school")	{
		send="&tag="+tag_school.value;
		consulta("elimina_school",send,con_school,con_school,'inn','inn',windows,'elimina_school');
	}
	
	if(elemento.id=="save_studen")		{
		var actua=true
		res=verifica(name_studen,"value","","box");if(res==false){actua=false;}
		//res=verifica(firt_studen,"value","","box");if(res==false){actua=false;}
		res=verifica(last_studen,"value","","box");if(res==false){actua=false;}
		res=verifica(mail_studen,"value","","box");if(res==false){actua=false;}
		res=verifica(level_studen,"value","","box");if(res==false){actua=false;}
		res=verifica(account_studen,"value","","box");if(res==false){actua=false;}
		res=verifica(school_studen,"value","school","box");if(res==false){actua=false;}
		//console.log(actua);
		send=
		"&cuenta="+account_studen.value
		;		
		consulta('Existe_alumno',send,con_studen,con_studen,'inn','inn', windows,"account_studen",account_studen);
	}
	if(elemento.id=="clear_studen")		{				
				name_studen.value="";
				name_studen.style.boxShadow="";
				firt_studen.value="";
				firt_studen.style.boxShadow="";
				last_studen.value="";
				last_studen.style.boxShadow="";
				account_studen.value="";
				account_studen.style.boxShadow="";
				mail_studen.value="";
				mail_studen.style.boxShadow="";
				level_studen.value="nivel";
				level_studen.style.boxShadow="";
				school_studen.value="school"
				school_studen.style.boxShadow=""
				cambios_studen.style.display="none";
				save_studen.style.display="block";
				account_studen.style.background="";
				account_studen.style.color="";
				account_studen.disabled=false;
				confirma_studen.style.display="none";
				con_studen.innerHTML="";
	}
	if(elemento.id=="cambios_studen")	{
		
		var actua=true
		res=verifica(name_studen,"value","","box");if(res==false){actua=false;}
		res=verifica(firt_studen,"value","","box");if(res==false){actua=false;}
		res=verifica(last_studen,"value","","box");if(res==false){actua=false;}
		res=verifica(mail_studen,"value","","box");if(res==false){actua=false;}
		res=verifica(level_studen,"value","","box");if(res==false){actua=false;}
		res=verifica(account_studen,"value","","box");if(res==false){actua=false;}
		res=verifica(school_studen,"value","school","box");if(res==false){actua=false;}
		if(actua==true){
			send=
			"&cuenta="+account_studen.value+
			"&name="+name_studen.value+
			"&firt="+firt_studen.value+
			"&last="+last_studen.value+
			"&correo="+mail_studen.value+
			"&level="+level_studen.value+
			"&school="+school_studen.value;
			consulta("cambios_studen",send,con_studen,con_studen,'inn','inn',windows,);
		}
	}
	if(elemento.id=="modifi_studen")	{//descarga los datos del estudiante
		save_studen.style.display="none";
		confirma_studen.style.display="none";
		cambios_studen.style.display="block";
		con_studen.innerHTML="";
		send="&cuenta="+elemento.name;
		consulta("descarga_studen",send,datos_studen,datos_studen,'inn','inn',windows);
		}
	if(elemento.id=="delect_studen")	{
		confirma_studen.style.display="block";
		send="&cuenta="+elemento.name;
		consulta("descarga_studen",send,datos_studen,datos_studen,'inn','inn',windows);		
		
	}
	if(elemento.id=="confirma_studen")	{
		send="&cuenta="+account_studen.value;
		consulta("elimina_studen",send,con_studen,con_studen,'inn','inn',windows,'elimina_studen');
	}
}
function verifica(elemento,tipo,difeteneA,actua){
	var res=true;
	if(tipo=="value"){
		if(elemento.value==difeteneA){res=false;}
		if(res==true){
			if(actua=="back"){elemento.style.background="";elemento.style.color="";}
			if(actua=="box"){elemento.style.boxShadow="";}
		}
		if(res==false){
			if(actua=="back"){elemento.style.background="pink";elemento.style.color="black";}
			if(actua=="box"){elemento.style.boxShadow="inset red 0px 0px 5px 3px";}
		}
	
	}
	return res;
	
}

function bloqueador(){
	largo=document.getElementsByTagName('div').length
	elemento=document.getElementsByTagName('div')[largo-1];
	elemento=document.getElementsByTagName('div')[largo-1].style.display="none";
}
