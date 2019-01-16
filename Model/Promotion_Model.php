<?php

require_once ('../Model/Promotion.php');
require_once ('../Model/Access_DB.php');

class Promotion_Model 
{
    var $mysqli;
    var $promotion;
    
    function __construct() 
    {
        $this->mysqli = ConnectDB();
        $this->promotion = new Promotion();
    }
    
    public function ADD ($promotion){
        
        $insert = "INSERT INTO promotion (idGame) VALUES('" . $promotion->getIdGame() . "');";
        if ($this->mysqli->query($insert)) {
            return "Se ha creado la promocion";
        } else{
            return "Lo sentimos, no se ha podido crear la promocion";
        }
    }
    
    public function DELETE ($idPromotion)
    {
        
        $this->mysqli = ConnectDB();
        $sql = "DELETE FROM promotion WHERE idPromotion='" . $idPromotion . "';";
        if ($this->mysqli->query($sql)) {
            
            return "Se ha eliminado correctamente la promocion";
            
        } else {
            return "Lo sentimos, no se ha podido eliminar la promocion";
        }
    }
    
    public function DELETEBYGAME ($idGame)
    {
        
        $this->mysqli = ConnectDB();
        $sql = "DELETE FROM promotion WHERE idGame='" . $idGame . "';";
        if ($this->mysqli->query($sql)) {
            
            return "Se ha eliminado correctamente la promocion";
            
        } else {
            return "Lo sentimos, no se ha podido eliminar la promocion";
        }
    }
    
    
    public function EDIT ($promotion)
    {
        $sql = "UPDATE promotion SET idGame='" . $promotion->getIdGame() . "' WHERE idPromotion='" . $promotion->getPromotion() . "';";
        if ($this->mysqli->query($sql)) {
            return "La promocion ha sido modificado correctamente";
            
        } else {
            return "Lo sentimos, no se ha podido modificar la promocion";
        }
    }
    
    public function GETBYID ($idPromotion)
    {
        $sql = "SELECT * FROM promotion WHERE idPromotion ='" . $idPromotion . "';";
        $result = $this->mysqli->query($sql);
        
        $array = mysqli_fetch_array($result, MYSQLI_BOTH);
        
        $promotion = new Promotion($array['idPromotion'], $array['idGame']);
        
        return $promotion;
    }
    
    public function GETALL ()
    {
        $sql = "SELECT * FROM promotion";
        $result = $this->mysqli->query($sql);
       
        $array = array();
        while( $row = mysqli_fetch_array($result, MYSQLI_BOTH))
        {
            $array[] = new Promotion($row['idPromotion'], $row['idGame']);
        }
        return $array;
    }
}