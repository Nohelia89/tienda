<?php

	include("inc/ventaAD.php");

	session_start();

	$idUsuario=$_SESSION["documento"];

	insertVenta($idUsuario)
	

	$idpedido=getPedidoActual($idUsuario);
	$pedido=$idpedido["id_pedido"]
	
	insertVenta($idUsuario)
	


	$nrolinea = cantLineasPedido($idpedido[0])+1;
	insertarProductoPedido($idpedido[0], $nrolinea, $cantidad, $producto['nombre'], $producto['precio'], $idproducto);
	header("Location:carrito.php");
?>
