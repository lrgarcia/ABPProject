<?php
require_once '../Model/Category.php';
require_once '../Model/Category_Model.php';
require_once '../Model/Championship.php';
require_once '../Model/Championship_Model.php';
require_once '../Model/Group.php';
require_once '../Model/Group_Model.php';
class Group_SHOWALL_View{



    function __construct($groups,$category,$championship){  
         $this->groups = $groups; 
        $this->category = $category;
        $this->championship = $championship;
        $this->render($groups,$category,$championship);

    }

    function render($groups,$category,$championship){
    include '../View/Header.php';
    ?>

    <style type="text/css">

    </style>
<div class="jumbotron">
        <div class="container">
            <h1></h1>
            <?php
            echo "<h1>Categoria ".$category->category." Modalidad ".$category->modality."</h1>";
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
                    <th width="60%">Letra</th>
                    <th width="20%">Numero de parejas</th>
         
                    <th width="20%"></th>
                </tr>
                <?php foreach ($this->groups as $group) { ?>
                <tr>
                    <td>
                        <a>
                        <div><?php echo $group->letter ?></div>
                        </a>
                    </td>
                    <td>
                        <a>
                            <div><?php 

                            $group_model = new Group_Model();

                            $pairs=$group_model->GETGROUPPAIRS($group->idGroup);
                            $numPairs=sizeof ($pairs);
                            echo $numPairs;



                            ?></div>
                        </a>
                    </td>
      
                    <td>
                        <div class="btn-group" role="group" aria-label="groupbuttons">
                            <a class="btn btn-outline-success" href='../Controller/Group_Controller.php?action=SHOWCLASIFICATION&idChampionship=<?php echo $championship->idChampionship?>&idCategory=<?php echo $category->idCategory?>&idGroup=<?php echo $group->idGroup?>'>
                                Ver clasificacion
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
