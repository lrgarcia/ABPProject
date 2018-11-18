<?php
require_once ('../Model/Reservation.php');
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
    
    function ADD ($reservation){
        
        $sql= "SELECT * FROM reservation WHERE idCourt='".$reservation->getIdCourt()."' AND date='".$reservation->getDate()."' AND hour='".$reservation->getHour()."';";
        $checkReservation = $this->mysqli->query($sql);
        $insert = "INSERT INTO reservation (idCourt, idUser, date, hour) VALUES('" . $reservation->getIdCourt() . "','" . $reservation->getIdUser() . "','" . $reservation->getDate() . "','" . $reservation->getHour() . "');";
        if ($checkReservation->num_rows==0 and $this->mysql->query($insert)) {
            return "Se ha creado la reserva";
        } else{
            return "Lo sentimos, no se ha podido crear la reserva";
        }
    }
    
    function DELETE ($idReservation)
    {
        $sql = "DELETE FROM reservation WHERE idReservation='" . $idReservation . "';";
        if ($this->mysql->query($sql)) {
            
            return "Se ha eliminado correctamente la reserva";
            
        } else {
            return "Lo sentimos, no se ha podido eliminar la reserva";
        }
    }
    
    function EDIT ($reservation)
    {
        $sql = "UPDATE reservation SET idCourt='" . $reservation->getIdCourt() . "', idUser='" . $reservation->getIdUser() . "', date='" . $reservation->getDate() .
        "', hour='" . $reservation->getHour() ."' WHERE idReservation='" . $reservation->getIdReservation() . "';";
        if ($this->mysql->query($sql)) {
            return "La reserva ha sido modificado correctamente";
            
        } else {
            return "Lo sentimos, no se ha podido modificar la reserva";
        }
    }
    
    function GETBYID ($idReservation)
    {
        $sql = "SELECT * FROM reservation WHERE idReservation ='" . $idReservation . "';";
        $result = $this->mysqli->query($sql);
        return $result;
    }
    
    function GETALL ()
    {
        $sql = "SELECT * FROM reservation";
        $result = $this->mysqli->query($sql);
        return $result;
    }
  
    function GETBYDAY ($date){

        $sql = "SELECT * FROM reservation WHERE date='" . $date . "';";
        
        $result =$this->mysqli->query($sql);
        return $result;
    }
    
    function GETBYUSER ($idUser){
        
        $sql = "SELECT * FROM reservation WHERE idUser='".$idUser."';";
        
        $result = $this->mysqli->query($sql);
        return $result;
    }
       
    function FREECOURTSBYHOUR($date, $hour){
        
        $sql = "SELECT * FROM court WHERE idCourt NOT IN (SELECT idCourt FROM reservation WHERE hour='".$hour."' AND date='".$date."');";
        
        $result =$this->mysqli->query($sql);
        return $result;
    }
}

?>