<?php
	include("inc/ventaAD.php");
	include("menuadmin.php");
	
	session_start();
	
	validarAdmin();
	
	$fd = date("Y-m-d");
	$fh = date("Y-m-d");
	
	if(isset($_GET["fd"]))
	{
		$fd = $_GET["fd"];
		$fh = $_GET["fh"];
	}
	
	$ventas = listarPorFecha($fd, $fh);
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
		<script type="text/javascript" src="js/ventas.js"></script>
	
		<script type="text/javascript">
			function verVentas()
			{
				var fdesde = document.getElementById("txtFechadesde").value;
				var fhasta = document.getElementById("txtFechahasta").value;
				window.location = "histoventas.php?fd=" + fdesde + "&fh=" + fhasta;
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
						<a class="nav-link" href="">Mi Carrito</a>
					  </li>
					  <li class="nav-item">
						<a class="nav-link" href="">Mis Compras</a>
					  </li>
					  <li class="nav-item">
						<a class="nav-link" href="cerrarsesion.php">Cerrar Sesion</a>
					  </li>
					</ul>
				  </div>
				</div>
			  </nav>
			  <?php verMenuAdmin(); ?>
			  <div width="100%" head="300px" style="position:relative; display:block; padding:20px;">
				<span style="margin:10px;">Fecha desde:</span>
				<input id="txtFechadesde" type="date" value="<?php echo $fd; ?>" style="margin:10px;" />
				<span style="margin:10px;">hasta:</span>
				<input id="txtFechahasta" type="date" value="<?php echo $fh; ?>" style="margin:10px;" />
				<input type="button" value="Buscar" onclick="verVentas()" />
			  </div>
		</header>
		
		<div id="divContenido" style="overflow-y:scroll;">
			<span class="table-titulo">Historico de Ventas</span>
			<table id="tabProductos">
				<tr id="trHead">
					<td>Fecha</td>
					<td>Nro</td>
					<td>Documento</td>
					<td>Nombre</td>
					<td>Total</td>
				</tr>
				<?php
					$global = 0;
					
					for($i=0;$i<count($ventas);$i++){
						$f = $ventas[$i]["fechahora"];
						$n = $ventas[$i]["id"];
						$t = $ventas[$i]["total"];
						$doc = $ventas[$i]["usuario"];
						$nom = $ventas[$i]["nombre"];
						$global = $global + $t;
						
						$str = "";
						$str = "<tr onmouseover='RegOver(true,this)' onmouseout='RegOver(false,this)' onclick='Seleccionar(this);' ondblclick='Seleccionar(this);'>\n";
						$str.= "\t\t\t\t\t\t<td align='center'>$f</td>\n";
						$str.= "\t\t\t\t\t\t<td>$n</td>\n";
						$str.= "\t\t\t\t\t\t<td>$doc</td>\n";
						$str.= "\t\t\t\t\t\t<td>$nom</td>\n";
						$str.= "\t\t\t\t\t\t<td align='right'>$ $t</td>\n";
						$str.= "\t\t\t\t\t</tr>\n";
						echo $str;
					}//next
				?>
			</table>
			<br />
			<br />
			<span class="table-titulo">TOTAL ENTRE FECHAS: $ <?php echo $global; ?></span>
		</div>
		

		<footer>

		</footer>


		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
	</body>
</html>