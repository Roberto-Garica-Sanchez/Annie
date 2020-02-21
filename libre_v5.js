function FocusToNext(e,elemento,name_next){
    var event = window.event ? window.event : e;    
	if (event.keyCode==13){
        if(name_next){
            if(document.getElementById(name_next)){document.getElementById(name_next).focus();}else{console.log('elemento no encontrado');
            }

        }

        event.preventDefault();
	}
}
//los sigientes elemento funciona pero son incompletos 
function EnterToTab(e,elemento) {
    var event = window.event ? window.event : e;
    EnterToTab.fields = EnterToTab.fields || GetIndexTab();
    var teclaCodigo=event.keyCode
    var tecla=String.fromCharCode(teclaCodigo); //obtengo la tecla pura 
    
    if(event.keyCode==13){//Preciona Tecla ENTER
       var tabinde = parseInt(elemento.getAttribute('tabindex'),10);
        console.log(tabinde);
        if ( tabinde+1 < EnterToTab.fields.length ){
            EnterToTab.fields[tabinde+1].focus();
            EnterToTab.fields[tabinde+1].focus();
           }
        event.keyCode=9;//simula Presionar TAB
    }
}
function GetIndexTab(){
    var res = [],//crea un array 
        inpts = document.getElementsByTagName('input'), // lee los elementos 
        i = inpts.length;                               // numenro de elementos
    while (i--){    // mientras hay elemtos 
        var tabinde = parseInt(inpts[i].getAttribute('tabindex'),10),
            txtType = inpts[i].getAttribute('type');
            res[tabinde] = inpts[i];
    }
    return res;
}