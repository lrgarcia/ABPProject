<?php
class Reservation
{
    var $idReservation;
    var $idCourt;
    var $idUser;
    var $date;
    var $hour;


    function __construct($idReservation=null, $idCourt=null, $idUser=null, $date=null, $hour=null) {
        $this->idReservation=$idReservation;
        $this->idCourt=$idCourt;
        $this->idUser=$idUser;
        $this->date=$date;
        $this->hour=$hour;
    }

    public function getIdReservation()
    {
        return $this->idReservation;
    }

    public function getIdCourt()
    {
        return $this->idCourt;
    }

    public function getIdUser()
    {
        return $this->idUser;
    }

    public function getDate()
    {
        return $this->date;
    }
    
    public function getHour()
    {
        return $this->hour;
    }

}

?>