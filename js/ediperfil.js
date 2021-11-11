var gnom;
var gape;
var gcon;
var gmail;

function init(){
	document.getElementById("inpUser").focus();
	DesabilitarCampos();
}//end

function DesabilitarCampos(){
	document.getElementById("inpUser").readOnly = true;
	document.getElementById("inpNom").readOnly = true;
	document.getElementById("inpApe").readOnly = true;
	document.getElementById("inpCon").readOnly = true;
	document.getElementById("inpMail").readOnly = true;
	document.getElementById("inpUser").style.backgroundColor = "#CCCCCC";
	document.getElementById("inpNom").style.backgroundColor = "#CCCCCC";
	document.getElementById("inpApe").style.backgroundColor = "#CCCCCC";
	document.getElementById("inpCon").style.backgroundColor = "#CCCCCC";
	document.getElementById("inpMail").style.backgroundColor = "#CCCCCC";
}//end

function HabilitarCampos(){
	document.getElementById("inpNom").readOnly = false;
	document.getElementById("inpApe").readOnly = false;
	document.getElementById("inpCon").readOnly = false;
	document.getElementById("inpMail").readOnly = false;
	document.getElementById("inpNom").style.backgroundColor = "#FFFFFF";
	document.getElementById("inpApe").style.backgroundColor = "#FFFFFF";
	document.getElementById("inpCon").style.backgroundColor = "#FFFFFF";
	document.getElementById("inpMail").style.backgroundColor = "#FFFFFF";
}//end

function ModPerfil(){
	var btn = document.getElementById("btnMod");
	var btn2 = document.getElementById("btnCancelar");
	if(btn.value=="Modificar"){
		gnom = document.getElementById("inpNom").value;
		gape = document.getElementById("inpApe").value;
		gcon = document.getElementById("inpCon").value;
		gmail = document.getElementById("inpMail").value;
		btn.value = "Guardar";
		btn2.value = "Cancelar";
		HabilitarCampos();
		document.getElementById("inpNom").focus();
	}else{
		if(btn.value=="Guardar"){
			document.getElementById("frm").action = "php/upduser.php?u="+ UserLog +"&p="+ PassLog;
			document.getElementById("frm").submit();
		}//endif
	}//endif
}//end

function ModCancelar(){
	var btn = document.getElementById("btnMod");
	var btn2 = document.getElementById("btnCancelar");
	btn2.value = "Cambiar Contraseña";
	btn.value = "Modificar";
	document.getElementById("inpNom").value = gnom;
	document.getElementById("inpApe").value = gape;
	document.getElementById("inpCon").value = gcon;
	document.getElementById("inpMail").value = gmail;
	DesabilitarCampos();
}//end

function GuardarPassNew(){
	var frm = document.getElementById("frmPass");
	var pold = frm.inpPassAnt;
	var pnew = frm.inpPassNueva;
	var pnew2 = frm.inpPassNueva2;
	
	if(pnew.value==pnew2.value){
		frm.action = "php/updpass.php?u="+ UserLog +"&p="+ PassLog;
		frm.submit();
	}else{
		var sp = document.getElementById("spErr");
		sp.innerHTML = "La contraseña nueva no es valida.";
		pold.value = "";
		pnew.value = "";
		pnew2.value = "";
		setTimeout("QuitErr()",2000);
		pold.focus();
	}//endif
}//end

function QuitErr(){
	var sp = document.getElementById("spErr");
	sp.innerHTML = "";
}//end

function CambiarPass(val){
	var btn = document.getElementById("btnCancelar");
	if(btn.value=="Cancelar"){
		ModCancelar();
	}else{
		if(val=="cambiar"){
			document.getElementById("fra1").style.display = "none";
			document.getElementById("fra2").style.display = "block";
			document.getElementById("inpPassAnt").focus();
		}else{
			document.getElementById("fra1").style.display = "block";
			document.getElementById("fra2").style.display = "none";
		}//endif
	}//endif
}