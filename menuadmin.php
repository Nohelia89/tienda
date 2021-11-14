<?php

	function validarAdmin()
	{
		if(isset($_SESSION["login"]))
		{
			if(!$_SESSION["login"]){
				header("Location: ./index.php");
				exit();
			}//endif
			
			if(!$_SESSION["esadmin"])
			{
				header("Location: ./index.php");
				exit();
			}
		}
		else
		{
			header("Location: ./index.php");
			exit();
		}
	}

	function verMenu()
	{
		if(isset($_SESSION["login"]))
		{
			if($_SESSION["login"])
			{
				echo "<nav class='navbar navbar-expand-lg navbar-light bg-light'>
						<div class='container-fluid'>
						  <a class='navbar-brand' href='#'></a>
						  <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
							<span class='navbar-toggler-icon'></span>
						  </button>
						  <div class='collapse navbar-collapse' id='navbarNav'>
							<ul class='navbar-nav'>
							  <li class='nav-item'>
								<a class='nav-link' aria-current='page' href='index.php'>Bienvenido ".$_SESSION['usuario']."</a>
							  </li>
							  <li class='nav-item'>
								<a class='nav-link' href='index.php'>Productos</a>
							  </li>
							  <li class='nav-item'>
								<a class='nav-link' href='modificarPerfil.php'>Perfil</a>
							  </li>
							  <li class='nav-item'>
								<a class='nav-link' href='carrito.php'>Mi Carrito</a>
							  </li>
							  <li class='nav-item'>
								<a class='nav-link' href='historial.php'>Mis Compras</a>
							  </li>
							  <li class='nav-item'>
								<a class='nav-link' href='cerrarsesion.php'>Cerrar Sesion</a>
							  </li>
							</ul>
						  </div>
						</div>
					</nav>";
			}
		}
		else
		{
			echo "<nav class='navbar navbar-expand-lg navbar-light bg-light'>
				<div class='container-fluid'>
				  <a class='navbar-brand' href='#'></a>
				  <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
					<span class='navbar-toggler-icon'></span>
				  </button>
				  <div class='collapse navbar-collapse' id='navbarNav'>
					<ul class='navbar-nav'>
					  <li class='nav-item'>
						<a class='nav-link' aria-current='page' style='font-weight: bold; font-' href='index.php'>Inicio</a>
					  </li>
					  <li class='nav-item'>
						<a class='nav-link' href='login.html'>Ingresar</a>
					  </li>
					  <li class='nav-item'>
						<a class='nav-link' href='registro.html'>Registrarse</a>
					  </li>
					  <!-- esto va solo si estas logueado
					  <li class='nav-item'>
						<a class='nav-link' href='#'>Carrito</a>
					  </li>
					  <li class='nav-item'>
						<a class='nav-link ' href='#'>Historial de Compras</a>
					  </li>
					  -->
					</ul>
				  </div>
				</div>
			  </nav>";
		}
	}

	function verMenuAdmin()
	{
		if(isset($_SESSION["esadmin"]))
		{
			if($_SESSION["esadmin"])
			{
				echo "<div width='100%' head='300px' style='position:relative; display:block; padding:20px;'>
								<nav class='navbar navbar-expand-lg navbar-light bg-light'>
									<div class='container-fluid'>
									  <a class='navbar-brand' href='#'></a>
									  <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
										<span class='navbar-toggler-icon'></span>
									  </button>
									  <div class='collapse navbar-collapse' id='navbarNav'>
										<ul class='navbar-nav'>
										  <li class='nav-item'>
											<a class='nav-link' href=''>Administración:</a>
										  </li>
										  <li class='nav-item'>
											<a class='nav-link' href='productoslista.php'>Listado de Productos</a>
										  </li>
										  <li class='nav-item'>
											<a class='nav-link' href='categorias.php'>Categorias</a>
										  </li>
										  <li class='nav-item'>
											<a class='nav-link' href='usuarioslista.php'>Lista de Usuarios</a>
										  </li>
										  <li class='nav-item'>
											<a class='nav-link' href='histoventas.php'>Histo Ventas</a>
										  </li>
										</ul>
									  </div>
									</div>
								</nav>
							</div>";
			}
		}
	}
?>