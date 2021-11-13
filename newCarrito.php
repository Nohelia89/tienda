<?php

	include("inc/carritoAD.php");

	session_start();

	$cantidad=$_GET['cantidad'];
	$idproducto=$_GET['producto'];
	$idUsuario=$_SESSION["documento"];


	$producto = getProducto($idproducto);
	if ($producto["stock"]<$cantidad)
	{
		header("Location: pageerror.php?err=stock&pag=index.php");
		exit();
	}
	

	$idpedido=getPedidoActual($idUsuario);
	if ($idpedido == null){
	$idpedido=getPedidoActual($idUsuario);	
	}
	$nrolinea = cantLineasPedido($idpedido[0])+1;
	insertarProductoPedido($idpedido[0], $nrolinea, $cantidad, $producto['nombre'], $producto['precio'], $idproducto);
	header("Location:carrito.php");
?>
