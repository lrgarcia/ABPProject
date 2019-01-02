<?php
require_once '../Model/Category.php';
require_once '../Model/Category_Model.php';
require_once '../Model/Championship.php';
require_once '../Model/Championship_Model.php';
class Championship_SHOWCURRENT_View{



    function __construct($arrayCategorys,$championship){  
         $this->arrayCategorys = $arrayCategorys; 
        $this->championship = $championship;
        $this->render($arrayCategorys,$championship);

    }

    function render($arrayCategorys,$championship){
    include '../View/Header.php';
    ?>

    <style type="text/css">

    </style>
<div class="jumbotron">
        <div class="container">
            <h1></h1>
            <?php
            echo "<h1>".$championship->name."</h1>";
            ?>
        </div>
    </div>
    <div class="container">

    
<!--         <div class="row">
            <div class="col-md-12">
                <a class="btn btn-outline-success" id="search-input" href="../Controller/Championship_Controller.php?action=ADD" role="button">Crear campeonato</a>
            </div>
        </div>
 -->
<!--         <div class="row section">
            <div class="col-md-10">
                <h2>Campeonatos</h2>
            </div>
        </div> -->

        <div class="row">
            <table id="championships">
                <tr>
                    <th width="60%">Categoria</th>
                    <th width="20%">Modalidad</th>
         
                    <th width="20%"></th>
                </tr>
                <?php foreach ($this->arrayCategorys as $category) { ?>
                <tr>
                    <td>
                        <a>
                        <div><?php echo $category->category ?></div>
                        </a>
                    </td>
                    <td>
                        <a>
                            <div><?php echo $category->modality ?></div>
                        </a>
                    </td>
      
                    <td>
                        <div class="btn-group" role="group" aria-label="groupbuttons">
                            <a class="btn btn-outline-success" href='../Controller/Category_Controller.php?action=INSCRIPTION&idChampionship=<?php echo $championship->idChampionship?>&idCategory=<?php echo $category->idCategory?>'>
                                Inscribirse
                            </a>

                            <a class="btn btn-outline-success" href='../Controller/Category_Controller.php?action=Clasification&idChampionship=<?php echo $championship->idChampionship?>&idCategory=<?php echo $category->idCategory?>'>
                                Ver clasificación
                           </a>

                        </div>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>

      

        
        
    <?php
     include '../View/Footer.php';      
    }   
}
    ?>
