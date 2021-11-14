<?php
	include("inc/productosAD.php");
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
			function buscarCategoria(id)
			{
				window.location = "index.php?categoria=" + id;
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
		
		<section>
			<div width="100%" head="300px" style="position:relative; display:block; padding:20px;">
			<?php
				$categorias = listarCategorias();

				$html = "<div style='float:left; padding-right: 80px; margin-top:20px;' >";
				for($i=0; $i<count($categorias); $i++) {
					$nombre = $categorias[$i]['nombre'];
					$id = $categorias[$i]['id'];
					$html = $html. "<input type='button' class='btn btn-outline-info' value='$nombre' style = ' font-size:20px;
					font-weight: bold; margin-bottom: 20px; padding:15px; width: 150%; display: block !important; font' onclick='buscarCategoria($id);' />";
				}
				$html = $html. "</div>";
				echo $html;
			?>
			</div>
			<!--
			<nav>
				<ul>
				  <li><input type="button" value="CATEGORIA 1" /></li>
				  <li><input type="button" value="CATEGORIA 2" /></li>
				  <li><input type="button" value="CATEGORIA 3" /></li>
				  <li><input type="button" value="CATEGORIA 4" /></li>
				</ul>
			</nav>
			-->
			<div style="display:table; height:100%; padding-left: 20px; padding-right: 20px;">
				<?php

					$productos = listar($idCategoria, 1);
					
					for($i=0; $i<count($productos); $i++) {
						$html = "<article class='cArticulos'>";
						$html = $html."<div class='card text-center'>";
						//$html = $html."<div class='d-flex flex-row flex-wrap mb-3'>";
						//$html = $html."<div class='card text-center' style='padding: 8px; width: 400px; height: 550px; display: inline-block';>";
						$imagenes = listarImagenes($productos[$i]['id_producto']);
						$nomimg = "";
						if(count($imagenes)>0)
							$nomimg = "./imagenes/".$imagenes[0][0];
						
						$html = $html."<img class='card-img-top' style='margin-left:15px; object-fit: contain; display: table-row; width: 350px; height: 400px'; src='$nomimg' alt='...'>";			
						$html = $html."<div class='card-body'>";
						$html = $html."<h5 class='card-title'>".$productos[$i]['nombre']."</h5>";
						$html = $html."<p class='card-text'> $ ".$productos[$i]['precio']."</p>";
						$html = $html."<input type='button'  class='btn btn-info' value='Detallado' onclick='window.location=\"productoDetallado.php?producto=".$productos[$i]['id_producto']."\"'</>";	
						
						$html = $html."</div>";
						$html = $html."</div>";
						//$html = $html."</div>";
						//$html = $html."</div>";
						$html = $html."</article>";
						echo $html;
					}
				?>
			</div>
		</section>

		<footer>

		</footer>


		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
	</body>
</html>