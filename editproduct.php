<?php

	include("inc/productosAD.php");
	
	if(isset($_GET['action']))
	{
		if($_GET['action']=="image")
		{
			if($_GET['op']=="delete")
			{
				eliminar_imagen($_GET["producto"], $_GET["imagen"]);
			}
			else if($_GET['op']=="add")
			{
				agregar_imagenes($_GET["producto"]);
			}
		}
	}
	else
	{
		editarProducto();
	}
	
	function editarProducto()
	{
		$id=$_GET['producto'];
		$categoria=$_GET['categoria'];

		$nom=$_POST['txtNom'];
		$descripcion=$_POST['txtDescripcion'];
		$precio=$_POST['txtPrecio'];
		$stock=$_POST['txtStock'];
		$activo=$_POST['chkActivo'];

		modificar($id, $nom, $descripcion, $precio, $stock, $activo, $categoria);
		header("Location: productoslista.php");
	}

	function eliminar_imagen($producto, $imagen)
	{
		unlink("imagenes/".$imagen);
		eliminarImagen($producto, $imagen);
		header("Location: editarproducto.php?producto=$producto");
	}
	
	function agregar_imagenes($producto)
	{
		if (isset($_FILES['img'])){
			$ultima = count(listarImagenes($producto))+1;
			$cantidad= count($_FILES["img"]["tmp_name"]);

			for ($i=0; $i<$cantidad; $i++){
				//Comprobamos si el fichero es una imagen
				if ($_FILES['img']['type'][$i]=='image/png' || $_FILES['img']['type'][$i]=='image/jpeg'){		
					//Subimos el fichero al servidor
					//	echo $_FILES["img"]["name"][$i];
					$nomimagen = $producto."_".($i+$ultima).".jpg";
					move_uploaded_file($_FILES["img"]["tmp_name"][$i], "imagenes/".$nomimagen);
					ingresarImagen($producto, $nomimagen);
				}
			}
		}
		header("Location: editarproducto.php?producto=$producto");
	}
?>
