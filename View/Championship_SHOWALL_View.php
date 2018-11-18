<?php
class Championship_SHOWALL_View{

	function __construct($championships){	
		$this->championships = $championships;
		$this->render();

	}

	function render(){
    include '../View/Header.php';
	?>

	<div class="jumbotron">
		<div class="container">
			<h1>VER TODAS LAS CAMPEONATOS</h1>
			<a class="btn btn-outline-success" id="search-input" href="../Controller/Championship_Controller.php?action=ADD" role="button"Crear campeonato></a>);
		</div>
	</div>



	


	<?php
	 include '../View/Footer.php';		
	}	
}
	?>
