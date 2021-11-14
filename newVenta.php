<?php
	include("inc/ventaAD.php");

	$idpedido = $_GET["pedido"];
	$pedido = getPedido($idpedido);
	
	if(count($pedido)<=0)
	{
		header("Location: pageerror.php?err=elem&pag=carrito.php");
		exit();
	}
	
	insertarVenta($idpedido, $pedido["cabezal"]["total"], $pedido["cabezal"]["usuario"], $pedido["lineas"]);
	
	header("Location: pagemsg.php?msg=ventaok&pag=feedback.php");
?>
