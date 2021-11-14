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
	
	$filtro="";
	if(isset($_GET["nom"]))
	{
		$filtro = $_GET["nom"];
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
			function filtrarUsuarios()
			{
				var f = document.getElementById("txtFiltro").value;
				if(f=="")
					window.location = "usuarioslista.php";
				else
					window.location = "usuarioslista.php?nom=" + f;
			}
			
			function verVentas(documento, nombre)
			{
				window.location = "usuariosventas.php?userid=" + documento + "&username=" + nombre;
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
			  <div width="100%" head="300px" style="position:relative; display:block; padding:20px;">
				<span style="margin:10px;">Buscar por nombre:</span>
				<input id="txtFiltro" value="" style="margin:10px;" />
				<input type="button" value="Buscar" onclick="filtrarUsuarios();" />
			  </div>
		</header>
		
		<div id="divContenido" style="overflow-y:scroll;">
			<span class="table-titulo">Lista de Usuarios</span>
			<table id="tabProductos">
				<tr id="trHead">
					<td>Documento</td>
					<td>Nombre</td>
					<td>Apellido</td>
					<td>Dirección</td>
					<td>E-Mail</td>
					<td></td>
				</tr>
				<?php
					$rs = listar($filtro);
					for($i=0;$i<count($rs);$i++){
						$n = $rs[$i]["nombre"];
						$doc = $rs[$i]["documento"];
						
						$str = "";
						$str = "<tr onmouseover='RegOver(true,this)' onmouseout='RegOver(false,this)' onclick='Seleccionar(this);' ondblclick='Seleccionar(this);'>\n";
						$str.= "\t\t\t\t\t\t<td align='left'>$doc</td>\n";
						$str.= "\t\t\t\t\t\t<td align='left'>$n</td>\n";
						$str.= "\t\t\t\t\t\t<td align='left'>".$rs[$i]['apellido']."</td>\n";
						$str.= "\t\t\t\t\t\t<td align='left'>".$rs[$i]['direccion']."</td>\n";
						$str.= "\t\t\t\t\t\t<td align='center'>".$rs[$i]['email']."</td>\n";
						$str.= "\t\t\t\t\t\t<td align='center'><input type='button'  class='btn btn-info' value='Ver ventas' onclick='verVentas(\"$doc\", \"$n\");' /></td>\n";
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