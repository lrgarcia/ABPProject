<?php
// Cabecera presente en todas laas vistas
include_once '../Functions/Authentication.php';
if (!isset($_SESSION['idioma'])) {
		$_SESSION['idioma'] = 'SPANISH';
		include '../Locates/Strings_' . $_SESSION['idioma'] . '.php';
	}
	else{
		include '../Locates/Strings_' . $_SESSION['idioma'] . '.php';
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">


	<!-- Stylesheet de esta pagina -->
	<link href="../View/css/stylesheet.css" rel="stylesheet" type="text/css">

	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="../View/js/scripts.js" type="text/javascript"></script>
	<link href="../View/js/vanillacalendar.css" rel="stylesheet">
	

</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
			<?php 
			// Si está autenticado hará referencia a un controlador distinto
			if (IsAuthenticated()) {
			
			echo '<a class="navbar-brand" href="../Controller/Calendario_Controller.php">Meeting</a>';
			
			}else{
			
			echo '<a class="navbar-brand" href="../Controller/Login_Controller.php">Meeting</a>';
			}
			?>
			<button class="navbar-toggler" type="button">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item dropdown">
				        <form action="../Controller/CambioIdioma.php" method="get">
							<select name="idioma" onChange='this.form.submit()' class="btn btn-light btn-sm dropdown-toggle">
						        <option><?php echo $strings[$_SESSION['idioma']]; ?></option>
						        <?php
						        	if ($_SESSION['idioma'] == 'SPANISH') {
						        		echo ('<option value="ENGLISH">'. $strings['ENGLISH'] . '</option>');						        	
						        	}else{
						        		echo ('<option value="SPANISH">'. $strings['SPANISH'] . '</option>');
						        	}
						        ?>
							</select>
						</form>
			      	</li>
					
				</ul>
				<?php 
				// Si esta autenticado muestra el botón de desconectar
				if (IsAuthenticated()) {	
				?>

					<a class="nav-link"> <?php echo $_SESSION['login'] ?> </a>	
					<a class="btn btn-outline-danger ml-2" href="../Functions/Disconnect.php" role="button"><?php echo $strings['Desconectar']?></a>

				<?php 
				// Sino muestra el login y el password
				}else{
				?>

					<form class="form-inline my-0" action='../Controller/Login_Controller.php' method='post'>
						<input class="form-control mr-2" type="text" name = 'login' placeholder="login">
						<input class="form-control mr-2" type="password" name = 'password' placeholder="password">
						<button class="btn btn-outline-success" type="submit" name='action' value='Login'><?php echo $strings['Iniciar sesion']?></button>
					</form>
					<!-- Botón registrarse -->
					<a class="btn btn-outline-primary ml-2" href="../Controller/User_Controller.php?action=ADD" role="button"><?php echo $strings['Join']?></a>

				<?php
				}
				?>	
			</div>
		</div>
	</nav>
