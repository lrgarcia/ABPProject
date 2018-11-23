<?php

class Main_View{

	function __construct(){	
		$this->render();
	}

	function render(){
		
	include '../View/Header.php';
	?>

	<div class="jumbotron">
		<div class="container">
			<h1> <?php echo 'Unete' ?> </h1>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<?php
				echo ('<h2>' . $strings['TituloPartido'] . '</h2>');
				echo ('<p>' . $strings['TextoPartido'] . '</p>');
				echo ('<a href="../Controller/Main_Controller.php?action=PROMOTION">' . $strings['TituloPartido'] . '</a>');
				?>
			</div>
			<div class="col-md-4">
				<?php
				echo ('<h2>' . $strings['TituloCampeonato'] . '</h2>');
				echo ('<p>' . $strings['TextoCampeonato'] . '</p>');
				echo ('<a href="../Controller/Main_Controller.php?action=CHAMPIONSHIP">' . $strings['TituloCampeonato'] . '</a>');
				?>
			</div>
			<div class="col-md-4">
				<?php
				echo ('<h2>' . $strings['TituloReserva'] . '</h2>');
				echo ('<p>' . $strings['TextoReserva'] . '</p>');
				echo ('<a href="../Controller/Main_Controller.php?action=COURT">' . $strings['TituloReserva'] . '</a>');
				?>
			</div>
            <div class="col-md-4">
                <?php
                echo ('<h2>' . 'Gestionar Resultados' . '</h2>');
                echo ('<p>' . 'Permite la gestion de ressultados de los resultados de los partidos de un campeonato' . '</p>');
                echo ('<a href="../Controller/Main_Controller.php?action=RESULTS">' .'Gestionar Resultados' . '</a>');
                ?>
            </div>
	    </div>
	</div>
	
	<?php
	 include '../View/Footer.php';		
	} 

}

?>

	