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
require_once '../Model/ProposedMatch_Model.php';
require_once '../Model/ProposedMatch.php';
require_once '../Model/User_Model.php';
require_once '../Model/Reservation.php';
require_once '../Model/Reservation_Model.php';
require_once '../Model/User.php';
require_once '../Model/CategoryGroup.php';
require_once '../Model/CategoryGroup_Model.php';
require_once '../View/MESSAGE_View.php';
require_once '../View/Category_INSCRIPTION_View.php';
require_once '../View/Group_SHOWALL_View.php';
require_once '../View/Group_SHOWCLASIFICATION_View.php';   
require_once '../View/Match_SHOWDATEPROPOSAL_View.php';   
require_once '../View/Match_SHOWMATCH_View.php';   
require_once '../View/Match_EDITRESULT_View.php';   

require_once '../View/MESSAGE_View.php';
 


    
if (!isset($_REQUEST['action'])){
	$_REQUEST['action'] = '';
}
switch ($_REQUEST['action']){
	
	
		case 'SHOWDATEPROPOSAL':
		//Muestra todas las incripciones que tiene a ese campeonato, mostrando las categorias a las que se ha inscrito
		//

		    // $captain=$_POST['name'];
		    // $name2=$_POST['name2'];
		    $idChampionship=$_REQUEST['idChampionship'];
		    $idCategory=$_REQUEST['idCategory'];
		    $idGroup=$_REQUEST['idGroup'];
		    $idPair1=$_REQUEST['idPair1'];
		    $idPair2=$_REQUEST['idPair2'];

		    $user_model = new User_Model();

		    $user= $user_model->GETBYLOGIN($_SESSION['login']);
		    $idUser= $user->getIdUser();



		    
		    
		//
		    //Carga los login del capitan (que es el usuario) y su compañero

		    // $captainUser = $user_model->GETBYLOGIN($captain);
		    // $partnerUser = $user_model->GETBYLOGIN($name2);
		    // $idCaptainUser = $captainUser->getIdUser();
		    // $idPartnerUser = $partnerUser->getIdUser();

		    //////////CARGA DE MODELOS////////////////////////
		    $championship_model = new Championship_Model();
		    $group_model = new Group_Model();
		    $category_model = new Category_Model();
		    $pair_model = new Pair_Model();
		    $match_model = new Match_Model();
		    $proposedMatch_model = new ProposedMatch_Model();







		    $championship = $championship_model->GETBYID($idChampionship);
		    
		    $category = $category_model->GETBYID($idCategory);
		    $group = $group_model->GETBYID($idGroup);
		    $match = $match_model->GETMATCHBYPAIR($idGroup,$idPair1,$idPair2,1);
		    $idMatch=$match->idMatch;
		    //echo $idMatch;

		   $matchs=$group_model->GETGROUPMATCHS($idGroup);



		    /////////////////////////////////////////////////////
		    $pair1=$pair_model->GETBYID($idPair1);
		    $pair2=$pair_model->GETBYID($idPair2);

		    //La propuesta 1 debera ser SIEMPRE del usuario logeado
		    $idCaptain1=$pair1->getIdCaptain();
		    $idCaptain2=$pair2->getIdCaptain();

		    if($idUser==$idCaptain1){
		    	$proposedMatchsPairLogged= $proposedMatch_model->GETPROPOSEDMATCH($idMatch,$idPair1);
		    	$proposedMatchsPair2= $proposedMatch_model->GETPROPOSEDMATCH($idMatch,$idPair2);

		    }else if($idUser==$idCaptain2){
		    	$proposedMatchsPairLogged= $proposedMatch_model->GETPROPOSEDMATCH($idMatch,$idPair2);
		    	$proposedMatchsPair2= $proposedMatch_model->GETPROPOSEDMATCH($idMatch,$idPair1);


		    }




		   // $proposedMatchsPair1= $proposedMatch_model->GETPROPOSEDMATCH($idMatch,$idPair1);
		   // $proposedMatchsPair2= $proposedMatch_model->GETPROPOSEDMATCH($idMatch,$idPair2);


		   


		   /////////////////////////////////////GENERACION DE PROPUESTAS///////////////////////////////////


		   ////////////////////////////////////////////////////////////////////////////////////////////////







		    new Match_SHOWDATEPROPOSAL_View($group,$category,$championship,$match,$user,$proposedMatchsPairLogged,$proposedMatchsPair2);


		    //Obtienes la pareja
	   	    // $idPair=$pair->getIdPair();

	   	    // $categoryGroup_model= new CategoryGroup_Model();

	   	    // $categoryGroupbyPair= $categoryGroup_model->GETCATEGORYGROUPBYPAIR($idChampionship, $idPair);


		break;

		case 'CONFIRMDATE':
		$idMatch=$_REQUEST['idMatch'];
		//echo($idMatch);
		$proposedMatch_model = new ProposedMatch_Model();
		$match_model = new Match_Model();
		$reservation_model = new Reservation_Model();
		$match = $match_model->GETBYID($idMatch);

		$proposedDate= $proposedMatch_model->GETCOMMONDATE($idMatch);
		if(sizeof($proposedDate)==0){
			$respuesta="Se han subido sus horas disponibles. Por favor espere la confirmación de su contrincante";
			new MESSAGE($respuesta, '../Controller/Championship_Controller.php');
			
		}else{
			$firstProposedDate=$proposedDate[0];
			echo $firstProposedDate['date']."      ";
			$date=$firstProposedDate['date'];
			$hour=$firstProposedDate['hour'];
			

			$dateStartFormatCourt=date("d/m/Y", strtotime($date));
			echo $dateStartFormatCourt;

			//DE PROPOSEDMATCH 2018-11-10
			// DE RESERVATION 02/02/2018

			$idUser=$_SESSION['idUser'];
			$freeCourts= $reservation_model->FREECOURTSBYHOUR($date,$hour);
			$numberCourt=sizeof($freeCourts);
			$reservation= new Reservation(null,$numberCourt,$idUser,$dateStartFormatCourt,$hour);
			$response = $reservation_model->ADD($reservation);
			$match->setDate($date);
			$match->setHour($hour);
			$responseEdit = $match_model->EDIT($match);



			$respuesta="Su partido está preparado! La fecha será el ".$date." a las ".$hour." en la pista ".$numberCourt;
			new MESSAGE($respuesta, '../Controller/Championship_Controller.php');
		}

		break;



		case 'SHOWMATCH':
		$idChampionship=$_REQUEST['idChampionship'];
		$idCategory=$_REQUEST['idCategory'];
		    $idGroup=$_REQUEST['idGroup'];
		    $idPair1=$_REQUEST['idPair1'];
		    $idPair2=$_REQUEST['idPair2'];

		$idChampionship=$_REQUEST['idChampionship'];
		new Match_SHOWMATCH_View($championship);


		break;


		case 'EDITRESULT':
		if (!$_POST){
			$idGroup=$_REQUEST['idGroup'];
		    $idPair1=$_REQUEST['idPair1'];
		    $idPair2=$_REQUEST['idPair2'];
			
		    
		    new Match_EDITRESULT_View($idGroup,$idPair1,$idPair2);



			
		}else{

			$set1Pareja1=$_REQUEST['set1Pareja1'];
		    $set1Pareja2=$_REQUEST['set1Pareja2'];
		    $set2Pareja1=$_REQUEST['set2Pareja1'];
		    $set2Pareja2=$_REQUEST['set2Pareja2'];
		    $set3Pareja1=$_REQUEST['set3Pareja1'];
		    $set3Pareja2=$_REQUEST['set3Pareja2'];

		    $idGroup=$_REQUEST['idGroup'];
		    $idPair1=$_REQUEST['idPair1'];
		    $idPair2=$_REQUEST['idPair2'];
		    $match_model = new Match_Model();
		    $match = $match_model->GETMATCHBYPAIR($idGroup,$idPair1,$idPair2,1);
			


		    $result="".$set1Pareja1."-".$set1Pareja2."/"."set2Pareja1"."-".$set2Pareja2."/".$set3Pareja1."-".$set3Pareja2;

		    $match->setResult($result);
		    $responseEdit = $match_model->EDIT($match);
		    new MESSAGE($responseEdit, '../Controller/Championship_Controller.php');




		}

		break;




}
