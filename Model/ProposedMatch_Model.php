<?php
require_once ('../Model/Pair.php');
require_once ('../Model/Access_DB.php');

class ProposedMatch_Model
{
    var $mysqli;
    var $proposedMatch;
    
    function __construct()
    {
        $this->proposedMatch = new proposedMatch();
        $this->mysqli = ConnectDB();
    }
    
    public function ADD ($proposedMatch){
        
        $insert = "INSERT INTO proposedmatch (idMatch, idPair,date,hour,) VALUES('" . $proposedmatch->getIdProposedMatch() . "','" . $proposedMatch->getIdMatch() . "','".$proposedMatch->getIdPair()."','".$proposedMatch->getDate(). "','".$proposedMatch->getHour(). "');";
        
        if ($this->mysqli->query($insert)) {
            return "Se ha creado la pareja";
        } else{
            return "Lo sentimos, no se ha podido crear la pareja";
        }
    }
    
    public function DELETE ($idPair,$date,$hour)
    {
        
        
        $this->mysqli = conectarBD();
        $sql = "DELETE FROM proposedmatch WHERE idPair='" . $idPair . "' AND date='".$date."' AND hour='".$hour."';";
        if ($this->mysqli->query($sql)) {
            
            return "Se ha eliminado correctamente la pareja";
            
        } else {
            return "Lo sentimos, no se ha podido eliminar la pareja";
        }
    }
    
    // public function EDIT ($proposedMatch)
    // {
    //     $sql = "UPDATE pair SET idCaptain='" . $proposedMatch->getIdCaptain() . "', idPartner='" . $proposedMatch->getIdPartner() . "' WHERE idproposedMatch='" . $pair->getIdPair() . "';";
    //     if ($this->mysqli->query($sql)) {
    //         return "La pareja ha sido modificado correctamente";
            
    //     } else {
    //         return "Lo sentimos, no se ha podido modificar la pareja";
    //     }
    // }
    
    // public function GETBYID ($idPair)
    // {
    //     $sql = "SELECT * FROM pair WHERE idPair ='" . $idPair . "';";
    //     $result = $this->mysqli->query($sql);
        
    //     $array = mysqli_fetch_array($result, MYSQLI_BOTH);
        
    //     $pair = new Pair($array['idPair'], $array['idCaptain'], $array['idPartner']);
        
    //     return $pair;
    // }

    //  public function GETPAIR ($idCaptain,$idPartner)
    // {
    //     $sql = "SELECT * FROM pair WHERE idCaptain = '" . $idCaptain . "'AND idPartner='".$idPartner."';";

    //     $result = $this->mysqli->query($sql);
    //      $array = mysqli_fetch_array($result, MYSQLI_BOTH); 
    //     $pair = new Pair($array['idPair'], $array['idCaptain'], $array['idPartner']);
        
        
    //     return $pair;   
        
    // }


    
    public function GETPROPOSEDMATCH ($idMatch,$idPair)
    {
        $sql = "SELECT * FROM proposedmatch WHERE idMatch='".$idMatch."' AND idPair='".$idPair."';";
        $result = $this->mysqli->query($sql);
        
        $array = array();
        while( $row = mysqli_fetch_array($result, MYSQLI_BOTH))
        {

         $array[] = new ProposedMatch($row['idProposedMatch'], $row['idMatch'], $row['idPair'], $row['date'], $row['hour']);
        }
        return $array;
    }


}
?>
