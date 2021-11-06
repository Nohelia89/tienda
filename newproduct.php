<?php

	include("inc/productosAD.php");

	$id=$_POST['txtId'];
	$nom=$_POST['txtNom'];
	$descripcion=$_POST['txtDescripcion'];
	$precio=$_POST['txtPrecio'];
	$stock=$_POST['txtStock'];


	/*
	$img1=$_FILES['txtImagen1']['name'];
	$img2=$_FILES['txtImagen1']['name'];
	$img3=$_FILES['txtImagen1']['name'];
	*/
	
	if ($stock > 0) {
		$activo = 1;
	}
	
	//move_uploaded_file($_FILES['txtImagen1']['name'],"imagenes/".$id."_1.jpg");
	//move_uploaded_file($_FILES['txtImagen2']['name'],"imagenes/".$id."_2.jpg");
	//move_uploaded_file($_FILES['txtImagen3']['name'],"imagenes/".$id."_3.jpg");
	$var = $_FILES['txtImagen1']['name'];
	echo $var;
//	guardar($id, $nom, $descripcion, $precio, $stock, $activo, "imagenes/".$id."_1.jpg", "imagenes/".$id."_2.jpg", "imagenes/".$id."_3.jpg");
?>
