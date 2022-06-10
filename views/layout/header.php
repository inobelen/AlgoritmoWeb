<!DOCTYPE HTML>
<html lang="es">
	<head>
		<meta charset="utf-8" />
		<title>Algoritmo</title>
		<link rel="stylesheet" href="<?=base_url?>assets/css/styles.css" />
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
		



	</head>
	<body>
		<div id="container">
			<!-- CABECERA -->
			<header id="header">

			<?php if (isset($_SESSION['identity'])): ?>

			<nav class="navbar navbar-dark bg-dark" >

				<ul class="nav">
					<li class="nav-item">
						<a class="text-white h4 nav-link active" href="<?=base_url?>usuario/actualizarUsuario">Configuración de cuenta</a>
					</li>
					<li class="nav-item">
						<a class="text-white h4 nav-link" href="<?=base_url?>palindromo/index">Algoritmo</a>
					</li>
					<li class="nav-item">
						<a class="text-white h4 nav-link" href="<?=base_url?>usuario/usuarios">Usuarios</a>
					</li>

					<li class="nav-item">
						<a class="text-white h4 nav-link" href="<?=base_url?>usuario/logout">Cerrar Sesión</a>
					</li>

					</ul>  
				</nav>
				<?php else: ?>
	
	<?php endif; ?>
			</header>

			<!-- MENU -->
			<!--?php $categorias = Utils::showCategorias(); ?-->
			<nav id="menu">
                    
			</nav>

			<div id="content">