<?php
	
session_start(); 
require_once '../Functions/Authentication.php';
require_once '../Model/Reservation_Model.php';
require_once '../Model/Reservation.php';
require_once '../Model/Court.php';
require_once '../Model/Court_Model.php';
require_once '../View/Court_SHOWALL_View.php';	
require_once '../View/MESSAGE_View.php';



if (!isset($_REQUEST['action'])){
	$_REQUEST['action'] = '';
}

Switch ($_REQUEST['action']){
	
	case 'ADD':
			$reservation_model = new Reservation_Model();
			$hour=$_REQUEST['hour'];
			$date=$_REQUEST['date'];
			echo $hour;
			echo $date;
			$idUser=$_SESSION['idUser'];
			$freeCourts= $reservation_model->FREECOURTSBYHOUR($date,$hour);
			$numberCourt=sizeof($freeCourts);
			$reservation= new Reservation(null,$numberCourt,$idUser,$date,$hour);
			$respuesta = $reservation_model->ADD($reservation);
			new MESSAGE($respuesta, '../Controller/Main_Controller.php');
		
		break;	

	default: 
			new Court_SHOWALL_View();
			break;
}


?>

