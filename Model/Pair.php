<?php
class Pair {
    var $idPair;
    var $idCaptain;
    var $idPartner;
    
    function __construct($idPair=null, $idCaptain=null, $idPartner)
    {
        $this->idCaptain=$idCaptain;
        $this->idPair=$idPair;
        $this->idPartner=$idPartner;
    }
    public function getIdPair()
    {
        return $this->idPair;
    }

    public function getIdCaptain()
    {
        return $this->idCaptain;
    }

    public function getIdPartner()
    {
        return $this->idPartner;
    }

}
?>