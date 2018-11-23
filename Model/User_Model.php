<?php
require_once ('../Model/User.php');
require_once ('../Model/Access_DB.php');

class User_Model {

	var $mysqli;
	var $user;

	function __construct()
	{
		$this->user = new User();
		$this->mysqli = ConnectDB();
	}


	function ADD($user)
	{
	    $insert = "INSERT INTO user (idUser, login, password, name, surname, email, type) VALUES ('" . $user->getIdUser() . "','" . $user->getLogin() . "','" . $user->getPassword() . "','"
	        . $user->getName() . "','" . $user->getSurname() . "','" . $user->getEmail() . "','" . $user->getType() . "');";
	       
	    if ($this->mysqli->query($insert)) {
	        return "Se ha creado el usuario";
	    } else{
	        return "Lo sentimos, no se ha podido crear el usuario";
	    }
	}
	
	public function DELETE ($idUser)
	{
	    $this->mysqli = conectarBD();
	    $sql = "DELETE FROM user WHERE idUser='" . $idUser . "';";
	    if ($this->mysqli->query($sql)) {
	        
	        return "Se ha eliminado correctamente el usuario";
	        
	    } else {
	        
	        return "Lo sentimos, no se ha podido eliminar el usuario";
	        
	    }
	}
	
	public function EDIT ($user)
	{
	    $sql = "UPDATE user SET login='" . $user->getLogin() . "', password='" . $user->getPassword() . "', name='" . $user->getName() . "', surname='" . $user->getSurname() . "',
 email='" . $user->getEmail() . "', type='" . $user->getType() . "' WHERE idUser='" . $user->getIdUser() . "';";
	    
	    if ($this->mysqli->query($sql)) {
	        return "El usuario ha sido modificado correctamente";
	        
	    } else {
	        return "Lo sentimos, no se ha podido modificar el usuario";
	    }
	}
	
	public function GETBYID ($idUser)
	{
	    $sql = "SELECT * FROM user WHERE idUser ='" . $idUser . "';";
	    $result = $this->mysqli->query($sql);
	    
	    $array = mysqli_fetch_array($result, MYSQLI_BOTH);
	    
	    $user = new User($array['idUser'], $array['login'], $array['password'], $array['name'], $array['surname'], $array['email'], $array['type']);
	    
	    return $user;
	}
	
	public function GETALL ()
	{
	    $sql = "SELECT * FROM user";
	    $result = $this->mysqli->query($sql);
	    
	    $array = array();
	    while( $row = mysqli_fetch_array($result, MYSQLI_BOTH))
	    {
	        $array[] = new User($row['idUser'], $row['login'], $row['password'], $row['name'], $row['surname'], $row['email'], $row['type']);
	    }
	    return $array;
	}

}

?>