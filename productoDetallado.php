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
	
	
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	
	
		<script type="text/javascript">
            function EnviarCarrito(prod){
               
			   var c=document.getElementById("txtCantidad").value;
			
                window.location = "newCarrito.php?cantidad="+c+"&producto="+prod;
              
            }
		</script>


		<style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
	  .imagen{
  margin: 5rem 0; /* Space out the Bootstrap <hr> more */
  left: 65%;
 margin-top: -30.5%;
  position:absolute;
  padding-right: 2%;
  
  
}
     /* MARKETING CONTENT
-------------------------------------------------- */

/* Center align the text within the three columns below the carousel */
.marketing .col-lg-4 {
  margin-bottom: 1.5rem;
  text-align: center;
}
.marketing h2 {
  font-weight: 400;
}
/* rtl:begin:ignore */
.marketing .col-lg-4 p {
  margin-right: .75rem;
  margin-left: .75rem;
}
/* rtl:end:ignore */


    </style>
	
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

    <tbody>
			<?php 


	$html = "";
    for($i=0; $i<count($imagenes); $i++)
{
    $html = $html."<img  src='./imagenes/".$imagenes[$i][0]."' />";
	
}

    $html = $html."<h2> ".$producto['nombre']."</h2>";
    $html = $html."<h2> ".$producto['descripcion']."</h2>";
	$html = $html." <h4> Cantidad: </h4> <input class='form-control' type='number' id='txtCantidad' name='txtCantidad' maxlength='30' value='1' /> ";


	$html = $html. "<input type='button' value='Agregar al Carrito' onclick='EnviarCarrito(".$producto['id_producto'].")' /> ";

	echo $html;
 ?>
			</tbody>
	

		<footer>

		</footer>


		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
	</body>
</html>