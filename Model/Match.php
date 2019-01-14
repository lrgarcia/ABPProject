<?php

class Match
{
    var $idMatch;
    var $date;
    var $hour;
    var $result;
    var $idGroup;
    var $idPair1;
    var $idPair2;
    var $round;
    
    function __construct($idMatch=null, $date=null, $result=null, $idGroup=null, $idPair1=null, $idPair2=null, $hour=null,$round=1) 
    {
        $this->date=$date;
        $this->hour=$hour;
        $this->idGroup=$idGroup;
        $this->idMatch=$idMatch;
        $this->idPair1=$idPair1;
        $this->idPair2=$idPair2;
        $this->result=$result;
        $this->round=$round;
    }
    
    public function getIdMatch()
    {
        return $this->idMatch;
    }

    public function getDate()
    {
        return $this->date;
    }
    
    public function getHour()
    {
        return $this->hour;
    }

    public function getResult()
    {
        return $this->result;
    }

    public function getIdGroup()
    {
        return $this->idGroup;
    }

    public function getIdPair1()
    {
        return $this->idPair1;
    }

    public function getIdPair2()
    {
        return $this->idPair2;
    }
    public function getRound()
    {
        return $this->round;
    }
    public function setIdMatch($idMatch)
    {
        $this->idMatch = $idMatch;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function setHour($hour)
    {
        $this->hour = $hour;
    }

    public function setResult($result)
    {
        $this->result = $result;
    }

    public function setIdGroup($idGroup)
    {
        $this->idGroup = $idGroup;
    }

    public function setIdPair1($idPair1)
    {
        $this->idPair1 = $idPair1;
    }

    public function setIdPair2($idPair2)
    {
        $this->idPair2 = $idPair2;
    }
    public function setRound($round)
    {
        $this->round = $round;
    }

}