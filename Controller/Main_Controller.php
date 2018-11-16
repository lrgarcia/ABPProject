<?php

session_start(); 
include '../Functions/Authentication.php';

if (!IsAuthenticated()){
	header('Location:../index.php');
}
include '../Model/User_Model.php';
include '../View/Court_SHOWALL_View.php';	
include '../View/Championship_SHOWALL_View.php';	
include '../View/PromotedMatch_SHOWALL_View.php';	
include '../View/Main_View.php';
include '../View/MESSAGE_View.php';


if (!isset($_REQUEST['action'])){
	$_REQUEST['action'] = '';
}

Switch ($_REQUEST['action']){
	
	case 'COURT':
		new Court_SHOWALL_View();
		break;	

	case 'CHAMPIONSHIP':
		new Championship_SHOWALL_View();
		break;
	case 'PROMOTEDMATCH':
		new PromotedMatch_SHOWALL_View();
		break;		

	default: 
			new Main_View();
			break;
}

?>
