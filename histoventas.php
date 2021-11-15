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
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>
	
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
			<div class="cbanner">
			</div>
			<?php
				verMenu();
				verMenuAdmin();
			?>
			  <div width="100%" head="300px" style="position:relative; display:block; padding:20px;">
				<span class="table-titulo" style="margin:10px; font-family: Exo, sans-serif;
								font-size: 17px; font-weight: Bold;">Fecha desde:</span>
				<input id="txtFechadesde" type="date" value="<?php echo $fd; ?>" style="margin:10px;" />
				<span class="table-titulo" style="margin:10px; font-family: Exo, sans-serif;
								font-size: 17px; font-weight: Bold;">hasta:</span>
				<input id="txtFechahasta" type="date" value="<?php echo $fh; ?>" style="margin:10px;" />
				<input class="btn btn-info" type="button" value="Buscar" onclick="verVentas()" />
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
			<span class="table-titulo" style="margin:10px; font-family: Exo, sans-serif;
								font-size: 17px; font-weight: Bold;">TOTAL ENTRE FECHAS: $ <?php echo $global; ?></span>
		</div>
		

		<footer>

		</footer>


		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
	</body>
</html>