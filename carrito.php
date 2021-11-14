<?php
	include("inc/carritoAD.php");
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
	
	$lista=getCarrito($_SESSION["documento"]);
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
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	
		<script type="text/javascript">
			function pagarPedido(pedido)
			{
				//alert(pedido);
				//return;
				
				var cmbMetodo = document.getElementById("cmbMetodo");
				var metodoPago = cmbMetodo.options[cmbMetodo.selectedIndex].id;
				var metodo="Efectivo";
				if(metodoPago == 1){
					metodo="Tarjeta";	
				}
				window.location = "newVenta.php?pedido="+ pedido + "&metodo=" + metodo;
			}
			
			function sumarRestar(pedido, nrolinea, prod, suma)
			{
				var celda = document.getElementById("td" + nrolinea);
				var cantActual = celda.innerHTML;
				
				cantActual = parseFloat(cantActual);
				if(suma)
					cantActual = cantActual+1;
				else
				{
					if(cantActual-1<=0)
						return;
					
					cantActual = cantActual-1;
				}

				window.location="deleteCarrito.php?action=update&pedido=" + pedido + "&nrolinea=" + nrolinea + "&producto=" + prod + "&cantidad=" + cantActual;
			}
			
			function eliminar(pedido, nrolinea)
			{
				window.location="deleteCarrito.php?action=delete&pedido=" + pedido + "&nrolinea=" + nrolinea;
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
		</header>
		
		<div class="row row-cols-1 row-cols-md-3 g-4" style="padding:100px;">
			<table class="table table-striped">
				<thead>
				  <tr>
					<th scope="col">Linea</th>
					<th scope="col">Articulo</th>
					<th scope="col">Cantidad</th>
					<th scope="col"></th>
					<th scope="col">Precio</th>
					<th scope="col"></th>
				  </tr>
				</thead>
				<tbody>

				<?php 
					$total=0;
					$idpedido=0;
					for($i=0; $i<count($lista); $i++)
					{
						$idpedido=$lista[0]['idpedido'];
						$l = $lista[$i]['nrolinea'];
						$d = $lista[$i]['detalle'];
						$c = $lista[$i]['cantidad'];
						$p = $lista[$i]['precio'];
						$prod = $lista[$i]['idproducto'];
						
						$html="<tr><th scope='row'>$l</th>";
						$html=$html."<td>$d</td>";
						$html=$html."<td id='td$l' width='60'>$c</td>";
						$html=$html."<td><input type='button' value='-' onclick='sumarRestar($idpedido,$l,$prod,false);' /> <input type='button' value='+' onclick='sumarRestar($idpedido,$l,$prod,true);' /></td>";
						$html=$html."<td>$ $p</td>";
						$html=$html."<td><input type='button' value='Eliminar' onclick='eliminar($idpedido, $l);' /></td>";
						$html=$html."</tr>";
						$total=$total+($c * $p);
						echo $html;
					}			
				?>
				</tbody>
			</table>
			<div style="width:100%; display:flex; flex-direction:column;">
				<div style="display:flex; flex-direction:row; justify-content:center; padding:20px;">
					<label class="table-titulo">Total: <?php echo $total; ?></label>
				</div>
				<div style="display:flex; flex-direction:row; justify-content:center;">
					<button button type="button" id="btmPago" class="btn btn-primary" onclick="pagarPedido(<?php echo $idpedido; ?>);" style="margin-left:10px;">
						Pagar Pedido
					</button>
					<select id="cmbMetodo" style="width: 250px; margin-left:10px; padding-top:5px" class="form-select form-select-sm" aria-label=".form-select-sm example">
						<option selected id="1">Pagar con tarjeta</option>
						<option id="0">Pagar en efectivo</option>
					</select>
				</div>
			</div>
		</div>

		<footer>

		</footer>


		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
	</body>
</html>