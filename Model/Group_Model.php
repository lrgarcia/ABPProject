<?php
require_once ('../Model/CategoryGroup.php');
require_once ('../Model/Access_DB.php');
require_once ('../Model/Match.php');
require_once ('../Model/Match_Model.php');
class Group_Model
{
    var $mysqli;
    var $group;
    
    function __construct()
    {
        $this->mysqli = ConnectDB();
        $this->group = new Group();
    }
    
    public function ADD ($group){
        
        $insert = "INSERT INTO `group` (idChampionship, letter, idCategory) VALUES('" . $group->getIdChampionship() . "','".$group->getLetter()."','". $group->getIdCategory() . "');";
        if ($this->mysqli->query($insert)) {
            return "Se ha creado el grupo";
        } else{
            return "Lo sentimos, no se ha podido crear el grupo";
        }
        
    }
    
    public function DELETE ($idGroup)
    {
        
        
        $this->mysqli = conectarBD();
        $sql = "DELETE FROM `group` WHERE idGroup='" . $idGroup . "';";
        if ($this->mysqli->query($sql)) {
            
            return "Se ha eliminado correctamente el grupo";
            
        } else {
            return "Lo sentimos, no se ha podido eliminar el grupo";
        }
    }
    
    public function EDIT ($group)
    {
        $sql = "UPDATE `group` SET idChampionship='" . $group->getIdChampionship() . "', letter='" . $group->getLetter() . "', idCategory='" . $group->getIdCategory() . "' WHERE idCategoryGroup='" . $group->getIdGroup() . "';";
        if ($this->mysqli->query($sql)) {
            return "El grupo ha sido modificado correctamente";
            
        } else {
            return "Lo sentimos, no se ha podido modificar el grupo";
        }
    }
    
    public function GETBYID ($idGroup)
    {
        $sql = "SELECT * FROM `group` WHERE idGroup ='" . $idGroup . "';";
        $result = $this->mysqli->query($sql);
        
        $array = mysqli_fetch_array($result, MYSQLI_BOTH);
        
        $group = new Group($array['idGroup'], $array['idCategory'], $array['idChampionship'], $array['letter']);
        
        return $group;
    }
    
    public function GETALL ()
    {
        $sql = "SELECT * FROM `group`";
        $result = $this->mysqli->query($sql);
        
        $array = array();
        while( $row = mysqli_fetch_array($result, MYSQLI_BOTH))
        {
            $array[] = new Group($row['idGroup'], $row['idCategory'], $row['idChampionship'], $row['letter']);
        }
        return $array;
    }
    
    public function GETGROUPPAIRS($idGroup)
    {
        
        $sql = "SELECT * FROM pair WHERE idPair IN (SELECT idPair FROM pair_group WHERE idGroup='".$idGroup."');";
        
        $result =$this->mysqli->query($sql);



         $array = array();
        while( $row = mysqli_fetch_array($result, MYSQLI_BOTH))
        {
            $array[] = new Pair($row['idPair'], $row['idCaptain'], $row['idPartner']);
        }
        return $array;        
     
    }
    
    public function SETGROUPPAIRS($idPair, $idGroup)
    {
        $insert = "INSERT INTO pair_group (idPair, idGroup) VALUES ('".$idPair."', '".$idGroup."');";
        $this->mysqli->query($insert);
    }
    
    public function LASTID()
    {
        return $this->mysqli->insert_id;
    }


    public function GETGROUPMATCHS($idGroup){

        $sql = "SELECT * FROM `match` WHERE idGroup = '".$idGroup."';";
        
        $result =$this->mysqli->query($sql);

         $array = array();
        while( $row = mysqli_fetch_array($result, MYSQLI_BOTH))
        {
            $array[] = new Match($row['idMatch'], $row['date'], $row['result'], $row['idGroup'], $row['idPair1'], $row['idPair2'], $row['hour']);
        }
        return $array;



    }

    public function GETGROUPBYCATEGORY($idChampionship,$idCategory)
    {
        $sql = "SELECT * FROM `group` WHERE idChampionship = '".$idChampionship."' AND idCategory ='".$idCategory."';";
       
        
        $result =$this->mysqli->query($sql);

         $array = array();
        while( $row = mysqli_fetch_array($result, MYSQLI_BOTH))
        {
            $array[] = new Group($row['idGroup'], $row['idCategory'], $row['idChampionship'], $row['letter']);
        }
        return $array;        

    }
}