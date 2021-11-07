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
	
	function listar(){
		$resu = array();
		$sql = "SELECT id_producto, nombre, descripcion, precio, stock FROM producto WHERE activo=1";
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
?>