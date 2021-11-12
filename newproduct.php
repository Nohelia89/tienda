<?php

	include("inc/productosAD.php");

	$categoria=$_GET['categoria'];
	$id=$_POST['txtId'];
	$nom=$_POST['txtNom'];
	$descripcion=$_POST['txtDescripcion'];
	$precio=$_POST['txtPrecio'];
	$stock=$_POST['txtStock'];

	$activo = 0;
	if ($stock > 0) {
		$activo = 1;
	}
	
	if(exists($id))
	{
		header("Location: pageerror.php?err=prodex&pag=altaproducto.php");
		exit();
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
	
	guardar($id, $nom, $descripcion, $precio, $stock, $activo, $categoria, $imagenes);
	header("Location: productoslista.php");
?>
