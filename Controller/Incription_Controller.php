<?php
session_start();

require_once '../Model/Championship_Model.php'
require_once '../Model/Category_Model.php'
require_once '../Model/Championship_Model.php'
require_once '../Model/Championship_Model.php'
    





    
    
    

if (!isset($_REQUEST['action'])){
	$_REQUEST['action'] = '';
}

Switch ($_REQUEST['action']){
	
	case 'ADD':
	    $captain=$_POST['name'];
	    $name2=$_POST['name2'];
        
	
		break;	

	default: 
			new Main_View();
			break;
}






















?>