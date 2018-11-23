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

        public function SETGROUPPAIR($idPair, $idCategoryGroup)
    {
        $insert = "INSERT INTO pair_categorygroup (idPair, idCategoryGroup) VALUES ('".$idPair."', '".$idCategoryGroup."';";
        if($this->mysqli->query($insert))
        {
            return "Se ha inscrito la pareja en el campeonato";
        } else{
            return "Lo sentimos, no se ha podido inscribir a la pareja";
        }
    }
	default: 
			new Main_View();
			break;
}






















?>