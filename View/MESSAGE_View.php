<?php

class MESSAGE{

	private $string; 
	private $volver;

	function __construct($string, $volver){
		$this->string = $string;
		$this->volver = $volver;	
		$this->render();
	}

	function render(){
		include '../View/Header.php';
		?>

		<div class="jumbotron">
			<div class="container">
				<h1><?php echo $strings[$this->string] ?></h1>
			</div>
		</div>
		
		

		<div class="container">
				<a href=<?php echo $this->volver ?> > <?php echo $strings['Volver']?> </a>
				</div>";
		<?php 
		include '../View/Footer.php';
	}

}

?>