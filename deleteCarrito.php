<?php
	include("inc/carritoAD.php");
	
	if(isset($_GET["action"]))
	{
		if($_GET["action"]=="delete")
		{
			eliminar();
		}
		else if($_GET["action"]=="update")
		{
			actualizar();
		}
	}

	function eliminar()
	{
		$idpedido=$_GET["pedido"];
		$nrolinea=$_GET["nrolinea"];
				
		eliminarProductoPedido($idpedido, $nrolinea);
		calcularTotal($idpedido);
		header("Location:carrito.php");
	}
	
	function actualizar()
	{
		$idpedido=$_GET["pedido"];
		$nrolinea=$_GET["nrolinea"];
		$cant = $_GET["cantidad"];
		$idprod = $_GET["producto"];
		
		$producto = getProducto($idprod);
		if ($producto["stock"]<$cant)
		{
			header("Location: pageerror.php?err=stock&pag=carrito.php");
			exit();
		}
		
		actualizarCantidad($idpedido, $nrolinea, $cant);
		calcularTotal($idpedido);
		header("Location:carrito.php");
	}
?>
