<?php
class Championship
{
    var $idChampionship;
    var $name;
    var $dateStart;
    var $dateInscriptions;
    
    function __construct($idChampionship=null, $name=null, $dateStart=null, $dateInscriptions=null){
        $this->dateInscriptions=$dateInscriptions;
        $this->dateStart=$dateStart;
        $this->idChampionship=$idChampionship;
        $this->name=$name;
    }
    
    public function getIdChampionship()
    {
        return $this->idChampionship;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDateStart()
    {
        return $this->dateStart;
    }

    public function getDateInscriptions()
    {
        return $this->dateInscriptions;
    }

}
?>