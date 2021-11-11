var Pos = 0;
var Elemen = 0;
var contador = 1;
var aux = 0;

function MenuOver(over,obj){
	
	if(over){
		obj.style.backgroundColor = "#FF4422";
	}else{
		obj.style.backgroundColor = "#1B1B1B";
	}//endif
	
}//end

function RegOver(Over,Obj){
	
	if(Over){
		if(Obj.style.backgroundColor!="rgb(204, 85, 34)"){
			Obj.style.backgroundColor = "#DDDDFF";
		}
	}else{
		if(Obj.style.backgroundColor=="rgb(221, 221, 255)"){
			Obj.style.backgroundColor = "#FFFFFF";
		}
	}//endif
}//end

function NovOver(over,objid){
	var obj = document.getElementById(objid);
	if(over){
		obj.style.backgroundColor = "#505050";
		setTimeout("NovOver(false,'"+ objid +"')",500);
	}else{
		obj.style.backgroundColor = "#101010";
	}//endif
}//end

function deslizarEfect(left){
	var obj1 = document.getElementById("d");
	var obj2 = document.getElementById("d2");
	var btnL = document.getElementById("btnL");
	var btnR = document.getElementById("btnR");
	if(!left){
		btnL.disabled = "true";
		btnR.disabled = "true";
		Pos = Pos-1;
		if(Pos>aux){
			obj1.style.marginLeft = Pos +"px";
			obj2.style.marginLeft = Pos +"px";
			setTimeout("deslizarEfect(false)",0);
		}else{
			btnL.disabled = "";
			btnR.disabled = "";
		}//endif
	}else{
		btnL.disabled = "true";
		btnR.disabled = "true";
		Pos = Pos+1;
		if(Pos<aux){
			obj1.style.marginLeft = Pos +"px";
			obj2.style.marginLeft = Pos +"px";
			setTimeout("deslizarEfect(true)",0);
		}else{
			btnL.disabled = "";
			btnR.disabled = "";
		}//endif
	}//endif
}//end

function moverR(){
	var obj1 = document.getElementById("d");
	var obj2 = document.getElementById("d2");
	var lim;
	
	if(Elemen>4){
		lim = ((Elemen-4)*-1)*180;
	}else{
		lim = 0;
	}//endif
	if(Pos>lim){
		aux = Pos - 180;
		deslizarEfect(false);
	}//endif
}//end

function moverL(){
	var obj1 = document.getElementById("d");
	var obj2 = document.getElementById("d2");

	if(Pos<0){
		aux = Pos + 180;
		deslizarEfect(true);
	}//endif
}//end

function WOpen(pag){
	window.open(pag);
}//end