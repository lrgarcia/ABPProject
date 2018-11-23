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
require_once '../View/Championship_SHOWCURRENT_View.php';




include '../View/MESSAGE_View.php';






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

function get_data_category() 
{
    $category = Array();
    foreach($_REQUEST['category'] as $categoryIterator){
        $category[] = $categoryIterator;
    }
    return $category;
}



/* En REQUEST ACTION se extrae que acciÃ³n ha seleccionado el usuario. Si no ha sido seleccionada ninguna acciÃ³n 
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
        
        $categoryGroupModel=new CategoryGroup_Model();
        $groupModel= new Group_Model();
        $matchModel= new Match_Model();
       
        $alphabet =array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
        $arrayCategoryGroups = $categoryGroupModel->GETCHAMPIONSHIPGROUPS($_REQUEST['idChampionship']);
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
                        error_log("JvPoooooooooo: ".$idGroup. $idPair[$s]. $idPair[$l]);
                        $matchModel->ADD($match);
                        
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
		// Aqui se meterÃ¡ que datos ha pillado una vez se ha hecho introducido los datos del campeonato
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
			
		}
		else{
			
			$respuesta = $calendario->EDIT();
			new MESSAGE($respuesta, '../Controller/Championship_Controller.php');
		}
		
		break;

	case 'SHOWCURRENT':
	        $id_championship= $_REQUEST['id'];
        $championship_model= new Championship_Model();
        $championship= $championship_model->GETBYID($id_championship);
        require_once '../View/Championship_SHOWCURRENT_View.php';
        new Championship_SHOWCURRENT_View($championship);
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

