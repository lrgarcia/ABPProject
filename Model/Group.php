<?php

class Group
{
    var $idGroup;
    var $idCategory;
    var $idChampionship;
    var $letter;
    
    function __construct($idGroup=null, $idCategory=null, $idCahmpionship=null, $letter=null) 
    {
        $this->idCategory=$idCategory;
        $this->idChampionship=$idCahmpionship;
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

}
?>