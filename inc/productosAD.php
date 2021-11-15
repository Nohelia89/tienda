<?php
	include("conex.php");
		
	function guardar($id, $nom, $descripcion, $precio, $stock, $activo, $categoria, $imagenes){
		
		$sql = "insert into producto(id_producto, nombre, descripcion, precio, stock, activo, categoria) VALUES ($id,'$nom','$descripcion',$precio,$stock,$activo,$categoria)";
		$con = Conectar();
		EjecutarConexion($con, $sql);
		for ($i=0; $i<count($imagenes); $i++){
			$sql = "insert into imagenes(id_producto, url_imagen) VALUES ($id,'$imagenes[$i]')";
			EjecutarConexion($con, $sql);
		}	
		Desconectar($con);
	}//end
	
	function modificar($id, $nom, $descripcion, $precio, $stock, $activo, $categoria){
		$sql = "UPDATE producto SET nombre='$nom', descripcion='$descripcion', precio=$precio, stock=$stock, activo=$activo, categoria=$categoria ";
		$sql = $sql."WHERE id_producto=$id";
		Ejecutar($sql);
	}//end
	
	function exists($id){
		
		$sql = "SELECT id_producto FROM producto WHERE id_producto=$id";
		$rs = Ejecutar($sql);
		
		if (mysqli_num_rows($rs)>0){
			return true;
		}
		else {
			return false;
		}
	}//end
	
	function listar($idCategoria, $activo){
		$resu = array();
		$sql = "SELECT p.id_producto, p.nombre, p.descripcion, p.precio, p.stock, c.nombre as categoria FROM producto p ";
		$sql = $sql."LEFT JOIN categoria c ON c.id=p.categoria ";
		$sql = $sql."WHERE p.activo=$activo";
		if($idCategoria>0)
		{
			$sql = $sql." AND p.categoria=$idCategoria";
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
		$str = "<select id='comboCategorias' class='form-select form-select-sm' style='width:300px;'>\n";
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
	
	function getProducto($id){
		$resu = array();
		$sql = "SELECT p.id_producto, p.nombre, p.descripcion, p.precio, p.stock, p.activo, p.categoria FROM producto p ";
		$sql = $sql."WHERE p.id_producto=$id";
		$rs = Ejecutar($sql);
		while($reg = mysqli_fetch_array($rs)){
			$resu["producto"] = $reg;
		}//wend
		$resu["imagenes"] = listarImagenes($id);
		return $resu;
	}
	
	function eliminarImagen($producto, $imagen){
		$sql = "DELETE FROM imagenes WHERE id_producto=$producto AND url_imagen='$imagen'";
		Ejecutar($sql);
	}
	
	function ingresarImagen($producto, $imagen){
		$sql = "INSERT INTO imagenes(id_producto, url_imagen) VALUES($producto,'$imagen')";
		Ejecutar($sql);
	}

	
	function listarCategorias(){
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
?>