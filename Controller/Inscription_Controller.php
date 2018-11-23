<?php
session_start();
require_once '../Model/Championship_Model.php';
require_once '../Model/Championship.php';
require_once '../Model/Category_Model.php';
require_once '../Model/Category.php';
require_once '../Model/Pair_Model.php';
require_once '../Model/Pair.php';
require_once '../Model/User_Model.php';
require_once '../Model/User.php';
require_once '../Model/CategoryGroup.php';
require_once '../Model/CategoryGroup_Model.php';
require_once '../View/MESSAGE_View.php';
    
    
    
    
if (!isset($_REQUEST['action'])){
	$_REQUEST['action'] = '';
}
Switch ($_REQUEST['action']){
	
	case 'ADD':
		$respuesta="";
	    $captain=$_POST['name'];
	    $name2=$_POST['name2'];
	    $user_model = new User_Model();
	    $captainUser = $user_model->GETBYLOGIN($captain);
	    $partnerUser = $user_model->GETBYLOGIN($name2);
	    $idCaptainUser = $captainUser->getIdUser();
	    $idPartnerUser = $partnerUser->getIdUser();

	    $categorys=$_POST['category'];
	    $idChampionship=$_POST['idChampionship'];
	    $pair_model = new Pair_Model();
	    $categoryGroup_model = new CategoryGroup_Model();
	    $pair= new Pair(null,$idCaptainUser,$idPartnerUser);
	    $resultadoAñadirPareja=$pair_model->ADD($pair);
	    $pair=$pair_model->GETPAIR($idCaptainUser,$idPartnerUser);
	    $idPair=$pair->getIdPair();

	    $categorysGroup=array();
	    foreach($categorys as $category){
	    	$idCategory=$category;
	    	$categoryGroup = $categoryGroup_model->GETCATEGORYGROUP($idChampionship,$idCategory);
	    	$idCategoryGroup=$categoryGroup->getIdCategoryGroup();
	    	$respuesta=$categoryGroup_model->SETGROUPPAIR($idPair,$idCategoryGroup);


	    	


	    }
	    new MESSAGE($respuesta, '../Controller/Main_Controller.php');


        
	
		break;
	default: 
			new Main_View();
			break;
}
