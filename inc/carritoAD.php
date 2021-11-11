<?php
	include("conex.php");
		
	function getCarrito($user){
		$resu = array();
		//$sql = "SELECT documento, nombre, apellido, esadmin FROM usuario WHERE user='".strtoupper($user)."' AND pass='".passEnc(strtoupper($pass))."'";
		$sql = "SELECT l.idpedido, l.nrolinea, l.idproducto, l.detalle, l.cantidad, l.precio  FROM pedidolineas l join pedido p ON p.id_pedido = l.idpedido WHERE p.usuario='".$user."' AND p.confirmado='0' order by l.nrolinea";
		$rs = Ejecutar($sql);
		$i = 0;
		while($reg = mysqli_fetch_array($rs)){
			$resu[$i] = $reg;
			$i++;
		}//wend
		return $resu;
	}
	function insertarProductoPedido($idpedido, $nrolinea, $cantidad, $detalle, $precio, $idproducto){
	
		
		$sql = "INSERT INTO pedidolineas(idpedido, nrolinea, cantidad, detalle, precio, idproducto) VALUES ($idpedido, $nrolinea, $cantidad, '$detalle', $precio, $idproducto)";
		Ejecutar($sql);
	
	}

	function cantLineasPedido($idpedido){
		$sql="SELECT nrolinea FROM pedidolineas WHERE idpedido=$idpedido";
		$rs = Ejecutar($sql);
		
		return mysqli_num_rows($rs);
	}

	function eliminarProductoPedido($idpedido, $nrolinea){
	
		
		$sql = "DELETE FROM pedidolineas WHERE idpedido=".$idpedido." AND nrolinea=".$nrolinea;
		Ejecutar($sql);
	
	}

	//end
	function getPedidoActual($user){
		$resu = array();
		
		$sql = "SELECT id_pedido FROM pedido WHERE usuario='".$user."' AND p.confirmado=0 ";
		$rs = Ejecutar($sql);
	
		while($reg = mysqli_fetch_array($rs)){
			$resu = $reg;
			
		}//wend
		if (count($resu)==0){
			$sql="INSERT INTO pedido (total, fecha, confirmado, usuario) VALUES (0,NOW(),0,'$user')";
			Ejecutar($sql);
			$resu=getPedidoActual($user);
			
		} 
		return $resu;
	}


	function getProducto($idProducto){
		$resu = array();
		
		$sql = "SELECT precio, nombre, stock FROM producto WHERE id_producto=".$idProducto;
		$rs = Ejecutar($sql);
	
		while($reg = mysqli_fetch_array($rs)){
			$resu = $reg;
			
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


?>


