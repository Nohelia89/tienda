<?php

	include("inc/carritoAD.php");



	$cantidad=$_POST['txtCantidad'];
	$idproducto=$_POST['txtIdProducto'];
	$idUsuario=$_SESSION["documento"];


	$producto = getProducto($idproducto);
	if ($producto["stock"]<$cantidad)
	{
		header("Location: pageerror.php?err=stock&pag=productodetalle.php");
		exit();
	}
	

	$idpedido=getPedidoActual($idUsuario);
	$nrolinea = cantLineasPedido($idpedido)+1;
	insertarProductoPedido($idpedido, $nrolinea, $cantidad, $producto['nombre'], $producto['precio'], $idproducto)
	header("Location:index.php");
?>
