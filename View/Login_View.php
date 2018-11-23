<?php

class Login{

	function __construct(){	
		$this->render();
	}

	function render(){
		
	include '../View/Header.php';
	?>

	<div class="jumbotron">
		<div class="container">
			<h1><?php echo $strings['Unete']?></h1>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<?php
				echo ('<h2> Apuntante a campeonatos</h2>');
				echo ('<p> Las parejas podran apuntarse a campeonatos en cualquier categoría </p>');
				?>
			</div>
			<div class="col-md-4">
				<?php
				echo ('<h2>Reserva pistas para jugar</h2>');
				echo ('<p> Puedes reservar pistas que tengamos disponibles para llevar a cabo partidos </p>');
				?>
			</div>
			<div class="col-md-4">
				<?php
				echo ('<h2>Participa en nuestras actividades</h2>');
				echo ('<p>Dispondras de monitores que para llevar a cabo actividades promocionadas por la escuela</p>');
				?>
			</div>
	    </div>
	</div>
	
	<?php
	 include '../View/Footer.php';		
	} 

}

?>

	

	
