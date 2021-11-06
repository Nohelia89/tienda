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
	
	//move_uploaded_file($_FILES['img1']['tmp_name'],"imagenes/".$id."_1.jpg");
	//move_uploaded_file($_FILES['img2']['tmp_name'],"imagenes/".$id."_2.jpg");
	//move_uploaded_file($_FILES['img3']['tmp_name'],"imagenes/".$id."_3.jpg");
	foreach ($_FILES["img"]['tmp_name'] as $key => $tmp_name){
	echo $_FILES["img"]["name"][$key];
	}
//	guardar($id, $nom, $descripcion, $precio, $stock, $activo, "imagenes/".$id."_1.jpg", "imagenes/".$id."_2.jpg", "imagenes/".$id."_3.jpg");
?>
