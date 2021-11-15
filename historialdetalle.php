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
	
		<link rel="stylesheet" type="text/css" href="css/estilos.css" />
		<link rel="stylesheet" type="text/css" href="css/productos.css" />
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>
	</head>
	<body>
		<header>
			<div class="cbanner">
			</div>
			<?php 
				verMenu();
				verMenuAdmin();
			?>
		</header>
		
		<div class="row row-cols-1 row-cols-md-1 g-4" style="padding:100px;">
			<table id="tabProductos" class="table table-striped">
				<thead>
					<tr>
						<th scope="col">Linea</th>
						<th scope="col">Detalle</th>
						<th scope="col">Cantidad</th>
						<th scope="col" style="text-align:right;">Precio Uni</th>
						<th scope="col" style="text-align:right;">Total</th>
					</tr>
				</thead>
				<tbody>
				<?php 
					$lista=getVentaDetalle($idventa);
					for($i=0; $i<count($lista); $i++)
					{
						$c = $lista[$i]['cantidad'];
						$p = $lista[$i]['precio'];
						$t = $c*$p;
						
						$html="<tr><td scope='row'>".$lista[$i]["nrolinea"]."</td>";
						$html=$html."<td>".$lista[$i]['detalle']."</td>";
						$html=$html."<td>$c</td>";
						$html=$html."<td align='right' style='width:200px;'>$ $p</td>";
						$html=$html."<td align='right' style='width:200px;'>$ $t</td>";
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