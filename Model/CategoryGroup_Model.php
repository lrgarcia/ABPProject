<?php

require_once ('../Model/CategoryGroup.php');
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
        
        $categoryGroup = new CategoryGroup($array[idCategoryGroup], $array[idChampionship], $array[idCategory]);
        
        return $categoryGroup;   
        
    }
    
    public function GETALL ()
    {
        $sql = "SELECT * FROM categorygroup";
        $result = $this->mysqli->query($sql);
        return $result;
    }
    
    public function GETGROUPPAIRS($idCategoryGroup){
        
        $sql = "SELECT * FROM pair WHERE idPair IN (SELECT idPair FROM pair_categorygroup WHERE idCategoryGroup='".$idCategoryGroup."');";
        
        $result =$this->mysqli->query($sql);
        return $result;
    }
}
?>