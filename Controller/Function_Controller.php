<?php
 session_start(); 
 header('Content-Type: application/json');

require_once '../Model/Reservation.php';
require_once '../Model/Reservation_Model.php';






function getFreeCourt($day,$month,$year){

  $date=$day."/".$month."/".$year;
  $reservation = new Reservation_Model();
  $hour="12:30"
  $freeCourts=$reservation->FREECOURTSBYHOUR($date,"hour");
  $toret=array();

  foreach($freeCourts as $freeCourt){
    $i=0;
    $idCourt=  $freeCourt->getIdCourt();
    $numberCourt=  $freeCourt-> getNumber();
    $toret[$i]['idCourt']=$idCourt;
    $toret[$i]['numerCourt']=$idCourt;
    $toret[$i]['hour']=$hour;
    $i++;
  }



  return $toret;


}

    $aResult = array();

    if( !isset($_POST['functionname']) ) { $aResult['error'] = 'No function name!'; }

    if( !isset($_POST['arguments']) ) { $aResult['error'] = 'No function arguments!'; }

    if( !isset($aResult['error']) ) {

        switch($_POST['functionname']) {
            case 'getFreeCourt':
               if( !is_array($_POST['arguments']) || (count($_POST['arguments']) < 2) ) {
                   $aResult['error'] = 'Error in arguments!';
               }
               else {
                   $aResult['result'] =  getFreeCourt($_POST['arguments'][0], $_POST['arguments'][1],$_POST['arguments'][2]);
               }
               break;

            default:
               $aResult['error'] = 'Not found function '.$_POST['functionname'].'!';
               break;
        }

    }

    echo json_encode($aResult);

?>