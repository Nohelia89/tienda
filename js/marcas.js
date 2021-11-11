var RowId = 0;
var Ord;
var id;
var nombre;
var activo;
	
function Init(alta){
	document.getElementById("inpNombre").focus();
	/*
	if(alta){
		document.getElementById("inpId").focus();
	}else{
		document.getElementById("inpDescripcion").focus();
		document.getElementById("cmbMarcas").style.visibility = "visible";
	}//endif
	*/
}//end

function CamposOff(){
}//end

function CamposOn(){
}//end

function GuardarMarca(alta){
	var err = false;
	var msg = "ATENCION!!!\n\nFaltan los siguientes campos:\n";
	var frm = document.getElementById("frm");
	
	//cod = frm.inpCodigo.value;
	nombre = frm.inpNombre.value;
	
	if(nombre.trim()==""){
		msg = msg +"- Nombre\n";
		err = true;
	}//endif
	if(!err){
		if(alta){
			frm.action = "php/insmarc.php?u="+ UserLog +"&p="+ PassLog;
		}else{
			frm.action = "php/updmarc.php?u="+ UserLog +"&p="+ PassLog +"&id="+ IdMarc;
		}//endif
		if(confirm("¿Desea guardar los datos?")){
			frm.submit();
		}//endif
	}else{
		alert(msg);
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

function SelectMarca(obj){
	var i;
	var tab = document.getElementById("tabMarcas");
	for(i=0;i<tab.rows.length;i++){
		var tr = tab.rows[i];
		tr.style.backgroundColor = "#FFFFFF";
	}//next
	obj.style.backgroundColor = "#CC5522";
	var td = obj.cells[0];
	RowId = td.innerHTML;
}//end

function setChkActivo(v){
	var chk = document.getElementById("chkActivo");
	if(v==1){
		chk.checked = true;
	}else{
		chk.checked = false;
	}//endif
}//end

function ModiMarca(){
	if(RowId!=0){
		window.location = "marcaedi.php?u="+ UserLog +"&p="+ PassLog +"&cod="+ RowId;
		//alert(RowId);
	}else{
		alert("Debe seleccionar una Marca.");
	}//endif
}//end

function OrderMarca(camp){
	if(Ord==""){
		Ord = "desc";
		CargarMarcas(camp);
	}else{
		Ord = "";
		CargarMarcas(camp);
	}//endif
}//end

function CargarMarcas(camp){
	var activa;
	if(document.getElementById("chkActivo").checked){
		activa = "1";
	}else{
		activa = "0";
	}//endif
	if(camp==""){
		var param = "&act="+ activa;
	}else{
		var param = "&act="+ activa +"&ord="+ camp +"&ordtip="+ Ord;
	}//endif
	window.location = "marcas.php?u="+ UserLog +"&p="+ PassLog + param;
}//end