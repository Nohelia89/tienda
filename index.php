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
	
	$idCategoria=1;
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
			function buscarCategoria(id)
			{
				window.location = "index.php?categoria=" + id;
			}
		</script>

		<style>
 
 			@import url(https://fonts.googleapis.com/css?family=Exo:100,200,400);
 			@import url(https://fonts.googleapis.com/css?family=Source+Sans+Pro:700,400,300);

			 .nav-link{
				color: #;
				font-family: 'Exo', sans-serif;
				font-size: 17px;
				font-weight: Bold;
			}

			

 		</style>

	</head>
	<body>
	<header>
			<div class="cbanner">
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
						<a class="nav-link" aria-current="page" style="font-weight: bold; font-" href="index.php">Inicio</a>
					  </li>


					  </li>
					  <li class="nav-item">
						<a class="nav-link" href="login.html" style="padding-left: 1600%">Ingresar</a>
					  </li>
					  <li class="nav-item">
						<a class="nav-link" href="registro.html" style="padding-left: 1250%">Registrarse</a>
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

			  <div width="100%" head="300px" style="position:relative; display:block; padding:20px;">
			  <?php

			  $categorias = listarCategorias();

			  $html = "<div style='float:left; padding-right: 80px; margin-top:20px;' >";
			  for($i=0; $i<count($categorias); $i++) {
					$nombre = $categorias[$i]['nombre'];
				  	$id = $categorias[$i]['id'];
					$html = $html. "<input type='button' class='btn btn-outline-info' value='$nombre' style = ' font-size:20px;
					font-weight: bold; margin-bottom: 40px; padding:15px; width: 150%; display: block !important; font' onclick='buscarCategoria($id);' />";

				}
				$html = $html. "</div>";
				echo $html;

				
			?>
			</div>
			
		</header>
		
		<div class="row" style="padding-left: 40px float:left;  ">
			
		<?php

				$productos = listar($idCategoria, 1);
				
				for($i=0; $i<count($productos); $i++) {
					$html = "<div class='col-md-4 col-sm-4 mb-4' >";
					$html = $html."<div class='card text-center' style='padding: 8px; width: 400px; height: 550px; display: inline-block';>";
					$imagenes = listarImagenes($productos[$i]['id_producto']);
					$html = $html."<img class='card-img-top' style='margin-left: 15px; object-fit: contain; display: table-row; width: 350px; height: 400px'; src='./imagenes/".$imagenes[0][0]."' alt='...'>";
		
					$html = $html."<div class='card-body'>";
					$html = $html."<h5 class='card-title'>".$productos[$i]['nombre']."</h5>";
					$html = $html."<p class='card-text'> $ ".$productos[$i]['precio']."</p>";
					$html = $html."<input type='button'  class='btn btn-info' value='Detallado' onclick='window.location=\"productoDetallado.php?producto=".$productos[$i]['id_producto']."\"'</>";	
					
					$html = $html."</div>";

					$html = $html."</div>";
					$html = $html."</div>";
				
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