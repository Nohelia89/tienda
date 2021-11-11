function CambiarPagina(page){
	window.location = page;
}//end

function CambiarPaginaUser(page){
	window.location = page +"?u="+ UserLog +"&p="+ PassLog;
}//end

function Logueo(){
	var frm = document.getElementById("frm");
	var user = frm.inpUser.value;
	var pass = frm.inpPass.value;
	
	if(user!="" && pass!=""){
		frm.submit();
	}else{
		alert("Debe ingresar usuario y contrseña.");
	}//endif
}//end