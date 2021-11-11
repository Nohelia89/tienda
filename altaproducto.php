<?php
	include("inc/categoriasAD.php");
	
	session_start();
	
	if(isset($_SESSION["login"]))
	{
		if(!$_SESSION["login"]){
			header("Location: ./index.php");
			exit();
		}
		else{
			if(!$_SESSION["esadmin"]){
				header("Location: ./principal.php");
				exit();
			}
		}
	}
	else
	{
		header("Location: ./index.php");
		exit();
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
		<meta name="whiteline" content="White Line" />

		<link rel="stylesheet" type="text/css" href="css/estilos.css" />
		<link rel="stylesheet" type="text/css" href="css/productos.css" />
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<!--
		refresh automatico ->
		<meta http-equiv="refresh" content="3; URL=index.php" />
		-->
		<title>White Line</title>
		
		<style > 
    
			.card-container{
				display: flex;
				max-width: 500px;
				border: 1px solid #111;
				margin:auto;
				margin-top: 100px;
				margin-bottom: 100px;
				color: black;
			}
			.form-group{
				margin: 5px 20px;
			}
		</style>
    </head>
		
    <body style="background-color: #fff;" >

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
						<a class="nav-link" href="principal.php">Productos</a>
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
				<div width="100%" head="300px" style="position:relative; display:block; padding:20px;">
					<nav class="navbar navbar-expand-lg navbar-light bg-light">
						<div class="container-fluid">
						  <a class="navbar-brand" href="#"></a>
						  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						  </button>
						  <div class="collapse navbar-collapse" id="navbarNav">
							<ul class="navbar-nav">
							  <li class="nav-item">
								<a class="nav-link" href="">Administración:</a>
							  </li>
							  <li class="nav-item">
								<a class="nav-link" href="productoslista.php">Listado de Productos</a>
							  </li>
							</ul>
						  </div>
						</div>
				  </nav>
			  </div>
		</header>

        <section>
            <div class="container">
                <div class="card card-container" style="padding:30px;">
                    <form class="form-horizontal" action="newproduct.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="control-label col-sm-12" for="txtId">Id:</label>
                            <div class="col-sm-12">
                                <input type="number" class="form-control" id="txtId" name="txtId" placeholder="Ingresar Id">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-12" for="pwd">Nombre:</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="txtNom" name="txtNom" placeholder="Ingresar nombre">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-12" for="txtDescripcion">Descripcion:</label>
                            <div class="col-sm-12">
                            <input type="text" class="form-control" id="txtDescripcion" name="txtDescripcion" placeholder="Ingresar descripcion">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-12" for="txtPrecio">Precio:</label>
                            <div class="col-sm-12">
                                <input type="number" class="form-control" id="txtPrecio" name="txtPrecio" placeholder="Ingresar Precio">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-12" for="txtStock">Stock:</label>
                            <div class="col-sm-12">
                                <input type="number" class="form-control" id="txtStock" name="txtStock" placeholder="Ingresar Stock">
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-sm-12" for="txtStock">Categoria:</label>
                            <div class="col-sm-12">
								<?php echo comboCategorias(0); ?>
                            </div>
                        </div>
						<div class="mb-3">
							<label for="formFileMultiple" class="form-label">Imagenes:</label>
							<input class="form-control" type="file" id="formFileMultiple" name="img[]" multiple>
						</div>
                        
                        

                        <div class="form-group" style="margin-left: 20px; margin-top: 10px; margin-bottom: 20px;">
                            <div class="col-sm-6">
                                <button type="submit" id="btmProducto" class="btn btn-primary">Guardar</button>
                            </div>
                        </div>
                    </form> 
                </div>
            </div>
		</section>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    </body>
</html>