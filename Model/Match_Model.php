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
        
        $insert = "INSERT INTO match (date, hour, result, idGroup, idPair1, idPair2) VALUES('" . $match->getDate() . "','".$match->getHour()."','".$match->getResult()."','". $match->getIdGroup() . "','".$match->getIdPair1()."','".$match->getIdPair2()."');";
        if ($this->mysqli->query($insert)) {
            return "Se ha creado el enfrentamiento";
        } else{
            return "Lo sentimos, no se ha podido crear el enfrentamiento";
        }
    }
    
    public function DELETE ($idMatch)
    {
        
        
        $this->mysqli = conectarBD();
        $sql = "DELETE FROM match WHERE idMatch='" . $idMatch . "';";
        if ($this->mysqli->query($sql)) {
            
            return "Se ha eliminado correctamente el enfrentamiento";
            
        } else {
            return "Lo sentimos, no se ha podido eliminar el enfrentamiento";
        }
    }
    
    public function EDIT ($match)
    {
        $sql = "UPDATE match SET date='" . $match->getDate() . "', hour='" . $match->getHour() . "', result='" . $match->getResult() . "', idGroup='" . $match->getIdGroup() . "', idPair1='" . $match->getIdPair1() . "', idPair2='" . $match->getIdPair2() . "' WHERE idMatch='" . $match->getIdMatch() . "';";
        if ($this->mysqli->query($sql)) {
            return "El enfrentamiento ha sido modificado correctamente";
            
        } else {
            return "Lo sentimos, no se ha podido modificar el enfrentamiento";
        }
    }
    
    public function GETBYID ($idMatch)
    {
        $sql = "SELECT * FROM match WHERE idMatch ='" . $idMatch . "';";
        $result = $this->mysqli->query($sql);
        return $result;
    }
    
    public function GETALL ()
    {
        $sql = "SELECT * FROM match";
        $result = $this->mysqli->query($sql);
        return $result;
    }
    
}