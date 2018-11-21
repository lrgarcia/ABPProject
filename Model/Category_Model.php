<?php

require_once ('../Model/Category.php');
require_once ('../Model/Access_DB.php');

class Category_Model
{
    var $mysqli;
    var $category;
    
    
    function __construct()
    {
        $this->mysqli = ConnectDB();
        $this->category = new Category();
    }
    
    public function ADD ($category){
        
        $insert = "INSERT INTO category (category, modality) VALUES('" . $category->getCategory() . "','" . $category->getModality() . "');";
        if ($this->mysqli->query($insert)) {
            return "Se ha creado la categoria";
        } else{
            return "Lo sentimos, no se ha podido crear la categoria";
        }
    }
    
    public function DELETE ($idCategory)
    {
        
        
        $this->mysqli = conectarBD();
        $sql = "DELETE FROM category WHERE idCategory='" . $idCategory . "';";
        if ($this->mysqli->query($sql)) {
            
            return "Se ha eliminado correctamente la categoria";
            
        } else {
            return "Lo sentimos, no se ha podido eliminar la categoria";
        }
    }
    
    public function EDIT ($category)
    {
        $sql = "UPDATE category SET category='" . $category->getCategory() . "', modality='" . $category->getModality() . "' WHERE idPair='" . $category->getIdCategory() . "';";
        if ($this->mysqli->query($sql)) {
            return "La categoria ha sido modificado correctamente";
            
        } else {
            return "Lo sentimos, no se ha podido modificar la categoria";
        }
    }
    
    public function GETBYID ($idCategory)
    {
        $sql = "SELECT * FROM category WHERE idCategory ='" . $idCategory . "';";
        $result = $this->mysqli->query($sql);
        
        $array = mysqli_fetch_array($result, MYSQLI_BOTH);
        
        $category = new Category($array['idCategory'], $array['category'], $array['modality']);
        
        return $category;
    }
    
    public function GETALL ()
    {
        $sql = "SELECT * FROM category";
        $result = $this->mysqli->query($sql);
        
        $array = array();
        while( $row = mysqli_fetch_array($result, MYSQLI_BOTH))
        {
            $array[] = new Category($row['idCategory'], $row['category'], $row['modality']);
        }
        return $array;
    }
}