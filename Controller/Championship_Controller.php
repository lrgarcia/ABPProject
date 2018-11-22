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
include '../View/MESSAGE_View.php';


// Agui se debe meter los atributos del campeonato que ha recibido de la vista para luego crear el objeto campeonato
function get_data_championship(){
	
	$login_creator = $_SESSION['login'];
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



/* En REQUEST ACTION se extrae que acción ha seleccionado el usuario. Si no ha sido seleccionada ninguna acción 
Hara un showcurrent por defecto
*/

if (!isset($_REQUEST['action'])){
	$_REQUEST['action'] = '';
}
Switch ($_REQUEST['action']){
	
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
			
		}
		else{
			
			$respuesta = $calendario->EDIT();
			new MESSAGE($respuesta, '../Controller/Championship_Controller.php');
		}
		
		break;

	case 'SHOWCURRENT':
	
		break;
	default: 
		
		$championship_model= new Championship_Model();
		$championships= $championship_model->GETALL();
		new Championship_SHOWALL_View($championships);
		break;
}
?>