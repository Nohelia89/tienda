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
		
		$link = Conectarse();
		//va el select
		
		$resultado = mysql_fetch_array($link, "SELECT p.id, p.nombre, i.url_imagen FROM producto p JOIN imagenes i ON i.id_producto=p.id_producto");
				
		mysqli_close($link);
		
		return $resultado;
		
		//$resultado[i][0]
	}
?>