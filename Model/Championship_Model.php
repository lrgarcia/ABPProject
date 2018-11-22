<?php
require_once ('../Model/Championship.php');
require_once ('../Model/Access_DB.php');

class Championship_Model
{
    var $championship;
    var $mysqli;
    
    function __construct()
    {  
        $this->championship = new Championship();
        $this->mysqli = ConnectDB();
    }
    
    public function ADD ($login, $name, $dateStart, $dateInscription){
     
        $insert = "INSERT INTO championship (name, dateStart, dateInscriptions) VALUES('" . $championship->getName() . "','" . $championship->getDateStart() . "','" . $championship->getDateInscriptions() . "');";
        if ($this->mysqli->query($insert)) {
            return "Se ha creado el campeonato";
        } else{
            return "Lo sentimos, no se ha podido crear el campeonato";
        }
    }
    
    public function DELETE ($idChampionship)
    {
        
        $this->mysql = conectarBD();
        $sql = "DELETE FROM championship WHERE idChampionship='" . $idChampionship . "';";
        if ($this->mysqli->query($sql)) {
            
            return "Se ha eliminado correctamente el campeonato";
            
        } else {
            return "Lo sentimos, no se ha podido eliminar el campeonato";
        }
    }
    
    public function EDIT ($championship)
    {
        $sql = "UPDATE championship SET name='" . $championship->getName() . "', dateStart='" . $championship->getDateStart() . "', dateInscriptions='" . $championship->getDateInscriptions() .
        "' WHERE idChampionship='" . $championship->getIdChampionship() . "';";
        if ($this->mysqli->query($sql)) {
            return "El campeonato ha sido modificado correctamente";
            
        } else {
            return "Lo sentimos, no se ha podido modificar el campeonato";
        }
    }
    
    public function GETBYID ($idChampionship)
    {
        $sql = "SELECT * FROM championship WHERE idChampionship ='" . $idChampionship . "';";
        $result = $this->mysqli->query($sql);
        
        $array = mysqli_fetch_array($result, MYSQLI_BOTH);
        
        $championship = new Championship($array['idChampionship'], $array['name'], $array['dateStart'], $array['dateInscriptions']);
        
        return $championship;
    }
    
    public function GETALL ()
    {
        $sql = "SELECT * FROM championship";
        $result = $this->mysqli->query($sql);

        $array = array();
        while( $row = mysqli_fetch_array($result, MYSQLI_BOTH))
        {
            $array[] = new Championship($row['idChampionship'], $row['name'], $row['dateStart'], $row['dateInscriptions']);
        }

        return $array;
    }
    
    public function GETCATEGORIESBYID ($idChampionship){
        
        $sql = "SELECT * FROM category WHERE idCategory IN (SELECT idCategory FROM championship_category WHERE idChampionship='".$idChampionship."');";
        
        $result =$this->mysqli->query($sql);
        
        $array = array();
        while( $row = mysqli_fetch_array($result, MYSQLI_BOTH))
        {
            $array[] = new Category($row['idCategory'], $row['category'], $row['modality']);
        }
        return $array;
    }
    
    public function SETCATEGORIESBYID ($idCategories, $idChampionship)
    {
        $lenght = count($idCategories);
        for($i=0; $i<$lenght; $i++)
        {
            $insert = "INSERT INTO championship_category (idChampionship, idCategory) VALUES('".$idChampionship."', '".$idCategories[$i]."');";
            $this->mysqli->query($insert);
        }
    }
}
?>