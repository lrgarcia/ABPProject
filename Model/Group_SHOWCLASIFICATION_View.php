<?php
require_once '../Model/Category.php';
require_once '../Model/Category_Model.php';
require_once '../Model/Championship.php';
require_once '../Model/Championship_Model.php';
require_once '../Model/Group.php';
require_once '../Model/Group_Model.php';
require_once '../Model/Pair.php';
require_once '../Model/Pair_Model.php';
require_once '../Model/Match.php';
require_once '../Model/Match_Model.php';
class Group_SHOWCLASIFICATION_View{



    function __construct($group,$category,$championship,$matchs,$user){  
         $this->group = $group; 
        $this->category = $category;
        $this->championship = $championship;
        $this->matchs = $matchs;
        $this->user = $user;
        
        $this->render($group,$category,$championship,$matchs,$user);

    }

    function render($group,$category,$championship,$matchs,$user){
    include '../View/Header.php';
    ?>

    <style type="text/css">

    </style>
<div class="jumbotron">
        <div class="container">
          
            <?php
            echo "<h1>Categoria ".$category->category." Modalidad ".$category->modality."Grupo ".$group->letter." </h1>";
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
            <table id="clasification">
                <tr>
                    <?php
                     $group_model = new Group_Model();
                     echo  "<th></th>";

                      $pairs=$group_model->GETGROUPPAIRS($group->idGroup);
                            
                            foreach($pairs as $pair){
                            echo "<th>".$pair->idPair."</th>";
                        }

                    ?>
                </tr>

                <?php
                $numPairs=sizeof($pairs);
                $cont=0;
                 foreach($pairs as $pair){
                    echo "<tr>";
                    echo "<th>".$pair->idPair."</th>";

                    for($i = 0; $i < $cont; $i++){
                        
                        $pair2position=$i;
                        $pair2=$pairs[$pair2position];
                        $idUser=$user->idUser;

                        $idCaptain1=$pair->idCaptain;
                        $idCaptain2=$pair2->idCaptain;
                        $idPair1=$pair->idPair;
                        $idPair2=$pair2->idPair;
                        $match_model = new Match_Model();

                        $match = $match_model->GETMATCHBYPAIR($group->idGroup,$idPair1,$idPair2,1);



                      //  echo '<td>'.$idPair1.' '.$idPair2.'</td>';



                        if($_SESSION['type']=='admin'){


                        echo '<td><a href="../Controller/Match_Controller.php?action=EDITRESULT&idChampionship='. $championship->idChampionship.'&idCategory='.$category->idCategory.'&idGroup='.$group->idGroup.'&idPair1='.$idPair1.'&idPair2='.$idPair2.'"><i class="far fa-edit"></i></a></td>';
                        }
                        if($match->date==''){

                        if($idUser==$idCaptain1 || $idUser==$idCaptain2){

                         echo '<td><a href="../Controller/Match_Controller.php?action=SHOWDATEPROPOSAL&idChampionship='. $championship->idChampionship.'&idCategory='.$category->idCategory.'&idGroup='.$group->idGroup.'&idPair1='.$idPair1.'&idPair2='.$idPair2.'"><i class="far fa-calendar"></i></a>

                         <a href="../Controller/Match_Controller.php?action=SHOWMATCH&idChampionship='. $championship->idChampionship.'&idCategory='.$category->idCategory.'&idGroup='.$group->idGroup.'&idPair1='.$idPair1.'&idPair2='.$idPair2.'"><i class="far fa-eye"></i></a>
                         </td>';

                        }else{
                             echo '<td><a href="../Controller/Match_Controller.php?action=SHOWMATCH&idChampionship='. $championship->idChampionship.'&idCategory='.$category->idCategory.'&idGroup='.$group->idGroup.'&idPair1='.$idPair1.'&idPair2='.$idPair2.'"><i class="far fa-eye"></i></a></td>';
                        }
                    }else{
                        echo '<td><a href="../Controller/Match_Controller.php?action=SHOWMATCH&idChampionship='. $championship->idChampionship.'&idCategory='.$category->idCategory.'&idGroup='.$group->idGroup.'&idPair1='.$idPair1.'&idPair2='.$idPair2.'"><i class="far fa-eye"></i></a></td>';

                    }

                    }

                    for($i=$numPairs; $i > $cont; $i--){
                        echo "<td></td>";
                    }

                    $cont++;

             
                
                    
                
                

                echo "</tr>";

                 }
             
                

                ?>



                </tr>

                
            </table>
        </div>

      

        
        
    <?php
     include '../View/Footer.php';      
    }   
}
    ?>
