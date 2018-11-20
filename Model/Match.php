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
    
    function __construct($idMatch=null, $date=null, $result=null, $idGroup=null, $idPair1=null, $idPair2=null, $hour=null) 
    {
        $this->date=$date;
        $this->hour=$hour;
        $this->idGroup=$idGroup;
        $this->idMatch=$idMatch;
        $this->idPair1=$idPair1;
        $this->idPair2=$idPair2;
        $this->result=$result;
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

}