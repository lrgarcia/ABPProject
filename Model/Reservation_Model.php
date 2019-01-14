<?php
require_once ('../Model/Reservation.php');
require_once ('../Model/Court.php');
require_once ('../Model/Access_DB.php');

class Reservation_Model
{
    var $reservation;
    var $mysqli;
    
    function __construct()
    {
        $this->reservation = new Reservation();
        $this->mysqli = ConnectDB();
    }
    
    

    public function ADD ($reservation){
        
        $sql= "SELECT * FROM reservation WHERE idCourt='".$reservation->getIdCourt()."' AND date='".$reservation->getDate()."' AND hour='".$reservation->getHour()."';";
        $checkReservation = $this->mysqli->query($sql);
        $insert = "INSERT INTO reservation (idCourt, idUser, date, hour) VALUES('" . $reservation->getIdCourt() . "','" . $reservation->getIdUser() . "','" . $reservation->getDate() . "','" . $reservation->getHour() . "');";
        if ($checkReservation->num_rows==0 and $this->mysqli->query($insert)) {
            return "Se ha creado la reserva";
        } else{
            return "Lo sentimos, no se ha podido crear la reserva";
        }
    }
    
    public function DELETE ($idReservation)
    {
        $sql = "DELETE FROM reservation WHERE idReservation='" . $idReservation . "';";
        if ($this->mysqli->query($sql)) {
            
            return "Se ha eliminado correctamente la reserva";
            
        } else {
            return "Lo sentimos, no se ha podido eliminar la reserva";
        }
    }
    
    public function EDIT ($reservation)
    {
        $sql = "UPDATE reservation SET idCourt='" . $reservation->getIdCourt() . "', idUser='" . $reservation->getIdUser() . "', date='" . $reservation->getDate() .
        "', hour='" . $reservation->getHour() ."' WHERE idReservation='" . $reservation->getIdReservation() . "';";
        if ($this->mysqli->query($sql)) {
            return "La reserva ha sido modificado correctamente";
            
        } else {
            return "Lo sentimos, no se ha podido modificar la reserva";
        }
    }
    
    public function GETBYID ($idReservation)
    {
        $sql = "SELECT * FROM reservation WHERE idReservation ='" . $idReservation . "';";
        $result = $this->mysqli->query($sql);
        
        $array = mysqli_fetch_array($result, MYSQLI_BOTH);
        
        $reservation = new Reservation($array['idReservation'], $array['idCourt'], $array['idUser'], $array['date'], $array['hour']);
        
        return $reservation;
    }
    
    public function GETALL ()
    {
        $sql = "SELECT * FROM reservation";
        $result = $this->mysqli->query($sql);
        
        $array = array();
        while( $row = mysqli_fetch_array($result, MYSQLI_BOTH))
        {
            $array[] = new Reservation($row['idReservation'], $row['idCourt'], $row['idUser'], $row['date'], $row['hour']);
        }
        return $array;
    }
  
    public function GETBYDAY ($date){

        $sql = "SELECT * FROM reservation WHERE date='" . $date . "';";
        
        $result =$this->mysqli->query($sql);
        return $result;
    }
    
    public function GETBYUSER ($idUser){
        
        $sql = "SELECT * FROM reservation WHERE idUser='".$idUser."';";
        
        $result = $this->mysqli->query($sql);
       
        $array = array();
        while( $row = mysqli_fetch_array($result, MYSQLI_BOTH))
        {
            $array[] = new Reservation($row['idReservation'], $row['idCourt'], $row['idUser'], $row['date'], $row['hour']);
        }
        return $array;
    }
       
    public function FREECOURTSBYHOUR($date, $hour){
        
        $sql = "SELECT * FROM court WHERE idCourt NOT IN (SELECT idCourt FROM reservation WHERE hour='".$hour."' AND date='".$date."');";
        
        $result =$this->mysqli->query($sql);
        
        $array = array();
        while( $row = mysqli_fetch_array($result, MYSQLI_BOTH))
        {
            $array[] = new Court($row['idCourt'], $row['idCourt'], $row['number']);
        }
        return $array;
    }
}

?>