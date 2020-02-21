document.addEventListener("DOMContentLoaded",()=>{
    var formulario=document.getElementById("form"); 
    formulario.addEventListener("submit",function (event){
        event.preventDefault();
        SubirArchivo(this);
    });
});

function SubirArchivo(form){    
    
    if(document.getElementById("Barra_procentaje")){BarraCarga=document.getElementById("Barra_procentaje");}
    if(document.getElementById("subir")){Subir=document.getElementById("subir");}
    if(document.getElementById("mensaje")){Mensaje=document.getElementById("mensaje");}
    if(document.getElementById("cancelar")){Cancelar=document.getElementById("cancelar");}
    BarraCarga.style.width='0%';
    BarraCarga.style.background="blue";

    var ajax=crearAjax();
    //porsentaje de subida
    ajax.upload.addEventListener("progress",(event)=>{
        var PorcentajeCargado=Math.round((event.loaded/event.total)*100);
        BarraCarga.style.width=PorcentajeCargado+'%';
        BarraCarga.style.background="blue";
        Mensaje.innerHTML=PorcentajeCargado+"%";
    });
    ajax.addEventListener("load",()=>{
        BarraCarga.style.width="100%";
        BarraCarga.style.background="green";
        Mensaje.innerHTML="Proceso Completado";

    });
    //envio de datos cargar_archivos\Backen\Subir.php
    ajax.open("POST","/cargar_archivos/Backen/Subir.php",true);
    //ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax.send(new FormData(form));
    //cancelar
    Cancelar.addEventListener("click",()=>{
        BarraCarga.style.width="100%";
        BarraCarga.style.background="red";
        Mensaje.innerHTML="Proceso Cancelador";
    });
}