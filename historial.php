<?php
	include("inc/historialAD.php");
	include("menuadmin.php");
	
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
	
	$lista=getHistorialVenta($_SESSION["documento"]);
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
	
		<link rel="stylesheet" type="text/css" href="css/estilos.css" />
		<link rel="stylesheet" type="text/css" href="css/productos.css" />
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	
		<script type="text/javascript" src="js/position.js"></script>
		<script type="text/javascript" src="js/efectos.js"></script>
		<script type="text/javascript" src="js/productos.js"></script>
		
		<script type="text/javascript">
			function verDetalle(venta)
			{
				window.location = "historialdetalle.php?venta=" + venta;
			}
		</script>
	
	</head>
	<body>
		<header>
			<div class="cbaner">
			</div>
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<div class="container-fluid">
				  <a class="navbar-brand" href="#"></a>
				  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				  </button>
				  <div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav">
					  <li class="nav-item">
						<a class="nav-link" aria-current="page" href="index.php">Bienvenido <?php echo $_SESSION["usuario"]; ?></a>
					  </li>
					  <li class="nav-item">
						<a class="nav-link" href="index.php">Productos</a>
					  </li>
					  <li class="nav-item">
						<a class="nav-link" href="">Perfil</a>
					  </li>
					  <li class="nav-item">
						<a class="nav-link" href="carrito.php">Mi Carrito</a>
					  </li>
					  <li class="nav-item">
						<a class="nav-link" href="historial.php">Mis Compras</a>
					  </li>
					  <li class="nav-item">
						<a class="nav-link" href="cerrarsesion.php">Cerrar Sesion</a>
					  </li>
					</ul>
				  </div>
				</div>
			  </nav>
				<?php verMenuAdmin(); ?>
		</header>
		
		<div class="row row-cols-1 row-cols-md-3 g-4" style="padding:100px;">
			<table id="tabProductos" class="table table-striped">
				<thead>
				  <tr>
					<th scope="col">Fecha</th>
					<th scope="col">Numero de venta</th>
					<th scope="col">Total</th>				
				  </tr>
				</thead>
				<tbody>
				<?php 	
					for($i=0; $i<count($lista); $i++)
					{
						$id = $lista[$i]['id'];
						
						$html="<tr onmouseover='RegOver(true,this);' onmouseout='RegOver(false,this);' onclick='verDetalle($id);'>\n";
						$html=$html."<th scope='row'>".$lista[$i]["fechahora"]."</th>";
						$html=$html."<td>".$lista[$i]['id']."</td>";
						$html=$html."<td align='right'>$ ".$lista[$i]['total']."</td>";
						$html=$html."</tr>";
						echo $html;
					}				
				?>
				</tbody>
			</table>
		</div>
		<footer>
		</footer>
		
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
	</body>
</html>