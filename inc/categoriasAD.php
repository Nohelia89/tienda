<?php
	include("conex.php");
		
	function comboCategorias($def){
		$arr = array();
		$sql = "SELECT id, nombre FROM categoria ORDER BY nombre";
		$rs = Ejecutar($sql);
		$i = 0;
		while($reg = mysqli_fetch_array($rs)){
			$arr[$i] = $reg;
			$i++;
		}//wend
		$str = "";
		$str = "<select id='comboCategorias'>\n";
		$str.= "<option id='0'>-Seleccionar-</option>\n";
		for($i=0;$i<count($arr);$i++){
			if($arr[$i]['id']==$def){
				$str.= "<option id='".$arr[$i]['id']."' selected>".$arr[$i]['nombre']."</option>\n";
			}else{
				$str.= "<option id='".$arr[$i]['id']."'>".$arr[$i]['nombre']."</option>\n";
			}//endif
		}//next
		$str.= "</select>\n";
		return $str;
	}//end
	
	function listar(){
		$arr = array();
		$sql = "SELECT id, nombre FROM categoria ORDER BY id";
		$rs = Ejecutar($sql);
		$i = 0;
		while($reg = mysqli_fetch_array($rs)){
			$arr[$i] = $reg;
			$i++;
		}//wend
		return $arr;
	}//end
	
	function guardar($nom){		
		$sql = "INSERT INTO categoria(nombre) VALUES ('$nom')";
		Ejecutar($sql);
	}//end
	
	function modificar($id, $nom){		
		$sql = "UPDATE categoria SET nombre='$nom' WHERE id=$id";
		Ejecutar($sql);
	}//end
	
	function getCategoria($id){
		$arr = array();
		$sql = "SELECT id, nombre FROM categoria WHERE id=$id";
		$rs = Ejecutar($sql);
		while($reg = mysqli_fetch_array($rs)){
			$arr = $reg;
		}//wend
		return $arr;
	}//end
?>