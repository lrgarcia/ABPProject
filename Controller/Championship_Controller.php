<?php
	
session_start(); 
include '../Functions/Authentication.php';
if (!IsAuthenticated()){
	header('Location:../index.php');
}
include '../View/Championship_ADD_View.php';
require_once '../View/Championship_SHOWALL_View.php';
require_once '../Model/Championship.php';
require_once '../Model/Championship_Model.php';
require_once '../Model/CategoryGroup.php';
require_once '../Model/CategoryGroup_Model.php';
require_once '../Model/Group_Model.php';
require_once '../Model/Group.php';
require_once '../Model/Match.php';
require_once '../Model/Match_Model.php';
require_once '../Model/Reservation.php';
require_once '../Model/Reservation_Model.php';
require_once '../Model/ProposedMatch.php';
require_once '../Model/ProposedMatch_Model.php';
//require_once '../View/Championship_SHOWCURRENT_View.php';
require_once '../View/Championship_EDIT_View.php';




include '../View/MESSAGE_View.php';


// function AlreadyInscribed($arrayCategorys,$idChampionship){

//     $user=$_SESSION['login'];
//     $categorySuscribed=array();

//     //Devuelve todos las parejas de un determidado idCATEGORYGroup
//     GETGROUPPAIRS($idCategoryGroup)
//     GETCHAMPIONSHIPGROUPS($idChampionship)

// }





// Agui se debe meter los atributos del campeonato que ha recibido de la vista para luego crear el objeto campeonato
function get_data_championship(){
	
	//$login_creator = $_SESSION['login'];
	if(isset($_REQUEST['idChampionship']))
	{
	    $idChampionship = $_REQUEST['idChampionship'];
	} else {
	    $idChampionship = null;
	}
	
	$name = $_REQUEST['name'];
	$dateStart = $_REQUEST['dateStart'];
	$dateInscriptions = $_REQUEST['dateInscriptions'];
    $championship = new Championship($idChampionship, $name, $dateStart,$dateInscriptions);
 
    return $championship;
	
}

function set_data_championship(){

    $login_creator = $_SESSION['login'];

    $idChampionship = $_POST['idChampionship'];
    $name = $_POST['name'];
    $dateStart = $_POST['dateStart'];
    $dateInscriptions = $_POST['dateInscriptions'];
    $championship = new Championship($idChampionship, $name, $dateStart, $dateInscriptions);

    return $championship;

}

function get_data_category()
{
    $category = Array();
    foreach($_REQUEST['category'] as $categoryIterator){
        $category[] = $categoryIterator;
    }
    return $category;
}

function set_data_category()
{
    $category = Array();
    foreach($_POST['category'] as $categoryIterator){
        $category[] = $categoryIterator;
    }
    return $category;
}



/* En REQUEST ACTION se extrae que acción ha seleccionado el usuario. Si no ha sido seleccionada ninguna acción 
Hara un showcurrent por defecto
*/

if (!isset($_REQUEST['action'])){
	$_REQUEST['action'] = '';
}
Switch ($_REQUEST['action']){
    case 'GENERATECHAMP':
        if (!$_REQUEST['idChampionship']){
            new Championship_ADD_View();
        }
        $championship_model = new Championship_Model();
        $categoryGroupModel=new CategoryGroup_Model();
        $groupModel= new Group_Model();
        $matchModel= new Match_Model();
        $reservation = new Reservation_Model();
        $proposedMatch_model= new ProposedMatch_Model();
        $respuesta="";

       
        $alphabet =array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
        $arrayCategoryGroups = $categoryGroupModel->GETCHAMPIONSHIPGROUPS($_REQUEST['idChampionship']);
        $championship=$championship_model->GETBYID($_REQUEST['idChampionship']);


        $dateStart=$championship->getDateStart();
        $hours=array();

     
      //  $dateStart=date('d/m/Y', strtotime($dateStart));



        /////////////////////////////Generacion de horas disponibles//////////////////////////////

        $hour=11;
         $minutes=0;
         while($hour<22){

          if($minutes==60){
            $minutes=0;
            $hour++;
          }


        if($minutes==30){
            $stringHour=$hour.":".$minutes;
        }else{
  //En caso que lo minutos sean igual a 0, añado un 0 mas para que tenga dos digitos siempre
            $stringHour=$hour.":".$minutes."0";

         }//Fin creacion de stringHour


          array_push($hours,$stringHour);
          $hour++;
          $minutes=$minutes+30;

        }







        
        for($i=0;$i<count($arrayCategoryGroups);$i++){
            
            $arrayPair = $categoryGroupModel->GETGROUPPAIRS($arrayCategoryGroups[$i]->getIdCategoryGroup());
            $numGroups = intdiv(count($arrayPair),8);       
            
            for($j=0;$j<$numGroups;$j++){
                $group = new Group(null, $arrayCategoryGroups[$i]->getIdCategory(), $_REQUEST['idChampionship'], 
                    $alphabet[$j]);
                
                $groupModel->ADD($group);
                $idGroup=$groupModel->LASTID();
                $idPair=Array();
                for($k=$j*8;$k<$j*8+8;$k++){
                    $respuesta=$groupModel->SETGROUPPAIRS($arrayPair[$k]->getIdPair(), $idGroup);
                    $idPair[]=$arrayPair[$k]->getIdPair();
                    
                }
                for($s=0;$s<8;$s++){
                    for($l=$s+1;$l<8;$l++){
                        

                        $match= new Match(null, null, null, $idGroup, $idPair[$s], $idPair[$l], null);
                        //error_log("JvPoooooooooo: ".$idGroup. $idPair[$s]. $idPair[$l]);
                        $matchModel->ADD($match);

                        $idMatch=$matchModel->LASTID();

                        for($day=1;$day<=8;$day++){
                            $proposed1=false;
                             $proposed2=false;

                            $cont=0;
                                                       
                            $dateStartTime= strtotime("+1 day",strtotime($dateStart));
                              $dateStart=date("Y-m-d", $dateStartTime);
                              $dateStartFormatCourt=date("d/m/Y", $dateStartTime);
                              

  
                            while(!$proposed1){

                            $freeCourts = $reservation->FREECOURTSBYHOUR($dateStartFormatCourt,$hours[$cont]);
                            if(sizeof($freeCourts)==0){
                                $cont++;

                            }else{
                               $proposedMatch1= new ProposedMatch(null,$idMatch,$idPair[$s],$dateStart,$hours[$cont],'NO DISPONIBLE');

                               $result= $proposedMatch_model->ADD($proposedMatch1);


                               $proposedMatch2= new ProposedMatch(null,$idMatch,$idPair[$l],$dateStart,$hours[$cont],'NO DISPONIBLE');
                               $result= $proposedMatch_model->ADD($proposedMatch2);
                               $proposed1=true;


                            }
                        }



                            

                        }




                    }
                }
                
            }
            
        }
        new MESSAGE($respuesta, '../Controller/Championship_Controller.php');
        break;
    
	case 'ADD':
	// Si no se ha introducido el campeonato
		if (!$_POST){
			new Championship_ADD_View();
		}
		// Aqui se meterá que datos ha pillado una vez se ha hecho introducido los datos del campeonato
		else{
			$championpionship = get_data_championship();
			$category = get_data_category();
			$championship_model = new Championship_Model();
			$categorygroup_model = new CategoryGroup_Model();
			
			$respuesta = $championship_model->ADD($championpionship);
			$idChampionship = $championship_model->LASTID();
			$respuesta = $championship_model->SETCATEGORIESBYID($_REQUEST['category'], $idChampionship);
			for($i=0; $i<count($_REQUEST['category']); $i++)
			{
			    $categorygroup_model->ADD(new CategoryGroup(null, $idChampionship, $_REQUEST['category'][$i]));
			}
			new MESSAGE($respuesta, '../Controller/Championship_Controller.php');
		}
		break;	
	case 'EDIT':
        if (!$_POST){
            $id_championship= $_REQUEST['id'];
            $championship_model= new Championship_Model();
            $championship= $championship_model->GETBYID($id_championship);
            $categorias = '';

            foreach($championship_model->GETCATEGORIESBYID($id_championship) as $single)
                $categorias .= $single->idCategory.',';

            $categorias = rtrim($categorias,", ");

            new Championship_EDIT_View($championship->idChampionship,$championship->name,$championship->dateStart,$championship->dateInscriptions, $categorias);
        }
        else{
            $championpionship = set_data_championship();
            $category = set_data_category();
            $championship_model = new Championship_Model();
            $categorygroup_model = new CategoryGroup_Model();

            $respuesta = $championship_model->EDIT($championpionship);
            $idChampionship = $_POST['idChampionship'];
            $championship_model->UPDATECATEGORIESBYID($_REQUEST['category'], $idChampionship);

            for($i=0; $i<count($_REQUEST['category']); $i++)
            {
                $categorygroup_model->EDIT(new CategoryGroup(null, $idChampionship, $_REQUEST['category'][$i]));
            }
            new MESSAGE($respuesta, '../Controller/Championship_Controller.php');
        }
		break;

	case 'SHOWCURRENT':
    //Se obtiene el campeonato seleccionado
        $id_championship= $_REQUEST['id'];
        $championship_model= new Championship_Model();
        $championship= $championship_model->GETBYID($id_championship);
    //Se obtiene las categorias asignadas a ese campeonato
      
        $category_model = new Category_Model();
        // $arrayCategorys = array();
        $arrayCategorys= $championship_model->GETCATEGORIESBYID($id_championship);



        require_once '../View/Championship_SHOWCURRENT_View.php';
        new Championship_SHOWCURRENT_View($arrayCategorys,$championship);


		break;

    case 'DELETE':
        $id_championship= $_REQUEST['idChampionship'];
        $championship_model= new Championship_Model();
        $respuesta = $championship_model->DELETE($id_championship);

        new MESSAGE($respuesta, '../Controller/Main_Controller.php?action=CHAMPIONSHIP');

        break;


	default: 
		
		$championship_model= new Championship_Model();
		$championships= $championship_model->GETALL();
		new Championship_SHOWALL_View($championships);
		break;
}
?>
