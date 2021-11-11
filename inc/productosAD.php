<?php
	include("conex.php");
		
	function guardar($id, $nom, $descripcion, $precio, $stock, $activo, $imagenes){

		$link = Conectarse();				
		$sql = "insert into producto(id_producto, nombre, descripcion, precio, stock, activo) VALUES ($id,'$nom','$descripcion',$precio,$stock,$activo)";
		mysqli_query($link, $sql);
		
		for ($i=0; $i<count($imagenes); $i++){
			$sql = "insert into imagenes(id_producto, url_imagen) VALUES ($id,'$imagenes[$i]')";
			mysqli_query($link, $sql);
		}	
		mysqli_close($link);
	}//end
	
	function listar($idCategoria){
		$resu = array();
		$sql = "SELECT id_producto, nombre, descripcion, precio, stock, categoria FROM producto WHERE activo=1";
		if($idCategoria>0)
		{
			$sql = $sql." AND categoria=$idCategoria";
		}
		$rs = Ejecutar($sql);
		$i = 0;
		while($reg = mysqli_fetch_array($rs)){
			$resu[$i] = $reg;
			$i++;
		}//wend
		return $resu;
	}
	
	function listarImagenes($idProducto){
		$resu = array();
		$sql = "SELECT url_imagen FROM imagenes WHERE id_producto='".$idProducto."'";
		$rs = Ejecutar($sql);
		$i = 0;
		while($reg = mysqli_fetch_array($rs)){
			$resu[$i] = $reg;
			$i++;
		}//wend
		return $resu;
	}
	
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
?>