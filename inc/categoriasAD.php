<?php
	include("conex.php");
		
	function comboCategorias($def){
		$arr = array();
		$sql = "SELECT id, nombre FROM categoria ORDER BY nombre";
		$rs = Ejecutar($sql);
		$i = 0;
		while($reg = mysql_fetch_array($rs)){
			$arr[$i] = $reg;
			$i++;
		}//wend
		$str = "";
		$str = "<select id='cmbMarcas'>\n";
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
?>