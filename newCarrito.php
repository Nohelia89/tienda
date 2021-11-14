<?php

	include("inc/carritoAD.php");

	session_start();

	$cantidad=$_GET['cantidad'];
	$idproducto=$_GET['producto'];
	$idUsuario=$_SESSION["documento"];

	$pedido = getPedidoActual($idUsuario);
	$producto = getProducto($idproducto);
	
	$lineaActual = getLineaPorProducto($pedido["id_pedido"], $idproducto);
	if(count($lineaActual)==0)
	{
		if ($producto["stock"]<$cantidad)
		{
			header("Location: pageerror.php?err=stock&pag=index.php");
			exit();
		}
		
		$nrolinea = cantLineasPedido($pedido["id_pedido"])+1;
		insertarProductoPedido($pedido["id_pedido"], $nrolinea, $cantidad, $producto['nombre'], $producto['precio'], $idproducto);
		calcularTotal($pedido["id_pedido"]);
		header("Location:carrito.php");
	}
	else
	{
		$nrolinea = $lineaActual["nrolinea"];
		$cantActual = $lineaActual["cantidad"];
		if ($producto["stock"] < ($cantidad+$cantActual))
		{
			header("Location: pageerror.php?err=stock&pag=index.php");
			exit();
		}
		setLineaPorProducto($pedido["id_pedido"], $nrolinea, ($cantidad+$cantActual));
		calcularTotal($pedido["id_pedido"]);
		header("Location:carrito.php");
	}
?>
