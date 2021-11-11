<?php

	include("inc/carritoAD.php");



	$idpedido=$_GET['pedido'];
	$nrolinea=$_GET['nrolinea'];
	
	eliminarProductoPedido($idpedido, $nrolinea);
	header("Location:carrito.php");
	
	
	

	
?>
