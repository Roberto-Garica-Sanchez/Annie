
function crearAjax(){
   var objetoAjax=false;
   if(navigator.appName=="Microsoft Internet Explorer")
     objetoAjax = new ActiveXObject("Microsoft.XMLHTTP");
   else
     objetoAjax = new XMLHttpRequest();
   return(objetoAjax);
}
function llamadaAjax(metodo,nombre){
  var ajax=crearAjax();
  if(ajax){
    ajax.onreadystatechange = function(){
	  var divres=document.getElementById("resultado");
	  fecha1=A_i_des.value+M_i_des.value+D_i_des.value;
	  fecha2=A_f_des.value+M_f_des.value+D_f_des.value;
      if(((ajax.readyState==3)||(ajax.readyState==4))&& (ajax.status == 200)){
        var respuesta = document.createTextNode(ajax.responseText);
        divres.innerHTML = this.responseText;
        //div.appendChild(respuesta);
      }else{
		divres.innerHTML="<img src='espera2.gif' style='position: absolute; width: 25px; left: 330px; '></img >";
	  }
    }
    if(metodo == "post"){
      ajax.open("POST","/admin/Cuentas/consu_cuen.php",true);
      ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
      ajax.send("nombre="+nombre+"& grado=5 &fec_ini="+fecha1+"&fec_fin="+fecha2);
    }
  }
}
function consulta(){
	//var chofer=	document.getElementById('chofer');
	llamadaAjax("post",chofer.value);
}
function cambioChofer(chofer_new){
	//var nombre =document.getElementById('setchofer');
	var chofer=	document.getElementById('chofer');
	var ch_vi=	document.getElementById('ch_vi');
	chofer.value=chofer_new;
	ch_vi.value=chofer_new;
	llamadaAjax("post",chofer.value);
}