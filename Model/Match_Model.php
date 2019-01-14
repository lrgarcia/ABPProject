<?php

require_once ('../Model/Match.php');
require_once ('../Model/Access_DB.php');


class Match_Model
{
    var $mysqli;
    var $match;
    
    function __construct() 
    {
        $this->mysqli = ConnectDB();
        $this->match = new Match();
    }
    
    public function ADD ($match){
        
        $insert = "INSERT INTO `match` (date, hour, result, idGroup, idPair1, idPair2, round) VALUES('" . $match->getDate() . "','".$match->getHour()."','".$match->getResult()."','". $match->getIdGroup() . "','".$match->getIdPair1()."','".$match->getIdPair2()."','".$match->getRound()."');";
        if ($this->mysqli->query($insert)) {
            return "Se ha creado el enfrentamiento";
        } else{
            return "Lo sentimos, no se ha podido crear el enfrentamiento";
        }
    }
    
    public function DELETE ($idMatch)
    {
        
        
        $this->mysqli = conectarBD();
        $sql = "DELETE FROM `match` WHERE idMatch='" . $idMatch . "';";
        if ($this->mysqli->query($sql)) {
            
            return "Se ha eliminado correctamente el enfrentamiento";
            
        } else {
            return "Lo sentimos, no se ha podido eliminar el enfrentamiento";
        }
    }
    
    public function EDIT ($match)
    {
        $sql = "UPDATE `match` SET date='" . $match->getDate() . "', hour='" . $match->getHour() . "', result='" . $match->getResult() . "', idGroup='" . $match->getIdGroup() . "', idPair1='" . $match->getIdPair1() . "', idPair2='" . $match->getIdPair2() . "', round='".$match->getRound()."' WHERE idMatch='" . $match->getIdMatch() . "';";
        if ($this->mysqli->query($sql)) {
            return "El enfrentamiento ha sido modificado correctamente";
            
        } else {
            return "Lo sentimos, no se ha podido modificar el enfrentamiento";
        }
    }
    
    public function GETBYID ($idMatch)
    {
        $sql = "SELECT * FROM `match` WHERE idMatch ='" . $idMatch . "';";
        $result = $this->mysqli->query($sql);
        
        $array = mysqli_fetch_array($result, MYSQLI_BOTH);
        
        $match = new Match($array['idMatch'], $array['date'], $array['result'], $array['idGroup'], $array['idPair1'], $array['idPair2'], $array['hour'],$array['round']);
        
        return $match;
    }
    
    public function GETALL ()
    {
        $sql = "SELECT * FROM `match`";
        $result = $this->mysqli->query($sql);
        
        $array = array();
        while( $row = mysqli_fetch_array($result, MYSQLI_BOTH))
        {
            $array[] = new Match($row['idMatch'], $row['date'], $row['hour'], $row['result'], $row['idGroup'], $row['idPair1'], $row['idPair2'], $row['round']);
        }
        return $array;
    }

    public function GETMATCHBYPAIR($idGroup,$idPair1,$idPair2,$round){

        $sql = "SELECT * FROM `match` WHERE idGroup ='" . $idGroup . "' AND idPair1 = '".$idPair1."' AND idPair2 = '".$idPair2."' AND round='".$round."';";

    }

}