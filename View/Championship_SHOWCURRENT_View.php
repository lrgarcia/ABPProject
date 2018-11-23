<?php


class Championship_SHOWCURRENT_View{

	function __construct($championship){	
		$this->championship = $championship;
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
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a class="btn btn-outline-success" id="inscription-btn" href="../Controller/Championship_Controller.php?action=ADD" role="button">Inscribirse</a>
            </div>
            <div class="col-sm-3 nopadding">
                <div class="form-group">
                    <label>Usuario1:</label>
                    <input required type="text" class="form-control" id="name" name="name" value="">
                </div>
                <div class="form-group">
                    <label>Usuario2:</label>
                    <input required type="text" class="form-control" id="name2" name="name2" value="">
                </div>
            </div>
            <div class="col-sm-6 nopadding">
                <div class="form-group">
                    <label>Categoria:</label>
                    <select multiple required class="form-control" id="category[]" name="category[]" size=5>
                        <?php
                        $categoryModel = new Category_Model();
                        $categoryArray = $categoryModel->GETALL();

                        for($i=0; $i <count($categoryArray); $i++)
                        {
                            echo "<option value='".$categoryArray[$i]->getIdCategory()."'>".$categoryArray[$i]->getCategory()." - Categoria ".$categoryArray[$i]->getModality()."</option>";
                        }


                        ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="row section">
            <div class="col-md-10">
                <h2>Inscripciones</h2>
            </div>
        </div>
            <div class="row">
                <table id="championships">
                    <td>
                        <a href='../Controller/Championship_Controller.php?action=GETCHAMPIONSHIPGROUPS&id=<?php echo $championship->idChampionship ?>'>
                            <div><?php echo "AQUI VAN LOS INSCRITOS"?></div>
                        </a>
                    </td>
            </div>
    </div>
        
	<?php
	 include '../View/Footer.php';		
	}	
}
	?>

     