<?php
	include "inc/usuariosAD.php";
	
	$user = $_POST["txtDocumento"];
	$pass = $_POST["txtPass"];
	
	$rs = getLogin($user,$pass);
	if(count($rs)>0){
		//die($rs['user']);
		session_start();
		$_SESSION["login"]=true;
		$_SESSION["usuario"]=$rs['nombre'];
		$_SESSION["esadmin"]=$rs['esadmin'];
		header("Location: index.php");
	}else{
		header("Location: pageerror.php?err=erruser&pag=login.html");
	}//endif
?>