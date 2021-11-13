<?php
	include("inc/carritoAD.php");	
	
	session_start();
	
	if(isset($_SESSION["login"]))
	{
		if(!$_SESSION["login"]){
			header("Location: ./index.php");
			exit();
		}//endif
	}
	else
	{
		header("Location: ./index.php");
		exit();
	}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
		<meta name="whiteline" content="White Line" />
		<!--
		refresh automatico ->
		<meta http-equiv="refresh" content="3; URL=index.php" />
		-->
		<title>Carrito</title>
	
	
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<script type="text/javascript">
			function pagarPedido(pedido)
			{
				var cmbMetodo = document.getElementById("cmbMetodo");
				var metodoPago = cmbMetodo.options[cmbMetodo.selectedIndex].id;
				if(metodoPago == 1){
					var metodo="Tarjeta";	
				}else{
					var metodo="Efectivo";
				}
				window.location = "newVenta.php?pedido="+ pedido + "&metodo=" + metodo;
			}
		</script>
	</head>
	<body>
		<header>
			

			<nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-bottom: 5%;">
				<div class="container-fluid">
				  <a class="navbar-brand" href="#"></a>
				  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				  </button>
				  <div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav">
					  <li class="nav-item">
						<a class="nav-link disabled" aria-current="page" href="#">Bienvenido Facundo</a>
					  </li>
					  <li class="nav-item">
						<a class="nav-link" href="index.html">Productos</a>
					  </li>
					  <li class="nav-item">
						<a class="nav-link" href="#">Carrito</a>
					  </li>
					  <li class="nav-item">
						<a class="nav-link " href="#">Historial de Compras</a>
					  </li>
					</ul>
				  </div>
				</div>
			  </nav>
				
			</div>
		</header>

		<table class="table table-striped">
			<thead>
			  <tr>
			  	<th scope="col">Linea</th>
				<th scope="col">Articulo</th>
				<th scope="col">Cantidad</th>
				<th scope="col">Precio</th>
				<th scope="col"></th>
			  </tr>
			</thead>
			<tbody>

			<?php 
			
			$lista=getCarrito($_SESSION["documento"]);
			$total=0;
			$idPedido=0;
			for($i=0; $i<count($lista); $i++)
			{
			$idPedido=$lista[0]['idpedido'];
			$html="<tr><th scope='row'>".$lista[$i]["nrolinea"]."</th>";
			$html=$html."<td>".$lista[$i]['detalle']."</td>";
			$html=$html."<td>".$lista[$i]['cantidad']."</td>";
			$html=$html."<td>".$lista[$i]['precio']."</td>";
	
			$html=$html."<td><input type='button' value='eliminar' onclick='window.location=\"deleteCarrito.php?pedido=".$lista[$i]['idpedido']."&nrolinea=".$lista[$i]['nrolinea']."\"' /></td>";
			$html=$html."</tr>";
			$total=$total+($lista[$i]['cantidad']*$lista[$i]['precio']);
			echo $html;
		}

			
			?>
			
			</tbody>
		  </table>
	
		  <span class="nav-link" aria-current="page" >Total: <?php echo $total; ?></span>
		  <br>
		  
		<span>

		<div style="display:flex; flex-direction:row">
			<button button type="button" id="btmPago" class="btn btn-primary" onclick="pagarPedido(<?php echo $idPedido; ?>);"
			style="margin-left:10px;">Pagar Pedido</button>

			<select id="cmbMetodo" style="width: 250px; margin-left:10px; padding-top:5px" class="form-select form-select-sm" aria-label=".form-select-sm example">
				<option selected id="1">Pagar con tarjeta</option>
				<option id="0">Pagar en efectivo</option>
			</select>
		</div>
		  
		<footer>

		</footer>


		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
	</body>
</html>