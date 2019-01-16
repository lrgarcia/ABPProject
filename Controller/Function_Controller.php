 <?php
 session_start(); 
 header('Content-Type: application/json');

require_once '../Model/Reservation.php';
require_once '../Model/Reservation_Model.php';
require_once '../Model/ProposedMatch.php';
require_once '../Model/ProposedMatch_Model.php';
require_once '../Model/Court.php';
require_once '../Model/Court_Model.php';






function getFreeCourt($day,$month,$year){

  $date=$day."/".$month."/".$year;
  $reservation = new Reservation_Model();
  $hour=8;
  $minutes=0;
  $stringHour="12:30";


  
  $toret=array();
  $toret["1:00"][0]['date']=$date;
  $i=0;

 while($hour<22){
  if($minutes==60){
    $minutes=0;
    $hour+=1;
  }//Fin if minutos
  if($minutes==30){
    $stringHour="".$hour.":".$minutes;
  }else{
  //En caso que lo minutos sean igual a 0, añado un 0 mas para que tenga dos digitos siempre
    $stringHour="".$hour.":".$minutes."0";

  }//Fin creacion de stringHour

  $freeCourts = $reservation->FREECOURTSBYHOUR($date,$stringHour);
  // if(sizeof($freeCourts)==0){
  //   $toret[$stringHour]="OCCUPED";
  // }else{
  //   $toret[$stringHour]="FREE";
  // }


foreach($freeCourts as $freeCourt){
  $idCourt = $freeCourt->getIdCourt();
  $numberCourt = $freeCourt->getNumber();
  $toret[$stringHour][$i]['idCourt'] = $idCourt;
  $toret[$stringHour][$i]['numberCourt']=$numberCourt;
   $toret[$stringHour][$i]['date']=$date;
   // $toret[$stringHour][$i]['idUser']=$_SESSION['idUser']



 
  $i++;
}//Fin foreach
  $hour++;
  $minutes+=30;
}//Fin while


  // foreach($freeCourts as $freeCourt){
  //   $idCourt=  $freeCourt->getIdCourt();
  //   $numberCourt=  $freeCourt-> getNumber();
  //   $toret[$i]['idCourt']=$idCourt;
  //   $toret[$i]['numberCourt']=$idCourt;
  //   $toret[$i]['hour']=$hour;
  //   $i++;
    

  // }



  return $toret;


}



function setAvailable($idMatch,$idPair,$date,$hour,$available){
  $proposedMatch_model = new ProposedMatch_Model();
  $toret= $proposedMatch_model->SETAVAILABLE($idMatch,$idPair,$date,$hour,$available);
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








            case 'setAvailable':

             if( !is_array($_POST['arguments']) || (count($_POST['arguments']) < 5) ) {
                   $aResult['error'] = 'Error in arguments!';
               }
               else {
                   $aResult['result'] =  setAvailable($_POST['arguments'][0], $_POST['arguments'][1],$_POST['arguments'][2], $_POST['arguments'][3], $_POST['arguments'][4]);
               }
               break;


            default:
               $aResult['error'] = 'Not found function '.$_POST['functionname'].'!';
               break;
        }

    }

    echo json_encode($aResult);

?>