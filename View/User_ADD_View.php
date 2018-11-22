<?php

class User_ADD_View{

	function __construct(){	
		$this->render();
	}

	function render(){
		
	include '../View/Header.php';
	?>

	<div class="jumbotron">
		<div class="container">
			<h1>Registrar usuario</h1>
		</div>
	</div>
	<div class="container">

		<form action="../Controller/User_Controller.php" method='post'>
			<div class="form-group required ">
				<label>Nombre</label>
				<input type="text" class="form-control" name="name" required >
			</div>
			<div class="form-group">
				<label>Apellidos</label>
				<input type="text" class="form-control" name="surname" required >
			</div>
			<div class="form-group">
				<label>Login</label>
				<input type="text" class="form-control" name="login" required >
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="password" class="form-control" name="password" required >
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="email" class="form-control" name="email" required >
			</div>
			<div class="form-group">
				<label>Tipo de usuario</label>
				<select class="form-control" id="type" name="type" required>
				  <option value="admin">Administrador</option>
				  <option value="instructor">Entrenador</option>
				  <option value="user">Deportista</option>

				</select>
			</div>
			<button type="submit" name="action" value="ADD" class="btn btn-default">Enviar</button>
		</form>
	</div>

	<?php
	 include '../View/Footer.php';
		
	} 

}

?>