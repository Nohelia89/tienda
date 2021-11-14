<?php
	include("inc/usuariosAD.php");
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
            <div class="container" style="margin-top: 100px; box-shadow: 2px 2px 5px #999; width:500px; font-weight:bold; font-size:17px">
                <div class="card card-container" >
                    <form class="form-horizontal" style="margin-top: 50px;" action="updateuser.php" method="POST">
						<div class="form-group" >
					
							<div class="col-sm-12"  >
                                <input class="form-control" type="text" style="width:250px" hidden id="inpId" class="cTextBox" name="txtId" maxlength="30" value="<?php echo $usuario["documento"]; ?>"> 
							</div>

						
						<div class="form-group" style="display:flex; flex-direction:row; justify-content:center;">
							<label class="control-label col-sm-12" for="inpNom">Nombre:</label>
							
							<div class="col-sm-12">
                                <input class="form-control" type="text" id="inpNom" class="cTextBox" name="txtNom" maxlength="30" placeholder="Ingresar Nombre" value="<?php echo $usuario["nombre"]; ?>"> 
							</div>
							<br></br>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-12" for="inpApe">Apellido:</label>
							<br>
							<div class="col-sm-12">
                                <input class="form-control" type="text" id="inpApe" class="cTextBox" name="txtApe" maxlength="30" placeholder="Ingresar Apellido" value="<?php echo $usuario["apellido"]; ?>">
							</div>
							<br></br>
						</div>
						<div class="form-group">
                            <label class="control-label col-sm-12" for="inpPass">Password:</label>
							
                            <div class="col-sm-12">
                                <input class="form-control" id="inpPass"  name="txtPass" maxlength="10" type="password" placeholder="Ingresar Password" value="<?php echo $usuario["password"]; ?>">
                            </div>
							<br></br>
						</div>
						

						<div class="form-group">
							<label class="control-label col-sm-12" for="inpDir">Dirección:</label>
							<br>
							<div class="col-sm-12">
                                <input class="form-control" type="text" id="inpDir" class="cTextBox" name="txtDir" maxlength="20" placeholder="Ingresar Dirección" value="<?php echo $usuario["direccion"]; ?>">
							</div>
							<br></br>
						</div>

						<div class="form-group">
							<label class="control-label col-sm-12" for="inpMail">Mail:</label>
							<br>
							<div class="col-sm-12">
                                <input class="form-control" type="text" id="inpMail" class="cTextBox" name="txtMail" maxlength="40" placeholder="Ingresar Mail" value="<?php echo $usuario["email"]; ?>">
							</div>
							<br></br>
						</div>

						<div class="form-group" style="margin-left: 120px; margin-top: 10px; margin-bottom: 20px;">
							<div >
								<input type="submit"  class="btn btn-info" id="btnAceptar" value="Modificar"/>
								<input type="button" style="margin-left: 40px" class="btn btn-info" id="btnCancelar" value="Cancelar" onclick = "window.location='index.php'"/>
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