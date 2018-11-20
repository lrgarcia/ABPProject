<?php
require_once ('../Model/Pair.php');
require_once ('../Model/Access_DB.php');

class Pair_Model
{
    var $mysqli;
    var $pair;
    
    function __construct()
    {
        $this->pair = new Pair();
        $this->mysqli = ConnectDB();
    }
    
    public function ADD ($pair){
        
        $insert = "INSERT INTO pair (idCaptain, idParter) VALUES('" . $pair->getIdCaptain() . "','" . $pair->getIdPartner() . "');";
        if ($this->mysqli->query($insert)) {
            return "Se ha creado la pareja";
        } else{
            return "Lo sentimos, no se ha podido crear la pareja";
        }
    }
    
    public function DELETE ($idPair)
    {
        
        
        $this->mysql = conectarBD();
        $sql = "DELETE FROM pair WHERE idPair='" . $idPair . "';";
        if ($this->mysqli->query($sql)) {
            
            return "Se ha eliminado correctamente la pareja";
            
        } else {
            return "Lo sentimos, no se ha podido eliminar la pareja";
        }
    }
    
    public function EDIT ($pair)
    {
        $sql = "UPDATE pair SET idCaptain='" . $pair->getIdCaptain() . "', idPartner='" . $pair->getIdPartner() . "' WHERE idPair='" . $pair->getIdPair() . "';";
        if ($this->mysqli->query($sql)) {
            return "La pareja ha sido modificado correctamente";
            
        } else {
            return "Lo sentimos, no se ha podido modificar la pareja";
        }
    }
    
    public function GETBYID ($idPair)
    {
        $sql = "SELECT * FROM pair WHERE idPair ='" . $idPair . "';";
        $result = $this->mysqli->query($sql);
        return $result;
    }
    
    public function GETALL ()
    {
        $sql = "SELECT * FROM pair";
        $result = $this->mysqli->query($sql);
        return $result;
    }
}
?>