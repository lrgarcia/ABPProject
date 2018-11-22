<?php

class Group
{
    var $idGroup;
    var $idCategory;
    var $idChampionship;
    var $letter;
    
    function __construct($idGroup=null, $idCategory=null, $idChampionship=null, $letter=null) 
    {
        $this->idCategory=$idCategory;
        $this->idChampionship=$idChampionship;
        $this->idGroup=$idGroup;
        $this->letter;
    }
    
    public function getIdGroup()
    {
        return $this->idGroup;
    }

    public function getIdCategory()
    {
        return $this->idCategory;
    }

    public function getIdChampionship()
    {
        return $this->idChampionship;
    }
    
    public function getLetter()
    {
        return $this->letter;
    }
    
    public function setIdGroup($idGroup)
    {
        $this->idGroup = $idGroup;
    }

    public function setIdCategory($idCategory)
    {
        $this->idCategory = $idCategory;
    }

    public function setIdChampionship($idChampionship)
    {
        $this->idChampionship = $idChampionship;
    }

    public function setLetter($letter)
    {
        $this->letter = $letter;
    }

}
?>