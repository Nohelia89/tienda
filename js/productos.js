var RowId = 0;
var Ord;
var cod;
var desc;
var origen;
var precio;
var marca;
var activo;
	
function Init(alta){
	if(alta){
		document.getElementById("inpCodigo").focus();
		document.getElementById("cmbMarcas").style.visibility = "visible";
	}else{
		document.getElementById("inpDescripcion").focus();
		document.getElementById("cmbMarcas").style.visibility = "visible";
	}//endif
}//end

function CamposOff(){
}//end

function CamposOn(){
}//end

function changePrecio(){
	var numL = "";
	var numR = "";
	var objinp = document.getElementById("frm").inpPrecio;
	var inp = objinp.value;
	inp = inp.replace(".","");
	numL = inp.substring(0,inp.length-2);
	numR = inp.substring(inp.length-2);
	if(numL==""){
		numL="0";
	}//end if
	if(numR.length==1){
		numR = "0"+ numR;
	}//end if
	objinp.value = numL +"."+ numR;
}//end

function ControlPrecio(e){
	var ie = false;
	var keynum;
	var	keychar;
	var numcheck;
	var ret = false;

	if(window.event){ // IE
		keynum = e.keyCode;
		ie = true;
	}else if(e.which){ // Netscape/Firefox/Opera
		keynum = e.which;
		ie = false;
	}//endif
	
	if(keynum==undefined){
		keychar = String.fromCharCode(keynum);
		return keychar;
	}//endif
	
	if(keynum==8){
		keychar = String.fromCharCode(keynum);
		return keychar;
	}//endif
	
	if(keynum>=48 && keynum<=57){
		keychar = String.fromCharCode(keynum);
		return keychar;
	}//endif
	
	return false;
	/*
	keychar = String.fromCharCode(keynum);
	numcheck = /\d/;
	return numcheck.test(keychar);
	*/
}//end

function SelectFiltro(){
	var cmbMarcas = document.getElementById("cmbMarcas");
	var cmbFil = document.getElementById("cmbFilProducto");
	var inp = document.getElementById("inpFiltro");
	var sele = cmbFil.options[cmbFil.selectedIndex].id;
	switch(sele){
		case "0":
			inp.value = "";
			inp.disabled = "true";
			cmbMarcas.style.visibility = "hidden";
			break;
		case "codigouser":
			inp.value = "";
			inp.disabled = "";
			cmbMarcas.style.visibility = "hidden";
			break;
		case "descripcion":
			inp.value = "";
			inp.disabled = "";
			cmbMarcas.style.visibility = "hidden";
			break;
		case "origen":
			inp.value = "";
			inp.disabled = "";
			cmbMarcas.style.visibility = "hidden";
			break;
		case "marca":
			inp.value = "";
			inp.disabled = "true";
			cmbMarcas.style.visibility = "visible";
			break;
	}//end case
}//end

function BuscarProducto(ordenar){
	var cmbMarcas = document.getElementById("cmbMarcas");
	var cmbFil = document.getElementById("cmbFilProducto");
	var inp = document.getElementById("inpFiltro");
	var sele = cmbFil.options[cmbFil.selectedIndex].id;
	var activo;
	if(document.getElementById("chkActivo").checked){
		activo = "1";
	}else{
		activo = "0";
	}//endif
	if(sele=="marca"){
		var ma = cmbMarcas.options[cmbMarcas.selectedIndex].id;
		if(ma!="0"){
			if(ordenar==""){
				var param = "&fil="+ sele +"&filval="+ ma +"&act="+ activo;
			}else{
				var param = "&fil="+ sele +"&filval="+ ma +"&act="+ activo +"&ord="+ ordenar +"&ordtip="+ Ord;
			}//endif
			window.location = "productos.php?u="+ UserLog +"&p="+ PassLog + param;
		}else{
			alert("Debe seleccionar una marca.");
		}//endif
	}else{
		if(ordenar==""){
			var param = "&fil="+ sele +"&filval="+ inp.value +"&act="+ activo;
		}else{
			var param = "&fil="+ sele +"&filval="+ inp.value +"&act="+ activo +"&ord="+ ordenar +"&ordtip="+ Ord;
		}//endif
		window.location = "productos.php?u="+ UserLog +"&p="+ PassLog + param;
	}//endif
}//end

function SelectProducto(obj){
	var i;
	var tab = document.getElementById("tabProductos");
	for(i=0;i<tab.rows.length;i++){
		var tr = tab.rows[i];
		tr.style.backgroundColor = "#FFFFFF";
	}//next
	obj.style.backgroundColor = "#BBBBDD";
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

function ModiProducto(){
	if(RowId!=0){
		window.location = "editarproducto.php?producto="+ RowId;
		//alert(RowId);
	}else{
		alert("Debe seleccionar un producto.");
	}//endif
}//end

function OrderProducto(camp){
	if(Ord==""){
		Ord = "desc";
		BuscarProducto(camp);
	}else{
		Ord = "";
		BuscarProducto(camp);
	}//endif
}//end