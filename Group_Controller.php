<?php
session_start();
require_once '../Model/Championship_Model.php';
require_once '../Model/Championship.php';
require_once '../Model/Category_Model.php';
require_once '../Model/Category.php';
require_once '../Model/Group_Model.php';
require_once '../Model/Group.php';
require_once '../Model/Pair_Model.php';
require_once '../Model/Pair.php';
require_once '../Model/User_Model.php';
require_once '../Model/User.php';
require_once '../Model/CategoryGroup.php';
require_once '../Model/CategoryGroup_Model.php';
require_once '../View/MESSAGE_View.php';
require_once '../View/Category_INSCRIPTION_View.php';
require_once '../View/Group_SHOWALL_View.php';
require_once '../View/Group_SHOWCLASIFICATION_View.php';    
 


    
if (!isset($_REQUEST['action'])){
	$_REQUEST['action'] = '';
}
switch ($_REQUEST['action']){
	
	
		case 'SHOWCLASIFICATION':
		//Muestra todas las incripciones que tiene a ese campeonato, mostrando las categorias a las que se ha inscrito
		//

		    // $captain=$_POST['name'];
		    // $name2=$_POST['name2'];
		    $idChampionship=$_REQUEST['idChampionship'];
		    $idCategory=$_REQUEST['idCategory'];
		    $idGroup=$_REQUEST['idGroup'];

		    $user_model = new User_Model();

		    $user= $user_model->GETBYLOGIN($_SESSION['login']);
		    
		//
		    //Carga los login del capitan (que es el usuario) y su compañero

		    // $captainUser = $user_model->GETBYLOGIN($captain);
		    // $partnerUser = $user_model->GETBYLOGIN($name2);
		    // $idCaptainUser = $captainUser->getIdUser();
		    // $idPartnerUser = $partnerUser->getIdUser();
		    $championship_model = new Championship_Model();
		    $group_model = new Group_Model();
		    $category_model = new Category_Model();

		    $championship = $championship_model->GETBYID($idChampionship);
		    $matchs=$group_model->GETGROUPMATCHS($idGroup);
		    $category = $category_model->GETBYID($idCategory);
		    $group = $group_model->GETBYID($idGroup);


		    new Group_SHOWCLASIFICATION_View($group,$category,$championship,$matchs,$user);


		    //Obtienes la pareja
	   	    // $idPair=$pair->getIdPair();

	   	    // $categoryGroup_model= new CategoryGroup_Model();

	   	    // $categoryGroupbyPair= $categoryGroup_model->GETCATEGORYGROUPBYPAIR($idChampionship, $idPair);
 

		break;

}
