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
	
	$activo = 1;
	$idCategoria=0;
	if(isset($_GET["categoria"]))
	{
		$idCategoria = $_GET["categoria"];
	}
	if(isset($_GET["act"]))
	{
		$activo = $_GET["act"];
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
		<script type="text/javascript" src="js/productos.js"></script>
	
		<script type="text/javascript">
			function buscarPorCategoria()
			{
				var cmbFil = document.getElementById("comboCategorias");
				var sele = cmbFil.options[cmbFil.selectedIndex].id;
				var activo;
				if(document.getElementById("chkActivo").checked){
					activo = "1";
				}else{
					activo = "0";
				}//endif
				window.location = "productoslista.php?categoria=" + sele + "&act=" + activo;
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
			  <div width="100%" head="300px" style="position:relative; display:block; padding:20px;">
				<span style="margin:10px;">Categoria:</span><span style="margin:10px;"><?php echo comboCategorias($idCategoria); ?></span>
				<input type="button" value="Buscar" onclick="buscarPorCategoria();" />
				<input type="checkbox" id="chkActivo" <?php if($activo=="1") echo "checked='true'"; ?> style="margin-left:80px;" /><span style="margin-left:10px;">Activos</span>
			  </div>
			  <div width="100%" head="300px" style="position:relative; display:block; padding:20px;">
				<input type="button" value="Nuevo producto" onclick="window.location='altaproducto.php';" />
				<input type="button" value="Editar producto" onclick="ModiProducto();" />
			  </div>
		</header>
		
		<div id="divContenido" style="overflow-y:scroll;">
			<span class="table-titulo">Lista de Productos</span>
			<table id="tabProductos">
				<tr id="trHead">
					<td onclick="OrderProducto('codigouser');">Código</td>
					<td onclick="OrderProducto('descripcion');">Nombre</td>
					<td onclick="OrderProducto('origen');">Stock</td>
					<td onclick="OrderProducto('precio');">Precio</td>
					<td onclick="OrderProducto('marca');">Categoria</td>
				</tr>
				<?php
					$rs = listar($idCategoria, $activo);
					for($i=0;$i<count($rs);$i++){
						$str = "";
						$str = "<tr onmouseover='RegOver(true,this)' onmouseout='RegOver(false,this)' onclick='SelectProducto(this);' ondblclick='SelectProducto(this);ModiProducto();'>\n";
						$str.= "\t\t\t\t\t\t<td align='center'>".$rs[$i]['id_producto']."</td>\n";
						$str.= "\t\t\t\t\t\t<td>".$rs[$i]['nombre']."</td>\n";
						$str.= "\t\t\t\t\t\t<td>".$rs[$i]['stock']."</td>\n";
						$str.= "\t\t\t\t\t\t<td align='right'>$"."  ".$rs[$i]['precio']."</td>\n";
						$str.= "\t\t\t\t\t\t<td align='center'>".$rs[$i]['categoria']."</td>\n";
						$str.= "\t\t\t\t\t</tr>\n";
						echo $str;
					}//next
				?>
			</table>
		</div>

		<footer>

		</footer>


		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
	</body>
</html>