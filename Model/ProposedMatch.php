<?php
class ProposedMatch {
    var $idProposedMatch;
    var $idMatch;
    var $idPair;
    var $date;
    var $hour;
    var $available;
    
    function __construct($idProposedMatch=null, $idMatch=null, $idPair=null, $date=null, $hour=null,$available=null)
    {
        $this->idProposedMatch=$idProposedMatch;
        $this->idMatch=$idMatch;
        $this->idPair=$idPair;
        $this->date=$date;
        $this->hour=$hour;
        $this->available=$available;
    }
    public function getIdProposedMatch()
    {
        return $this->idProposedMatch;
    }

    public function getIdMatch()
    {
        return $this->idMatch;
    }

    public function getIdPair()
    {
        return $this->idPair;
    }
    public function getDate()
    {
        return $this->date;
    }
    public function getHour()
    {
        return $this->hour;
    }
    public function getAvailable()
    {
        return $this->available;
    }
    
    public function setProposedMatch($idProposedMatch)
    {
        $this->idProposedMatch = $idProposedMatch;
    }

    public function setIdPair($idPair)
    {
        $this->idPair = $idPair;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }
    public function setIdMatch($idMatch)
    {
        $this->idMatch = $idMatch;
    }
    public function setHour($hour)
    {
        $this->hour = $hour;
    }

    public function setAvailable($available)
    {
        $this->available = $available;
    }
    

}
?>
