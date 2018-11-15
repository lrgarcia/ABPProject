<?php

class usuario_Model {

	var $nombre;
	var $apellidos;
	var $login;
	var $pass;
	var $email;

	function __construct($nombre,$apellidos,$login,$pass,$email){

		$this->nombre = $nombre;
		$this->apellidos = $apellidos;
		$this->login = $login;
		$this->pass = $pass;
		$this->email = $email;

		include_once '../Model/Access_DB.php';
		$this->mysqli = ConnectDB();
	}


	function ADD(){

		if (($this->login <> '')){
	        $sql = "SELECT * FROM usuario WHERE (login = '$this->login')";

			if (!$this->mysqli->query($sql)){
				print mysqli_error($this->mysqli);
				return 'No se ha podido conectar con la base de datos';

			}else{
				$result = $this->mysqli->query($sql);
				if ($result->num_rows == 0){
					$sql = "INSERT INTO usuario (nombre,apellidos,login,pass,email) 
							VALUES ('$this->nombre','$this->apellidos','$this->login','$this->pass','$this->email')";

					if (!$this->mysqli->query($sql)) {
						return 'Error en la inserción';

					}else return 'Inserción realizada con éxito';	

				}else return 'Ya existe en la base de datos';
			}

	    } else return 'Introduzca un valor';
		
	}

}

?>