<?php
	include("inc/productosAD.php");
	include("menuadmin.php");
	
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
	
	if(!isset($_GET["producto"]))
	{
		header("Location: ./productoslista.php");
		exit();
	}
	
	$resultado = getProducto($_GET["producto"]);
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
		<title>White Line</title>
		
		<link rel="stylesheet" type="text/css" href="css/estilos.css" />
		<link rel="stylesheet" type="text/css" href="css/productos.css" />
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<!--
		refresh automatico ->
		<meta http-equiv="refresh" content="3; URL=index.php" />
		-->
		
		<script type="text/javascript">
			function ActivarOnOff(){
				var ob = document.getElementById("hidActivo");
				if(document.getElementById("chkActivo").checked){
					ob.value = "1";
				}else{
					ob.value = "0";
				}//endif
			}//end
			function AgregarImagenes(prod){
				var frm = document.getElementById("frmImg");
				frm.action = "editproduct.php?action=image&op=add&producto=" + prod;
				frm.submit();
			}
			function EliminarImagen(prod, imagen){
				if(confirm("¿Desea eliminar la imagen?"))
				{
					window.location = "editproduct.php?action=image&op=delete&producto=" + prod + "&imagen=" + imagen;
				}
			}
			function GuardarProducto(prod){
				var err = false;
				var msg = "ATENCION!!!\n\nFaltan los siguientes campos:\n";
				var frm = document.getElementById("frm");
				
				nombre = frm.txtNom.value;
				desc = frm.txtDescripcion.value;
				stock = frm.txtStock.value;
				precio = frm.txtPrecio.value;
				
				var cmb = document.getElementById("comboCategorias");
				categoria = cmb.options[cmb.selectedIndex].id;
				
				if(nombre.trim()==""){
					msg = msg +"-Nombre\n";
					err = true;
				}//endif
				if(desc.trim()==""){
					msg = msg +"-Descripción\n";
					err = true;
				}//endif
				if(stock.trim()==""){
					msg = msg +"-Stock\n";
					err = true;
				}//endif
				if(precio.trim()==""){
					msg = msg +"-Precio\n";
					err = true;
				}//endif
				if(categoria=="0"){
					msg = msg +"-Categoria\n";
					err = true;
				}//endif
				
				if(!err){
					frm.action = "editproduct.php?producto=" + prod + "&categoria=" + categoria;
					if(confirm("¿Desea guardar los datos?")){
						frm.submit();
					}//endif
				}else{
					alert(msg);
				}//endif
			}//end
		</script>
		
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
			<div class="cbanner">
			</div>
			<?php
				verMenu();
				verMenuAdmin();
			?>
		</header>

        <section width="100%">
            <div class="container" style="width:100%;">
                <div class="card card-container" style="display:table; width:100%; padding:30px; margin-top:10px; max-width:1200px;">
					<table width="100%">
						<tr>
						<td>
							<form id="frm" class="form-horizontal" style="width:100%;" method="POST" enctype="multipart/form-data">
								<div class="form-group">
									<label class="control-label col-sm-12" for="txtId">Código:<?php echo " ".$producto["id_producto"]; ?></label>
								</div>

								<div class="form-group">
									<label class="control-label col-sm-12" for="pwd">Nombre:</label>
									<div class="col-sm-12">
										<input type="text" class="form-control" id="txtNom" name="txtNom" placeholder="Ingresar Nombre" value="<?php echo $producto["nombre"]; ?>" />
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-12" for="txtDescripcion">Descripcion:</label>
									<div class="col-sm-12">
									<input type="text" class="form-control" id="txtDescripcion" name="txtDescripcion" placeholder="Ingresar Descripcion" value="<?php echo $producto["descripcion"]; ?>" />
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-12" for="txtPrecio">Precio:</label>
									<div class="col-sm-12">
										<input type="number" class="form-control" id="txtPrecio" name="txtPrecio" placeholder="Ingresar Precio" value="<?php echo $producto["precio"]; ?>" />
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-12" for="txtStock">Stock:</label>
									<div class="col-sm-12">
										<input type="number" class="form-control" id="txtStock" name="txtStock" placeholder="Ingresar Stock" value="<?php echo $producto["stock"]; ?>" />
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-12" for="comboCategorias">Categoria:</label>
									<div class="col-sm-12">
										<?php 
											echo comboCategorias($producto["categoria"]);
										
											echo "<span style='margin-left:30px;'>Activo:</span>";
										
											$vig = $producto["activo"];
											if($vig==1){
												echo "<input style='color:#FF0000; margin-left:30px;' type='checkbox' id='chkActivo' checked='true' onclick='ActivarOnOff();' />\n";
											}else{
												echo "<input style='color:#FF0000; margin-left:30px;' type='checkbox' id='chkActivo' onclick='ActivarOnOff();' />\n";
											}//endif
											echo "<input type='hidden' id='hidActivo' name='chkActivo' value='".$vig."' />\n";
										?>
									</div>
								</div>
								<div class="form-group" style="margin-left: 20px; margin-top: 10px; margin-bottom: 20px;">
									<div class="col-sm-6">
										<button type="button" id="btmProducto" class="btn btn-info" onclick="GuardarProducto(<?php echo $producto["id_producto"]; ?>);">Guardar</button>
									</div>
								</div>
							</form>
						</td>
						<td style="width:30%;">
							<div id="divContenido" style="width:90%; overflow-y:scroll;">
							<table style="width:100%;">
							<?php
								for($i=0; $i<count($imagenes); $i++)
								{
									$html = "<tr><td style='width:80%'>";
									$html = $html."<div style='width:260px; height:160px; border:solid 1px; margin:10px; padding:5px;'>";
									$html = $html."<img src='./imagenes/".$imagenes[$i][0]."' style='width:100%; height:100%;' />";
									$html = $html."</div></td>";
									$html = $html."<td style='width:20%'><input type='button' value='Eliminar' onclick='EliminarImagen(".$producto["id_producto"].",\"".$imagenes[$i][0]."\");' /></td>";
									$html = $html."</tr>";
									echo $html;
								}
							?>
							</table>
							</div>
						</td>
						</tr>
						<tr>
						<td>
						</td>
						<td>
							<form id="frmImg" method="POST" enctype="multipart/form-data">
								<div class="mb-3">
									<label for="formFileMultiple" class="form-label">Imagenes:</label>
									<input class="form-control" type="file" id="formFileMultiple" name="img[]" multiple />
								</div>
								<button type="button" id="btnSubir" class="btn btn-info" onclick="AgregarImagenes(<?php echo $producto["id_producto"]; ?>);">Subir Imagenes</button>
							</form>
						</td>
						</tr>
					</table>
                </div>
            </div>
		</section>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    </body>
</html>