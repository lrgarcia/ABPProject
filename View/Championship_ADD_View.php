<?php
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
				<input required type="text" class="form-control" id="nombre" name="nombre" value="">
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
		</div>	












		<div class = "row">

			<div class="col-sm-3 nopadding">
				<div class="form-group">
					<label>Categoria:</label>
					<select required class="form-control" id="categoria[]" name="categoria[]">
					<option>Masculino</option>
    				<option>Femenino</option>
    				<option>Mixto</option>
    			</select>
				</div>
			</div>

			<div class="col-sm-3 nopadding">
				<div class="form-group">
					<label>Modalidad:</label>
					<select required class="form-control" id="modalidad[]" name="modalidad[]">
					<option>1</option>
    				<option>2</option>
    				<option>3</option>
    			</select>
				</div>
			</div>

			<input type="text" name="login_creator" hidden value="<?php echo $_SESSION['login'] ?>">
			<div class="col-sm-3 nopadding" id="fix-btn">
				<div class="form-group">
				<button id="search-input btn-left" class="btn btn-success" type="button"  onclick="add_fields();"> 
				Añadir categoria nueva
				</button>
				</div>
			</div>


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