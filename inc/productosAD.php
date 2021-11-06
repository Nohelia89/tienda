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
?>