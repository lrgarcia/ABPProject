<?php
require_once ('../Model/Championship.php');
require_once ('../Model/Access_DB.php');

class Championship_Model
{
    var $championship;
    var $mysqly;
    
    function __construct()
    {  
        $this->championship = new Championship();
        $this->mysqli = ConnectDB();
    }
    
    function ADD ($championship){
     
        $insert = "INSERT INTO championship (name, dateStart, dateInscriptions) VALUES('" . $championship->getName() . "','" . $championship->getDateStart() . "','" . $championship->getDateInscriptions() . "');";
        if ($this->mysql->query($insert)) {
            return "Se ha creado el campeonato";
        } else{
            return "Lo sentimos, no se ha podido crear el campeonato";
        }
    }
    
    function DELETE ($idChampionship)
    {
        
        $this->mysql = conectarBD();
        $sql = "DELETE FROM championship WHERE idChampionship='" . $idChampionship . "';";
        if ($this->mysql->query($sql)) {
            
            return "Se ha eliminado correctamente el campeonato";
            
        } else {
            return "Lo sentimos, no se ha podido eliminar el campeonato";
        }
    }
    
    function EDIT ($championship)
    {
        $sql = "UPDATE championship SET name='" . $championship->getName() . "', dateStart='" . $championship->getDateStart() . "', dateInscriptions='" . $championship->getDateInscriptions() .
        "' WHERE idChampionship='" . $championship->getIdChampionship() . "';";
        if ($this->mysql->query($sql)) {
            return "El campeonato ha sido modificado correctamente";
            
        } else {
            return "Lo sentimos, no se ha podido modificar el campeonato";
        }
    }
    
    function GETBYID ($idChampionship)
    {
        $sql = "SELECT * FROM championship WHERE idChampionship ='" . $idChampionship . "';";
        $result = $this->mysqli->query($sql);
        return $result;
    }
    
    function GETALL ()
    {
        $sql = "SELECT * FROM championship";
        $result = $this->mysqly->query($sql);
        return $result;
    }
    
    function GETCATEGORIESBYID ($idChampionship){
        
        $sql = "SELECT * FROM category WHERE idCategory IN (SELECT idCategory FROM championship_category WHERE idChampionship='".$idChampionship."');";
        
        $result =$this->mysqli->query($sql);
        return $result;
    }
}
?>