<?php

session_start();
include '../Functions/Authentication.php';
if (!IsAuthenticated()){
    header('Location:../index.php');
}
include '../View/Court_ADD_View.php';
require_once '../View/Court_SHOWALL_View.php';
require_once '../Model/Court.php';
require_once '../Model/Court_Model.php';
//require_once '../View/Championship_SHOWCURRENT_View.php';




include '../View/MESSAGE_View.php';




function get_data_court(){
    
    //$login_creator = $_SESSION['login'];
    if(isset($_REQUEST['idCourt']))
    {
        $idCourt = $_REQUEST['idCourt'];
    } else {
        $idCourt = null;
    }
    
    $number = $_REQUEST['number'];
    $court = new Court($idCourt, $number);
    
    return $court;
    
}
/*
function set_data_championship(){
    
    $login_creator = $_SESSION['login'];
    
    $idChampionship = $_POST['idChampionship'];
    $name = $_POST['name'];
    $dateStart = $_POST['dateStart'];
    $dateInscriptions = $_POST['dateInscriptions'];
    $championship = new Championship($idChampionship, $name, $dateStart, $dateInscriptions);
    
    return $championship;
    
}
*/

if (!isset($_REQUEST['action'])){
    $_REQUEST['action'] = '';
}
Switch ($_REQUEST['action']){
   
        
    case 'ADD':
        if (!$_POST){
            new Court_ADD_View();
        }
        else{
            $court = get_data_court();
            $court_model = new Court_Model();
             
            $court_check = $court_model->GETBYNUMBER($court->getNumber());
            if($court_check->getNumber() != $court->getNumber()){
                $respuesta = $court_model->ADD($court);
                new MESSAGE($respuesta, '../Controller/Court_Controller.php');
                break;
            }
            $respuesta = 'Pista duplicada';
            new MESSAGE($respuesta, '../Controller/Court_Controller.php');
        }
        break;

        
    
        
    case 'DELETE':
        $id_court = $_REQUEST['idCourt'];
        $court_model= new Court_Model();
        $respuesta = $court_model->DELETE($id_court);
        
        new MESSAGE($respuesta, '../Controller/Main_Controller.php?action=COURT');
        
        break;
        
        
    default:
        
        $court_model= new Court_Model();
        $courts= $court_model->GETALL();
        new Court_SHOWALL_View($courts);
        break;
}
?>