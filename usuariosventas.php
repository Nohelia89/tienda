<?php
	include("inc/usuariosAD.php");
	include("menuadmin.php");
	
	session_start();
	validarAdmin();
	
	if(!isset($_GET["userid"]))
	{
		header("Location: ./usuarioslista.php");
		exit();
	}
	
	$usuario = $_GET["userid"];
	$nombre = "";
	if(isset($_GET["username"]))
	{
		$nombre = $_GET["username"];
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
		<link rel="stylesheet" type="text/css" href="css/productos.css" />
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	
		<script type="text/javascript" src="js/position.js"></script>
		<script type="text/javascript" src="js/efectos.js"></script>
		<script type="text/javascript" src="js/usuarios.js"></script>
	
		<script type="text/javascript">
			
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
						<a class="nav-link" aria-current="page" href="index.php">Bienvenido <?php echo $_SESSION["usuario"]; ?></a>
					  </li>
					  <li class="nav-item">
						<a class="nav-link" href="index.php">Productos</a>
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
			  <?php verMenuAdmin(); ?>
		</header>
		
		<div id="divContenido" style="overflow-y:scroll;">
			<span class="table-titulo">Ventas realizadas a <?php echo $nombre; ?> </span>
			<table id="tabProductos">
				<tr id="trHead">
					<td>Fecha</td>
					<td>Nro</td>
					<td>Total</td>
				</tr>
				<?php
					$rs = listarVentas($usuario);
					$global = 0;
					for($i=0;$i<count($rs);$i++){
						$f = $rs[$i]["fechahora"];
						$id = $rs[$i]["id"];
						$t = $rs[$i]["total"];
						$global = $global + $t;
						$str = "";
						$str = "<tr onmouseover='RegOver(true,this)' onmouseout='RegOver(false,this)' onclick='Seleccionar(this);' ondblclick='Seleccionar(this);'>\n";
						$str.= "\t\t\t\t\t\t<td align='center'>$f</td>\n";
						$str.= "\t\t\t\t\t\t<td>$id</td>\n";
						$str.= "\t\t\t\t\t\t<td>$ $t</td>\n";
						$str.= "\t\t\t\t\t</tr>\n";
						echo $str;
					}//next
					echo "<tr><td></td><td></td><td style='font-size:16px;'>Total: $ $global</td></tr>";
				?>
			</table>
		</div>

		<footer>

		</footer>


		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
	</body>
</html>