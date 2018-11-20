<?php

class User
{
    var $idUser;
    var $login;
    var $password;
    var $name;
    var $surname;
    var $email;
    var $type;
    
    function __construct($idUser=null, $login=null, $password=null, $name=null, $surname=null, $email=null, $type=null) 
    {
        $this->email=$email;
        $this->idUser=$idUser;
        $this->login=$login;
        $this->name=$name;
        $this->password=$password;
        $this->surname=$surname;
        $this->type=$type;
    }
    
    public function getIdUser()
    {
        return $this->idUser;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getSurname()
    {
        return $this->surname;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }

    public function setLogin($login)
    {
        $this->login = $login;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

}
?>