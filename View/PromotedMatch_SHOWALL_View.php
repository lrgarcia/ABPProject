<?php
class PromotedMatch_SHOWALL_View{

	function __construct($games){
        $this->games = $games;
		$this->render($games);

	}

	function render($games){
    include '../View/Header.php';
	?>

	<div class="jumbotron">
		<div class="container">
			<h1>VER TODOS LOS PARTIDOS PROMOCIONADOS</h1>
		</div>
	</div>
<div class="container">
        <td>
            <a href='../Controller/Main_controller.php?action=PROMOTION'
            <div><?php echo $games ?></div>
            </a>
        </td>
</div>



	<?php
	 include '../View/Footer.php';		
	}	
}
	?>
