<?php
	include("inc/usuariosAD.php");
	
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
	
	

	
	$usuario = getUsuario($_SESSION["documento"]);
	

	
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<meta name="whiteline" content="White Line" />
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>White Line</title>

		<link rel="stylesheet" type="text/css" href="css/estilos.css" />
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
	</head>
	<body style="background-image: url('imagenes/login.jpg'); background-size: cover;">
		<header>
			<div class="cbaner">
			</div>
			<nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-bottom: 5%;">
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
						<a class="nav-link" href="index.html">Productos</a>
					  </li>
					</ul>
				  </div>
				</div>
			  </nav>
			</div>
		</header>
		
        <section>
            <div class="container">
                <div class="card card-container">
                    <form class="form-horizontal" action="updateuser.php" method="POST">
						<div class="form-group">
					
							<div class="col-sm-12">
                                <input class="form-control" type="text" hidden id="inpId" class="cTextBox" name="txtId" maxlength="30" value="<?php echo $usuario["documento"]; ?>"> 
							</div>

						<div class="form-group">
                            <label class="control-label col-sm-12" for="inpPass">Password:</label>
                            <div class="col-sm-12">
                                <input class="form-control" id="inpPass"  name="txtPass" maxlength="10" type="password" placeholder="Ingresar Password" value="<?php echo $usuario["password"]; ?>">
                            </div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-12" for="inpNom">Nombre:</label>
							<div class="col-sm-12">
                                <input class="form-control" type="text" id="inpNom" class="cTextBox" name="txtNom" maxlength="30" placeholder="Ingresar Nombre" value="<?php echo $usuario["nombre"]; ?>"> 
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-12" for="inpApe">Apellido:</label>
							<div class="col-sm-12">
                                <input class="form-control" type="text" id="inpApe" class="cTextBox" name="txtApe" maxlength="30" placeholder="Ingresar Apellido" value="<?php echo $usuario["apellido"]; ?>">
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-sm-12" for="inpDir">Dirección:</label>
							<div class="col-sm-12">
                                <input class="form-control" type="text" id="inpDir" class="cTextBox" name="txtDir" maxlength="20" placeholder="Ingresar Dirección" value="<?php echo $usuario["direccion"]; ?>">
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-sm-12" for="inpMail">Mail:</label>
							<div class="col-sm-12">
                                <input class="form-control" type="text" id="inpMail" class="cTextBox" name="txtMail" maxlength="40" placeholder="Ingresar Mail" value="<?php echo $usuario["email"]; ?>">
							</div>
						</div>

						<div class="form-group" style="margin-left: 20px; margin-top: 10px; margin-bottom: 20px;">
							<div class="col-sm-6">
								<input type="submit"  class="btn btn-info" id="btnAceptar" value="Modificar"/>
								<input type="button"  class="btn btn-info" id="btnCancelar" value="Cancelar" onclick = "window.location='index.php'"/>
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