<?php
require_once '../Model/Court.php';
require_once '../Model/Court_Model.php';

class Court_ADD_View{
    function __construct(){
        $this->render();
    }
    function render(){
        
        include '../View/Header.php';
        ?>

	<div class="jumbotron">
		<div class="container">
			<h1>Crear pista</h1>
		</div>
	</div>

	<form action="../Controller/Court_Controller.php" method='post'> 



	<div id="addCategory" class="container">

		<div class="row">
			<div class="col-sm-3 nopadding">
				<div class="form-group">
				<label>Numero de pista</label>
				<input required type="number" class="form-control" id="number" min="0" name="number" value="">
				</div>
			</div>
		</div>
			
		<div class="row"> 
		

			<input type="text" name="login_creator" hidden value="<?php echo $_SESSION['login'] ?>">
			

		</div>


		</div>






	<div class="container">
		<button type="submit" name="action" value="ADD" class="btn btn-default">Enviar</button>
	</div>

	</form>

	<?php
	 include '../View/Footer.php';
		
	} 
}
