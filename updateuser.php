<?php
	include("inc/usuariosAD.php");

	$idUsuario=$_SESSION["documento"];
	$pass=$_POST['txtPass'];
	$nom=$_POST['txtNom'];
	$ape=$_POST['txtApe'];
	$dir=$_POST['txtDir'];
	$mail=$_POST['txtMail'];

	if (exists($id)){
		udpateUser($id, $pass, $nom, $ape, $mail, $dir);
		header("Location:login.html");
	}
	else{
		header("Location: pageerror.php?err=userex&pag=registro.html");
	}
?>