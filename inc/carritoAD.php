<?php
	include("conex.php");
		
	function getCarrito($user){
		$resu = array();
		//$sql = "SELECT documento, nombre, apellido, esadmin FROM usuario WHERE user='".strtoupper($user)."' AND pass='".passEnc(strtoupper($pass))."'";
		$sql = "SELECT l.idpedido, l.nrolinea, l.idproducto, l.detalle, l.cantidad, l.precio  FROM pedidolineas l join pedido p ON p.id_pedido = l.idpedido WHERE p.usuario='".$user."' AND p.confirmado=0 order by l.nrolinea";
		$rs = Ejecutar($sql);
		$i = 0;
		while($reg = mysqli_fetch_array($rs)){
			$resu[$i] = $reg;
			$i++;
		}//wend
		return $resu;
	}

	//end


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


