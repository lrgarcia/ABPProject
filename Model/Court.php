<?php

class Court
{
    var $idCourt;
    var $number;
    
    function __construct($idCourt=null, $number=null)
    {
        $this->idCourt=$idCourt;
        $this->number=$number;
    }
    public function getIdCourt()
    {
        return $this->idCourt;
    }

    public function getNumber()
    {
        return $this->number;
    }

}
?>