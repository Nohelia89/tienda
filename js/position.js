function Position(){
	var divP = document.getElementById("divPrincipal");
	var divF = document.getElementById("fondo");
	var winW = window.outerWidth;
	var divPw = 820;
	var a = (winW*91)/100;

	if(winW>divPw){
		divP.style.marginLeft = ((winW-divPw)/2)+"px";
		divF.style.marginLeft = ((winW-a)/2)+"px";
		window.onresize = function(event){
			winW = window.outerWidth;
			divP.style.marginLeft = ((winW-divPw)/2)+"px";
			a = (winW*91)/100;
			divF.style.marginLeft = ((winW-a)/2)+"px";
		}//end
	}//endif
}//end