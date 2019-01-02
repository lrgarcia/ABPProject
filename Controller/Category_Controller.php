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
require_once '../View/Category_INSCRIPTION_View.php';
    
 


    
if (!isset($_REQUEST['action'])){
	$_REQUEST['action'] = '';
}
Switch ($_REQUEST['action']){
	
	case 'INSCRIPTION':
		if (!$_POST){
			$id_championship= $_REQUEST['idChampionship'];
            $championship_model= new Championship_Model();
            $championship= $championship_model->GETBYID($id_championship);

			$id_category= $_REQUEST['idCategory'];
            $category_model= new Category_Model();
            $category= $category_model->GETBYID($id_category);
			new Category_INSCRIPTION_View($championship,$category);
		}else{

		$respuesta="";
	    $captain=$_POST['name'];
	    $name2=$_POST['name2'];
	    $user_model = new User_Model();
	    $captainUser = $user_model->GETBYLOGIN($captain);
	    $partnerUser = $user_model->GETBYLOGIN($name2);
	    $idCaptainUser = $captainUser->getIdUser();
	    $idPartnerUser = $partnerUser->getIdUser();

	    $idCategory=$_POST['idCategory'];
	    $idChampionship=$_POST['idChampionship'];

	    $pair_model = new Pair_Model();
	    $categoryGroup_model = new CategoryGroup_Model();
	    $pair= new Pair(null,$idCaptainUser,$idPartnerUser);
	    $resultadoAñadirPareja=$pair_model->ADD($pair);
	    $pair=$pair_model->GETPAIR($idCaptainUser,$idPartnerUser);
	    $idPair=$pair->getIdPair();

	    $categorysGroup=array();
	  
	    	$categoryGroup = $categoryGroup_model->GETCATEGORYGROUP($idChampionship,$idCategory);
	    	$idCategoryGroup=$categoryGroup->getIdCategoryGroup();
	    	$respuesta=$categoryGroup_model->SETGROUPPAIR($idPair,$idCategoryGroup);


	    	


	    
	    new MESSAGE($respuesta, '../Controller/Main_Controller.php');


        }
	
		break;
		case 'SHOWINSCRIPTIONS':
		//Muestra todas las incripciones que tiene a ese campeonato, mostrando las categorias a las que se ha inscrito
		//

		    $captain=$_POST['name'];
		    $name2=$_POST['name2'];
		    $idChampionship=$_POST['idChampionship'];

		    $user_model = new User_Model();
		//
		    //Carga los login del capitan (que es el usuario) y su compañero

		    $captainUser = $user_model->GETBYLOGIN($captain);
		    $partnerUser = $user_model->GETBYLOGIN($name2);
		    $idCaptainUser = $captainUser->getIdUser();
		    $idPartnerUser = $partnerUser->getIdUser();

		    $pair_model = new Pair_Model();
		    $pair= new Pair(null,$idCaptainUser,$idPartnerUser);
		    $pair=$pair_model->GETPAIR($idCaptainUser,$idPartnerUser);

		    //Obtienes la pareja
	   	    $idPair=$pair->getIdPair();

	   	    $categoryGroup_model= new CategoryGroup_Model();

	   	    $categoryGroupbyPair= $categoryGroup_model->GETCATEGORYGROUPBYPAIR($idChampionship, $idPair);

	   	    


	   	    //Quiero las parejas asignadas a una categoria 
	   	    //Quiero el grupo si lo tiene al que pertenecen dentro de esa categoria
	   	    //En pair_categoryGroup tengo idPair y el idCategoryGrooup
	   	    //En idCategoryGroup tengo la relacion idCampeonato y idCategory



	    


		break;

}
