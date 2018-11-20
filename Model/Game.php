<?php

class Game
{
    var $idGame;
    var $date;
    var $hour;
    var $idCourt;
    var $idUser1;
    var $idUser2;
    var $idUser3;
    var $idUser4;
    
    function __construct($idGame=null, $date=null, $hour=null, $idCourt=null, $idUser1=null, $idUser2=null, $idUser3=null, $idUser4=null) 
    {
        $this->date=$date;
        $this->hour=$hour;
        $this->idCourt=$idCourt;
        $this->idGame=$idGame;
        $this->idUser1=$idUser1;
        $this->idUser2=$idUser2;
        $this->idUser3=$idUser3;
        $this->idUser4=$idUser4;
    }
    
    public function getIdGame()
    {
        return $this->idGame;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getHour()
    {
        return $this->hour;
    }

    public function getIdCourt()
    {
        return $this->idCourt;
    }

    public function getIdUser1()
    {
        return $this->idUser1;
    }

    public function getIdUser2()
    {
        return $this->idUser2;
    }

    public function getIdUser3()
    {
        return $this->idUser3;
    }

    public function getIdUser4()
    {
        return $this->idUser4;
    }

}
?>