<?php

session_start();
include '../Functions/Authentication.php';
if (!IsAuthenticated()){
	header('Location:../index.php');
}

require_once '../Model/Promotion_Model.php';
require_once '../Model/Championship_Model.php';
require_once '../Model/Game.php';
require_once '../Model/Game_Model.php';
require_once '../View/Promotion_SHOWALL_View.php';
require_once '../View/Promotion_ADD_view.php';


include '../View/MESSAGE_View.php';


// Agui se debe meter los atributos del campeonato que ha recibido de la vista para luego crear el objeto campeonato


if (!isset($_REQUEST['action'])){
    $_REQUEST['action'] = '';
}

Switch ($_REQUEST['action']){

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
		
   

case 'ADD':
    // Si no se ha introducido el campeonato
    if (!$_POST){
        $game_model=new Game_Model();
        $games = $game_model->NOPROMOTED();
        $gamesInTime = array();
        foreach($games as $game)
        {
            $date=$game->getDate();
            $arrayDate= explode("/", $date);
            $date=$arrayDate[0] . $arrayDate[1] . $arrayDate[2];
            $actualDate=getdate();
            $parsedActualDate=$actualDate['year']; 
            if($actualDate['mon']<10){
                $parsedActualDate = $parsedActualDate . '0' . $actualDate['mon'];
            } else {
                $parsedActualDate = $parsedActualDate . $actualDate['mon'];
            }
            if($actualDate['mday'] < 10){
                $parsedActualDate = $parsedActualDate . '0' . $actualDate['mday'];
            } else {
                $parsedActualDate = $parsedActualDate . $actualDate['mday'];
            }
            if($parsedActualDate<=$date){
                array_push($gamesInTime, $game);
            }
        }
        new Promotion_ADD_View($gamesInTime);
    }
    // Aqui se meterá que datos ha pillado una vez se ha hecho introducido los datos del campeonato
    else{
       
        $promotion_model = new Promotion_Model();
        $promotion = new Promotion(null, $_REQUEST['idGame']);
        $respuesta = $promotion_model->ADD($promotion);
       
        new MESSAGE($respuesta, '../Controller/Promotion_Controller.php');
    }
    break;
    


case 'DELETE':
    $idGame= $_REQUEST['idPromotion'];
    $promotion_model= new Promotion_Model();
    $respuesta = $promotion_model->DELETEBYGAME($idGame);

    new MESSAGE($respuesta, '../Controller/Main_Controller.php?action=PROMOTION');

    break;

default:
    $promotion_model= new Promotion_Model();
    $game_Model=new Game_Model();
    $promotions= $promotion_model->GETALL();
    $games=array();
    foreach($promotions as $promotion)
    {
        $idPromotionGame=$promotion->getIdGame();
        $game=$game_Model->GETBYID($idPromotionGame);
        $date=$game->getDate();
        $arrayDate= explode("/", $date);
        $date=$arrayDate[0] . $arrayDate[1] . $arrayDate[2];
        $actualDate=getdate();
        $parsedActualDate=$actualDate['year'];
        if($actualDate['mon']<10){
            $parsedActualDate = $parsedActualDate . '0' . $actualDate['mon'];
        } else {
            $parsedActualDate = $parsedActualDate . $actualDate['mon'];
        }
        if($actualDate['mday'] < 10){
            $parsedActualDate = $parsedActualDate . '0' . $actualDate['mday'];
        } else {
            $parsedActualDate = $parsedActualDate . $actualDate['mday'];
        }
        if($parsedActualDate<=$date){
            array_push($games, $game);
        }
    }
    new Promotion_SHOWALL_View($games);
break;
}
?>

