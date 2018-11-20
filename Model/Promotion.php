<?php

class Promotion
{
    var $idPromotion;
    var $idGame;
    
    function __construct($idPromotion=null, $idGame=null) 
    {
        $this->idGame=$idGame;
        $this->idPromotion=$idPromotion;
    }
    
    public function getIdPromotion()
    {
        return $this->idPromotion;
    }

    public function getIdGame()
    {
        return $this->idGame;
    }
    
}
?>