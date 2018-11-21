<?php

require_once '../Model/Game_Model.php';
require_once '../Model/Game.php';
require_once '../Model/Promotion_Model.php';
require_once '../Model/Promotion.php';
class Promotion_SHOWALL_View{

    function __construct($games){	
        $this->games = $games;
		$this->render();

	}

	function render(){
    include '../View/Header.php';
	?>

	<div class="jumbotron">
		<div class="container">
			<h1>VER TODOS LOS PARTIDOS PROMOCIONADOS</h1>
		</div>
	</div>
	<div class="container">

	
		<div class="row">
			<div class="col-md-12">
				<a class="btn btn-outline-success" id="search-input" href="../Controller/Promotion_Controller.php?action=ADD" role="button">Crear promocion</a>
			</div>
		</div>
<?php
		
		foreach ($this->games as $game) {	
?>
		<div class="row section">
			<div class="col-md-5">
				<h2><?php echo $game->getDate()?></h2>
			</div>
			<div class="col-md-5">
				<h2><?php echo $game->getHour()?></h2>
			</div>
			<div class="col-md-2">
				<a class="btn btn-outline-success" href="../Controller/Promotion_Controller.php?action=SHOWCURRENT&id=<?php echo $game->getIdGame() ?>"><?php echo $strings['Ver']?></a>
<?php
			
				echo('<a class="btn btn-outline-success" href="../Controller/Promotion_Controller.php?action=EDIT&id=');
				echo($game->getIdGame());
				echo('">' . $strings['Editar'] . '</a>');
			
?>			
			</div>
		</div>
<?php
		}
?>


	
	<?php
	 include '../View/Footer.php';		
	}	
}
	?>
