<?php
	include("inc/historialAD.php");
	
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
	$idventa=0;
	if (isset($_GET["venta"]))
	{
		$idventa=$_GET["venta"];
	}
	else {
		header("Location: ./historial.php");
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
		<title>Index</title>
	
	
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
				<th scope="col">Detalle</th>
				<th scope="col">Cantidad</th>
				<th scope="col">Precio</th>
				
			  </tr>
			</thead>
			<tbody>
			<?php 
			
			$lista=getVentaDetalle($idventa);
		
			for($i=0; $i<count($lista); $i++)
			{

			$html="<tr><th scope='row'>".$lista[$i]["nrolinea"]."</th>";
			$html=$html."<td>".$lista[$i]['detalle']."</td>";
			$html=$html."<td>".$lista[$i]['cantidad']."</td>";
			$html=$html."<td>".$lista[$i]['precio']."</td>";
			$html=$html."</tr>";
			
			echo $html;
		}
			
			?>
			</tbody>
		  </table>

		<footer>

		</footer>


		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
	</body>
</html>