<?php

	include("inc/categoriasAD.php");
	
	if(isset($_GET['action']))
	{
		if($_GET['action']=="add")
		{
			crearCategoria();
		}
		else if($_GET['action']=="edit")
		{
			editarCategoria();
		}
	}
	
	function crearCategoria()
	{
		$nom=$_POST['txtNom'];
		guardar($nom);
		header("Location: categorias.php");
	}
	
	function editarCategoria()
	{
		$id=$_GET['id'];
		$nom=$_POST['txtNom'];
		
		modificar($id, $nom);
		header("Location: categorias.php");
	}
?>
