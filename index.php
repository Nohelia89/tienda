<?php
	include("inc/productosAD.php");	
	
	session_start();
	
	if(isset($_SESSION["login"]))
	{
		if($_SESSION["login"]){
			header("Location: ./principal.php");
			exit();
		}//endif
	}
	
	$idCategoria=0;
	if(isset($_GET["categoria"]))
	{
		$idCategoria = $_GET["categoria"];
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
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	
		<script type="text/javascript">
			function buscarPorCategoria()
			{
				var cmbFil = document.getElementById("comboCategorias");
				var sele = cmbFil.options[cmbFil.selectedIndex].id;
				window.location = "index.php?categoria=" + sele;
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
						<a class="nav-link" aria-current="page" href="index.php">Bienvenido</a>
					  </li>
					  <li class="nav-item">
						<a class="nav-link" href="index.php">Productos</a>
					  </li>
					  <li class="nav-item">
						<a class="nav-link" href="login.html">Ingresar</a>
					  </li>
					  <li class="nav-item">
						<a class="nav-link" href="registro.html">Registrarse</a>
					  </li>
					  <!-- esto va solo si estas logueado
					  <li class="nav-item">
						<a class="nav-link" href="#">Carrito</a>
					  </li>
					  <li class="nav-item">
						<a class="nav-link " href="#">Historial de Compras</a>
					  </li>
					  -->
					</ul>
				  </div>
				</div>
			  </nav>
			  <div width="100%" head="300px" style="position:relative; display:block; padding:20px;">
				<span style="margin:10px;">Categoria:</span><span style="margin:10px;"><?php echo comboCategorias($idCategoria); ?></span>
				<input type="button" value="Buscar" onclick="buscarPorCategoria();" />
			  </div>
		</header>
		
		<div class="row row-cols-1 row-cols-md-3 g-4" >
			
			<?php
				$productos = listar($idCategoria, 1);
				
				for($i=0; $i<count($productos); $i++)
				{
					$html = "<div class='col'>
								<div class='card h-100' style='display: table; padding: 20px;'>";
					
					$imagenes = listarImagenes($productos[$i]['id_producto']);
					for($ii=0; $ii<count($imagenes); $ii++)
					{
						$html = $html."<div style='position: relative; float: left;'>";
						$html = $html."<img src='./imagenes/".$imagenes[$ii][0]."' class='img-fluid' style='width: 140px; height: 110px; padding: 5px;' alt='...' />";
						$html = $html."</div>";
					}
					
					$html = $html."<div class='card-body'>
									<h5 class='card-title'>Producto: ".$productos[$i]['nombre']."</h5>
									<p class='card-text'>Precio: ".$productos[$i]['precio']."</p>
									<p class='card-text'>Descripcion: ".$productos[$i]['descripcion']."</p>
									<p class='card-text'>Stock: ".$productos[$i]['stock']."</p>
									<p class='card-text'>Codigo: ".$productos[$i]['id_producto']."</p>
									<input type='button' value='Detallado' onclick='window.location=\"productoDetallado.php?producto=".$productos[$i]['id_producto']."\"'</>
									</div>
									</div>
								</div>";
					echo $html;
				}
			?>
		  </div>

		<footer>

		</footer>


		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
	</body>
</html>