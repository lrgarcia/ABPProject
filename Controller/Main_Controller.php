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
		new Championship_SHOWALL_View($championships);
		break;
	case 'PROMOTEDMATCH':
		
		new PromotedMatch_SHOWALL_View();
		break;		

	default: 
			new Main_View();
			break;
}



  $aResult = array();
 

if (!isset($_REQUEST['functionname'])){
	$_REQUEST['functionname'] = '';
}
 echo $_REQUEST['functionname']; 
Switch ($_REQUEST['functionname']){
	
	case 'getFreeCourt':
	echo "owo";
	$result=getFreeCourt($_REQUEST['arguments'][0],$_REQUEST['arguments'][1],$_REQUEST['arguments'][2]);
	$aResult['result']=$result;
	break;

		default: 
			$aResult['error']="ERRROR!!!!!!!!";
			break;

}
json_encode($aResult);


?>
