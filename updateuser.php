<?php
	include("inc/usuariosAD.php");


	$id=$_POST['txtId'];
	$pass=$_POST['txtPass'];
	$nom=$_POST['txtNom'];
	$ape=$_POST['txtApe'];
	$dir=$_POST['txtDir'];
	$mail=$_POST['txtMail'];

	
	updateUser($id, $pass, $nom, $ape, $mail, $dir);
	session_start();
	$_SESSION["usuario"]=$nom;

	header("Location: index.php");
	
	
?>