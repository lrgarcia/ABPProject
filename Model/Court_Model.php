<?php

require_once ('../Model/Court.php');
require_once ('../Model/Access_DB.php');

class Court_Model
{
    var $court;
    var $mysqli;
    
    function __construct()
    {
        $this->court = new Court();
        $this->mysqli = ConnectDB();
    }
    
    public function ADD ($court){
        
        $insert = "INSERT INTO court (number) VALUES('" . $court->getNumber() . "');";
        if ($this->mysqli->query($insert)) {
            return "Se ha creado la pista";
        } else{
            return "Lo sentimos, no se ha podido crear la pista";
        }
    }
    
    public function DELETE ($idCourt)
    {
        $sql = "DELETE FROM court WHERE idCourt='" . $idCourt . "';";
        if ($this->mysqli->query($sql)) {
            
            return "Se ha eliminado correctamente la pista";
            
        } else {
            return "Lo sentimos, no se ha podido eliminar la pista";
        }
    }
    
    public function EDIT ($court)
    {
        $sql = "UPDATE court SET number='" . $court->getNumber() . "' WHERE idCourt='" . $court->getIdCourt() . "';";
        if ($this->mysqli->query($sql)) {
            return "La pista ha sido modificado correctamente";
            
        } else {
            return "Lo sentimos, no se ha podido modificar la pista";
        }
    }
    
    public function GETBYID ($idCourt)
    {
        $sql = "SELECT * FROM court WHERE idCourt ='" . $idCourt . "';";
        $result = $this->mysqli->query($sql);
        
        $array = mysqli_fetch_array($result, MYSQLI_BOTH);
        
        $court = new Court($array['idCourt'], $array['number']);
        
        return $court;
    }
    
    public function GETBYNUMBER ($number)
    {
        $sql = "SELECT * FROM court WHERE number ='" . $number . "';";
        $result = $this->mysqli->query($sql);
        
        $array = mysqli_fetch_array($result, MYSQLI_BOTH);
        
        $court = new Court($array['idCourt'], $array['number']);
        
        return $court;
    }
    
    public function GETALL ()
    {
        $sql = "SELECT * FROM court";
        $result = $this->mysqli->query($sql);
       
        $array = array();
        while( $row = mysqli_fetch_array($result, MYSQLI_BOTH))
        {
            $array[] = new Court($row['idCourt'], $row['number']);
        }
        return $array;
    }
    
    public function LASTID()
    {
        return $this->mysqli->insert_id;
    }
    
}


?>