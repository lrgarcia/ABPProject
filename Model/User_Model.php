<?php

class usuario_Model {

	var $name;
	var $surname;
	var $login;
	var $password;
	var $email;
	var $type;

	function __construct($name,$surname,$login,$password,$email,$type){

		$this->name = $name;
		$this->surname = $surname;
		$this->login = $login;
		$this->password = $password;
		$this->email = $email;
		$this->type = $type;

		include_once '../Model/Access_DB.php';
		$this->mysqli = ConnectDB();
	}


	function ADD(){

		if (($this->login <> '')){
	        $sql = "SELECT * FROM user WHERE (login = '$this->login')";

			if (!$this->mysqli->query($sql)){
				print mysqli_error($this->mysqli);
				return 'No se ha podido conectar con la base de datos';

			}else{
				$result = $this->mysqli->query($sql);
				if ($result->num_rows == 0){
					$sql = "INSERT INTO usuario (name,surname,login,password,email) 
							VALUES ('$this->name','$this->surname','$this->login','$this->password','$this->email','$this->type')";

					if (!$this->mysqli->query($sql)) {
						return 'Error en la inserción';

					}else return 'Inserción realizada con éxito';	

				}else return 'Ya existe en la base de datos';
			}

	    } else return 'Introduzca un valor';
		
	}

}

?>