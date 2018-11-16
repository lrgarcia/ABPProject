<?php

class Championship_Model {

	var $nombre;
	var $category;
	var $fechaInic;
	var $horaInic;
	var $fechaPlazo;

	function __construct($name,$fechaInic,$horaInic,$fechaPlazo){

		$this->nombre = $nombre;
		$this->fechaInic = $fechaInic;
		$this->horaInic = $horaInic;
		$this->fechaPlazo = $fechaPlazo;

		include_once '../Model/Access_DB.php';
		$this->mysqli = ConnectDB();
	}


	function ADD(){

	$sql = "INSERT INTO championship (name, fechaInic, horaInic, fechaPlazo) VALUES ('$this->name','$this->horario','$this->fechaInic','$this->horaInic')";	

		 if (!$this->mysqli->query($sql)) {
            return 'Error en la inserción';
        }else return 'Inserción realizada con éxito';   

}


?>