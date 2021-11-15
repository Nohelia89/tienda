<?php
	include("inc/categoriasAD.php");
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
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>
	
		<script type="text/javascript" src="js/position.js"></script>
		<script type="text/javascript" src="js/efectos.js"></script>
		<script type="text/javascript" src="js/categorias.js"></script>
	
		<script type="text/javascript">
		
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
			  <div width="100%" head="300px" style="position:relative; display:block; padding:20px;">
				<input type="button" class="btn btn-info" value="Nueva Categoria" onclick="window.location='altacategoria.php';" />
				<input type="button" class="btn btn-info" value="Editar Categoria" onclick="ModiCategoria();" />
			  </div>
		</header>
		
		<div id="divContenido" style="overflow-y:scroll;">
			<span class="table-titulo">Categorias</span>
			<table id="tabProductos">
				<tr id="trHead">
					<td>ID</td>
					<td>NOMBRE</td>
				</tr>
				<?php
					$rs = listar();
					for($i=0;$i<count($rs);$i++){
						$str = "";
						$str = "<tr onmouseover='RegOver(true,this)' onmouseout='RegOver(false,this)' onclick='SelectCategoria(this);' ondblclick='SelectCategoria(this);ModiCategoria();'>\n";
						$str.= "\t\t\t\t\t\t<td align='center'>".$rs[$i]['id']."</td>\n";
						$str.= "\t\t\t\t\t\t<td>".$rs[$i]['nombre']."</td>\n";
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