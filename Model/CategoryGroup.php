<?php

class CategoryGroup
{
    var $idCategoryGroup;
    var $idChampionship;
    var $idCategory;
    
    
    function __construct($idCategoryGroup=null, $idChampionship=null, $idCategory=null)
    {
        $this->idCategory=$idCategory;
        $this->idCategoryGroup=$idCategoryGroup;
        $this->idChampionship=$idChampionship;
    }
    
    public function getIdCategoryGroup()
    {
        return $this->idCategoryGroup;
    }

    public function getIdChampionship()
    {
        return $this->idChampionship;
    }

    public function getIdCategory()
    {
        return $this->idCategory;
    }

    public function setIdCategoryGroup($idCategoryGroup)
    {
        $this->idCategoryGroup = $idCategoryGroup;
    }

    public function setIdChampionship($idChampionship)
    {
        $this->idChampionship = $idChampionship;
    }

    public function setIdCategory($idCategory)
    {
        $this->idCategory = $idCategory;
    }
}
?>