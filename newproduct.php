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
	
	if (isset($_FILES['img'])){
		
		$cantidad= count($_FILES["img"]["tmp_name"]);
		$imagenes=array();
		for ($i=0; $i<$cantidad; $i++){
			//Comprobamos si el fichero es una imagen
			if ($_FILES['img']['type'][$i]=='image/png' || $_FILES['img']['type'][$i]=='image/jpeg'){		
				//Subimos el fichero al servidor
			//	echo $_FILES["img"]["name"][$i];
			$imagenes[$i]=$id."_".$i.".jpg";
				move_uploaded_file($_FILES["img"]["tmp_name"][$i], "imagenes/".$id."_".$i.".jpg");
				$validar=true;
			}
			else $validar=false;
		}
	}

	
	guardar($id, $nom, $descripcion, $precio, $stock, $activo, $imagenes);
?>
