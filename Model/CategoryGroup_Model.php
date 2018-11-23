<?php

require_once ('../Model/CategoryGroup.php');
require_once ('../Model/Pair.php');
require_once ('../Model/Access_DB.php');

class CategoryGroup_Model
{
    var $mysqli;
    var $categoryGroup;
    
    function __construct() 
    {
        $this->mysqli = ConnectDB();
        $this->categoryGroup = new CategoryGroup();
    }
    
    public function ADD ($categoryGroup){
        
        $insert = "INSERT INTO categorygroup (idChampionship, idCategory) VALUES('" . $categoryGroup->getIdChampionship() . "','" . $categoryGroup->getIdCategory() . "');";
        if ($this->mysqli->query($insert)) {
            return "Se ha creado el grupo de categoria";
        } else{
            return "Lo sentimos, no se ha podido crear el grupo de categoria";
        }
    }
    
    public function DELETE ($idCategoryGroup)
    {
        
        
        $this->mysqli = conectarBD();
        $sql = "DELETE FROM categorygroup WHERE idCategoryGroup='" . $idCategoryGroup . "';";
        if ($this->mysqli->query($sql)) {
            
            return "Se ha eliminado correctamente el grupo de categoria";
            
        } else {
            return "Lo sentimos, no se ha podido eliminar el grupo de categoria";
        }
    }
    
    public function EDIT ($categoryGroup)
    {
        $sql = "UPDATE categorygroup SET idChampionship='" . $categoryGroup->getIdChampionship() . "', idCategory='" . $categoryGroup->getIdCategory() . "' WHERE idCategoryGroup='" . $categoryGroup->getIdCategoryGroup() . "';";
        if ($this->mysqli->query($sql)) {
            return "El grupo de categoria ha sido modificado correctamente";
            
        } else {
            return "Lo sentimos, no se ha podido modificar el grupo de categoria";
        }
    }
    
    public function GETBYID ($idCategoryGroup)
    {
        $sql = "SELECT * FROM categorygroup WHERE idCategoryGroup ='" . $idCategoryGroup . "';";
        $result = $this->mysqli->query($sql);
        
        $array = mysqli_fetch_array($result, MYSQLI_BOTH);
        
        $categoryGroup = new CategoryGroup($array['idCategoryGroup'], $array['idChampionship'], $array['idCategory']);
        
        return $categoryGroup;   
        
    }

     public function GETCATEGORYGROUP ($idChampionship,$idCategory)
    {
        $sql = "SELECT * FROM categorygroup WHERE idChampionship = '"  .$idChampionship . "'AND idCategory='".$idCategory."';";
       
        $result = $this->mysqli->query($sql);   
        $array = mysqli_fetch_array($result, MYSQLI_BOTH); 
        $categoryGroup = new CategoryGroup($array['idCategoryGroup'], $array['idChampionship'], $array['idCategory']);
        
        return $categoryGroup;   
        
    }
    

    
    public function GETALL ()
    {
        $sql = "SELECT * FROM categorygroup";
        $result = $this->mysqli->query($sql);
        
        $array = array();
        while( $row = mysqli_fetch_array($result, MYSQLI_BOTH))
        {
            $array[] = new CategoryGroup($row['idCategoryGroup'], $row['idChampionship'], $row['idCategory']);
        }
        return $array;
    }
    
    public function GETGROUPPAIRS($idCategoryGroup){
        
        $sql = "SELECT * FROM pair WHERE idPair IN (SELECT idPair FROM pair_categorygroup WHERE idCategoryGroup='".$idCategoryGroup."');";
        $result =$this->mysqli->query($sql);
       
        $array = array();
        while( $row = mysqli_fetch_array($result, MYSQLI_BOTH))
        {
            $array[] = new Pair($row['idPair'], $row['idCaptain'], $row['idPartner']);
        }
        return $array;
    }
    
    public function SETGROUPPAIR($idPair, $idCategoryGroup) 
    {
        $insert = "INSERT INTO pair_categorygroup (idPair, idCategoryGroup) VALUES ('".$idPair."', '".$idCategoryGroup."');";
        echo $insert;
        if($this->mysqli->query($insert))
        {
            return "Se ha inscrito la pareja en el campeonato";    
        } else{
            return "Lo sentimos, no se ha podido inscribir a la pareja";
        }
    }
    
    public function GETCHAMPIONSHIPGROUPS($idChampionship)
    {
        $sql = "SELECT * FROM categorygroup WHERE idChampionship='".$idChampionship."';";
        $result = $this->mysqli->query($sql);
        
        $array = array();
        while( $row = mysqli_fetch_array($result, MYSQLI_BOTH))
        {
            $array[] = new CategoryGroup($row['idCategoryGroup'], $row['idChampionship'], $row['idCategory']);
        }
        return $array;
        
    }
}
?>
