<?php

class Category 
{
    var $idCategory;
    var $category;
    var $modality;
    
    function __construct($idCategory=null, $category=null, $modality=null)
    {
        $this->category=$category;
        $this->idCategory=$idCategory;
        $this->modaliy=$modality;
    }
    
    public function getIdCategory()
    {
        return $this->idCategory;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function getModality()
    {
        return $this->modality;
    }
    
    public function setIdCategory($idCategory)
    {
        $this->idCategory = $idCategory;
    }

    public function setCategory($category)
    {
        $this->category = $category;
    }

    public function setModaliy($modality)
    {
        $this->modaliy = $modality;
    }
}
?>