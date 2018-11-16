<?php
class Championship_SHOWALL_View{

	function __construct(){	
		$this->render();

	}

	function render(){
    include '../View/Header.php';
	?>

	<div class="jumbotron">
		<div class="container">
			<h1>VER TODAS LAS CAMPEONATOS</h1>
		</div>
	</div>
	<?php
	 include '../View/Footer.php';		
	}	
}
	?>
