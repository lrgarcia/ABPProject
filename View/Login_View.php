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
				echo ('<h2>' . $strings['Titulo1'] . '</h2>');
				echo ('<p>' . $strings['Texto1'] . '</p>');
				?>
			</div>
			<div class="col-md-4">
				<?php
				echo ('<h2>' . $strings['Titulo2'] . '</h2>');
				echo ('<p>' . $strings['Texto2'] . '</p>');
				?>
			</div>
			<div class="col-md-4">
				<?php
				echo ('<h2>' . $strings['Titulo3'] . '</h2>');
				echo ('<p>' . $strings['Texto3'] . '</p>');
				?>
			</div>
	    </div>
	</div>
	
	<?php
	 include '../View/Footer.php';		
	} 

}

?>

	