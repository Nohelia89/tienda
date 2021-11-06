<?php
	include("conex.php");
		
	function guardar($id, $nom, $descripcion, $precio, $stock, $activo, $img1, $img2, $img3){

		$link = Conectarse();				
		$sql = "insert into producto(id_producto, nombre, descripcion, precio, stock, activo) VALUES ($id,'$nom','$descripcion',$precio,$stock,$activo)";
		mysqli_query($link, $sql);
		
		$sql = "insert into imagenes(id_producto, url_imagen) VALUES ($id,'$img1')";
		mysqli_query($link, $sql);
		$sql = "insert into imagenes(id_producto, url_imagen) VALUES ($id,'$img2')";
		mysqli_query($link, $sql);
		$sql = "insert into imagenes(id_producto, url_imagen) VALUES ($id,'$img3')";
		mysqli_query($link, $sql);
		
		mysqli_close($link);
	}//end
?>