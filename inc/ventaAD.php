<?php
	include("conex.php");
		
	function getPedido($id){
		$resu = array();
		$sql = "SELECT fecha, total, usuario FROM pedido WHERE id_pedido=$id";
		$rs = Ejecutar($sql);
		while($reg = mysqli_fetch_array($rs)){
			$resu["cabezal"] = $reg;
		}//wend
		
		if (count($resu)>0){
			$sql="SELECT nrolinea, cantidad, precio, detalle, idproducto FROM pedidolineas WHERE idpedido=$id ORDER BY nrolinea";
			$rs = Ejecutar($sql);
			$i = 0;
			while($reg = mysqli_fetch_array($rs)){
				$resu["lineas"][$i] = $reg;
				$i++;
			}//wend
		}
		return $resu;
	}
	
	function insertarVenta($idpedido, $total, $usuario, $lineas)
	{
		
		$sql = "INSERT INTO venta(fechahora, usuario, total, pedido) VALUES(NOW(), '$usuario', $total, $idpedido)";

		$con = Conectar();
		EjecutarConexion($con, $sql);
		
		$lastid = mysqli_insert_id($con);
		
		if($lastid!=0)
		{
			for($i=0; $i<count($lineas); $i++)
			{
				$nro = $i + 1;
				$cantidad = $lineas[$i]["cantidad"];
				$precio = $lineas[$i]["precio"];
				$detalle = $lineas[$i]["detalle"];
				$idprod = $lineas[$i]["idproducto"];
				
				$sql = "INSERT INTO ventalineas(idventa, nrolinea, cantidad, precio, detalle, idproducto) ";
				$sql = $sql."VALUES($lastid, $nro, $cantidad, $precio, '$detalle', $idprod)";
				EjecutarConexion($con, $sql);
				
				$sql = "UPDATE producto SET stock = stock-$cantidad WHERE id_producto=$idprod";
				EjecutarConexion($con, $sql);		
			}
			
			$sql = "UPDATE pedido SET confirmado='1' WHERE id_pedido=$idpedido";
			EjecutarConexion($con, $sql);
		}
		Desconectar($con);
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
	
	function listarPorFecha($fd, $fh)
	{
		$resu = array();
		
		$sql = "SELECT v.fechahora, v.id, v.total, v.usuario, concat(u.nombre,' ',u.apellido) as nombre ";
		$sql = $sql."FROM venta v ";
		$sql = $sql."JOIN usuario u ON u.documento=v.usuario ";
		$sql = $sql."WHERE date(v.fechahora) BETWEEN '$fd' AND '$fh' ";
		$sql = $sql."ORDER BY fechahora DESC";
		$rs = Ejecutar($sql);
		$i = 0;
		while($reg = mysqli_fetch_array($rs)){
			$resu[$i] = $reg;
			$i++;
		}//wend
		
		return $resu;
	}
?>


