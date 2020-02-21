//console.log(focus_a);

function mueve_diba(e,input){
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
		focus_a=parseInt(focus_in)+1;
		document.getElementById(focus_a).focus(); 
	}
	if(event.keyCode==40){
		focus_a=parseInt(focus_in)+10;
		document.getElementById(focus_a).focus(); 
	}; 

}
function mueve_diba_text(e,input){
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
		col=parseInt(col)-1;
		focus_to=col+"TEXT"+reg;
		document.getElementById(focus_to).focus();
	}
	if(event.keyCode==38){
		reg=parseInt(reg)-1;
		focus_to=col+"TEXT"+reg;
		document.getElementById(focus_to).focus();
	}
	if(event.keyCode==39){
		col=parseInt(col)+1;
		focus_to=col+"TEXT"+reg;
		document.getElementById(focus_to).focus();
	}
	if(event.keyCode==40){
		reg=parseInt(reg)+1;
		focus_to=col+"TEXT"+reg;
		document.getElementById(focus_to).focus();
	}; 
	
}
function calcula_update(){
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
			canti=parseInt(input.value);
			if(canti>=0)total=total+canti;
		}
	//console.log(total_conte);
	total_conte.value=total;
	}
}
function windows(input){
	var name_div=input.name;
	var div=document.getElementById(name_div);
	if (input.value=="x"){div.id="min";		input.value="-";}else
	if (input.value=="-"){div.id=input.name;input.value="x";}
	//var div=document.getElementsByName(name_div);
	console.log("nombre input: "+name_div);
	console.log("div: "+div.id);
}