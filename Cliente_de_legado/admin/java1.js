/*if(window.XMLHttpRequest) {  // Navegadores que siguen los estándares
  http = new XMLHttpRequest();
}
else if(window.ActiveXObject) {  // Navegadores obsoletos
  http = new ActiveXObject("Microsoft.XMLHTTP");
}
http.onreadystatechange = saluda;

http.open('GET', 'http://localhost/hola.php', true);
http.send(null);
 
  function saluda() {
    if(http.readyState == 4) {
      if(http.status == 200) {
        alert(http.responseText);
      }
    }
  }
*/
function crearAjax(){
   var objetoAjax=false;
   if(navigator.appName=="Microsoft Internet Explorer")
     objetoAjax = new ActiveXObject("Microsoft.XMLHTTP");
   else
     objetoAjax = new XMLHttpRequest();
   return(objetoAjax);
}


function llamadaAjax(metodo){
  var ajax=crearAjax();
  if(ajax){
    if(metodo == "post"){
      ajax.open("POST","/admin/",true);
      ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
      ajax.send("valor='Beto'");
    }
    //Preguntamos si el método es GET
    if(metodo == "get"){
      ajax.open("GET","/admin/hola.php?valor=beto",true);
      ajax.send(null);
    }
    ajax.onreadystatechange = function(){
      if(ajax.readyState==4){
        var respuesta = document.createTextNode(ajax.responseXMl);
        var div = document.getElementById("resultado");
        div.appendChild(respuesta);
      }
    }
  }
}