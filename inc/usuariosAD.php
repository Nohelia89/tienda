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

	function listar($filtro)
	{
		$resu = array();
		$sql = "SELECT documento, nombre, apellido, direccion, email FROM usuario ";
		if($filtro!="") $sql = $sql."WHERE nombre LIKE '%$filtro%' ";
		$sql = $sql."ORDER BY nombre";
		
		$rs = Ejecutar($sql);
		$i = 0;
		while($reg = mysqli_fetch_array($rs)){
			$resu[$i] = $reg;
			$i++;
		}//wend
		return $resu;
	}
	
	function listarVentas($doc)
	{
		$resu = array();
		$sql = "SELECT fechahora, id, total FROM venta ";
		$sql = $sql."WHERE usuario='$doc' ";
		$sql = $sql."ORDER BY fechahora DESC";
		
		$rs = Ejecutar($sql);
		$i = 0;
		while($reg = mysqli_fetch_array($rs)){
			$resu[$i] = $reg;
			$i++;
		}//wend
		return $resu;
	}

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


	function getUsuario($user){
		$arr = array();
		//$sql = "SELECT documento, nombre, apellido, esadmin FROM usuario WHERE user='".strtoupper($user)."' AND pass='".passEnc(strtoupper($pass))."'";
		$sql = "SELECT documento, nombre, apellido, password, direccion, email FROM usuario WHERE documento='".$user."'";
		$rs = Ejecutar($sql);
		while($reg = mysqli_fetch_array($rs)){
			$arr = $reg;
		}//wend
		return $arr;
	}//end


	function updateUser($user,$password, $nombre, $apellido, $email, $direccion ){
		$arr = array();
		//$sql = "SELECT documento, nombre, apellido, esadmin FROM usuario WHERE user='".strtoupper($user)."' AND pass='".passEnc(strtoupper($pass))."'";
		$sql = "UPDATE usuario SET nombre='".$nombre."',"."apellido='".$apellido."',"."password='".$password."',"."direccion='".$direccion."',"."email='".$email."' WHERE documento='".$user."'";
		$rs = Ejecutar($sql);
		
	}//end

	function insertUser($documento, $password, $nombre, $apellido, $email, $direccion)
	{
		$sql = "INSERT INTO usuario(documento, password, nombre, apellido, email, direccion, esadmin) VALUES ('$documento','$password','$nombre','$apellido','$email','$direccion',0);";
		Ejecutar($sql);
	}
?>


