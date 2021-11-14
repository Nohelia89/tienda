<?php
	include("inc/productosAD.php");	
	
	session_start();
	$idproducto=$_GET['producto'];
	$resultado = getProducto($idproducto);
	
    if($resultado==null)
    {
        header("Location: ./pageerror.php?err=prodnot&pag=productoslista.php");
        exit();
    }
    $producto = $resultado["producto"];
    $imagenes = $resultado["imagenes"];

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
	
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		<script type="text/javascript">
            function EnviarCarrito(prod){
               
			   var c=document.getElementById("txtCantidad").value;
			
                window.location = "newCarrito.php?cantidad="+c+"&producto="+prod;
              
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
p{
	color: #;
	font-family: 'Exo', sans-serif;
	font-size: 15px;
	font-weight: Bold;
}


.carousel-control-prev-icon {
    background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23000' viewBox='0 0 8 8'%3E%3Cpath d='M5.25 0l-4 4 4 4 1.5-1.5-2.5-2.5 2.5-2.5-1.5-1.5z'/%3E%3C/svg%3E");
}

.carousel-control-next-icon {
    background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23000' viewBox='0 0 8 8'%3E%3Cpath d='M2.75 0l-1.5 1.5 2.5 2.5-2.5 2.5 1.5 1.5 4-4-4-4z'/%3E%3C/svg%3E");
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
				
			</div>
		</header>

    <tbody>
			<?php 


	$html = "";
	$html = $html. "<div class ='padre'>";

	$html = $html. "<div class = 'hijo1'>";
	$html = $html. "<div id='carouselExampleControls' class='carousel slide' data-ride='carousel'>";
	$html = $html. "<div class='carousel-inner'>";
    $html = $html. "<div class='carousel-item active'>";
    $html = $html. "<img class='d-block w-100' src='./imagenes/".$imagenes[0][0]."' alt='...'>";
    $html = $html. "</div>";

	for($i=1; $i<count($imagenes); $i++)
	{
		$html = $html. "<div class='carousel-item'>";
		$html = $html. "<img class='d-block w-100' src='./imagenes/".$imagenes[$i][0]."' alt='...'>";
		$html = $html. "</div>";
	}

  $html = $html. "</div>";
  $html = $html. "<a class='carousel-control-prev' href='#carouselExampleControls' role='button'  data-slide='prev'>";
  $html = $html. "<span class='carousel-control-prev-icon' aria-hidden='true'></span>";
  $html = $html. "<span class='sr-only'>Previous</span>";
  $html = $html. "</a>";
  $html = $html. "<a class='carousel-control-next' href='#carouselExampleControls' role='button' data-slide='next'>";
  $html = $html. "<span class='carousel-control-next-icon' aria-hidden='true'></span>";
  $html = $html. "<span class='sr-only'>Next</span>";
  $html = $html. "</a>";
  $html = $html."</div>";
  $html = $html. "</div>";

  $html = $html. "<div class = 'hijo2'>";
    $html = $html."<h4> ".$producto['nombre']."</h4>";
	$html = $html."<br> ";
    $html = $html."<p> Descripcion: ".$producto['descripcion']."</p>";
	$html = $html."<p> Cantidad en Stock: ".$producto['stock']."</p>";
	$html = $html."<p> Precio: $".$producto['precio']."</p>";

	$html = $html." <p> Cantidad: </p> <input class='form-control' type='number' id='txtCantidad' name='txtCantidad' maxlength='30' value='1' style= 'width:80px;' /> ";

	$html = $html."<br> ";
	$html = $html. "<input type='button' class='btn btn-info' value='Agregar al Carrito' onclick='EnviarCarrito(".$producto['id_producto'].")' /> ";
	$html = $html. "</div>";
	$html = $html. "</div>";
	echo $html;
 ?>
			</tbody>
	

		<footer>

		</footer>

		
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
	</body>
</html>