<?php
require_once '../Model/Category.php';
require_once '../Model/Category_Model.php';

class Championship_ADD_View{
	function __construct(){	
		$this->render();
	}
	function render(){
		
	include '../View/Header.php';
	?>

	<div class="jumbotron">
		<div class="container">
			<h1><?php echo($strings['Crear encuesta']);?></h1>
		</div>
	</div>

	<form action="../Controller/Championship_Controller.php" method='post'> 



	<div id="addCategory" class="container">

		<div class="row">
			<div class="col-sm-3 nopadding">
				<div class="form-group">
				<label>Nombre del campeonato:</label>
				<input required type="text" class="form-control" id="name" name="name" value="">
				</div>
			</div>
		</div>
			
		<div class="row"> 
		
			<div class="col-sm-3 nopadding">
				<div class="form-group">
				<label>Fecha de inicio</label>
				<input required type="date" class="form-control" id="dateStart" name="dateStart" value="">
				</div>
			</div>

			<div class="col-sm-3 nopadding">
				<div class="form-group">
				<label>Fecha de plazo</label>
				<input required type="date" class="form-control" id="dateInscriptions" name="dateInscriptions" value="">
				</div>
			</div>
		

			<div class="col-sm-6 nopadding">
				<div class="form-group">
					<label>Categoria:</label>
					<select multiple required class="form-control" id="category[]" name="category[]" size=5>
					<?php 
					$categoryModel = new Category_Model();
					$categoryArray = $categoryModel->GETALL();
					
					for($i=0; $i <count($categoryArray); $i++)
					{
					    echo "<option value='".$categoryArray[$i]->getIdCategory()."'>".$categoryArray[$i]->getCategory()." - Categoria ".$categoryArray[$i]->getModality()."</option>"; 
					}
					
					
					?>
    			</select>
				</div>
			</div>

			<input type="text" name="login_creator" hidden value="<?php echo $_SESSION['login'] ?>">
			


		</div>




<!-- 		   <div class = "row">
            <div class="col-sm-3 nopadding">
                <div class="form-group">
                  
                    <select required class="form-control" id="categoria[]" name="categoria[]">
                    <option>Masculino</option>
                    <option>Femenino</option>
                    <option>Mixto</option>
                </select>
                </div>
            </div>

            <div class="col-sm-3 nopadding">
                <div class="form-group">
                    
                    <select required class="form-control" id="modalidad[]" name="modalidad[]">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                </select>
                </div>
            </div>
            <div class="col-sm-3 nopadding">

             <div class="input-group-btn"> <button class="btn btn-danger" type="button" onclick="remove_fieldsC('+ roomC +');"> Eliminar </button>
            </div>
        </div>
          
        </div> -->





		</div>
	</div>







	<div class="container">
		<button type="submit" name="action" value="ADD" class="btn btn-default"><?php echo($strings['Enviar']);?></button>
	</div>

	</form>

	<?php
	 include '../View/Footer.php';
		
	} 
}
?>