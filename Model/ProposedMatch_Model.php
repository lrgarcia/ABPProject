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
        
        $insert = "INSERT INTO proposedmatch (idProposedMatch, idMatch, idPair,date,hour,available) VALUES('" . $proposedMatch->getIdProposedMatch() . "','" . $proposedMatch->getIdMatch() . "','".$proposedMatch->getIdPair()."','".$proposedMatch->getDate(). "','".$proposedMatch->getHour(). "','".$proposedMatch->getAvailable(). "');";

        error_log($insert,0);
        
        if ($this->mysqli->query($insert)) {
            return "Se ha creado la pareja";
        } else{
            return "Lo sentimos, no se ha podido crear la pareja";
        }
    }
    
    public function DELETE ($idPair,$date,$hour)
    {
        
        
       
        $sql = "DELETE FROM proposedmatch WHERE idPair='" . $idPair . "' AND date='".$date."' AND hour='".$hour."';";
        if ($this->mysqli->query($sql)) {
            
            return "Se ha eliminado correctamente la pareja";
            
        } else {
            return "Lo sentimos, no se ha podido eliminar la pareja";
        }
    }


    public function SETAVAILABLE($idMatch,$idPair,$date,$hour,$available){
        $sql = "UPDATE proposedmatch SET available='".$available."' WHERE idMatch='".$idMatch."' AND idPair='" . $idPair . "' AND date='".$date."' AND hour='".$hour."';";

        error_log($sql,0);
         if($this->mysqli->query($sql)) {
            return "Cambio hecho";
        }else{
            return "No se ha podido cambiar";
        }
    }
    


    public function GETCOMMONDATE($idMatch){

        $sql='SELECT p.date, p.hour  FROM proposedmatch p INNER JOIN proposedmatch r ON p.date=r.date AND p.hour=r.hour AND p.idMatch=r.idMatch AND r.idMatch='.$idMatch.' AND r.available=p.available AND r.available=`DISPONIBLE` AND p.idPair!=r.idPair;';


        $array = array();
        
        return $array;


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

         $array[] = new ProposedMatch($row['idProposedMatch'], $row['idMatch'], $row['idPair'], $row['date'], $row['hour'], $row['available']);
        }
        return $array;
    }


}
?>
