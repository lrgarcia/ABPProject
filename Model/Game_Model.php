<?php

require_once ('../Model/Game.php');
require_once ('../Model/Access_DB.php');

class Game_Model
{
    var $mysqli;
    var $game;
    
    function __construct() 
    {
        $this->game = new Game();
        $this->mysqli = ConnectDB();
    }
    
    public function ADD ($game){
        
        $insert = "INSERT INTO game (date, hour, idCourt, idUser1, idUser2, idUser3, idUser4) VALUES('" . $game->getDate() . "','".$game->getHour()."','".$game->getIdCourt()."','". $game->getIdUser1() . "','".$game->getIdUser2()."','".$game->getIdUser3()."','".$game->getIdUser4()."');";
        if ($this->mysqli->query($insert)) {
            return "Se ha creado el juego";
        } else{
            return "Lo sentimos, no se ha podido crear el juego";
        }
    }
    
    public function DELETE ($idGame)
    {
        
        
        $this->mysqli = conectarBD();
        $sql = "DELETE FROM game WHERE idGame='" . $idGame . "';";
        if ($this->mysqli->query($sql)) {
            
            return "Se ha eliminado correctamente el juego";
            
        } else {
            return "Lo sentimos, no se ha podido eliminar el juego";
        }
    }
    
    public function EDIT ($game)
    {
        $sql = "UPDATE game SET date='" . $game->getDate() . "', hour='" . $game->getHour() . "', idCourt='" . $game->getIdCourt() . "', idUser1='" . $game->getIdUser1() . "', idUser2='" . $game->getIdUser2() . "', idUser3='" . $game->getIdUser3() . "', idUser4='" . $game->getIdUser4() . "' WHERE idGame='" . $game->getIdGame() . "';";
        if ($this->mysqli->query($sql)) {
            return "El juego ha sido modificado correctamente";
            
        } else {
            return "Lo sentimos, no se ha podido modificar el juego";
        }
    }
    
    public function GETBYID ($idGame)
    {
        $sql = "SELECT * FROM game WHERE idGame ='" . $idGame . "';";
        $result = $this->mysqli->query($sql);
        
        $array = mysqli_fetch_array($result, MYSQLI_BOTH);
        
        $game = new Game($array['idGame'], $array['date'], $array['hour'], $array['idCourt'], $array['idUser1'], $array['idUser2'], $array['idUser3'], $array['idUser4']);
        
        return $game;
    }
    
    public function NOPROMOTED (){
        $this->mysqli = ConnectDB();
        $sql = "SELECT * FROM game WHERE idGame NOT IN (SELECT idGame FROM promotion)";
        $result = $this->mysqli->query($sql);
        
        $array = array();
        while( $row = mysqli_fetch_array($result, MYSQLI_BOTH))
        {
            $array[] = new Game($row['idGame'], $row['date'], $row['hour'], $row['idCourt'], $row['idUser1'], $row['idUser2'], $row['idUser3'], $row['idUser4']);
        }
        return $array;
        
    }
    
    public function GETALL ()
    {
        $sql = "SELECT * FROM game";
        $result = $this->mysqli->query($sql);
        
        $array = array();
        while( $row = mysqli_fetch_array($result, MYSQLI_BOTH))
        {
            $array[] = new Game($row['idGame'], $row['date'], $row['hour'], $row['idCourt'], $row['idUser1'], $row['idUser2'], $row['idUser3'], $row['idUser4']);
        }
        return $array;
    }
    
    public function GETUSERGAMES($idUser) {
        $sql = "SELECT * FROM game WHERE idUser1='" . $idUser . "' OR idUser2='" . $idUser . "' OR idUser3='" . $idUser . "' OR idUser4='" . $idUser . "';";
        $result = $this->mysqli->query($sql);
        return $result;
    }
}
?>