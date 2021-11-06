<?php

	include("productoAD.php");

	$id=$_POST['txtId'];
	$nom=$_POST['txtNom'];
	$descripcion=$_POST['txtDescripcion'];
	$precio=$_POST['txtPrecio'];
	$stock=$_POST['txtStock'];
	echo $stock;

	/*
	$img1=$_FILES['txtImagen1']['name'];
	$img2=$_FILES['txtImagen1']['name'];
	$img3=$_FILES['txtImagen1']['name'];
	*/
	
	if ($stock > 0) {
		$activo = 1;
	}
	
	move_uploaded_file($_FILES['txtImagen1']['tmp_name'],"imagenes/".$id."_1.jpg");
	move_uploaded_file($_FILES['txtImagen2']['tmp_name'],"imagenes/".$id."_2.jpg");
	move_uploaded_file($_FILES['txtImagen3']['tmp_name'],"imagenes/".$id."_3.jpg");
	
	guardar($id, $nom, $descripcion, $precio, $stock, $activo, "imagenes/".$id."_1.jpg", "imagenes/".$id."_2.jpg", "imagenes/".$id."_3.jpg");
?>
