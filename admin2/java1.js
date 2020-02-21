
window.onload = function(){
var div_menu3=document.getElementById("menu3");
var login=document.getElementById("login");
	login.style.display='none';
}
function crearAjax(){
   var objetoAjax=false;
   if(navigator.appName=="Microsoft Internet Explorer")
     objetoAjax = new ActiveXObject("Microsoft.XMLHTTP");
   else
     objetoAjax = new XMLHttpRequest();
   return(objetoAjax);
}
function login(operacion){
	var res		=document.getElementById("sub_login");
	var proceso=true;
	operacion="login";
	if(proceso==true){		
		var conexion=crearAjax();
		if(conexion){
			conexion.onreadystatechange=function(){		
				if(((conexion.readyState==3)||(conexion.readyState==4))&& (conexion.status == 200)){//respuesta completa de la peticion
					var respuesta = document.createTextNode(conexion.responseText);
					res.innerHTML = this.responseText;	
				
				}
			}
		  conexion.open("POST","login/login.php",true);
		  conexion.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		  conexion.send("");
		}else{alert("No se a conseguido una conexion");}
	}
	
}