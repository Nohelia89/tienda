<?php
	include("conex.php");
		
	function getLogin($user, $pass){
		$arr = array();
		//$sql = "SELECT documento, nombre, apellido, esadmin FROM usuario WHERE user='".strtoupper($user)."' AND pass='".passEnc(strtoupper($pass))."'";
		$sql = "SELECT documento, nombre, apellido, esadmin FROM usuario WHERE documento='".$user."' AND password='".$pass."'";
		$rs = Ejecutar($sql);
		while($reg = mysqli_fetch_array($rs)){
			$arr = $reg;
		}//wend
		return $arr;
	}//end


	function exists($user)
	{
		
		//$sql = "SELECT documento, nombre, apellido, esadmin FROM usuario WHERE user='".strtoupper($user)."' AND pass='".passEnc(strtoupper($pass))."'";
		$sql = "SELECT documento, nombre, apellido, esadmin FROM usuario WHERE documento='".$user."'";
		$rs = Ejecutar($sql);
		if (mysqli_num_rows($rs)>0){
			return true;
		}
		else {
			return false;
		}
		

	}

	function insertUser($documento, $password, $nombre, $apellido, $email, $direccion)
	{
		$sql = "INSERT INTO usuario(documento, password, nombre, apellido, email, direccion, esadmin) VALUES ('$documento','$password','$nombre','$apellido','$email','$direccion',0);";
		Ejecutar($sql);
	}
?>


