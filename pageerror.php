<?php
	
	$pag = $_GET['pag'];
	$err = $_GET['err'];
	
	switch($err){
		case "userex":
			$msg = "El nombre de usuario ya existe.";
			break;
		case "prodex":
			$msg = "El código de producto ingresado ya existe.";
			break;
		case "prodnot":
			$msg = "El código de producto no fue encontrado.";
			break;
		case "usercar":
			$msg = "El nombre de usuario contiene caracteres no permitidos.";
			break;
		case "passcar":
			$msg = "La contraseña contiene caracteres no permitidos.";
			break;
		case "userok":
			$msg = "Su cuenta ha sido creada correctamente.";
			break;
		case "usererr":
			$msg = "Se producido un error al crear la cuenta.";
			break;
		case "errins":
			$msg = "Se producido un al ingrsar los datos en el servidor.";
			break;
		case "erruser":
			$msg = "El usuario o la contraseña no es correcta.";
			break;
	}//end case
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
		<title>Error</title>
		<!--
		invoca archivo css -->
		<link rel="stylesheet" type="text/css" href="css/estilos.css" />
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<!-- invoca script -->
		
		<script type="text/javascript">
			var pag;
			function init(p){
				pag = p;
				setTimeout("Redirec()",3000);
			}//end
			
			function Redirec(){
				window.location = pag;
			}//end
		</script>
		<style>
			.cSp{
				font-family:arial;
				font-size:12pt;
				color:#FFFFFF;
			}
		</style>
	</head>
	<body onload="init('<?php echo $pag; ?>')">
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
					</ul>
				  </div>
				</div>
			  </nav>
		</header>
		
		<div style="margin-top:50px; background-color:#444444; text-align:center; padding:20px;">
				<span class="cSp"><?php echo $msg; ?></span><br />
				<span class="cSp">Redireccionando...</span>
		</div>
		
		<footer>

		</footer>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
	</body>
</html>