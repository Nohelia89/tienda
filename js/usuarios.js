var RowId = 0;
var RowRang = 0;
var Ord;
var user;
var nom;
var ape;
var tel;
var mail;
var rango;
var activo;

function Init(alta){
	var s = document.getElementById("cmbRangos");
	if(RangoLog<3){
		s.remove(3);
		s.remove(2);
	}//endif
	if(alta){		
		document.getElementById("inpUser").focus();
	}else{
		document.getElementById("inpNom").focus();
	}//endif
}//end

function ActivarOnOff(){
	var ob = document.getElementById("hidActivo");
	if(document.getElementById("chkActivo").checked){
		ob.value = "1";
	}else{
		ob.value = "0";
	}//endif
}//end

function SelectUser(obj){
	var i;
	var tab = document.getElementById("tabUsers");
	for(i=0;i<tab.rows.length;i++){
		var tr = tab.rows[i];
		tr.style.backgroundColor = "#FFFFFF";
	}//next
	obj.style.backgroundColor = "#CC5522";
	var td = obj.cells[2];
	var td2 = obj.cells[6];
	RowId = td.innerHTML;
	RowRang = td2.innerHTML;
}//end

function ModiPass(){
	if(RowId!=0){	
		if(RowId!=UserLog){
			if(confirm("¿Desea restablecer la contraseña del usuario "+ RowId +"?\n Por defecto la contraseña nueva será: ecars")){
				window.location = "php/resetpass.php?u="+ UserLog +"&p="+ PassLog +"&cod="+ RowId;
			}//endif
			//alert(RowId);
		}//endif
	}else{
		alert("Debe seleccionar un usuario.");
	}//endif
}//end

function ModiUsuario(){
	if(RowId!=0){
		if(RowId!=UserLog){
			if(RangoLog>2){
				window.location = "usuarioedi.php?u="+ UserLog +"&p="+ PassLog +"&cod="+ RowId;
			}else{
				if(RangoLog>RowRang){
					window.location = "usuarioedi.php?u="+ UserLog +"&p="+ PassLog +"&cod="+ RowId;
				}else{
					alert("Ud. no tiene permisos para realizar esta acción.");
				}//endif
			}//endif
			//alert(RowId);
		}//endif
	}else{
		alert("Debe seleccionar un usuario.");
	}//endif
}//end

function RegUser(){
	var err = false;
	var msg = "ATENCIÓN!!!...\nHay un error en los siguientes campos:\n";
	var frm = document.getElementById("frm");
	var us = frm.inpUser.value;
	var pass = frm.inpPass.value;
	var nom = frm.inpNom.value;
	var ape = frm.inpApe.value;
	var tel = frm.inpTel.value;
	var mail = frm.inpMail.value;
	if(us.trim()==""){
		msg = msg +"-Falta ingresar nombre de usuario.\n";
		err = true;
	}//endif
	if(pass.trim()==""){
		msg = msg +"-Falta ingresar contraseña.\n";
		err = true;
	}//endif
	if(nom.trim()==""){
		msg = msg +"-Falta ingresar su nombre.\n";
		err = true;
	}//endif
	if(ape.trim()==""){
		msg = msg +"-Falta ingresar su apellido.\n";
		err = true;
	}//endif
	if(mail.trim()==""){
		msg = msg +"-Falta ingresar su dirección de correo.\n";
		err = true;
	}//endif
	if(err){
		alert(msg);
	}else{
		frm.submit();
	}//endif
}//end

function Buscar(camp){
	var inp = document.getElementById("inpFiltro");
	if(camp==""){
		var param = "&filval="+ inp.value;
	}else{
		var param = "&filval="+ inp.value +"&ord="+ camp +"&ordtip="+ Ord;
	}//endif
	window.location = "usuarios.php?u="+ UserLog +"&p="+ PassLog + param;
}//end

function Order(camp){
	if(Ord==""){
		Ord = "desc";
		Buscar(camp);
	}else{
		Ord = "";
		Buscar(camp);
	}//endif
}//end

function Guardar(alta){
	var err = false;
	var msg = "ATENCION!!!\n\nFaltan los siguientes campos:\n";
	var frm = document.getElementById("frm");
	
	user = frm.inpUser.value;
	nom = frm.inpNom.value;
	ape = frm.inpApe.value;
	tel = frm.inpTel.value;
	mail = frm.inpMail.value;
	var cmb = document.getElementById("cmbRangos");
	rango = cmb.options[cmb.selectedIndex].id;
	
	if(user.trim()==""){
		msg = msg +"- Usuario\n";
		err = true;
	}//endif
	
	if(!err){
		if(alta){
			frm.action = "php/insusuario.php?u="+ UserLog +"&p="+ PassLog +"&rango="+ rango;
		}else{
			frm.action = "php/updusuario.php?u="+ UserLog +"&p="+ PassLog +"&rango="+ rango +"&cod="+ Codigo;
		}//endif
		if(confirm("¿Desea guardar los datos?")){
			frm.inpUser.disabled = "";
			frm.submit();
			frm.inpUser.disabled = "true";
		}//endif
	}else{
		alert(msg);
	}//endif
}//end