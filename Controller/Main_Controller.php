<?php

session_start(); 
include '../Functions/Authentication.php';
require_once '../Model/Game_Model.php';
require_once '../Model/Championship_Model.php';
require_once '../View/Championship_SHOWALL_View.php';
if (!IsAuthenticated()){
	header('Location:../index.php');
}
include '../Model/User_Model.php';
include '../Model/Promotion.php';
include '../Model/Promotion_Model.php';	
include '../View/Promotion_SHOWALL_View.php';	
include '../View/Main_View.php';
include '../View/MESSAGE_View.php';
include '../View/Results_SHOWALL_View.php';




if (!isset($_REQUEST['action'])){
	$_REQUEST['action'] = '';
}

Switch ($_REQUEST['action']){
	
	case 'COURT':
        require_once '../View/Court_SHOWALL_View.php';
		new Court_SHOWALL_View();
		break;	

	case 'CHAMPIONSHIP':
		$championship_model= new Championship_Model();
		$championships= $championship_model->GETALL();
		new Championship_SHOWALL_View($championships);
		break;
	case 'PROMOTION':
	    $promotion_model= new Promotion_Model();
	    $game_Model=new Game_Model();
	    $promotions= $promotion_model->GETALL();
	    $games=array();
	    foreach($promotions as $promotion)
	    {
	        $idPromotionGame=$promotion->getTdGame();
	        $game=$game_Model->GETBYID($idPromotionGame);
	        $date=$game->getDate();
	        $arrayDate= explode("/", $date);
	        $date=$arrayDate[2] . $arrayDate[1] . $arrayDate[0];
	        $actualDate=getdate();
	        $actualDate=$actualDate['year'] . $actualDate['mon'] . $actualDate['wday'];
	        if($actualDate<=$date){
	        array_push($games, $game);
	        }
	    }
	    new Promotion_SHOWALL_View($games);
		break;

    case 'RESULTS':
        $championship_model= new Championship_Model();
        $championships= $championship_model->GETALL();
        new Results_SHOWALL_View($championships);
        break;
	default: 
			new Main_View();
			break;
}



 


?>
