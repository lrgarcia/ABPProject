<?php


class Championship_SHOWCURRENT_View{

	function __construct($championship){	
		$this->championship = $championship;
         echo "<h1>".$championship->name."</h1>";
        
		$this->render($championship);

	}

	function render($championship){
    include '../View/Header.php';
	?>

   

	<div class="jumbotron">
    <?php    
    echo "<h1>".$championship->name."</h1>";    
        
    ?>
</div>    
        

        
        
	<?php
	 include '../View/Footer.php';		
	}	
}
	?>

     